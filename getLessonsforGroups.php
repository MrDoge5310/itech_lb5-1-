<?php
include("connect.php");
$Group = $_GET["Group"];
    try 
    {
        $sqlSelect = "SELECT * FROM lesson,`groups`,lesson_groups 
        WHERE ID_Groups = FID_Groups AND ID_Lesson = FID_Lesson2 
        AND title =:Group";
        $sth = $dbh->prepare($sqlSelect);
        $sth->bindValue(":Group",$Group);
        $sth->execute();
        $res = $sth->fetchAll(PDO::FETCH_NUM);
        
        echo "<table border = '1'>";
        echo "<thead><tr><th>День</th><th>Пара</th><th>Аудитория</th><th>Предмет</th><th>Тип занятия</th></tr></thead>";
        echo "<tbody>";
        foreach($res as $row)
        {
            echo "<tr><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td></tr>";
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