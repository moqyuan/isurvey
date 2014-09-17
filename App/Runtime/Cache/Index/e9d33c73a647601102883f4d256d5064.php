<?php if (!defined('THINK_PATH')) exit(); ini_set('default_charset','utf-8'); ?>

<!DOCTYPE html>
<html>
<head>
  
  <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="MoQ">
<script type="text/javascript" src="__PUBLIC__/js/jquery.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/style.css">
<title><?php echo ($title); ?></title>
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="mobile-web-app-capable" content="yes">

 
  <script type="text/javascript">
    var handleUrl = '<?php echo U("Index/Index/handle", '', '');?>';
  </script>
</head>
<body style="background: url('__PUBLIC__/img/bg.jpg');">
<!-- Static navbar -->
  <div class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background-color: rgba(0,0,0,0.8)">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo U('Index/Index/index');?>">
        <span style="color:#Ffffff"><strong>iSurvey</strong></span>
      </a>
    </div>
    <div class="navbar-collapse collapse">
      <!-- 
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Link</a></li>              
      </ul>
       -->
      <ul class="nav navbar-nav navbar-right">
		<li><a href="#" style="color:#FFFFFF" data-toggle="modal" data-target="#loginModal">Login</a></li>  
      </ul>
    </div><!--/.nav-collapse -->
  </div><!--/.container-fluid -->
</div>
<!-- /Static navbar -->

<!-- Main-->
<div id="wrapper">
  <div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">
    <!-- <html>
<body>
DentsuRAZORFISH!!!!!!!!!!!!!!!!!!
</body>
</html> -->
    <noscript>
    <div class="alert alert-danger">このブラウザーがJavascriptをサポートしていません。<br>Javascript機能がこのブラウザーで禁止されているかどうか確認してください。</div>
    </noscript>
    <!-- QUESTION -->
    <div id="questions">
      <div id="body" class="page-header" data-qid="<?php echo ($q["id"]); ?>">
        <h1 class="visible-lg visible-md"><?php echo ($q["body"]); ?></h1>
        <h2 class="visible-sm"><?php echo ($q["body"]); ?></h2>
        <h3 class="visible-xs"><?php echo ($q["body"]); ?></h3>
      </div>
      <?php if(is_array($agroup)): foreach($agroup as $key=>$a): ?><div class="q bs-callout" data-aid="<?php echo ($a["id"]); ?>" data-target="<?php echo ($a["target"]); ?>"><?php echo ($a["body"]); ?></div><?php endforeach; endif; ?>
    </div>
    <!-- /QUESTION -->
  </div>
  <div class="col-md-2"></div>
  </div>
</div>
<!--/Main--> 



<!--Login-->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">管理者にログイン</h4>
      </div>
      <div class="modal-body">
        
        <form role="form" id="loginForm">
          <div class="form-group">
            <label for="exampleInputEmail1">ユーザー名</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Username">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">パスワード</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
          </div>
        </form>
        <div id="loginfo">

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="loginBtn">ログイン</button>
        <button type="button" class="btn btn-default" data-dismiss="modal" id="loginCancel">キャンセル</button>
      </div>
    </div>
  </div>
</div>


<!--/Login-->


</body>

<script src="__PUBLIC__/js/index.js"></script>
</html>