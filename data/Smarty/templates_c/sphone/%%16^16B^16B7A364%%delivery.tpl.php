<?php /* Smarty version 2.6.27, created on 2015-10-06 16:10:32
         compiled from /home/vuser/3/8/0211283/www.sbadi.jp/ectest/html/../data/Smarty/templates/sphone/mypage/delivery.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', '/home/vuser/3/8/0211283/www.sbadi.jp/ectest/html/../data/Smarty/templates/sphone/mypage/delivery.tpl', 26, false),array('modifier', 'h', '/home/vuser/3/8/0211283/www.sbadi.jp/ectest/html/../data/Smarty/templates/sphone/mypage/delivery.tpl', 26, false),)), $this); ?>

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
    <!--★インフォメーション★-->
    <div class="information">
        <p>登録住所一覧です。<p>
        <p>最大<?php echo ((is_array($_tmp=((is_array($_tmp=@DELIV_ADDR_MAX)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
件まで登録できます。</p>
    </div>
    <?php if (((is_array($_tmp=$this->_tpl_vars['tpl_linemax'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) < ((is_array($_tmp=@DELIV_ADDR_MAX)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                <?php if (((is_array($_tmp=$this->_tpl_vars['tpl_login'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
            <!--★ボタン★-->
            <div class="btn_area_top">
                <a href="<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
mypage/delivery_addr.php" class="btn_sub addbtn" rel="external" target="_blank">新しいお届け先を追加</a>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <div class="form_area">
        <?php if (((is_array($_tmp=$this->_tpl_vars['tpl_linemax'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) > 0): ?>
            <form name="form1" id="form1" method="post" action="<?php echo ((is_array($_tmp=@HTTPS_URL)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
mypage/delivery.php" >
                <input type="hidden" name="<?php echo ((is_array($_tmp=@TRANSACTION_ID_NAME)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['transactionid'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
                <input type="hidden" name="mode" value="" />
                <input type="hidden" name="other_deliv_id" value="" />
                <input type="hidden" name="pageno" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_pageno'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />

                <!--▼フォームボックスここから -->
                <div class="formBox">

                    <?php unset($this->_sections['cnt']);
$this->_sections['cnt']['name'] = 'cnt';
$this->_sections['cnt']['loop'] = is_array($_loop=((is_array($_tmp=$this->_tpl_vars['arrOtherDeliv'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['cnt']['max'] = (int)((is_array($_tmp=$this->_tpl_vars['dispNumber'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp));
$this->_sections['cnt']['show'] = true;
if ($this->_sections['cnt']['max'] < 0)
    $this->_sections['cnt']['max'] = $this->_sections['cnt']['loop'];
$this->_sections['cnt']['step'] = 1;
$this->_sections['cnt']['start'] = $this->_sections['cnt']['step'] > 0 ? 0 : $this->_sections['cnt']['loop']-1;
if ($this->_sections['cnt']['show']) {
    $this->_sections['cnt']['total'] = min(ceil(($this->_sections['cnt']['step'] > 0 ? $this->_sections['cnt']['loop'] - $this->_sections['cnt']['start'] : $this->_sections['cnt']['start']+1)/abs($this->_sections['cnt']['step'])), $this->_sections['cnt']['max']);
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
                        <!--▼お届け先 -->
                        <div class="delivBox">
                            <?php $this->assign('OtherPref', ($this->_tpl_vars['arrOtherDeliv'][$this->_sections['cnt']['index']]['pref'])); ?>
                            <p><em><span class="zip_title">お届け先住所<?php echo ((is_array($_tmp=$this->_sections['cnt']['iteration'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span></em>：<br />
                                〒<span class="zip01"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrOtherDeliv'][$this->_sections['cnt']['index']]['zip01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>-<span class="zip02"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrOtherDeliv'][$this->_sections['cnt']['index']]['zip02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span><br />
                                <span class="address"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrPref'][$this->_tpl_vars['OtherPref']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrOtherDeliv'][$this->_sections['cnt']['index']]['addr01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrOtherDeliv'][$this->_sections['cnt']['index']]['addr02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</span><br />
                                <span class="name01"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrOtherDeliv'][$this->_sections['cnt']['index']]['name01'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</span>&nbsp;<span class="name02"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrOtherDeliv'][$this->_sections['cnt']['index']]['name02'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</span></p>

                            <ul class="edit">
                                <li><a href="#" onClick="eccube.openWindow('./delivery_addr.php?other_deliv_id=<?php echo ((is_array($_tmp=$this->_tpl_vars['arrOtherDeliv'][$this->_sections['cnt']['index']]['other_deliv_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
','deliv_disp','600','640'); return false;" class="b_edit deliv_edit" rel="external">編集</a></li>
                                <li><a href="#" onClick="eccube.setModeAndSubmit('delete','other_deliv_id','<?php echo ((is_array($_tmp=$this->_tpl_vars['arrOtherDeliv'][$this->_sections['cnt']['index']]['other_deliv_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
'); return false;" class="deliv_delete" rel="external"><img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
img/button/btn_delete.png" class="pointer" width="21" height="20" alt="削除" /></a></li>
                            </ul>
                        </div>
                        <!--▲お届け先-->
                    <?php endfor; endif; ?>

                </div><!--▲formBox -->
            </form>
        <?php else: ?>
            <p class="delivempty"><strong>新しいお届け先はありません。</strong></p>
        <?php endif; ?>

        <?php if (count ( ((is_array($_tmp=$this->_tpl_vars['arrOtherDeliv'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) ) > ((is_array($_tmp=$this->_tpl_vars['dispNumber'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
            <p><a rel="external" href="javascript: void(0);" class="btn_more" id="btn_more_delivery" onClick="getDelivery(<?php echo ((is_array($_tmp=$this->_tpl_vars['dispNumber'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
); return false;" rel="external">もっとみる(＋<?php echo ((is_array($_tmp=$this->_tpl_vars['dispNumber'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
件)</a></p>
        <?php endif; ?>

    </div><!-- /.form_area -->
</section>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'frontparts/search_area.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<script>
    var pageNo = 2;

    function getDelivery(limit) {
        eccube.showLoading();
        var i = limit;
        //送信データを準備
        var postData = {};
        $('#form1').find(':input').each(function(){
            postData[$(this).attr('name')] = $(this).val();
        });
        postData["mode"] = "getList";
        postData["pageno"] = pageNo;
        postData["disp_number"] = i;

        $.ajax({
            type: "POST",
            url: "<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
mypage/delivery.php",
            data: postData,
            cache: false,
            dataType: "json",
            error: function(XMLHttpRequest, textStatus, errorThrown){
                alert(textStatus);
                eccube.hideLoading();
            },
            success: function(result){
                var count = ((pageNo - 1) * i + 1); //お届け先住所の番号
                for (var j = 0; j < i; j++) {
                    if (result[j] != null) {
                        var delivery = result[j];
                        var deliveryHtml = "";
                        var maxCnt = $(".delivBox").length - 1;
                        var deliveryEl = $(".delivBox").get(maxCnt);
                        deliveryEl = $(deliveryEl).clone(true).insertAfter(deliveryEl);
                        maxCnt++;

                        //住所タイトルをセット
                        $($(".delivBox span.zip_title").get(maxCnt)).text('お届け先住所' + count);
                        //郵便番号1をセット
                        $($(".delivBox span.zip01").get(maxCnt)).text(delivery.zip01);
                        //郵便番号2をセット
                        $($(".delivBox span.zip02").get(maxCnt)).text(delivery.zip02);
                        //住所をセット
                        $($(".delivBox span.address").get(maxCnt)).text(delivery.prefname + delivery.addr01 + delivery.addr02);
                        //姓をセット
                        $($(".delivBox span.name01").get(maxCnt)).text(delivery.name01);
                        //名前をセット
                        $($(".delivBox span.name02").get(maxCnt)).text(delivery.name02);
                        //編集ボタンをセット
                        $($(".delivBox a.deliv_edit").get(maxCnt)).attr("onClick", "eccube.openWindow('./delivery_addr.php?other_deliv_id=" + delivery.other_deliv_id + "','deliv_disp','600','640'); return false;");
                        //削除ボタンをセット
                        $($(".delivBox a.deliv_delete").get(maxCnt)).attr("onClick", "eccube.setModeAndSubmit('delete','other_deliv_id','" + delivery.other_deliv_id + "'); return false;");
                        count++;
                    }
                }
                pageNo++;

                //全てのお届け先を表示したか判定
                if (parseInt(result.delivCount) <= $(".delivBox").length) {
                    $("#btn_more_delivery").hide();
                }
                eccube.hideLoading();
            }
        });
    }
</script>