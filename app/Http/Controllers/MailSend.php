<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendMail;

class MailSend extends Controller
{

    public function mailsend(){
         $details=[
             'title'=>'Mail from Real programmer',
             'body'=>'$request->'
         ];

         \Mail::to('athirain98010@gmail.com')->send(new SendMail($details));
         return view('emails.thanks');
        }
}
