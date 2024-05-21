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
$imageProfil = getImageByName($conn, 'fotoprofil');
$image1 = getImageByName($conn, 'instagram');
$image2 = getImageByName($conn, 'whatsapp');
$image3 = getImageByName($conn, 'gmail');

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contact</title>
        <link rel="icon" href="real-madrid-logo.png">
        <link rel="stylesheet" href="contact.css">
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
            <h1>Contact</h1>
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
            <h2>Tentang Saya</h2>
            <p>Nama          : Savio Palendeng</p>
            <p>NIM           : 220211060043</p>
            <p>Alamat        : Tanjung Batu Lingkungan 4, Kecamatan Wanea, Kota Manado, Sulawesi Utara, Kode Pos : 95117</p>
            <p>Madridista since 2010... Neymar Jr and Luka Modric is my biggest inspiration..</p>
            <br></br>
            <h2>Hubungi Saya : </h2>
            <ul>
             <li class="contact-logos">
                    <a href="https://www.instagram.com/savi.palendeng">
                    <img src="<?php echo $image1; ?>" alt="Instagram" style="width:42px;height:42px;">
                    </a>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="https://wa.me/6285757160254">
                    <img src="<?php echo $image2; ?>" alt="Whatsapp" style="width:42px;height:42px;">
                    </a>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="mailto:saviopalendeng026@student.unsrat.ac.id">
                    <img src="<?php echo $image3; ?>" alt="Gmail" style="width:42px;height:42px;">
                    </a>
              </li>
            </ul>
        </main>
        <footer>
            <p>&copy; 2024 Savio Palendeng Website Pribadi. All Rights Reserved.</p>
        </footer>

        <script src="animasi.js"></script>
        <script src="ajax.js"></script>
    </body>
</html>