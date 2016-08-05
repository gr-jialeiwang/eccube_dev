<!--{*
/*
 * Copyright(c) 2011 TELECOMCREDIT. All Rights Reserved.
 *
 */
*}-->
<!--　-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="content-script-type" content="text/javascript" />
<meta http-equiv="content-style-type" content="text/css" />
<link rel="stylesheet" href="<!--{$smarty.const.ROOT_URLPATH}--><!--{$smarty.const.USER_DIR}--><!--{$smarty.const.USER_PACKAGE_DIR}-->admin/css/admin_contents.css" type="text/css" media="all" />
<script type="text/javascript" src="<!--{$smarty.const.ROOT_URLPATH}-->js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="<!--{$smarty.const.ROOT_URLPATH}-->js/eccube.js"></script>
<script type="text/javascript" src="<!--{$TPL_URLPATH}-->js/eccube.admin.js"></script>

<!-- #2342 次期メジャーバージョン(2.14)にてeccube.legacy.js,eccube.admin.legacy.jsは削除予定.モジュール、プラグインの互換性を考慮して2.13では残します. -->
<script type="text/javascript" src="<!--{$smarty.const.ROOT_URLPATH}-->js/eccube.legacy.js"></script>
<script type="text/javascript" src="<!--{$TPL_URLPATH}-->js/eccube.admin.legacy.js"></script>

<!--{include file='css/contents.tpl'}-->
<title><!--{$tpl_subtitle}--></title>
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

<body bgcolor="#ffffff" text="#666666" link="#007bb7" vlink="#007bb7" alink="#cc0000" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onload='lfnCheckPayment(); <!--{$tpl_onload}-->'>
<noscript>
<link rel="stylesheet" href="<!--{$smarty.const.ROOT_URLPATH}--><!--{$smarty.const.USER_DIR}-->css/common.css" type="text/css" />
</noscript>

<div>
<!--★★メインコンテンツ★★-->
<table width="500" border="0" cellspacing="0" cellpadding="0" summary=" ">
<form name="form1" id="form1" method="post" action="<!--{$smarty.server.REQUEST_URI|escape}-->">
<input type="hidden" name="mode" value="edit">

<tr valign="top">
<td class="mainbg">

<!--▼登録テーブルここから-->
<div id="basis" class="contents-main">

    <h2><!--{$tpl_subtitle}--></h2>

	<table>
		<tr class="fs14n">
			<td bgcolor="#ffffff">
				<!--{$smarty.const.MDL_TELECOMCREDIT_NAME}-->をご利用頂く為には、<!--{$smarty.const.TELECOMCREDIT_PRODUCT_NAME}-->とご契約を行って頂く必要があります。 <br/>
				お申込につきましては、下記までお問合せください。<br /><br />
	                                       TEL：<!--{$smarty.const.MDL_TELECOMCREDIT_TEL}--><br />
	                                       Mail：<a href="mailto:<!--{$smarty.const.MDL_TELECOMCREDIT_MAIL}-->"><!--{$smarty.const.MDL_TELECOMCREDIT_MAIL}--></a><br />
			</td>
		</tr>
	</table><br>

    <h3>決済データ送信先URL</h3>
	<span class="red fs14n"><!--{$smarty.const.TELECOMCREDIT_PRODUCT_NAME}-->より送られる設定依頼書に記載するURLは下記となりますのでご確認下さい。</span>

    <table id="basis-index-holiday">
        <tr>
            <th>都度決済</th>
            <td><!--{$smarty.const.HTTP_URL}-->user_data/telecomcredit_recv.php</td>
        </tr>
        <tr>
            <th>スピード決済</th>
            <td><!--{$smarty.const.HTTP_URL}-->user_data/telecomcredit_recv.php</td>
        </tr>
    </table><br>

    <h3>上書きファイルパス</h3>
	<span class="red fs14n">別の決済モジュールをインストールしている、又は独自のカスタマイズを行っている場合は上書きされるファイルにご注意下さい。</span>

    <table id="basis-index-holiday">
        <tr>
            <td><!--{$smarty.const.CLASS_EX_REALDIR}-->page_extends/shopping/LC_Page_Shopping_Payment_Ex.php</td>
        </tr>
    </table><br>

    <h3>決済データ登録</h3>

    <table summary="登録情報" id="basis-index-basis">
        <tr>
            <th>利用決済<span class="attention"> *</span></th>
            <td>
				<!--{assign var=key value="payment"}-->
				<span class="attention"><!--{$arrErr[$key]}--></span>
				<!--{assign var=key value="credit"}-->
                <input type="checkbox" name="payment[]" value="<!--{$smarty.const.TELECOMCREDIT_SSL_CODE}-->" style="" <!--{if $arrForm[$key].value != ""}-->checked<!--{/if}--> onclick="lfnCheckPayment();" /><label>クレジットカード決済のみ利用</label><br />
                <!--{assign var=key value="speed"}-->
                <input type="checkbox" name="payment[]" value="<!--{$smarty.const.TELECOMCREDIT_SPEED_CODE}-->" style="" <!--{if $arrForm[$key].value != ""}-->checked<!--{/if}--> onclick="lfnCheckPayment();" /><label>クレジットカード決済 + クレジットカード決済（２回目以降 クレジット情報入力不要）</label>
            </td>
        </tr>
        <tr>
            <th>クライアントIP<span class="attention"> *</span></th>
            <td>
				<!--{assign var=key value="client_ip"}-->
				<span class="attention"><!--{$arrErr[$key]}--></span>
				<input type="text" name="<!--{$key}-->" style="ime-mode:disabled; <!--{$arrErr[$key]|sfGetErrorColor}-->" value="<!--{$arrForm[$key].value}-->" class="box6" maxlength="5">            </td>
		</tr>
	</table>

	<div class="btn-area">
		<ul>
			<li><a class="btn-action" href="javascript:;" onclick="eccube.fnFormModeSubmit('form1', 'edit', '', ''); return false;"><span class="btn-next">この内容で登録する</span></a></li>
		</ul>
	</div>
</div>
<!--{* ▲登録テーブルここまで *}-->

</td>
</tr>
</form>
</table>
<!--★★メインコンテンツ★★-->
</div>
<!--{$response}-->
</body>
</html>