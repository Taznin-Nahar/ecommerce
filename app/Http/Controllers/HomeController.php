<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        /*
        $published_blog=DB::table('blog')
                        ->where('publication_status',1)
                        ->orderBy('blog_id','desc')
                        ->skip(2)
                        ->take(4)
                        ->get();
        */
        // $published_blog = DB::table('blog')
        // ->where('publication_status',1)
        // ->orderBy('blog_id','desc')
        // ->paginate(2);

        // $master=view('pages.home_master')
        //         ->with('published_blog',$published_blog);
        //  return view('home')
        //             ->with('main_content',$home_master);
        return view('pages.home');
    }

    public function productDetails($product_id){
         $product_info=DB::table('product')
                        ->where('product_id',$product_id)
                        ->first();


        // $data['hit_counter']=$blog_info->hit_counter+1;
        // DB::table('blog')
        //     ->where('blog_id',$blog_id)
        //     ->update($data);


        $product_details=view('pages.product_details')
                ->with('product_info',$product_info);
         return view('home_master')
                    ->with('main_content',$product_details);


    }


    public function categoryProducts($category_id){

      $category_data=DB::table('category')
                        ->where('category_id',$category_id)
                        ->first();
        $product_data = DB::table('product')
                        ->where('category_id',$category_id)
                        ->get();

        $home_master=view('pages.category_products')
                    ->with('category_data',$category_data)
                    ->with('product_data',$product_data);
         return view('home_master')
                    ->with('main_content',$home_master);
    }


    // public function cart(){
        
    //     view('pages.cart');
    // }


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

    public function contact(){
      $contact=view('pages.contact');
         return view('home')
                    ->with('main_content',$contact);  
    }


    

}
