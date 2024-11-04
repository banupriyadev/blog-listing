<?php
if (function_exists('gd_info')) {
    echo "GD is enabled.";
} else {
    echo "GD is not enabled.";
}

$image = imagecreate(100, 100);
if ($image) {
    echo "GD functions are working.";
} else {
    echo "GD functions are not working.";
}
?>
