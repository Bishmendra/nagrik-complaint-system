<?php
include 'components/db.php';
include 'components/header.php';
include 'components/navbar.php';
?>

<div class="container">

    <h1>Search Complaint</h1>
    <form method="GET" class="search-form">

    <input
        type="text"
        name="complaint_id"

        placeholder="Enter Complaint ID"
        required
    >

    <button type="submit">
        Search
    </button>

</form>
<?php

if(isset($_GET['complaint_id'])){

    $complaint_id =
    $_GET['complaint_id'];

    $sql = "SELECT * FROM complaints
    WHERE complaint_id='$complaint_id'";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){

        $row = mysqli_fetch_assoc($result);

?>
        <div class="search-result">

            <h2>
                Complaint Found
            </h2>

            <p>
                <strong>Complaint ID:</strong>

                <?php echo $row['complaint_id']; ?>
            </p>

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
                <strong>Status:</strong>

                <span class="status
                <?php echo strtolower(str_replace(' ','-',
                $row['status'])); ?>">

                    <?php echo $row['status']; ?>

                </span>
            </p>

            <p>
                <strong>Date:</strong>

                <?php echo $row['created_at']; ?>
            </p>

        </div>

        <?php

    }
    else{

        echo "
        <div class='not-found'>
            Complaint Not Found
        </div>
        ";

    }

}

?>

</div>

<?php include 'components/footer.php'; ?>
