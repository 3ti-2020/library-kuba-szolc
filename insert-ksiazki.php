<?php
    require('conn.php');

    $tytul = $_POST['tytul'];
    $isbn = $_POST['ISBN'];
    if($tytul!="" && $isbn!=""){
        $conn->query("INSERT INTO tytuly(id_tytuly, tytul, ISBN) VALUES (NULL, '$tytul', '$isbn') ");
    }

    $result = $conn->query("SELECT id_tytuly FROM tytuly ORDER BY id_tytuly DESC LIMIT 1 ");
    $row=$result->fetch_assoc();
    $id_tytuly=$row['id_tytuly'];
    
    $autor = $_POST['autor'];
    if($autor!=""){
        $conn->query("INSERT INTO krzyzowa(id_krzyzowa, id_autorzy, id_tytuly) VALUES (NULL, '$autor', '$id_tytuly') ");
    }

    include('index.php');

?>