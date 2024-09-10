<?php

function getDownloadsDirectory() {
    $os = PHP_OS_FAMILY;

    switch ($os) {
        case 'Windows':
            return getenv('USERPROFILE') . '\\Downloads';
        case 'Darwin': // macOS
            return getenv('HOME') . '/Downloads';
        case 'Linux':
            return getenv('HOME') . '/Downloads';
        default:
            return __DIR__; // Fallback to the current directory
    }
}

// Path to the video file URL
$videoUrl = isset($_POST['video_url']) ? trim($_POST['video_url']) : '';
$downloadsDir = getDownloadsDirectory();

// Ensure the directory exists
if (!file_exists($downloadsDir)) {
    mkdir($downloadsDir, 0755, true);
}
$youtubeLink =$_POST['url'];
$res = shell_exec('yt-dlp -o"'.$downloadsDir.'/%(title)s.%(ext)s\" --yes-playlist '. $youtubeLink);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download</title>
</head>
<body>
    <h1 style = "width:100%;text-align:center">Video is downloaded successfully</h1>
</body>
</html>