<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $s1 = 'INVALID-IC-NUM';
        $s2 = '12345678901234';
        $s3 = '123456-01-1234';
        $s4 = '900214-01-1234';
        
        $pattern = '/^\d{2}(0[1-9]|1[0-2])(0[1-9]|[12][0-9]|3[01])-\d{2}-\d{4}$/';
        
        echo'<pre>';
        echo $s1.' = '.(preg_match($pattern,$s1) ? 'Matched':'Not matched')."\n";
        echo $s2.' = '.(preg_match($pattern,$s2) ? 'Matched':'Not matched')."\n";
        echo $s3.' = '.(preg_match($pattern,$s3) ? 'Matched':'Not matched')."\n";
        echo $s4.' = '.(preg_match($pattern,$s4) ? 'Matched':'Not matched')."\n";
        echo '<pre>';
        ?>
        
        <p>
            {<a href="index.php">Back</a>}
        </p>
    </body>
</html>
