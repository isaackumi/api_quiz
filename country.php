<?php

require('model.php');

// header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
// header('Access-Control-Allow-Methods', 'GET, PUT, POST, DELETE');
// header("Content-Security-Policy: default-src 'none';");
// header("Content-Security-Policy: default-src 'self'; style-src 'self' 'unsafe-inline'; font-src 'self' data: https: http; script-src 'self' 'unsafe-inline' 'unsafe-eval' *");

function fetchAll($var){
    //Create an array variable to hold list of search records
    $result_array = array();

    //create an instance of the product class
    $object = new API();

    //run the search product method
    $records = $object->fetchOne($var);

    //check if the method worked
    if ($records) {

        while ($one_record = $object->db_fetch()) {

            //Assign each result to the array
            $result_array[] = $one_record;
        }
    }
    //return the array
    return $result_array;
}

 // req method

if(isset($_GET['key']) && !empty($_GET['key']) && !empty($_GET['id']) ){
  $key = $_GET['key'];

  if($key == "kumfrez"){

    $id = $_GET['id'];

    $list = fetchAll($id);
    // echo $list;
    $posts_arr = array();

    if ($list){
        foreach ($list as $value){
            // $id = $value['id'];
            $code = $value['country_code'];
            $phonecode = $value['phonecode'];


            $post_item = array(
              // "id"=>$id,
              "country_code"=>$code,
              "phonecode"=>$phonecode

            );

            array_push($posts_arr, $post_item);


        }
    echo json_encode($posts_arr);
    // print_r($posts_arr);
  }else{

    echo json_encode(
      array('error' => 'Item does not exist!')
    );
  }



  }else{
    echo json_encode(
      array('error' => 'Invalid API key!')
    );
  }




}else{
  echo json_encode(
    array('error' => 'API key is required!')
  );
}












 ?>
