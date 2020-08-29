<!doctype html>
<html lang="en">
 <head><title>	Surya Online Exam </title>
<style>
a.ex1:hover, a.ex1:active {color: red;}
</style>
</head>
 
 <body background="image/back2.png">

<center>
<font color='red' size='20'>Surya Online Exam </font>
Information and Communication Technology (ICT), E - Education, Nepal
<H3>Welcome to all Students </H3>

<hr color='green'>
// <a class="ex1" href="index.php">Home</a> // <a class="ex1" href="onlineSample.php">Online Exam Sample </a> // <a class="ex1" href="download.php">Downloads</a> // <a class="ex1" href="question_data_list.php">Online Questions</a> // <a class="ex1" href="Search_Checking.php">Student Score List </a> // <a class="ex1" href="developer.php">Developer</a> //  
<Hr color='red'>

<?php
$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "suryaonlinedb";
$c="0";

$con = new mysqli($localhost, $username, $password, $dbname);
if( $con->connect_error){
    die('Error: ' . $con->connect_error);
}
$sql = "SELECT * FROM tbl_stud";

if(isset($_GET['search']) )
	{
    $name = mysqli_real_escape_string($con, htmlspecialchars($_GET['search']));
    $sql = "SELECT * FROM tbl_stud WHERE studcode ='$name'";
	if ($name=="all" || $name=="ALL")
		{
	$sql = "SELECT * FROM tbl_stud";

		}
	}
$result = $con->query($sql);
?>
<!DOCTYPE html>
<html>
<head><title>Basic Search form using mysqli</title></head>
<body>
<div class="container">

<form action="" method="GET">
<input type="text" placeholder="Type the name here" name="search">&nbsp;
<input type="submit" value="Search" name="btn" class="btn btn-sm btn-primary">
</form>
<h3>Thank You for Your Exam // Student Result</h3>
<table bgcolor='pink' class="table table-striped table-responsive">
<tr>
<th>Student code</th>
<th>Student Name</th>
<th>Student Catagory</th>
<th>Student Score</th>
</tr>
<?php
while($row = $result->fetch_assoc()){
$c=$c+1;
	?>
    <tr>
    <td><?php echo $row['studcode']; ?></td>
    <td><?php echo $row['studname']; ?></td>
    <td><?php echo $row['studcat']; ?></td>
    <td><?php echo $row['studscore']; ?></td>
    </tr>
    <?php
}
?>
</table>
</div>

</body>
<center>Total Records is = <?php echo $c; ?>
</html>