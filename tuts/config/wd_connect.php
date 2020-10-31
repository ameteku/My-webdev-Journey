<?php
try{
    $conn = mysqli_connect('localhost','Mike','moneyMaker1', 'pizza_guy');
   
    //check connection
   }
   catch(Exception $e)
   {
   if(!$conn)
   {
     echo 'Connection error'. mysqli_connect_error();
   }}
?>