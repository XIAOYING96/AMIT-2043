<!DOCTYPE html>

<html>
    <head>
        <meta http-equiv="Content-type" content="text/html;charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=8"/>
        <title>Kinder Math Question</title>
        <link type="text/css" href="css/style.css" rel="Stylesheet"/>
    </head>
    <body style="font-size: 1.2cm">
        <h1>Kindergarden Math</h1>
        <form action="kinder-math-result.php" method="post">
            <table border="0" cellspacing="0" cellpadding="10">
                <?php
                
                define('MIN',1);
                define('MAX', 9);
                define('NUM_OF_QUES', 5);
                
                for($i = 1;$i <= NUM_OF_QUES;$i++){
                    $n1 = rand(MIN,MAX);
                    $n2 = rand(MIN,MAX);
                    
                    printf('
                            <tr class = "question">
                            <td>Q%d.</td>
                            <td>%d + %d = </td>
                            <td>
                                <input type="text" name="ans[]" maxlength="2" style = "width:2.0cm"/>
                                <input type="hidden" name="nums1[]" value="%d"/>
                                <input type="hidden" name="nums2[]" value="%d"/>
                            </td>
                            </tr>
                            <tr><td colspan="3"></td></tr>',
                            $i,$n1,$n2,$n1,$n2);
                }
                ?>
                
            </table>
            <input type="submit" name="submit" value="Submit"/>
            <input type="button" value="Re-Generate"
                   onclick="location='<?php echo $_SERVER['PHP_SELF']?>'" />
        </form>
    </body>
    <script type="text/javascript">
        document.getElementsByName("ans[]")[0].focus();
        </script>
</html>
