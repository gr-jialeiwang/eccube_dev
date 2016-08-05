<?php
/**
 * @copyright	2011 TELECOM CREDIT CO.,LTD. All Rights Reserved.
 */

//決済金額設定
define("CHARGE_MIN", 100);
//define("CHARGE_MAX", 500000);

//決済完了リクエスト取得時のエラーメールを管理者に送信 0:送信しない 1:送信する
//※管理画面(SHOPマスタ)の送信エラー受付メールアドレス宛に送信されます。
define("TELECOMCREDIT_ERRORMAIL_FLG", 1);
//決済リクエスト受け取り IPチェック 0:チェックしない 1:チェックする
define("TELECOMCREDIT_IPCHECK_FLG", 1);
//ログファイル /data/logs
define("TELECOMCREDIT_LOGFILE", "telecomcredit.log");


/*
 * 変更禁止
 */
//会社名
define("TELECOMCREDIT_PRODUCT_NAME", "テレコムクレジット株式会社");
//会社TEL
define("MDL_TELECOMCREDIT_TEL",      "03-3457-5616");
//会社MAIL
define("MDL_TELECOMCREDIT_MAIL",     "sales1@telecomcredit.co.jp");

//決済モジュール名
define("MDL_TELECOMCREDIT_NAME",     "テレコムクレジット決済モジュール");
//決済モジュールコード
define("MDL_TELECOMCREDIT_CODE",     "mdl_telecom");

//ログファイルパス
define("TELECOMCREDIT_LOGPATH",      DATA_REALDIR ."logs/".TELECOMCREDIT_LOGFILE);

//決済モジュール 都度決済コード
define("TELECOMCREDIT_SSL_CODE",     "10530");
//決済モジュール SPEED決済コード
define("TELECOMCREDIT_SPEED_CODE",   "20530");

/*
 * テレコムクレジット決済受取クラス
 */
class LC_Telecomcredit_Receive{
	var $objQuery    = "";
	var $objMail     = "";
	var $orderId     = "";
	var $tmpOrder    = "";
	var $param       = "";
	var $remoteIp    = "";
	var $checkIp     = "";
	var $errorCode   = 0;
	var $arrData     = "";
	var $mailTo      = "";
	var $errorMsg    = "";
	var $mailBody    = "";
	var $sendFlg     = TELECOMCREDIT_ERRORMAIL_FLG;

	/*
	 * コンストラクタ
	 */
	function LC_Telecomcredit_Receive($objQuery, $objMail){
		$this->objQuery = $objQuery;
		$this->objMail  = $objMail;

		//エラー用メールアドレス取得
		$this->mailTo = $this->objQuery->getone("SELECT email04 FROM dtb_baseinfo");
		//メールアドレスが設定されていない場合は送信しない
		if(!$this->mailTo)$this->setSendFlg(0);

		//IPチェック用のリスト設定(NW帯域での設定も可能)
		//※テレコムクレジットのIPが変わった場合は変更する必要があります
		$this->checkIp = array(
							"203.191.250.64/27",
							"117.102.215.160/28"
							);
		//リモートIPアドレス
		$this->remoteIp  = (isset($_SERVER["REMOTE_ADDR"])) ? $_SERVER["REMOTE_ADDR"] : "" ;

	}

	/*
	 * エラーフラグ
	 */
	function setSendFlg($flg){
		$this->sendFlg = $flg;
	}
	function getSendFlg(){
		return $this->sendFlg;
	}

	/*
	 * 引数
	 */
	function setParam($paramKey){
		$this->param[$paramKey] = (isset($_GET[$paramKey])) ? $_GET[$paramKey] : "" ;
	}
	function getParam($paramKey){
		return $this->param[$paramKey];
	}

