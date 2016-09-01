<?php
/**
 * @copyright	2011 TELECOM CREDIT CO.,LTD. All Rights Reserved.
 */

// {{{ requires
require_once CLASS_REALDIR . 'pages/shopping/LC_Page_Shopping_Complete.php';

/**
 * ご注文完了 のページクラス(拡張).
 *
 * LC_Page_Shopping_Complete をテレコムクレジット決済モジュール用に新規作成
 */
class LC_Page_Shopping_Complete_Ex_ForMdlTelecomcredit extends LC_Page_Shopping_Complete {

    // }}}
    // {{{ functions

    /**
     * Page を初期化する.
     *
     * @return void
     */
    function init() {
    	$this->tpl_title = "ご注文完了";

        // 開始時刻を設定する。
        $this->timeStart = microtime(true);

        $this->tpl_authority = $_SESSION['authority'];

        // ディスプレイクラス生成
        $this->objDisplay = new SC_Display_Ex();

        // complete.phpのテンプレートを使用する為、SHOPPING_COMPLETE_URLPATHを設定
        $layout = new SC_Helper_PageLayout_Ex();
        $layout->sfGetPageLayout($this, false, SHOPPING_COMPLETE_URLPATH,
                                 $this->objDisplay->detectDevice());

        // スーパーフックポイントを実行.
        $objPlugin = SC_Helper_Plugin_Ex::getSingletonInstance($this->plugin_activate_flg);
        $objPlugin->doAction('LC_Page_preProcess', array($this));

        // 店舗基本情報取得
        $this->arrSiteInfo = SC_Helper_DB_Ex::sfGetBasisData();

        // トランザクショントークンの検証と生成
        $this->doValidToken();
        $this->setTokenTo();

		// ローカルフックポイントを実行.
        $this->doLocalHookpointBefore($objPlugin);
    }

    /**
     * Page のプロセス.
     *
     * @return void
     */
    function process() {
    	$errorType = PAGE_ERROR;
    	$errorMsg  = "";

    	//戻りURLの引数
    	$tpl_uniqid = (isset($_GET["id"])) ? $_GET["id"] : "" ;
    	$arrOrderData = $this->getOrderForCredit($tpl_uniqid);

        //不正ユニークIDチェック
    	if(isset($arrOrderData["order_id"])){

        	//決済処理 完了済みチェック
			if(!isset($arrOrderData["memo01"])){
		    	//表示エラーメッセージ
		    	$errorType = FREE_ERROR_MSG;
				$errorMsg = "決済エラーが発生しました。<br>";
		    	$errorMsg.= "決済に失敗している可能性がございますので、詳細についてはサイト管理者にご確認下さい。";
			}
			else{
				//完了ページ表示
				parent::process();
				exit();
			}
        }

    	//エラー表示
    	$objSiteSession = new SC_SiteSession_Ex();
		SC_Utils_Ex::sfDispSiteError($errorType, $objSiteSession, false, $errorMsg);
    }

    /**
     * ユニークIDから注文データ取得
     * @param $tpl_uniqid
     */
    function getOrderForCredit($tpl_uniqid){
        $objQuery =& SC_Query_Ex::getSingletonInstance();

        $sql = "SELECT order_id, memo01 FROM dtb_order WHERE order_temp_id = ?";
        $orderData = $objQuery->getAll($sql,array($tpl_uniqid));

        return $orderData[0];
    }

    /**
     * デストラクタ.
     *
     * @return void
     */
    function destroy() {
        parent::__destruct();
    }
}
?>
