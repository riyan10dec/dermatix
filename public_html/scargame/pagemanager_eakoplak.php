<?php
  ini_set("date.timezone","Asia/Jakarta");

  $uri =$_GET['url'];
  unset($_GET['url']);
  $basePath = getcwd().'/';
  session_start();
  require_once($basePath."db/db_eakoplak.php");
   // require_once($basePath."includes/function.php");
  $exp = explode("?", $_SERVER['REQUEST_URI'])[0];
  $exp = trim($exp, "/");
  $uri = trim($uri, "/");
  if(strlen($uri) == 0)
    $baseUrl = "/";
  else
  $baseUrl = "/".trim(substr($exp, 0, -strlen($uri)),"/")."/";
  
  $Template="template/original/";
  
  $aliases["/"] = 'index_dermatix.php';
  $aliases[""] = 'index_dermatix.php';
  $aliases["log_quiz"] = 'log_quiz_dermatix.php';
  $aliases["desc_result"] = 'desc_result_dermatix.php';
  $aliases["404"] = '404_dermatix.php';
  


  $url = explode("/", $uri);
  $chekUrl = $url;
  
 
  for($i= count($url); $i>0; $i--){
   $key = implode("/", $chekUrl);

    if(@$aliases[$key]){
      $i=0;
      $path = $aliases[$key];
      $params = substr($uri, strlen($key));
      $params = explode("/",trim($params, "/"));
      if(count($params)>1){
        for($i_p=0; $i_p < count($params); $i_p++){
          $global_eakoplak[$params[$i_p]] = @$params[$i_p+1];
          $i_p++;
        }
      }
    }
    array_pop($chekUrl);
  }
  $url = implode($url,"/");
  
  
  $baseUrl="http://localhost/movie_siaranku/";
 

  if(!@include_once(@$path)){
	include_once($aliases["404"]);
  }
  
  
  
  /*echo "
    <script>
      console.dir('baseUrssl => ".$baseUrl."');
      console.dir('url => ".$url."');
      console.dir('basePath => ".$basePath."pages/');
      console.dir('path => ".$path."');
      console.dir('key => ".$key."');
      console.dir('aliases[key] => ".$aliases[$key]."');
      console.dir('params => ".json_encode($params)."');
      console.dir('_GET => ".json_encode($_GET)."');
    </script>
  ";*/
?>
