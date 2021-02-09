<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Mail\SendMail;
use App\Models\Shop;
use Carbon\Carbon;

use DB;

class StaffController extends Controller
{
    public function show(){


       $data= Staff::all();
       return view ('staff.stafftable',['staffs'=>$data]);


  }
  public function showDetails($id){
 
    $data= Staff::find($id);
   
    return view('staff.staffedit',['data'=>$data]);
  }
  
  public function assignDistributor(Request $req){
  


    
     $data=Staff::where('user_id',$req->Id)->first();
  
     $data->distributorname=$req->DistributorName;
     $data->save();
     return redirect('lstaffall')->with('message','succesfully updated');
  }
  
  public function showStaffDetails($id){
    
    $data= Staff::find($id);
    return view('staff.staffupdate',['data'=>$data]);
  }

  
  public function updatestaff(Request $req){
    
      $data=Staff::find($req->id);
      $data->username=$req->username;
      $data->email=$req->email;
      $data->address=$req->address;
      $data->contact=$req->contact;
      $data->distributorname=$req->DistributorName;
      $data->save();
      return redirect('list')->with('message','succesfully updated');

   }

  
  public function deleteStaff(Request $request,$id){
    
    Staff::where('id',$id)->delete();
    DB::table('staffs')->where('id',$id)->update(['status'=>0]);
    $request->session()->flash('message','Deleted successfully');
    return redirect('stafflist');

  }
    
  // list staffs 
/* public function viewStaff(){

    
  $temp= DB::table('users')
  ->join('staffs','users.id',"=",'staffs.user_id')
  ->select('staffs.user_id','users.username','users.email','users.password','users.address','users.contact','staffs.distributorname')
  ->where('staffs.status',1)
  ->get();
  return view('staff.stafflistdet',['staffs'=>$temp]);

}
*/
public function countStaff(){

  $count =  Staff::where('status', '1')->count();
  print_r ($count);

}

public function index(){

  return view('staff.create');
}


public function addShop(Request $request){



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
  return view('staff.create')->with('message','succesfully added');

}


public function showShop(){

  $data=Shop::all();
   return view('shop.listShop',['shops'=>$data]);
  
}
public function countShop(){

  $count =  Shop::where('status', '1')->count();
  print_r ($count);

}

}