	/*
	 * 引数チェック
	 */
	function checkParam(){

		$addErrorMsg = "----------------------------------\n";
		$addErrorMsg.= "上記エラーの為、注文が確定できていません。\n\n";
		$addErrorMsg.= "また、クレジット決済が成功している可能性がございますので、\n";
		$addErrorMsg.= "集計システムにて決済状況の確認をお願い致します。\n";
		$addErrorMsg.= "成功している場合はお客様にご購入の意思を確認頂き、\n";
		$addErrorMsg.= "購入の意思がない場合は返金処理を行ってください。\n";

		//引数チェック
		if(!$this->getParam("clientip") or !$this->getParam("sendid") or !is_numeric($this->getParam("money")) or !$this->getParam("rel") or !$this->getParam("cont")){
			$this->setErrorCode(101);
			$this->setErrorMsg("ERROR CODE:".$this->getErrorCode()."(引数不正)");
			$this->mailBody.= "不正な決済通知が送られました。\n";
			$this->mailBody.= $addErrorMsg;
			return false;
		}
		//決済失敗
		if($this->getParam("rel") != "yes"){
			$this->setErrorCode(102);
			$this->setErrorMsg("ERROR CODE:".$this->getErrorCode()."(決済失敗)");
			$this->mailBody.= "決済処理が正常に完了しませんでした。\n";
			$this->mailBody.= "詳細については".TELECOMCREDIT_PRODUCT_NAME."の管理画面からご確認下さい。\n";
			return false;
		}

		//リモートIPチェック
		if(is_array($this->checkIp) and $this->remoteIp and TELECOMCREDIT_IPCHECK_FLG == 1){

			$checkIpFlg = false;
			foreach($this->checkIp as $ckeckIp){

				if($this->checkIpNet($this->remoteIp, $ckeckIp)){
					$checkIpFlg = true;
					break;
				}
			}

			if(!$checkIpFlg){
				$this->setErrorCode(201);
				$this->setErrorMsg("ERROR CODE:".$this->getErrorCode()."(リクエストIP不正)");
				$this->mailBody.= "不正にアクセスされている可能性がございます。\n";
				$this->mailBody.= TELECOMCREDIT_PRODUCT_NAME."にご確認下さい。\n";
				$this->mailBody.= "remoteip:".$this->remoteIp."\n";
				return false;
			}
		}

		//一時受注テーブルの読込
		//決済方法確認(スピード決済 or 都度決済)
		if($this->getParam("oneclick") == "yes"){

	    	//決済タイプチェック(スピード決済)
			if($this->getParam("cont") == "no"){
				$this->setErrorCode(104);
				$this->setErrorMsg("ERROR CODE:".$this->getErrorCode()."(決済タイプ不正)");
				$this->mailBody.= "不正な決済通知が送られました。\n";
				$this->mailBody.= "スピード決済ではない可能性がございます。\n";
				$this->mailBody.= TELECOMCREDIT_PRODUCT_NAME."にご確認下さい。\n";
				return false;
			}

	    	//引数にoptionが存在するかどうか
	    	if($this->getParam("option")){
		    	$sql = "SELECT * FROM dtb_order_temp WHERE order_id = ? AND memo09 = ?";
		    	$this->setTmpOrder($this->objQuery->getall($sql, array($this->getParam("option"), $this->getParam("sendid"))));
			}
	    	else{
				//引数チェック
	    		$this->setErrorCode(101);
				$this->setErrorMsg("ERROR CODE:".$this->getErrorCode()."(引数不正)");
				$this->mailBody.= "不正な決済通知が送られました。\n";
				$this->mailBody.= $addErrorMsg;
				return false;
	    	}

	    	$this->setOrderId($this->getParam("option"));
	    }
	    else{

	    	//決済タイプチェック(都度決済)
			if($this->getParam("cont") == "yes"){
				$this->setErrorCode(103);
				$this->setErrorMsg("ERROR CODE:".$this->getErrorCode()."(決済タイプ不正)");
				$this->mailBody.= "不正な決済通知が送られました。\n";
				$this->mailBody.= "都度決済ではない可能性がございます。\n";
				$this->mailBody.= TELECOMCREDIT_PRODUCT_NAME.".にご確認下さい。\n";
				return false;
			}

	    	//都度決済
	    	$sql = "SELECT * FROM dtb_order_temp WHERE order_id = ?";
	    	$this->setTmpOrder($this->objQuery->getall($sql, array($this->getParam("sendid"))));

	    	$this->setOrderId($this->getParam("sendid"));
	    }

		//注文ID不正
		if(!$this->getTmpOrder()){
			$this->setErrorCode(301);
			$this->setErrorMsg("ERROR CODE:".$this->getErrorCode()."(注文ID不正)");
			$this->mailBody.= "注文データが確認できませんでした。\n";
			$this->mailBody.= TELECOMCREDIT_PRODUCT_NAME."にご確認下さい。\n";
			$this->mailBody.= "sendid:".$this->getOrderId("sendid")."\n";
			$this->mailBody.= $addErrorMsg;
			return false;
		}
		//クライアントIP不正
		if($this->getTmpOrder("memo07") != $this->param["clientip"]){
			$this->setErrorCode(302);
			$this->setErrorMsg("ERROR CODE:".$this->getErrorCode()."(クライアントIP不正)");
			$this->mailBody.= "不正な決済通知が送られました。\n";
			$this->mailBody.= "ECCUBEまたは".TELECOMCREDIT_PRODUCT_NAME."に登録された、クライアントIP(clientip)が異なっています。\n";
			$this->mailBody.= "sendid:".$this->getOrderId("sendid")."\n";
			$this->mailBody.= "clientip:".$this->getParam("clientip")."\n";
			$this->mailBody.= $addErrorMsg;
			return false;
		}
		//決済金額不正チェック
		if($this->getTmpOrder("payment_total") != $this->getParam("money")){
			$this->setErrorCode(303);
			$this->setErrorMsg("ERROR CODE:".$this->getErrorCode()."(決済金額不正)");
			$this->mailBody.= "金額の異なる決済通知が送られてきました。\n";
			$this->mailBody.= TELECOMCREDIT_PRODUCT_NAME."にご確認下さい。\n";
			$this->mailBody.= "sendid:".$this->getOrderId("sendid")."\n";
			$this->mailBody.= "money:".$this->getTmpOrder("payment_total")."/".$this->getParam("money")."\n";
			$this->mailBody.= $addErrorMsg;
			return false;
		}

		$orderStatus = $this->objQuery->getOne('select status from dtb_order where order_id = ?', array($this->getOrderId()));

		//完了済みチェック
		if($orderStatus == ORDER_NEW){
			$this->setErrorCode(401);
			$this->setErrorMsg("ERROR CODE:".$this->getErrorCode()."(決済完了済み)");
			$this->mailBody.= "注文が決済完了済みになっています。\n";
			$this->mailBody.= TELECOMCREDIT_PRODUCT_NAME."にご確認下さい。\n";
			$this->mailBody.= "sendid:".$this->getOrderId("sendid")."\n";
			$this->mailBody.= $addErrorMsg;
			return false;
		}

		//エラーなし
		return true;
	}

