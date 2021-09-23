<?php
$PAGE_TITLE = 'Edit Student';
include('includes/header.php');
?>

<div>
    <h1>Edit Student</h1>
    <?php
    require_once('includes/helper.php');

    $hideForm = false;

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {

        $id = strtoupper(trim($_GET['id']));

        $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $id = $con->real_escape_string($id);
        $sql = "SELECT * FROM student WHERE StudentID = '$id'";

        $result = $con->query($sql);
        if ($row = $result->fetch_object()) {
            $id = $row->StudentID;
            $name = $row->StudentName;
            $gender = $row->Gender;
            $program = $row->Program;
        } else {
            echo '
                <div class="error">
                Opps. Record not found.
                [ <a href="list-student.php">Back to list</a> ]
                </div>
                ';

            $hideForm = true;
        }

        $result->free();
        $con->close();
    } else {
        $id = strtoupper(trim($_POST['id']));
        $name = trim($_POST['name']);
        $gender = trim($_POST['gender']);
        $program = trim($_POST['program']);

        $error['name'] = validateStudentName($name);
        $error['gender'] = validateGender($gender);
        $error['program'] = validateProgram($program);
        $error = array_filter($error);

        if (empty($error)) {
            $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            $sql = '
                UPDATE Student SET
                StudentName = ?, Gender = ?, Program = ?
                WHERE StudentID = ?
            ';
            $stm = $con->prepare($sql);
            $stm->bind_param('ssss', $name, $gender, $program, $id);

            if ($stm->execute()) {
                printf('
                    <div class="info">
                    Student <strong>%s</strong> has been updated.
                    [ <a href="list-student.php">Back to list</a> ]
                    </div>',
                        $name);
            } else {
                echo '
                    <div class="error">
                    Opps. Database issue. Record not updated.
                    </div>
                    ';
            }

            $stm->close();
            $con->close();
        } else {
            // Validation failed. Display error message.
            echo '<ul class="error">';
            foreach ($error as $value) {
                echo "<li>$value</li>";
            }
            echo '</ul>';
        }
    }
    ?>
    <?php if ($hideForm == false) : ?>

        <form action="" method="post">
            <table cellpadding="5" cellspacing="0">
                <tr>
                    <td><label for="id">Student ID :</label></td>
                    <td>
                        <?php echo $id ?>
                        <?php htmlInputHidden('id', $id) ?>
                    </td>
                </tr>
                <tr>
                    <td><label for="name">Student Name :</label></td>
                    <td>
                        <?php htmlInputText('name', $name, 30) ?>
                    </td>
                </tr>
                <tr>
                    <td>Gender :</td>
                    <td>
                        <?php htmlRadioList('gender', $GENDERS, $gender) ?>
                    </td>
                </tr>
                <tr>
                    <td><label for="program">Program :</label></td>
                    <td>
                        <?php htmlSelect('program', $PROGRAMS, $program, '-- Select One --') ?>
                    </td>
                </tr>
            </table>
            <br />
            <input type="submit" name="update" value="Update" />
            <input type="button" value="Cancel" onclick="location = 'list-student.php'" />
        </form>
    <?php endif ?>
    <p>
        [ <a href="index.php">Index</a> ]
    </p>
</div>

<?php
include('includes/footer.php');
?>
