<?php
$upload_dir = "images/";
$upload_file = $upload_dir . basename($_FILES["newimage"]["name"]);
$ok = true;
$max_size = 500000; // 500kb
$extension = strtolower(pathinfo($upload_file,PATHINFO_EXTENSION));
$message = "";

// Is it an image file?
if(isset($_POST["submit"])) {
    $imageData = getimagesize($_FILES["newimage"]["tmp_name"]);
    if($imageData !== false) {
        $message = "File ". basename( $_FILES["newimage"]["name"]) .
            ", type: " . $imageData["mime"];
        $ok = true;
    } else {
        $message .= "ERROR: File is not an image<br>";
        $ok = false;
    }
}

if (file_exists($upload_file)) {
    $message .= "ERROR: File already exists<br>";
    $ok = false;
}

if ($_FILES["newimage"]["size"] > $max_size) {
    $message .= "Error: file is too large ({$_FILES["newimage"]["size"]}) 500kb limit<br>";
    $ok = false;
}

if($extension != "jpg" && $extension != "png" && $extension != "jpeg"
    && $extension != "gif" ) {
    $message .= "ERROR: only JPG, JPEG, PNG & GIF images supported<br>";
    $ok = false;
}


if (!$ok) {
    echo $message;
} else {
    if (move_uploaded_file($_FILES["newimage"]["tmp_name"], $upload_file)) {
        echo $message . ", has been uploaded<br>";
    } else {
        echo $message . ", could not be uploaded<br>";
    }
}
?>
<div>
    <a href="dashboard.php">Dashboard</a>
</div>