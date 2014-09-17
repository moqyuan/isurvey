<!DOCTYPE html>
<html>
<head>
<title>ERROR</title>
</head>
<body>
	<div>
		
		<div class="alert alert-danger">
			<p><?php echo $e['message'];?></p>
			page will jump after 5 seconds. or click <a href="<?php echo __APP__;?>">THIS LINK</a>
		</div>
		<script type="text/javascript">
			setTimeout(function(){
				window.location.href='<?php echo __APP__;?>';
			}, 5000);
		</script>
	</div>
</body>

</html>