<?php
    require_once("../config.php");
    $db = new mysqli($db_conf["host"], $db_conf["user"], $db_conf["password"], $db_conf["name"]);

    $field = $_GET['field'];

    if($field === "posts"){
        $sql = "SELECT * FROM `articles` DESC";

        $result = $db->query($sql);

        if($result->num_rows > 0){
            #header("HTTP/1.1 200 OK");

            $json_data = array();

            while($article_data = $result->fetch_assoc()){
                $article_array = array(
                    "id"=>$article_data["id"],
                    "title"=>$article_data["title"],
                    "content"=>$article_data["content"],
                    "date"=>$article_data["date"]                    
                );

                array_push($json_data, $article_array);
            }

            $json = json_encode($json_data);

            echo $json;
        }
        else{
            #header("HTTP/1.1 404 Not Found");
        }
    }
?>