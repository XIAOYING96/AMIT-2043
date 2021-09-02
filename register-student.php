<?php
require_once ("helper.php");

function detectError(){
    global $id,$password,$confirm,$name,$gender,$state,$email;
    
    $error = array();
    
    //id +-------------------------------------------------------------------------------------------
    if($id == null){
        $error["id"] = 'Please enter <string> Student ID </strong>.';
    }
    
    else if(!preg_match('/^\d{2}[A-Z]{3}\d{5}$/', $id)){
        $error["id"] = '<strong> Student ID</strong> is of invalid format. Format: 99XXX99999.';
    }
    
    //password +-----------------------------------------------------------------------------------
    if($password == null){
        $error["password"] = 'Please enter <strong> Password </strong>.';
    }
    
    else if(strlen($password) < 8|| strlen($password ) > 15){
        $error["password"] = '<strong> Password </strong> must between 8 to 15 characters.';
    }
    
    else if(!preg_match('/^\w+$./', $password)){
        $error["password"] = '<strong> Password </strong> must contain only alphabet,digit and underscore.';
    }
    
    //confirm +--------------------------------------------------------------------------------------------------
    if($confirm == null){
        $error["confirm"] = 'Please enter <strong> Confirm Password</strong>.';
    }
    
    else if($confirm != $password){
        $error["confirm"] = '<strong> Confirm Password</strong> must match the password.';
    }
    
    //name +----------------------------------------------------------------------------------------------
    if($name == null){
        $error["name"] = 'Please enter <strong> Student Name </strong>.';
    }
    
    else if(strlen($name) > 30){
        $error["name"] = '<strong> Student Name </strong> must not more than 30 character.'; 
    }
    
    else if(!preg_match('/^[A-Za-z @,\'\.\-\]+$/', $name)){
        $error["name"] = 'There are invalid letters in <strong> Student Name</strong>.';
    }
    
    //gender +---------------------------------------------------------------------------------------------
    if($gender == null){
        $error["gender"] = 'Please select a <strong> Gender </strong>.';
    }
    
    else if(!array_key_exists($gender, getGenders())){
        $error["gender"] = 'Invalid <strong> Gender </strong> code detected.';
    }
    
    //state +------------------------------------------------------------------------------------------------
    if($state == null){
        $error["state"] = 'Please select a <strong> State </strong>.';
    }
    
    else if(!array_key_exists($state, getStates())){
        $error["state"] = 'invalid <strong> State </strong> code detected.';
    }
    
    //email +------------------------------------------------------------------------------------
    if($email == null){
        $error["email"] = 'Please enter <strong> Email Address</strong>.';
    }
    
    else if(strlen($email) > 30){
        $error["email"] = '<strong> Email Address </strong> must not more than 30 character';
    }
    

    else if (!preg_match('/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/', $email)) {
        $error["email"] = '<strong>Email Address</strong> is of invalid format.';
    }
    return $error;
}

function showErrorIcon() {
    echo '<img style="vertical-align: middle" src="error.png" alt="Error". />';
}

?>

<!DOCTYPE "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=8" />
        <title>Register Student</title>
        <link type="text/css" href="css/style.css" rel="Stylesheet" />
    </head>
    <body>
        <h1>Register Student Account</h1>
        <?php
            $id       = '';
            $password = '';
            $confirm  = '';
            $name     = '';
            $gender   = '';
            $state    = '';
            $email    = '';     
            
            if (!empty($_POST))
            {
                $id       = strtoupper(trim($_POST['id']));
                $password = trim($_POST['password']);
                $confirm  = trim($_POST['confirm']);
                $name     = trim($_POST['name']);
                $gender   = trim($_POST['gender']);
                $state    = trim($_POST['state']);
                $email    = trim($_POST['email']);

                $error = detectError();
                
                if (empty($error))
                {
                    printf('
                        <div class="info">
                        Hi, <strong>%s</strong>, your account has been created.
                        [ <a href="javascript:alert(
                            \'Only for debug purpose:\n\n\' +
                            \'Student ID = %s\n\' +
                            \'Password = %s\n\' +
                            \'Confirm Password = %s\n\' +
                            \'Student Name = %s\n\' +
                            \'Gender = %s\n\' +
                            \'State = %s\n\' +
                            \'Email Address = %s\n\'
                          )">Check</a> ]
                        </div>',
                        $name,
                        $id, $password, $confirm, $name, $gender, $state, $email);

                    // Reset fields.
                    $id = $password = $confirm = $name = $gender = $state = $email = null;
                }
                else
                {
                    echo '<ul class="error">';
                    foreach ($error as $value)
                    {
                        echo "<li>$value</li>";
                    }
                    echo '</ul>';
                }
            }
            
        ?>
        
        <form action="" method="post">
            <table cellspacing="0" cellpadding="5">
                <tr>
                    <td><label for="id">Student ID :</label></td>
                    <td>
                        <?php htmlInputText('id', $id, 10) ?>
                    </td>
                    <td>
                        <?php if (isset($error['id'])) showErrorIcon() ?>
                    </td>
                </tr>
                <tr>
                    <td><label for="password">Password :</label></td>
                    <td>
                        <?php htmlInputPassword('password', $password, 15) ?>
                    </td>
                    <td>
                        <?php if (isset($error['password'])) showErrorIcon() ?>
                    </td>
                </tr>
                <tr>
                    <td><label for="confirm">Confirm Password :</label></td>
                    <td>
                        <?php htmlInputPassword('confirm', $confirm, 15) ?>
                    </td>
                    <td>
                        <?php if (isset($error['confirm'])) showErrorIcon() ?>
                    </td>
                </tr>
                <tr>
                    <td><label for="name">Student Name :</label></td>
                    <td>
                        <?php htmlInputText('name', $name, 30) ?>
                    </td>
                    <td>
                        <?php if (isset($error['name'])) showErrorIcon() ?>
                    </td>
                </tr>
                <tr>
                    <td>Gender :</td>
                    <td>
                        <?php htmlRadioList("gender", getGenders(), $gender) ?>
                    </td>
                    <td>
                        <?php if (isset($error['gender'])) showErrorIcon() ?>
                    </td>
                </tr>
                <tr>
                    <td><label for="state">State :</label></td>
                    <td>
                        <?php htmlSelect('state', getStates(), $state) ?>
                    </td>
                    <td>
                        <?php if (isset($error['state'])) showErrorIcon() ?>
                    </td>
                </tr>
                <tr>
                    <td><label for="email">Email Address :</label></td>
                    <td>
                        <?php htmlInputText('email', $email, 30) ?>
                    </td>
                    <td>
                        <?php if (isset($error['email'])) showErrorIcon() ?>
                    </td>
                </tr>
            </table>
            <input type="submit" name="submit" value="Submit" />
            <!-- JavaScript to reload the page. -->
            <input type="button" value="Reset"
                   onclick="location='<?php echo $_SERVER["PHP_SELF"] ?>'"/>
        </form>
        
    </body>
    <script type="text/javascript">
    </script>
</html>
