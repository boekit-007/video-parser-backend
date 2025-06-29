<?php
header("Content-Type: application/json");

if (!isset($_GET['url'])) {
    echo json_encode(["error" => "No URL provided"]);
    exit;
}

$url = $_GET['url'];
$source = @file_get_contents("https://snapinsta.app/action.php?url=" . urlencode($url));

if (preg_match('/href="(https:\/\/[^"]+\.mp4[^"]*)"/', $source, $match)) {
    echo json_encode([
        "video_url" => $match[1]
    ]);
} else {
    echo json_encode(["error" => "Video not found"]);
}
?>
