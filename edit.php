<?php include 'header.php'; ?>

<div id="main-content">
    <h2>Update Record</h2>
    <?php
    $student_id = $_GET['id'];
    echo "Your id is:" . $student_id;
    $connection = mysqli_connect("localhost", "root", "", "crud") or die("Couldn't connect'");
    $query = "SELECT * FROM student where student.sid={$student_id} ";
    $result = mysqli_query($connection, $query) or die("Data Bring Failed");

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
    ?>
            <form class="post-form" action="updatedata.php" method="post">

                <div class="form-group">
                    <label>Name</label>
                    <input type="hidden" name="sid" value="<?php echo $row['sid'] ?>" />
                    <input type="text" name="sname" value="<?php echo $row['sname'] ?>" />
                </div>
                <div class=" form-group">
                    <label>Address</label>
                    <input type="text" name="saddress" value="<?php echo $row['saddress'] ?>" />
                </div>
                <div class="form-group">
                    <label>Class</label>
                    <?php
                    $query2 = "SELECT * FROM studentclass";
                    $data = mysqli_query($connection, $query2) or die("Couldn't connect");
                    if (mysqli_num_rows($data) > 0) {
                        echo "<select name='sclass'>";
                        while ($row3 = mysqli_fetch_assoc($data)) {
                            if ($row3['sclass'] == $row3['cid']) {
                                $select = "selected";
                            } else {
                                $select = "";
                            }
                            echo "<option value='{$row3['cid']}'>{$row3['cname']}</option>";
                        }
                        echo "</select>";
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" name="sphone" value="<?php echo $row['sphone'] ?>" />
                </div>
                <input class="submit" type="submit" value="Update" />
            </form>
    <?php
        }
    } else {
        echo "<h1>Data Fetch failed</h1>";
    }

    mysqli_close($connection);
    ?>
</div>
</div>
</body>

</html>