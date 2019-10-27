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
				<h2>Order Complete!</h2>
				<div>
					<?php

					$message=Session::get('message');
					if (isset($message)) {
						echo $message;
						Session::put('message');  
					}


					?>
					

						<div class="md-form">
							<h3>Your Order Successfully Complete. Please check your email for confirmation. We will contact you soon</h3>

						</div>
						<br>
						
					
				</div>

			</div>





@endsection	

