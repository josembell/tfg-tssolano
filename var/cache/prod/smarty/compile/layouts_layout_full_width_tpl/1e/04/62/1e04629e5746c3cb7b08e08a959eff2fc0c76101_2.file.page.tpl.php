<?php
/* Smarty version 3.1.33, created on 2019-06-13 20:45:16
  from '/Applications/XAMPP/xamppfiles/htdocs/tfg-tssolano/themes/classic/templates/page.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d0299bcc6cff9_85074291',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1e04629e5746c3cb7b08e08a959eff2fc0c76101' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/tfg-tssolano/themes/classic/templates/page.tpl',
      1 => 1559686799,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d0299bcc6cff9_85074291 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18283705015d0299bcc66096_02642025', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, $_smarty_tpl->tpl_vars['layout']->value);
}
/* {block 'page_title'} */
class Block_9818315465d0299bcc67112_03976204 extends Smarty_Internal_Block
{
public $callsChild = 'true';
public $hide = 'true';
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        <header class="page-header">
          <h1><?php 
$_smarty_tpl->inheritance->callChild($_smarty_tpl, $this);
?>
</h1>
        </header>
      <?php
}
}
/* {/block 'page_title'} */
/* {block 'page_header_container'} */
class Block_19287098325d0299bcc667f0_94230022 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9818315465d0299bcc67112_03976204', 'page_title', $this->tplIndex);
?>

    <?php
}
}
/* {/block 'page_header_container'} */
/* {block 'page_content_top'} */
class Block_12681683865d0299bcc6b2a8_99498984 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'page_content_top'} */
/* {block 'page_content'} */
class Block_19993058585d0299bcc6b9a9_40685611 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <!-- Page content -->
        <?php
}
}
/* {/block 'page_content'} */
/* {block 'page_content_container'} */
class Block_8711991405d0299bcc6a612_90700583 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <section id="content" class="page-content card card-block">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12681683865d0299bcc6b2a8_99498984', 'page_content_top', $this->tplIndex);
?>

        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19993058585d0299bcc6b9a9_40685611', 'page_content', $this->tplIndex);
?>

      </section>
    <?php
}
}
/* {/block 'page_content_container'} */
/* {block 'page_footer'} */
class Block_541768275d0299bcc6c656_12974764 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <!-- Footer content -->
        <?php
}
}
/* {/block 'page_footer'} */
/* {block 'page_footer_container'} */
class Block_900704395d0299bcc6c281_57830265 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <footer class="page-footer">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_541768275d0299bcc6c656_12974764', 'page_footer', $this->tplIndex);
?>

      </footer>
    <?php
}
}
/* {/block 'page_footer_container'} */
/* {block 'content'} */
class Block_18283705015d0299bcc66096_02642025 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_18283705015d0299bcc66096_02642025',
  ),
  'page_header_container' => 
  array (
    0 => 'Block_19287098325d0299bcc667f0_94230022',
  ),
  'page_title' => 
  array (
    0 => 'Block_9818315465d0299bcc67112_03976204',
  ),
  'page_content_container' => 
  array (
    0 => 'Block_8711991405d0299bcc6a612_90700583',
  ),
  'page_content_top' => 
  array (
    0 => 'Block_12681683865d0299bcc6b2a8_99498984',
  ),
  'page_content' => 
  array (
    0 => 'Block_19993058585d0299bcc6b9a9_40685611',
  ),
  'page_footer_container' => 
  array (
    0 => 'Block_900704395d0299bcc6c281_57830265',
  ),
  'page_footer' => 
  array (
    0 => 'Block_541768275d0299bcc6c656_12974764',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


  <section id="main">

    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19287098325d0299bcc667f0_94230022', 'page_header_container', $this->tplIndex);
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8711991405d0299bcc6a612_90700583', 'page_content_container', $this->tplIndex);
?>


    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_900704395d0299bcc6c281_57830265', 'page_footer_container', $this->tplIndex);
?>


  </section>

<?php
}
}
/* {/block 'content'} */
}
