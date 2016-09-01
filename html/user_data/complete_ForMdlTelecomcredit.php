<?php
/**
 * @copyright	2011 TELECOM CREDIT CO.,LTD. All Rights Reserved.
 */

// {{{ requires
require_once '../require.php';
require_once CLASS_EX_REALDIR . 'page_extends/shopping/LC_Page_Shopping_Complete_Ex_ForMdlTelecomcredit.php';

// }}}
// {{{ generate page

$objPage = new LC_Page_Shopping_Complete_Ex_ForMdlTelecomcredit();
register_shutdown_function(array($objPage, "destroy"));
$objPage->init();
$objPage->process();
?>
