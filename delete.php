<?php
include("classes/Fruits.php");
$t1 = new Fruits();

$id = $_GET['id'];

if(isset($_GET['id'])){
   $t1->destroy($id);
}
?>