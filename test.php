<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
    <form method="GET" action="kutas.php">
    <input name="kutas" type="text">
    <input name="omg" type="text">
    <input name="jd" type="text">
    <input name="IF" type="text">
    <input type="submit" value="test">
</form>
<script type="text/javascript">
var test=new FormData();
test.append('id',1);
test.append('name','andrzej');
console.log(test.get('name'));
</script>
    </body>
</html>