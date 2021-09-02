<?php

function getClubs() {
    return array(
        'LD' => 'Ladies Club',
        'GT' => 'Gentlemen Club',
        'DT' => 'DOTA and Gaming Club',
        'MG' => 'Manga and Comic CLub',
        'PS' => 'Pet Society Club',
        'PV' => 'Farmville Club',
    );
}

function detectInputError() {
    global $gender, $name, $phone, $clubs;

    $error = array();

    //gender
    if ($gender == null) {
        $error['gender'] = 'Unisex? Please select your <strong> gender </strong>.';
    } else if (!preg_match('/^[MF]$/', $gender)) {
        $error['gender'] = '<strong>Gender</strong> can only be either M or F.';
    }

    //name
    if ($name == null) {
        $error['name'] = 'Nameless ? Please enter you <strong>name</strong>.';
    } else if (strlen($name) > 30) {
        $error['name'] = 'You <strong> name </strong> is too long . It must be less than 30 character.';
    } else if (!preg_match('/^[A-Za-z @,\'\.\-\/]+$/', $name)) {
        $error['name'] = 'There are invalid character in your <strong> name </strong>.';
    }

    //phone
    if ($phone == null) {
        $error['phone'] = 'Please enter your <strong> mobile phone </strong> number.';
    } else if (!preg_match('/^01\d-\d{8}$/')) {
        $error['phone'] = 'Your <strong>mobile phone</strong> number is invalid. Format: 999-9999999 and starts with 01.';
    }



    if ($clubs == null) {
        $error['clubs'] = 'Please select <strong> clubs </strong> that you want to join.';
    } else if (count($clubs) > 3) {
        $error['clubs'] = 'You cannot select more than 3 <strong> clubs </strong>.';
    } else if (array_diff($clubs, array_keys(getClubs())) != null) {
        $error['clubs'] = 'You have selected invalid <strong> clubs </strong>.';
    }

    //gender-clubs
    if ($gender != null && $clubs != null) {
        if ($gender == 'M' && in_array('LD', $clubs)) {
            $error['gender-clubs'] = 'Sorry. Males not allowed to join the <strong> Ladies Club </strong>';
        } else if ($gender == 'F' && in_array('GT', $clubs)) {
            $error['gender-clubs'] = 'Sorry . Female not allowed to join the <strong> Gentlemen Clubs</strong>';
        }
    }

    return $error;
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Traditional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset = UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-8"/>
        <title>Club Result</title>
        <link type="text/css" href="css/style.css" rel="stylesheet"/>
    </head>

    <body style="font-size: 1.2cm">
<?php
if (isset($_POST['submit'])) {
    $gender = trim($_POST['gender']);
    $name = trim($_POST['name']);
    $phone = trim($_POST['phone']);
    $clubs = $_POST['clubs'];

    $error = detectInputError();

    if (empty($error)) {
        printf('
                       <h1>Thanks for joining</h1>
                       <p>
                           <strong style = "font-size:larger">%s.%s</strong><br/>
                           You have joined the following clubs:
                        </p>',
                $gender == 'M' ? 'Mr' : 'Ms', $name);

        $allClubs = getClubs();

        echo '<ul>';
        foreach ($clubs as $value) {
            echo "<li>$allClubs[$value] ($value)</li>";
        }
        echo '</ul>';
    } else {
        printf('
                        <h1>OOPS....There are input errors</h1>
                        <ul style="color:red"><li>%s</li></ul>
                        <p>[<a href="javascript:history.back()">Back</a>]</p>',
                implode('</li><li>', $error));
    }
} else {
    echo '<script type ="text/javascript">
            location = "clubs-join.php";</script>';
}
?>
</html>