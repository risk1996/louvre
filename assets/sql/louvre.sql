<!DOCTYPE html>
<html lang="en" dir="ltr">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Script-Type" content="text/javascript">
<meta name="robots" content="noindex">
<meta name="referrer" content="origin-when-crossorigin">
<title>Export: louvre - Adminer</title>
<link rel="stylesheet" type="text/css" href="?file=default.css&amp;version=4.3.1">
<script type="text/javascript" src="?file=functions.js&amp;version=4.3.1"></script>
<link rel="shortcut icon" type="image/x-icon" href="?file=favicon.ico&amp;version=4.3.1">
<link rel="apple-touch-icon" href="?file=favicon.ico&amp;version=4.3.1">

<body class="ltr nojs" onkeydown="bodyKeydown(event);" onclick="bodyClick(event);">
<script type="text/javascript">
document.body.className = document.body.className.replace(/ nojs/, ' js');
var offlineMessage = 'You are offline.';
</script>

<div id="help" class="jush-sql jsonly hidden" onmouseover="helpOpen = 1;" onmouseout="helpMouseout(this, event);"></div>

<div id="content">
<p id="breadcrumb"><a href=".">MySQL</a> &raquo; <a href='?username=root' accesskey='1' title='Alt+Shift+1'>Server</a> &raquo; <a href="?username=root&amp;db=louvre">louvre</a> &raquo; Export
<h2>Export: louvre</h2>
<div id='ajaxstatus' class='jsonly hidden'></div>

<form action="" method="post">
<table cellspacing="0">
<tr><th>Output<td><label><input type='radio' name='output' value='text' checked>open</label><label><input type='radio' name='output' value='file'>save</label><label><input type='radio' name='output' value='gz'>gzip</label>
<tr><th>Format<td><label><input type='radio' name='format' value='sql' checked>SQL</label><label><input type='radio' name='format' value='csv'>CSV,</label><label><input type='radio' name='format' value='csv;'>CSV;</label><label><input type='radio' name='format' value='tsv'>TSV</label>
<tr><th>Database<td><select name='db_style'><option selected><option>USE<option>DROP+CREATE<option>CREATE</select><label><input type='checkbox' name='routines' value='1' checked>Routines</label><label><input type='checkbox' name='events' value='1' checked>Events</label><tr><th>Tables<td><select name='table_style'><option><option selected>DROP+CREATE<option>CREATE</select><label><input type='checkbox' name='auto_increment' value='1'>Auto Increment</label><label><input type='checkbox' name='triggers' value='1' checked>Triggers</label><tr><th>Data<td><select name='data_style'><option><option>TRUNCATE+INSERT<option selected>INSERT<option>INSERT+UPDATE</select></table>
<p><input type="submit" value="Export">
<input type="hidden" name="token" value="140604:356142">

<table cellspacing="0">
<thead><tr><th style='text-align: left;'><label class='block'><input type='checkbox' id='check-tables' checked onclick='formCheck(this, /^tables\[/);'>Tables</label><th style='text-align: right;'><label class='block'>Data<input type='checkbox' id='check-data' checked onclick='formCheck(this, /^data\[/);'></label></thead>
<tr><td><label class='block'><input type='checkbox' name='tables[]' value='book' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-tables&#039;);">book</label><td align='right'><label class='block'><span id='Rows-book'></span><input type='checkbox' name='data[]' value='book' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-data&#039;);"></label>
<tr><td><label class='block'><input type='checkbox' name='tables[]' value='bookfeatured' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-tables&#039;);">bookfeatured</label><td align='right'><label class='block'><span id='Rows-bookfeatured'></span><input type='checkbox' name='data[]' value='bookfeatured' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-data&#039;);"></label>
<tr><td><label class='block'><input type='checkbox' name='tables[]' value='bookpromotion' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-tables&#039;);">bookpromotion</label><td align='right'><label class='block'><span id='Rows-bookpromotion'></span><input type='checkbox' name='data[]' value='bookpromotion' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-data&#039;);"></label>
<tr><td><label class='block'><input type='checkbox' name='tables[]' value='bookreview' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-tables&#039;);">bookreview</label><td align='right'><label class='block'><span id='Rows-bookreview'></span><input type='checkbox' name='data[]' value='bookreview' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-data&#039;);"></label>
<tr><td><label class='block'><input type='checkbox' name='tables[]' value='cart' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-tables&#039;);">cart</label><td align='right'><label class='block'><span id='Rows-cart'></span><input type='checkbox' name='data[]' value='cart' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-data&#039;);"></label>
<tr><td><label class='block'><input type='checkbox' name='tables[]' value='transactions' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-tables&#039;);">transactions</label><td align='right'><label class='block'><span id='Rows-transactions'></span><input type='checkbox' name='data[]' value='transactions' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-data&#039;);"></label>
<tr><td><label class='block'><input type='checkbox' name='tables[]' value='transactionsdetail' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-tables&#039;);">transactionsdetail</label><td align='right'><label class='block'><span id='Rows-transactionsdetail'></span><input type='checkbox' name='data[]' value='transactionsdetail' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-data&#039;);"></label>
<tr><td><label class='block'><input type='checkbox' name='tables[]' value='users' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-tables&#039;);">users</label><td align='right'><label class='block'><span id='Rows-users'></span><input type='checkbox' name='data[]' value='users' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-data&#039;);"></label>
<script type='text/javascript'>ajaxSetHtml('?username=root&db=louvre&script=db');</script>
</table>
</form>
</div>

