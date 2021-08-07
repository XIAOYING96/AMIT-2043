<?php
$state = array(
    'JH' => 'Johor',
    'KD' => 'Kedah',
    'KT' => 'Kelantan',
    'KL' => 'Kuala Lumnpur',
    'LB' => 'Labuan',
    'MK' => 'Melaka',
    'NS' => 'Negeri Sembilan',
    'PH' => 'Pahang',
    'PN' => 'Penang',
    'PR' => 'Perak',
    'PL' => 'Perlis',
    'PJ' => 'Putrajaya',
    'SB' => "Sabah",
    'SW' => 'Sarawak',
    'SG' => 'Selangor',
    'TR' => "Terengganu"
        );
?>
<!DOCTYPE html>

<html>
    <head>
        <meta http-equiv="Content-Type" content="tetx/html;charset=UTF-8">
        <title>P2Q6 </title>
        <link rel="stylesheet" type="text/css" href="style.css"/>
    </head>
    <body>
        <?php
        echo '<ul>';
        foreach ($state as $key => $value) {
            echo "<li>$value ($key) </li>";
        }
        echo '</ul>';
        
        ?>
        <p>
            {<a href="index.php">Back</a>}
        </p>
    </body>
</html>
