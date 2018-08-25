<?php
/* Include the Firewall index file to the header of every page  */
require_once($_SERVER['DOCUMENT_ROOT'] . '/firewall/index.php');

/* Include Setup file to create database connection..    FIRST EDIT THE SETUP FILE IN TEST DIRECTORY   */
require_once($_SERVER['DOCUMENT_ROOT'] . '/firewall/test/setup.php');
$conn=mysqli_connect(host, db_user, db_pass, db_name);
if(mysqli_connect_errno())
{
	die('Unable to connect to database');
}



/*    Creating vulnerable mysqli query to test our Firewall   */
if($_SERVER['REQUEST_METHOD']=="GET")
{
	$id=$_GET['id'];
	$query="SELECT * FROM header WHERE id=$id";
	$get_ele=$conn->query($query);
	while($store=$get_ele->fetch_assoc())
	{
		echo 'id: ' . $store['id'] . ' name: ' . $store['name'] . ' url: ' . $store['url'] . ' type: ' . $store['type'] . ' prio: ' . $store['priority'];
	}
}
?>
