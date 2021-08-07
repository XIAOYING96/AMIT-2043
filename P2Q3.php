<!DOCTYPE html>

<html>
    <head>
        <style>
            header{
                background-color: #cccccc;
            }
        </style>
        <meta charset="UTF-8">
        <title>P1Q3</title>

    </head>
    <body>
        <?php
        $data = array(
            "AACS 3013" => 70,
            "AACS 3073" => 95,
            "AAMS 3683" => 55,
            "AACS 3034" => 75,
            "AHLA 3413" => 65
        );
        ?>
        <table border = "0">
            <tr bgcolor = "#cccccc">
                <th>COURSE</th><!-- comment -->
                <th>PASSING RATE</th>
            </tr>

            <?php
            foreach ($data as $key => $value) {
                $width = ($value * 5) . 'px';
                $color = ($value >= 70 ? 'lightblue' : 'pink');

                echo"
                           <tr>
                            <td>$key</td>
                            <td><span style ='display:inline-block;
                                background-color:$color;
                                width:$width'>&nbsp</span>$value%</td>
                           </tr>";
            }
            ?>
            
           
        </table>
        
        <p>
            {<a href="index.php">Back</a>}
        </p>
    </body>
</html>
