<?php
/* Smarty version 3.1.33, created on 2019-06-13 20:45:20
  from '/Applications/XAMPP/xamppfiles/htdocs/tfg-tssolano/themes/classic/templates/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d0299c0609bb9_13336391',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '05bec690d20953979df765e346cd19fe0e24823e' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/tfg-tssolano/themes/classic/templates/index.tpl',
      1 => 1559686799,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d0299c0609bb9_13336391 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_21251256905d0299c0606423_40246488', 'page_content_container');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'page.tpl');
}
/* {block 'page_content_top'} */
class Block_4216414185d0299c0607040_00964836 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'page_content_top'} */
/* {block 'hook_home'} */
class Block_785806515d0299c06085d1_37172470 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

            <?php echo $_smarty_tpl->tpl_vars['HOOK_HOME']->value;?>

          <?php
}
}
/* {/block 'hook_home'} */
/* {block 'page_content'} */
class Block_13185773605d0299c0607d41_18966407 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_785806515d0299c06085d1_37172470', 'hook_home', $this->tplIndex);
?>

        <?php
}
}
/* {/block 'page_content'} */
/* {block 'page_content_container'} */
class Block_21251256905d0299c0606423_40246488 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page_content_container' => 
  array (
    0 => 'Block_21251256905d0299c0606423_40246488',
  ),
  'page_content_top' => 
  array (
    0 => 'Block_4216414185d0299c0607040_00964836',
  ),
  'page_content' => 
  array (
    0 => 'Block_13185773605d0299c0607d41_18966407',
  ),
  'hook_home' => 
  array (
    0 => 'Block_785806515d0299c06085d1_37172470',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <section id="content" class="page-home">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4216414185d0299c0607040_00964836', 'page_content_top', $this->tplIndex);
?>


        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13185773605d0299c0607d41_18966407', 'page_content', $this->tplIndex);
?>

      </section>
    <?php
}
}
/* {/block 'page_content_container'} */
}
