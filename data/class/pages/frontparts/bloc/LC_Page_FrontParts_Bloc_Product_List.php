<?php

// {{{ requires
require_once(CLASS_REALDIR . "pages/frontparts/bloc/LC_Page_FrontParts_Bloc.php");

/**
 * Product_List のページクラス.
 *
 * @package Page
 */
class LC_Page_FrontParts_Bloc_Product_List extends LC_Page_FrontParts_Bloc {

// }}}
// {{{ functions

/**
* Page を初期化する.
*
* @return void
*/
function init() {
	parent::init();
	$bloc_file = 'product_list.tpl';
	$this->setTplMainpage($bloc_file);
}

/**
* Page のプロセス.
*
* @return void
*/
function process() {
	if (defined("MOBILE_SITE") && MOBILE_SITE) {
	$objView = new SC_MobileView();
} else {
	$objView = new SC_SiteView();
}

$objQuery = new SC_Query_Ex();

// 商品一覧を取得
$col = 'T1.product_id, T1.main_list_image, T1.name, T2.price02 AS price02_min';
$from = 'dtb_products as T1 INNER JOIN dtb_products_class as T2 ON T1.product_id = T2.product_id';
$from .= ' INNER JOIN dtb_product_categories as T3 ON T1.product_id = T3.product_id';
$where = 'T2.del_flg = 0 and T3.category_id IN ( ?,?,?,?,? )';  // $arrval で指定するカテゴリIDの数だけ ? を増やす
$arrval = Array( 8,9,10,11,14 );   // 一番下層のカテゴリIDを指定する
$objQuery->setOrder("T1.update_date desc");
$arrProducts = $objQuery->select($col, $from, $where, $arrval);

// 重複データ削除
$tmp = Array();
$i = 0;
$max_count = 9;// 取得したい商品個数を指定する
foreach($arrProducts as $arrProduct){
if(!in_array($arrProduct['product_id'], $tmp)){
$this->arrProducts[$i] = $arrProduct;
$i++;
}
$tmp[] = $arrProduct['product_id'];
if($i >= $max_count){
break;
}
}

$objView->assignobj($this);
$objView->display($this->tpl_mainpage);
}

/**
 * デストラクタ.
 *
 * @return void
 */
function destroy() {
parent::destroy();
}
}

