<?php

namespace App\Http\Controllers;

use App\Mail\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Env;
use Illuminate\Support\Facades\Mail;

class FeedbackController extends Controller
{
    public function show()
    {
        return view("feedback.feedback");
    }

    public function sendToAdmin(Request $request)
    {
        $message = $request->message;

        Mail::to(env('MAIL_FROM_ADDRESS', "admin@gmail.com"),)->send(new Feedback($message));

        return redirect()->back()->with('message', 'Дякую за звернення! Ваше повідомлення успішно відправлено адміністратору сайту!');
        
    }

}
