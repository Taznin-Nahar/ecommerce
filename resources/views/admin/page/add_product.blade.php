@extends('admin.admin_master') 
@section('admin_main_content')  

<div class="container-fluid">

  <!-- Page Heading -->
  <div class="">
    <div class="col-lg-12">

      <ol class="breadcrumb">
        <li class="active">
          <i class="fa fa-dashboard"></i> Add Product
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
          Session::put('message','');  
        }


        ?>
      </h3>

      <form action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container">

          <div>
            <div class="col-md-6">
              <h1>Add Product</h1>
            </div>
          </div>



          <div style="float:left">

            <div class="col-md-6">

             <div class="form-group">
               <label for="productname" class="loginFormElement" for="posttitle">Product Name:</label>
               <input class="form-control" id="posttitle" type="text" name="product_name" required>
             </div>

             <div class="form-group">
               <label for="productname" class="loginFormElement" for="categoryname">Category Name:</label>
               <select class="form-control" id="categoryid" type="text" name="category_id" required>
                @foreach($product_category as $vProduct)

               <option value="{{$vProduct->category_id}}">{{$vProduct->category_name}}</option>
               @endforeach
             </select>
             </div>
             <p></p>

             <div class="form-group">
              <label class="loginformelement" for="categorydescription" >Product Image</label>
              <input type="file" id="postimage" name="product_image" required>
            </div>
            <p></p>

            <div class="form-group">
              <label class="loginformelement" for="categorydescription" >Product Description</label>
              <textarea  name="product_description" id="rich TextBody" required></textarea>
            </div>
            <p></p>

             <div class="form-group">
              <label class="loginformelement" for="publicationstatus" >Brand</label>
              <select class="form-control" id="status"  type="text" name="brand_id" required>
                @foreach($product_brand as $vProduct)

               <option value="{{$vProduct->brand_id}}">{{$vProduct->brand_name}}</option>
               @endforeach
              </select>
            </div>

            <p></p>
            <div class="form-group">
              <label class="loginformelement" for="categorydescription" >Product Price</label>
              <input type="number"  name="price" id="productprice" required></input>
            </div>
            <p></p>

            <div class="form-group">
              <label class="loginformelement" for="categorydescription" >Old Price</label>
              <input  name="old_price" id="oldprice" type="number" required></input>
            </div>
            <p></p>

            <div class="form-group">
               <!-- <label for="productname" class="loginFormElement" for="categoryname">Feature Product:</label> -->
               <span>Feature Product:</span>&nbsp;&nbsp;
               <input class="form-control" type="checkbox" name="feature_product" />
               
             </div>
             <div class="form-group">
               <!-- <label for="productname" class="loginFormElement" for="categoryname">Feature Product:</label> -->
               <span>Special Offer:</span>&nbsp;&nbsp;
               <input class="form-control" type="checkbox" name="special_offer" />
               
             </div>
             <div class="form-group">
               <!-- <label for="productname" class="loginFormElement" for="categoryname">Feature Product:</label> -->
               <span>New Arrival:</span>&nbsp;&nbsp;
               <input class="form-control" type="checkbox" name="new_arrival" />
               
             </div>

             <div class="form-group">
               <label for="productname" class="loginFormElement" for="posttitle">Product Code:</label>
               <input class="form-control" id="posttitle" type="text" name="sku" required>
             </div>
             <p></p>

             <div class="form-group">
              <label class="loginformelement" for="categorydescription" >Product Quantity</label>
              <input type="number"  name="quantity" id="productprice" required></input>
            </div>
            <p></p>
               
            <div class="form-group">
              <label class="loginformelement" for="publicationstatus" >Status</label>
              <select class="form-control" id="status"  type="text" name="status" required>
                <option></option>
              <option value="1">Published</option>
              <option value="0">Unpublished</option>
              </select>
            </div>
            <p></p>

            <button type="submit" id="loginSubmit" class="btn btn-success loginFormElement">Save</button>
            <button type="submit" id="Submit" class="btn btn-success loginFormElement">Cancel</button>

          </div>
        </form>

      </div>

    </div>
    @endsection