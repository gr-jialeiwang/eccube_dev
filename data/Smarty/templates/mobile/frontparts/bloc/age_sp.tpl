<!--年齢認証-->

<link href="/ectest/html/user_data/css/style_sp.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="/ectest/html/user_data/js/jquery.cookie.js"></script>
<script type="text/javascript" src="/ectest/html/user_data/js/jquery.simplemodal.js"></script>
<script>
$(document).ready(function(){
	var over18 = jQuery.cookie('over18');
	if(over18 !== "Yes"){
		confirm();
	}
	$('.remove_cookie').click(function(){
		$.cookie('over18','',{ expires: 0 });
		location.reload();
	});
});

function confirm(){
	jQuery('#modal').modal({
		opacity:80,
		overlayCss:{backgroundColor:"#000"},
		containerId: 'confirm_modal',
		position: ["30px",],
		onShow: function(dialog){
			var modal = this;
			jQuery('.yes',dialog.data[0]).click(function(){
				var clifetime = new Date();
				clifetime.setTime(clifetime.getTime()+(2*60*60*1000));//2時間
				jQuery.cookie('over18','Yes',{ expires: clifetime });
				modal.close();
			});
		}
	});
}
</script>
<div id="modal">
	<p><img src="/ectest/html/user_data/img/18kin.jpg" alt=""></p>
	<p>ここから先は、<br>アダルト商品を取り扱う<br>ショッピングサイトとなります。<br>18歳未満の方のアクセスは<br>固くお断りいたします。<br><br>あなたは18歳以上ですか？</p>
	<ul>
		<li><a class="yes">Yes</a></li>
		<li><a class="no" href="http://www.terra-publications.co.jp/badi/badi_top.html">No</a></li>
	</ul>
</div>

<!--年齢認証-->