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
<H3> Welcome to all Students </H3>

<hr color='green'>
// <a class="ex1" href="index.php">Home</a> // <a class="ex1" href="onlineSample.php">Online Exam Sample </a> // <a class="ex1" href="download.php">Downloads</a> // <a class="ex1" href="question_data_list.php">Online Questions</a> // <a class="ex1" href="Search_Checking.php">Student Score List </a> // <a class="ex1" href="developer.php">Developer</a> //  
<Hr color='red'>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "suryaonlinedb";
$c="0";
$p="0";
$f="0";
$ans="blank";

echo "<H3> Welcome to Online Quiz Data List</H3>";
echo "<Hr size='2' color='red'>";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if (!$conn) 
	{
    die("Connection failed: " . $conn->connect_error);
	}

$sql = "SELECT qid, question, ans1, ans2, ans3, ans4 FROM tbl_question";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) 
	{
	echo "<center> <table border='1' bordercolor='green'>
	<tr><th> Question ID  </th><th>	Questions </th><th>	Option 1	</th><th> Option 2 </th> <th> Option 3 </th><th> Option 4 </th></tr>";
	
	// output data of each row
	while($row = mysqli_fetch_assoc($result)) 
		{
$c = $c + 1;

echo "<tr><td>".$row["qid"]. "</td><td>".	$row["question"]."</td><td>".	$row["ans1"]."</td><td>".	$row["ans2"]."</td><td>".	$row["ans3"]."</td><td>".	$row["ans4"]."</td></tr>";
//checking n counting pass fail

    }
    echo "</table>";
	echo "Total record count = ". $c;
} 
else 
	{
    echo "0 results";
}
$conn->close();
?>
</body>
</html>
