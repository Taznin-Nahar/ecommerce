<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use DB;
use Cart;
use Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){
        // view('pages.cart');
    }


    public function addToCart($product_id)
    {
        $product_info=DB::table('product')
                        ->where('product_id',$product_id)
                        ->first();

        // echo "<pre>";
        //   print_r($product_info);
        //   exit();

          $data=array();
          $data['id']=$product_info->product_id;              
          $data['name']=$product_info->product_name;              
          $data['price']=$product_info->price;              
          $data['qty']=1;              
          $data['options']['image']=$product_info->product_image;

          // echo "<pre>";
          // print_r($data);
          // exit();


          Cart::add($data);
          return Redirect::to('/show-cart');              

         

    }


    public function showCart(){


        $cart=view('pages.show_cart');
                     
         return view('home_master')
                    ->with('page_title','Cart')
                    ->with('main_content',$cart);

    }

    public function deleteToCart($rowId){

        Cart::remove($rowId);
         return Redirect::to('/show-cart');
    }



    public function updateCart(Request $request){

        $qty= $request->quantity;
        $rowId= $request->rowId;
        Cart::update($rowId,$qty);
         return Redirect::to('/show-cart');

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
