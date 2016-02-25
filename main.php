<?php

require_once("html_fns.php");
session_start();


	if($_SESSION["user_id"]){
		do_html_header();
		do_html_navbar();
		do_html_main();
		do_html_fbg();
		do_html_footer();
		
	}else{
		login_form();
	}

?>