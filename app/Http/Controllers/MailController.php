<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Models\User;
use App\Models\Mail;
class MailController extends Controller
{
    public function index(){
     
    
      /* $user = User::find(1) ->toArray();

       Mail::send('mail',$user,function($message)use($user){
                $message->to($user['email']);
                $message->subject('password');

       });

       dd('mail send Successfully');
    */
       $to_name = 'Athira UK';
      $to_email = 'athirauk3@gmail.com';
    $data = array(‘name’=>"Megha S Sasidharan(sender_name)", “body” => "password");
   Mail::send(‘emails.mail’, $data, function($message) use ($to_name, $to_email) {
   $message->to($to_email, $to_name)
    ->subject('Laravel Test Mail');
  $message->from('meghassasidharan@gmail.com','Test Mail');
});

    }

}
