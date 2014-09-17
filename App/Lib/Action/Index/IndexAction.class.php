<?php
header('Content-Type:text/html; charset='.C('CHARSET'));
date_default_timezone_set(C('TIMEZONE'));
/**
 * Index controller
 */
Class IndexAction extends Action {

	Public function index () {
		
		$title="SurverySystem";
		$this->assign('title', $title);
		//Find Start Question
		$s = D("s")->where("id=1")->find();
		$q = D("q")->where("id=".$s['startq'])->find();

		//Find Answer of Start Question
		$agroup = D("a")->where("qid=".$q['id'])->select();
		$this->assign('q',$q);//assign question
		$this->assign('agroup',$agroup);//assign answers

		$this->display();

	}


	Public function handle() {
		if (!IS_AJAX)halt('page not found');

		$arr = explode("_", $_POST["target"]);

		$type=$arr[0];
		$id=$arr[1];
		//var_dump($_POST);

		if($type=='Q'){//if target is Q

		  $q = D("q")->where("id=".$id)->find();
		  $agroup = D("a")->where("qid=".$q['id'])->select();

		  if($q && $agroup){
		  	$data['targettype']='Q';
		  	//previous
		  	if(isset($_POST['flow'])){
			  if(sizeof($_POST['flow'])>=1){
			  	$data['back']=1;
			  }else{
			  	$data['back']=0;
			  }
			}else{
				$data['back']=0;
			}
		  	$data['status']=1;
		  	$data['q']=$q;
		  	$data['agroup']=$agroup;
		  	$this->ajaxReturn($data, 'json');
		  }else{
		  	$data['status']=0;
		  	$this->ajaxReturn($data, 'json');
		  }
		  exit;

		} elseif ( $type=='T' ){//if target is T
		  $dataajax['targettype']='T';

		  $t = D("t")->where("id=".$id)->find();

		  
		  $dataajax['t']=$t;
		  $data["time"]=date("Y-m-d H:i:s" ,time());
		  $data["flow"]=json_encode($_POST['flow']);
		  $data["tid"]=$id;

		  if($id = M('r')->data($data)->add() ){
		  	$this->ajaxReturn($dataajax, 'json');
		  }else{
		  	halt('cannot save data to the database');
		  }
		  

		}else{
			halt('page not found');
		}
	}
}

?>