<?php
/* Smarty version 3.1.33, created on 2019-06-15 19:41:28
  from '/Applications/XAMPP/xamppfiles/htdocs/tfg-tssolano/admin445mss9g5/themes/new-theme/template/components/layout/confirmation_messages.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d052dc8a4e125_28809698',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '40feaa8bb1ee0f81b41c6458660fae150793c275' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/tfg-tssolano/admin445mss9g5/themes/new-theme/template/components/layout/confirmation_messages.tpl',
      1 => 1559686787,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d052dc8a4e125_28809698 (Smarty_Internal_Template $_smarty_tpl) {
if (isset($_smarty_tpl->tpl_vars['confirmations']->value) && count($_smarty_tpl->tpl_vars['confirmations']->value) && $_smarty_tpl->tpl_vars['confirmations']->value) {?>
  <div class="bootstrap">
    <div class="alert alert-success" style="display:block;">
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['confirmations']->value, 'conf');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['conf']->value) {
?>
        <?php echo $_smarty_tpl->tpl_vars['conf']->value;?>

      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>
  </div>
<?php }
}
}
