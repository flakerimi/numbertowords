<?php

include "vendor/autoload.php";


$numbers = new NumberToWords();

echo $numbers->parse(98512);

