<?php
session_start();

?>

<html>
 <head><title>	Surya Online Exam </title>
<style>
a.ex5:hover, a.ex5:active {text-decoration: underline;}
</style>
</head>

<script>
function play() 
{
var ans1 = document.getElementById("textone").value;
var ans2 = document.getElementById("texttwo").value;
var ans3 = document.getElementById("textthree").value;
var ans4 = document.getElementById("textfour").value;
}
</script>

<script>
function myFunction1() {
var x = document.getElementById("Radio1").value;
document.getElementById("yans").value=x;
}

function myFunction2(){
var x = document.getElementById("Radio2").value;
document.getElementById("yans").value=x;
}

function myFunction3() {
var x = document.getElementById("Radio3").value;
document.getElementById("yans").value=x;
}

function myFunction4() {
var x = document.getElementById("Radio4").value;
document.getElementById("yans").value=x;
}
</script>


<body background="image/back2.png" onload="play()">

<center>
<font color='red' size='20'>Surya Online Exam </font>
Information and Communication Technology (ICT), E - Education, Nepal
<H3> Welcome to all Students </H3>

<hr color='green'>
// <a class="ex5" href="index.php">Home</a> // <a class="ex5" href="onlineSample.php">Online Exam Sample </a> // <a class="ex5" href="download.php">Downloads</a> // <a class="ex5" href="question_data_list.php">Online Questions</a> // <a class="ex5" href="Search_Checking.php">Student Score List </a> // <a class="ex5" href="developer.php">Developer</a> //  
<Hr color='red'>

<?php
$conn ="";
$conn1 ="";

global $id;
global $scode;
global $mark;
$db="";
$nn="";
$cc="";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "suryaonlinedb";
$connects = "";
$a="0";
$b="0";
		
if (!isset($_POST['add']))
	   {
		$_SESSION['run'] = 1;
		$name=($_POST['text2']);		
		$code=($_POST['text1']);		
		$level=($_POST['text3']);
		$mark=($_POST['text4']);
		}
$id = $_SESSION['run'];
$x=$id;

if (isset($_POST['txtans']) || isset($_POST['txtopt']) || isset($_POST['textname']) || isset($_POST['textcode']) || isset($_POST['textlevel']) || isset($_POST['textmark']))
{
$a=($_POST['txtans']);
$b=($_POST['txtopt']);
$name=($_POST['textname']);
$code=($_POST['textcode']);
$level=($_POST['textlevel']);
$mark=($_POST['textmark']);
	if ($a==1 && $b==1){
	$mark=$mark+1;
	}
	else if ($a==2 && $b==2){
	$mark = $mark+1;
	}
	else if ($a==3 && $b==3){
	$mark = $mark+1;
	}
	else if ($a==4 && $b==4){
	$mark = $mark+1;
	}
}
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if (!$conn) 
	{
    die("Connection failed: " . $conn->connect_error);
	}
$sql = "SELECT qid, question, ans1, ans2, ans3, ans4, ans FROM tbl_question where qid=".$id;
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0)
	{
	$row = mysqli_fetch_assoc($result); 
	}
$conn->close();

//====================================

if ($id>=21)
{
session_unset();
	$conn1 = mysqli_connect($servername, $username, $password, $dbname);
	$sql1 = "INSERT INTO tbl_stud (studcode,studname,studcat,studscore) VALUES ('$code', '$name', '$level', '$mark')";
	if (mysqli_query($conn1, $sql1))
		{ 
	echo "<script> alert ('New record inserted successfully !!! Thank You !'); </script>";
	echo "<script> location.href='Check_score.php'; </script>";
	exit();
		}
}
mysqli_close($conn1);

?>

<form name="form1" method="post" action="question.php" >
<table>
<tr>
<td style="background-color:#ffff99"> Student Name : </td> <td> <input type='text' id="textname" name="textname" style="background-color: #0099ff;" value= "<?php echo @$name; ?>" /></td>
<td style="background-color:#ffff99"> Student Code : </td> <td> <input type='text' id="textcode" name="textcode" style="background-color: #0099ff;" value="<?php echo @$code; ?>" /></td>
<td style="background-color:#ffff99"> Student Level : </td> <td> <input type='text' id="textlevel" name="textlevel" style="background-color: #0099ff;" value= "<?php echo @$level; ?>" /> </td>
<td style="background-color:#ffff99"> Student Score : </td> <td> <input type='text' id="textmark" name="textmark" style="background-color: #0099ff;" value= "<?php echo @$mark; ?>" /> </td>
</tr>
<th colspan="6" style="background-color:#ccff66"><font color="#ff0000"> Number of Correct answers : <?php echo @$mark; ?>  out of 5 </font></th>
</tr></table>

<br>

<table border='0'>
<tr><td>Question No.</td><td style="background-color:#00cccc"> <?php echo $row["qid"]; ?> </td></tr>
<tr><td>Question </td><td width= '800' style="background-color:#0099ff"> <?php echo $row["question"]; ?> </td><tr>

<tr><td>Option 1 <input type='radio' name="Ra1" onclick="myFunction1()" value="1" id="Radio1"></td><td style="background-color:#ffff99"> <?php echo $row["ans1"]; ?> </td></tr>
<tr><td>Option 2 <input type='radio' name="Ra1" onclick="myFunction2()" value="2" id="Radio2" ></td><td style="background-color:#ccff66"> <?php echo $row["ans2"]; ?> </td></tr>
<tr><td>Option 3 <input type='radio' name="Ra1" onclick="myFunction3()" value="3" id="Radio3" ></td><td style="background-color:#ffff99"> <?php echo $row["ans3"]; ?> </td><tr>
<tr><td>Option 4 <input type='radio' name="Ra1" onclick="myFunction4()" value="4" id="Radio4" ></td><td style="background-color:#ccff66"> <?php echo $row["ans4"]; ?> </td><tr>
</select>
<tr><td>
<input type="text" size="5" id="xans" name="txtans" value= "<?php echo $row["ans"]; ?>"></td>
<th><input type="text" size="5" id="yans" name="txtopt"> Total record count = <?php echo $x; ?> /20 </th>
</tr>
</table>
<hr color='green'>
<input name="add" id="Cal" type="submit" value=" Next Question " />

<input type="text" name="dataa" value="<?php echo $_SESSION['run']++ ?>" />

<input type='hidden' id="textn1" name="textn1" value= "<?php echo ($_POST['text2']);?>">
<input type='hidden' id="hidden" name="textn2" value= "<?php echo ($_POST['text1']);?>">
<input type='hidden' id="textn3" name="textn3" value= "<?php echo ($_POST['text3']);?>">
<input type='hidden' id="textn4" name="textn4" value= "<?php echo ($_POST['text4']);?>">
</form>

<img src="image/aa.jpg" width="687" height="141" border="0" alt="">
</body>

</html>
