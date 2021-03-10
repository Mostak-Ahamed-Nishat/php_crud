<?php
include 'header.php';
?>
<div id="main-content">
    <h2>All Records</h2>

    <?php

    $connection = mysqli_connect("localhost", "root", "", "crud") or die("Couldn't connect'") or die("Couldn't connect");
    $sql_query = "SELECT * FROM student join studentclass where student.sclass=studentclass.cid";
    $result = mysqli_query($connection, $sql_query) or die("Failed");

    if (mysqli_num_rows($result) > 0) {
    ?>

        <table cellpadding="7px">
            <thead>
                <th>Id</th>
                <th>Name</th>
                <th>Address</th>
                <th>Class</th>
                <th>Phone</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php
                while ($data = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $data["sid"] ?></td>
                        <td><?php echo $data["sname"] ?></td>
                        <td><?php echo $data["saddress"] ?></td>
                        <td><?php echo $data["cname"] ?></td>
                        <td><?php echo $data["sphone"] ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $data['sid'] ?>">Edit</a>
                            <a href='delete-inline.php'>Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } else {
        echo "<h2>Data Not Found</h2>";
    }
    mysqli_close($connection);
    ?>
</div>
</div>
</body>

</html>