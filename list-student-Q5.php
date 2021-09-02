<?php
$PAGE_TITLE = 'Select Student';
include('header.php');
?>

<div>
    <h1>List Student</h1>

    <?php
    require_once('helper.php');
    
    $headers = array(
        'StudentID'   => 'Student ID',
        'StudentName' => 'Student Name',
        'Gender'      => 'Gender',
        'Program'     => 'Program'
    );

    $sort  = (array_key_exists($_GET['sort'], $headers) ? $_GET['sort'] : 'StudentID');
    $order = ($_GET['order'] == 'DESC' ? 'DESC' : 'ASC');

    echo '<table border="1" cellpadding="5" cellspacing="0">';
    echo '<tr>';
    foreach ($headers as $key => $value)
    {
        if ($key == $sort) // The sorted field.
        {
            printf('
                <th>
                <a href="?sort=%s&order=%s">%s</a>
                <img src="images/%s" alt="%s" />
                </th>',
                $key,
                $order == 'ASC' ? 'DESC' : 'ASC',
                $value,
                $order == 'ASC' ? 'asc.png' : 'desc.png',      
                $order == 'ASC' ? 'Ascending' : 'Descending'); 
        }
        else 
        {
            printf('
                <th>
                <a href="?sort=%s&order=ASC">%s</a>
                </th>',
                $key,
                $value);
        }
    }
    echo '</tr>';

    $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    $sql = "SELECT * FROM Student ORDER BY $sort $order";

    if ($result = $con->query($sql))
    {
        while ($row = $result->fetch_object())
        {
            printf('
                <tr>
                <td>%s</td>
                <td>%s</td>
                <td>%s</td>
                <td>%s</td>
                </tr>',
                $row->StudentID,
                $row->StudentName,
                $GENDERS[$row->Gender],
                $row->Program . ' - ' .$PROGRAMS[$row->Program]);
        }
    }

    printf('
        <tr>
        <td colspan="4">
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
include('footer.php');
?>
