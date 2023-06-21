<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lessons</title>
</head>
<body>
    
<h2>Виведення розкладу занять для довільної групи зі списку</h2>
<form action="getLessonsforGroups.php" method="get">
    <select name="Group" id="Group">
        <?php
        include("connect.php");

        try {
            foreach ($dbh->query("SELECT title FROM `groups`") as $row) {
                $optionValue = htmlspecialchars($row[0]);
                echo "<option value='$optionValue'>$optionValue</option>";
            }
        } catch(PDOException $ex) {
            echo $ex->getMessage();
        }
        ?>
    </select>
    <input type="submit" value="Результат">
</form>
    
    <h2>Виведення розкладу занять для довільного викладача зі списку</h2>
    <form action="getLessonsforTeacher.php" method="get">
        <select name="Teacher" id="Teacher">
    <?php
    include("connect.php");
    try {
         foreach($dbh->query("SELECT Name FROM teacher") as $row){
            $optionValue = htmlspecialchars($row[0]);
                echo "<option value='$optionValue'>$optionValue</option>";
        }
    }
    catch(PDOException $ex){
        echo $ex->GetMessage();
    }
    ?>
    </select>
        <input type="submit" value="Результат">
    </form>

<h2>Виведення розкладу занять для аудиторії зі списку</h2>
    <form action="getAuditoriumforLesson.php" metod="get">
        <select name="Auditorium" id="Auditorium">
    <?php
    include("connect.php");
    try {
         foreach($dbh->query("SELECT DISTINCT auditorium FROM lesson") as $row){
            $optionValue = htmlspecialchars($row[0]);
                echo "<option value='$optionValue'>$optionValue</option>";
        }
    }
    catch(PDOException $ex){
        echo $ex->GetMessage();
    }
    ?>
    </select>
        <input type="submit" value="Результат">
    </form>

</body>
</html>