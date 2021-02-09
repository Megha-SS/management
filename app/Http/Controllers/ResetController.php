<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResetController extends Controller
{
   /* public function reset($email,$code){

        $user=User::whereEmail($request->email)->first();
        if($user == null){

            return  redirect()->back->with(['error'=>'email not exist']);
        }

        $user = User::findById($user->id);
        $reminder = Reminder::exists($user);

        if($reminder){

            if($code == $reminder->code){
                return view('security.reset');
            }else{
                return redirect('')
            }
        }else{
            echo 'time expired';
        }
    }
    */
}
