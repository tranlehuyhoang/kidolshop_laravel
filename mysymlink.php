<?php
$targetFolder = $_SERVER['DOCUMENT_ROOT'].'/kidolshop/storage/app/public';
$linkFolder = $_SERVER['DOCUMENT_ROOT'].'/kidolshop/public/storage';
symlink($targetFolder,$linkFolder);
echo 'Success';
?>