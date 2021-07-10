<?php
require_once('config/connect.php');
?>


<!-- To View what needs editing -->
<?php
if(isset($_GET['view'])){
     $user_Id= base64_decode($_GET['view']);
     
     $sql_view= 'SELECT * FROM todo_tasks WHERE id=?';
     
     $view=$Con->prepare($sql_view);
     $view->bindParam(1, $user_Id);
     $view->execute();
     
     $fetchView=$view->fetch();
}

?>
<!-- A Direct Update -->
<?php
if(isset($_POST['updateBtn'])){
    
    $newTask= trim($_POST['taskUp']);
    
    $sql_update= 'UPDATE todo_tasks SET task_todo=? WHERE id=?';

    $update=$Con->prepare($sql_update);

    $update->bindParam(1, $newTask);
    $update->bindParam(2, $user_Id);
   
    if($update->execute()){
        header('location:index.php');
        
    }else{
        echo 'upload failure';

    }
}
?>

<!-- Form to data -->
<!DOCTYPE html>

<html>

<head>
    <link rel="stylesheet" type="text/css" href="assets/css/main_style.css">
    <title>|Update Task|</title>
</head>
<body>

<div class="pop_frame" id="pop_form">

  <form action="" method="post">

<div class="update_container">

    <div class="formInput">
        <input type="text" name="taskUp" value="<?php print_r ($fetchView['task_todo']);?>">
    </div>

    <div class="update_btn">
        <button type="submit" name="updateBtn">Update Task</button>
    </div>

    <div class="cancel_Btn">
        
    </div>

</div>

</form>

</div>
</body>
</html>