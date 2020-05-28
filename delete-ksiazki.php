<?php
    require('conn.php');

    $id_tytuly = $_POST['delksiazka'];
    if($id_tytuly!=""){
        $conn->query("DELETE FROM krzyzowa WHERE id_tytuly = '$id_tytuly' ");
        $conn->query("DELETE FROM tytuly WHERE id_tytuly = '$id_tytuly' ");
    }
    
    include('index.php');

?>