@extends('home_master')
@section('main_content')


<div class="product-information">
   @include('pages.left_menu')<!--/product-information-->
<div class="col-sm-9 padding-right">
          <div class="product-details"><!--product-details-->
            <div class="col-sm-5">
              <div class="view-product">
                <img src="{{asset('public/product_image/'.$product_info->product_image)}}" alt="" />
                <h3>ZOOM</h3>
              </div>
              <div id="similar-product" class="carousel slide" data-ride="carousel">
                
                  <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                    <div class="item active">
                      <!--  -->
                      
                    </div>
                    
                    
                  </div>

              </div>

            </div>
            <div class="col-sm-7">
              <div class="product-information"><!--/product-information-->
                <!-- <img src="images/product-details/new.jpg" class="newarrival" alt="" /> -->
                <h2>{{$product_info->product_name}}</h2>
                <p><?php echo $product_info->product_description ?></p>
                <img src="images/product-details/rating.png" alt="" />
                <span>
                  <span>BDT {{$product_info->price}}</span>
                  <label>Quantity:</label>
                  <input type="text" value="{{$product_info->quantity}}" />
                  <button type="button" class="btn btn-fefault cart">
                    <i class="fa fa-shopping-cart"></i>
                   <a href="{{URL::to('/add-to-cart/'.$product_info->product_id)}}">Add to cart</a> 
                  </button>
                </span>
                <p><b>Availability:</b> In Stock</p>
                <p><b>Condition:</b> New</p>
                <?php 
                  $brand_info=DB::table('brand')
                            ->where('brand_id',$product_info->brand_id)
                            ->first();

                ?>
                <p><a href=""><b>Brand:</b>{{$brand_info->brand_name}}</a> </p>
                <!-- <a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a> -->
              </div><!--/product-information-->
            </div>
          </div><!--/product-details-->
          
         <!--  --><!--/category-tab-->
          
          
          
        </div>
      </div>
    </div>

            @endsection