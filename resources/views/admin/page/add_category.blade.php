@extends('admin.admin_master') 
@section('admin_main_content')  

<div class="container-fluid">

  <!-- Page Heading -->
  <div class="">
    <div class="col-lg-12">

      <ol class="breadcrumb">
        <li class="active">
          <i class="fa fa-dashboard"></i> Add Category
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

      <form action="{{URL::to('/save-category')}}" method="post">
        @csrf
        <div class="container">

          <div>
            <div class="col-md-6">
              <h1>Add Category</h1>
            </div>
          </div>



          <div style="float:left">

            <div class="col-md-6">

             <div class="form-group">
               <label for="productname" class="loginFormElement" for="categoryname">Category Name:</label>
               <input class="form-control" id="categoryname" type="text" name="category_name" required>
             </div>

            
            <div class="form-group">
              <label class="loginformelement" for="categorydescription" >Category Description</label>
              <textarea  name="category_description" id="rich TextBody" required></textarea>
            </div>

            <div class="form-group">
              <label class="loginformelement" for="publicationstatus" >Status</label>
              <select class="form-control" id="publicationstatus"  type="text" name="category_status" required>
              <option value="1">Publish</option>
              <option value="0">Unpublish</option>
              </select>
            </div>

            <button type="submit" id="loginSubmit" class="btn btn-success loginFormElement">Save</button>

          </div>
        </form>

      </div>

    </div>
    @endsection