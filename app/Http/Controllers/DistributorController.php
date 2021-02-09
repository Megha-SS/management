<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Distributor;
use DB;
use App\Models\User;
use App\Mail\SendMail;
use App\Models\Shop;
use App\Models\Staff;
use Carbon\Carbon;

class DistributorController extends Controller
{

   /* public function showDist(){

        return view('distributor.disttable');
    }
    */
    public function Staff(){
         
      return view('distributor.staff');
   }

    public function staffAdd(Request $request){
      
  
      
      $data=[

          'username'=>$request->username,
          'email'=>$request->email,
          'password'=>bcrypt($request->password),
          'address'=>$request->address,
          'contact'=>$request->contact,
       //   'distributorname'=>$request->distributorname,
          'role'=>'staff',
          'created_at'=>Carbon::now(),
          'status'=>1
      ];
       
      $user_id=DB::table('users')->insertGetId($data);
      DB::table('staffs')->insert([

          'user_id'=>$user_id,
          'username'=>$request->username,
          'distributorname'=>$request->distributorname,
          'created_at'=>Carbon::now(),
          'status'=>1
      ]);
      $details=[
         'title'=>'User password',
         'body'=>$request->password
     ];

     \Mail::to($request->email)->send(new SendMail($details));
     return view('emails.thanks');

             
     
        return redirect('list');
  
 }



    public function show(){

       $data= Distributor::all();
       return view('distributor.disttable',['distributors'=>$data]);
      
    }

    public function showDetails($id){
     
     
       $data=DB::table('users')->where('id',$id)->first();

    
       return view('distributor.updatenewdist',['data'=>$data]);
       
    }
    function updatedist(Request $req){
   
      
      
        $data=User::find($req->id);

     
        $data->username=$req->username;
        $data->email=$req->email;
        $data->address=$req->address;
        $data->contact=$req->contact;

        $data->save();
        return redirect('searchDist')->with('message','succesfully updated');

}
 public function deletedist($id){

  
     DB::table('users')->where('id',$id)->delete();
     DB::table('distributors')->where('distributor_id',$id)->delete();
     return redirect('searchDist')->with('message','succesfully deleted');

 }

 // list distributors 
 public function searchDist(){

    
    $temp= DB::table('users')
    ->join('distributors','users.id',"=",'distributors.distributor_id')
    ->select('distributors.id as distributor_id', 'users.id' ,'users.username','users.email','users.password','users.address','users.contact')
    ->where('distributors.status',1)
    ->get();
    return view('distributor.listetails',['distributors'=>$temp]);

 }

public function countDistributors(){

   $count = Distributor::where('status', '1')->count();
   print_r ($count);

}
public function viewStaff(){

    
   $temp= DB::table('users')
   ->join('staffs','users.id',"=",'staffs.user_id')
   ->select('staffs.user_id','users.username','users.email','users.password','users.address','users.contact','staffs.distributorname')
   ->where('staffs.status',1)
   ->get();
   return view('distributor.stafflist',['staffs'=>$temp]);
 

}
/*public function showStaffDetails($id){
    
   $data= Staff::find($id);
   return view('distributor.staffupdate',['data'=>$data]);
 }
 */public function showStaffDetails($id){

    // dd($id);
    $data= DB::table('users')
    ->join('staffs','users.id',"=",'staffs.user_id')
    ->select('staffs.user_id','users.id','users.username','users.email','users.password','users.address','users.contact','staffs.distributorname')
    ->where('users.id',$id)
    ->first();

    // dd($data);
    // $data= Staff::find($id);
    return view('distributor.staffupdate',['data'=>$data]);
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
      return redirect('staffall')->with('message','succesfully updated');

  }

  public function deleteStaff(Request $request,$id){
   //dd($request->all());
   Staff::where('id',$id)->delete();
   DB::table('staffs')->where('id',$id)->update(['status'=>0]);
   $request->session()->flash('message','Deleted successfully');
   return redirect('lstaffall');

 }
 public function index(){

   return view('distributor.create');
}


public function addShop(Request $request){
 
  // dd($request->all());

   $data=[
       'shopname' => $request->shopname,
       'email'=>$request->email,
       'address'=>$request->address,
       'contact'=>$request->contact,
       'stock'=>$request->stock,
       'staffname'=>$request->staffname,
      'created_at'=>Carbon::now(),
       'status'=>1
   ];
 
   DB::table('shops')->insert($data);
   return view('distributor.create');

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