<?php
$protocol='';
$getpara='';
if(isset($_SERVER['HTTPS']))
{
	$protocol="https://";
}
else
{
	$protocol='http://';
}
$url=$protocol.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$uri=$_SERVER['REQUEST_URI'];
$deuri=urldecode($uri);


/*     Function to block all the request and Show Access Denied message to the user   */
function stopit()
{
?>
<!DOCTYPE html>
<html>
<head>
<title>Not Allowed | Protected by Sky</title>
</head>
<body style="background-color:black; color:white;">
	<center><h1>Not Allowed!! Protected by Sky Security</h1></center></body>
</html>
<?php
exit(0);
}


/*  Function to redirect the vulnerable get parameter (' or ")   to simple url*/
function redi($deuri)
{
	//$deuri=urldecode($_SERVER['REQUEST_URI']);
	//echo $deuri;

	$new='';
	for($i=0; $i<strlen($deuri); $i++)
	{
		if($deuri[$i]=="'" || $deuri[$i]=='"')
		{
			continue;
		}
		
		else
			$new.=$deuri[$i];
	}
	header('Location:' . $new);
	exit(0);
}




//echo $deuri;
for($i=0; $i<strlen($deuri); $i++)
{
	if($deuri[$i]=="'" || $deuri[$i]=='"')
		redi($deuri);
	$block=array('*', '!', '(', ')');
	if(in_array($deuri[$i], $block))
	{

		stopit();
	}
}



$get_url=explode(' ', $deuri);
//print_r($get_url);

$sevierity=0;
$flag=0;
for($j=0; $j<count($get_url); $j++)
{
	$block=array('union', 'select', 'from', 'order', '*');
	//print_r($block);
	for($i=0; $i<count($block); $i++)
		{
			if(!strcasecmp($block[$i], $get_url[$j]))
			{
				$sevierity++;
				$flag++;
			}
		}
}

/*echo "url: ";
print_r($get_url);
echo " Sevierity: " . $sevierity . " Flag: " . $flag;*/
if($sevierity>1 || $flag>1)
stopit();
?>

