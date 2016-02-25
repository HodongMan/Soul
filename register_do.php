<?
require_once("user_fns.php");

$user_email = $_POST["user_email"];
$user_nickname = $_POST["user_nickname"];
$password = $_POST["user_password"];
$password_confirm = $_POST["user_password_confirm"];

if($user_password == $user_password_confirm)
{
	register_do($user_nickname, $user_email, $user_password);
}
else
{
	echo("
           <script>
             window.alert('비밀번호가 일치하지 않습니다.');
             history.go(-1);
           </script>
         ");
         exit;
}
?>