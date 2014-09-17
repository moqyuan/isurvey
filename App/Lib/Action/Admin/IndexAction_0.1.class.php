<?php
header('Content-Type:text/html; charset='.C('CHARSET'));
date_default_timezone_set(C('TIMEZONE'));
/**
 * 
 */
Class IndexAction extends Action {

	Public function index () {

		$title="iSurveyManagement";
		$this->assign('title', $title);


		$s=M('s')->select();
		$startq='Q'.$s[0]['startq'];
		//traversal nodes
		$n=0;
		//make qgroup
		$qgroup = M('q')->where("del=0 and answer!='none'")->select();
		foreach($qgroup as $q){
			$nodes[$n]['type']='Q';
			$nodes[$n]['id']=$q['id'];
			$nodes[$n]['body']=$q['body'];

			$nodemap[$n]='Q'.$q['id'];
			$n++;

		}
		//make agroup
		$agroup = M('a')->where("del=0")->select();
		foreach($agroup as $a){
			$nodes[$n]['type']='A';
			$nodes[$n]['id']=$a['id'];
			$nodes[$n]['body']=$a['body'];

			$nodemap[$n]='A'.$a['id'];

			$n++;
		}


		$tgroup = M('t')->where("del=0")->select();
		//make tnone
		$m=0;
		foreach($tgroup as $t){
			$tmp=null;
			$tmp=M('a')->where("target='T_".$t['id']."' and del=0")->find();
			if($tmp==null){
				$tnone[$m]=M('t')->where("id=".$t['id'])->find();
				$m++;
				continue;
			}

			$nodes[$n]['type']='T';
			$nodes[$n]['id']=$t['id'];
			$nodes[$n]['body']=$t['body'];

			$nodemap[$n]='T'.$t['id'];

			$n++;
		}
		$k=0;
		$qngroup = M('q')->where("del=0 and answer='none'")->select();
		foreach($qngroup as $qn){
			$key=M('a')->where("del=0 and target='Q_".$qn['id']."'")->select();
			if($key!=null){
				$nodes[$n]['type']='Q';
				$nodes[$n]['id']=$qn['id'];
				$nodes[$n]['body']=$qn['body'];
				$nodemap[$n]='Q'.$qn['id'];
				$n++;
				$arrn[$k]=$qn['id'];
				$k++;
			}
		}


		//traversal links
		$n=0;
		$qgroup = M('q')->where("del=0 and answer!='none'")->select();
		foreach($qgroup as $q){
			$answer = explode(',', $q['answer']);
			for($i=0;$i<sizeof($answer);$i++){

				$links[$n]['source']=array_search('Q'.$q['id'], $nodemap);
				$links[$n]['target']=array_search('A'.$answer[$i], $nodemap);
				if('Q'.$q['id']==$startq){
					$links[$n]['value']=2;
				}else{
					$links[$n]['value']=rand(1,5);
				}
				$n++;
			}
		}

		$agroup = M('a')->where("del=0")->select();
		foreach($agroup as $a){
			$links[$n]['source']=array_search('A'.$a['id'], $nodemap);
			$arr=explode('_', $a['target']);
			$target=$arr[0].$arr[1];
			$links[$n]['target']=array_search($target, $nodemap);
			$links[$n]['value']=rand(1,5);
			$n++;
		}
		$data['nodes']=$nodes;
		$data['links']=$links;
		$tounset=array();
		$qnone = M('q')->where("del=0 and answer='none'")->select();

		for($i=0; $i<sizeof($qnone);$i++){
			for($j=0;$j<sizeof($arrn);$j++){
				
				if($arrn[$j]==$qnone[$i]['id']){
					//echo $i;
					//array_push($tounset, $i);
					unset($qnone[$i]);
				}
			}
		}

		$this->assign('qnone',$qnone);
		$this->assign('tnone',$tnone);
		$this->assign('qnonejson',json_encode($qnone));
		$this->assign('tnonejson',json_encode($tnone));

		$this->assign('data',json_encode($data))->display('');

	}

	/**
	 * Force Layout
	 */
	Public function force () {

		$title="SurveySystemAdmin";
		$this->assign('title', $title);
		/*
		 *map<v, list<v> >
		 *
		$qgroup = M('q')->select();
		foreach($qgroup as $q){

			$content['body']=$q['body'];
			$answer = explode(',', $q['answer']);
			for($i=0;$i<sizeof($answer);$i++){
				$answer[$i]='A_'.$answer[$i];
			}
			$content['target']=$answer;
			$data['Q_'.$q['id']]=$content;
		}
		
		$agroup = M('a')->select();
		foreach($agroup as $a){
			$question[0]='Q_'.$a['qid'];
			$content['body']=$a['body'];
			$content['target']=$question;
			
			$data['A_'.$a['id']]=$content;
		}

		$tgroup = M('t')->select();
		foreach($tgroup as $t){
			$content['body']=$t['body'];
			$content['target']=[];
			
			$data['T_'.$t['id']]=$content;
		}
		*/
		$qgroup = M('q')->select();
		$n=0;
		foreach($qgroup as $q){
			$answer = explode(',', $q['answer']);
			for($i=0;$i<sizeof($answer);$i++){
				$answer[$i]='A_'.$answer[$i];
				$data[$n]['source']='Q_'.$q['id'];
				$data[$n]['target']=$answer[$i];
				$data[$n]['type']='suit';
				$n++;
			}
		}

		$agroup = M('a')->select();
		foreach($agroup as $a){
			$data[$n]['source']='A_'.$a['id'];
			$data[$n]['target']=$a['target'];
			$data[$n]['type']='suit';
			$n++;
		}

		

		$this->assign('data', json_encode($data))->display('force');
	}

	Public function addq(){
		if (!IS_AJAX)halt('page not found');
		$data['body']=I('post.content','','htmlspecialchars');
		if($id=M('q')->data($data)->add()){
			echo $id;
		}else{
			echo "fail";
		}
	}

	Public function addt(){
		if (!IS_AJAX)halt('page not found');
		$data['body']=I('post.content','','htmlspecialchars');
		if($id=M('t')->data($data)->add()){
			echo $id;
		}else{
			echo "fail";
		}
	}

	Public function adda(){
		if (!IS_AJAX)halt('page not found');
		$arr=explode('_', $_POST['from']);
		$qid=$arr[1];
		$data['qid']=$qid;
		$data['body']=I('post.content','','htmlspecialchars');
		$data['target']=$_POST['to'];
		$id_a=M('a')->data($data)->add();
		if(!$id_a){
			echo "fail";
			exit;
		}
		$q=M('q')->where("id=".$qid)->find();
		if($q['answer']=='none'){
			$dataq['answer']=$id_a;
			$id_q=M('q')->where("id=".$qid)->save($dataq);
		}else{
			$arrq=explode(',', $q['answer']);
			$arrq[sizeof($arrq)]=$id_a;
			$str='';
			for($i=0; $i<sizeof($arrq); $i++){
				$str.=$arrq[$i].',';
			}
			$str=substr($str, 0, -1);
			$dataq['answer']=$str;
			$id_q=M('q')->where("id=".$qid)->save($dataq);
		}

		if($id_a && $id_q){
			echo "success";
		}else{
			echo "fail";
		}
	}

	Public function editq(){
		if (!IS_AJAX)halt('page not found');
		$id=$_POST['id'];
		$data['body']=I('post.content','','htmlspecialchars');
		if($id=M('q')->where("id=".$id)->save($data)){
			echo $id;
		}else{
			echo "fail";
		}
	}

	Public function editt(){
		if (!IS_AJAX)halt('page not found');
		$id=$_POST['id'];
		$data['body']=I('post.content','','htmlspecialchars');
		if($id=M('t')->where("id=".$id)->save($data)){
			echo $id;
		}else{
			echo "fail";
		}
	}

	Public function edita(){
		if (!IS_AJAX)halt('page not found');
		$id=$_POST['id'];//answer id
		$arr=explode('_', $_POST['from']);
		$qid=$arr[1];//new target
		var_dump($qid);

		$data['qid']=$qid;
		$data['body']=I('post.content','','htmlspecialchars');
		$data['target']=$_POST['to'];
		$a=M('a')->where('id='.$id)->find();
		var_dump($a);

		if($a['qid']!=$qid){//if old qid changed 

			$q=M('q')->where("id=".$qid)->find();//new question
			var_dump($q);

			if($q['answer']=='none'){
				$dataq['answer']=$id;
				$id_q=M('q')->where("id=".$qid)->save($dataq);
			}else{

				$arrq=explode(',', $q['answer']);
				$arrq[sizeof($arrq)]=$id;
				$str='';
				for($i=0; $i<sizeof($arrq); $i++){
					$str.=$arrq[$i].',';
				}
				$str=substr($str, 0, -1);
				$dataq['answer']=$str;
				$id_q=M('q')->where("id=".$qid)->save($dataq);
			}

			$o=M('q')->where("id=".$a['qid'])->find();//old question
			var_dump($o);
			if($o['answer']==$id){
				$dataO['answer']='none';
			}elseif($o['answer']=='none'){
				echo 'error';
			}else{
				$arr=explode(',', $o['answer']);
				$j=array_search($id, $arr);
				var_dump($arr);
	    		unset($arr[$j]);
	    		$str='';
	    		foreach($arr as $v){
	    			$str.=$v.',';
	    		}
	    		$str=substr($str, 0, -1);


	    		$dataO['answer']=$str;
			}
			$id_o=M('q')->where("id=".$a['qid'])->save($dataO);

		}

		$id_a=M('a')->where('id='.$id)->save($data);
		if( $id_a && $id_o && $id_q ){
			echo "fail";
			exit;
		}

	}



	Public function getq(){
		if (!IS_AJAX)halt('page not found');

		$data=M('q')->where("id=".$_POST["id"])->find();
		$this->ajaxReturn($data,"json");
	}

	Public function gett(){
		if (!IS_AJAX)halt('page not found');

		$data=M('t')->where("id=".$_POST["id"])->find();
		$this->ajaxReturn($data,"json");
	}

	Public function geta(){
		if (!IS_AJAX)halt('page not found');
		$data=M('a')->where("id=".$_POST["id"])->find();
		$this->ajaxReturn($data,"json");
	}


	Public function delq(){
		if (!IS_AJAX)halt('page not found');
		$data['del']=1;
		if(M('q')->where("id=".$_POST['id'])->save($data)){
			echo "success";
		}else{
			echo "fail";
		}
	}

	Public function delt(){
		if (!IS_AJAX)halt('page not found');
		$data['del']=1;
		if(M('t')->where("id=".$_POST['id'])->save($data)){
			echo "success";
		}else{
			echo "fail";
		}
	}

	Public function dela(){
		if (!IS_AJAX)halt('page not found');
		$id=$_POST['id'];
		$a=M('a')->where("id=".$id)->find();	
		$q=M('q')->where("id=".$a['qid'])->find();
		if($q['answer']==$id){
			$dataQ['answer']='none';
		}elseif($q['answer']=='none'){
			echo 'error';
		}else{
			$arr=explode(',', $q['answer']);
			$j=array_search($id, $arr);

    		unset($arr[$j]);
    		p($arr);
    		$str='';
    		foreach($arr as $v){
    			$str.=$v.',';
    		}
    		echo $str;
    		$str=substr($str, 0, -1);


    		$dataQ['answer']=$str;
		}
		$dataA['del']=1;
		$rA=M('a')->where("id=".$_POST['id'])->save($dataA);
		$rQ=M('q')->where("id=".$q['id'])->save($dataQ);


		if($rA && $rQ){
			echo "success";
		}else{
			echo "fail";
		}
	}


}



?>