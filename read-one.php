<?php

require('model.php');

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

function fetchAll(){
    //Create an array variable to hold list of search records
    $result_array = array();

    //create an instance of the product class
    $object = new API();

    //run the search product method
    $records = $object->fetchOne(1);

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


$list = fetchAll();
$posts_arr = array();

if ($list){
    foreach ($list as $value){
        $id = $value['id'];
        $title = $value['title'];
        $body = $value['body'];
        $author = $value['author'];

        $post_item = array(
          // "id"=>$id,
          "title"=>$title,
          "body"=>$body,
          "author"=>$author
        );

        array_push($posts_arr, $post_item);


    }
echo json_encode($posts_arr);
}







 ?>
