<?php


 $actual_link = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
//echo $actual_link;
// get the HTTP method, path and body of the request
$method = $_SERVER['REQUEST_METHOD'];


$request = explode('/', $actual_link);



 if (isset($request[5]))  {
     $typeMethod = $request[5];


     //echo $request[5];

     if ($method == 'GET') {

         if (strstr($typeMethod, "?")){

             $param = substr( strstr($typeMethod, "?"), 1 );
             parse_str($param, $output);

                 echo $output["id"];
         }



//    if (!$key) echo '[';
//    for ($i=0;$i<mysqli_num_rows($result);$i++) {
//        echo ($i>0?',':'').json_encode(mysqli_fetch_object($result));
//    }
//    if (!$key) echo ']';
     } elseif ($method == 'POST') {

         $input = json_decode(file_get_contents('php://input'), true);
         echo $input["test"];
         //echo mysqli_insert_id($link);
     } else {
         echo "nothing";
         //echo mysqli_affected_rows($link);
     }


 } else {
     echo "{\"api\": \"error\"}";
 }


?>