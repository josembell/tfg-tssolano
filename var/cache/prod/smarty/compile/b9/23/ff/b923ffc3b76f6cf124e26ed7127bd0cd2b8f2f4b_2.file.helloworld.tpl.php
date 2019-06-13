<?php
/* Smarty version 3.1.33, created on 2019-06-13 20:45:20
  from '/Applications/XAMPP/xamppfiles/htdocs/tfg-tssolano/modules/helloworld/helloworld.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d0299c0440d34_21103630',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b923ffc3b76f6cf124e26ed7127bd0cd2b8f2f4b' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/tfg-tssolano/modules/helloworld/helloworld.tpl',
      1 => 1560451481,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d0299c0440d34_21103630 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="helloworld_content">
    <?php if ($_smarty_tpl->tpl_vars['nombre']->value != '') {?>
        <p class="helloworld_hello">Hola, <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['nombre']->value, ENT_QUOTES, 'UTF-8');?>
</p>
        <p class="helloworld_descripcion">Bienvenido a Talleres y Suministros Solano.</p>
    <?php } else { ?>
        <p class="helloworld_hello">Hola.</p>
        <p class="helloworld_descripcion">Bienvenido a Talleres y Suministros Solano.</p>
    <?php }?>


</div><?php }
}
