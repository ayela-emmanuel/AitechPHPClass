<?php
session_start();
include_once(__DIR__."/includes/auth.php");
include_once(__DIR__."/includes/connection.php");

$page = isset($_GET["page"]) ? $_GET["page"] : 0;
$per_page = 3;
$query = "SELECT * from `users` LIMIT $per_page OFFSET ".$per_page*$page;
$res = $conn->query($query);

?>

<a href="logout.php">logout</a>
<div>
    <a href="?page=<?php echo $page-1<0 ? 0:$page-1;?>">Back</a>
    _________
    <a href="?page=<?php echo $page+1?>">Next</a>
</div>
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
            $username = $row["username"];
        ?>
        <tr data-user-context="boo">
            <td><?php echo $index?></td>
            <td><?php echo $row["username"]?></td>
            <td><?php echo $row["role"]?></td>
            <td>
                <button class="Edit" onclick="clicked('<?php echo $username ?>')">Edit</button>
                <button class="Delete" >Delete</button>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>

</table>
<script src="./js/dash.js"></script>
