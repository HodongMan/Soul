<?php
require_once("html_fns.php");
require_once("db_connect.php");
require_once("board_fns.php");

session_start();

$board_array = show_board_list();


if($_SESSION["user_id"]){
	do_html_header();
	do_html_navbar();
	do_html_board_list($board_array);
	do_html_fbg();
	do_html_footer();
		
}else{
		
}

?>