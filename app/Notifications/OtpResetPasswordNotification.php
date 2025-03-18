<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OtpResetPasswordNotification extends Notification
{
    use Queueable;

    /**
     * The OTP code.
     *
     * @var string
     */
    protected $otp;

    /**
     * Create a new notification instance.
     *
     * @param string $otp
     * @return void
     */
    public function __construct($otp)
    {
        $this->otp = $otp;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Password Reset OTP')
            ->line('You are receiving this email because we received a password reset request for your account.')
            ->line('Your password reset OTP is: ' . $this->otp)
            ->line('If you did not request a password reset, no further action is required.')
            ->line('This OTP will expire in 15 minutes.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray($notifiable)
    {
        return [
            'otp' => $this->otp
        ];
    }
}
