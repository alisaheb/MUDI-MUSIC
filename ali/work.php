<?php
require 'quickstart.php';

$upload = new uploadfile();

$vars = $upload->uploadfunction();

echo "<pre>";print_r($vars);

