<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/phpfirewall/functions.php');
if($_SERVER['REQUEST_METHOD']=="POST")
{
  foreach($_POST as $par)
  {
    //echo $val;
    $restrict=array("'", '"', 'order', '*', 'union');
    
    /*Comparing each character by char*/
    for($i=0; $i<strlen($par); $i++)
    {
       if($par[$i] in $restrict)
       {
           stopit();
       }
    }
    
    /*Compare words separated by space*/
    $wd=explode(' ', $par);
    for($i=0; $i<sizeof($wd); $i++)
    {
      if($wd[$i] in $restrict)
      {
        stopit();
      }
    }
  }
}
