$(document).ready(function(){
  var flow = [];

  //choose answer
  $('body').on('click', '.q', function(){
  	var el=$(this);
  	if(el.attr("data-aid") != 0){//if it is not begin
		var obj={ 
				  "qid" : $("#body").attr("data-qid"),
				  "aid" : el.attr("data-aid")
				};
		flow.push( obj );	
	}
  	
  	$.ajax(handleUrl, {
  		timeout: 3000,
  		success: function(data) {
        if(data.targettype=='Q'){
          //output question
          var str='<div id="body" class="page-header" data-qid="'+data.q.id+'">';
           str+='<h1 class="visible-lg visible-md">'+data.q.body+'</h1>';
           str+='<h2 class="visible-sm">'+data.q.body+'</h2>';
           str+='<h3 class="visible-xs">'+data.q.body+'</h3></div>';
          //output answers
          for(var i=0; i<data.agroup.length; i++){
            var a=data.agroup[i];
            str+='<div class="q bs-callout" data-aid="'+a.id+'" data-target="'+a.target+'">'+a.body+'</div>';
          }
          //output prevBtn
          if(data.back==1){
            str+='<br><span id="prevBtn" class="btn btn-info btn-lg middle glyphicon glyphicon-chevron-left" style="width: 150px"></span><br>&nbsp';
          }
        }else if(data.targettype=='T'){
          //output Tail
          var str='<div class="bs-t" style="margin-top:50px;"><strong class="middle">結論：'+data.t.body+'</strong></div>';
        }

  			el.parent().animate({opacity:0},300,function(){
  				el.parent().html(str).animate({opacity:1},300);
  			});
  			
  			//console.log(flow);
  		},
  		error: function(request, errorType, errorMessage){
  			alert('Error: ' + errorType + 'with message: ' + errorMessage);
  		},
  		beforeSend: function(){
  			//before send code
  		},
  		complete: function(){
  			//complete  code
  		},
  		cache: false,
  		type: 'POST',
  		data:{ 
  			"target": el.data("target"),
  			"flow": flow
  		}
  	});

  });

  $('body').on('click', '#prevBtn', function(){
  	var el=$(this);

	var prevTarget=flow.pop();//stack pop
  	$.ajax(handleUrl, {
  		timeout: 3000,
  		success: function(data) {

        if(data.targettype=='Q'){
          //same with .q click
          var str='<div id="body" class="page-header" data-qid="'+data.q.id+'">';
           str+='<h1 class="visible-lg visible-md">'+data.q.body+'</h1>';
           str+='<h2 class="visible-sm">'+data.q.body+'</h2>';
           str+='<h3 class="visible-xs">'+data.q.body+'</h3></div>';
          for(var i=0; i<data.agroup.length; i++){
            var a=data.agroup[i];
            str+='<div class="q bs-callout" data-aid="'+a.id+'" data-target="'+a.target+'">'+a.body+'</div>';
          }
          if(data.back==1){
            str+='<br><span id="prevBtn" class="btn btn-info btn-lg middle glyphicon glyphicon-chevron-left" style="width: 150px"></span><br>&nbsp';
          }
        }else if(data.targettype=='T'){
          var str='<div class="well"><h3>結論：'+data.t.body+'</h3></div>';
        }
  			
  			el.parent().animate({opacity:0},300,function(){
  				el.parent().html(str).animate({opacity:1},300);
  			});
  			
  			//console.log(flow);
  		},
  		error: function(request, errorType, errorMessage){
  			alert('Error: ' + errorType + 'with message: ' + errorMessage);
  		},
  		beforeSend: function(){
  			//before send code
  		},
  		complete: function(){
  			//complete  code
  		},
  		cache: false,
  		type: 'POST',
  		data:{ 
  			"target": "Q_"+prevTarget['qid'],
  			"flow": flow
  		}
  	});

  });

  //login click
  $('body').on('click', '#loginBtn', function(){
  	$.ajax('page/login_do.php', {
  		success: function(response) {
  			$("#loginfo").html(response);
  		},
  		cache: false,
  		type: 'POST',
  		data: $('form').serialize()

  	});
  });

  //login cancel
  $('body').on('click', '#loginCancel', function(){
  	$("#username").val("");
  	$("#password").val("");
  	$("#loginfo").html("");
  });




});