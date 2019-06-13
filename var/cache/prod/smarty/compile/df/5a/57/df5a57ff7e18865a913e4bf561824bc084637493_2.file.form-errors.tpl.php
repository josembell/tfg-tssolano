<?php
/* Smarty version 3.1.33, created on 2019-06-13 20:45:26
  from '/Applications/XAMPP/xamppfiles/htdocs/tfg-tssolano/themes/classic/templates/_partials/form-errors.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d0299c6028426_13612326',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'df5a57ff7e18865a913e4bf561824bc084637493' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/tfg-tssolano/themes/classic/templates/_partials/form-errors.tpl',
      1 => 1559686799,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d0299c6028426_13612326 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
if (count($_smarty_tpl->tpl_vars['errors']->value)) {?>
  <div class="help-block">
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11653463615d0299c60267a0_20637669', 'form_errors');
?>

  </div>
<?php }
}
/* {block 'form_errors'} */
class Block_11653463615d0299c60267a0_20637669 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'form_errors' => 
  array (
    0 => 'Block_11653463615d0299c60267a0_20637669',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <ul>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['errors']->value, 'error');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['error']->value) {
?>
          <li class="alert alert-danger"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['error']->value, ENT_QUOTES, 'UTF-8');?>
</li>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </ul>
    <?php
}
}
/* {/block 'form_errors'} */
}
