@extends('home_master')
@section('main_content')

<section>
    <div class="container">
        @include('pages.left_menu')


        <div class="col-sm-9 padding-right">
            <div class="features_items"><!--features_items-->
                <h2 class="title text-center">{{$category_data->category_name}}</h2>



                @foreach($product_data as $v_product_data)

                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{asset('public/product_image/'.$v_product_data->product_image)}}" alt="" />
                                
                               <h2>{{$v_product_data->price}}</h2>
                               <p>{{$v_product_data->product_name}}</p>



                               <a href="{{URL::to('/add-to-cart/'.$v_product_data->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                           </div>
                           <div class="product-overlay">
                            <div class="overlay-content">
                                <h2>{{$v_product_data->price}}</h2>
                                <p><a href="{{URL::to('/product-details/'.$v_product_data->product_id)}}">{{$v_product_data->product_name}}</a></p>
                                <h2 class="title text-center"><a href="{{URL::to('/product-details/'.$v_product_data->product_id)}}">
                                    View Details</a></h2>
                               
                                <a href="{{URL::to('/add-to-cart'.$v_product_data->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                            <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                            <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            @endforeach



        </div><!--features_items-->

        <ul class="pagination">
            <li class="active"><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">&raquo;</a></li>
        </ul>

    </div>



</div>
</section>






@endsection