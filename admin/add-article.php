<?php
    require_once("parsedown.php");
    require_once("connect.php");

    $parsedown = new Parsedown();

    $title = $_POST["title"];
    $content = $parsedown->text($_POST['content']);

    $sql = "INSERT INTO `articles` (`id`, `title`, `content`) VALUES (null, '$title', '$content')";

    $db->query($sql);

    header("Location: index.html");
?>