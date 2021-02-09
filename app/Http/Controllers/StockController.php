<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use App\Models\Stock;

class StockController extends Controller
{

    public function index(){

        return view('stock.create');
    }

  public  function addstock(Request $req){

        $data=[

            'productid' => $req->productid,
            'productquantity' =>$req->productquantity,
            'status'=>1,
            'created_at'=>Carbon::now(),
            

        ];
        


        DB::table('stocks')->insert($data);
        
        return redirect('stocklist');
    }

    public function show(){
        $data=Stock::all();
        return view('stock.stocktable',['stocks'=>$data]);
    }

     public function delete(Request $request,$id){

        Stock::where('id',$id)->delete();
        DB::table('stocks')->where('id',$id)->update(['status'=>0]);
        $request->session()->flash('message','Deleted successfully');
        return redirect('stocklist');
     }


     public function ShowStockDetails($id){

        $data=Stock::find($id);
        return view('stock.editstock',['data'=>$data]);
     }

     public function updateStock(Request $req){

        $data=Stock::find($req->Id);
        $data->productid=$req->ProductId;
        $data->productquantity=$req->Productquantity;
        $data->save();
        return redirect('stocklist');

     
     }
}
