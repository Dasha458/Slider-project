<?php
require __DIR__ . '/vendor/autoload.php';

use App\Image\Renderer;
use App\Image\Slider;

$jsonUrl = 'https://picsum.photos/v2/list?limit=6';
$slider = new Slider($jsonUrl, new Renderer());
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slider</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <?php echo $slider->render(); ?>
    <script src="assets/slider.js"></script>
</body>
</html>