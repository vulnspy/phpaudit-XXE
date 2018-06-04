<?php
if(isset($_GET['s'])){
	show_source(__FILE__);
	exit;
}
libxml_disable_entity_loader(false);
$data = isset($_POST['data'])?trim($_POST['data']):'';
$resp = '';
if($data != false){
	$xml = simplexml_load_string($data, 'SimpleXMLElement', LIBXML_NOENT);
	if($xml && isset($xml->name)){
		$name = $xml->name;
	}
	
}
?>
<style>
div.main{
	width:90%;
	max-width:50em;
	margin:0 auto;
}
textarea{
	width:100%;
	height:10em;
}
input[type="submit"]{
	margin: 1em 0;
}
</style>
<div class="main">
	<form action="" method="POST">
		<textarea name="data">
<?php
echo ($data!=false)?htmlspecialchars($data):htmlspecialchars('<?xml version="1.0"?>
<!DOCTYPE ANY [
	<!ENTITY content SYSTEM "file:///etc/passwd">
]>
<note>
	<name>&content;</name>
</note>');
?>
		</textarea><br/>
		<input style="" type="submit" value="submit"/>
		&nbsp;&nbsp;&nbsp;<a target="_blank" href="<?php echo basename(__FILE__).'?s';?>">View Source Code</a>
	</form>
	<pre>
<?php echo isset($name)?'ok':'error';?>
	</pre>
</div>
