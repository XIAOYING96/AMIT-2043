<?php

function generateDatePicker() {
    $months = array(
        1 => "January",
        2 => "February",
        3 => "March",
        4 => "April",
        5 => "May",
        6 => "June",
        7 => "July",
        8 => "August",
        9 => "September",
        10 => "October",
        11 => "November",
        12 => "December"
    );

    date_default_timezone_set('Asia/Kuala_Lumpur');
    $today = getdate();
    $cur_day = $today['mday'];
    $cur_month = $today['mon'];
    $cur_year = $today['year'];

    echo '<select name = "day">';
    for ($d = 1; $d <= 31; $d++) {
        printf('<option %s>%d</option>',
                $d == $cur_day ? 'selected ="selected"' : '',
                $d
        );
    }
    echo '</select>';

    echo '<select name = "month">';
    foreach ($months as $key => $value) {
        printf('<option %s value = "%d">%s</option>',
                $key == $cur_month ? 'selected ="selected"' : '',
                $key,
                $value
        );
    }
    echo '</select>';

    echo '<select name = "year">';
    for ($y = $cur_year - 20; $y <= $cur_year; $y++) {
        printf('<option %s>%d</option>',
                $y == $cur_year ? 'selected ="selected"' : '',
                $y
        );
    }
    echo '</select>';
}
?>
<!DOCTYPE html>

<html>
    <head>
        <meta http-equiv ="Content-Type" content="text/html;charset=UTF-8">
        <title>P2Q8</title>
        <link rel="stylesheet" type="text/css" href="style.css"/>

    </head>
    <body>
<?php
generateDatePicker();
?>
        <p>
            {<a href="index.php">Back</a>}
        </p>
    </body>

</html>
