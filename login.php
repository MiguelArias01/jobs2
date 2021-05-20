<?php
require_once "config.php";
$username = "";
$password = "";
if (isset($_SESSION['log'])) {
    $log = $_SESSION['log'];
    $username = $log['username'];
    $error = $log['error'];

    unset($_SESSION['log']);
}
?>

<?php require_once "partial_header.php"; ?>

<div class="row">
    <div class="col-md-4 offset-md-4">
        <h1>Login</h1>

        <?php
        if (!empty($error)) {
            echo "<div class='alert alert-danger' role='alert'>
            $error
        </div>";
        }
        ?>

        <form method="post" action="login_do.php">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username"
                       value="<?=$username;?>">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password"
                       value="<?=$password;?>">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Login</button>
            <a href="register.php"class="btn btn-primary" role="button">Register</a>
        </form>

    </div>
</div>

<?php require_once "partial_footer.php"; ?>