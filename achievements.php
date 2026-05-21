<?php
include 'components/db.php';
include 'components/header.php';
include 'components/navbar.php';
?>


<?php

$sql = "SELECT * FROM complaints
WHERE status='Completed'
ORDER BY id DESC";

$result = mysqli_query($conn, $sql);

?>
<div class="container">

   <h1>Province Achievements</h1>

<p>
Successfully resolved citizen complaints
and completed public service improvements.
</p>

<div class="complaint-feed">
  

<!-- code to fetch data and display it  -->
 
<?php

if(mysqli_num_rows($result) > 0){

    while($row = mysqli_fetch_assoc($result)){

?>

    <div class="complaint-card">

        <div class="card-top">

            <h2>
                <?php echo $row['complaint_id']; ?>
            </h2>

            <span class="status
            <?php echo strtolower(str_replace(' ','-',
            $row['status'])); ?>">

                <?php echo $row['status']; ?>

            </span>

        </div>

        <p>
            <strong>Problem Type:</strong>

            <?php echo $row['problem_type']; ?>
        </p>

        <p>
            <strong>Address:</strong>

            <?php echo $row['address']; ?>
        </p>

        <p>
            <strong>Description:</strong>

            <?php echo $row['description']; ?>
        </p>

        <p>
            <strong>Date:</strong>

            <?php echo $row['created_at']; ?>
        </p>

    </div>

<?php

    }

}
else{

    echo "<p>No complaints found.</p>";

}

?>

</div>

</div>

<?php include 'components/footer.php'; ?>