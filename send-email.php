<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=8" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <title>Send Email</title>
    </head>
    <body>
        <h1>Send Email</h1>

        <?php
        if (isset($_POST['submit']))
        {
            $to      = $_POST['to'];
            $subject = $_POST['subject'];
            $message = $_POST['message'];

            $headers = "From: Practical Class";

            $return = mail($to, $subject, $message, $headers);
            
            if($return)
            {
                echo "Email sent out";
            }
            else
            {
                echo "Email unable to send out.";
            }
        }
        else
        {
            $to = '';
            $subject = '';
            $message = '';
        }	
        ?>

        <form action="" method="post">
            <table cellspacing="10">
                <tr>
                    <td>To:</td>
                    <td><input type="text" name="to" value="<?php echo $to ?>" style="width: 300px" /></td>
                </tr>
                <tr>
                    <td>Subject:</td>
                    <td><input type="text" name="subject" value="<?php echo $subject ?>" style="width: 300px" /></td>
                </tr>
                <tr>
                    <td valign="top">Message:</td>
                    <td><textarea name="message" style="width: 300px; height: 200px"><?php echo $message ?></textarea></td>
                </tr>
            </table>
            <input type="submit" name="submit" value="Send Email" />
        </form>

    <p>
        [ <a href="index.php">Index</a> ]
    </p>
    </body>
</html>
