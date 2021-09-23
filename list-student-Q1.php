<?php
$PAGE_TITLE = 'Select Student';
include('includes/header.php');
?>
<div>
    <h1>List Student</h1>

    <?php
    require_once('includes/helper.php');

    $headers = array(
        'StudentID' => 'Student ID',
        'StudentName' => 'Student Name',
        'Gender' => 'Gender',
        'Program' => 'Program'
    );

    $sort = (array_key_exists($_GET['sort'], $headers) ? $_GET['sort'] : 'StudentID');
    $order = ($_GET['order'] == 'DESC' ? 'DESC' : 'ASC');

    $program = (array_key_exists($_GET['program'], $PROGRAMS) ? $_GET['program'] : '%');

    echo '<p>Filter : ';
    printf('<a href="?sort=%s&order=%s">All Programs</a> ', $sort, $order);
    foreach ($PROGRAMS as $key => $value) {
        printf('| <a href="?sort=%s&order=%s&program=%s">%s</a> ',
                $sort, $order, $key, $key);
    }
    echo '</p>';

    echo '<table border="1" cellpadding="5" cellspacing="0">';
    echo '<tr>';

    foreach ($headers as $key => $value) {
        if ($key == $sort) {
            printf('
                <th>
                <a href="?sort=%s&order=%s&program=%s">%s</a>
                <img src="images/%s" alt="%s" />
                </th>',
                    $key,
                    $order == 'ASC' ? 'DESC' : 'ASC',
                    $program,  .
                    $value,
                    $order == 'ASC' ? 'asc.png' : 'desc.png',
                    $order == 'ASC' ? 'Ascending' : 'Descending');
        } else {
            printf('
                <th>
                <a href="?sort=%s&order=ASC&program=%s">%s</a>
                </th>',
                    $key,
                    $program,
                    $value);
        }
    }

    echo '<th>&nbsp;</th>';
    echo '</tr>';

    $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    $sql = "SELECT * FROM Student WHERE Program LIKE '$program' "
            . "ORDER BY $sort $order";

    if ($result = $con->query($sql)) {
        while ($row = $result->fetch_object()) {
            printf('
                <tr>
                <td>%s</td>
                <td>%s</td>
                <td>%s</td>
                <td>%s</td>
                <td>
                    <a href="edit-student.php?id=%s">Edit</a> |
                    <a href="delete-student.php?id=%s">Delete</a>
                </td>
                </tr>',
                    $row->StudentID,
                    $row->StudentName,
                    $GENDERS[$row->Gender],
                    $row->Program . ' - ' . $PROGRAMS[$row->Program],
                    $row->StudentID,
                    $row->StudentID
            );
        }
    }

    printf('
        <tr>
        <td colspan="5">
            %d record(s) returned.
            [ <a href="insert-student.php">Insert Student</a> ]
        </td>
        </tr>',
            $result->num_rows);

    echo '</table>';

    $result->free();
    $con->close();
    ?>
</div>

    <?php
    include('includes/footer.php');
    ?>
