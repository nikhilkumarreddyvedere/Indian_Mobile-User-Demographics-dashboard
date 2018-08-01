<html class="">

<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<body data-gr-c-s-loaded="true" style="" cz-shortcut-listen="true">

<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">INSAID - International School of AI & Data Science</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          
          
        </div><!--/.nav-collapse -->
      </div>
    </nav>


<br><br>





<div class="container">
<div class="row">
<div class="col-md-4 col-md-offset-4 well" style="
    background: #fff;
    color: #666;
    box-shadow: 0 5px 15px rgba(0,0,0,.08);margin-top:58px;
"><br>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
h1{font-family:Arial, Helvetica, sans-serif;color:#999999;}
</style>
<br>
<form role="form" id="form"  name="loginform" method ="post">
<fieldset>
<legend>Login</legend>
<div class="form-group">
<label for="group_id">group id</label>
<input id ="group_id" type="text" name="group_id" placeholder="Enter your group id"  class="form-control">
</div>
<div class="form-group">
<label for="name">Password</label>
<input id="password" type="password" name="password" placeholder="Your Password"  class="form-control">
</div>
<div class="form-group">
<input id="submit" type="button" name="login" value="Login" class="btn btn-primary">
</div>
</fieldset>
</form>
<span class="text-danger"></span>
</div>
</div>
<div class="row">

</div>
</div>


</body></html>



<script>
$(document).ready( function()
{
$('#submit').click( function()
{
 var groupid = $('#group_id').val();
 var password = $('#password').val();

var dataString = 'groupid1=' + groupid+ '&password1='+password;

if(groupid==''||password=='')
{

alert("please fill both the  feilds");
}

else
{

$.ajax({

type:"POST",
url:"ajaxlogin.php",
data: dataString,
cache:false,
success: function(result)
{


if (!$.trim(result)){   
    alert("Invalid credentials");
}
else{   
    

window.location.href = "../capstone1/index.php";

}

}
});



}

});

});

</script>
