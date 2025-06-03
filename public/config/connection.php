<?php

$conn = mysqli_connect("localhost", "root", "", "db_belajar_php_1");

//Select Data
// $result = mysqli_query($conn, "SELECT * FROM students ORDER BY id DESC"); => ini return boolean true=data/false

// result error condition
// if (!$result){
//     echo mysqli_error();
// }

//get/fetch data from result

//cara 1 untuk project sederhana / api ringan
// $student = mysqli_fetch_all($result, MYSQLI_ASSOC);
// foreach ($student as $key => $std){
//     var_dump($std);
// }

//cara 2 untuk project besar / data banyak
// while ($student = mysqli_fetch_assoc($result)){
//     var_dump($student);
// }

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function cud($query){
    global $conn;

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload($files){
    $file_name = $files['name'];
    $tmp_name = $files['tmp_name'];

    $allowed_extensions = ['png', 'jpg', 'jpeg'];
    $ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    if (!in_array($ext, $allowed_extensions)){
        return false;
    }

    $upload_dir = 'assets/img/';
    $destination = $upload_dir . $file_name;

    move_uploaded_file($tmp_name, $destination);

    return $destination;
}

?>