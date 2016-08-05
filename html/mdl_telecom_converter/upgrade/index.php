<?php
/**
 * @copyright	2011 TELECOM CREDIT CO.,LTD. All Rights Reserved.
 */

// {{{ requires
require_once '../../require.php';
require_once DATA_REALDIR . 'module/Services/JSON.php';

/**
 * モジュール一覧出力
 */
$arrProductsList = array(
    // 追加モジュール
    array(
        'name' => 'テレコムクレジット決済モジュール',
        'code' => 'mdl_telecom',
        'main_list_comment' => 'テレコムクレジット決済モジュール',
        'main_list_image' => 'resize.jpg',
        'version' => '4.01',
        'last_update_date' => '2013 11 5 00:00:00',
        'product_id' => '57712227',
        'status' => '使用可能です',
        'installed_flg' => '1',
        'installed_version' => '4.01',
        'download_flg' => '1',
        'version_up_flg' => '1'
    ),
);

switch(getMode()) {

case 'products_list':
    displayProductsList();
    break;

default:
    displayProductsList();
    break;
}

/**
 * モード取得.
 *
 * @return string
 */
function getMode() {
    if (isset($_GET['mode'])) {
        return $_GET['mode'];
    } elseif (isset($_POST['mode'])) {
        return $_POST['mode'];
    }
    return '';
}

/**
 * モジュールリスト一覧をjson出力する
 *
 */
function displayProductsList() {
    global $arrProductsList;
    $arrRet = array(
        'status' => 'SUCCESS',
        'data'   => $arrProductsList
    );

    // FIXME 一覧を取得するたびに更新されるのは微妙かも..
    updateModuleTable($arrProductsList);

    $objJson = new Services_JSON();
    echo $objJson->encode($arrRet);
}

/**
 * dtb_moduleを更新する.
 *
 * @param array $arrProductsList
 */
function updateModuleTable($arrProductsList) {
    $table = 'dtb_module';
    $where = 'module_id = ?';
    $objQuery = new SC_Query;

    foreach ($arrProductsList as $arrProduct) {
        $count = $objQuery->count($table, $where, array($arrProduct['product_id']));
        if ($count) {
            $arrUpdate = array(
                'module_code' => $arrProduct['code'],
                'module_name' => $arrProduct['name'],
                'auto_update_flg' => '0',
                'del_flg' => '0',
                'update_date' => 'NOW()',
            );
            $objQuery->update($table, $arrUpdate, $where, array($arrProduct['product_id']));
        } else {
            $arrInsert = array(
                'module_id'   => $arrProduct['product_id'],
                'module_code' => $arrProduct['code'],
                'module_name' => $arrProduct['name'],
                'auto_update_flg' => '0',
                'del_flg' => '0',
                'update_date' => 'NOW()',
                'create_date' => 'NOW()',
            );
            $objQuery->insert($table, $arrInsert);
        }
    }
}
?>
