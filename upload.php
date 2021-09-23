<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=8" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <title>Upload Image</title>
    </head>
    <body>
        <h1>Upload Image</h1>
        <?php
        if (isset($_FILES['file'])) {
            $file = $_FILES['file'];
            $err = '';

            if ($file['error'] > 0) {

                switch ($file['error']) {
                    case UPLOAD_ERR_NO_FILE:
                        $err = 'No file was selected.';
                        break;
                    case UPLOAD_ERR_FORM_SIZE:
                        $err = 'File uploaded is too large. Maximum 1MB allowed.';
                        break;
                    default:
                        $err = 'There was an error while uploading the file.';
                        break;
                }
            } else if ($file['size'] > 1048576) {

                $err = 'File uploaded is too large. Maximum 1MB allowed.';
            } else {

                $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

                if ($ext != 'jpg' &&
                        $ext != 'jpeg' &&
                        $ext != 'gif' &&
                        $ext != 'png') {
                    $err = 'Only JPG, GIF and PNG format are allowed.';
                } else {

                    $save_as = uniqid() . '.' . $ext;

                    move_uploaded_file($file['tmp_name'], 'uploads/' . $save_as);

                    printf('
                        <div class="info">
                        Image uploaded successfully.
                        It is saved as [ <a href="gallery.php?image=%s">%s</a> ].
                        </div>',
                            $save_as, $save_as);
                }
            }

            if ($err) {
                echo '<div class="error">' . $err . '</div>';
            }
        }
        ?>
        <br />
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
            <input type="file" name="file" id="file" /><br />
            <input type="submit" value="Upload" />
        </form>

        <p>
            [ <a href="gallery.php">Image Gallery</a> ]
        </p>

        <p>
            [ <a href="index.php">Index</a> ]
        </p>
    </body>
</html>
