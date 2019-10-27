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

      <form action="{{URL::to('/update-product')}}" method="post" enctype="multipart/form-data">
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
               <label for="productname" class="loginFormElement" for="categoryname">Product Name</label>
               <input class="form-control" id="blogtitle" type="text" name="product_name" value="{{$product_info->product_name}}" required>
               <input class="form-control" id="blogid" type="hidden" name="product_id" value="{{$product_info->product_id}}">
             </div>

             <div class="form-group">
               <label for="productname" class="loginFormElement" for="categoryname">Category Name:</label>
               <select class="form-control" id="categoryid" type="text" name="category_id" >
                <?php

                  $selected_cat=DB::table('category')->where('category_id',$product_info->category_id)
                  ->first();


                ?>

                <option value="{{$selected_cat->category_id}}">{{$selected_cat->category_name}}</option>
                <?php

                  $not_selected_cat=DB::table('category')->where('category_id','!=',$product_info->category_id)
                  ->get();

                ?>
                @foreach($not_selected_cat as $vNot)
                <option value="{{$vNot->category_id}}">{{$vNot->category_name}}</option>
                @endforeach
               </select>
              </div>  


              <input type="hidden" id="postimage" name="product_image" value="{{$product_info->product_image}}">
              <div class="form-group">
              <label class="loginformelement" for="categorydescription" >Product Image</label>
              <input type="file" id="postimage" name="product_image">
              
              <span>
                <img src="{{asset('public/product_image/'.$product_info->product_image)}}" width="50" height="50">
              </span>
            </div>

            
            <div class="form-group">
              <label class="loginformelement" for="blodescription" >Product Description</label>
              <textarea id="rich TextBody"  name="product_description" required>{{$product_info->product_description}}</textarea>

            </div>

            <div class="form-group">
               <label for="productname" class="loginFormElement" for="categoryname">Brand Name:</label>
               <select class="form-control" id="categoryid" type="text" name="brand_id" required>
                <?php

                  $selected_cat=DB::table('brand')->where('brand_id',$product_info->brand_id)
                  ->first();


                ?>

                <option value="{{$selected_cat->brand_id}}">{{$selected_cat->brand_name}}</option>
                <?php

                  $not_selected_cat=DB::table('brand')->where('brand_id','!=',$product_info->brand_id)
                  ->get();

                ?>
                @foreach($not_selected_cat as $vNot)
                <option value="{{$vNot->brand_id}}">{{$vNot->brand_name}}</option>
                @endforeach
               </select>
              </div>  

              <div class="form-group">
              <label class="loginformelement" for="categorydescription" >Product Price</label>
              <input type="number"  name="price" id="productprice" required>{{$product_info->price}}</input>
            </div>
            <p></p>

            <div class="form-group">
              <label class="loginformelement" for="categorydescription" >Old Price</label>
              <input  name="old_price" id="oldprice" type="number" required>{{$product_info->old_price}}</input>
            </div>
            <p></p>

            <div class="form-group">
               <!-- <label for="productname" class="loginFormElement" for="categoryname">Feature Product:</label> -->
               <span>Feature Product:</span>&nbsp;&nbsp;
               <input class="form-control" type="checkbox" name="feature_product" <?php if($product_info->feature_product == 1){echo "checked"; } ?> />
               
             </div>
             <div class="form-group">
               <!-- <label for="productname" class="loginFormElement" for="categoryname">Feature Product:</label> -->
               <span>Special Offer:</span>&nbsp;&nbsp;
               <input class="form-control" type="checkbox" name="special_offer" <?php if($product_info->special_offer == 1){echo "checked"; } ?> />
               
             </div>
             <div class="form-group">
               <!-- <label for="productname" class="loginFormElement" for="categoryname">Feature Product:</label> -->
               <span>New Arrival:</span>&nbsp;&nbsp;
               <input class="form-control" type="checkbox" name="new_arrival" <?php if($product_info->new_arrival == 1){echo "checked"; } ?> />
               
             </div>

             <div class="form-group">
               <label for="productname" class="loginFormElement" for="posttitle">Product Code:</label>
               <input class="form-control" id="posttitle" type="text" name="sku" required>{{$product_info->sku}}</input>
             </div>

             <div class="form-group">
              <label class="loginformelement" for="categorydescription" >Product Quantity</label>
              <input type="number"  name="quantity" id="productprice" required>{{$product_info->quantity}}</input>
            </div>
            <p></p>


            <button type="submit" id="loginSubmit" class="btn btn-success loginFormElement">Update</button>
            <button type="submit" id="Submit" class="btn btn-success loginFormElement">Cancel</button>

          </div>
        </form>

      </div>

    </div>
    @endsection