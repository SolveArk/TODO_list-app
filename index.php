<!-- SH INT ID: SH-IT-43139 -->
<?php
    require_once('config/connect.php')
?>

<?php
    include('init.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="assets/css/main_style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODOs</title>
</head>

<body>

<div class="head">
    <h1><small>Things</small> TODO <small>Today</small></h1>
</div>

<?php
$sn= 0;
$sql_1= 'SELECT * FROM todo_tasks';
$sqlRes= $Con->query($sql_1);

foreach($sqlRes as $res1){
    $sn++
?>

    <div class="single_task">
           <div>
               <small></small>
               <?php echo '<small>'.$sn.'.</small> '. $res1['task_todo']?>

            </div>

            <div class= "actions">
                <a href="update.php?view=<?php echo base64_encode($res1['id'])?>"><img src= "assets/images/edit.png" alt="Edit"></a>
                <a href="init.php?del=<?php echo base64_encode($res1['id'])?>"><img src= "assets/images/del.png" alt="Del"></a>
            </div>
    </div>

<?php
}?>

<!-- Add Task form -->
<div class= "task_form_wrap">

    <form action="index.php" method="POST">
        <div class= "taskInput">

           <input type="text" name="task" id="task" autofocus="autofocus" 
            required="required" placeholder="Enter your task here...">

            <button type= "submit" name="addBtn">ADD TO LIST</button>
        </div>
      </form>

</div>
</body>
</html>