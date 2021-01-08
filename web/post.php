<?php
    $id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>sendbyte.pl</title>

    <script src="renderer.js"></script>
</head>
<body onload="get_article(<?php echo $id; ?>)">
    <div id="title"></div>
    <div id="content"></div>
</body>