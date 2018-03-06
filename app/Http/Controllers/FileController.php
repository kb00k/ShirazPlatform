<?php

namespace App\Http\Controllers;

use App\Category;
use App\File;
use App\FileDownload;
use App\FilePurchase;
use App\FileVersion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Item;
use Telegram\Bot\Api;
use Telegram\Bot\Keyboard\Keyboard;

class FileController extends Controller
{
    public function index()
    {
        $files = File::paginate(config('platform.file-per-page'));
        $categories = Category::where('type','File')->get();
        return view('file.index',['categories' => $categories, 'files' => $files]);
    }

    public function category($id)
    {
        $files = File::where('category_id', $id)->paginate(config('platform.file-per-page'));
        $categories = Category::where('type','File')->get();
        return view('file.index',['categories' => $categories, 'files' => $files]);
    }

    public function type($type)
    {
        $files = File::where('type', $type)->paginate(config('platform.file-per-page'));
        $categories = Category::where('type','File')->get();
        return view('file.index',['categories' => $categories, 'files' => $files]);
    }

    public function create()
    {
        $this->middleware(['auth','admin']);
        $categories = Category::where('type','File')->get();
        return view('file.create',['categories'=> $categories]);
    }
    public function view($id)
    {
        $file = File::findOrFail($id);
        $categories = Category::where('type','File')->get();
        return view('file.view',['categories'=> $categories, 'file' => $file]);
    }

    public function slug($id, $slug)
    {
        $file = File::findOrFail($id);
        $categories = Category::where('type','File')->get();
        return view('file.view',['categories'=> $categories, 'file' => $file]);
    }

    public function insert(Request $request)
    {
        $this->middleware(['auth','admin']);
        $request->validate([
            'title' => 'required|max:191|string',
            'text' => 'required|string',
            'price' => 'numeric|min:'.config('platform.min-payment-price'),
            'type' => 'required',
            'source' => 'required|image',
            'version_source' => 'required|file',
            'version_description' => 'required|string',
            'version_name' => 'required|string'
        ]);
        $file = new File();
        $file->title = $request->title;
        $file->category_id = $request->category_id;
        $file->description = $request->description;
        $file->text = $request->text;
        $file->price = $request->price;
        $file->type = $request->type;
        $file->source = $request->file('source')->store('public');
        $file->user_id = Auth::user()->id;
        $file->save();

        $version = new FileVersion();
        $version->file_id = $file->id;
        $version->name = $request->version_name;
        $version->title = $request->version_title;
        $version->description = $request->version_description;
        $version->source = $request->file('version_source')->store('file');
        $version->size = $request->file('version_source')->getSize();
        $version->save();

        $file->version_id = $version->id;
        $file->save();

        $item = new Item();
        $item->title = $file->title;
        $item->model = 'File';
        $item->category_id  = 10;
        $item->model_id = $file->id;
        $item->sale_price = $file->price;
        $item->save();
        flash('فایل با موفقیت ایجاد شد.')->success();
        return redirect()->route('file.view',['id'=>$file->id]);
    }

    public function addCart($id)
    {
        $this->middleware(['auth']);
        $file = File::findOrFail($id);
        $select = 0;
        foreach(Cart::content() as $item){
            if($item->id == $file->id) {
                $select = 1;
            }
        }
        if ($select == 0) {
            Cart::add($file->id, $file->title, 1, $file->price,['description' => $file->description]);
            flash("فایل " . $file->title . " به سبد خرید اضافه شد.")->success();
        } else {
            flash("فایل مورد نظر در سبد خرید شما موجود است.")->warning();
        }
        return redirect()->back();
    }
    public function removeCart($id)
    {
        $this->middleware(['auth']);
        Cart::remove($id);
        flash("آیتم با موفقیت از سبد حذف شد.")->success();
        return redirect()->back();
    }
    public function download($id)
    {
        $this->middleware(['auth']);
        $file = File::with('version')->findOrFail($id);
        if($file->type == 'paid') {
            $purchases = FilePurchase::ofFile($id)->where('user_id',Auth::user()->id)->count();
            if($purchases > 0) {
                FileDownload::create(['user_id'=>Auth::user()->id,'file_id'=>$file->id]);
                return Storage::download($file->version->source, $file->version->name);
            } else {
                flash('برای دریافت فایل ابتدا آن را باید بخرید.')->warning();
                return redirect()->route('file.add-cart',['id' => $file->id]);
            }
        } else if($file->type == 'free') {
            FileDownload::create(['user_id'=>Auth::user()->id,'file_id'=>$file->id]);
            return Storage::download($file->version->source, $file->version->name);
        }
    }

    public function tele()
    {

        $keyboard = [
            ['ثبت نام', 'ورود به سایت', 'فعال سازی'],
        ];
        $telegram = new Api(config('telegram.bots.mybot.token'));

        $keyboard = Keyboard::make()
            ->inline()
            ->row(
                Keyboard::inlineButton(['text' => 'Test', 'callback_data' => 'data']),
                Keyboard::inlineButton(['text' => 'Btn 2', 'callback_data' => 'data_from_btn2'])
            );




        $response = $telegram->sendMessage([
            'chat_id' => '324083208',
            'text' => 'Hello World',
        ])>replyMarkup($keyboard);

        $messageId = $response->getMessageId();

        //$response = $telegram->getUpdates();
        //$response = $telegram->getUpdates();


        //$response = $telegram->sendMessage(['chat_id' => '324083208', 'text' => 'Hello World']);

        //$messageId = $response->getMessageId();
         dd($response);
    }

    public function teleupdate()
    {

        $keyboard = [
            ['ثبت نام', 'ورود به سایت', 'فعال سازی'],
        ];
        $telegram = new Api(config('telegram.bots.mybot.token'));


        $response = $telegram->getUpdates();
        //$response = $telegram->getUpdates();
        dd($response);
        foreach ($response as $re)
        {
            if($re->message->text == "ثبت نام") {
                $response = $telegram->sendMessage(['chat_id' => $re->message->from->id, 'text' => 'Hello Worlddsdssd']);
            }
        }
        //$response = $telegram->sendMessage(['chat_id' => '324083208', 'text' => 'Hello World']);

        //$messageId = $response->getMessageId();

    }

}
