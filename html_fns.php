<?

function login_form(){

	?>
	<!DOCTYPE HTML>
<html lang = "ko">
	<head>
		<title>Soul Street</title>
		<meta charset='UTF-8' />
		<meta name='viewport' content='width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no' />
		<meta name='format-detection' content='telephone=no' />
		<link rel="stylesheet"  href="css/login.css" />

		<script>

			function statusChangeCallback(response) {
		    console.log('statusChangeCallback');
		    console.log(response);
		    // The response object is returned with a status field that lets the
		    // app know the current login status of the person.
		    // Full docs on the response object can be found in the documentation
		    // for FB.getLoginStatus().
		    if (response.status === 'connected') {
		      // Logged into your app and Facebook.
		      testAPI();
		    } else if (response.status === 'not_authorized') {
		      // The person is logged into Facebook, but not your app.
		      document.getElementById('status').innerHTML = 'Please log ' +
		        'into this app.';
		    } else {
		      // The person is not logged into Facebook, so we're not sure if
		      // they are logged into this app or not.
		      document.getElementById('status').innerHTML = 'Please log ' +
		        'into Facebook.';
		    }
		  }

		  // This function is called when someone finishes with the Login
		  // Button.  See the onlogin handler attached to it in the sample
		  // code below.
		  function checkLoginState() {
		    FB.getLoginStatus(function(response) {
		      statusChangeCallback(response);
		    });
		  }

		  window.fbAsyncInit = function() {
		  FB.init({
			appId      : '389185827938088',
		    cookie     : true,  // enable cookies to allow the server to access                         // the session
		    xfbml      : true,  // parse social plugins on this page
		    version    : 'v2.4' // use version 2.2
		  });

		  // Now that we've initialized the JavaScript SDK, we call 
		  // FB.getLoginStatus().  This function gets the state of the
		  // person visiting this page and can return one of three states to
		  // the callback you provide.  They can be:
		  //
		  // 1. Logged into your app ('connected')
		  // 2. Logged into Facebook, but not your app ('not_authorized')
		  // 3. Not logged into Facebook and can't tell if they are logged into
		  //    your app or not.
		  //
		  // These three cases are handled in the callback function.

		  FB.getLoginStatus(function(response) {
		    statusChangeCallback(response);
		  });

  		};

		  // Load the SDK asynchronously
		  (function(d, s, id) {
		    var js, fjs = d.getElementsByTagName(s)[0];
		    if (d.getElementById(id)) return;
		    js = d.createElement(s); js.id = id;
		    js.src = "//connect.facebook.net/en_US/sdk.js";
		    fjs.parentNode.insertBefore(js, fjs);
		  }(document, 'script', 'facebook-jssdk'));

		  // Here we run a very simple test of the Graph API after login is
		  // successful.  See statusChangeCallback() for when this call is made.
		  function testAPI() {
		    console.log('Welcome!  Fetching your information.... ');
		    FB.api('/me', function(response) {
		      console.log('Successful login for: ' + response.name);
		      document.getElementById('status').innerHTML =
		        'Thanks for logging in, ' + response.name + '!';
		    });
  }
</script>

<!--
  Below we include the Login Button social plugin. This button uses
  the JavaScript SDK to present a graphical Login button that triggers
  the FB.login() function when clicked.
-->







	</head>

	<body>
		<div class='container'>
			<div class="wrapper">
				<div class="image"></div>
				<div class="login">
					<h2 class="title">당신의 음악을 들려주세요!</h2>
					<h4 class="subtitle">소울스트릿을 통해 당신의 공연을 알리세요!<br>
					많은 사람들이 당신의 음악을 들으러 갈 거에요.</h4>
					<a scope="public_profile,email" onlogin="checkLoginState();" href="#"><div class="facebook">페이스북으로 로그인하기</div></a>
					<div class="or"></div>
					<form action = "login_do.php" method = "POST">
						<div class="input">
							<input class="box" type = "email" placeholder="email" name="user_email">
							<div class="logo"></div>
						</div>
						<div class="input">
							<input class="box" type = "password" placeholder="password" name="user_password">
							<div class="logo"></div>
						</div>
						<a href="#"><div class="login_btn"><input type = "submit" class = "login_btn" value = "로그인">
						</div></a>
					</form>
					<div class="option">
						<a href="register_form.php"><div class="box">가입하기</div></a><a href="#"><div class="box">비밀번호 찾기</div></a>
					</div>
				</div>

				<div class="join"></div>
				<div class="ok"></div>
			</div>
		</div>
	</body>
</html>

	<?
}

function register_form(){
	?>
	<!DOCTYPE HTML>
<html>
	<head>
		<title>Soul Street</title>
		<meta charset='UTF-8' />
		<meta name='viewport' content='width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no' />
		<meta name='format-detection' content='telephone=no' />
		<link rel="stylesheet" type="text/css" href="./css/login.css" />
	</head>

	<body>
		<div class='container'>
			<div class="wrapper">
				<div class="image"></div>
				<div class="join">
					<form action = "register_do.php" method = "POST">
						<div class="input">
							<input class="box" type = "email" placeholder="이메일" name="user_email">
						</div>
						<div class="input">
							<input class="box" type = "text" placeholder="닉네임" name="user_nickname">
						</div>
						<div class="input">
							<input class="box" type = "password" placeholder="비밀번호" name="user_password">
						</div>
						<div class="input">
							<input class="box" type = "password" placeholder="비밀번호" name="user_password_confirm">
						</div>
						<a href="#"><div class="login_btn"><input type = "submit" class = "login_btn" value = "등록하기">
						</div></a>
						<div class="option">
						<a href="index.php"><div class="back">돌아가기</div></a>
					</div>
				</div>
			</div>
			<div class="policy">계정을 만들면 소울스트릿의 서비스 약관 및 개인정보 보호정책에<br>동의하는 것으로 간주합니다.</div>
		</div>
	</body>
</html>

	<?
}

function register_ok(){

	?>
	<!DOCTYPE HTML>
<html>
	<head>
		<title>Soul Street</title>
		<meta charset='UTF-8' />
		<meta name='viewport' content='width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no' />
		<meta name='format-detection' content='telephone=no' />
		<link rel="stylesheet" type="text/css" href="./css/login.css" />
	</head>

	<body>
		<div class='container'>
			<div class="wrapper">
				<div class="image"></div>
				<div class="ok">
					<h2 class="title">안녕하세요. <?
					session_start();
					echo $_SESSION['nickname'];
					?>님!</h2>
					<h4 class="subtitle">소울스트릿을 통해 버스커들은 자신들의 공연을 홍보할 수 있고,<br>
					일반 사용자들은 버스킹 공연 정보를 받아볼 수 있어요!</h4>
					<a href="index.php"><div class="login_btn">소울스트릿 시작하기
					</div></a>
				</div>
			</div>
		</div>
	</body>
</html>
<?
}
?>