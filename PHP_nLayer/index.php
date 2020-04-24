<?php

require_once './Config/autoload.php';

use BUS\AccountBUS;

$accBUS = new AccountBUS();
$lstAcc = $accBUS->getAll();
