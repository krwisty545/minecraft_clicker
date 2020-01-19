<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
    <?php
        if(isset($_POST['text'])){
            $text=password_hash($_POST['text'], PASSWORD_DEFAULT);
            echo $text;
        }
    ?>
    <form method="post">
        <input type="text" name="text"/>
        <input type="submit"/>
    <form>
    </body>
</html>