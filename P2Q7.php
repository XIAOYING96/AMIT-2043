<?php
function printList($arr)
{
    echo '<ul>';
    foreach ($arr as $value)
    {
        $color = $value % 2 == 0 ? 'red' : 'black';
        printf('<li style="color:%s">%04d</li>', $color, $value);
    }
    echo '</ul>';
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>P1Q3</title>
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>
    <body>
        <?php
        $num = array();

        // Generate 5 random numbers.
        for ($i = 1; $i <= 5; $i++)
        {
            $num[] = rand(0, 9999);
        }

        echo 'Original:';
        printList($num);

        echo 'Ascending:';
        sort($num);
        printList($num);

        echo 'Descending:';
        rsort($num);
        printList($num);
        ?>

        <p>
            [ <a href="index.php">Back</a> ]
        </p>
    </body>
</html>
