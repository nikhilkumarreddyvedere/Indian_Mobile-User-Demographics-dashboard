

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
<ul class="nav navbar-nav navbar-right">
            <li><a href="../capstone1/logout.php">logout</a>
</li>
          </ul>          
          
        </div><!--/.nav-collapse -->
      </div>
    </nav>


<br>
<?php
define('MB', 1048576);

//PUT THIS HEADER ON TOP OF EACH UNIQUE PAGE
session_start();

if (!isset($_SESSION['group_id'])) {
    header("location: ../capstone1/login.php");
}


$conn = mysqli_connect("127.0.0.1", "root", "root", "Capstone_Projects");

if (isset($_POST["import"])) {

    $fileName = $_FILES["file"]["tmp_name"];

    if ($_FILES["file"]["size"] > 6 * MB) {

          echo "error file size greater than 7MB";
         }
else
{
        $file = fopen($fileName, "r");
        while (($column = fgetcsv($file, 1000, ",")) !== FALSE) {
          

  $sqlInsert = "INSERT INTO `user_data`(`event_id`, `device_id`, `timestamp`, `longitude`, `latitude`, `user_id`)
                   values ('" . $column[0] . "','" . $column[1] . "','" . $column[2] . "','" . $column[3] . "','" . $column[4] . "' ,'".$_SESSION['group_id']."')";
           
 $result = mysqli_query($conn, $sqlInsert);
           

            if (! empty($result)) {
                $type = "success";
                $message = "CSV Data Imported into the Database";
            } else {
                $type = "error";
                $message = "Problem in Importing CSV Data";
            }
        }
    }

}
?>


<!DOCTYPE html> <html> <head> 
<style>
body {
	font-family: Arial;
	width: 550px;
}

.outer-scontainer {
	background: #F0F0F0;
	border: #e0dfdf 1px solid;
	padding: 20px;
	border-radius: 2px;
}

.input-row {
	margin-top: 0px;
	margin-bottom: 20px;
}

.btn-submit {
	background: #333;
	border: #1d1d1d 1px solid;
	color: #f0f0f0;
	font-size: 0.9em;
	width: 100px;
	border-radius: 2px;
	cursor: pointer;
}

.outer-scontainer table {
	border-collapse: collapse;
	width: 100%;
}

.outer-scontainer th {
	border: 1px solid #dddddd;
	padding: 8px;
	text-align: left;
}

.outer-scontainer td {
	border: 1px solid #dddddd;
	padding: 8px;
	text-align: left;
}

#response {
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 2px;
    display:none;
}
.success {
    background: #c7efd9;
    border: #bbe2cd 1px solid;
}
.error {
    background: #fbcfcf;
    border: #f3c6c7 1px solid;
}
div#response.display-block {
    display: block;
}
</style> <script type="text/javascript">
$(document).ready(function() {
    $("#frmCSVImport").on("submit", function () {
	    $("#response").attr("class", "");
        $("#response").html("");
        var fileType = ".csv";
        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + fileType + ")$");
        if (!regex.test($("#file").val().toLowerCase())) {
        	    $("#response").addClass("error");
        	    $("#response").addClass("display-block");
            $("#response").html("Invalid File. Upload : <b>" + fileType + "</b> Files.");
            return false;
        }
        return true;
    });
});
</script>
 <div id="response" style="margin-left: 60%;width: 100%;margin-top: 20%; */"  class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>

<form class="form-horizontal" action="" method="post" name="frmCSVImport" id="frmCSVImport" enctype="multipart/form-data" style="
    width: 1000px;
    margin-top: 20%;
    margin-left: 180px;
    margin-right: 150px;
">
                <div class="input-row">
                    <label class="col-md-4 control-label" style="
    padding-top: 0px;
">Import myevents.csv file   
                        </label> <input type="file" name="file" id="file" accept=".csv" style="
    display:  inline-block;
">
<button type="submit" id="submit" name="import" class="btn-submit" style="
    height: 5%;
    background-color: 008CBA;
    border: none;
    color: white;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    cursor: pointer;
">Import</button>
                    <br>
                </div>
            </form>







 </head> <body>



    <div class="outer-scontainer" style="
    width: 1000px;margin-left: 180px;
    margin-right: 150px;
" >

<b> Preview of data from database </b>

<div style="display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 2rem;">
<a href="http://projects.insaid.co:8000/">
    <button id="mBtn" type="button" style="height: 7%;background-color: 008CBA; border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer;">Review Dashborad</button>
</a></div>


        <div class="row">
        </div>



      
<?php
$sqlSelect = "SELECT * FROM user_data limit 10";

$result = mysqli_query($conn, $sqlSelect);
            
if (mysqli_num_rows($result) > 0) {
?>
<table id='userTable'>
    <thead>
        <tr>
            <th>Event ID</th>
            <th>divce id</th>
            <th>time stamp</th>
            <th>Longitude </th>
            <th>Latitude </th>
<th>group_id </th>

        </tr>
    </thead>
    <?php
	while ($row = mysqli_fetch_array($result)) {
    ?>

    <tbody>
        <tr>
            <td><?php  echo $row['event_id']; ?></td>
            <td><?php  echo $row['device_id']; ?></td>
            <td><?php  echo $row['timestamp']; ?></td>
            <td><?php  echo $row['longitude']; ?></td>
            <td><?php  echo $row['latitude']; ?></td>
             <td><?php  echo $row['user_id']; ?></td>

        </tr>
     <?php
     }
     ?>
    </tbody>
</table>
<?php } else

{
echo" <p style='text-align:  center;'>No preview data available please upload the csv file</p>";

echo "<script>  $('#mBtn').click(function(){ alert('please upload the .csv file to preview the database'); });</script>";
}

 ?>
</div>
</body>
</html>

