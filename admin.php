<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>

<h1 style="text-align: center;">Admin Panel</h1>
    <form action="submit.php" method="post" enctype="multipart/form-data">
  <div>
    <label for="registration_id">Registration ID:</label>
    <input type="text" id="registration_id" name="registration_id" required>
  </div>
  <div>
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>
  </div>
  <div>
    <label for="pdf">Upload PDF:</label>
    <input type="file" id="pdf" name="pdf" accept=".pdf" required>
  </div>
  <button type="submit" name="submit">Submit</button>
</form>
</body>
</html>



