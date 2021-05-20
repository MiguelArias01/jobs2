<?php
require_once "config.php";

if(!isset($_SESSION['username'])) {
    header("Location: login.php");
    die();
}
?>

<?php require_once "partial_header.php"; ?>

    <h1>Dashboard</h1>
    <h2>Welcome <?=$_SESSION['username'];?></h2>
    <a href="logout.php">Logout</a>
    <h3>Add new image</h3>
    <form action="uploads.php" method="post" enctype="multipart/form-data">
        <input type="file" name="newimage" id="newimage">
        <input type="submit" value="Upload" name="submit">
    </form>
    <style>
        img {
            padding-right: 5px;
        }
    </style>

    <div>
        <?php
        $images = glob("images/*.*");

        foreach($images as $image) {
            echo '<img width="120" src="'.$image.'" />';
        }
        ?>
    </div>


<?php require_once "partial_footer.php"; ?>