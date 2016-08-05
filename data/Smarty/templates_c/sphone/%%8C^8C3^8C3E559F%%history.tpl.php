<?php /* Smarty version 2.6.27, created on 2015-10-15 16:03:53
         compiled from /home/vuser/3/8/0211283/www.sbadi.jp/ectest/html/../data/Smarty/templates/sphone/mypage/history.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', '/home/vuser/3/8/0211283/www.sbadi.jp/ectest/html/../data/Smarty/templates/sphone/mypage/history.tpl', 26, false),array('modifier', 'h', '/home/vuser/3/8/0211283/www.sbadi.jp/ectest/html/../data/Smarty/templates/sphone/mypage/history.tpl', 26, false),array('modifier', 'sfDispDBDate', '/home/vuser/3/8/0211283/www.sbadi.jp/ectest/html/../data/Smarty/templates/sphone/mypage/history.tpl', 35, false),array('modifier', 'sfCalcIncTax', '/home/vuser/3/8/0211283/www.sbadi.jp/ectest/html/../data/Smarty/templates/sphone/mypage/history.tpl', 61, false),array('modifier', 'n2s', '/home/vuser/3/8/0211283/www.sbadi.jp/ectest/html/../data/Smarty/templates/sphone/mypage/history.tpl', 61, false),array('modifier', 'default', '/home/vuser/3/8/0211283/www.sbadi.jp/ectest/html/../data/Smarty/templates/sphone/mypage/history.tpl', 83, false),array('modifier', 'sfNoImageMainList', '/home/vuser/3/8/0211283/www.sbadi.jp/ectest/html/../data/Smarty/templates/sphone/mypage/history.tpl', 97, false),array('modifier', 'u', '/home/vuser/3/8/0211283/www.sbadi.jp/ectest/html/../data/Smarty/templates/sphone/mypage/history.tpl', 100, false),array('modifier', 'sfMultiply', '/home/vuser/3/8/0211283/www.sbadi.jp/ectest/html/../data/Smarty/templates/sphone/mypage/history.tpl', 128, false),)), $this); ?>

<section id="mypagecolumn">
    <h2 class="title"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_title'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</h2>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=$this->_tpl_vars['tpl_navi'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

    <h3 class="title_mypage"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_subtitle'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</h3>

    <div class="form_area">
        <div id="historyBox">
            <p>
                <em>注文番号</em>：&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_arrOrderData']['order_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<br />
                <em>購入日時</em>：&nbsp;<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_arrOrderData']['create_date'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfDispDBDate', true, $_tmp) : SC_Utils_Ex::sfDispDBDate($_tmp)); ?>
<br />
                <em>お支払い方法</em>：&nbsp;<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrPayment'][$this->_tpl_vars['tpl_arrOrderData']['payment_id']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>

            </p>

            <form action="order.php" method="post">
                <input type="hidden" name="<?php echo ((is_array($_tmp=@TRANSACTION_ID_NAME)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['transactionid'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
                <input type="hidden" name="order_id" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_arrOrderData']['order_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
">
                <input class="btn_reorder btn data-role-none" type="submit" name="submit" value="再注文">
            </form>
        </div>
        <?php $_from = ((is_array($_tmp=$this->_tpl_vars['arrShipping'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['shippingItem'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['shippingItem']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['shippingItem']):
        $this->_foreach['shippingItem']['iteration']++;
?>
            <h3>お届け先<?php if (((is_array($_tmp=$this->_tpl_vars['isMultiple'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?><?php echo ((is_array($_tmp=$this->_foreach['shippingItem']['iteration'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php endif; ?></h3>
        <div class="historyBox">
        <p>
            <?php if (((is_array($_tmp=$this->_tpl_vars['isMultiple'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                    <?php $_from = ((is_array($_tmp=$this->_tpl_vars['shippingItem']['shipment_item'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
                        <em>商品コード：&nbsp;</em><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['product_code'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
<br />
                        <em>商品名：&nbsp;</em>
                                <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
<br />
                                <?php if (((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['classcategory_name1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ""): ?>
                                    <?php echo ((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['class_name1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
：<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['classcategory_name1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<br />
                                <?php endif; ?>
                                <?php if (((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['classcategory_name2'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ""): ?>
                                    <?php echo ((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['class_name2'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
：<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['classcategory_name2'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<br />
                                <?php endif; ?>

                        <em>単価：&nbsp;</em><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['price'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfCalcIncTax', true, $_tmp, ((is_array($_tmp=$this->_tpl_vars['tpl_arrOrderData']['order_tax_rate'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)), ((is_array($_tmp=$this->_tpl_vars['tpl_arrOrderData']['order_tax_rule'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) : SC_Helper_DB_Ex::sfCalcIncTax($_tmp, ((is_array($_tmp=$this->_tpl_vars['tpl_arrOrderData']['order_tax_rate'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)), ((is_array($_tmp=$this->_tpl_vars['tpl_arrOrderData']['order_tax_rule'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)); ?>
円<br />
                        <em>数量：&nbsp;</em><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['quantity'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<br />
                                                <br />
                    <?php endforeach; endif; unset($_from); ?>
            <?php endif; ?>

            <em>お名前</em>：&nbsp;<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['shippingItem']['shipping_name01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
&nbsp;<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['shippingItem']['shipping_name02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
<br />
            <em>お名前(フリガナ)</em>：&nbsp;<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['shippingItem']['shipping_kana01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
&nbsp;<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['shippingItem']['shipping_kana02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
<br />
            <em>会社名</em>：&nbsp;<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['shippingItem']['shipping_company_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
<br />
            <?php if (((is_array($_tmp=@FORM_COUNTRY_ENABLE)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                <em>国</em>：&nbsp;<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrCountry'][$this->_tpl_vars['shippingItem']['shipping_country_id']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
<br />
                <em>ZIPCODE</em>：&nbsp;<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['shippingItem']['shipping_zipcode'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
<br />
            <?php endif; ?>
            <em>郵便番号</em>：&nbsp;〒<?php echo ((is_array($_tmp=$this->_tpl_vars['shippingItem']['shipping_zip01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['shippingItem']['shipping_zip02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<br />
            <em>住所</em>：&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['arrPref'][$this->_tpl_vars['shippingItem']['shipping_pref']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['shippingItem']['shipping_addr01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['shippingItem']['shipping_addr02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
<br />
            <em>電話番号</em>：&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['shippingItem']['shipping_tel01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['shippingItem']['shipping_tel02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['shippingItem']['shipping_tel03'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<br />
                            <?php if (((is_array($_tmp=$this->_tpl_vars['shippingItem']['shipping_fax01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) > 0): ?>
            <em>FAX番号</em>：&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['shippingItem']['shipping_fax01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['shippingItem']['shipping_fax02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['shippingItem']['shipping_fax03'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<br />
                            <?php endif; ?>
            <em>お届け日</em>：&nbsp;<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['shippingItem']['shipping_date'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, '指定なし') : smarty_modifier_default($_tmp, '指定なし')))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
<br />
            <em>お届け時間</em>：&nbsp;<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['shippingItem']['shipping_time'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, '指定なし') : smarty_modifier_default($_tmp, '指定なし')))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
<br />
</p>
</div>

        <?php endforeach; endif; unset($_from); ?>

        <div class="formBox">
            <!--▼カートの中の商品一覧 -->
            <div class="cartinarea clearfix">

                <!--▼商品 -->
                <?php $_from = ((is_array($_tmp=$this->_tpl_vars['tpl_arrOrderDetail'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['orderDetail']):
?>
                    <div>
                        <img src="<?php echo ((is_array($_tmp=@IMAGE_SAVE_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['orderDetail']['main_list_image'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfNoImageMainList', true, $_tmp) : SC_Utils_Ex::sfNoImageMainList($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" style="max-width: 80px;max-height: 80px;width:auto;" alt="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['orderDetail']['product_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" class="photoL" />
                        <div class="cartinContents">
                            <div>
                                <p><em><!--→商品名--><a<?php if (((is_array($_tmp=$this->_tpl_vars['orderDetail']['enable'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?> href="<?php echo ((is_array($_tmp=@P_DETAIL_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['orderDetail']['product_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('u', true, $_tmp) : smarty_modifier_u($_tmp)); ?>
"<?php endif; ?> rel="external"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['orderDetail']['product_name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</a><!--←商品名--></em></p>
                                <p>
                                    <!--→金額-->
                                    <?php $this->assign('price', ($this->_tpl_vars['orderDetail']['price'])); ?>
                                    <?php $this->assign('quantity', ($this->_tpl_vars['orderDetail']['quantity'])); ?>
                                    <span class="mini">価格:</span><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['price'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
円<!--←金額-->
                                </p>

                                <!--→商品種別-->
                                <?php if (((is_array($_tmp=$this->_tpl_vars['orderDetail']['product_type_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == ((is_array($_tmp=@PRODUCT_TYPE_DOWNLOAD)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                                    <p id="downloadable">
                                        <?php if (((is_array($_tmp=$this->_tpl_vars['orderDetail']['is_downloadable'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                                            <a target="_self" href="<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
mypage/download.php?order_id=<?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_arrOrderData']['order_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
&amp;product_id=<?php echo ((is_array($_tmp=$this->_tpl_vars['orderDetail']['product_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
&amp;product_class_id=<?php echo ((is_array($_tmp=$this->_tpl_vars['orderDetail']['product_class_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" rel="external">ダウンロード</a><br />
                                        <?php else: ?>
                                            <?php if (((is_array($_tmp=$this->_tpl_vars['orderDetail']['payment_date'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == "" && ((is_array($_tmp=$this->_tpl_vars['orderDetail']['effective'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == '0'): ?>
                                                <?php echo ((is_array($_tmp=$this->_tpl_vars['arrProductType'][$this->_tpl_vars['orderDetail']['product_type_id']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<br />（入金確認中）
                                            <?php else: ?>
                                                <?php echo ((is_array($_tmp=$this->_tpl_vars['arrProductType'][$this->_tpl_vars['orderDetail']['product_type_id']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<br />（期限切れ）
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </p>
                                <?php endif; ?>
                                <!--←商品種別-->
                            </div>
                            <?php $this->assign('tax_rate', ($this->_tpl_vars['orderDetail']['tax_rate'])); ?>
                            <?php $this->assign('tax_rule', ($this->_tpl_vars['orderDetail']['tax_rule'])); ?>
                            <ul>
                                <li><span class="mini">数量：</span><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['quantity'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</li>
                                <li class="result"><span class="mini">小計：</span><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['price'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfCalcIncTax', true, $_tmp, ((is_array($_tmp=$this->_tpl_vars['tax_rate'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)), ((is_array($_tmp=$this->_tpl_vars['tax_rule'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) : SC_Helper_DB_Ex::sfCalcIncTax($_tmp, ((is_array($_tmp=$this->_tpl_vars['tax_rate'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)), ((is_array($_tmp=$this->_tpl_vars['tax_rule'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))))) ? $this->_run_mod_handler('sfMultiply', true, $_tmp, ((is_array($_tmp=$this->_tpl_vars['quantity'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) : SC_Utils_Ex::sfMultiply($_tmp, ((is_array($_tmp=$this->_tpl_vars['quantity'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)); ?>
円</li>
                            </ul>
                        </div>
                    </div>
                <?php endforeach; endif; unset($_from); ?>
                <!--▲商品 -->

            </div>            <!--▲ カートの中の商品一覧 -->

            <div class="total_area">
                <div><span class="mini">小計：</span><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_arrOrderData']['subtotal'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)); ?>
円</div>
                <?php if (((is_array($_tmp=$this->_tpl_vars['tpl_arrOrderData']['use_point'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) > 0): ?>
                    <div><span class="mini">ポイント値引き：</span>&minus;<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_arrOrderData']['use_point'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)); ?>
円</div>
                <?php endif; ?>
                <?php if (((is_array($_tmp=$this->_tpl_vars['tpl_arrOrderData']['discount'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != '' && ((is_array($_tmp=$this->_tpl_vars['tpl_arrOrderData']['discount'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) > 0): ?>
                    <div><span class="mini">値引き：</span>&minus;<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_arrOrderData']['discount'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)); ?>
円</div>
                <?php endif; ?>
                <div><span class="mini">送料：</span><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_arrOrderData']['deliv_fee'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)); ?>
円</div>
                <div><span class="mini">手数料：</span><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_arrOrderData']['charge'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)); ?>
円</div>
                <div><span class="mini">合計：</span><span class="price fb"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_arrOrderData']['payment_total'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)); ?>
円</span></div>
                <div><span class="mini">今回加算ポイント：</span><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_arrOrderData']['add_point'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
Pt</div>
            </div>
        </div><!-- /.formBox -->

        <!--▼メール一覧 -->
        <div class="formBox">

            <div class="box_header">
                メール配信履歴一覧
            </div>
            <?php unset($this->_sections['cnt']);
$this->_sections['cnt']['name'] = 'cnt';
$this->_sections['cnt']['loop'] = is_array($_loop=((is_array($_tmp=$this->_tpl_vars['tpl_arrMailHistory'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['cnt']['show'] = true;
$this->_sections['cnt']['max'] = $this->_sections['cnt']['loop'];
$this->_sections['cnt']['step'] = 1;
$this->_sections['cnt']['start'] = $this->_sections['cnt']['step'] > 0 ? 0 : $this->_sections['cnt']['loop']-1;
if ($this->_sections['cnt']['show']) {
    $this->_sections['cnt']['total'] = $this->_sections['cnt']['loop'];
    if ($this->_sections['cnt']['total'] == 0)
        $this->_sections['cnt']['show'] = false;
} else
    $this->_sections['cnt']['total'] = 0;
if ($this->_sections['cnt']['show']):

            for ($this->_sections['cnt']['index'] = $this->_sections['cnt']['start'], $this->_sections['cnt']['iteration'] = 1;
                 $this->_sections['cnt']['iteration'] <= $this->_sections['cnt']['total'];
                 $this->_sections['cnt']['index'] += $this->_sections['cnt']['step'], $this->_sections['cnt']['iteration']++):
$this->_sections['cnt']['rownum'] = $this->_sections['cnt']['iteration'];
$this->_sections['cnt']['index_prev'] = $this->_sections['cnt']['index'] - $this->_sections['cnt']['step'];
$this->_sections['cnt']['index_next'] = $this->_sections['cnt']['index'] + $this->_sections['cnt']['step'];
$this->_sections['cnt']['first']      = ($this->_sections['cnt']['iteration'] == 1);
$this->_sections['cnt']['last']       = ($this->_sections['cnt']['iteration'] == $this->_sections['cnt']['total']);
?>
                <!--▼メール -->
                <div class="arrowBox">
                    <p>配信日：<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_arrMailHistory'][$this->_sections['cnt']['index']]['send_date'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfDispDBDate', true, $_tmp) : SC_Utils_Ex::sfDispDBDate($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
<br />
                        <?php $this->assign('key', ($this->_tpl_vars['tpl_arrMailHistory'][$this->_sections['cnt']['index']]['template_id'])); ?>
                        通知メール：<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrMAILTEMPLATE'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</p>
                    <p><a href="javascript:;" onclick="getMailDetail(<?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_arrMailHistory'][$this->_sections['cnt']['index']]['send_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
)" rel="external"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_arrMailHistory'][$this->_sections['cnt']['index']]['subject'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</a></p>
                </div>
                <!--▲メール -->
            <?php endfor; endif; ?>
        </div><!-- /.formBox -->
        <!--▲メール一覧 -->

        <p><a rel="external" class="btn_more" href="./<?php echo ((is_array($_tmp=@DIR_INDEX_PATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
">購入履歴一覧に戻る</a></p>

    </div><!-- /.form_area -->

</section>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'frontparts/search_area.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<script>
    function getMailDetail(send_id) {
        eccube.showLoading();
        $.ajax({
            type: "GET",
            url: "<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
mypage/mail_view.php",
            data: "mode=getDetail&send_id=" + send_id,
            cache: false,
            dataType: "json",
            error: function(XMLHttpRequest, textStatus, errorThrown){
                alert(textStatus);
                eccube.hideLoading();
            },
            success: function(result){
                var dialog = $("#mail-dialog");

                //件名をセット
                $("#mail-dialog-title").remove();
                dialog.find(".dialog-content").append(
                    $('<h3 id="mail-dialog-title">').text(result[0].subject)
                );

                //本文をセット
                $("#mail-dialog-body").remove();
                dialog.find(".dialog-content").append(
                    $('<div id="mail-dialog-body">')
                        .html(result[0].mail_body.replace(/\n/g,"<br />"))
                        .css('font-family', 'monospace')
                );

                //ダイアログをモーダルウィンドウで表示
                $.colorbox({inline: true, href: dialog, onOpen: function(){
                    dialog.show().css('width', String($('body').width() * 0.9) + 'px');
                }, onComplete: function(){
                    eccube.hideLoading();
                }, onClosed: function(){
                    dialog.hide();
                }});
            }
        });
    }
</script>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => (@SMARTPHONE_TEMPLATE_REALDIR)."frontparts/dialog_modal.tpl", 'smarty_include_vars' => array('dialog_id' => "mail-dialog",'dialog_title' => "メール詳細")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>