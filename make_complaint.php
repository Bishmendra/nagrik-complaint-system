<?php

include 'components/db.php';

if(isset($_POST['submit'])){

    $fullname = $_POST['fullname'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $problem_type = $_POST['problem_type'];
    $description = $_POST['description'];
    $image_name = $_FILES['image']['name'];

$tmp_name = $_FILES['image']['tmp_name'];

$image_path = "";
if(!empty($image_name)){

    $image_path = "uploads/" . time() . "_" . $image_name;

    move_uploaded_file($tmp_name, $image_path);

}

    // UNIQUE COMPLAINT ID
    $complaint_id =
    "NC-" . date("Y") . "-" . rand(1000,9999);

    // INSERT QUERY
    $sql = "INSERT INTO complaints
    (complaint_id, fullname, contact, address,
    problem_type, description,image)

    VALUES

    ('$complaint_id', '$fullname', '$contact',
    '$address', '$problem_type', '$description','$image_path')";

    $result = mysqli_query($conn, $sql);

    // SUCCESS MESSAGE
    if($result){

    echo "
    <script>
        alert('Complaint Submitted Successfully');

        window.location.href=
        'complaint_success.php?id=$complaint_id';
    </script>
    ";

}
    else{
        echo "Error";
    }

}

?>

<?php
include 'components/header.php';
include 'components/navbar.php';
?>

<div class="container">

    <h1>Make a Complaint</h1>

    <form action="" method="POST" class="complaint-form" enctype="multipart/form-data">

        <label>Full Name</label>
        <input type="text" name="fullname" required>

        <label>Contact Number</label>
        <input type="text" name="contact" required>

        <label>Full Address</label>
        <textarea name="address" required></textarea>

        <label>Problem Type</label>

        <select name="problem_type" required>
            <option value="">Select Problem Type</option>
            <option>Transport</option>
            <option>Electricity</option>
            <option>Water</option>
            <option>Others</option>
        </select>

        <label>Complaint Description</label>
        <textarea name="description" required></textarea>
        <label>Upload Complaint Image</label>

<input
    type="file"
    name="image"
    accept="image/*"
>

        <button type="submit" name="submit">
            Submit Complaint
        </button>

    </form>

</div>

<?php include 'components/footer.php'; ?>