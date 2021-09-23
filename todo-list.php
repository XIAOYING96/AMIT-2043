<?php
if (isset($_COOKIE["tasks"])) {
    $tasks = explode('|', $_COOKIE['tasks']);

    echo "<pre>";
    print_r($tasks);
    echo "</pre>";
}

if (isset($_POST['task_to_add'])) {
    $task = trim($_POST['task_to_add']);

    if ($task != null) {
        $tasks[] = htmlspecialchars($task);

        setcookie('tasks', implode('|', $tasks), time() + 60 * 60 * 24 * 365);
    }
}

else if (isset($_POST['task_to_delete'])) {
    $key = $_POST['task_to_delete']; 

    unset($tasks[$key]); 

    $tasks = array_values($tasks);

    setcookie('tasks', implode('|', $tasks), time() + 60 * 60 * 24 * 365);
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=8" />
        <title>My To-do List</title>
        <link type="text/css" href="css/style.css" rel="stylesheet" />
    </head>
    <body>
        <h1>My To-do List</h1>

<?php
if (empty($tasks)) {
    echo '<p>You do not have any pending task.</p>';
} else {
    printf('<p>You have %d pending task(s):</p>', count($tasks));
    echo '<table>';
    foreach ($tasks as $key => $value) {
        printf('
                <tr>
                    <td>
                        <form action="" method="post" style="display:inline">
                            <input type="hidden" name="task_to_delete" value="%d" />
                            <input type="submit" name="delete" value="X" />
                        </form>
                    </td>
                    <td>%d.</td>
                    <td>%s</td>
                    </tr>',
                $key, $key + 1, $value);
    }
    echo '</table>';
}
?>
        <br />
        <form action="" method="post">
            <input type="text" name="task_to_add" id="task_to_add"
                   size="40" maxlength="50" />
            <input type="submit" name="add" value="Add" />
        </form>
    </body>

    <script type="text/javascript">
        document.getElementById("task_to_add").focus();
    </script>
</html>