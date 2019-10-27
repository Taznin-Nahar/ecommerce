@extends('home_master')
@section('main_content')


<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li class="active">Shopping Cart</li>
			</ol>
		</div>
		<div class="table-responsive cart_info">
			<table class="table table-condensed">
				<thead>
					<tr class="cart_menu">
						<td class="image">Product</td>
						<td class="price">Price</td>
						<td class="quantity">Quantity</td>
						<td class="amount">Amount</td>

						<td></td>
					</tr>
				</thead>
				<?php 
				$contents=Cart::content();

						// echo "<pre>";
						// print_r($contents);
						// exit();

				?>

				<tbody>

					@foreach($contents as $v_contents)
					<tr>
						<td class="cart_product">
							<a href="">
								<img src="{{asset('public/product_image/'.$v_contents->options['image'])}}" alt="" style="width: 150px;">
							</a>
						</td>

						<td class="cart_price">
							<strong>BDT. {{$v_contents->price}}</strong>
						</td>
						<td class="cart_quantity">
							<div class="cart_quantity_button">
								<form action="{{URL::to('/update-cart')}}" method="post" accept-charset="utf-8">
           						 @csrf
								<input class="cart_quantity_input" type="text" name="quantity" value="{{$v_contents->qty}}" autocomplete="off" size="1">
								<input class="cart_quantity_input" type="hidden" name="rowId" value="{{$v_contents->rowId}}" autocomplete="off" size="2">
								<input type="submit" value="Update" />
								</form>
							</div>
						</td>
						<td class="cart_amount">
							<strong class="cart_amount">BDT. {{$v_contents->price * $v_contents->qty }}</strong>
						</td>
						<td class="cart_delete">
							<a class="cart_quantity_delete"  href="{{URL::to('/delete-to-cart/'.$v_contents->rowId)}}"><i class="fa fa-times"></i></a>
						</td>
					</tr>
					@endforeach
					<div class="subtotal" >
						<tr>

							<td class="total"><strong><b style="font-size: 20px;">Total</b></strong></td>
							<td > </td>
							<td class="cart_total" >
								<strong class="cart_total_price" style="float: right; "> BDT. <?php echo Cart::subtotal() ?></strong>
							</td>
							
						</tr>
					</div>


				</tbody>
			</table>
		</div>
	</div>
</section> <!--/#cart_items-->

<section id="do_action">
	<div class="container">
		<div class="heading">
			<h3>What would you like to do next?</h3>
			<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
		</div>
		<div class="row">
				
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Sub Total <span>BDT. <?php echo Cart::subtotal() ?></span></li>
							<li>Tax <span></span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>BDT. <?php echo Cart::total() ?></span></li>
						</ul>

						<?php 

							$user_id=Session::get('user_id');
							$shipping_id=Session::get('shipping_id');

							// echo "<pre>";
							// echo $user_id;
							// exit();

						?>
						
						<tr>
							<?php 

								if ($user_id!=Null && $shipping_id==Null) {
									


							?>
							<td>
								<a class="btn btn-default check_out" href="{{URL::to('/shipping')}}">Complete Purchase</a>
							</td>	
							<?php 
							
								}elseif ($user_id!=Null && $shipping_id!=Null) {
									
							?>	
							<td>
								<a class="btn btn-default check_out" href="{{URL::to('/payment')}}">Complete Purchase</a>

							</td>	
								<?php
									}elseif ($user_id==Null && $shipping_id==Null){ 
										
								?>
							<td>	
								<a class="btn btn-default check_out" href="{{URL::to('/checkout')}}">Complete Purchase</a>
							</td>
							<?php } ?>
						</tr>	
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

	

	@endsection

	
	


