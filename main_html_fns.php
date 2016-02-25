<?

function main_header(){
	?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Soul Street</title>
		<meta charset='UTF-8' />
		<meta name='viewport' content='width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no' />
		<meta name='format-detection' content='telephone=no' />
		<link rel="stylesheet" type="text/css" href="./css/common.css" />
		<link rel="stylesheet" type="text/css" href="./css/footer.css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://dinbror.dk/bpopup/assets/jquery.bpopup-0.9.4.min.js"></script>
		<script src="http://dinbror.dk/bpopup/assets/jquery.easing.1.3.js"></script>
		<script type="text/javascript">
			;(function($) {
        		$(function() {
            		$('#user_name').bind('click', function(e) {
                		e.preventDefault();
                		$('#create_wrapper').bPopup();
            		});
        		});
    		})(jQuery);
		</script>

		<!--facebook-->
		<script>
		  window.fbAsyncInit = function() {
		    FB.init({
		      appId      : '389185827938088',
		      xfbml      : true,
		      version    : 'v2.4'
		    });
		  };

		  (function(d, s, id){
		     var js, fjs = d.getElementsByTagName(s)[0];
		     if (d.getElementById(id)) {return;}
		     js = d.createElement(s); js.id = id;
		     js.src = "//connect.facebook.net/en_US/sdk.js";
		     fjs.parentNode.insertBefore(js, fjs);
		   }(document, 'script', 'facebook-jssdk'));
		</script>
	</head>

	<body>
		<div class='container'>
			<div class='navbar'>
					<a href="index.php"><div id="logo"></div></a>
					<div class="favorite">
						<div class="favorite_text">즐겨 찾기</div>
						<div class="favorite_icon"></div>
					</div>
					<div class="city">
						<div class="city_text">지역별</div>
						<ul>
							<li>서울</li>
							<li>부산</li>
							<li>제주</li>
							<li>대전</li>
							<li>광주</li>
							<li>기타</li>

						</ul>
					</div>
					<div class="city">
						<div class="city_text">유형별</div>
						<ul>
							<li>Band</li>
							<li>Singer</li>
							<li>Instrument</li>
						</ul>
					</div>
			</div>
	<?

}


function main_perf_create_form(){

	?>
<div id="create_wrapper">
	<form action = "perf_register.php" method="POST" enctype="multipart/form-data">
		<div >버스킹 개설하기</div>
		<div >이미지를 등록해주세요</div>
		<div >공연 : <input type="text" name = "perf_name"></div>
		<div >공연장소 : <input type="radio" name="perf_location" value="seoul">서울<input type="radio" name="location" value="busan">부산<input type="radio" name="location" value="jeju">제주<input type="radio" name="location" value="daejeon">대전<input type="radio" name="location" value="gwangju">광주<input type="radio" name="location" value="etc">기타</div>
		<div >시간 : <input type = "date" name = "perf_time"></div>
		<div >한마디<textarea rows = "8" cols = "40"name = "perf_comment"></textarea>></div>
		<input type="file" name="file_upload" id = "file_upload">
		<input type = "submit" value = "입력완료">
	</form>
</div>

<?

}

function main_searchtap()
{
	?>
			<div class="top">
				<form action = "index.php" method = "POST">
				<input type ="search" placeholder="검색어를 입력하세요." name = "keyword">
				</form>
				<div class="welcome"><a href = "main_logout_do.php"><img src = "image/logout_icon.png" width = "20" height = "20" >       </a>         <a href="#"><span id="user_name">          <?echo ($_SESSION['nickname']);?></span></a>       님 오늘도 버스킹을 즐기세요!</div>
			</div>
					<div class="content">

			<div class="cards">
	<?
}

function main_perf_card($perf_info)
{
	?>
				<div class="card">
					<div class="card_image" style = 'background-image:url(<?echo($perf_info["perf_image_url"]);?>)'></div>
					<a href="#"><div class="site"></div></a>
					<div class="info">
						<span><b>이름 : <? echo($perf_info["perf_name"]);?></b></span><br><span><b>일정 : <? echo($perf_info["perf_time"]); ?></b></span>
						<br><span><b>장소 : <? echo($perf_info["perf_location"]); ?></b></span>
					</div>
					<div class="comment"><? echo($perf_info["perf_comment"]);?></div>
					<div class="icons">
						<div class="will">
							<div class="will_icon"></div>
							<div class="will_text">갈게요</div>
						</div>
						<div class="reply">
							<div class="reply_icon"></div>
							<div class="reply_text">댓글</div>
						</div>
					</div>
					<div class="icon_info"><?echo "";?>명이 좋아합니다.</div>
				</div>

	<?
}


function main_footer()
{
	?>
			<div class="footer">
	
	<div class="left">
		<div class="footer_left_logo"></div>
		<div>소울스트릿</div>
		<div>Copyright 2014 by Soulstreet. Inc.</div>
	</div>
	<div class="right">
		<div class="right_sub">
			<div class="footer_top">
				<div class="footer_logo"></div>
				Group
			</div>
			<div class="footer_bottom">장부루, 조은호, 장호동, 김수린(개발)<br>정세록(기획), 조나은(디자인)</div>
		</div>
		<div class="right_sub">
			<div class="footer_top">
				<div class="footer_logo" style="background-image:url('../image/contact_new.png');"></div>
				Contact
			</div>
			<div class="footer_bottom">02-123-4567<br>manager@soulstreet.com</div>
		</div>
	</div>
</div></div>
</body></html>

	<?

}


?>