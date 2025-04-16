<?php include "header.php" ?>
<?php

$q = mysqli_query($connect, "SELECT * FROM tasks")

?>
<center>
    <h3 class="mt-5">My tasks</h3>


    <div class="col-lg-9">
        <div class="row">
            <div class="col-lg-6">
                <form action="" method="post" col-lg-5>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search .." name="searchtext">
                        <span class="input-group-text"><button class="btn btn-primary" name="search"><i class="fa fa-search"></i></button></span>
                    </div>
                </form>
            </div>
            <div class="col-lg-6">
                <div class="float-end">
                    <a href="add_task.php" class="btn btn-success" title="Add new task"><i class="fa fa-plus"></i></a>
                </div>
            </div>
        </div>




        <?php
        if (mysqli_num_rows($q) > 0) {
        ?>
            <table class="table table-striped" id="fulltable">
                <thead>
                    <tr>
                        <th>Task</th>
                        <th>date created</th>
                        <th>date to be done</th>
                        <th>Time to be done</th>
                        <th colspan="3">Options</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($data = mysqli_fetch_array($q)) {
                    ?>
                        <tr>
                            <form action="" method="post">
                                <td>
                                    <?php echo $data["t_name"] ?>
                                    <input type="text" value="<?php echo $data["t_id"] ?>" name="taskid" hidden>
                                </td>
                                <td><?php echo $data["date_created"] ?></td>
                                <td><?php echo $data["date_finished"] ?></td>
                                <td><?php echo $data["time_finished"] ?></td>
                                <td>
                                    <a href="edit_task.php?tname=<?php echo $data["t_name"] ?>&dcreated=<?php echo $data["date_created"] ?>&dfinished=<?php echo $data["date_finished"] ?>&tfinished=<?php echo $data["time_finished"] ?> &tid=<?php echo $data["t_id"] ?>" class="btn btn-secondary" title="edit"><i class="fa fa-edit"></i></a>
                                    <button class="btn btn-danger" title="Delete" name="del"><i class="fa fa-trash"></i></button>
                                    <?php
                                    if ($data["Status"] == 0) {
                                    ?>
                                        <button class="btn btn-success" title="Done" name="done"><i class="fa fa-check"></i></button>
                                    <?php
                                    }
                                    ?>
                                </td>
                            </form>
                        </tr>
                    <?php
                    }
                    ?>

                </tbody>
            </table>





        <?php
        } else {
        ?>
            <p class="mt-5">No tasks found</p>
        <?php
        }

        if (isset($_POST["search"])) {
            $text = $_POST["searchtext"];
            $q = mysqli_query($connect, "SELECT * from tasks where t_name like '%$text%' ");
        ?>

            <script>
                document.getElementById("fulltable").style.display = "none";
            </script>

            <?php
            if (mysqli_num_rows($q) > 0) {
            ?>
                <table class="table table-striped" id="fulltable">
                    <thead>
                        <tr>
                            <th>Task</th>
                            <th>date created</th>
                            <th>date to be done</th>
                            <th>Time to be done</th>
                            <th colspan="3">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($data = mysqli_fetch_array($q)) {
                        ?>
                            <tr>
                                <form action="" method="post">
                                    <td>
                                        <?php echo $data["t_name"] ?>
                                        <input type="text" value="<?php echo $data["t_id"] ?>" name="taskid" hidden>
                                    </td>
                                    <td><?php echo $data["date_created"] ?></td>
                                    <td><?php echo $data["date_finished"] ?></td>
                                    <td><?php echo $data["time_finished"] ?></td>
                                    <td>
                                        <a href="edit_task.php?tname=<?php echo $data["t_name"] ?>&dcreated=<?php echo $data["date_created"] ?>&dfinished=<?php echo $data["date_finished"] ?>&tfinished=<?php echo $data["time_finished"] ?> &tid=<?php echo $data["t_id"] ?>" class="btn btn-secondary" title="edit"><i class="fa fa-edit"></i></a>
                                        <button class="btn btn-danger" title="Delete" name="del"><i class="fa fa-trash"></i></button>
                                        <?php
                                        if ($data["Status"] == 0) {
                                        ?>
                                            <button class="btn btn-success" title="Done" name="done"><i class="fa fa-check"></i></button>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                </form>
                            </tr>
                        <?php
                        }
                        ?>

                    </tbody>
                </table>





            <?php
            } else {
            ?>
                <p class="mt-5">No tasks found</p>
        <?php
            }
        }
        ?>
    </div>
</center>

<?php
if (isset($_POST["del"])) {
    $id = $_POST["taskid"];
    $q = mysqli_query($connect, "DELETE FROM tasks where t_id='$id' ");
    if ($q === true) {
?>
        <div class="alert alert-success bg-danger">
            <p>Task deleted now <i class="fa fa-sad"></i></p>
        </div>
    <?php
    }
}





if (isset($_POST["done"])) {
    $id = $_POST["taskid"];
    $q = mysqli_query($connect, "UPDATE tasks set `status`=1 where t_id='$id'");
    if ($q === true) {
    ?>
        <center>
            <div class="alert alert-success bg-danger col-lg-5">

                <p class="text-white">Task marked as done <i class="fa fa-sad"></i></p>


            </div>
        </center>
<?php
    }
}
?>