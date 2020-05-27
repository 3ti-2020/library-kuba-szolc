<?php require('conn.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Library</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Library</h1>
    <form action="insert.php" method="POST">
        <input type="text" name="imie" placeholder="imie">
        <input type="text" name="nazwisko" placeholder="nazwisko">
        <input type="submit" value="dodaj">        
    </form>
    <form action="insert.php" method="POST">
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
        <input type="submit" value="dodaj">
    </form>


    <form action="delete.php" method="POST">
    <?php
            $result = $conn->query("SELECT * FROM autorzy, tytuly, krzyzowa WHERE autorzy.id_autorzy = krzyzowa.id_autorzy AND tytuly.id_tytuly = krzyzowa.id_tytuly");

            echo("<select name='delksiazka'>");
            echo("<option value=''>usun ksiazke</option>");

            while($row=$result->fetch_assoc() ){
                echo("<option value=".$row['id_tytuly'].">".$row['imie']." ".$row['nazwisko']." - ".$row['tytul']."</option>");
            }
            echo("</select>");
        ?>
        <input type="submit" value="usun">
    </form>


    <!-- __________________________________________________________________________ -->

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

    <!-- __________________________________________________________________________ -->
    <br>
    <br>
    <h3>tabelki kontrolne</h3>

    <div class="kontrolne">
        <?php
            $autorzy = $conn->query("SELECT * FROM autorzy");
            $tytuly = $conn->query("SELECT * FROM tytuly");
            echo("<table border=1px>");
            echo("<tr>");
                    echo("<th>id</th>");
                    echo("<th>imie</th>");
                    echo("<th>nazwisko</th>");
                echo("</tr>");
            while($row=$autorzy->fetch_assoc() ){
                echo("<tr>");
                    echo("<td>".$row['id_autorzy']."</td>");
                    echo("<td>".$row['imie']."</td>");
                    echo("<td>".$row['nazwisko']."</td>");
                echo("</tr>");
            }
            echo("</table");
            echo("<br>");
            echo("<table border=1px>");
            echo("<tr>");
                    echo("<th>id</th>");
                    echo("<th>tytul</th>");
                    echo("<th>ISBN</th>");
                echo("</tr>");
            while($row=$tytuly->fetch_assoc() ){
                echo("<tr>");
                    echo("<td>".$row['id_tytuly']."</td>");
                    echo("<td>".$row['tytul']."</td>");
                    echo("<td>".$row['ISBN']."</td>");
                echo("</tr>");
            }
            echo("</table");
        ?>
    </div>
</body>
</html>




