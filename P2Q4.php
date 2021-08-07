   <?php

function getGrade($mark) {
    if ($mark >= 80)
        return 'A';
    else if ($mark >= 70)
        return 'B';
    else if ($mark >= 60)
        return 'C';
    else if ($mark >= 50)
        return 'D';
    else
        return 'F';
}

function getComment($grade) {
    switch ($grade) {
        case 'A' :
            return 'Passed with distinction';
            break;

        case 'B':
        case "C":
            return 'Passed';
            break;

        case 'D':
            return 'Passed with condition';
            break;

        default:
            return 'Failed';
            break;
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/css">
        <title>P2Q4</title>
        <link rel="stylesheet" type="text/css" href="style.css"/>
    </head>
    <body>
        <table border="1">
            <tr>
                <th>Name</th>
                <th>Mark</th>
                <th>Grade</th>
                <th>Comment</th>
            </tr>
            
            <?php
            $marks = array(
                "Alex" => 90,
                "Barbie" => 65,
                "Christian" => 45,
                "Elaine" => 75,
            );
            
            foreach ($marks as $key => $value) 
            {
                $grade = getGrade($value);
                $comment = getComment($grade);
                
                echo "
                    <tr>
                    <td>$key</td>
                    <td>$value</td>
                    <td>$grade</td>
                    <td>$comment</td>
                    </tr>";
            }
            ?>
        </table>
        
        
        <p>
            {<a href="index.php">Back</a>}
        </p>
</body>
</html>
