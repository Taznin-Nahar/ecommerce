@extends('home_master')
@section('main_content')

 <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid white;
  box-sizing: border-box;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {

  padding: 16px;
  color: black;
}

span.psw {
  float: left;
  padding-top: 16px;
  color: black;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>

<div class="login">
<h2>Login Form</h2>
<h3 align="centre" style="color:red">
            <?php

                $exception=Session::get('exception');
                if (isset($exception)) {
                  echo $exception;
                  Session::put('exception','');  
                }
            

            ?>
        </h3>
 <h3 align="centre" style="color:white">
            <?php

                $message=Session::get('message');
                if (isset($message)) {
                  echo $message;
                  Session::put('message','');  
                }
            

            ?>
        </h3>

<form action="{{URL::to('/login-check')}}" method="post" accept-charset="utf-8">
  @csrf
 

  <div class="container">
    <label for="uname" style="float: left;"><b>Email</b></label>
    <input type="text" placeholder="Enter Email Address" name="user_mail" required>

    <label for="psw" style="float: left;"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
        
    <button type="submit">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" >
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
</form>







</div>




@endsection

