<html>
 <head><title>	Surya Online Exam </title>
<style>
a:hover {
  background-color: yellow;
}
</style>

<script>
function play() 
{
  var cat = document.getElementById("text3").value;
  document.getElementById("demo").value=cat
}
</script>
</head>
 
<body background="image/back2.png" >

<center>
<font color='red' size='20'>Surya Online Exam </font>
Information and Communication Technology (ICT), E - Education, Nepal
<H3> Welcome to all Students </H3>

<hr color='green'>
// <a href="index.php">Home</a> // <a href="onlineSample.php">Online Exam Sample </a> // <a href="download.php">Downloads</a> // <a href="question_data_list.php">Online Questions</a> // <a href="Search_Checking.php">Student Score List </a> // <a href="developer.php">Developer</a> //  
<Hr color='red'>

<?php
$conn ="";
	global $n;
	global $n1;
	global $n2;
	global $n3;

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "suryaonlinedb";

if (!isset($_POST['save'])) 
{
$n= strtoupper($_POST['txtname']);
$n1= strtoupper(substr($n, 0, 2) . "@". strlen($n));
$n2= "ten";
$n3 = 0;
}

if (isset($_POST['text2']) || isset($_POST['text1'])  || isset($_POST['text3']) || isset($_POST['text4']))
{
$n= ($_POST['text2']);
$n1= ($_POST['text1']);
$n2= ($_POST['text3']);
$n3= ($_POST['text4']);
}
?>

<form method="post" action="question.php">
<table bgcolor='pink'>
<tr><td style="background-color:#ccff66">Student Name : <input type="text" id="text2" name="text2" value= <?php echo strtoupper($_POST['txtname']); ?>></td></tr>
<tr><td> Security Code : <input type="text" id="text1" name="text1" value= <?php echo @$n1; ?>></td><tr>
<tr><td style="background-color:#ccff66">Select Catagory :
<select id="text3" name="text3" onchange="play()">
  <option value="ten"> ten </option>
  <option value="nine"> nine </option>
  <option value="eight"> eight </option>
  <option value="seven"> seven </option>
  <option value="ten"> six </option>
  <option value="nine"> five </option>
  <option value="eight"> four </option>
  <option value="eight"> three </option>
  <option value="seven"> two </option>
</select> <input size='5' type="text" id="demo" name="demo" value="<?php echo @$n2; ?>">
</td></tr>
<tr><th colspan='2'><input type="SUBMIT" id="save" name="save" value=" Submit Data "></th></tr>
</table>
<input size='5' type="text" id="text4" name="text4" value=0 >
</form>
<img src="image/Kid.png" width="1000" height="350" border="0" alt="Surya Online">
</html>