	/*
	 * IP帯域チェック
	 */
	function checkIpNet($ip, $cidr) {

		list($network, $mask_bit_len) = explode('/', $cidr);
	    $host = 32 - $mask_bit_len;

	    $net = ip2long($network) >> $host << $host;
	    $ip_net = ip2long($ip) >> $host << $host;

	    return ($net === $ip_net) ? true : false;
	}

	/*
	 * 注文番号
	 */
	function setOrderId($orderId){
		$this->orderId = $orderId;
	}
	function getOrderId(){
		return $this->orderId;
	}

	/*
	 * 一時注文データ
	 */
	function setTmpOrder($tmpOrder){
		$this->tmpOrder = $tmpOrder;
	}
	function getTmpOrder($key = ""){

		if(!isset($this->tmpOrder[0])){
			return false;
		}

		if($key){
			return $this->tmpOrder[0][$key];
		}
		else {
			return $this->tmpOrder[0];
		}
	}

	/*
	 * エラーコード
	 */
	function setErrorCode($errorCode){
		$this->errorCode = $errorCode;
	}
	function getErrorCode(){
		return $this->errorCode;
	}

	/*
	 * エラーメッセージ
	 */
	function setErrorMsg($errorMsg){
		$this->errorMsg = $errorMsg ;
	}
	function getErrorMsg(){
		return $this->errorMsg;
	}

	/*
	 * エラーメール送信
	 */
	function sendErrorMail($subject="", $body=""){

		if(!$subject){
			$subject = MDL_TELECOMCREDIT_NAME." 決済エラー ".$this->getErrorMsg();
		}
		if(!$body){
			$body    = $this->mailBody;
		}

		$this->objMail->sfSendMail($this->mailTo, $subject, $body);
	}

	/*
	 * 成功処理
	 */
	function getSuccessOk(){
		print("SuccessOK");
	}
}
?>
