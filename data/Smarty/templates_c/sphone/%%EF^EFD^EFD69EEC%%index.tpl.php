<?php /* Smarty version 2.6.27, created on 2015-08-31 18:13:11
         compiled from /home/vuser/3/8/0211283/www.sbadi.jp/ectest/html/../data/Smarty/templates/sphone/mypage/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', '/home/vuser/3/8/0211283/www.sbadi.jp/ectest/html/../data/Smarty/templates/sphone/mypage/index.tpl', 27, false),array('modifier', 'h', '/home/vuser/3/8/0211283/www.sbadi.jp/ectest/html/../data/Smarty/templates/sphone/mypage/index.tpl', 27, false),array('modifier', 'sfDispDBDate', '/home/vuser/3/8/0211283/www.sbadi.jp/ectest/html/../data/Smarty/templates/sphone/mypage/index.tpl', 56, false),array('modifier', 'n2s', '/home/vuser/3/8/0211283/www.sbadi.jp/ectest/html/../data/Smarty/templates/sphone/mypage/index.tpl', 58, false),)), $this); ?>

<section id="mypagecolumn">

    <h2 class="title"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_title'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</h2>
        <?php if (((is_array($_tmp=$this->_tpl_vars['tpl_navi'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ""): ?>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=$this->_tpl_vars['tpl_navi'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php else: ?>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => (@TEMPLATE_REALDIR)."mypage/navi.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php endif; ?>

        <form name="form1" id="form1" method="post" action="<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
mypage/index.php">
            <input type="hidden" name="<?php echo ((is_array($_tmp=@TRANSACTION_ID_NAME)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['transactionid'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
            <input type="hidden" name="order_id" value="" />
            <input type="hidden" name="pageno" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['objNavi']->nowpage)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />

            <h3 class="title_mypage"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_subtitle'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</h3>
            <?php if (((is_array($_tmp=$this->_tpl_vars['objNavi']->all_row)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) > 0): ?>

                <!--★インフォメーション★-->
                <div class="information">
                    <p><span class="attention"><span id="historycount"><?php echo ((is_array($_tmp=$this->_tpl_vars['objNavi']->all_row)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>件</span>の購入履歴があります。</p>
                </div>

                <div class="form_area">

                    <!--▼フォームボックスここから -->
                    <div class="formBox">
                        <?php unset($this->_sections['cnt']);
$this->_sections['cnt']['name'] = 'cnt';
$this->_sections['cnt']['loop'] = is_array($_loop=((is_array($_tmp=$this->_tpl_vars['arrOrder'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                            <!--▼商品 -->
                            <div class="arrowBox">
                                <p>
                                    <em>注文番号：</em><span class="order_id"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrOrder'][$this->_sections['cnt']['index']]['order_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php $this->assign('payment_id', ($this->_tpl_vars['arrOrder'][$this->_sections['cnt']['index']]['payment_id'])); ?></span><br />
                                    <em>購入日時：</em><span class="create_date"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrOrder'][$this->_sections['cnt']['index']]['create_date'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfDispDBDate', true, $_tmp) : SC_Utils_Ex::sfDispDBDate($_tmp)); ?>
</span><br />
                                    <em>お支払い方法：</em><span class="payment_id"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrPayment'][$this->_tpl_vars['payment_id']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</span><br />
                                    <em>合計金額：</em><span class="payment_total"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrOrder'][$this->_sections['cnt']['index']]['payment_total'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)); ?>
</span>円<br />
                                    <?php if (((is_array($_tmp=@MYPAGE_ORDER_STATUS_DISP_FLAG)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                                    <em>ご注文状況：</em>
                                        <?php $this->assign('order_status_id', ($this->_tpl_vars['arrOrder'][$this->_sections['cnt']['index']]['status'])); ?>
                                        <?php if (((is_array($_tmp=$this->_tpl_vars['order_status_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ((is_array($_tmp=@ORDER_PENDING)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                                        <span class="order_status"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrCustomerOrderStatus'][$this->_tpl_vars['order_status_id']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</span><br />
                                        <?php else: ?>
                                        <span class="order_status attention"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrCustomerOrderStatus'][$this->_tpl_vars['order_status_id']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</span><br />
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </p>
                                <a href="<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
mypage/history.php?order_id=<?php echo ((is_array($_tmp=$this->_tpl_vars['arrOrder'][$this->_sections['cnt']['index']]['order_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" rel="external"></a>
                            </div>
                            <!--▲商品 -->
                        <?php endfor; endif; ?>
                    </div><!-- /.formBox -->
                </div><!-- /.form_area-->
                <div class="btn_area">
                    <?php if (((is_array($_tmp=$this->_tpl_vars['objNavi']->all_row)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) > ((is_array($_tmp=$this->_tpl_vars['dispNumber'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                        <p><a href="javascript: void(0);" class="btn_more" id="btn_more_history" onClick="getHistory(<?php echo ((is_array($_tmp=$this->_tpl_vars['dispNumber'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
); return false;" rel="external">もっとみる(＋<?php echo ((is_array($_tmp=$this->_tpl_vars['dispNumber'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
件)</a></p>
                    <?php endif; ?>
                </div>
            <?php else: ?>
                <div class="form_area">
                    <div class="information">
                        <p>購入履歴はありません。</p>
                    </div>
                </div><!-- /.form_area-->
            <?php endif; ?>
        </form>
</section>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'frontparts/search_area.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<script>
    var pageNo = 2;
    var url = "<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
mypage/history.php";
    var statusImagePath = "<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
";
    var arrPayment = <?php echo ((is_array($_tmp=$this->_tpl_vars['json_payment'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>

    var arrCustomerOrderStatus = <?php echo ((is_array($_tmp=$this->_tpl_vars['json_customer_order_status'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>


    function getHistory(limit) {
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
mypage/index.php",
            data: postData,
            cache: false,
            dataType: "json",
            error: function(XMLHttpRequest, textStatus, errorThrown){
                alert(textStatus);
                eccube.hideLoading();
            },
            success: function(result){
                for (var j = 0; j < i; j++) {
                    if (result[j] != null) {
                        var history = result[j];
                        var historyHtml = "";
                        var maxCnt = $(".arrowBox").length - 1;
                        var historyEl = $(".arrowBox").get(maxCnt);
                        historyEl = $(historyEl).clone(true).insertAfter(historyEl);
                        maxCnt++;

                        var regex = new RegExp('([0-9]{2,4}).([0-9]{1,2}).([0-9]{1,2}).([0-9]{1,2}).([0-9]{1,2}).');
                        var matches = history.create_date.match(regex);
                        var formatted_date = history.create_date;
                        if(matches != null){
                            formatted_date = matches[1]+'/'+matches[2]+'/'+matches[3]+' '+matches[4]+':'+matches[5];
                        }

                        var formatted_payment_total = history.payment_total.toString().replace(/([0-9]+?)(?=(?:[0-9]{3})+$)/g , '$1,');

                        //注文番号をセット
                        $($(".arrowBox span.order_id").get(maxCnt)).text(history.order_id);
                        //購入日時をセット
                        $($(".arrowBox span.create_date").get(maxCnt)).text(formatted_date);
                        //支払い方法をセット
                        $($(".arrowBox span.payment_id").get(maxCnt)).text(arrPayment[history.payment_id]);
                        //合計金額をセット
                        $($(".arrowBox span.payment_total").get(maxCnt)).text(formatted_payment_total);
                        //履歴URLをセット
                        $($(".arrowBox a").get(maxCnt)).attr("href", url + "?order_id=" + history.order_id);
                        //注文状況をセット
                        $($(".arrowBox span.order_status").get(maxCnt)).text(arrCustomerOrderStatus[history.status]);
                    }
                }
                pageNo++;

                //全ての商品を表示したか判定
                if (parseInt($("#historycount").text()) <= $(".arrowBox").length) {
                    $("#btn_more_history").hide();
                }
                eccube.hideLoading();
            }
        });
    }
</script>