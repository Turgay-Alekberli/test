<?php
/* Smarty version 3.1.34-dev-7, created on 2022-11-18 15:15:57
  from 'C:\OpenServer\domains\myshop.loc\views\default\leftcolumn.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_6377777dac2638_73161458',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f0c87799d45dda9706558197d75e8aaf506bac08' => 
    array (
      0 => 'C:\\OpenServer\\domains\\myshop.loc\\views\\default\\leftcolumn.tpl',
      1 => 1648629094,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6377777dac2638_73161458 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="leftColumn">
	<div id="dropdown">
	<div id="leftMenu">
		<!--если будет ошибка, раскомментируй 6 строчку и перемести </div> после </span></button>:
		<div class="menuCaption"></div>
		!-->
			<button class="btn btn-success dropdown-toggle" data-toggle="dropdown">Меню:<span class="caret"></span></button>
			<ul class="dropdown-menu"> 
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsCategories']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
		<li ><a href="/?controller=category&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a><br /></li>

		<?php if ((isset($_smarty_tpl->tpl_vars['item']->value['children']))) {?>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['children'], 'itemChild');
$_smarty_tpl->tpl_vars['itemChild']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['itemChild']->value) {
$_smarty_tpl->tpl_vars['itemChild']->do_else = false;
?>
		<ul><li><a href="/?controller=category&id=<?php echo $_smarty_tpl->tpl_vars['itemChild']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['name'];?>
</a><br /></li></ul>
		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		<?php }?>
		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</ul>
	</div>
</div>

<?php if ((isset($_smarty_tpl->tpl_vars['arUser']->value))) {?>
    <div id="userBox">
	<a href="/user/" id="userLink"><?php echo $_smarty_tpl->tpl_vars['arUser']->value['displayName'];?>
</a><br /><br />
	<a href="/user/logout/" onclick="logout();">Выход</a>
	</div>
<?php } else { ?>
	<div id="userBox" class="hideme">
	<a href="#" id="userLink"></a><br />
	<a href="/user/logout/" onclick="logout();">Выход</a>
	</div>

	<?php if (!(isset($_smarty_tpl->tpl_vars['hideLoginBox']->value))) {?>
	<div id="loginBox">
		<div class="menuCaption">Авторизация</div>
		<input type="text" id="loginEmail" name="loginEmail" value=""/><br />
		<input type="password" id="loginPwd" name="loginPwd" value=""/><br />
		<input type="button" onclick="login();" value="Войти"/>
	</div>

    <div id="registerBox">
		<div class="menuCaption showHidden" onclick="showRegisterBox();">Регистрация</div>
		<div id="registerBoxHidden">
		email: <br />
		<input type="text" id="email" name="email" value=""/><br />
		пароль: <br />
		<input type="password" id="pwd1" name="pwd1" value=""/><br />
		повторить пароль: <br />
		<input type="password" id="pwd2" name="pwd2" value=""/><br />
		<input type="button" onclick="registerNewUser();" value="Зарегистрироваться"/>
		</div>	
	</div>
	<?php }
}?>
	<div class="menuCaption">Корзина</div>
	<a href="/cart/" title="Перейти в корзину">В корзине</a>
	<span id="cartCntItems">
	<?php if ($_smarty_tpl->tpl_vars['cartCntItems']->value > 0) {
echo $_smarty_tpl->tpl_vars['cartCntItems']->value;
} else { ?>пусто<?php }?>
	</span>
</div><?php }
}
