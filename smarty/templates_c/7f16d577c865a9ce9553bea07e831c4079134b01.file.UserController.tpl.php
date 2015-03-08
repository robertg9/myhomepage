<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-06 17:00:30
         compiled from "C:\Users\X\Documents\NetBeansProjects\MyHomePage\smarty\templates\UserController.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1840054f9ce5da41379-47144502%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7f16d577c865a9ce9553bea07e831c4079134b01' => 
    array (
      0 => 'C:\\Users\\X\\Documents\\NetBeansProjects\\MyHomePage\\smarty\\templates\\UserController.tpl',
      1 => 1425657628,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1840054f9ce5da41379-47144502',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54f9ce5da8f573_38609065',
  'variables' => 
  array (
    'status' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54f9ce5da8f573_38609065')) {function content_54f9ce5da8f573_38609065($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['status']->value=='signup') {?>
    <h2 class="green">Your account has been created you can no log in.</h2>
<?php }?>
<form method="POST" action="/user">
    <input type="hidden" name="signin">
    <h2>Sign in</h2>
    <p>
        <label for="login">Login : </label>
        <input type="text" maxlength="40" id="login" name="login">
    </p>
    <p class="password">
        <label for="password">Pass : </label>
        <input type="text" maxlength="40" id="password" name="pass">
    </p>
    <input type="submit" value="Sign in">
</form>

<form method="POST" action="/user">
    <input type="hidden" name="signup">
    <h2>Sign up</h2>
    <p>
        <label for="login">Login : </label>
        <input type="text" maxlength="40" id="login" name="login">
    </p>
    <p class="password">
        <label for="password">Pass : </label>
        <input type="text" maxlength="40" id="password" name="pass">
    </p>
    
    <p>
        Public : <input type="radio" name="accounttype" value="publicacc" checked="checked"/>
        Private : <input type="radio" name="accounttype" value="private" />
    </p>
    
    <input type="submit" value="Sign up">
</form><?php }} ?>
