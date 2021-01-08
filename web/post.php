<?php
    $id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>sendbyte.pl</title>

    <script src="renderer.js"></script>
    <link rel="stylesheet" href="css/post.css">
    <link rel="stylesheet" href="css/all.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
</head>
<body onload="get_article(<?php echo $id; ?>)">
    <div id="logo">
        sendbyte.pl
    </div>
    <article id="main">
        <div id="title"></div>
        <div id="content"></div>
    </article>
</body>