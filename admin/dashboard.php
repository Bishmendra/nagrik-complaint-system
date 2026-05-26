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


// Total Complaints
$total_query = mysqli_query($conn,
"SELECT COUNT(*) as total FROM complaints");

$total = mysqli_fetch_assoc($total_query)['total'];


// Pending Complaints
$pending_query = mysqli_query($conn,
"SELECT COUNT(*) as pending
FROM complaints
WHERE status='Pending'");

$pending = mysqli_fetch_assoc($pending_query)['pending'];


// In Progress Complaints
$progress_query = mysqli_query($conn,
"SELECT COUNT(*) as progress
FROM complaints
WHERE status='In Progress'");

$progress = mysqli_fetch_assoc($progress_query)['progress'];


// Completed Complaints
$completed_query = mysqli_query($conn,
"SELECT COUNT(*) as completed
FROM complaints
WHERE status='Completed'");

$completed = mysqli_fetch_assoc($completed_query)['completed'];



// Fetch all complaints
$sql = "SELECT * FROM complaints ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>
<div class="stats-container">

    <div class="card total  ">
        <h2><?php echo $total; ?></h2>
        <p>Total Complaints</p>
    </div>

    <div class="card pending">
        <h2><?php echo $pending; ?></h2>
        <p>Pending</p>
    </div>

    <div class="card progress ">
        <h2><?php echo $progress; ?></h2>
        <p>In Progress</p>
    </div>

    <div class="card completed">
        <h2><?php echo $completed; ?></h2>
        <p>Completed</p>
    </div><br/>

</div>

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
            <th>Address</th>
            <th>Name</th>
            <th>Problem Type</th>
             <th>Contact</th>
             <th>Image</th>
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
                <?php echo $row['address']; ?>
            </td>

            <td>
                <?php echo $row['fullname']; ?>
            </td>

            <td>
                <?php echo $row['problem_type']; ?>
            </td>
            <td><?php echo $row['contact']; ?></td>
            <td>

<?php
if(!empty($row['image'])){
?>

<img
    src="../<?php echo $row['image']; ?>"
    width="100"
    height="80"
    style="object-fit:cover;border-radius:5px;"
>

<?php
}else{
    echo "No Image";
}
?>

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