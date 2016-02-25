<?
require_once("db_connected.php");
require_once("db_hash.php");

function register_do($nickname, $email, $password)
{
     db_connect();
     echo "<meta charset = 'utf-8'>";  
	$sql = "select * from user_info where user_email='$email'";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	if($email == $row['user_email'])
	{
		 echo("
           <script>
             window.alert('동일한 아이디가 이미 존재합니다.');
             history.go(-1);
           </script>
         ");
         exit;
	}
    $hash = create_hash($password);
	$sql = "insert INTO user_info(user_nickname, user_email, user_password) values ('".$nickname."', '".$email."', '".$hash."')";
	$result = mysql_query($sql);
	if(!$result)
	{
       echo"DB Error";
	}
	mysql_close();
	echo "<meta http-equiv='refresh' content='0; ./index.php'>";

}

function login_do($email, $password)
{
  session_start();
   db_connect();
  echo "<meta charset = 'utf-8'>";
	   if(!$email) {
     echo("
           <script>
             window.alert('아이디를 입력하세요.')
             history.go(-1)
           </script>
         ");
         exit;
   }

   if(!$password) {
     echo("
           <script>
             window.alert('비밀번호를 입력하세요.')
             history.go(-1)
           </script>
         ");
         exit;
   }

   $query = "select * from user_info where user_email='$email'";
   $result = mysql_query($query);
   

   $num_match = mysql_num_rows($result);
   $row = mysql_fetch_array($result);

   if(!$num_match)
   {
     echo("
           <script>
             window.alert('등록되지 않은 아이디입니다.')
             history.go(-1)
           </script>
         ");
    }
    else
    {
        $db_passwd = $row["user_password"];
        if(!validate_password($password, $db_passwd))
        {
           echo("
              <script>
                window.alert('비밀번호가 틀립니다.')
                history.go(-1)
              </script>
           ");

           exit;
        }
        else
        {
           $user_email = $row["user_email"];
           $user_nickname = $row["user_nickname"];
           $_SESSION["email"] = $user_email; 
           $_SESSION["nickname"] = $user_nickname;
           
          echo "<meta http-equiv='refresh' content='0; ./register_ok.php'>"; 
        }
        
   }        

}

?>

