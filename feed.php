<?php require_once "config.php"; ?>
<?php require_once "partial_header.php"; ?>

<?php
$title = trim($_POST["category"]);
$City = trim($_POST["City"]);
$statement = "";

if(!empty($category) && !empty($City)){
    $statement ="SELECT jobs.category, jobs.title, users.company, users.City, job_id  FROM jobs INNER JOIN users ON jobs.users_id = users.id WHERE category='$category' and City = '$City' ";
} elseif (!empty($category) && empty($City)) {
    $statement ="SELECT jobs.category, jobs.title, users.company, users.City, job_id  FROM jobs INNER JOIN users ON jobs.users_id = users.id WHERE  category='$category' ";

} elseif (empty($category) && !empty($City)) {
    $statement ="SELECT jobs.category, jobs.title, users.company, users.City, job_id  FROM jobs INNER JOIN users ON jobs.users_id = users.id WHERE City = '$City' ";

}
elseif (empty($category) && empty($City)) {
    $statement ="SELECT jobs.category, jobs.title, users.company, users.City, job_id  FROM jobs INNER JOIN users ON jobs.users_id = users.id ";
}
unset($_POST["category"]);
unset($_POST["City"]);

$result = $conn->query("$statement");
?>

    <h1>Feed</h1>

    <div class="float-right">
        <h3>Search By: </h3>

        <form method ="post" action="feed.php">
            <p>Category: </p>
            <textarea name="category" ></textarea>
            <p>City:</p>
            <textarea name="City"></textarea>
            <input type="submit" value="Search">
        </form>
    </div>

    <h2>Jobs: </h2>

<?php

while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    echo "<div>
              <p style='color:blue'>{$row['company']}</p>
              <p> <a href='display_job.php?id={$row['job_id']}'>{$row['title']}</a></p>
          
             
          </div>";
}



?>

<?php require_once "partial_footer.php"; ?>