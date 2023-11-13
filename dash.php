<?php
session_start();
include_once(__DIR__."/includes/auth.php");
include_once(__DIR__."/includes/connection.php");

$page = isset($_GET["page"]) ? $_GET["page"] : 0;
$per_page = 3;
$query = "SELECT * from `users` LIMIT $per_page OFFSET ".$per_page*$page;
$res = $conn->query($query);

?>
<table>
    <thead>
        <tr>
            <th>index</th>
            <th>name</th>
            <th>role</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $index = 0;
        while ($row = $res->fetch_assoc()){
            $index++;
        ?>
        <tr>
            <td><?php echo $index?></td>
            <td><?php echo $row["username"]?></td>
            <td><?php echo $row["role"]?></td>
        </tr>
        <?php
        }
        ?>
    </tbody>

</table>

<a href="logout.php">logout</a>
<div>
    <a href="?page=<?php echo $page-1<0 ? 0:$page-1;?>">Back</a>
    _________
    <a href="?page=<?php echo $page+1?>">Next</a>
</div>