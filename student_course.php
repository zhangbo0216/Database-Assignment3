<html>
<body>
<form action="student_course.php" method="post">
Search: <input type="text" name="search"><br>
<input type="submit">
</form>
<?php
	$table=$_POST["search"];
	$table_attribute=$_POST["table"];
	$attribute_table=$_POST["attribute"];
	ini_set('display_errors','on');
	error_reporting(E_ALL);	
	$user = 'root';
	$password = 'root';
	$db = 'dbo';
	$host = 'localhost';
	$port = 3306;

	$link = mysqli_init();
	$success = mysqli_real_connect(
   		$link, 
   		$host, 
   		$user, 
   		$password, 
   		$db,
   		$port
	);
	if ($table_attribute!="")
	{
		$result = mysqli_query($link,"SELECT column_name from information_schema.columns WHERE table_name LIKE '$table_attribute' and table_schema = 'dbo'");

		while($row = mysqli_fetch_array($result))
  		{
  			$r=$row['column_name'];
  			Echo "	<form action='student_course.php' method='post'>
  					<button type='submit' name='attribute' value=$r>$r</button>
  					</form>";
  			echo "<br />";
  		}
	}
	if ($attribute_table!="")
	{
		$result = mysqli_query($link,"SELECT table_name from information_schema.columns WHERE column_name LIKE '$attribute_table' and table_schema = 'dbo'");

		while($row = mysqli_fetch_array($result))
  		{
  			$r=$row['table_name'];
  			Echo "	<form action='student_course.php' method='post'>
  					<button type='submit' name='table' value=$r>$r</button>
  					</form>";
  			echo "<br />";
  		}
	}
	if ($table!="") {
	$result = mysqli_query($link,"SELECT table_name from information_schema.tables WHERE table_name LIKE '%$table%' and table_schema = 'dbo'");

	while($row = mysqli_fetch_array($result))
  	{
  		$r=$row['table_name'];
  		Echo "	<form action='student_course.php' method='post'>
  				<button type='submit' name='table' value=$r>$r</button>
  				</form>";
  		echo "<br />";
  	}
  		
	}
?>


</body>
</html>