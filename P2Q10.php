<?php
function isValidIc($ic){
            $pattern = '/^\d{6}-\d(2)-\d(4)$/';
            
            if(preg_match($pattern,$ic))
            {
                $yeaar  = substr($ic,0,2);
                $month  = substr($ic,2,2);
                $day    = substr($ic,4,2);
                
                if(checkdate($month,$day,$year)){
                    return true;
                }
            }
            return false;
}
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $s1 = 'INVALID-IC-NUM';
        $s2 = '999999-01-1234';
        $s3 = '900231-01-1234';
        $s4 = '900214-01-1234';
        
        echo '<pre>';
        echo $s1.' = '.(isValidIc($s1) ? 'Valid':'Invalid')."\n";
        echo $s2.' = '.(isValidIc($s2) ? 'Valid':'Invalid')."\n";
        echo $s3.' = '.(isValidIc($s3) ? 'Valid':'Invalid')."\n";
        echo $s4.' = '.(isValidIc($s4) ? 'Valid':'Invalid')."\n";
        echo '<pre>';
        ?>
        
        <p>
            {<a href="index.php">Back</a>}
        </p>
    </body>
</html>
