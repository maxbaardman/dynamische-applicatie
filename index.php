<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Characters</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="resources/css/style.css" rel="stylesheet"/>
    <?php include_once 'resources/includes/dbh.inc.php' ?>
</head>
<body>
<?php
    $object = new dbh;
    $object->connect();
    $data = $object->query("SELECT * FROM `characters`");

?>
<header><h1>Alle <?php print(count($data)); ?> characters uit de database</h1>
</header>
    <div id="container">
        <div id="place">
            <?php 
                foreach($data as $d) {
             ?>
            <a class="item" href="character.php">
                <div class="left">
                    <img class="avatar" src="resources/images/<?php print $d['avatar']; ?>">
                </div>
                <div class="right">
                    <h2><?php print $d['name']; ?></h2>
                    <div class="stats">
                        <ul class="fa-ul">
                            <li><span class="fa-li"><i class="fas fa-heart"></i></span><?php print $d['health']; ?></li>
                            <li><span class="fa-li"><i class="fas fa-fist-raised"></i></span><?php print $d['attack']; ?></li>
                            <li><span class="fa-li"><i class="fas fa-shield-alt"></i></span><?php print $d['defense']; ?></li>
                        </ul>
                    </div>
                </div>
                <div class="detailButton"><i class="fas fa-search"></i> bekijk</div>
            </a>
            <?php 
                }
             ?>
        </div>
    </div>
    <footer>&copy; Max Baardman 2020</footer>
</body>
</html>