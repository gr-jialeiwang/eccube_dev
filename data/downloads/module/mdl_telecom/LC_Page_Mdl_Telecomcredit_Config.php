<?php
/**
 * @copyright	2011 TELECOM CREDIT CO.,LTD. All Rights Reserved.
 */

require_once(CLASS_REALDIR . "pages/LC_Page.php");
require_once(realpath(dirname( __FILE__)) . "/include.php");
require_once(DATA_REALDIR. 'module/Request.php');

/**
 * テレコムクレジット決済モジュールのページクラス.
 */
class LC_Page_Mdl_Telecomcredit_Config extends LC_Page {
     var $objFormParam;
     var $arrErr;
     var $objQuery;
     var $module_name;
     var $module_title;

     /**
     * コンストラクタ
     *
     * @return void
     */
     function LC_Page_Mdl_Telecomcredit_Config() {
        $this->module_name = MDL_TELECOMCREDIT_CODE;
        $this->module_title = MDL_TELECOMCREDIT_NAME;
        $this->objQuery = new SC_Query();
        $this->objSess = new SC_Session();
        $this->objFormParam = new SC_FormParam();
        //アップデートファイル設定
        //owc(上書きチェック), chmod(権限変更), backup(上書きファイルはバックアップ)
        //src(モジュールファイルパス), dst(コピー先ファイルパス)
        $this->arrUpdateFile = array(
            array("owc" => false, "chmod" => 0777, "backup" => false,
                  "src" => MODULE_REALDIR . $this->module_name . "/telecomcredit_recv.php",
                  "dst" => USER_REALDIR . 'telecomcredit_recv.php'),
            array("owc" => false, "chmod" => "", "backup" => false,
                  "src" => MODULE_REALDIR . $this->module_name . "/LC_Page_Shopping_Complete_Ex_ForMdlTelecomcredit.php",
                  "dst" => CLASS_EX_REALDIR . 'page_extends/shopping/LC_Page_Shopping_Complete_Ex_ForMdlTelecomcredit.php'),
            array("owc" => false, "chmod" => "", "backup" => false,
                  "src" => MODULE_REALDIR . $this->module_name . "/complete_ForMdlTelecomcredit.php",
                  "dst" => USER_REALDIR . 'complete_ForMdlTelecomcredit.php'),
            array("owc" => false, "chmod" => "", "backup" => true,
                  "src" => MODULE_REALDIR . $this->module_name . "/LC_Page_Shopping_Payment_Ex.php",
                  "dst" => CLASS_EX_REALDIR . 'page_extends/shopping/LC_Page_Shopping_Payment_Ex.php'),
        );
     }

     /**
     * Page を初期化する.
     *
     * @return void
     */
    function init() {
    	//ver2.11.0ではスーパークラスを参照させない
    	//parent::init();
    	$this->tpl_mainpage = MODULE_REALDIR . $this->module_name. "/config.tpl";
        $this->tpl_subtitle = $this->module_title;
        $this->arrErr = array();

        global $arrPayment;
        $this->arrPayment = $arrPayment;

        global $arrCredit;
        $this->arrCredit = $arrCredit;

        $this->updateTable();
    }

