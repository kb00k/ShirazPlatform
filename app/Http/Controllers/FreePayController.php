<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use Illuminate\Support\Facades\Auth;
use Shirazsoft\Gateway\Gateway;
use Shirazsoft\Gateway\Irankish\IrankishException;
use Shirazsoft\Gateway\Payir\PayirSendException;
use Shirazsoft\Gateway\Saderat\SaderatException;
use Shirazsoft\Gateway\Sadad\SadadException;
use Shirazsoft\Gateway\Mellat\MellatException;
use Shirazsoft\Gateway\Saman\SamanException;
use Shirazsoft\Gateway\Zarinpal\ZarinpalException;
use Shirazsoft\Gateway\Pasargad\PasargadErrorException;
use Shirazsoft\Gateway\Parsian\ParsianErrorException;
use Shirazsoft\Gateway\Paypal\PaypalException;
use Shirazsoft\Gateway\Payir\PayirReceiveException;
use Shirazsoft\Gateway\JahanPay\JahanPayException;
use Shirazsoft\Gateway\Exceptions\RetryException;
use Shirazsoft\Gateway\Exceptions\PortNotFoundException;
use Shirazsoft\Gateway\Exceptions\InvalidRequestException;
use Shirazsoft\Gateway\Exceptions\NotFoundTransactionException;

class FreePayController extends Controller
{

    public function index()
    {
        return view('free-pay.index');
    }

    public function start(Request $request)
    {
        $request->amount = str_replace(",","",$request->amount);
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'mobile' => 'required|digits:11|numeric',
            'amount' => 'required|numeric|min:'.config('platform.min-payment-price'),
            'description' => 'required',
            'gateway' => 'required',
        ]);
        try {
            $request_gateway = $request->gateway;
            $gateway = Gateway::{$request_gateway}();
            $gateway->setCallback(url('free-pay/callback'));
            $gateway->price($request->amount * 10)->ready();
            $refId =  $gateway->refId();
            $transID = $gateway->transactionId();

            session(['name' => $request->name]);
            session(['email' => $request->email]);
            session(['mobile' => $request->mobile]);
            session(['amount' => $request->amount]);
            session(['description' => $request->description]);
            session(['gateway' => $request->gateway]);
            session(['user_id' => $request->user_id]);

            return $gateway->redirect();
        } catch (Exception $e) {
            flash($e->getMessage())->error();
        }catch (IrankishException $e) {
            flash($e->getMessage())->error();
        } catch (SaderatException $e) {
            flash($e->getMessage())->error();
        } catch (PayirSendException $e) {
            flash($e->getMessage())->error();
        } catch (SadadException $e) {
            flash($e->getMessage())->error();
        } catch (MellatException $e) {
            flash($e->getMessage())->error();
        } catch (SamanException $e) {
            flash($e->getMessage())->error();
        } catch (ZarinpalException $e) {
            flash($e->getMessage())->error();
        } catch (PasargadErrorException $e) {
            flash($e->getMessage())->error();
        } catch (ParsianErrorException $e) {
            flash($e->getMessage())->error();
        } catch (PaypalException $e) {
            flash($e->getMessage())->error();
        } catch (JahanPayException $e) {
            flash($e->getMessage())->error();
        }
        return redirect()->route('free-pay');
    }

    public function callback(Request $request)
    {
        try {

            $gateway = \Gateway::verify();
            $trackingCode = $gateway->trackingCode();
            $refId = $gateway->refId();
            $cardNumber = $gateway->cardNumber();

            $transaction = new Transaction();
            $transaction->account_id = config('gateway.'.session('gateway').'.account_id');
            $transaction->name = session('name');
            $transaction->email = session('email');
            $transaction->mobile = session('mobile');
            $transaction->user_id = session('user_id');
            $transaction->description = session('description');
            $transaction->amount = session('amount');
            $transaction->name = session('name');
            $transaction->save();
            flash('پرداخت با موفقیت انجام شد.')->success();
            return view('free-pay.callback',['trackingCode'=>$trackingCode,'transaction_id'=>$transaction->id]);
        } catch (Exception $e) {
            flash($e->getMessage())->error();
        } catch (IrankishException $e) {
            flash($e->getMessage())->error();
        } catch (SaderatException $e) {
            flash($e->getMessage())->error();
        } catch (PayirReceiveException $e) {
            flash($e->getMessage())->error();
        } catch (SadadException $e) {
            flash($e->getMessage())->error();
        } catch (MellatException $e) {
            flash($e->getMessage())->error();
        } catch (SamanException $e) {
            flash($e->getMessage())->error();
        } catch (ZarinpalException $e) {
            flash($e->getMessage())->error();
        } catch (PasargadErrorException $e) {
            flash($e->getMessage())->error();
        } catch (ParsianErrorException $e) {
            flash($e->getMessage())->error();
        } catch (PaypalException $e) {
            flash($e->getMessage())->error();
        } catch (JahanPayException $e) {
            flash($e->getMessage())->error();
        }catch (RetryException $e) {
            flash($e->getMessage())->error();
        } catch (PortNotFoundException $e) {
            flash($e->getMessage())->error();
        } catch (InvalidRequestException $e) {
            flash($e->getMessage())->error();
        } catch (NotFoundTransactionException $e) {
            flash($e->getMessage())->error();
        }
        return redirect()->route('free-pay');
    }

}
