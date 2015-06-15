<?php var_dump($_GET); ?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>My First Form</title>

</head>
<body>
    <form action="/my_get_form.php" method="GET">
        <input type="checkbox" id="mailing_list" name="mailing_list" value="yes" checked>
        <label for="mailing_list">Sign me up for the mailing list!</label>

        <p>What operating systems have you used?</p>
        <label><input type="checkbox" id="os1" name="os[]" value="linux"> Linux</label>
        <label><input type="checkbox" id="os2" name="os[]" value="osx"> OS X</label>
        <label><input type="checkbox" id="os3" name="os[]" value="windows"> Windows</label>
         <button type="Send">Submit</button>

    </form>
</body>
</html>