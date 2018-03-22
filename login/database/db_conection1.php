<?php
/**
 * Created by PhpStorm.
 * User: Ehtesham Mehmood
 * Date: 11/21/2014
 * Time: 1:13 AM
 */

$dbcon=mysqli_connect("localhost","root","");
$dbcon->query("SET NAMES 'utf8'");
mysqli_select_db($dbcon,"lafleur");

?>