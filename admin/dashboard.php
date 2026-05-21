<?php
session_start();

// Protect dashboard (only logged-in admin can access)
if(!isset($_SESSION['admin'])){
    header("Location:login.php");
    exit();
}

include '../components/db.php';
include '../components/header.php';
include '../components/navbar.php';

// Fetch all complaints
$sql = "SELECT * FROM complaints ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>

<div class="container">

    <div class="dashboard-top">

       <div>

    <a href="register_admin.php" class="btn">
        Register Admin
    </a>

    <a href="logout.php" class="btn secondary-btn">
        Logout
    </a>

</div>

    </div>

    <table class="dashboard-table">

        <tr>
            <th>ID</th>
            <th>Complaint ID</th>
            <th>Name</th>
            <th>Problem Type</th>
            <th>Status</th>
            <th>Date</th>
            <th>Action</th>
        </tr>

        <?php
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
        ?>

        <tr>

            <td>
                <?php echo $row['id']; ?>
            </td>

            <td>
                <?php echo $row['complaint_id']; ?>
            </td>

            <td>
                <?php echo $row['fullname']; ?>
            </td>

            <td>
                <?php echo $row['problem_type']; ?>
            </td>

            <td>
                <span class="status
                <?php echo strtolower(str_replace(' ','-',$row['status'])); ?>">
                    <?php echo $row['status']; ?>
                </span>
            </td>

            <td>
                <?php echo $row['created_at']; ?>
            </td>

            <td>
                <a href="update_status.php?id=<?php echo $row['id']; ?>"
                   class="update-btn">
                    Update Status
                </a>
            </td>

        </tr>

        <?php
            }
        } else {
        ?>

        <tr>
            <td colspan="7">No complaints found</td>
        </tr>

        <?php } ?>

    </table>

</div>

<?php include '../components/footer.php'; ?>