<?php /* Smarty version 2.6.27, created on 2015-11-02 12:05:52
         compiled from /home/vuser/3/8/0211283/www.sbadi.jp/ectest/html/../data/Smarty/templates/sphone/frontparts/bloc/product_list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', '/home/vuser/3/8/0211283/www.sbadi.jp/ectest/html/../data/Smarty/templates/sphone/frontparts/bloc/product_list.tpl', 36, false),array('modifier', 'u', '/home/vuser/3/8/0211283/www.sbadi.jp/ectest/html/../data/Smarty/templates/sphone/frontparts/bloc/product_list.tpl', 43, false),array('modifier', 'sfNoImageMainList', '/home/vuser/3/8/0211283/www.sbadi.jp/ectest/html/../data/Smarty/templates/sphone/frontparts/bloc/product_list.tpl', 43, false),array('modifier', 'h', '/home/vuser/3/8/0211283/www.sbadi.jp/ectest/html/../data/Smarty/templates/sphone/frontparts/bloc/product_list.tpl', 43, false),)), $this); ?>
﻿<style type="text/css">
div#productlist_area h2 {
    background-color:#de5e17;
    text-align:center;
    color:#fff;
    padding:7px 0 7px 0;
}
div#productlist_area div.productImage {
    float:left;
    width:40px;
    padding:0 8px 0 0;
}
.bloc_body {
	width: 312px;
	padding: 10px 4px;
}
.product_item {
	width: 96px;
	height: 140px;
	float: left;
	margin: 0 4px 8px 4px;
	overflow: hidden;
	text-align: center;
}

.productImage {

}
.productImage img {
	width: 98px;
	height: auto;
	max-height: 140px;
}
</style>

<?php if (count ( ((is_array($_tmp=$this->_tpl_vars['arrProducts'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) ) > 0): ?>
        <section id="productlist_area" style="margin-top:-20px">
            <h2 class="title_block">新着商品</h2>
            <div class="bloc_body clearfix">
                <?php $_from = ((is_array($_tmp=$this->_tpl_vars['arrProducts'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['arrProduct']):
?>
                    <div class="product_item">
                        <div class="productImage">
                            <a href="<?php echo ((is_array($_tmp=@P_DETAIL_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrProduct']['product_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('u', true, $_tmp) : smarty_modifier_u($_tmp)); ?>
"><img src="<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
resize_image.php?image=<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrProduct']['main_list_image'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfNoImageMainList', true, $_tmp) : SC_Utils_Ex::sfNoImageMainList($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
&width=300&height=300" alt="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrProduct']['name'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
" /></a>
                        </div>
                    </div >
                </dl>
                <?php endforeach; endif; unset($_from); ?>
            </div>
        </section>
<?php endif; ?>
<script>
screenW = Math.min($(window).width(),$(window).height())
$(".bloc_body").css("zoom",screenW/320);
$(".bloc_body").css("margin", "0 auto");
</script>