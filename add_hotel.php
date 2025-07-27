<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Upload photo
    $targetDir = "uploads/";
    if (!is_dir($targetDir)) mkdir($targetDir); // create folder if not exists
    $photoName = basename($_FILES["photo"]["name"]);
    $targetFile = $targetDir . time() . "_" . $photoName;

    move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile);

    // Create hotel array
    $hotel = [
        'name' => $_POST['name'],
        'address' => $_POST['address'],
        'map' => $_POST['map'],
        'email' => $_POST['email'],
        'owner' => $_POST['owner'],
        'phone' => $_POST['phone'],
        'photo' => $targetFile
    ];

    // Save to JSON
    $file = 'hotels.json';
    $hotels = json_decode(file_get_contents($file), true);
    $hotels[] = $hotel;

    file_put_contents($file, json_encode($hotels, JSON_PRETTY_PRINT));
    header('Location: admin.php');
    exit;
}
?>
