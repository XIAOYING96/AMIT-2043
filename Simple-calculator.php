<?php
function detectInputError(){
    global $num1,$num2;
    
    //holding error message
    $error = array();
    
    //number 1
    if($num1 == null){
        $error['num1'] = 'Please enter <strong>Number 1</strong>.';
    }
    else if(!preg_match('/^[+-]?\d+$/',$num1)){
        $error['num1'] = '<strong>Number 1 </strong> ,ust be an integer.';
    }
    else if($num1 < (PHP_INT_MAX - 1) || $num1 >PHP_INT_MAX){
        $error['num1'] = '<strong>Number 1 </strong>,ust between'.(PHP_INT_MAX - 1)
                .' and '.'PHP_INT_MAX'.'.';
    }
    
    //number 2
    if($num2 == null){
        $error['num1'] = 'Please enter <strong>Number 2</strong>.';
    }
    else if(!preg_match('/^[+-]?\d+$/',$num2)){
        $error['num1'] = '<strong>Number 2 </strong> ,ust be an integer.';
    }
    else if($num2 < (PHP_INT_MAX - 1) || $num2 >PHP_INT_MAX){
        $error['num2'] = '<strong>Number 2 </strong>,ust between'.(PHP_INT_MAX - 1)
                .' and '.'PHP_INT_MAX'.'.';
    }
    else if(isset ($_POST['divide']) && ((int)$num2 == 0)){
        $error['num2'] = 'Cannot divide by 0. Change <strong>Number 2</strong>.';
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="tetx/html;charset=UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE-8"/>
        <title>Simple Calculator</title>
        <link type="text/css" href="css/stylesheet.css" rel="Stylesheet"/>
    </head>
    <body style="font-size: 1.2em">
        <h1>Simple Calculator</h1>
        
        <?php
        $num1 = ' ';
        $num2 = ' ';
        ?>
        <?php
        if(!empty($_POST)){//indicates a postback
            $num1 = trim($_POST['num1']);
            $num2 = trim($_POST['num2']);
            
            $error = detectInputError();
            if(empty($error)){
                $n1 = (int)$num1;
                $n2 = (int)$num2;
                
                if(isset($_POST['add'])){
                    $action = 'Add';
                    $symbol = '+';
                    $answer = $n1 + $n2;
                }
                
                else if(isset($_POST['minus'])){
                    $action = 'Minus';
                    $symbol = '-';
                    $answer = $n1 - $n2;
                }
                
                else if(isset($_POST['multiply'])){
                    $action = 'Multiply';
                    $symbol = '*';
                    $answer = $n1 * $n2;
                }
                
                else if(isset($_POST['divide'])){
                    $action = 'Divide';
                    $symbol = '/';
                    $answer = $n1 / $n2;
                }
                
                printf('<div class = "info" style="font-size:larger">
                        <strong> %s </strong> : %d %s %d = <strong> %s </strong>
                        </div>',
                        $action,$n1,$symbol,$n2,$answer);
                }
                
                else{
                    printf('<ul class = "error"><li> %s </li></ul>',
                    implode('</li><li>',$error));
            }
        }
        ?>
        
        <form action="" method="post">
            <table cellspacing =" "5">
                <tr>
                    <td><label for="num1">Number 1</label></td>
                    <td><input type="text" name = "num1" id="num1" value="<?php 
                    echo $num1 ?>"/></td>
                </tr>
                
                <tr>
                    <td><label for="num2">Number 2</label></td>
                    <td><input type="text" name = "num2" id="num2" value="<?php 
                    echo $num2 ?>"/></td>
                </tr>
            </table>
            
            <input type="submit" name="add" value="Add"/>
            <input type="submit" name="minus" value="Minus"/>
            <input type="submit" name="multiply" value="multiply"/>
            <input type="submit" name="divide" value="divide"/>
            
            <input type="button" value="Reset" onclick="location='<?php echo $_SERVER['PHP_SELF'] ?>'"/>
        </form>
    </body>
    <script type="text/javascript">
        </script>
</html>
