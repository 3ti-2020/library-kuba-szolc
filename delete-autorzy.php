<?php
    require('conn.php');

    $id_autorzy = $_POST['delautor'];
    if($id_autorzy!=""){
        $conn->query("DELETE FROM autorzy WHERE id_autorzy = '$id_autorzy' ");
    }
    
    include('index.php');

?>