<?
session_start();
require_once("user_fns.php");


$user_email = $_POST["user_email"];
$password = $_POST["user_password"];

login_do($user_email, $password);

?>