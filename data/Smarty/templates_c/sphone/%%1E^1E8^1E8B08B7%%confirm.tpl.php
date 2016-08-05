<?php /* Smarty version 2.6.27, created on 2015-09-01 16:09:38
         compiled from /home/vuser/3/8/0211283/www.sbadi.jp/ectest/html/../data/Smarty/templates/sphone/shopping/confirm.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', '/home/vuser/3/8/0211283/www.sbadi.jp/ectest/html/../data/Smarty/templates/sphone/shopping/confirm.tpl', 41, false),array('modifier', 'h', '/home/vuser/3/8/0211283/www.sbadi.jp/ectest/html/../data/Smarty/templates/sphone/shopping/confirm.tpl', 77, false),array('modifier', 'sfNoImageMainList', '/home/vuser/3/8/0211283/www.sbadi.jp/ectest/html/../data/Smarty/templates/sphone/shopping/confirm.tpl', 100, false),array('modifier', 'n2s', '/home/vuser/3/8/0211283/www.sbadi.jp/ectest/html/../data/Smarty/templates/sphone/shopping/confirm.tpl', 113, false),array('modifier', 'default', '/home/vuser/3/8/0211283/www.sbadi.jp/ectest/html/../data/Smarty/templates/sphone/shopping/confirm.tpl', 129, false),array('modifier', 'regex_replace', '/home/vuser/3/8/0211283/www.sbadi.jp/ectest/html/../data/Smarty/templates/sphone/shopping/confirm.tpl', 186, false),array('modifier', 'strlen', '/home/vuser/3/8/0211283/www.sbadi.jp/ectest/html/../data/Smarty/templates/sphone/shopping/confirm.tpl', 230, false),array('modifier', 'nl2br', '/home/vuser/3/8/0211283/www.sbadi.jp/ectest/html/../data/Smarty/templates/sphone/shopping/confirm.tpl', 279, false),)), $this); ?>

<script>//<![CDATA[
    var sent = false;

    function fnCheckSubmit() {
        if (sent) {
            alert("只今、処理中です。しばらくお待ち下さい。");
            return false;
        }
        sent = true;
        return true;
    }

    //ご注文内容エリアの表示/非表示
    var speed = 1000; //表示アニメのスピード（ミリ秒）
    var stateCartconfirm = 0;
    function fnCartconfirmToggle(areaEl, imgEl) {
        areaEl.toggle(speed);
        if (stateCartconfirm == 0) {
            $(imgEl).attr("src", "<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/button/btn_plus.png");
            stateCartconfirm = 1;
        } else {
            $(imgEl).attr("src", "<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/button/btn_minus.png");
            stateCartconfirm = 0
        }
    }
    //お届け先エリアの表示/非表示
    var stateDelivconfirm = 0;
    function fnDelivconfirmToggle(areaEl, imgEl) {
        areaEl.toggle(speed);
        if (stateDelivconfirm == 0) {
            $(imgEl).attr("src", "<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/button/btn_plus.png");
            stateDelivconfirm = 1;
        } else {
            $(imgEl).attr("src", "<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/button/btn_minus.png");
            stateDelivconfirm = 0
        }
    }
    //配送方法エリアの表示/非表示
    var stateOtherconfirm = 0;
    function fnOtherconfirmToggle(areaEl, imgEl) {
        areaEl.toggle(speed);
        if (stateOtherconfirm == 0) {
            $(imgEl).attr("src", "<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/button/btn_plus.png");
            stateOtherconfirm = 1;
        } else {
            $(imgEl).attr("src", "<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/button/btn_minus.png");
            stateOtherconfirm = 0
        }
    }
//]]></script>

<!--▼コンテンツここから -->
<section id="undercolumn">

    <h2 class="title"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_title'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</h2>

    <!--★インフォメーション★-->
    <div class="information end">
        <p>下記ご注文内容でよろしければ、「ご注文完了ページへ」ボタンをクリックしてください。</p>
    </div>

    <form name="form1" id="form1" method="post" action="<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
shopping/confirm.php">
        <input type="hidden" name="<?php echo ((is_array($_tmp=@TRANSACTION_ID_NAME)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['transactionid'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
        <input type="hidden" name="mode" value="confirm" />
        <input type="hidden" name="uniqid" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_uniqid'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />

        <h3 class="subtitle">ご注文内容</h3>

        <section class="cartconfirm_area">
            <div class="form_area">
                <!--▼フォームボックスここから -->
                <div class="formBox">
                    <!--▼カートの中の商品一覧 -->
                    <div class="cartcartconfirmarea">
                        <?php $_from = ((is_array($_tmp=$this->_tpl_vars['arrCartItems'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
                            <!--▼商品 -->
                            <div class="cartconfirmBox">
                                <img src="<?php echo ((is_array($_tmp=@IMAGE_SAVE_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['main_list_image'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfNoImageMainList', true, $_tmp) : SC_Utils_Ex::sfNoImageMainList($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" style="max-width: 80px;max-height: 80px;" alt="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" class="photoL" />
                                <div class="cartconfirmContents">
                                    <div>
                                        <p><em><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</em><br />
                                        <?php if (((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['classcategory_name1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ""): ?>
                                                <span class="mini"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['class_name1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
：<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['classcategory_name1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</span><br />
                                        <?php endif; ?>
                                        <?php if (((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['classcategory_name2'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ""): ?>
                                                <span class="mini"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['class_name2'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
：<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['classcategory_name2'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</span>
                                        <?php endif; ?>
                                        </p>
                                    </div>
                                    <ul>
                                        <li><span class="mini">数量：</span><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['quantity'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)); ?>
</li>
                                        <li class="result"><span class="mini">小計：</span><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['total_inctax'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)); ?>
円</li>
                                    </ul>
                                </div>
                            </div>
                            <!--▲商品 -->
                        <?php endforeach; endif; unset($_from); ?>
                    </div>
                    <!--▲カートの中の商品一覧 -->

                    <!--★合計内訳★-->
                    <div class="result_area">
                        <ul>
                            <li><span class="mini">小計 ：</span><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_total_inctax'][$this->_tpl_vars['cartKey']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)); ?>
 円</li>
                            <?php if (((is_array($_tmp=@USE_POINT)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) !== false): ?>
                                <li><span class="mini">値引き（ポイントご使用時）： </span><?php $this->assign('discount', ($this->_tpl_vars['arrForm']['use_point']*@POINT_VALUE)); ?>
                                -<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['discount'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
 円</li>
                            <?php endif; ?>
                            <li><span class="mini">送料 ：</span><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['deliv_fee'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)); ?>
 円</li>
                            <li><span class="mini">手数料 ：</span><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['charge'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)); ?>
 円</li>
                        </ul>
                    </div>

                    <!--★合計★-->
                    <div class="total_area">
                        <span class="mini">合計：</span><span class="price fb"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['payment_total'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)); ?>
 円</span>
                    </div>
                </div><!-- /.formBox -->

                                <?php if (((is_array($_tmp=$this->_tpl_vars['tpl_login'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) == 1 && ((is_array($_tmp=@USE_POINT)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) !== false): ?>
                    <!--★ポイント情報★-->
                    <div class="formBox point_confifrm">
                        <dl>
                            <dt>ご注文前のポイント</dt><dd><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_user_point'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
Pt</dd>
                        </dl>
                        <dl>
                            <dt>ご使用ポイント</dt><dd>-<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['use_point'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
Pt</dd>
                        </dl>
                        <?php if (((is_array($_tmp=$this->_tpl_vars['arrForm']['birth_point'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) > 0): ?>
                        <dl>
                            <dt>お誕生月ポイント</dt><dd>+<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['birth_point'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
Pt</dd>
                        </dl>
                        <?php endif; ?>
                        <dl>
                            <dt>今回加算予定のポイント</dt><dd>+<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['add_point'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
Pt</dd>
                        </dl>
                        <dl>
                            <?php $this->assign('total_point', ($this->_tpl_vars['tpl_user_point']-$this->_tpl_vars['arrForm']['use_point']+$this->_tpl_vars['arrForm']['add_point'])); ?>
                            <dt>加算後のポイント</dt><dd><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['total_point'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)); ?>
Pt</dd>
                        </dl>
                    </div><!-- /.formBox -->
                <?php endif; ?>
            </div><!-- /.form_area -->
        </section>

        <!--★注文者の確認★-->
        <section class="customerconfirm_area">
        <h3 class="subtitle">ご注文者</h3>
        <div class="form_area">
        <div class="formBox">
            <dl class="customer_confirm">
                <dd>
                    <p>〒<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['order_zip01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
-<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['order_zip02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
<br />
                        <?php echo ((is_array($_tmp=$this->_tpl_vars['arrPref'][$this->_tpl_vars['arrForm']['order_pref']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['order_addr01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['order_addr02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</p>
                    <p class="deliv_name"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['order_name01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
 <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['order_name02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</p>
                    <p><?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm']['order_tel01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm']['order_tel02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm']['order_tel03'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</p>
                    <?php if (((is_array($_tmp=$this->_tpl_vars['arrForm']['order_fax01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) > 0): ?>
                        <p><?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm']['order_fax01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm']['order_fax02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm']['order_fax03'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</p>
                    <?php endif; ?>
                    <p><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['order_email'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</p>
                    <p>性別：<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrSex'][$this->_tpl_vars['arrForm']['order_sex']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</p>
                    <p>職業：<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrJob'][$this->_tpl_vars['arrForm']['order_job']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, '(未登録)') : smarty_modifier_default($_tmp, '(未登録)')))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</p>
                    <p>生年月日：<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['order_birth'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/ .+/", "") : smarty_modifier_regex_replace($_tmp, "/ .+/", "")))) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/-/", "/") : smarty_modifier_regex_replace($_tmp, "/-/", "/")))) ? $this->_run_mod_handler('default', true, $_tmp, '(未登録)') : smarty_modifier_default($_tmp, '(未登録)')))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</p>
                </dd>
            </dl>
        </div>
        </div>
        </section>

        <!--★お届け先の確認★-->
        <?php if (((is_array($_tmp=$this->_tpl_vars['arrShipping'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
            <section class="delivconfirm_area">
                <h3 class="subtitle">お届け先</h3>

                <div class="form_area">

                    <?php $_from = ((is_array($_tmp=$this->_tpl_vars['arrShipping'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['shippingItem'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['shippingItem']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['shippingItem']):
        $this->_foreach['shippingItem']['iteration']++;
?>
                        <!--▼フォームボックスここから -->
                        <div class="formBox">
                            <dl class="deliv_confirm">
                                <dt>お届け先<?php if (((is_array($_tmp=$this->_tpl_vars['is_multiple'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?><?php echo ((is_array($_tmp=$this->_foreach['shippingItem']['iteration'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php endif; ?></dt>
                                <dd>
                                    <p>〒<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['shippingItem']['shipping_zip01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
-<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['shippingItem']['shipping_zip02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
<br />
                                        <?php echo ((is_array($_tmp=$this->_tpl_vars['arrPref'][$this->_tpl_vars['shippingItem']['shipping_pref']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['shippingItem']['shipping_addr01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['shippingItem']['shipping_addr02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</p>
                                    <p class="deliv_name"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['shippingItem']['shipping_name01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
 <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['shippingItem']['shipping_name02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</p>
                                    <p><?php echo ((is_array($_tmp=$this->_tpl_vars['shippingItem']['shipping_tel01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['shippingItem']['shipping_tel02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['shippingItem']['shipping_tel03'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</p>
                                    <?php if (((is_array($_tmp=$this->_tpl_vars['shippingItem']['shipping_fax01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) > 0): ?>
                                        <p><?php echo ((is_array($_tmp=$this->_tpl_vars['shippingItem']['shipping_fax01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['shippingItem']['shipping_fax02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['shippingItem']['shipping_fax03'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</p>
                                    <?php endif; ?>
                                </dd>
                                <?php if (((is_array($_tmp=$this->_tpl_vars['cartKey'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ((is_array($_tmp=@PRODUCT_TYPE_DOWNLOAD)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                                    <dd>
                                        <ul class="date_confirm">
                                            <li><em>お届け日：</em><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['shippingItem']['shipping_date'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, "指定なし") : smarty_modifier_default($_tmp, "指定なし")))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</li>
                                            <li><em>お届け時間：</em><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['shippingItem']['shipping_time'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, "指定なし") : smarty_modifier_default($_tmp, "指定なし")))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</li>
                                        </ul>
                                    </dd>
                                <?php endif; ?>
                            </dl>

                            <?php if (((is_array($_tmp=$this->_tpl_vars['is_multiple'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                                <!--▼カートの中の商品一覧 -->
                                <div class="cartcartconfirmarea">
                                    <?php $_from = ((is_array($_tmp=$this->_tpl_vars['shippingItem']['shipment_item'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
                                        <!--▼商品 -->
                                        <div class="cartconfirmBox">
                                            <?php if (((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['main_image'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('strlen', true, $_tmp) : strlen($_tmp)) >= 1): ?>
                                                <a href="<?php echo ((is_array($_tmp=@IMAGE_SAVE_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['main_image'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfNoImageMainList', true, $_tmp) : SC_Utils_Ex::sfNoImageMainList($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" target="_blank">
                                                    <img src="<?php echo ((is_array($_tmp=@IMAGE_SAVE_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['main_list_image'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfNoImageMainList', true, $_tmp) : SC_Utils_Ex::sfNoImageMainList($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" style="max-width: 80px;max-height: 80px;" alt="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" class="photoL" /></a>
                                            <?php else: ?>
                                                <img src="<?php echo ((is_array($_tmp=@IMAGE_SAVE_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['main_list_image'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfNoImageMainList', true, $_tmp) : SC_Utils_Ex::sfNoImageMainList($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" style="max-width: 80px;max-height: 80px;" alt="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" class="photoL" />
                                            <?php endif; ?>
                                            <div class="cartconfirmContents">
                                                <p>
                                                    <em><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</em><br />
                                                    <?php if (((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['classcategory_name1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ""): ?>
                                                            <span class="mini"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['class_name1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
：<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['classcategory_name1'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span><br />
                                                    <?php endif; ?>
                                                    <?php if (((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['classcategory_name2'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ""): ?>
                                                            <span class="mini"><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['class_name2'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
：<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['productsClass']['classcategory_name2'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
                                                    <?php endif; ?>
                                                </p>
                                                <ul>
                                                    <li><span class="mini">数量：</span><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['quantity'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</li>
                                                                                                        <li class="result"><span class="mini">小計：</span><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['total_inctax'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)); ?>
円</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!--▲商品 -->
                                    <?php endforeach; endif; unset($_from); ?>
                                </div>
                                <!--▲カートの中の商品一覧ここまで -->
                            <?php endif; ?>
                        </div><!-- /.formBox -->
                    <?php endforeach; endif; unset($_from); ?>
                </div><!-- /.form_area -->
            </section>
        <?php endif; ?>

        <!--★配送方法・お支払方法など★-->
        <section class="otherconfirm_area">
            <h3 class="subtitle">配送方法・お支払方法など</h3>

            <div class="form_area">
                <!--▼フォームボックスここから -->
                <div class="formBox">
                    <div class="innerBox">
                        <em>配送方法</em>：<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrDeliv'][$this->_tpl_vars['arrForm']['deliv_id']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>

                    </div>
                    <div class="innerBox">
                        <em>お支払方法：</em><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['payment_method'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>

                    </div>
                    <div class="innerBox">
                        <em>その他お問い合わせ：</em><br />
                        <?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrForm']['message'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>

                    </div>
                </div><!-- /.formBox -->
            </div><!-- /.form_area -->
        </section>

        <!--★ボタン★-->
        <div class="btn_area">
            <ul class="btn_btm">
                <?php if (((is_array($_tmp=$this->_tpl_vars['use_module'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                    <li><a rel="external" href="javascript:void(document.form1.submit());" class="btn">次へ</a></li>
                <?php else: ?>
                    <li><a rel="external" href="javascript:void(document.form1.submit());" class="btn">ご注文完了ページへ</a></li>
                <?php endif; ?>
                <li><a rel="external" href="./payment.php" class="btn_back">戻る</a></li>
            </ul>
        </div>

    </form>
</section>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'frontparts/search_area.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<!--▲コンテンツここまで -->