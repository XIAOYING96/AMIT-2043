<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>P1Q2</title>
    </head>
    <body>
        <?php
        $s1 = 'INVALID-ID';
        $s2 = '1234567890';
        $s3 = '00XXX12345';
        $s4 = '00WAD12345';
        
        $pattern = '/^\d{2}[A-Z]{3}\d{5}/';
        
        //$pattern = '/^\d{2}[ACJPSW][ABHPT][ABCDP]\d{5}$/';
        
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
