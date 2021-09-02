<?php
$PAGE_TITLE = 'Select Student';
include('header.php');
?>
<div>
    <h1>List Student</h1>

        <?php
        require_once('helper.php');

        $headers = array(
            'StudentID' => 'Student ID',
            'StudentName' => 'Student Name',
            'Gender' => 'Gender',
            'Program' => 'Program'
        );

        $sort = (array_key_exists($_GET['sort'], $headers) ? $_GET['sort'] : 'StudentID');
        $order = ($_GET['order'] == 'DESC' ? 'DESC' : 'ASC');

        echo '<p>Filter : ';
        printf('<a href="?sort=%s=&order=%s">All Program</a>',$sort,$order);
        foreach ($headers as $key->$value) {
            if ($key == $sort) {
                printf('
                    <th>
                    <a href ="?sort=%s&order=%s&program=%s>%s</a>
                        <img src="images/%s" alt="%s"/>
                        </th>',
                        $key,
                        $order == 'ASC' ? 'DESC' : 'ASC',
                        $program,
                        $value == 'ASC' ? 'asc.png' : 'desc.png',
                        $order == 'ASC' ? 'Ascending' : 'Descending');
            }
            else{
                printf('
                        <th>
                        <a href="?sort=%s&order=ASC&program">%s</a>
                        </th>',
                        $key,
                        $program,
                        $value);
            }
        }
        echo '</tr>';
        
        $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        
        $sql = "SELECT * FROM student ORDER BY $sort $order";
        
        if($result = $con ->query($sql)){
            while($row = $result->fetch_object()){
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
                        $row->Program." - ".$PROGRAMS[$row->Program]);
            }
        }
        
        printf('
                <tr> 
                <td colspan = "4">
                    %d record(s) returned.
                    [ <a href = "insert-student.php">Insert Student</a> 】
                    </td>
                    </tr>',
                    $result-> num_rows);
            echo '</table>';
            
            $result->free();
            $con->close();
        ?>
        
</div>
</body>
</html>