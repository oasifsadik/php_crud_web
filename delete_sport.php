<?php
include("classes/Sport.php");
$t1 = new Sport();

$id = $_GET['id'];
if(isset($_GET['id']))
{
   $t1->destroy($id);
}
?>