<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-08 12:43:02
         compiled from "C:\Users\X\Documents\NetBeansProjects\MyHomePage\smarty\templates\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2908554f9cd28c33423-31402557%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '220609d100a5e7b3772a3acd448fdf25d1d37e17' => 
    array (
      0 => 'C:\\Users\\X\\Documents\\NetBeansProjects\\MyHomePage\\smarty\\templates\\index.tpl',
      1 => 1425814916,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2908554f9cd28c33423-31402557',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54f9cd28ca8723_71322689',
  'variables' => 
  array (
    'title' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54f9cd28ca8723_71322689')) {function content_54f9cd28ca8723_71322689($_smarty_tpl) {?><html>
    <head>
        <link rel="stylesheet" type="text/css" href="public/css/main.css" />
        <?php echo '<script'; ?>
 src="public/js/jquery-2.1.3.min.js"><?php echo '</script'; ?>
> 
        <title><?php if (isset($_smarty_tpl->tpl_vars['title']->value)) {
echo $_smarty_tpl->tpl_vars['title']->value;
} else { ?>MyHomePage<?php }?></title>
    </head>
    <header>
        <ul class="navigation">
            <li class="left"><a href="/">Home</a></li>
            <li class="left"><a href="/">About</a></li>
            <?php if (isset($_smarty_tpl->tpl_vars['user']->value)) {?>
                <li class="right"><a href="/user?signout">Sign out</a></li>
                <li class="right"><a href="/links?<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value, ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value, ENT_QUOTES, 'UTF-8', true);?>
</a></li>
            <?php } else { ?>
                <li class="right"><a href="/user">Sign in</a></li>
            <?php }?>
        </ul>
    </header>

    <div id="content">
        <h1 class="logo">My Home Page</h1>
        <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['controller']->value).".tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    </div>
</html><?php }} ?>
