<?php

namespace App\Http\Controllers;
use App\Http\Requests\RegistrationRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\SendMail;
use App\Models\Staff;
use App\Models\Shop;

use DB;
use Carbon\Carbon;



class UsersController extends Controller
{ 
   

    
    public function list(){
        
        $data=User::all()->where('role','!=','admin');
        return view('user.list',['users'=>$data]);
    }
  
    public function showData($id){

        $data= User::find($id);
        return view('user.edit',['data'=>$data]);

    }

    public function update(Request $req){
       

        $data=User::find($req->id);
        $data->username=$req->username;
        $data->email=$req->email;
        $data->address=$req->address;
        $data->contact=$req->contact;
        $data->role=$req->role;
        $data->save();
        return redirect('list')->with('message','succesfully updated');

    }
    public function delete(Request $request,$id)

    {  
        User::where('id',$id)->delete();
            
       // $data = User::findOrFail($id);

      //  $data->delete();
                     
      //return response()->json(['deleted_at' => $data->deleted_at], 200);
         DB::table('users')->where('id',$id)->update(['status'=>0]);
      $request->session()->flash('message','Deleted successfully');
      return redirect('list');


}

public function  idFetch(Request $request){

   
           
    $data=[
                 
        'username' => $request->username,
        'email' =>$request->email,
        'password' =>bcrypt($request->password),
        'address' =>$request->address,
        'contact' =>$request->contact,
        'role'=>'distributor',
        'status'=>1,
        'created_at'=>Carbon::now()
        

    ];
      
    
    $distributor_id=DB::table('users')->insertGetId($data);
   // DB::table('users')->where('id',$id)->update(['status'=>0]);
  
    DB::table('distributors')->insert([
        
        'username' => $request->username,
        'distributor_id'=>$distributor_id,
        'status'=>1,
        'created_at'=>Carbon::now()
        
        ]);
   

    $details=[
        'title'=>'User password',
        'body'=>$request->password
    ];

    \Mail::to($request->email)->send(new SendMail($details));
    return view('emails.thanks');

            
    
    return redirect('list')->with('message','succesfully added');

        
    
}
public function dist(){
   
    return view('distributor.dist');
}

     public function addstaff(Request $request){
       //  dd($request->all());
     
         
         $data=[

             'username'=>$request->username,
             'email'=>$request->email,
             'password'=>bcrypt($request->password),
             'address'=>$request->address,
             'contact'=>$request->contact,
            // 'distributorname'=>$request->distributor,
             'role'=>'staff',
             'created_at'=>Carbon::now(),
             'status'=>1
         ];
          
         $user_id=DB::table('users')->insertGetId($data);
         DB::table('staffs')->insert([

             'user_id'=>$user_id,
             'username'=>$request->username,
             'distributorname'=>$request->distributor,
             'created_at'=>Carbon::now(),
             'status'=>1
         ]);
         $details=[
            'title'=>'User password',
            'body'=>$request->password
        ];

        \Mail::to($request->email)->send(new SendMail($details));
        return view('emails.thanks');

                
        
           return redirect('list')->with('message','succesfully added');;
     
    }

     public function staff(){
         
        return view('user.addstaff');
     }

public function index(){

    return view ('user.changepass');

}


    public function countUsers(){

        $count =  User::where('status', '1')
                  ->where('role','!=','admin')
        ->count();
        
       
        print_r ($count);
      
      }

  public function passwordForm(){

   
    return view ('user.changepass');

  }

  public function changePassword(Request $req){
   
    
    $req->validate([
            'OldPassword' => ['required'],
            'NewPassword' => ['required'],
            'ConfirmPassword' => ['same:NewPassword'],
        ]);

    
    $data=User::find($req->id);
    $data->password=bcrypt($req->NewPassword);
    $data->save();
    return redirect('list');

  }
  
  public function forgetForm(){

    return view('user.forgetPass');
 
}

public function viewStaff(){

    
    $temp= DB::table('users')
    ->join('staffs','users.id',"=",'staffs.user_id')
    ->select('staffs.user_id','users.username','users.email','users.password','users.address','users.contact','staffs.distributorname')
    ->where('staffs.status',1)
    ->get();
    return view('user.staff',['staffs'=>$temp]);
  
  }

  public function showStaffDetails($id){

    // dd($id);
    $data= DB::table('users')
    ->join('staffs','users.id',"=",'staffs.user_id')
    ->select('staffs.user_id','users.id','users.username','users.email','users.password','users.address','users.contact','staffs.distributorname')
    ->where('users.id',$id)
    ->first();

    // dd($data);
    // $data= Staff::find($id);
    return view('user.staffupdate',['data'=>$data]);
  }

  
  public function updatestaff(Request $req){
    
      $data=User::find($req->id);
      $data->username=$req->UserName;
      $data->email=$req->Email;
      $data->address=$req->Address;
      $data->contact=$req->Contact;
      $data->save();


      $staff_detail= Staff::where('user_id',$req->id)->first();
      $staff_detail->distributorname=$req->DistributorName;
      $staff_detail->save();
      return redirect('lstaffall')->with('message','succesfully updated');

   }

   public function deleteStaff($id){
    // dd($id);
    // Staff::where('id',$id)->delete();
    DB::table('users')->where('id',$id)->update(['status'=>0]);
    DB::table('staffs')->where('user_id',$id)->update(['status'=>0]);
   return redirect('lstaffall');

  }
  public function showShop(){

    $data=Shop::all();
     return view('shop.shoplist',['shops'=>$data]);
    
  }

  public function countStaff(){

    $count =  Staff::where('status', '1')->count();
    print_r ($count);
  
  }
}
  




