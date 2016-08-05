<?php
/**
 * @copyright	2011 TELECOM CREDIT CO.,LTD. All Rights Reserved.
 */

require_once(realpath(dirname( __FILE__)) . "/LC_Page_Mdl_Telecomcredit.php");

$objPage = new LC_Page_Mdl_Telecomcredit();
$objPage->init();
$objPage->process();
?>
