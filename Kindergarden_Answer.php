<!DOCTYPE html>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta http-equiv="X-UA-compatible" content="IE=8"/>
        <title>Kinder Math Result</title>
        <link type="text/css" href="css/style.css" rel="Stylesheet"/>
    </head>
    <body style="font-size: 1.2cm">
        <h1>Your Result</h1>
        <?php
        if(isset($_POST['submit'])){
            $ans = $_POST['ana']; //array of answer
            $num1 = $_POST['num1']; //array of first number
            $num2 = $_POST['num2']; // array of second number
            $count = 0; // no. of correct
            
            echo '<table cellspacing = "0" cellspading = "10">';
            
            for($i =0;$i< count($ans);$i++){
                $an = $and[$i]; //get individual answer
                $n1 = $num1[$i]; // get individual first number
                $n2 = $num2[$i]; //get individuall second number
                
                if((int)$n1 + (int)$n2 == (int)$an){ // if answer correst
                    $class = 'correct';
                    $image = 'images/correct-big.png';
                    $remark = 'Correct';
                    $count++;
                }
                else{//if answer is wrong
                    $class = 'wrong';//for css
                    $image = 'image/wrong-big.png';
                    $remark = 'It should be <strong>'.((int)$n1 + (int)$n2).'</strong>.';//strong is blod
                }
                
                printf('
                       <tr class="%s>
                        <td>Q%d</td>
                        <td>%d + %d = %s</td>
                        <td><img src = "%s" alt =""/></td>
                       <td>%s</td>
                       </tr>
                       <tr><td colspan = "4"></td></tr>',
                        $class, $i + 1,
                        $n1,$n2,$an,
                        $image, $remark);
            }
            echo '</table>';
            printf('
                   You get <strong> %d' )
        }
        ?>
    </body>
</html>
