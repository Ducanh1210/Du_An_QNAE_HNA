<?php
include "env.php";
include "vendor/autoload.php";
$p = new App\Models\ProductModel();
foreach($p->getAll() as $item) {
    echo $item->id . ": " . $item->name . " - " . $item->price . " - " . $item->img_transparent . PHP_EOL;
}
