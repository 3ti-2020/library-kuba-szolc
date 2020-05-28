<?php require('conn.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Library</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
        <h1>Library</h1>
        <h3>Kuba Szolc</h3>
    </div>
    <div class="left">
        <div class="inserty">
            <form action="insert-autorzy.php" method="POST">
                <h3>Dodaj autora</h3>
                <input type="text" name="imie" placeholder="imie">
                <input type="text" name="nazwisko" placeholder="nazwisko">
                <input type="submit" value="Dodaj">        
            </form>
            <form action="insert-ksiazki.php" method="POST">
                <h3>Dodaj książkę</h3>
                <input type="text" name="tytul" placeholder="tytul">
                <input type="text" name="ISBN" placeholder="ISBN">
                <?php
                    $result = $conn->query("SELECT * FROM autorzy");

                    echo("<select name='autor'>");
                    echo("<option value=''>wybierz</option>");

                    while($row=$result->fetch_assoc() ){
                        echo("<option value=".$row['id_autorzy'].">".$row['imie']." ".$row['nazwisko']."</option>");
                    }
                    echo("</select>");
                ?>
                <input type="submit" value="Dodaj">
            </form>
        </div>
        <div class="delety">
            <form action="delete-ksiazki.php" method="POST">
                <h3>Usuń książkę</h3>
                <?php
                    $result = $conn->query("SELECT * FROM autorzy, tytuly, krzyzowa WHERE autorzy.id_autorzy = krzyzowa.id_autorzy AND tytuly.id_tytuly = krzyzowa.id_tytuly");

                    echo("<select name='delksiazka'>");
                    echo("<option value=''>wybierz</option>");

                    while($row=$result->fetch_assoc() ){
                        echo("<option value=".$row['id_tytuly'].">".$row['imie']." ".$row['nazwisko']." - ".$row['tytul']."</option>");
                    }
                    echo("</select>");
                ?>
                <input type="submit" value="Usuń">
            </form>
            <form action="delete-autorzy.php" method="POST">
                <h3>Usuń autora</h3>
                <?php
                    $result = $conn->query("SELECT * FROM autorzy");

                    echo("<select name='delautor'>");
                    echo("<option value=''>wybierz</option>");

                    while($row=$result->fetch_assoc() ){
                        echo("<option value=".$row['id_autorzy'].">".$row['imie']." ".$row['nazwisko']."</option>");
                    }
                    echo("</select>");
                ?>
                <input type="submit" value="Usuń">
            </form>
        </div> 
    </div>

    
    <div class="right">
        <div class="tabelki">
            <?php
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
        </div>
    </div>
</body>
</html>




