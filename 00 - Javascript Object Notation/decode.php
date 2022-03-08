<?php
    $data = file_get_contents("data.json");

    $student = json_decode($data, true);

    var_dump($student);

    echo $student[0]["mentor"]["mentor-2"];

?>