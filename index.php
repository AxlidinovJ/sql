<?php
require_once "./connections.php";
$connection = new Connection();
$news = $connection->getNews();

$data = [
    'title' =>'',
    'text'=>'',
];

if(isset($_GET['id'])){
    $data = $connection->getIdNews($_GET['id']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
   <header>
    <div class="container">
        <form method="post" action="create.php">
            <h1>Yangiliklar qo'shish</h1>
            <input type="text" name="title" class="input" value="<?=$data['title']?>" autocomplete="off">
            <textarea name="text"cols="40" rows="10" class="input"><?=$data['text']?></textarea>
            <input type="submit" value="Saqlash" class="input">
        </form>
       
       <?php foreach($news as $new):?>
        <div class="news">
            <a  href="?id=<?=$new['id']?>" class="title"><?=$new['title']?></a>
            <p class="text"><?=$new['text']?></p>
            <p class="time"><?=$new['time']?></p>
            <hr>
        </div>
        <?php endforeach;?>
        
    </div>
   </header>
</body>
</html>
