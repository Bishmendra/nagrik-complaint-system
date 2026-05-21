<?php
session_start();

// protect page
if(!isset($_SESSION['admin'])){
    header("Location:login.php");
    exit();
}

include '../components/db.php';
include '../components/header.php';
include '../components/navbar.php';

// register logic
if(isset($_POST['register'])){

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    // check empty
    if(empty($username) || empty($password) || empty($confirm_password)){

        echo "<script>alert('All fields are required');</script>";

    }

    // password match
    elseif($password != $confirm_password){

        echo "<script>alert('Passwords do not match');</script>";

    }

    else{

        // check duplicate username
        $check_sql = "SELECT * FROM admin 
                      WHERE username='$username'";

        $check_result = mysqli_query($conn, $check_sql);

        if(mysqli_num_rows($check_result) > 0){

            echo "<script>alert('Username already exists');</script>";

        }
        else{

            // insert admin
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

$insert_sql = "INSERT INTO admin(username,password)
VALUES('$username','$hashed_password')";

            if(mysqli_query($conn, $insert_sql)){

                echo "<script>
                    alert('New Admin Registered Successfully');
                    window.location.href='dashboard.php';
                </script>";

            }
            else{

                echo "<script>alert('Registration Failed');</script>";

            }
        }
    }
}
?>

<div class="container">

    <h1>Register New Admin</h1>

    <form method="POST" class="login-form">

        <label>Username</label>
        <input type="text" name="username" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <label>Confirm Password</label>
        <input type="password" name="confirm_password" required>

        <button type="submit" name="register">
            Register Admin
        </button>

    </form>

</div>

<?php include '../components/footer.php'; ?>