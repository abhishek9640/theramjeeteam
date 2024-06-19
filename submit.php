<?php
include "config.php";

if (isset($_POST["submit"])) {
    $registration_id = $_POST["registration_id"];
    $name = $_POST["name"];
    $file = $_FILES["pdf"];

    $filename = $file['name'];
    $filepath = $file['tmp_name'];
    $fileerror = $file['error'];

    // Check if a file was uploaded successfully
    if ($fileerror === UPLOAD_ERR_OK) {
        $uploadDir = 'upload/';
        $destFile = $filename;

        // Move the uploaded file to the destination directory
        if (move_uploaded_file($filepath, $destFile)) {
            // Insert data into the database
            $sql = "INSERT INTO pdf (registration_id, name, pdf) VALUES ('$registration_id', '$name', '$destFile')";
            if (mysqli_query($conn, $sql)) {
                echo "File uploaded and data inserted successfully.";
                echo "<a class='go-back-btn' href='admin.php'>Go Back Admin Page</a>";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "Error uploading the file.";
        }
    } else {
        echo "Error uploading the file: " . $fileerror;
    }
}
?>
<style>
    .go-back-btn {
  display: inline-block;
  padding: 10px 20px;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  text-decoration: none;
  transition: background-color 0.3s, color 0.3s;
}

.go-back-btn:hover {
  background-color: #0056b3;
}

.go-back-btn:focus {
  outline: none;
}
</style>