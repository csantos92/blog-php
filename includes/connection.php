<?php
//Connection
$db = mysqli_connect('localhost', 'root', '', 'db_blog');

mysqli_query($db, "SET NAMES 'utf8'");

// Iniciar la sesión
if(!isset($_SESSION)){
	session_start();
}