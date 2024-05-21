<?php
$conn = new mysqli("localhost", "root", "", "pers_web");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function getImageByName($conn, $imageName) {
    $sql = "SELECT image FROM images WHERE image_name=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $imageName);
    $stmt->execute();
    $stmt->bind_result($imageData);
    $stmt->fetch();
    $stmt->close();

    return 'data:image/jpeg;base64,' . base64_encode($imageData);
}

$imageBackground = getImageByName($conn, 'tosca-background');
$image1 = getImageByName($conn, 'real-madrid-black');

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Savio Palendeng</title>
  <link rel="icon" href="real-madrid-logo.png">
  <link rel="stylesheet" href="index.css">
  <style>
    body {
      font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
      background-image: url('<?php echo $imageBackground; ?>');
      margin: 0;
      padding: 0;
    }
  </style>
</head>

<body>
  <header class="tosca-background">
    <h1>Home</h1>
    <nav>
      <ul id="navList">
        <li><a href="index.php">Home</a></li>
        <li><a href="gallery.php">Gallery</a></li>
        <li><a href="blog.php">Blog</a></li>
        <li><a href="contact.php">Contact</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <br></br>
    <img class="fade-in-out" src="<?php echo $image1; ?>" alt="Real Madrid Black">
    <h2 class="fade-in-out">SELAMAT DATANG</h2>
    <p class="fade-in-out2">¡HASTA EL FINAL!... VAMOS REAL!!!</p>
    <p class="fade-in-out2">Football is a part of my life</p>
  </main>

  <footer>
    <p>&copy; 2024 Savio Palendeng Website Pribadi. All Rights Reserved.</p>
  </footer>

  <script src="animasi.js"></script>
  <script src="ajax.js"></script>
</body>
</html>