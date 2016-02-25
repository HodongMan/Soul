<?
session_start();
require_once("html_fns.php");
require_once("main_fns.php");
require_once("main_html_fns.php");

if($_SESSION["nickname"])
{
	main_header();
	main_searchtap();
	if($_POST["keyword"])
	{
		searching_data($_POST["keyword"]);
	}
	else{
		show_perf_all();	
	}
	
	main_perf_create_form();
	main_footer();
}
else
{
	login_form();
}
?>