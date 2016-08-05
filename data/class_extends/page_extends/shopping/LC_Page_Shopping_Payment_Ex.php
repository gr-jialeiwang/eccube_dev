<?php
/**
 * @copyright	2011 TELECOM CREDIT CO.,LTD. All Rights Reserved.
 */

// {{{ requires
require_once CLASS_REALDIR . 'pages/shopping/LC_Page_Shopping_Payment.php';
require_once(MODULE_REALDIR. "mdl_telecom/include.php");

/**
 * 支払い方法選択 のページクラス(拡張).
 *
 * LC_Page_Shopping_Payment_Ex をテレコムクレジット決済モジュール用にオーバーライド
 */
class LC_Page_Shopping_Payment_Ex extends LC_Page_Shopping_Payment {

    // }}}
    // {{{ functions

    /**
     * Page を初期化する.
     *
     * @return void
     */
    function init() {
        parent::init();
    }

    /**
     * Page のプロセス.
     *
     * @return void
     */
    function process() {
        parent::process();
    }

    /**
     * デストラクタ.
     *
     * @return void
     */
    function destroy() {
        parent::__destruct();
    }

    /**
     * オーバーライド
     * 配送業者IDから, 支払い方法, お届け時間の配列を取得する.
     */
    function getSelectedDeliv(&$objCartSess, $deliv_id) {
        $arrResults = array();
        $arrResults['arrDelivTime'] = SC_Helper_Delivery_Ex::getDelivTime($deliv_id);
        $total = $objCartSess->getAllProductsTotal($objCartSess->getKey(), $deliv_id);
        $arrResults['arrPayment'] = $this->getPaymentsByPriceCustom($total, $deliv_id);
        $arrResults['img_show'] = $this->hasPaymentImage($arrResults['arrPayment']);
        return $arrResults;
    }

    /**
     * 購入金額に応じた支払方法を取得する.
     *
     * @param integer $total 購入金額
     * @param integer $deliv_id 配送業者ID
     * @return array 購入金額に応じた支払方法の配列
     */
    function getPaymentsByPriceCustom($total, $deliv_id) {

    	$objPurchase = new SC_Helper_Delivery_Ex();
        $arrPaymentIds = $objPurchase->getPayments($deliv_id);
        if (SC_Utils_Ex::isBlank($arrPaymentIds)) {
            return array();
        }

        $objQuery =& SC_Query_Ex::getSingletonInstance();

        // 削除されていない支払方法を取得
        $where = 'del_flg = 0 AND payment_id IN (' . implode(', ', array_pad(array(), count($arrPaymentIds), '?')) . ')';
        $objQuery->setOrder("rank DESC");
        $payments = $objQuery->select("payment_id, payment_method, rule_max, upper_rule, note, payment_image, charge, fix, charge_flg, memo03", "dtb_payment", $where, $arrPaymentIds);

        $orderHistoryCount = 0;
        if(isset($_SESSION['customer']['customer_id'])){
	        //注文履歴数を取得
        	$orderHistoryCount = $this->getOrderHistoryCount($objQuery);
        }

        foreach ($payments as $data) {
            //購入履歴が無い場合はテレコムクレジット スピード決済不可
			if(!$orderHistoryCount and $data['memo03'] == TELECOMCREDIT_SPEED_CODE)
			continue;

        	// 下限と上限が設定されている
            if (strlen($data['rule_max']) != 0 && strlen($data['upper_rule']) != 0) {
                if ($data['rule_max'] <= $total && $data['upper_rule'] >= $total) {
                    $arrPayment[] = $data;
                }
            }
            // 下限のみ設定されている
            elseif (strlen($data['rule_max']) != 0) {
                if($data['rule_max'] <= $total) {
                    $arrPayment[] = $data;
                }
            }
            // 上限のみ設定されている
            elseif (strlen($data['upper_rule']) != 0) {
                if($data['upper_rule'] >= $total) {
                    $arrPayment[] = $data;
                }
            }
            // いずれも設定なし
            else {
                $arrPayment[] = $data;
            }
          }
        return $arrPayment;
    }

    /**
     * 注文履歴のカウント取得
     * 購入履歴チェック(都度決済 購入回数の取得) del_flgは考慮しない
     * クレジット決済を行った(決済完了)注文にはdtb_orderのmemo01にクライアントIPが付与されるので、
     * SQLの条件式にT1.memo01 = T2.memo01を加えてスピード決済可否の判別を行う。
     *
     * @access private
     * @return 注文履歴のカウント数
     */
    function getOrderHistoryCount($objQuery){
    		$sql = "SELECT count(*) FROM dtb_order AS T1 INNER JOIN dtb_payment AS T2 ";
	        $sql.= "ON T1.payment_id = T2.payment_id ";
	        $sql.= "WHERE T1.customer_id = ? ";
  	        $sql.= "AND T1.memo01 = T2.memo01 ";
	        $sql.= "AND T2.memo03 = ? ";

	        $count = $objQuery->getOne($sql, array($_SESSION['customer']['customer_id'], TELECOMCREDIT_SSL_CODE));
	        return $count;
    }
}
?>
