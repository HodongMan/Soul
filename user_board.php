<?php
require_once("html_fns.php");
require_once("board_fns.php");
require_once("db_connect.php");

session_start();



if($_SESSION["user_id"]){
	if($_GET["board_id"]){

		$board_id = $_GET["board_id"];

		$board_array = show_board_one($board_id);

		$board_title = $board_array["board_title"];
		$board_content = $board_array["board_content_text"];
		$board_time = $board_array["board_time"];
		$board_name = $board_array["board_user_id"];


		do_html_header();
		do_html_navbar();
		do_html_user_board($board_title, $board_content, $board_time, $board_name);
		do_html_fbg();
		do_html_footer();
	}else
	{

	}
}
?>