<form action="" method="post">
<p class="logout">
<input type="submit" name="logout" value="Logout" id="logout">
<input type="hidden" name="token" value="140604:356142">
</p>
</form>
<div id="menu">
<h1>
<a href='https://www.adminer.org/' target='_blank' id='h1'>Adminer</a> <span class="version">4.3.1</span>
<a href="https://www.adminer.org/#download" target="_blank" id="version"></a>
</h1>
<script type="text/javascript" src="?file=jush.js&amp;version=4.3.1"></script>
<script type="text/javascript">
var jushLinks = { sql: [ '?username=root&db=louvre&table=$&', /\b(book|bookfeatured|bookpromotion|bookreview|cart|transactions|transactionsdetail|users)\b/g ] };
jushLinks.bac = jushLinks.sql;
jushLinks.bra = jushLinks.sql;
jushLinks.sqlite_quo = jushLinks.sql;
jushLinks.mssql_bra = jushLinks.sql;
bodyLoad('5.7');
</script>
<form action="">
<p id="dbs">
<input type="hidden" name="username" value="root"><span title='database'>DB</span>: <select name='db' onmousedown='dbMouseDown(event, this);' onchange='dbChange(this);'><option value=""><option>information_schema<option selected>louvre<option>mahasiswa<option>mysql<option>performance_schema<option>sys<option>testblog</select><input type='submit' value='Use' class='hidden'>
<input type="hidden" name="dump" value=""></p></form>
<p class='links'><a href='?username=root&amp;db=louvre&amp;sql='>SQL command</a>
<a href='?username=root&amp;db=louvre&amp;import='>Import</a>
<a href='?username=root&amp;db=louvre&amp;dump=' id='dump' class='active '>Export</a>
<a href="?username=root&amp;db=louvre&amp;create=">Create table</a>
<ul id='tables' onmouseover='menuOver(this, event);' onmouseout='menuOut(this);'>
<li><a href="?username=root&amp;db=louvre&amp;select=book" class='select'>select</a> <a href="?username=root&amp;db=louvre&amp;table=book" class='structure' title='Show structure'>book</a>
<li><a href="?username=root&amp;db=louvre&amp;select=bookfeatured" class='select'>select</a> <a href="?username=root&amp;db=louvre&amp;table=bookfeatured" class='structure' title='Show structure'>bookfeatured</a>
<li><a href="?username=root&amp;db=louvre&amp;select=bookpromotion" class='select'>select</a> <a href="?username=root&amp;db=louvre&amp;table=bookpromotion" class='structure' title='Show structure'>bookpromotion</a>
<li><a href="?username=root&amp;db=louvre&amp;select=bookreview" class='select'>select</a> <a href="?username=root&amp;db=louvre&amp;table=bookreview" class='structure' title='Show structure'>bookreview</a>
<li><a href="?username=root&amp;db=louvre&amp;select=cart" class='select'>select</a> <a href="?username=root&amp;db=louvre&amp;table=cart" class='structure' title='Show structure'>cart</a>
<li><a href="?username=root&amp;db=louvre&amp;select=transactions" class='select'>select</a> <a href="?username=root&amp;db=louvre&amp;table=transactions" class='structure' title='Show structure'>transactions</a>
<li><a href="?username=root&amp;db=louvre&amp;select=transactionsdetail" class='select'>select</a> <a href="?username=root&amp;db=louvre&amp;table=transactionsdetail" class='structure' title='Show structure'>transactionsdetail</a>
<li><a href="?username=root&amp;db=louvre&amp;select=users" class='select'>select</a> <a href="?username=root&amp;db=louvre&amp;table=users" class='structure' title='Show structure'>users</a>
</ul>
</div>
<script type="text/javascript">setupSubmitHighlight(document);</script>
