<?php
require "ProcessingSpeedMeasure.php";

$PSM = new ProcessingSpeedMeasure();

sleep(1);
$PSM->measure('sleep1');


sleep(2);
$PSM->measure('sleep2');


sleep(3);
$PSM->measure('sleep3');

echo $PSM->getResult();