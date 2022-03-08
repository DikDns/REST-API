<?php
  
    // $students = [
    //     [
    //         "name" => "DikDns",
    //         "isn" => "0020111",
    //         "email" => "dikdnssocial@gmail.com"
    //     ],
    //     [
    //         "name" => "Doobwuz",
    //         "isn" => "0020101",
    //         "email" => "doobwuz@gmail.com"
    //     ]
    // ];
    
    $dbh = new PDO("mysql:host=localhost;dbname=phpdasar", "root", "");
    $db = $dbh->prepare("SELECT * FROM videogames");
    $db->execute();
    
    $videogames = $db->fetchAll(PDO::FETCH_ASSOC);
    $data = json_encode($videogames);
    
    echo $data;

?>