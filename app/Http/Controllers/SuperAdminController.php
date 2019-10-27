<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use DB;
use file;
session_start();

class SuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authCheck();
        $admin_home= view('admin.page.admin_home');
        return view('admin.admin_master')
                    ->with('admin_main_content',$admin_home);
    }

    public function addCategory(){

        $this->authCheck();
        $add_category_page= view('admin.page.add_category');
        return view('admin.admin_master')
                    ->with('admin_main_content',$add_category_page);
    }

    public function saveCategory(Request $request){
        $data=array();
        
        $data['category_name']=$request->category_name;
        $data['category_description']=$request->category_description;
        $data['category_status']=$request->category_status;
        // echo "<pre>";
        //  print_r($data);
        // exit();

         DB::table('category')->insert($data);
         Session::put('message',"Category Saved successfully!!");
         return Redirect::to('/add-category');    

    }


    public function manageCategory(){

       $this->authCheck();
       $all_category = DB::table('category')->get();
                // echo "<pre>";
                // print_r($all_category);
                // exit();
        $manage_category=view('admin.page.manage_category')
                    ->with('all_category_info',$all_category);

        return view('admin.admin_master')
                    ->with('manage_category',$manage_category);
                    

    }

     public function unpublishedCategory($category_id){

        // echo "<pre>";
        // print_r($category_id);
        // exit();
        DB::table('category')
            ->where('category_id', $category_id)
            ->update(['category_status' => 0]);
            return Redirect::to('/manage-category');
    }

    public function publishedCategory($category_id){

        // echo "<pre>";
        // print_r($category_id);
        // exit();
        DB::table('category')
            ->where('category_id', $category_id)
            ->update(['category_status' => 1]);
            return Redirect::to('/manage-category');
    }

     public function deleteCategory($category_id){

        // echo "<pre>";
        // print_r($category_id);
        // exit();
        DB::table('category')
            ->where('category_id', $category_id)
            ->delete();
            return Redirect::to('/manage-category');
    }

    public function editCategory($category_id){

        // echo "<pre>";
        // print_r($category_id);
        // exit();
       $category_info=DB::table('category')
            ->where('category_id', $category_id)
            ->first();
          $edit_category=view('admin.page.edit_category')
                           ->with('category_info',$category_info) ;  
         return view('admin.admin_master')
                    ->with('manage_category',$edit_category);
    }

    public function updateCategory(Request $request){

        $data=array();
        $data['category_name']= $request->category_name;
        $data['category_description']= $request->category_description;
        $category_id=$request->category_id;
        // echo "<pre>";
        // print_r($category_id);
        // exit();

         DB::table('category')
            ->where('category_id', $category_id)
            ->update($data);

             return Redirect::to('/manage-category');



    }

    public function addBrand(){

        $this->authCheck();
        $add_brand_page= view('admin.page.add_brand');
        return view('admin.admin_master')
                    ->with('admin_main_content',$add_brand_page);
    }

     public function saveBrand(Request $request){
        $data=array();
        
        $data['brand_name']=$request->brand_name;
        $data['brand_description']=$request->brand_description;
        
        $data['brand_status']=$request->brand_status;
        // echo "<pre>";
        //  print_r($data);
        //  print_r($_FILES);
        // exit();

        $image = $request->file('brand_image');
            if ($image) {
                $file_size = $image->getClientSize();
                $name = str_random(20);
                $extension = $image->getClientOriginalExtension();
                $image_name = $name . '.' . $extension;
                $upload_path = 'public/product_image/';
                //-------- Check image format ----------//
                if ($extension == 'JPG' || $extension == 'jpg' || $extension == 'png' || $extension == 'PNG' || $extension == 'JPEG' || $extension == 'jpeg') {
                    //------ Check file size --------//
                    if ($file_size < 51200000) {
                        $success = $image->move($upload_path, $image_name);
                        $data['brand_image'] = $image_name;
                        $result = DB::table('brand')->insert($data);
                    } else {
                        return Redirect::to('add-brand')->with('message', 'Maximum file size is 5MB');
                    }
                } else {
                    return Redirect::to('add-brand')->with('message', 'File type not supported...!');
                }
            } else {
                $result = DB::table('brand')->insert($data);
            }

            if ($result) {
                return Redirect::to('add-brand')->with('message', ' Added Successfully!!');
            } else {
                return Redirect::to('add-brand')->with('message', 'There is a error Saving Data!!');
            }

            
        //     echo "<pre>";
        //  print_r($data);
        //  print_r($_FILES);
        // exit();

         // DB::table('blog')->insert($data);
         // Session::put('message',"Blog Saved successfully!!");
         // return Redirect::to('/add-blog');    

    }

     public function manageBrand(){
          $this->authCheck();
       $all_brand = DB::table('brand')
                    ->get();
                // echo "<pre>";
                // print_r($all_category);
                // exit();
        $manage_brand=view('admin.page.manage_brand')
                    ->with('all_brand_info',$all_brand);

        return view('admin.admin_master')
                    ->with('manage_brand',$manage_brand);

    }

    public function unpublishedBrand($brand_id){
          DB::table('brand')
            ->where('brand_id', $brand_id)
            ->update(['brand_status' => 0]);
            return Redirect::to('/manage-brand');
    }

    public function publishedBrand($brand_id){
        DB::table('brand')
            ->where('brand_id', $brand_id)
            ->update(['brand_status' => 1]);
            return Redirect::to('/manage-brand');

    }

    public function editBrand($brand_id){

        $brand_info=DB::table('brand')
            ->where('brand_id', $brand_id)
            ->first();


         $brand_status=DB::table('brand')
                            ->get();

          $edit_brand=view('admin.page.edit_brand')
                           ->with('brand_info',$brand_info)
                           ->with('brand_status',$brand_status) ;

         return view('admin.admin_master')
                    ->with('manage_brand',$edit_brand);
    }


    public function updateBrand(Request $request){

        $data=array();
        $data['brand_name']= $request->brand_name;
        $data['brand_description']= $request->brand_description;
        $brand_id=$request->brand_id;
        // echo "<pre>";
        // print_r($data);
        // exit();
        $image = $request->file('brand_image');
            if ($image) {
                $file_size = $image->getClientSize();
                $name = str_random(20);
                $extension = $image->getClientOriginalExtension();
                $image_name = $name . '.' . $extension;
                $upload_path = 'public/product_image/';
                //-------- Check image format ----------//
                if ($extension == 'JPG' || $extension == 'jpg' || $extension == 'png' || $extension == 'PNG' || $extension == 'JPEG' || $extension == 'jpeg') {
                    //------ Check file size --------//
                    if ($file_size < 51200000) {
                        $success = $image->move($upload_path, $image_name);
                        if ($request->product_image) {
                            //$old_image_path = $request->old_blog_image;
                            //unlink('public/products/' . $old_blog_image);
          unlink('public/product_image/' . $request->product_image);
                        }
                        $data['brand_image'] = $image_name;
//                        echo "<pre>";
//            print_r($data);
//            exit();
                        $result = DB::table('brand')->where('brand_id', $request->brand_id)->update($data);
                    } else {
                        return Redirect::to('edit-brand/'.$request->brand_id)->with('message', 'Maximum file size is 5MB');
                    }
                } else {
                    return Redirect::to('edit-brand/'.$request->brand_id)->with('message', 'File type not supported...!');
                }
            } else {

                $data['brand_image'] = $request->product_image;
                $result = DB::table('brand')->where('brand_id', $request->brand_id)->update($data);
//                $result = DB::table('tbl_products')->where('product_id', $request->product_id)->first();
//                                echo "<pre>";
//            print_r($result);
//            exit();
            }
            //------------- End Image Upload Section -------------- //

if ($result) {
                return Redirect::to('edit-brand/'.$request->brand_id)->with('message', ' Added Successfully!!');
            } else {
                return Redirect::to('edit-brand/'.$request->brand_id)->with('message', 'There is a error Saving Data!!');
            }

         // DB::table('blog')
         //    ->where('blog_id', $blog_id)
         //    ->update($data);

         //     return Redirect::to('/manage-blog');



    }


    public function deleteBrand($brand_id){

        // echo "<pre>";
        // print_r($category_id);
        // exit();
        DB::table('brand')
            ->where('brand_id', $brand_id)
            ->delete();
            return Redirect::to('/manage-brand');
    }



    public function addProduct(){
         $product_category=DB::table('category')
            ->where('category_status',1)
            ->get();
            $product_brand=DB::table('brand')
            ->where('brand_status',1)
            ->get();

        $add_product_page=view('admin.page.add_product')
                        ->with('product_category',$product_category)
                        ->with('product_brand',$product_brand);
        return view('admin.admin_master')
                    ->with('admin_main_content',$add_product_page);

    }

     public function saveProduct(Request $request){
        $data=array();
        
        $data['product_name']=$request->product_name;
        $data['category_id']=$request->category_id;
        $data['product_description']=$request->product_description;
        // $data['blog_image']='';
        $data['brand_id']=$request->brand_id;
        $data['price']=$request->price;
        $data['old_price']=$request->old_price;
        $data['feature_product']=$request->feature_product;
        $data['special_offer']=$request->special_offer;
        $data['new_arrival']=$request->new_arrival;
        $data['sku']=$request->sku;
        $data['quantity']=$request->quantity;
        $data['status']=$request->status;

        if ($request->feature_product) {
            $data['feature_product'] = 1;
        }else{
            $data['feature_product'] = 0;
        }

        if ($request->special_offer) {
            $data['special_offer'] = 1;
        }else{
            $data['special_offer'] = 0;
        }

        if ($request->new_arrival) {
            $data['new_arrival'] = 1;
        }else{
            $data['new_arrival'] = 0;
        }
        // echo "<pre>";
        //  print_r($data);
        //  print_r($_FILES);
        // exit();

        $image = $request->file('product_image');
            if ($image) {
                $file_size = $image->getClientSize();
                $name = str_random(20);
                $extension = $image->getClientOriginalExtension();
                $image_name = $name . '.' . $extension;
                $upload_path = 'public/product_image/';
                //-------- Check image format ----------//
                if ($extension == 'JPG' || $extension == 'jpg' || $extension == 'png' || $extension == 'PNG' || $extension == 'JPEG' || $extension == 'jpeg') {
                    //------ Check file size --------//
                    if ($file_size < 51200000) {
                        $success = $image->move($upload_path, $image_name);
                        $data['product_image'] = $image_name;
                        $result = DB::table('product')->insert($data);
                    } else {
                        return Redirect::to('add-product')->with('message', 'Maximum file size is 5MB');
                    }
                } else {
                    return Redirect::to('add-product')->with('message', 'File type not supported...!');
                }
            } else {
                $result = DB::table('product')->insert($data);
            }

            if ($result) {
                return Redirect::to('add-product')->with('message', ' Added Successfully!!');
            } else {
                return Redirect::to('add-product')->with('message', 'There is a error Saving Data!!');
            }

         // DB::table('blog')->insert($data);
         // Session::put('message',"Blog Saved successfully!!");
         // return Redirect::to('/add-blog');    

    }


    public function manageProduct(){
          $this->authCheck();
       $all_product = DB::table('product')
                    ->get();
                // echo "<pre>";
                // print_r($all_category);
                // exit();
        $manage_product=view('admin.page.manage_product')
                    ->with('all_product_info',$all_product);

        return view('admin.admin_master')
                    ->with('manage_product',$manage_product);

    }

     public function unpublishedProduct($product_id){

        // echo "<pre>";
        // print_r($category_id);
        // exit();
        DB::table('product')
            ->where('product_id', $product_id)
            ->update(['status' => 0]);
            return Redirect::to('/manage-product');
    }

    public function publishedProduct($product_id){
        DB::table('product')
            ->where('product_id', $product_id)
            ->update(['status' => 1]);
            return Redirect::to('/manage-product');

    }

    public function deleteProduct($product_id){

        // echo "<pre>";
        // print_r($category_id);
        // exit();
        DB::table('product')
            ->where('product_id', $product_id)
            ->delete();
            return Redirect::to('/manage-product');
    }

    public function editProduct($product_id){

        $product_info=DB::table('product')
            ->where('product_id', $product_id)
            ->first();


         $status=DB::table('product')
                            ->get();

          $edit_product=view('admin.page.edit_product')
                           ->with('product_info',$product_info)
                           ->with('status',$status) ;

         return view('admin.admin_master')
                    ->with('manage_product',$edit_product);
    }


    public function updateProduct(Request $request){

        $data=array();
        $data['product_name']= $request->product_name;
        $data['product_description']= $request->product_description;
        $data['price']= $request->price;
        $data['old_price']= $request->old_price;
        $data['sku']= $request->sku;
        $data['quantity']= $request->quantity;
        $product_id=$request->product_id;
        // echo "<pre>";
        // print_r($data);
        // exit();
        $image = $request->file('product_image');
            if ($image) {
                $file_size = $image->getClientSize();
                $name = str_random(20);
                $extension = $image->getClientOriginalExtension();
                $image_name = $name . '.' . $extension;
                $upload_path = 'public/product_image/';
                //-------- Check image format ----------//
                if ($extension == 'JPG' || $extension == 'jpg' || $extension == 'png' || $extension == 'PNG' || $extension == 'JPEG' || $extension == 'jpeg') {
                    //------ Check file size --------//
                    if ($file_size < 51200000) {
                        $success = $image->move($upload_path, $image_name);
                        if ($request->old_blog_image) {
                            //$old_image_path = $request->old_blog_image;
                            //unlink('public/products/' . $old_blog_image);
          unlink('public/product_image/' . $request->old_blog_image);
                        }
                        $data['product_image'] = $image_name;
//                        echo "<pre>";
//            print_r($data);
//            exit();
                        $result = DB::table('product')->where('product_id', $request->product_id)->update($data);
                    } else {
                        return Redirect::to('edit-product/'.$request->product_id)->with('message', 'Maximum file size is 5MB');
                    }
                } else {
                    return Redirect::to('edit-product/'.$request->product_id)->with('message', 'File type not supported...!');
                }
            } else {

                $data['product_image'] = $request->product_image;
                $result = DB::table('product')->where('product_id', $request->product_id)->update($data);
//                $result = DB::table('tbl_products')->where('product_id', $request->product_id)->first();
//                                echo "<pre>";
//            print_r($result);
//            exit();
            }
            //------------- End Image Upload Section -------------- //

if ($result) {
                return Redirect::to('edit-product/'.$request->product_id)->with('message', ' Added Successfully!!');
            } else {
                return Redirect::to('edit-product/'.$request->product_id)->with('message', 'There is a error Saving Data!!');
            }

         // DB::table('blog')
         //    ->where('blog_id', $blog_id)
         //    ->update($data);

         //     return Redirect::to('/manage-blog');



    }



    

    

    public function authCheck(){
        $admin_id=Session::get('admin_id');

        if ($admin_id) {
            return;
        }else{

            return Redirect::to('/admin')->send();
        }
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
