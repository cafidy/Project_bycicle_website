<?php
require_once '../autoloader.php';

/**
 * controls repository
 *
 * get the wanted part and show mor developped info 
 * 
 * Responsibilities:
 * - more info about part
 * 
 * Dependencies:
 * - PartDB
 * - Part
 *
 * @author yassine elmsebli
 */

use Site\Model\PartsDB;
use Site\Entity\Part;

$racinepath = "../";
$part = null;
$parts = new PartsDB();
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['partid'])) {
    $part = $parts->getpart($_POST['partid']);
}
include "../views/header.php";
include "../views/item.php";
include "../views/footer.php";
?>