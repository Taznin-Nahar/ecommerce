@extends('home_master')
@section('main_content')

<style>
header{
	margin: 0;
	/*padding: 80px;*/
	/*font-size: : 40px;*/
	/*background-color: gray;*/
	color: white;
}
/*/**/


.responsive {
	padding: 0 6px;
	float: left;
	width: 24.99999%;
}




h2{
	text-align: center;
	/*padding: 20px;*/
}


*{
	margin: 0;
	padding: 0;
}

.payment{
	background: cadetblue;
	margin: 0px 0px 0px 450 px;
	margin: 0px 0px 0px 300px;
	width: 500px;
	color: black;
	font-size: 18px;
	padding-right: 100px;
	/*border-radius: 20px;*/
	border: 1px solid black;
	box-sizing: border-box;
}
		/*div #register{
			margin-left: 50px;
			}*/
div.label{
		color: white;
		font-family: sans-serif;
		font-style: italic;
		font-size: 18px;


}

.sub{
	width: 150px;
	height: 33px;
	padding: 5px;
	border: none;
	border-radius: 3px;
	outline: 0;
	color: black;
	font-size: 16px;
	font-style: italic;
	font-family: sans-serif;
	font-weight: 700;
}
			
			
</style>

			<div class="payment">
				<h2>Payment Info!</h2>
				<div>
					<?php

					$message=Session::get('message');
					if (isset($message)) {
						echo $message;
						Session::put('message');  
					}


					?>
					<form method="post" style="text-align: left; padding-left: 90px;" action="{{URL::to('/save-order')}}" method="post">
						@csrf
						<div class="md-form">
							<input type="radio" name="payment_type" value="cash_on_delivery">
							<strong>Cash On Delivery</strong>

						</div>

						<div class="md-form">
							<input type="radio" name="payment_type" value="paypal">
							<strong>Paypal</strong>

						</div>
						<br>
						<input type="submit" value="Place Order" class="sub"><br>
					</form>
				</div>

			</div>





@endsection	

