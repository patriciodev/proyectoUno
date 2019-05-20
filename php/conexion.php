<?php

$dataname = "localhost";
$username = "root";
$password = "";
$dbname = "proyecto";

$cnx = mysqli_connect($dataname,$username,$password,$dbname);
if($cnx){

}else{
    die("no se logra conectar a la base de datos..") . mysqli_error($cnx) ;
}



?>