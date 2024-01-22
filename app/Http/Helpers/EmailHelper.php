<?php

namespace App\Http\Helpers;

use Illuminate\Support\Facades\Mail;

class EmailHelper
{
    public static function sendWelcomeEmail($to, $name)
    {
        $subject = 'Welcome to Our System';
        $message = "Dear $name,\n\nWelcome to our system! Thank you for joining.";

        $msg = '';

        try {
            Mail::raw($message, function ($mail) use ($to, $subject) {
                $mail->to($to)->subject($subject);
            });
            $msg = 'User notified via email';
        } catch (\Throwable $th) {
            $msg = 'unable to notify User via email ' . $th->getMessage();
        }

        return $msg;
    }
}
