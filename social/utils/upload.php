<?php
require('../autoload.php');
require('../src/Helpers.php');

Cloudinary::config_from_url("cloudinary://112549415912653:jYr1kKJV881eFh1rG5pFcqZCrwc@de1qjrgru");

function upload($file){
    $res = Cloudinary\Uploader::upload($file);
    return $res['url'];
}