<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once 'resources/includes/dbh.inc.php'; ?>
    <?php
        $id = $_REQUEST['id'];
        $object = new dbh;
        $object->connect();
        $data = $object->query("SELECT * FROM `characters`WHERE id = $id");
    ?>
    <meta charset="UTF-8">
    <title>Character - <?php print $data[0]['name']; ?></title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="resources/css/style.css" rel="stylesheet"/>
</head>
<body>
<header><h1><?php print $data[0]['name']; ?></h1>
    <a class="backbutton" href="index.php"><i class="fas fa-long-arrow-alt-left"></i> Terug</a></header>
<div id="container">
    <div class="detail">
        <div class="left">
            <img class="avatar" src="resources/images/<?php print $data[0]['avatar']; ?>">
            <div class="stats" style="background-color: <?php print $data[0]['color']; ?>">
                <ul class="fa-ul">
                    <li><span class="fa-li"><i class="fas fa-heart"></i></span> <?php print $data[0]['health']; ?></li>
                    <li><span class="fa-li"><i class="fas fa-fist-raised"></i></span> <?php print $data[0]['attack']; ?></li>
                    <li><span class="fa-li"><i class="fas fa-shield-alt"></i></span> <?php print $data[0]['defense']; ?></li>
                </ul>
                <ul class="gear">
                    <?php if($data[0]['weapon'] != null){?>
                        <li><b>Weapon</b>: <?php print $data[0]['weapon']; ?></li>
                   <?php }?>
                    <?php if($data[0]['armor'] != null){?>
                        <li><b>Armor</b>: <?php print $data[0]['armor']; ?></li>
                   <?php }?>
                </ul>
            </div>
        </div>
        <div class="right">
            <p>
               <?php $bio = explode("\n", $data[0]['bio']);
                    foreach($bio as $string){
                        print $string."<br>";
                    }
                ?>
            </p>
        </div>
        <div style="clear: both"></div>
    </div>
</div>
<footer>&copy; Max Baardman 2020</footer>
</body>
</html>