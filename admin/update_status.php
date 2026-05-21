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

// check ID from URL
if(!isset($_GET['id'])){
    header("Location:dashboard.php");
    exit();
}

$id = $_GET['id'];

// fetch complaint data
$sql = "SELECT * FROM complaints WHERE id=$id";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) == 0){
    echo "<div class='container'><h2>Complaint not found</h2></div>";
    exit();
}

$row = mysqli_fetch_assoc($result);

// update status when form submitted
if(isset($_POST['update'])){

    $status = $_POST['status'];

    $update_sql = "UPDATE complaints 
                   SET status='$status' 
                   WHERE id=$id";

    if(mysqli_query($conn, $update_sql)){
        echo "<script>
            alert('Status Updated Successfully');
            window.location.href='dashboard.php';
        </script>";
        exit();
    } else {
        echo "Error updating status";
    }
}
?>

<div class="container">

    <h1>Update Complaint Status</h1>

    <div class="complaint-card">

        <p><strong>Complaint ID:</strong> <?php echo $row['complaint_id']; ?></p>
        <p><strong>Name:</strong> <?php echo $row['fullname']; ?></p>
        <p><strong>Problem Type:</strong> <?php echo $row['problem_type']; ?></p>
        <p><strong>Description:</strong> <?php echo $row['description']; ?></p>
        <p><strong>Current Status:</strong> <?php echo $row['status']; ?></p>
        <p><strong>Date:</strong> <?php echo $row['created_at']; ?></p>

    </div>

    <br>

    <form method="POST" class="status-form">

        <label>Change Status</label>

        <select name="status" required>
            <option value="Pending" 
            <?php if($row['status']=="Pending") echo "selected"; ?>>
                Pending
            </option>

            <option value="In Progress"
            <?php if($row['status']=="In Progress") echo "selected"; ?>>
                In Progress
            </option>

            <option value="Completed"
            <?php if($row['status']=="Completed") echo "selected"; ?>>
                Completed
            </option>
        </select>

        <br><br>

        <button type="submit" name="update" class="btn">
            Update Status
        </button>

    </form>

</div>

<?php include '../components/footer.php'; ?>