<?php
require_once "config.php";
require_once  "partial_header.php";

$id = $_GET['id'];

$result = $conn->query("SELECT jobs.category, jobs.title, jobs.Description, jobs.job_id , users.city, users.company, jobs.logo, jobs.phone  FROM jobs INNER JOIN users ON jobs.users_id = users.id WHERE job_id ='$id' ");


while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    echo "<div>
              <p>Contact info: {$row['phone']}</p>
               <img src ='images/{$_SESSION['job_id']}/{$row['logo']}' alt='' width = '200px'/>  <br>
              <p style='color:blue'>{$row['company']}</p>
              <p> {$row['title']}</p>
              <p>{$row['description']}</p>
              <p> This job will be based in {$row['city']}</p>
              
          
             
          </div>";
}



require_once "partial_footer.php";
?>