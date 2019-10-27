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
	padding: 20px;
}


*{
	margin: 0;
	padding: 0;
}

.shipping{
	background: cadetblue;
	/*margin: 0px 0px 0px 450 px;*/
	/*margin: 0px 0px 0px 300px;*/
	/*width: 500px;*/
	color: black;
	font-size: 18px;
	padding-right: 100px;
	border-radius: 20px;
	/*border: 1px solid gray;*/
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
			 .addr{
				width: 250px;
				height: auto;
				padding: 5px;
				border: 1px solid gray;
				outline: 0;
				border-radius: 3px;
				/*text-align: left;*/
			}
			
			.country{
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

			<div class="shipping">
				<h2>Shipping Info!</h2>
				<div>
					<?php

					$message=Session::get('message');
					if (isset($message)) {
						echo $message;
						Session::put('message');  
					}


					?>
					<form method="post" id="register" style="text-align: left; padding-left: 90px;" action="{{URL::to('/save-shipping')}}" method="post">
						@csrf

						<label>User Name:</label><br>
						<input type="text" name="shipping_name" id="name" placeholder="Enter your name"><br><br>
						
						<label>Email:</label><br>
						<input type="email" name="email" id="name" placeholder="Enter your email"><br><br>
						
						<label>Mobile Number:</label><br>
						<input type="text" name="contact" id="num" placeholder="Enter your Mobile Number"><br>
						<input type="hidden" name="user_id" id="num" value="<?php echo Session::get('user_id')?>"><br>
						<label>Address:</label><br>
						<textarea type="text" name="address" class="addr"></textarea><br><br>
						<label>City:</label><br>
						<input type="text" name="city"  placeholder="Enter your city"><br><br>
						<label>Country:</label><br>
						<select class="country" name="country" >
							<option>United States</option>
							<option>Bangladesh</option>
							<option>UK</option>
							<option>India</option>
							<option>Pakistan</option>
							<option>Ucrane</option>
							<option>Canada</option>
							<option>Dubai</option>
						</select><br><br>
						<label>Zip Code:</label><br>
						<input type="text" name="zip_code"  placeholder="Enter"><br><br>
						<input type="submit" value="Save Shipping" class="sub">
					</form>
				</div>

			</div>





			@endsection	

