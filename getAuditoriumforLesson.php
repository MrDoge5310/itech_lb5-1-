<?php
include("connect.php");
$Auditorium = $_GET["Auditorium"];
    try 
    {
        $sqlSelect = "SELECT week_day, lesson_number, disciple, type FROM lesson WHERE auditorium =:Auditorium";

        $sth = $dbh->prepare($sqlSelect);
        $sth->bindValue(":Auditorium",$Auditorium);
        $sth->execute();
        $res = $sth->fetchAll(PDO::FETCH_NUM);
        
        echo "<table border = '1'>";
        echo "<thead><tr><th>День</th><th>Пара</th><th>Предмет</th><th>Тип занятия</th></tr></thead>";
        echo "<tbody>";
        foreach($res as $row)
        {
            echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td></tr>";
        }
        echo "</tbody>";
        echo "</table>";
    }
    catch(PDOException $ex)
    {
        echo $ex->GetMessage();
    }
    $dbh = null;
?>
