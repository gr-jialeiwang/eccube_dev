<?php /* Smarty version 2.6.27, created on 2015-08-31 18:08:51
         compiled from /home/vuser/3/8/0211283/www.sbadi.jp/ectest/html/../data/Smarty/templates/sphone/entry/kiyaku.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', '/home/vuser/3/8/0211283/www.sbadi.jp/ectest/html/../data/Smarty/templates/sphone/entry/kiyaku.tpl', 24, false),array('modifier', 'h', '/home/vuser/3/8/0211283/www.sbadi.jp/ectest/html/../data/Smarty/templates/sphone/entry/kiyaku.tpl', 24, false),array('modifier', 'nl2br', '/home/vuser/3/8/0211283/www.sbadi.jp/ectest/html/../data/Smarty/templates/sphone/entry/kiyaku.tpl', 38, false),)), $this); ?>

<section id="undercolumn">
    <h2 class="title"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_title'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</h2>
    <div class="information">
        <p><span class="attention">【重要】 会員登録をされる前に、下記ご利用規約をよくお読みください。</span></p>
        <p>規約には、本サービスを使用するに当たってのあなたの権利と義務が規定されております。<br />
            「同意して会員登録へ」ボタン をクリックすると、あなたが本規約の全ての条件に同意したことになります。</p>
    </div>

    <div class="btn_area">
        <ul>
            <li><a href="<?php echo ((is_array($_tmp=@ENTRY_URL)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" class="btn" rel="external">同意して会員登録へ</a></li>
            <li><a href="<?php echo ((is_array($_tmp=@TOP_URL)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" class="btn_back" rel="external">同意しない</a></li>
        </ul>
    </div>

    <div id="kiyaku_text"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_kiyaku_text'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</div>

    <div class="btn_area">
        <ul class="btn_btm">
            <li><a href="<?php echo ((is_array($_tmp=@ENTRY_URL)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" class="btn" rel="external">同意して会員登録へ</a></li>
            <li><a href="<?php echo ((is_array($_tmp=@TOP_URL)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" class="btn_back" rel="external">同意しない</a></li>
        </ul>
    </div>
</section>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'frontparts/search_area.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
