<?php

session_start();
include('connection.php');
$connection = new createConnection(); 			//created a new object
$connection->connectToDatabase();
$connection->selectDatabase();				//selecting db

$num_fields=$_SESSION['num_flds'];
$selected_table_name=$_SESSION["tblname"];
//echo $selected_table_name."<br/>";



$str="INSERT INTO ".$selected_table_name." VALUES(''";


for($y=1;$y<$num_fields;$y++)
{
	$str=$str.",'$_POST[$y]'";

}
$str=$str.");";

$re_result = mysql_query ($str); //run the query


//echo "inserted successfully";

echo "<script>
		var r = confirm('ADDED NEW ENTRY SUCCESSFULLY!Do You Want To Add One More?');
    		if (r == true) 
		{
			window.location.assign('crtetbl.php');    
		} 
		else 
		{
        		window.location.assign('index.php#section1');
	    	}
	</script>";
?>
