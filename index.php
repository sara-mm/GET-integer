<!DOCTYPE html>
<html lang="en">
<?php $title = "index";

    if(isset($_GET['submit'])){
        $Value = $_GET['Value'];

    include("connection.php");
    if (empty($_GET['Value'])) { 
        echo '*Please fill the required field!';
    }
    else {

    $query = "INSERT INTO Robot SET value = '$Value'";
    $result = mysqli_query($con,$query);

    if($result){
        header("Location:display.php");
        exit();
    }
    else{
        header("Location:index.php");
        exit();
    }
}
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <form id = "form" name = "form" action="index.php" method="GET">
        <table> <tr> <th>
        <label for="integer"> Please Enter an Integer:</label>
    </th> </tr> 
    <tr> <th>
        <input type="number" name="Value">
        <button type="submit" name="submit">Submit</button>
    </th> </tr>
        </table>
</form>
</body>
</html>