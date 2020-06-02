<?php
namespace GUI;
use Helpers\Helpers;

$header = Helpers::requireToVar("./GUI/include/header.php");
$content = Helpers::requireToVar("./GUI/pages/router.php");
$footer = Helpers::requireToVar("./GUI/include/footer.php");

require "./GUI/template/light.php";