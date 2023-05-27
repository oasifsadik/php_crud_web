<?php
include("classes/Mobile.php");
$t1 = new Mobile();

$id = $_GET['id'];

if(isset($_GET['id'])){
   $t1->destroy($id);
}
?>