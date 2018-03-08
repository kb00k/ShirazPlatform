<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;

class FreePaid extends Notification
{
    use Queueable;
    public $transaction = null;
    public $user = null;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($transaction, $user)
    {
        $this->transaction = $transaction;
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database', TelegramChannel::class];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('نتیجه پرداخت')
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'transaction_id' => $this->transaction->id,
            'amount' => $this->transaction->amount,
        ];
    }

    public function toTelegram($notifiable)
    {
        $url = url('free-pay');
        if($this->user->telegram_user_id) {
            return TelegramMessage::create()
                ->to($this->user->telegram_user_id) // Optional.
                ->content("پرداخت مبلغ:" . $this->transaction->amount ."\n"."هستم") // Markdown supported.
                ->button('نمایش لیست تراکنش ها', $url); // Inline Button
        } else {
            return false;
        }

    }
}
