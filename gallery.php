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

$imageBackground = getImageByName($conn, 'tosca-background2');
$image1 = getImageByName($conn, 'Savio2');
$image2 = getImageByName($conn, 'NeymarJrWC2022');
$image3 = getImageByName($conn, 'Savio');
$image4 = getImageByName($conn, 'Savio3');
$image5 = getImageByName($conn, 'ModricKroos');
$image6 = getImageByName($conn, 'Savio4');
$image7 = getImageByName($conn, 'NeymarJr');
$image8 = getImageByName($conn, 'Savio5');
$image9 = getImageByName($conn, 'ModricKroos2');

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <link rel="icon" href="real-madrid-logo.png">
    <link rel="stylesheet" href="gallery.css">
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
        <h1>Gallery</h1>
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
        <div class="gallery">
            <img src="<?php echo $image1; ?>" alt="Gambar 1">
            <img src="<?php echo $image2; ?>" alt="Gambar 2">
            <img src="<?php echo $image3; ?>" alt="Gambar 3">
            <img src="<?php echo $image4; ?>" alt="Gambar 4">
            <img src="<?php echo $image5; ?>" alt="Gambar 5">
            <img src="<?php echo $image6; ?>" alt="Gambar 6">
            <img src="<?php echo $image7; ?>" alt="Gambar 6">
            <img src="<?php echo $image8; ?>" alt="Gambar 6">
            <img src="<?php echo $image9; ?>" alt="Gambar 6">
        </div>
    </main>
    <br>
    </br>
    <footer>
        <p>&copy; 2024 Savio Palendeng Website Pribadi. All Rights Reserved.</p>
    </footer>

    <script src="animasi.js"></script>
    <script src="ajax.js"></script>
</body>
</html>
