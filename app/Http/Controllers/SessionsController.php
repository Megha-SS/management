<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function index(){

        return view('sessions.create');
    }
     public function admin(){

        return view('admindashboard');
      }

    public function dist(){
    
        return view('distdashboard');
    }   
    public function staff(){
    
        return view('staffdashboard');
    } 

    
    public function store(Request $request){
      // dd($request->all());
        $credential=[
            'email'=>$request->email,
          

            'password'=>$request->password,

        ];
        echo 'email';
        echo 'password';
        if (Auth::attempt( $credential)) {
           
           var_dump(Auth::user()); 

        $role = Auth::user()->role; 

             switch ($role) {
              case 'admin':
                return redirect('/admindashboard');
                break;
              case 'distributor':
                return redirect ('/distdashboard');
                break; 
              case 'staff':
                    return redirect('/staffdashboard');
                    break; 
          
              default:
                return redirect('/register'); 
              break;
    


        }
        
    }
       // return redirect('sessions.adminpage');
       echo "failed";
    
    }
       

    public function logout(Request $req){

      Auth::logout();
      return redirect('/login');

    }
    
    
  


 


    

}
    