     /**
     * Page のプロセス.
     *
     * @return void
     */
    function process() {
        $objView = new SC_AdminView();
        $objQuery = new SC_Query();

        // パラメータチェック
        $this->initParam();
        // POST値の取得
        $this->objFormParam->setParam($_POST);

        switch ($_POST['mode']) {
        case 'edit':
            // 入力エラー判定
            $this->arrErr = $this->checkInputData();

            // エラーなしの場合にはデータを更新
            if (count($this->arrErr) == 0) {
                // 更新前チェック
                $this->arrErr = $this->checkUpdateFile();

                if (count($this->arrErr) == 0) {
	                // 支払い方法登録
	                $this->lfUpdPaymentDB();
	                // 設定情報登録
	                $this->setConfig();

	                // ファイルの更新
	                $this->updateFile();

	                // javascript実行
                    $this->tpl_onload = 'alert("登録完了しました。\n基本情報＞支払方法設定より詳細設定を行ってください。");';

                } else {
                	// javascript実行
                    $alert = join("\\n", $this->arrErr);
                    $alert = "【決済モジュールインストールエラー】\\n" . $alert;
                    $this->tpl_onload.= "alert(\"". $alert. "\");";
                }
            }
            break;
        case 'module_del':
            //使用していない
        	// 汎用項目の存在チェック
            $objDB = new SC_Helper_DB_Ex();
            if ($objDB->sfColumnExists("dtb_payment", "memo01")) {
                // 支払方法の削除フラグを立てる
                $arrDel = array('del_flg' => "1");
                $this->objQuery->update("dtb_payment", $arrDel, " module_code = ?", array($this->module_name));
            }
            break;
        default:
            // データのロード
            $arrConfig = $this->getConfig();
            $this->objFormParam->setParam($arrConfig);
            break;
        }

        $this->arrForm = $this->objFormParam->getFormParamList();

        $objView->assignobj($this);                    //変数をテンプレートにアサインする
        $objView->display($this->tpl_mainpage);        //テンプレートの出力
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
     *  パラメータ情報の初期化
     */
    function initParam() {
		$payment    = $_POST["payment"];

		if(isset($payment)){
			$this->objFormParam->addParam("クライアントIP", "client_ip", "5", "KVa", array("EXIST_CHECK","MAX_LENGTH_CHECK"));
		}
		$this->objFormParam->addParam("利用決済", "payment", "", "", array("EXIST_CHECK"));
    }

     // 登録データを読み込む
     function lfLoadData(){
		$this->objFormParam = new SC_FormParam();

		//データを取得
		$arrRet = lfGetPaymentDB(" AND del_flg = '0'");

		//値をセット
		$objFormParam->setParam($arrRet[0]);
    }

	/**
	 * 設定を保存
	 */
	function setConfig() {
		$sqlval = array();
		$arrConfig = $this->objFormParam->getHashArray();
		$sqlval['sub_data'] = serialize($arrConfig);
		$this->objQuery->update("dtb_module", $sqlval, "module_code = ?", array($this->module_name));
	}

	/**
	 * 設定を取得する
	 *
	 * @return array $arrConfig 設定ファイルの配列
	 */
    function getConfig() {
        $arrRet = $this->objQuery->select("sub_data", "dtb_module", "module_code = ?", array($this->module_name));
        $arrConfig = unserialize($arrRet[0]['sub_data']);
        return $arrConfig;
    }

    /**
     * 支払方法DBからデータを取得
     */
    function lfgetPaymentDB($type){
        $arrRet = array();
        $sql = "SELECT module_code
                FROM dtb_payment WHERE module_code = ? AND memo03 = ?";
        $arrRet = $this->objQuery->getall($sql, array($this->module_name, $type));
        return $arrRet;
    }

    // データの更新処理
    function lfUpdPaymentDB(){
		$objQuery = new SC_Query();
		$objSess = new SC_Session();

		// データ登録
		foreach($_POST["payment"] as $key => $val){
			// ランクの最大値を取得する
			$max_rank = $this->objQuery->getone("SELECT max(rank) FROM dtb_payment");

			// 支払方法データを取得
			$arrPaymentData = $this->lfGetPaymentDB("AND memo03 = ?", array($val));

			switch($val){
				// 都度決済利用チェック
				case TELECOMCREDIT_SSL_CODE :
				$arrData = array(
				"payment_method" => "クレジットカード決済"   				//支払方法
				,"fix" => 3
				,"creator_id" => $this->objSess->member_id						//顧客ID
				,"create_date" => "now()"										//作成日
				,"update_date" => "now()"										//更新日
				,"charge" => "0"												//手数料
				,"rule_max" => CHARGE_MIN											//決済の下限金額
				,"rule_min" => CHARGE_MIN										//決済の下限金額ルール
				//,"upper_rule" => CHARGE_MAX									//決済の上限金額
				//,"upper_rule_max" => CHARGE_MAX								//決済の上限金額ルール
				,"module_code" => $this->module_name							//モジュール名
				,"module_path" => MODULE_REALDIR . $this->module_name."/ssl.php"	//モジュールの処理を読み込む
				,"memo01" => $_POST["client_ip"]								//顧客コード
				,"memo02" => "https://secure.telecomcredit.co.jp/inetcredit/secure/order.pl"	//決済URL
				,"memo03" => $val												//モジュールコード
				,"charge_flg" => "1"											//手数料設定
				,"del_flg" => "0"
				,"status" => 1
				);
				break;

				// スピード決済チェック
				case TELECOMCREDIT_SPEED_CODE :
				$arrData = array(
				"payment_method" => "簡単クレジットカード決済（クレジット情報入力不要）"                  //支払方法
				,"fix" => 3
				,"creator_id" => $this->objSess->member_id						//顧客ID
				,"create_date" => "now()"										//作成日
				,"update_date" => "now()"										//更新日
				,"charge" => "0"												//手数料
				,"rule_max" => CHARGE_MIN											//決済の下限金額
				,"rule_min" => CHARGE_MIN										//決済の下限金額ルール
				//,"upper_rule" => CHARGE_MAX									//決済の上限金額
				//,"upper_rule_max" => CHARGE_MAX								//決済の上限金額ルール
				,"module_code" => $this->module_name							//モジュール名
				,"module_path" => MODULE_REALDIR . $this->module_name."/speed.php"	//モジュールの処理を読み込む
				,"memo01" => $_POST["client_ip"]								//顧客コード
				,"memo02" => "https://secure.telecomcredit.co.jp/inetcredit/secure/one-click-order.pl"	//決済URL
				,"memo03" => $val												//モジュールコード
				,"charge_flg" => "1"											//手数料設定
				,"del_flg" => "0"
				,"status" => 1
				);
				break;

				default:
				break;
			}

			// 支払方法データを取得
			$arrPayment = $this->lfgetPaymentDB($val);

			// 支払方法データが存在すればUPDATE
			if (count($arrPayment) > 0) {
				$this->objQuery->update("dtb_payment", $arrData, "module_code = ? AND memo03 = ?", array($this->module_name, $val));
			}
			// 支払方法データが無ければINSERT
			else{
				//payment_idがauto_incrementになっていないので最大値+1で設定
				$max_payment_id = $this->objQuery->getone("SELECT max(payment_id) FROM dtb_payment");
				$arrData["payment_id"] = $max_payment_id + 1;

				// ランクの最大値を取得
				$max_rank = $this->objQuery->getone("SELECT max(rank) FROM dtb_payment");
				$arrData["rank"] = $max_rank + 1;
				$this->objQuery->insert("dtb_payment", $arrData);
			}
		}
	}

    /**
     * テーブルを更新
     */
    function updateTable(){
    	$objDB = new SC_Helper_DB_Ex();
        $objDB->sfColumnExists(
            'dtb_payment', 'module_code', 'text', "", $add = true
        );
    }

     /**
      * 入力値のチェック
      */
    function checkInputData(){
        $arrErr = $this->objFormParam->checkError();
        return $arrErr;
    }

    /**
     * ファイル更新前のチェック
     */
	function checkUpdateFile(){
		$arrErr = array();

		foreach ($this->arrUpdateFile as $array) {
			$overWriteCheck = $array['owc'];
			$srcFile        = $array['src'];
			$dstFile        = $array['dst'];

			//更新用ファイルの存在チェック
			if(!file_exists($srcFile)){
				array_push($arrErr, $srcFile." 更新用ファイルが存在しません。");
			}
			//上書きチェックtrueの場合(更新先ファイルが存在する場合は、ソース内容の差分チェック)
			else if($overWriteCheck and file_exists($dstFile)){
				if(sha1_file($srcFile) != sha1_file($dstFile)){
					array_push($arrErr, $dstFile." 更新ファイルと差分があります。");
				}
			}
			//書き込みチェック(フォルダ)
			else if(!is_writable(dirname($dstFile))) {
				array_push($arrErr, dirname($dstFile)." フォルダに書き込み権限を与えてください。");
			}
			//書き込みチェック(ファイル)
			else if(!is_writable($dstFile) and file_exists($dstFile)) {
				array_push($arrErr, $dstFile." 更新ファイルに書き込み権限を与えてください。");
			}
		}

		//バックアップ
		$errorMsg = $this->updateFileBackUp();
		if($errorMsg)array_push($arrErr, $errorMsg);

		return $arrErr;
    }

    /**
     * ファイル更新のバックアップ
     */
	function updateFileBackUp(){
		$backupFolder = MODULE_REALDIR . $this->module_name . "/backup";

		//フォルダが作成されている場合はバックアップを行わない。
		if(!file_exists($backupFolder)){

			//書き込み権限チェック
			if(!@mkdir($backupFolder, 0777))return MODULE_REALDIR . $this->module_name." フォルダに書き込み権限を与えてください。";

			$i = 1;
			foreach ($this->arrUpdateFile as $array) {
				$checkBackup    = $array['backup'];
				$dstFile        = $array['dst'];
				$backupFile     = $backupFolder."/".basename($dstFile)."_BK".date("Ymd")."_".$i;

				//バックアップファイルが存在する場合は上書きしない
				if($checkBackup){
					copy($dstFile, $backupFile);
					$i++;
				}
			}
		}
		return false;
    }

    /**
     * ファイル更新
     */
	function updateFile(){

		foreach ($this->arrUpdateFile as $array) {
			$srcFile        = $array['src'];
			$dstFile        = $array['dst'];
			$chmodCode      = $array['chmod'];

			copy($srcFile, $dstFile);
			if($chmodCode)chmod($dstFile, $chmodCode);
		}
	}
}
?>
