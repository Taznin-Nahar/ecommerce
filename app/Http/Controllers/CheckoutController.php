<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use Session;
use file;
use Cart;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // $this->userAuthCheck();
     return view('pages.login'); 
    }

    public function registration(){

        $checkout=view('pages.checkout');
        return view('home_master')
                ->with('page_title','Checkout')
                ->with('main_content',$checkout);
    }

    public function saveData(Request $request){
    $data=array();

    $data['user_name']=$request->user_name;
    $data['user_contact']=$request->user_contact;
    $data['user_email']=$request->user_email;
    $data['password']=$request->pass;
        // echo "<pre>";
        //  print_r($data);
        // exit();

    DB::table('tbl_user')->insert($data);
    Session::put('message',"Successfully Registered!!");
    return Redirect::to('/checkout'); 
}


    public function logIn(Request $request){

     $email=$request->user_mail;
       $password=$request->psw;

       $result = DB::table('tbl_user')
       ->where('user_email', $email)
       ->where('password',md5($password))
       ->first();



                // 
       if ($result) {
                    # code...
        Session::put('user_name',$result->user_name);
        Session::put('user_id',$result->user_id);
                    // return view('admin.admin_master');
        return Redirect::to('/billing-address');
    }else{
        Session::put('exception','User ID or password invalid!');
        return Redirect::to('/login');
    }



    }


//     public function userAuthCheck(){
//     $user_id=Session::get('user_id');

//     if ($user_id) {
//        return Redirect::to('/billing-address')->send();
//    }else{

//     return;
// }
// }


public function billingAddress(){

    $billing=view('pages.billing');
        return view('home_master')
                ->with('page_title','Checkout')
                ->with('main_content',$billing);


}


public function saveBilling(Request $request){

$data=array();
    
    $user_id=$request->user_id;
    $data['user_contact']=$request->user_contact;
    $data['address']=$request->address;
    $data['city']=$request->city;
    $data['country']=$request->country;
    $data['zip_code']=$request->zip_code;
        // echo "<pre>";
        //  print_r($data);
        // exit();

    DB::table('tbl_user')
        ->where('user_id',$user_id)
        ->update($data);
        return Redirect::to('/shipping');

}

public function shipping(){

$shipping=view('pages.shipping');
        return view('home_master')
                ->with('page_title','Checkout')
                ->with('main_content',$shipping);
}

public function saveShipping(Request $request){
    $data=array();

    $data['shipping_name']=$request->shipping_name;
    $data['email']=$request->email;
    $data['contact']=$request->contact;
    $data['address']=$request->address;
    $data['city']=$request->city;
    $data['country']=$request->country;
    $data['zip_code']=$request->zip_code;
        // echo "<pre>";
        //  print_r($data);
        // exit();

       $shipping_id=DB::table('shipping')->insertGetId($data);

       Session::put('shipping_id',$shipping_id);
        return Redirect::to('/payment');

}

public function payment(){
    
    $payment=view('pages.payment');
        return view('home_master')
                ->with('page_title','Payment')
                ->with('main_content',$payment);
}


public function saveOrder(Request $request){
    $payment_type=$request->payment_type;

    $pdata=array();
    $pdata['payment_type']=$payment_type;
    $pdata['payment_status']='pending';

    $payment_id=DB::table('payment')->insertGetId($pdata);


    $odata=array();
    $odata['user_id']=Session::get('user_id');
    $odata['shipping_id']=Session::get('shipping_id');
    $odata['payment_id']= $payment_id;
    $odata['order_total']= \Cart::total(null,null,'');

     $order_id=DB::table('order')->insertGetId($odata);


     $oddata=array();
     $oddata['order_id']=$order_id;

     $contents=Cart::content();

     foreach ($contents as $v_contents) {
         $oddata['product_id']=$v_contents->id;
         $oddata['product_name']=$v_contents->name;
         $oddata['product_price']=$v_contents->price;
         $oddata['product_quantity']=$v_contents->qty;

          DB::table('order_details')->insert($oddata);
     }

    if($payment_type=='cash_on_delivery'){
        echo "order save! payment type cash on delivery";
    }

    // if ($payment_type== paypal) {
    //     echo "Unavialable";

    // }

}

public function logout(){
        Session::put('user_name','');
        Session::put('user_id','');
        Session::put('message',"You are successfully logout!");
        return Redirect::to('/login');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
