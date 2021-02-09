<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Str;
use Carbon\Carbon;
use App\Http\Controllers\UsersController;
use App\Models\User;
//use App\Http\Controllers\Validator;
//use Validator;
use Illuminate\Support\Facades\Validator;
use App\Mail\Mailcontroller;

class AccountController extends Controller
{

    
 public function getData(Request $request){


       
    $user = DB::table('users')->where('email', '=', $request->email)
    ->first();
 
//Check if the user exists
if (!$user)  {
    return redirect()->back()->withErrors(['email' => trans('User does not exist')]);
}
$token = Str::random(60);
//Create Password Reset Token
DB::table('password_resets')->insert([
    'email' => $request->email,
    'token' => $token,
    'created_at' => Carbon::now()
]);
$link = env('APP_URL') . ':8000/password/reset?token=' . $token . '&email=' . urlencode($request->email);
\Mail::to($request->email)->send(new Mailcontroller($link));
    return redirect()->back();


//return view('auth.passwords.forget2')->with('email',$request->email);


//Get the token just created above
$tokenData = DB::table('password_resets')
    ->where('email', $request->email)->first();


if ($this->sendResetEmail($request->email, $tokenData->token)) {
    return redirect()->back()->with('status', trans('A reset link has been sent to your email address.'));
} else {
    return redirect()->back()->withErrors(['error' => trans('A Network Error occurred. Please try again.')]);
}
}

private function sendResetEmail($email, $token)
{

//Retrieve the user from the database
$user = DB::table('users')->where('email', $email)->select('username', 'email')->first();
//Generate, the password reset link. The token generated is embedded in the link
$link = config('base_url') . 'password/reset?token=' . $token . '&email=' . urlencode($user->email);

    try {
    //Here send the link with CURL with an external email API 

    
        return true;
    } catch (\Exception $e) {

        return false;
    }
}


    public function resetPassword(Request $request){
    
     
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'newpassword' => 'required',
           // 'token' => 'required'
            ]);
    
        //check if payload is valid before moving on
        if ($validator->fails()) {

            return redirect()->back()->withErrors(['email' => 'Please complete the form']);
        }
    
        $password = $request->newpassword;
    // Validate the token
       // $tokenData = DB::table('password_resets')
       // ->where('token', $request->token)->first();
    // Redirect the user back to the password reset request form if the token is invalid
     /*   if (!$tokenData) 
        {return view('auth.passwords.forget1');
        }
    */
        $user = User::where('email', $request->email)->first();
    // Redirect the user back if the email is invalid
        if (!$user)
         {return redirect()->back()->withErrors(['email' => 'Email not found']);}
        
    //Hash and update the new password
        $user->password = bcrypt($password);
        $user->update(); //or $user->save();
    
        //login the user immediately they change password successfully
        //Auth::login($user);
    
        //Delete the token
        DB::table('password_resets')->where('email', $user->email)
        ->delete();
    
        //Send Email Reset Success Email
            return redirect('/login');
        
    
    }

 public function Enteremail(){

    return view('auth.passwords.forget1');
 }

 public function passform(Request $req){

 
    $tokenData = DB::table('password_resets')
        ->where('token', $req->token)->first();
    // Redirect the user back to the password reset request form if the token is invalid
        if (!$tokenData) 
        {//return view('auth.passwords.forget1');
        }
  

    return view('auth.passwords.forget2')->with('email',$req->email);
    
 }



 public function updatePassword(Request $req){
     
  $data = new User();
  $data->validate = $req->validate([
        
        'NewPassword' => ['required'],
        'ConfirmPassword' => ['same:NewPassword'],
    ]);
    
  
   
   $data=User::where('email',$req->email);
  echo $request->email;
   $data->password=bcrypt($req->newpassword);
 
 $data->save();
   return redirect('list');


           
 }
 

}
