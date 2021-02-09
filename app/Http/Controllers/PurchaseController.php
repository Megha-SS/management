<?php

namespace App\Http\Controllers;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Stock;
use App\Http\Controllers\ProductController;

use DB;

class PurchaseController extends Controller
{

    public function index(){

        return view('purchase.create');
    }
    public function addpurchase(Request $req){

      // dd($req->all());
        $data=[
            'productid'=>$req->productid,
            'productquantity'=>$req->productquantity,
            'productprice'=>$req->productprice,
            'shop_id'=>$req->shop_id,
            'staff_id'=>$req->staff_id,
            'status'=>1,
            'created_at'=>Carbon::now()
           

        ];
        DB::table('purchases')->insert($data);
        Stock::where('productid',$req->productid)->decrement('productquantity',$req->productquantity);
        return redirect('purchasetablelist');

    }



    public function show(){

        $data= Purchase::all();
        return view('Purchase.purchasetable',['purchases'=>$data]);
       
     } 

     public function showDetails($id){

        $data=Purchase::find($id);
        return view('purchase.purchaseedit',['data'=>$data]);
   
    }
      public   function update(Request $req){
       //dd($req->all());
           $data=Purchase::find($req->id);
           $data->productid=$req->productid;
           $data->productquantity=$req->productquantity;
           $data->productprice=$req->productprice;
           $data->shop_id=$req->shopid;
           $data->staff_id=$req->staffid;
           $data->save();
         
           Stock::where('productid',$req->productid)->decrement('productquantity',$req->productquantity);
           return redirect('purchasetablelist');
          // return redirect('purchasetablelist');
          
        }
        
     public function delete(Request $request,$id){

        Purchase::where('id',$id)->delete();
        DB::table('purchases')->where('id',$id)->update(['status'=>0]);
        $request->session()->flash('message','Deleted successfully');
         return redirect('purchasetablelist');
    }

 


}
