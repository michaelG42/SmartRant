<?php

require_once 'Functions/Requires.php';

function getNewImageSize($image) {
    list($imageWidth, $imageHeight) = getimagesize($image);
    $newWidth = $imageWidth;
    $newHeight = $imageHeight;

    if ($newHeight > MAX_FILE_DIMENSIONS) {
        $newHeight = MAX_FILE_DIMENSIONS;
        $newWidth = $imageWidth * (MAX_FILE_DIMENSIONS / $imageHeight);
    }

    if ($imageWidth > MAX_FILE_DIMENSIONS) {
        $newWidth = MAX_FILE_DIMENSIONS;
        $newHeight = $imageHeight * (MAX_FILE_DIMENSIONS / $imageWidth);
    }

    return array($newWidth, $newHeight);
}

function resize_image($image, $w, $h) {
    list($width, $height) = getimagesize($image);
    $r = $width / $height;

    if ($w / $h > $r) {
        $newwidth = $h * $r;
        $newheight = $h;
    } else {
        $newheight = $w / $r;
        $newwidth = $w;
    }

    $src = imagecreatefrompng($image);
    $dst = imagecreatetruecolor($newwidth, $newheight);
    imagealphablending($dst, false);
    imagesavealpha($dst, true);
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

    return $dst;
}

function checkImageValid($image) {

    $valid = true;
    $size = filesize($image);
    $imgType = exif_imagetype($image);

    if ($size > MAX_FILE_SIZE) {
        $valid = false;
        $_SESSION["Messege"] = 'The image You are trying to upload is too large';
    }

    if ($imgType != IMAGETYPE_PNG) {
        $valid = false;
        $_SESSION["Messege"] = 'The image You are trying to upload is not of type png';
    }

    if ($imgType != IMAGETYPE_PNG && $size > MAX_FILE_SIZE) {
        $_SESSION["Messege"] = 'The image You are trying to upload is not of type png and is too large';
    }

    return $valid;
}

function uploadImage($image, $user) {
    $imageName = $user->getUserName() . "Original.png";
    $destFile = "UserImages/Temp/" . $imageName;

    move_uploaded_file($image, $destFile);

    $resizedFilename = "UserImages/" . $user->getUserName() . ".png";

    $newImageSize = getNewImageSize($destFile);

    $newWidth = $newImageSize[0];
    $newHeight = $newImageSize[1];

// resize the image 
    $imgData = resize_image($destFile, $newWidth, $newHeight);

// save the image on the given filename
    imagepng($imgData, $resizedFilename);
    unlink($destFile);
}

function assignUserImage($user, $db) {
    $imgLink = USER_IMG_FOLDER . $user->getUserName() . ".png";
    $user->setImgLink($imgLink);
    UpdateUserImage($user, $db);
}
