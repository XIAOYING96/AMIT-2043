<!DOCTYPE html>

<html>
    <head>
        <meta charset="Content-Type" content="tetx/html;charset-UTF-8">
        <title>P2Q5</title>
        <link rel ="stylesheet" type="text/css" href="style.css"/>
    </head>
    <body>
        <?php
        define('ROW',10);
        define('COL', 15);
        
        echo '<table border="1">';
        for($x = 1;$x <= ROW;$x++)
        {
            echo '<tr height="20"';
            for($y = 1;$y <= COL;$y++)
            {
                $color = (($x + $y) % 2 == 0)? 'pink':'white';
                echo "<td width = '20' bgcolor = '$color'>&nbsp</td>";
            }
            echo '</tr>';
        }
        
        echo '</table>';
        echo 'The table is having '. ROW . ' rows and '. COL . ' column .';
        ?>
        
        <p>
            {<a href="index.php">Back</a>}
        </p>
    </body>
</html>
