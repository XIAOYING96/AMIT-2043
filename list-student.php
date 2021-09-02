<?php
    $PAGE_TITLE = 'Select Student';
    include('header.php');
?>
    <div>
        <h1>List Student</h1>
        <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>Student ID</th>
            <th>Student Name</th>
            <th>Gender</th>
            <th>Program</th>
        </tr>
        
        <?php
            require_once('helper.php');

            $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            $sql = "SELECT * FROM student";
            if ($result = $con-> query($sql))
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
                        $row->Gender,
                        $row->Program);
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
                    
                $result->free();
                $con->close();
        ?>
        
        </table>
    </div>
       </body>
</html>