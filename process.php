<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="index.css">
    <script type="text/javascript" src="jquery.js" ></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body class="m-5">
<h1>Dashboard</h1>
    <a href="index.php"><button class="btn btn-primary">User Submit</button></a>

    <table class="table">
    <thead>
        <tr>
            <th>id</th>
            <th>registration_id</th>
            <th>name</th>
            <th>pdf</th>

        </tr>
    </thead>
    <tbody id="table-data">
    <?php 

include "config.php";

if (isset($_POST["submit"])) {
    $registration_id = $_POST["registration_id"];
    $name = $_POST["name"];

    $sql = "SELECT * FROM pdf WHERE registration_id = '$registration_id' AND name = '$name'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo'<tr>
            <td scope="row">'.$row['id'].'</td>
            <td>'.$row['registration_id'].'</td>
            <td>'.$row['name'].'</td>
            <td>
            <iframe class="profile_img" src="'.$row['pdf'].'"></iframe>
            </td>
            <td> '
            ?>
           
            <a href="<?php echo $row['pdf']; ?>" download="<?php echo $row['pdf']; ?>">
            <button style="margin-top:2px;" class="btn btn-primary">Download</button>
          </a>    <?php  '     </tr>';
          // Output other columns as needed
        }
      } else {
        echo "0 results";
      }
}
        // if($products)
        // {
        // foreach ($products as $key => $data) {
            
            
        ?>
    </tbody>
</table>

</html>
 