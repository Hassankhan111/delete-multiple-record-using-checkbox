<?php

 $id =  $_POST['id'];

 $sid = implode($id , ", ");

 $conn = mysqli_connect("localhost","root","","test") or die ("connection faild");

 $sql = " DELETE FROM students WHERE id IN ({$sid}) ";

 if(mysqli_query($conn,$sql)){
    echo 1;
 }else{
    echo 0;
 }
?>