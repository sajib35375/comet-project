<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TestMailController extends Controller
{
    public function mailSend(){

        $mail_details = [
            'title' => 'this is a title for mail',
            'name' => 'shahnewaj',
            'content' => 'this is content for all customer',
        ];
        Mail::to('sajibsust99@gmail.com')->send(new TestMail($mail_details));
    }
}
