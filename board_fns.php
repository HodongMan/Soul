<?php

function register_board_content($userid, $title, $text, $time)
{
	
  	$conn = db_connect();
  	$result = $conn->query("INSERT INTO board(board_title, board_user_id, board_time, board_content_text) VALUES('".$title."','".$userid."','".$time."','".$text."')");

  	if (!$result) {
  		throw new Exception('Could not register you in database - please try again later.');
  	}

  	$conn->close();

  	$conn = db_connect();

  	$result2= $conn->query("SELECT board_id FROM board WHERE board_user_id = '".$userid."' and board_title = '".$title."' and board_time = '".$time."'");

  	 if (!$result2) {
  		throw new Exception('Could not register you in database - please try again later.');
  	}
	$row = $result2->fetch_assoc();

	return $row["board_id"];

}

function show_board_list()
{
	$conn = db_connect();
	$result = $conn->query("SELECT * FROM board ORDER BY board_time DESC LIMIT 10");

	if (!$result) {
  		throw new Exception('Could not register you in database - please try again later.');
  	}

	$board_array = array();
  	for ($count = 0; $row = $result->fetch_assoc(); ++$count) {
  		$board_array[$count] = $row;
  	}
  	return $board_array;

}

function show_board_one($board_id)
{
	$conn = db_connect();
	$result = $conn->query("SELECT * FROM board WHERE board_id = '".$board_id."'");

	if (!$result) {
  		throw new Exception('Could not register you in database - please try again later.');
  	}

  	$row = $result->fetch_assoc();

  	return $row;


}


function show_board_new_list()
{
	$conn = db_connect();
	$result = $conn->query("SELECT * FROM board ORDER BY board_time LIMIT 6");

	if (!$result) {
  		throw new Exception('Could not register you in database - please try again later.');
  	}

	$board_array = array();
  	for ($count = 0; $row = $result->fetch_assoc(); ++$count) {
  		$board_array[$count] = $row;
  	}
  	return $board_array;

}
?>