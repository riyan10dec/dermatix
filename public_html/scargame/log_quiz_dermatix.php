<?php
$basePath = "";
session_start();
require_once($basePath."db/db_eakoplak.php");
if (isset($_POST["ArrAnswer"]) && isset($_SESSION["uid"]) ){
	$arr_result=$_POST["ArrAnswer"];
	$arr_answer_true=array(2,3,3,1,2,3,2,1,4,2 );
	$result=array();
	$count_true=0;
	$opt=array("-","a","b","c","d");
	foreach($arr_result as $value){
		if (is_numeric($value["step"])){
			if ($value["answer"] ==$arr_answer_true[$value["step"]-1] ){
				$count_true=$count_true+1;
			}
			
			$list_jawaban=$list_jawaban.",".$opt[$value["answer"]];
		}
		
		
	}
	
	
	DB::insert('t_log_quiz', array(
	  'UID' => $_SESSION["uid"],
	  'ANSWER' => $list_jawaban,
	  'T_TRUE' => $count_true,
	  'IP' => $_SERVER['REMOTE_ADDR'],
	  'USER_AGENT' => $_SERVER ['HTTP_USER_AGENT'],
	  'INSERT_DATE' => DB::sqleval("NOW()")
	));
	
	session_destroy();
}
exit;

?>