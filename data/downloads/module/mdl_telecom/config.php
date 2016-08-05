<?php
/**
 * @copyright	2011 TELECOM CREDIT CO.,LTD. All Rights Reserved.
 */

// {{{ requires
require_once(MODULE_REALDIR . "mdl_telecom/LC_Page_Mdl_Telecomcredit_Config.php");

// }}}
// {{{ generate page
$objPage = new LC_Page_Mdl_Telecomcredit_Config();
$objPage->init();
$objPage->process();
register_shutdown_function(array($objPage, "destroy"));
?>
