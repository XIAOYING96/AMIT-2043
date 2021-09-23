<?php
session_start();

if (isset($_POST['delete'])) {

    session_destroy();

    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=8" />
        <title>View Message</title>
        <link type="text/css" href="css/style.css" rel="stylesheet" />
    </head>
    <body>
        <h1>View Message</h1>

<?php
if (isset($_SESSION['message'])) {

    $all_msg = $_SESSION['message'];

    echo '<ul>';
    foreach ($all_msg as $msg) {
        echo "<li>$msg</li>";
    }
    echo '</ul>';
} else {
    echo '<p>No message in the session.</p>';
}
?>

        <form action="" method="post">
            <input type="submit" name="delete" value="Delete All" />
            <input type="button" value="Add Message"
                   onclick="location = 'add-message.php'" />
        </form>
    </body>
</html>