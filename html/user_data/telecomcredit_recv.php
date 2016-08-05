<?php
/**
 * @copyright	2011 TELECOM CREDIT CO.,LTD. All Rights Reserved.
 */

require_once("../require.php");

require_once(CLASS_REALDIR . "pages/LC_Page.php");
require_once(MODULE_REALDIR. "mdl_telecom/include.php");

$objQuery        = new SC_Query();
$objMail         = new SC_Helper_Mail_Ex();

//テレコムクレジット決済受け取りクラス
$objTelecomRece  = new LC_Telecomcredit_Receive($objQuery, $objMail);

//パラメータ取得
$objTelecomRece->setParam("clientip");
$objTelecomRece->setParam("cont");
$objTelecomRece->setParam("rel");
$objTelecomRece->setParam("money");
$objTelecomRece->setParam("sendid");
$objTelecomRece->setParam("oneclick");
$objTelecomRece->setParam("option");

//パラメータチェック
$objTelecomRece->checkParam();

// セッション情報の復帰
$_SESSION = unserialize($objTelecomRece->getTmpOrder("session"));

//決済ログ作成
printLog("TELECOMCREDIT START");

if($objTelecomRece->getErrorCode()){
	printLog($objTelecomRece->getErrorMsg());

	if($objTelecomRece->getSendFlg() == 1){
		//エラーメール送信
		$objTelecomRece->sendErrorMail();
	}
}
//セッションチェック
else if(!$_SESSION){
	printLog("***** SESSION ERROR *****");
	exit;
}
else{
	$objPurchase  = new SC_Helper_Purchase_Ex();
	$objCartSess  = new SC_CartSession_Ex();

	$product_type_id = $objCartSess->getKey();

	//(スピード決済 or 都度決済)によって注文IDの引数を変更
	$orderId  = $objTelecomRece->getOrderId();
	$clientIp = getParam("clientip");

	//スピード決済可否チェック時用にデータ更新
	$objQuery->update('dtb_order', array("memo01" => $clientIp), 'order_id = ?', array($orderId));

	//注文ステータス変更
	switch ($product_type_id) {
		case PRODUCT_TYPE_DOWNLOAD:
			//ステータスを一度"入金済み"に変更後、"発送済み"に変更
			$objPurchase->sfUpdateOrderStatus($orderId, ORDER_PRE_END);
			$objPurchase->sfUpdateOrderStatus($orderId, ORDER_DELIV);
			break;

		case PRODUCT_TYPE_NORMAL:
		default:
			//ステータスを"新規受付"に変更
			$objPurchase->sfUpdateOrderStatus($orderId, ORDER_NEW);
	}
    $objPurchase->sendOrderMail($orderId);
}

printLog("TELECOMCREDIT END");

//リクエストOK
$objTelecomRece->getSuccessOk();
exit;

/*
 * 引数取得
 */
function getParam($paramKey){
	$value = (isset($_GET[$paramKey])) ? $_GET[$paramKey] : "" ;
	return $value;
}

/*
 * ログ出力
 */
function printLog($msg){

	if(TELECOMCREDIT_LOGPATH){
		GC_Utils::gfPrintLog($msg, TELECOMCREDIT_LOGPATH);
	}
}

?>