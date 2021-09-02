<?php
$PAGE_TITLE = 'Insert Student';
include('header.php');
?>

<div>
    <h2>Insert Student</h2>

    <?php
    require_once('helper.php');
    
    $id = '';
    $name = '';
    $gender = '';
    $program = '';

    if(!empty($_POST)){ // Something posted back.
        $id = strtoupper(trim($_POST['StudentID']));
        $name = trim($_POST['StudentName']);
        $gender = trim($_POST['Gender']);
        $program = trim($_POST['Program']);

        $error['StudentID'] = validateStudentID($id);
        $error['StudentName'] = validateStudentName($name);
        $error['Dender'] = validateGender($gender);
        $error['Program'] = validateProgram($program);
        $error = array_filter($error); // Remove null values.
        
        if (empty($error)) { // If no error.

            $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            $id = mysqli_real_escape_string($con, $_POST['StudentID']);
            $name = mysqli_real_escape_string($con, $_POST['StudentName']);
            $gender = mysqli_real_escape_string($con, $_POST['Gender']);
            $program = mysqli_real_escape_string($con, $_POST['Program']);

            $sql = " INSERT INTO Student (StudentID, StudentName, Gender, Program)"
                    . "VALUES ('$id', '$name', '$gender', '$program')";

            if (mysqli_query($con, $sql) === TRUE) {
                printf('
                    <div class="info">
                    Student <strong>%s</strong> has been inserted.
                    [ <a href="list-student.php">Back to list</a> ]
                    </div>',
                        $name);

                $id = $name = $gender = $program = null;
            } else {
                // Something goes wrong.
                echo '
                    <div class="error">
                    Opps. Database issue. Record not inserted.
                    </div>
                    ';
            }

            $con->close();

        } else { // Input error detected. Display error message.
            echo '<ul class="error">';
            foreach ($error as $value) {
                echo "<li>$value</li>";
            }
            echo '</ul>';
        }
    }
    ?>

    <form action="" method="post">
        <table cellpadding="5" cellspacing="0">
            <tr>
                <td><label for="StudentID">Student ID :</label></td>
                <td>
                    <?php
                    htmlInputText('name', $id, 10);
                    ?>
                </td>
            </tr>
            <tr>
                <td><label for="StudentName">Student Name :</label></td>
                <td>
                    <?php htmlInputText('StudentName', $name, 30) ?>
                </td>
            </tr>
            <tr>
                <td>Gender :</td>
                <td>
                    <?php htmlRadioList('Gender', $GENDERS, $gender) ?>
                </td>
            </tr>
            <tr>
                <td><label for="Program">Program :</label></td>
                <td>
                    <?php htmlSelect('Program', $PROGRAMS, $program, '-- Select One --') ?>
                </td>
            </tr>
        </table>

        <input type="submit" name="insert" value="Insert" />
        <input type="button" value="Cancel" onclick="location = 'list-student.php'" />
    </form>
</div>

