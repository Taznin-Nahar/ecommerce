@extends('admin.admin_master') 
@section('admin_main_content')  

<div class="container-fluid">

  <!-- Page Heading -->
  <div class="">
    <div class="col-lg-12">

      <ol class="breadcrumb">
        <li class="active">
          <i class="fa fa-dashboard"></i> Edit Brand
        </li>
      </ol>
    </div>
  </div>
  <!-- /.row -->

  <div>
    <div class="col-lg-6 col-lg-offset-3">
      <h3 align="centre" style="color:red">
        <?php

        $message=Session::get('message');
        if (isset($message)) {
          echo $message;
          Session::put('message');  
        }


        ?>
      </h3>

      <form action="{{URL::to('/update-brand')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container">

         <!--  <div>
            <div class="col-md-6">
              <h1>Add Category</h1>
            </div>
          </div>
 -->


          <div style="float:left">

            <div class="col-md-6">

             <div class="form-group">
               <label for="productname" class="loginFormElement" for="categoryname">Brand Name</label>
               <input class="form-control" id="blogtitle" type="text" name="brand_name" value="{{$brand_info->brand_name}}" required>
               <input class="form-control" id="blogid" type="hidden" name="brand_id" value="{{$brand_info->brand_id}}">
             </div>

              <input type="hidden" id="postimage" name="brand_image" value="{{$brand_info->brand_image}}">
              <div class="form-group">
              <label class="loginformelement" for="categorydescription" >Brand Image</label>
              <input type="file" id="postimage" name="brand_image">
              
              <span>
                <img src="{{asset('public/product_image/'.$brand_info->brand_image)}}" width="50" height="50">
              </span>
            </div>

            
            <div class="form-group">
              <label class="loginformelement" for="blodescription" >Brand Description</label>
              <textarea id="rich TextBody"  name="brand_description" required>{{$brand_info->brand_description}}</textarea>

            </div>

            <button type="submit" id="loginSubmit" class="btn btn-success loginFormElement">Update</button>
            <button type="submit" id="Submit" class="btn btn-success loginFormElement">Cancel</button>

          </div>
        </form>

      </div>

    </div>
    @endsection