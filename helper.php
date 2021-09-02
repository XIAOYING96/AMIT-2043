<?php
function getStates(){
    return array(
        ' ' => '--Selected One--',
        'JH' => 'Johor',
        'KD' => 'Kedah',
        'KT' => 'Kelantan',
        'LB' => 'Labuan',
        'MK' => 'Melaka',
        'NS' => 'Negeri Sembilan',
        'PH' => 'Pahang',
        "PR" => 'Perak',
        'PG' => 'Penang',
        'PL' => 'Perlis',
        'PJ' => 'Putrajaya',
        'SB' => 'Sabah',
        'SW' => 'Sarawak',
        'SG' => 'Selangor',
        'TR' => 'Terengganu',
    );
}

function getGenders(){
    return array(
        'F' => 'Female',
        'M' => 'Male',
    );
}

function htmlSelect($name,$items,$selectedValue = ' '){
    printf('<select name="%s" id="%s">'."\n",
            $name, $name);
    
    foreach ($items as $value => $text){
        printf('<option value = "%s" %s>%s</option>'."\n",
                $value,
                $value == $selectedValue ? 'selected="selected"':' ',
                $text);
    }
    
    echo"</select>\n";
}

function htmlInputText($name,$value = ' ',$maxlength = ' '){
    printf('<input type="text" name="%s" id="%s" value="%s" maxlength="%s"/>'."\n",
            $name, $name,$value,$maxlength);
} 

function htmlInputPassword($name, $value = '', $maxlength = ''){
    printf('<input style="font-family: verdana" type="password" name="%s" id="%s" value="%s" maxlength="%s" />' . "\n",
           $name, $name, $value, $maxlength);
}

function htmlRadioList($name,$items,$selectedValue = ' ',$break = false){
    foreach ($items as $value => $text){
        printf('<input type="radio" name ="%s" id="%s" value="%s" %s/>
                <label for="%s">%s</label>'."\n",
                $name,$value,$value,
                $value == $selectedValue ? 'checked="checked"':' ',
                $value,$text);
        
        if($break)
            echo "<br/>\n";
    }
}
?>