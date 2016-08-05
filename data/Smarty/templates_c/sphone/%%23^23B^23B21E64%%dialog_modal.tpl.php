<?php /* Smarty version 2.6.27, created on 2015-08-27 15:14:42
         compiled from /home/vuser/3/8/0211283/www.sbadi.jp/ectest/html/../data/Smarty/templates/sphone/frontparts/dialog_modal.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', '/home/vuser/3/8/0211283/www.sbadi.jp/ectest/html/../data/Smarty/templates/sphone/frontparts/dialog_modal.tpl', 1, false),)), $this); ?>
<div id="<?php echo ((is_array($_tmp=$this->_tpl_vars['dialog_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" class="dialog-modal">
    <div class="dialog-inner">
        <h2 class="title dialog-title"><?php echo ((is_array($_tmp=$this->_tpl_vars['dialog_title'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</h2>
        <div class="dialog-content"></div>
    </div>
</div>