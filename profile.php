<?php require_once "config.php"; ?>
<?php require_once "Partial_header.php"; ?>
<?php
if(!isset($_SESSION['job_id'])) {
    header("Location: login.php");
    die();
}
?>

<h1>Profile of <?=$_SESSION['username'];?></h1>


<div class ="container">
    <div class="float-right">
<form method="post" action="logo_add.php" enctype="multipart/form-data">
    <input type="file" name="logo">
    <input type="submit" value="Add Logo">
</form>

<form method ="post" action="phone_add.php">
    <textarea name="phone"> </textarea>
    <input type="submit" value="Add Phone">
</form>
        <h2>Add a new job: </h2>
        <form method="post" action="job_add.php">
            <p> Name: </p>
            <textarea name="job"></textarea> <br><br>
            <p> Description:</p>
            <textarea name="description"></textarea> <br> <br>
            <p> Category:</p>
            <textarea name="category"></textarea>
            <input type="submit" value="Add">
        </form>
    </div>

</div>
    <?php
    $result = $conn->query("SELECT * FROM users, jobs WHERE users_ID={$_SESSION['job_id']}");
    $row = $result->fetch(PDO::FETCH_ASSOC);

    echo "<div>
         Contact us: {$row['phone']}
         </div>"

    ?>

<?php

echo "<div>
         <img src ='images/{$_SESSION['job_id']}/{$row['logo']}' alt='' width = '200px'/>  <br>
     </div>"

?>

<h2>Jobs</h2>

<?php

$stat = $conn->query("SELECT * FROM jobs WHERE users_ID={$_SESSION['job_id']}");

while($ro = $stat->fetch(PDO::FETCH_ASSOC)) {
    echo "<div>
            <p>{$ro['Description']}</p>
            <form method='post' action='delete.php'>
                <input type='text' name='id' value='{$ro['users_ID']}' hidden>
                <input type='submit' value='Delete'>
            </form>
          </div>";
}

?>

<?php require_once "partial_footer.php"; ?>