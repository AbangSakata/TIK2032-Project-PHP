<?php
$conn = new mysqli("localhost", "root", "", "pers_web");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!$conn->set_charset("utf8")) {
    die("Error loading character set utf8: " . $conn->error);
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

function getBlogTextByName($conn, $blogName) {
    $sql = "SELECT blog_text FROM blog WHERE blog_name=?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die('prepare() failed: ' . htmlspecialchars($conn->error));
    }

    $stmt->bind_param("s", $blogName);

    $executeResult = $stmt->execute();
    if ($executeResult === false) {
        die('execute() failed: ' . htmlspecialchars($stmt->error));
    }

    $stmt->bind_result($blogText);
    $stmt->fetch();
    $stmt->close();

    return $blogText;
}


$imageBackground = getImageByName($conn, 'tosca-background2');
$image1 = getImageByName($conn, 'Modric1');
$image2 = getImageByName($conn, 'Bellingham1');
$image3 = getImageByName($conn, 'Bernabeu');
$image4 = getImageByName($conn, 'MessiPildun');
$image5 = getImageByName($conn, 'RealMadrid');

$blog1 = getBlogTextByName($conn, 'sepakbola');
$blog2 = getBlogTextByName($conn, 'sepakbola2');
$blog3 = getBlogTextByName($conn, 'sepakbolapopuler');
$blog4 = getBlogTextByName($conn, 'sepakbolapopuler2');
$blog5 = getBlogTextByName($conn, 'sepakbolapopuler3');
$blog6 = getBlogTextByName($conn, 'sepakbolapopuler4');
$blog7 = getBlogTextByName($conn, 'realmadrid');
$blog8 = getBlogTextByName($conn, 'realmadrid2');

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="icon" href="real-madrid-logo.png">
    <link rel="stylesheet" href="blog.css">
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
        <h1>Blog</h1>
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
        <article>
            <h2>Sepak Bola</h2>
            <img src="<?php echo $image1; ?>" alt="Gambar 1">
            <p>
                <?php echo htmlspecialchars($blog1, ENT_QUOTES, 'UTF-8'); ?>
            </p>
            <br> </br>
            <img src="<?php echo $image2; ?>" alt="Gambar 2">
            <br> </br>
            <p>
                <?php echo htmlspecialchars($blog2, ENT_QUOTES, 'UTF-8'); ?>
            </p>
        </article>
        <article>
            <h2>Mengapa Sepak Bola Begitu Populer?</h2>
            <img src="<?php echo $image3; ?>" alt="Gambar 3">
            <p>
                <?php echo htmlspecialchars($blog3, ENT_QUOTES, 'UTF-8'); ?>
            <br> </br>
                <?php echo htmlspecialchars($blog4, ENT_QUOTES, 'UTF-8'); ?>
            <br> </br>
                <?php echo htmlspecialchars($blog5, ENT_QUOTES, 'UTF-8'); ?>
            </p>
            <br> </br>
            <img src="<?php echo $image4; ?>" alt="Gambar 4">
            <br> </br>
            <p>
                <?php echo htmlspecialchars($blog6, ENT_QUOTES, 'UTF-8'); ?>
            </p>
        </article>
        <article>
            <h2>Real Madrid : Salah Satu Tim Sepak Bola Tersukses dan Terbesar Dalam Sejarah</h2>
            <img src="<?php echo $image5; ?>" alt="Gambar 5">
            <p>
                <?php echo htmlspecialchars($blog7, ENT_QUOTES, 'UTF-8'); ?>
            <br> </br>
                <?php echo htmlspecialchars($blog8, ENT_QUOTES, 'UTF-8'); ?>
            </p>
        </article>
    </main>
    <footer>
        <p>&copy; 2024 Savio Palendeng Website Pribadi. All Rights Reserved.</p>
    </footer>

    <script src="animasi.js"></script>
    <script src="ajax.js"></script>
</body>
</html>