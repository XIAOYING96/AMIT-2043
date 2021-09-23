<?php

session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=8" />
        <title>Add Message</title>
        <link type="text/css" href="css/style.css" rel="stylesheet" />
    </head>
    <body>
        <h1>Add Message</h1>

        <?php

        if (isset($_POST['message_to_add']))
        {
     
            $msg = trim($_POST['message_to_add']);
            
            if ($msg != null)
            {
    
                $msg = htmlspecialchars($msg);

                $_SESSION['message'][] = $msg;

                echo '<p>Message added to session.</p>';
                
                //echo "<pre>";
                //print_r($_SESSION['message']);
                //echo "</pre>";
            }
        }
        ?>

        <form action="" method="post">
            <input type="text" name="message_to_add" id="message_to_add" maxlength="40" size="40" />
            <input type="submit" name="add" value="Add" />
            <input type="button" value="View"
                   onclick="location='view-message.php'" />
        </form>
    </body>

    <script type="text/javascript">
        // Just for fun. Please ignore.
        document.getElementById("message_to_add").focus();
    </script>
</html>