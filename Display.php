<!DOCTYPE html>
<html lang="en">
<?php $title = "display";

include("connection.php");

$db= $con;
$table="Robot";
$columns= ['id', 'value'];
$fetchData = fetch_data($db, $table, $columns);

function fetch_data($db, $table, $columns){
    if(empty($db)){
     $msg= "Database connection error";
    }elseif (empty($columns) || !is_array($columns)) {
     $msg="columns Name must be defined in an indexed array";
    }elseif(empty($table)){
      $msg= "Table Name is empty";
   }else{
   $columnName = implode(", ", $columns);
   $query = "SELECT ".$columnName." FROM $table"." ORDER BY id DESC";
   $result = $db->query($query);
   if($result== true){ 
    if ($result->num_rows > 0) {
       $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
       $msg= $row;
    } else {
       $msg= "No Data Found"; 
    }
   }else{
     $msg= mysqli_error($db);
   }
   }
   return $msg;
   }
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    
<div class="container">
 <div class="row">
   <div class="col-sm-8">
    <?php echo $deleteMsg??''; ?>
    <div class="table-responsive">
      <table class="table table-bordered">
       <thead><tr>
         <th>ID</th>
         <th>Value</th>
    </thead>
    <tbody>
  <?php
      if(is_array($fetchData)){      
      $sn=1;
      foreach($fetchData as $data){
    ?>
      <tr>
      <td><?php echo $data['id']??''; ?></td>
      <td><?php echo $data['value']??''; ?></td>
     </tr>
     <?php
      $sn++;}}else{ ?>
      <tr>
        <td colspan="8">
    <?php echo $fetchData; ?>
  </td>
    <tr>
    <?php
    }?>
    </tbody>
     </table>
   </div>
</div>
</div>
</div>

</body>
</html>