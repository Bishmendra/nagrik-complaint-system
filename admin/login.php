<?php
session_start();

include '../components/db.php';

// LOGIN LOGIC
if(isset($_POST['login'])){

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // get admin by username
    $sql = "SELECT * FROM admin
            WHERE username='$username'";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) == 1){

        $row = mysqli_fetch_assoc($result);

        // verify hashed password
        if(password_verify($password, $row['password'])){

            $_SESSION['admin'] = $username;

            header("Location:dashboard.php");
            exit();

        }
        else{

            echo "
            <script>
                alert('Invalid Password');
            </script>
            ";

        }

    }
    else{

        echo "
        <script>
            alert('Username not found');
        </script>
        ";

    }

}
?>

<?php
include '../components/header.php';
include '../components/navbar.php';
?>

<div class="container">

    <h1>Admin Login</h1>

    <form method="POST" class="login-form">

        <label>Username</label>

        <input
            type="text"
            name="username"
            required
        >

        <label>Password</label>

        <input
            type="password"
            name="password"
            required
        >

        <button type="submit" name="login">
            Login
        </button>

    </form>

</div>

<?php include '../components/footer.php'; ?>