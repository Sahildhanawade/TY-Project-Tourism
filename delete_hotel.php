<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $file = 'hotels.json';
    $hotels = json_decode(file_get_contents($file), true);

    unset($hotels[$id]);
    $hotels = array_values($hotels); // re-index array

    file_put_contents($file, json_encode($hotels, JSON_PRETTY_PRINT));
}
header('Location: admin.php');
exit;
?>
