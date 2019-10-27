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

.register{
	/*background: cadetblue;*/
	/*margin: 0px 0px 0px 450 px;*/
	/*margin: 0px 0px 0px 300px;*/
	/*width: 500px;*/
	color: black;
	font-size: 18px;
	padding-right: 100px;
	border-radius: 20px;
	border: 1px solid black;
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
			div #name{
				width: 300px;
				/*height: 20px;*/
				padding: 5px;
				border: 1px solid gray;
				outline: 0;
				border-radius: 3px;
				/*text-align: left;*/
			}
			div #ph{
				width: 55px;
				height: 27px;
				padding: 1px;
				border: 1px solid gray;
				border-radius: 3px;
				outline: 0;
			}
			div #num{
				width: 246px;
				/*height: 20px;*/
				padding: 5px;
				border: 1px solid gray;
				border-radius: 3px;
				outline: 0;
			}
			div #sub{
				width: 100px;
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

	<div class="register">
				<h2>Register Here!</h2>
				<div>
					<?php

					$message=Session::get('message');
					if (isset($message)) {
						echo $message;
						Session::put('message');  
					}


					?>
					<form method="post" id="register" style="text-align: left; padding-left: 90px;" action="{{URL::to('/save-data')}}" method="post">
						@csrf

						<label>User Name:</label><br>
						<input type="text" name="user_name" id="name" placeholder="Enter your first name"><br><br>
						<label>Mobile Number:</label><br>
						<input type="number" name="user_contact" id="num" placeholder="Enter your Mobile Number"><br><br>
						<label>Email:</label><br>
						<input type="email" name="user_email" id="name" placeholder="Enter your email"><br><br>
						<label>Password:</label><br>
						<input type="password" name="pass" id="name" placeholder="Enter your password"><br><br>
						<label>Re enter password:</label><br>
						<input type="password" name="pass" id="name" placeholder="Re enter your password"><br><br>
						<input type="submit" value="Submit" id="sub">
					</form>
				</div>

			</div>


	


	@endsection	

