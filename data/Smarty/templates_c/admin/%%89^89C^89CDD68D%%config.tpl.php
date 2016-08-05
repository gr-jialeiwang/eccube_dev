<?php /* Smarty version 2.6.27, created on 2015-10-14 10:35:32
         compiled from /home/vuser/3/8/0211283/www.sbadi.jp/ectest/html/../data/downloads/module/mdl_telecom/config.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', '/home/vuser/3/8/0211283/www.sbadi.jp/ectest/html/../data/downloads/module/mdl_telecom/config.tpl', 15, false),array('modifier', 'escape', '/home/vuser/3/8/0211283/www.sbadi.jp/ectest/html/../data/downloads/module/mdl_telecom/config.tpl', 91, false),array('modifier', 'sfGetErrorColor', '/home/vuser/3/8/0211283/www.sbadi.jp/ectest/html/../data/downloads/module/mdl_telecom/config.tpl', 155, false),)), $this); ?>
<!--　-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="content-script-type" content="text/javascript" />
<meta http-equiv="content-style-type" content="text/css" />
<link rel="stylesheet" href="<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=@USER_DIR)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=@USER_PACKAGE_DIR)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
admin/css/admin_contents.css" type="text/css" media="all" />
<script type="text/javascript" src="<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
js/eccube.js"></script>
<script type="text/javascript" src="<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
js/eccube.admin.js"></script>

<!-- #2342 次期メジャーバージョン(2.14)にてeccube.legacy.js,eccube.admin.legacy.jsは削除予定.モジュール、プラグインの互換性を考慮して2.13では残します. -->
<script type="text/javascript" src="<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
js/eccube.legacy.js"></script>
<script type="text/javascript" src="<?php echo ((is_array($_tmp=$this->_tpl_vars['TPL_URLPATH'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
js/eccube.admin.legacy.js"></script>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'css/contents.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<title><?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_subtitle'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</title>
<script type="text/javascript">
<!--
self.moveTo(20,20);self.focus();

function lfnCheckPayment(){
	var fm = document.form1;
	var val = 0;

	payment = new Array('payment[]');

	for(pi = 0; pi < payment.length; pi++) {

		if(fm[payment[pi]][1].checked){
			fm[payment[pi]][0].checked = true;
		}

		list = new Array('client_ip');
		if(fm[payment[pi]][0].checked || fm[payment[pi]][1].checked){
			fnChangeDisabled(list, false);
		}else{
			fnChangeDisabled(list);
		}

	}
}

function fnChangeDisabled(list, disable) {
	len = list.length;

	if(disable == null) { disable = true; }

	for(i = 0; i < len; i++) {
		if(document.form1[list[i]]) {
			// ラジオボタン、チェックボックス等の配列に対応
			max = document.form1[list[i]].length
			if(max > 1) {
				for(j = 0; j < max; j++) {
					// 有効、無効の切り替え
					document.form1[list[i]][j].disabled = disable;
				}
			} else {
				// 有効、無効の切り替え
				document.form1[list[i]].disabled = disable;
			}
		}
	}
}

function win_open(URL){
	var WIN;
	WIN = window.open(URL);
	WIN.focus();
}
//-->
</script>
</head>

<body bgcolor="#ffffff" text="#666666" link="#007bb7" vlink="#007bb7" alink="#cc0000" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onload='lfnCheckPayment(); <?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_onload'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
'>
<noscript>
<link rel="stylesheet" href="<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=@USER_DIR)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
css/common.css" type="text/css" />
</noscript>

<div>
<!--★★メインコンテンツ★★-->
<table width="500" border="0" cellspacing="0" cellpadding="0" summary=" ">
<form name="form1" id="form1" method="post" action="<?php echo ((is_array($_tmp=((is_array($_tmp=$_SERVER['REQUEST_URI'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
<input type="hidden" name="mode" value="edit">

<tr valign="top">
<td class="mainbg">

<!--▼登録テーブルここから-->
<div id="basis" class="contents-main">

    <h2><?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_subtitle'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</h2>

	<table>
		<tr class="fs14n">
			<td bgcolor="#ffffff">
				<?php echo ((is_array($_tmp=@MDL_TELECOMCREDIT_NAME)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
をご利用頂く為には、<?php echo ((is_array($_tmp=@TELECOMCREDIT_PRODUCT_NAME)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
とご契約を行って頂く必要があります。 <br/>
				お申込につきましては、下記までお問合せください。<br /><br />
	                                       TEL：<?php echo ((is_array($_tmp=@MDL_TELECOMCREDIT_TEL)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<br />
	                                       Mail：<a href="mailto:<?php echo ((is_array($_tmp=@MDL_TELECOMCREDIT_MAIL)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=@MDL_TELECOMCREDIT_MAIL)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</a><br />
			</td>
		</tr>
	</table><br>

    <h3>決済データ送信先URL</h3>
	<span class="red fs14n"><?php echo ((is_array($_tmp=@TELECOMCREDIT_PRODUCT_NAME)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
より送られる設定依頼書に記載するURLは下記となりますのでご確認下さい。</span>

    <table id="basis-index-holiday">
        <tr>
            <th>都度決済</th>
            <td><?php echo ((is_array($_tmp=@HTTP_URL)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
user_data/telecomcredit_recv.php</td>
        </tr>
        <tr>
            <th>スピード決済</th>
            <td><?php echo ((is_array($_tmp=@HTTP_URL)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
user_data/telecomcredit_recv.php</td>
        </tr>
    </table><br>

    <h3>上書きファイルパス</h3>
	<span class="red fs14n">別の決済モジュールをインストールしている、又は独自のカスタマイズを行っている場合は上書きされるファイルにご注意下さい。</span>

    <table id="basis-index-holiday">
        <tr>
            <td><?php echo ((is_array($_tmp=@CLASS_EX_REALDIR)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
page_extends/shopping/LC_Page_Shopping_Payment_Ex.php</td>
        </tr>
    </table><br>

    <h3>決済データ登録</h3>

    <table summary="登録情報" id="basis-index-basis">
        <tr>
            <th>利用決済<span class="attention"> *</span></th>
            <td>
				<?php $this->assign('key', 'payment'); ?>
				<span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
				<?php $this->assign('key', 'credit'); ?>
                <input type="checkbox" name="payment[]" value="<?php echo ((is_array($_tmp=@TELECOMCREDIT_SSL_CODE)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="" <?php if (((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ""): ?>checked<?php endif; ?> onclick="lfnCheckPayment();" /><label>クレジットカード決済のみ利用</label><br />
                <?php $this->assign('key', 'speed'); ?>
                <input type="checkbox" name="payment[]" value="<?php echo ((is_array($_tmp=@TELECOMCREDIT_SPEED_CODE)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="" <?php if (((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ""): ?>checked<?php endif; ?> onclick="lfnCheckPayment();" /><label>クレジットカード決済 + クレジットカード決済（２回目以降 クレジット情報入力不要）</label>
            </td>
        </tr>
        <tr>
            <th>クライアントIP<span class="attention"> *</span></th>
            <td>
				<?php $this->assign('key', 'client_ip'); ?>
				<span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</span>
				<input type="text" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" style="ime-mode:disabled; <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrErr'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfGetErrorColor', true, $_tmp) : SC_Utils_Ex::sfGetErrorColor($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['arrForm'][$this->_tpl_vars['key']]['value'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" class="box6" maxlength="5">            </td>
		</tr>
	</table>

	<div class="btn-area">
		<ul>
			<li><a class="btn-action" href="javascript:;" onclick="eccube.fnFormModeSubmit('form1', 'edit', '', ''); return false;"><span class="btn-next">この内容で登録する</span></a></li>
		</ul>
	</div>
</div>

</td>
</tr>
</form>
</table>
<!--★★メインコンテンツ★★-->
</div>
<?php echo ((is_array($_tmp=$this->_tpl_vars['response'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>

</body>
</html>