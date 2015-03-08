<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-07 15:57:28
         compiled from "C:\Users\X\Documents\NetBeansProjects\MyHomePage\smarty\templates\LinksController.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2613054f9cd28ccf827-30981942%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '191e565a1d3ab572002095a04bf456642540f369' => 
    array (
      0 => 'C:\\Users\\X\\Documents\\NetBeansProjects\\MyHomePage\\smarty\\templates\\LinksController.tpl',
      1 => 1425740244,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2613054f9cd28ccf827-30981942',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54f9cd28ccf826_65872033',
  'variables' => 
  array (
    'userlinks' => 0,
    'data' => 0,
    'loggedInUserPage' => 0,
    'userget' => 0,
    'userStatus' => 0,
    'csrf' => 0,
    'csrfId' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54f9cd28ccf826_65872033')) {function content_54f9cd28ccf826_65872033($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['userlinks']->value[0])) {?>
    <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_smarty_tpl->tpl_vars['id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['userlinks']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
 $_smarty_tpl->tpl_vars['id']->value = $_smarty_tpl->tpl_vars['data']->key;
?>
        <p>
            <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['userlink'], ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['userlink'], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['domainname'], ENT_QUOTES, 'UTF-8', true);?>
</a>
        </p>
    <?php } ?>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['loggedInUserPage']->value==true) {?>
    <p class="hidden" id="user-get"><?php echo $_smarty_tpl->tpl_vars['userget']->value;?>
</p>
    <p>
        Account status : <b class="<?php if ($_smarty_tpl->tpl_vars['userStatus']->value=='publicacc') {?>green<?php } else { ?>red<?php }?>" id="current-status"><?php echo $_smarty_tpl->tpl_vars['userStatus']->value;?>
</b>
    </p>
    <p>
        Change status to : <a href="/" id="change-status"><?php if ($_smarty_tpl->tpl_vars['userStatus']->value=='publicacc') {?>private<?php } else { ?>publicacc<?php }?></a>
    </p>
    <form method="POST" action="/links?<?php echo $_smarty_tpl->tpl_vars['userget']->value;?>
" id="links">
        <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['csrf']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['csrfId']->value;?>
">
        <input type="hidden" value="linklist" name="link-list">
        <p>
            <input type="text" maxlength="200" name="link1" size="100">
        </p>
        <p id="next">
            <input type="button" value="Add next" id="add-next">
        </p>
        <p>
            <input type="submit" value="save">
        </p>
    </form>
    <?php echo '<script'; ?>
 src="public/js/links.js"><?php echo '</script'; ?>
>
<?php }?><?php }} ?>
