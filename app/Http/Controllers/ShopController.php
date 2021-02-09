<?php

namespace App\Http\Controllers;
use App\Models\Shop;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class ShopController extends Controller
{

    public function index(){

        return view('shop.create');
    }

    
    public function addShop(Request $request){
      
     

        $data=[
            'shopname' => $request->shopname,
            'email'=>$request->email,
            'address'=>$request->address,
            'contact'=>$request->contact,
            'stock'=>$request->stock,
           'created_at'=>Carbon::now(),
            'status'=>1
        ];
       
        DB::table('shops')->insert($data);
        return view('shop.create');

    }
    public function show(){

       $data=Shop::all();
        return view('shop.shoplist',['shops'=>$data]);
       
     }

 public function showDetails($id){

     $data=Shop::find($id);
     return view('shop.edit',['data'=>$data]);

 }
   public   function update(Request $req){
  
        $data=Shop::find($req->id);
        $data->staffname=$req->StaffName;
        $data->save();
        return redirect('staff/shoplist');
        
     }
     
    public function showShopDetails($id){

      $data=Shop::find($id);
       return view('shop.editshopdetails',['data'=>$data]);
       
    }

    public function updateShop(Request $req){
      
      
        $data=Shop::find($req->id);
      
        $data->shopname=$req->ShopName;
        $data->email=$req->Email;
        $data->contact=$req->Contact;
        $data->staffname=$req->StaffName;
        $data->save();

        return redirect('shoplist');
       
    }
    
    public function delete(Request $request,$id){

        Shop::where('id',$id)->delete();
        DB::table('shops')->where('id',$id)->update(['status'=>0]);
        $request->session()->flash('message','Deleted successfully');
         return redirect('shoplist');
    }

    public function countShop(){

        $count =  Shop::where('status', '1')->count();
        print_r ($count);
      
      }

      public function showShop(){

        $shop = DB::table('shops')->where('status','1')
        ->get(); 
          
        return view ('shop.slist')->with('shoplist',$shop);

      }

    
     public function stockdecreform($id){

          return response(['data'=>$id]);

     }
     public function stockDetails(Request $req){

   
        $data=Shop::find($id);
         return view('shop.reducestock',['data'=>$data]);
         
      }
  
    
public function StockDecrement(Request $req){
             
             

               $shop = DB::table('shops')->where('id',$req->id)
        ->first(); 
        $balancestock=$shop->stock-$req->stock;
       DB::table('shops')->where('id',$req->id)->update(['stock'=>$balancestock]);
             
                 return redirect('shoplist');
         

            }

            public function stockincreform($id){

              return response(['data'=>$id]);
    
         }
         
         
         public function IncrDetails(Request $req){

        
            $data=Shop::find($id);
             return view('shop.addstock',['data'=>$data]);
             
          }
      
          public function StockIncrement(Request $req){
             
           

            $shop = DB::table('shops')->where('id',$req->id)
     ->first(); 
    
     $balancestock=$shop->stock+$req->stock;

    DB::table('shops')->where('id',$req->id)->update(['stock'=>$balancestock]);
          
              return redirect('shoplist');
      

         }


         public function view(){

           return view('shop.demo');
         }
   
   }




    


    












