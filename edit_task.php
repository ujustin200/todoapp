<?php include "header.php" ?>

<center>
    <h4 class="mt-5">Edit task</h4>
    <form method="post" class="col-lg-4">
        <div class="mt-5">
            <label for="task-name" class="float-start">Task name</label>
            <input type="text" class="form-control" value="<?php echo $_GET["tname"] ?>" name="t_name">
        </div>
        <div class="mt-3">
            <label for="" class="float-start">Date to be finished</label>
            <input type="date" value="<?php echo  $_GET["dfinished"] ?>" class="form-control" min="<?php echo date('Y-m-d') ?>" name="d_finish">
        </div>
        <div class="mt-3">
            <label for="" class="float-start">Time to be finished</label>
            <input type="text" class="form-control" value="<?php echo $_GET["tfinished"] ?>" name="t_finish">
        </div>
        <button class="btn btn-success mt-3" name="upd">Edit now</button>

    </form>
</center>

<?php
if (isset($_POST["upd"])) {
    $t_name = $_POST["t_name"];
    $dfinish = $_POST["d_finish"];
    $tfinish = $_POST["t_finish"];
    $dcreated = date("d-m-Y");
    $id = $_GET["tid"];


    if (empty($t_name) || empty($dfinish) || empty($tfinish)) {
?>
        <center>
            <div class="alert alert-info text-white bg-dark col-lg-6 mt-4">
                <h6>Task failed to be added. Make sure you filled all fields</h6>
            </div>
        </center>
        <?php
    } else {
        $q = mysqli_query($connect, "UPDATE  tasks set t_name='$t_name',date_finished='$dfinish',time_finished='$tfinish' where t_id='$id'");
        if ($q === TRUE) {
        ?>
            <div class="alert alert-info text-white bg-dark col-lg-6">
                <h6>Task updated success</h6> <span><a href="manage_task.php">Back to tasks</a></span>
            </div>
<?php
        }
    }
}

?>