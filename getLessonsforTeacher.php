<?php
include("connect.php");
$Teacher = $_GET["Teacher"];
    try 
    {
        $sqlSelect = "SELECT * FROM lesson,teacher,lesson_teacher
        WHERE ID_Teacher = FID_Teacher AND ID_Lesson = FID_Lesson1 
        AND `Name` =:Teacher";

        $sth = $dbh->prepare($sqlSelect);
        $sth->bindValue(":Teacher",$Teacher);
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
