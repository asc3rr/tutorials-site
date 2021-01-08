<?php
    require_once("../config.php");
    $db = new mysqli($db_conf["host"], $db_conf["user"], $db_conf["password"], $db_conf["name"]);

    $id = mysqli_real_escape_string($db, $_GET['id']);

    if($id === "*"){
        header("HTTP/1.1 200 OK");

        $sql = "SELECT * FROM `articles` ORDER BY `id` DESC";

        $result = $db->query($sql);

        if($result->num_rows > 0){
            $json_data = array();

            while($article_data = $result->fetch_assoc()){
                $article_json = array(
                    "id"=>$article_data["id"],
                    "title"=>$article_data["title"],
                    "content"=>$article_data["content"]
                );

                array_push($json_data, $article_json);
            }

            $json = json_encode($json_data);

            echo $json;
        }
        else{
            header("HTTP/1.1 404 Not Found");
        }
    }
    else{
        $sql = "SELECT * FROM `articles` WHERE `id`=$id";

        $result = $db->query($sql);

        if($result->num_rows > 0){
            header("HTTP/1.1 200 OK");

            $article_data = $result->fetch_assoc();

            $json_data = array(
                "title"=>$article_data["title"],
                "content"=>$article_data["content"]
            );

            $json = json_encode($json_data);

            echo $json;
        }
        else{
            header("HTTP/1.1 404 Not Found");
        }
    }
?>