<?php
$host = "localhost";
$username = "root";
$password = "";
$database_name = "restaurante";
// $host = "151.106.100.46";
// $username = "creat312_sinoe";
// $password = "Stark989121";
// $database_name = "creat312_lotes";
// $conn = new mysqli("localhost","root","","lotes_chorreritas");
// $conn = new mysqli("151.106.100.46","creat312_sinoe","Stark989121","creat312_lotes");
// $conn = new mysqli("151.106.100.46","creat312_sinoe","Stark989121","creat312_desarrollolotes");
$conn = new mysqli($host, $username, $password, $database_name);

if ($conn->connect_error) {
        echo 'Conexión Fallida: ', $conn->connect_error;
}
$conn->set_charset("utf8");