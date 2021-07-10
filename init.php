<?php
require_once('config/connect.php');
?>

<!-- Add Tasks -->
<?php
if(isset($_POST['addBtn'])){

    if(empty($_POST['task'])){

        echo 'Please fill the task first';
    }else{

        $userTask= trim($_POST['task']);

        $SQL= 'INSERT INTO todo_tasks (task_todo) VALUES(?)';

        $Res= $Con->prepare($SQL);
        $Res->bindParam(1, $userTask);

        if($Res->execute()){
            header('location:index.php');
        }else{
            echo '_Sorry, Task not added_';
        }

    }
}
?>
<!-- Delete task -->
<?php
if(isset($_GET['del'])){
    $userId1= base64_decode($_GET['del']);
    
    $sql_delete= $Con->prepare('DELETE FROM todo_tasks WHERE id=?');

    $sql_delete->bindParam(1, $userId1);

    if($sql_delete->execute()){
     
       header('location:index.php');
    }else{
        echo 'Deletion failed';
    }
}

?>