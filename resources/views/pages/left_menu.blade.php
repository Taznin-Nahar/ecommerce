<div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Category</h2>
                    <div class="panel-group category-products" id="accordian">
                        <?php

                        $all_category=DB::table('category')
                        ->where('category_status',1)
                        ->get();

                        ?>
                        @foreach($all_category as $vCategory)
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="{{URL::to('/category-products/'.$vCategory->category_id)}}">{{$vCategory->category_name}}</a></h4>
                            </div>
                        </div>
                        @endforeach

                        

                    </div><!--/category-products-->
                    
                    <div class="brands_products"><!--brands_products-->
                        <h2>Brands</h2>
                        <div class="panel-group category-products" id="accordian">
                            <?php

                            $all_brand=DB::table('brand')
                            ->where('brand_status',1)
                            ->get();

                            ?>
                            @foreach($all_brand as $vBrand)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="#">{{$vBrand->brand_name}}</a></h4>
                                </div>
                            </div>
                            @endforeach



                        </div>
                    </div><!--/brands_products-->

                    <div class="price-range"><!--price-range-->
                        <h2>Price Range</h2>
                        <div class="well text-center">
                         <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                         <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
                     </div>
                 </div><!--/price-range-->

                 <div class="shipping text-center"><!--shipping-->
                    <img src="{{asset('public/frontend_resource/images/home/shipping.jpg')}}" alt="" />
                </div><!--/shipping-->

            </div>
        </div>