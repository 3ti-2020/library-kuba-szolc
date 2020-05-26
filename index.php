<?php
    $conn = new mysqli('localhost', 'root', 'zaq1@WSX', 'library');
    $result = $conn->query("SELECT * FROM autorzy, tytuly, krzyzowa WHERE autorzy.id_autorzy = krzyzowa.id_autorzy AND tytuly.id_tytuly = krzyzowa.id_tytuly");

    echo("<table border=1px>");
    echo("<tr>");
            echo("<th>autor</th>");
            echo("<th>tytul</th>");
            echo("<th>ISBN</th>");
        echo("</tr>");
    while($row=$result->fetch_assoc() ){
        echo("<tr>");
            echo("<td>".$row['imie']." ".$row['nazwisko']."</td>");
            echo("<td>".$row['tytul']."</td>");
            echo("<td>".$row['ISBN']."</td>");
        echo("</tr>");
    }
    echo("</table");
?>