<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link type="text/css" href="css/style.css" rel="stylesheet"/>
        <title>P3Q2</title>
    </head>
    <body style="font-size: 1.2em">
        <h1>Join TARUC'S interest clubs</h1>
        <form action ="clubs-result.php" method = "post">
            <table cellspacing = "0" cellpadding = "5">
                <tr>
                    <td>Gender :</td>
                    <td>
                        <input type="radio"  name="gender" id="M" value="M"/>
                        <label for="M">Male</label>
                        <input type="radio"  name="gender" id="F" value="F"/>
                        <label for="F">Female</label>
                    </td>
                </tr>

                <!-- Name -->
                <tr>
                    <td><label for="name">Name :</label></td>
                    <td>
                        <input type="text" name="name" id="name" maxlength="300"/>
                    </td>
                </tr>


                <tr>
                    <td><label for="phone">Mobile Phone :</label></td>
                    <td>
                        <input type="text" name="phone" id="phone" maxlength="11"/>
                    </td>
                </tr>

                <!-- Interest Club -->
                <tr>
                    <td><label for="top">Interest Clubs :</label></td>
                    <td>
                        <small>(Select 1 to 3 clubs)</small>
                        <br/>
                        <input type="checkbox" name="clubs[]" id="LD" value="LD"/>
                        <label for="LD"> Ladies Club</label><br/>

                        <input type="checkbox" name="clubs[]" id="GT" value="GT"/>
                        <label for="GT">Gentlemen Club</label><br/>

                        <input type="checkbox" name="clubs[]" id="DT" value="DT"/>
                        <label for="DT"> Ladies Club</label><br/>

                        <input type="checkbox" name="clubs[]" id="MG" value="MG"/>
                        <label for="MG">DOTA and Gaming Club</label><br/>

                        <input type="checkbox" name="clubs[]" id="PS" value="PS"/>
                        <label for="PS">Pet Society Club</label><br/>

                        <input type="checkbox" name="clubs[]" id="FV" value="FV"/>
                        <label for="FV">Farmville Club</label><br/>
                    </td>
                </tr>
            </table>

            <input type="submit" name="submit" value="Submit"/>
            <input type="Reset" value="Reset"/>
    </body>

    <script type="text/javascript">
        document.getElementByName("gender")[0].focus();
    </script>
</html>
