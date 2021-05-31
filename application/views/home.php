<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UFH-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Playlist</title>
</head>
<body>
    <h1> Welcome to My Playlist </h1>
    <?php
        foreach($data as $dat){
            echo "Judul Lagu : ".$data[judullagu]."<br>";
            echo "Penyanyi : ".$data[penyanyi]."<br>";
            echo "Rilis : ".$data[rilis]."<br>";
            echo "durasi : ".$data[durasi]."<br>";
        }
    ?>
</body>
</html>
