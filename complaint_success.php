<?php
include 'components/header.php';
include 'components/navbar.php';

if(isset($_GET['id'])){
    $complaint_id = $_GET['id'];
}
else{
    header("Location:index.php");
    exit();
}
?>

<div class="container">

    <div class="success-box">

        <h1>Complaint Submitted Successfully</h1>

        <p>Your Complaint ID is:</p>

        <h2><?php echo $complaint_id; ?></h2>

        <p>
            Please save this Complaint ID
            to track your complaint status later.
        </p>

        <br>

        <a href="search.php" class="btn">
            Track Complaint
        </a>

        <a href="make_complaint.php" class="btn secondary-btn">
            Make Another Complaint
        </a>

    </div>

</div>

<?php include 'components/footer.php'; ?>