<?php
include("classes/Laptop.php");
$t1 = new Laptop();

$id = $_GET['id'];

if(isset($_GET['id'])){
   $t1->destroy($id);
}
?>