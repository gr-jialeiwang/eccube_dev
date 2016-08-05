<?php
/**
 * @copyright	2011 TELECOM CREDIT CO.,LTD. All Rights Reserved.
 */

require_once(realpath(dirname( __FILE__)). '/LC_Page_Mdl_Telecomcredit_Config.php');
require_once(DATA_REALDIR. 'module/Request.php');

class LC_Page_Mdl_Telecomcredit extends LC_Page_Ex {

	var $objQuery;

	function LC_Page_Mdl_Telecomcredit(){
		$this->objQuery = new SC_Query_Ex();

		//1:本番モード 2:テストモード
		//※テストモードに変更すると決済をワンクリックで行い、決済テストを行う事ができます。
		//　変更する際は十分お気をつけ下さい。
		define('CREDITMODE_TYPE' ,1);
	}
    /**
     * Page を初期化する.
     *
     * @return void
     */
    function init() {
    	parent::init();
		$this->httpCacheControl('nocache');
    }


     /**
     * Page のプロセス.
     *
     * @return void
     */
    function process() {
    	$objCartSess = new SC_CartSession();
        $objSiteSess = new SC_SiteSession();
        $objCustomer = new SC_Customer();
        $objPurchase = new SC_Helper_Purchase_Ex();

        $this->tpl_uniqid = $this->getOrderTempId($_SESSION['order_id']);
        $arrOrderData = $objPurchase->getOrderTemp($this->tpl_uniqid);
        $arrPaymentData = $this->getPaymentData($arrOrderData['order_id']);

		//注文TEL
		$orderTel    = $arrOrderData["order_tel01"].$arrOrderData["order_tel02"].$arrOrderData["order_tel03"];

        //決済パラメータ設定
		$arrSendParams = array(
			'clientip'      => $arrPaymentData["clientip"]		//クライアントIP
			,'money'        => $arrOrderData["payment_total"]	//決済金額合計
			,'usrtel'       => $orderTel						//注文時電話番号
			,'usrmail'      => $arrOrderData["order_email"]		//注文時メールアドレス
		);

		//スピード決済
		if($arrPaymentData["credittype"] == TELECOMCREDIT_SPEED_CODE){
			//一番最後に購入している商品の注文番号取得 都度決済のみ
			$arrOrderData["orderIdForSpeed"] = $this->getOrderIdForSpeed($arrOrderData['customer_id']);

			//パラメータ追加(過去の注文番号)
			$arrSendParams['sendid'] = $arrOrderData["orderIdForSpeed"];

			//HTTPリクエストチェック用に注文番号を渡す
			$arrSendParams['option'] = $arrOrderData["order_id"];
		}
		else{
			//都度決済時は登録しない
			$arrOrderData["orderIdForSpeed"] = NULL;

			//パラメータ追加(注文番号)
			$arrSendParams['sendid'] = $arrOrderData["order_id"];
		}

		//携帯用処理
		if (is_callable("SC_MobileUserAgent", "isMobile") && SC_MobileUserAgent::isMobile()) {
			//パラメータ追加(携帯表示用)
			$arrSendParams['i'] = "on";
		}

		//ECCUBE決済完了ページへの遷移URL
		$redirectUrl = HTTP_URL."user_data/complete_ForMdlTelecomcredit.php";
		$redirectUrl.= '?id='.$this->tpl_uniqid;
		$arrSendParams['redirect_url'] = urlencode($redirectUrl);

		$arrUpdateVal["memo07"] = $arrPaymentData["clientip"];		//クライアントIP
		$arrUpdateVal["memo08"] = $arrPaymentData["credittype"];	//モジュールコード
		$arrUpdateVal["memo09"] = $arrOrderData["orderIdForSpeed"];	//スピード決済用 注文番号

		//受注一時テーブル更新
		$objPurchase->saveOrderTemp($arrOrderData['order_temp_id'], $arrUpdateVal, $objCustomer);

		//正常な推移であることを記録しておく
		$objSiteSess->setRegistFlag();

		//データ送信
		if(CREDITMODE_TYPE == 1){
			$this->lfSendCredit($arrPaymentData["crediturl"], $arrSendParams);
		}
		else{
			//テスト用
			$this->lfSendCreditForTest($arrPaymentData["crediturl"], $arrSendParams, $redirectUrl);
		}
    }

    /**
     * 一時注文テーブルのID取得
     * @param $orderId
     */
    function getOrderTempId($orderId) {
        $ret = $this->objQuery->getRow("order_temp_id", "dtb_order_temp", "order_id = ?",
                                 array($orderId));
        return $ret['order_temp_id'];
    }

    /**
     * 決済情報の取得
     * @param $orderId
     */
	function getPaymentData($orderId){
        $arrRet = array();
        $sql = "SELECT ".
               "   dtb_payment.memo01 as clientip , ".
               "   dtb_payment.memo02 as crediturl , ".
               "   dtb_payment.memo03 as credittype ".
               " FROM dtb_order ".
               "     LEFT JOIN dtb_payment ".
               "          ON dtb_order.payment_id = dtb_payment.payment_id ".
               " WHERE dtb_order.order_id = ? ";
        $arrRet = $this->objQuery->getall($sql, array($orderId));

        return $arrRet[0];
    }

    /**
     * スピード決済用 注文番号取得
     */
    function getOrderIdForSpeed($customerId){

		$sql = "SELECT MAX(d_o.create_date) FROM dtb_order AS d_o INNER JOIN dtb_payment AS d_p ON d_o.payment_id = d_p.payment_id WHERE d_o.customer_id = ? AND d_p.memo03 = ?";
		$maxOrderDate = $this->objQuery->getOne($sql, array($customerId, TELECOMCREDIT_SSL_CODE));

		$sql = "SELECT MAX(d_o.order_id) FROM dtb_order AS d_o INNER JOIN dtb_payment AS d_p ON d_o.payment_id = d_p.payment_id WHERE d_o.create_date = ? AND d_o.customer_id = ? AND d_p.memo03 = ?";
		$orderIdForSpeed = $this->objQuery->getOne($sql, array($maxOrderDate, $customerId, TELECOMCREDIT_SSL_CODE));

		return $orderIdForSpeed;
    }

	/**
	 * データ送信処理
	 */
	function lfSendCredit($creditUrl, $arrSendParams){

		$param = "";
		foreach($arrSendParams as $key => $val){
			$param .= ($param) ? "&" : "?";
			$param .= $key."=".$val;
		}

		header("Location: ".$creditUrl.$param);
	}

	/**
	 * データ送信処理(テスト用)
	 */
	function lfSendCreditForTest($creditUrl, $arrSendParams, $redirectUrl){

		$param = "";
		foreach($arrSendParams as $key => $val){
			$param .= ($param) ? "&" : "?";
			$param .= $key."=".$val;

			if($key == "option")$paramPlus = "&oneclick=yes";
		}

		//テスト用
		print("決済ページ遷移URL：<BR>");
		print($creditUrl.$param."<BR><BR>");

		if($paramPlus){
		//スピード決済
			print('<a href="../user_data/telecomcredit_recv.php'.$param.$paramPlus.'&rel=yes&cont=yes" target="_blank">決済完了処理(テスト)</a>');
		}
		else{
		//都度決済
			print('<a href="../user_data/telecomcredit_recv.php'.$param.$paramPlus.'&rel=yes&cont=no" target="_blank">決済完了処理(テスト)</a>');
		}
		print('<BR><BR>');
		print('<a href="'.$redirectUrl.'" target="_blank">決済完了画面へ</a>');
		exit();
	}
}
?>
