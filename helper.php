<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'practical4');

function getPrograms()
{
    return array(
        'IA' => 'Information Systems Engineering',
        'IB' => 'Business Information Systems',
        'IT' => 'Internet Technology'
    );
}

// Return an array of all genders.
function getGenders()
{
    return array(
        'F' => 'Female',
        'M' => 'Male'
    );
}

$PROGRAMS = getPrograms();
$GENDERS = getGenders();

function htmlSelect($name, $items, $selectedValue = '', $default = '')
{
    printf('<select name="%s" id="%s">' . "\n",
           $name, $name);

    if ($default != null)
    {
        printf('<option value="">%s</option>', $default);
    }

    foreach ($items as $value => $text)
    {
        printf('<option value="%s" %s>%s</option>' . "\n",
               $value,
               $value == $selectedValue ? 'selected="selected"' : '',
               $text);
    }
    
    echo "</select>\n";
}

function htmlInputText($name, $value = '', $maxlength = '')
{
    printf('<input type="id" name="%s" id="%s" value="%s" maxlength="%s" />' . "\n",
           $name, $name, $value, $maxlength);
}

function htmlInputPassword($name, $value = '', $maxlength = '')
{
    printf('<input type="password" name="%s" id="%s" value="%s" maxlength="%s" />' . "\n",
           $name, $name, $value, $maxlength);
}

function htmlInputHidden($name, $value = '')
{
    printf('<input type="hidden" name="%s" id="%s" value="%s" />' . "\n",
           $name, $name, $value);
}

function htmlRadioList($name, $items, $selectedValue = '', $break = false)
{
    foreach ($items as $value => $text)
    {
        printf('
            <input type="radio" name="%s" id="%s" value="%s" %s />
            <label for="%s">%s</label>' . "\n",
            $name, $value, $value,
            $value == $selectedValue ? 'checked="checked"' : '',
            $value, $text);

        if ($break)
            echo "<br />\n";
    }
}

function validateStudentID($id)
{
    if ($id == null)
    {
        return 'Please enter <strong>Student ID</strong>.';
    }
    else if (!preg_match('/^\d{2}[A-Z]{3}\d{5}$/', $id))
    {
        return '<strong>Student ID</strong> is of invalid format. Format: 99XXX99999.';
    }
    else if (isStudentIDExist($id))
    {
        return '<strong>Student ID</strong> given already exist. Try another.';
    }
}
