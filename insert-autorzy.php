<?php
    require('conn.php');

    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    if($imie!="" && $nazwisko!=""){
        $conn->query("INSERT INTO autorzy(id_autorzy, imie, nazwisko) VALUES (NULL, '$imie', '$nazwisko') ");
    }
    
    include('index.php');

?>