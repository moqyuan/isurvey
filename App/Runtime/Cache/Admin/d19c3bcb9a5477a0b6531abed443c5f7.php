<?php if (!defined('THINK_PATH')) exit(); ini_set('default_charset','utf-8'); ?>

<!DOCTYPE html>
<html>
<head>
  <!--  -->
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
  <script type="text/javascript">
    var addq = '<?php echo U("Index/addq");?>';
    var addt = '<?php echo U("Index/addt");?>';
    var adda = '<?php echo U("Index/adda");?>';
    var getq = '<?php echo U("Index/getq");?>';
    var geta = '<?php echo U("Index/geta");?>';
    var gett = '<?php echo U("Index/gett");?>';

    var delq = '<?php echo U("Index/delq");?>';
    var delt = '<?php echo U("Index/delt");?>';
    var dela = '<?php echo U("Index/dela");?>';

    var editq= '<?php echo U("Index/editq");?>';
    var editt= '<?php echo U("Index/editt");?>';
    var edita= '<?php echo U("Index/edita");?>';

  </script>
  <style>

  #chart {
    height: 700px;
  }

  .node rect {
    cursor: pointer;
    fill-opacity: .9;
    shape-rendering: crispEdges;

  }

  .node text {
    pointer-events: none;
    text-shadow: 0 1px 0 #fff;
  }

  .link {
    fill: none;
    stroke: #333;
    stroke-opacity: .1;
  }

  .link:hover {
    stroke-opacity: .5;
  }
  #chart{
    margin: 50px
  }

  text{
    font-size: 10px;
    width: 10px;

  }
  </style>
  
</head>
<body>
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
      <a class="navbar-brand">
        <span><strong>iSurvery Management System</strong></span>
      </a>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="colorq"><?php echo sizeof($qnone);?>Q</span>/<span class="colort"><?php echo sizeof($tnone);?>T</span> Unlinked  <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <?php if(is_array($qnone)): foreach($qnone as $key=>$q): ?><li><a class="qnone colorq" data-type="Q" data-id="<?php echo ($q["id"]); ?>" title="問題<?php echo ($q["id"]); ?>: <?php echo ($q["body"]); ?>">Q<?php echo ($q["id"]); ?></a></li><?php endforeach; endif; ?>
            <li class="divider"></li>
            <?php if(is_array($tnone)): foreach($tnone as $key=>$t): ?><li><a class="tnone colort" data-type="T" data-id="<?php echo ($t["id"]); ?>" title="結論<?php echo ($t["id"]); ?>: <?php echo ($t["body"]); ?>">T<?php echo ($t["id"]); ?></a></li><?php endforeach; endif; ?>
          </ul>
        </li>
        <li id="addQ"><a href="#" >+Q</a></li>
        <li id="addA"><a href="#" >+A</a></li>
        <li id="addT"><a href="#" >+T</a></li>
    <li><a href="<?php echo U('Index/Index/index');?>" >Logout</a></li>

      </ul>
    </div><!--/.nav-collapse -->
  </div><!--/.container-fluid -->
</div>
<!-- /Static navbar -->

<!-- Main-->
<div id="wrapper">
  <div class="middle">
    <noscript>
    <div class="alert alert-danger">このブラウザーがJavascriptをサポートしていません。<br>Javascript機能がこのブラウザーで禁止されているかどうか確認してください。</div>
    </noscript>

    <!-- QUESTION -->
    <div id="mysvg">
      <p id="chart"></p>
    </div>
    <!-- /QUESTION -->

    <!-- <div id="addItem" class="middle" style="margin-top:80px">

      <div class="btn-group" id="noneq">
        <?php if(is_array($qnone)): foreach($qnone as $key=>$q): ?><div class="btn-group">
          <button type="button" class="qnone btn btn-default" style="background-color:#eab863" data-type="Q" data-id="<?php echo ($q["id"]); ?>" title="問題<?php echo ($q["id"]); ?>: <?php echo ($q["body"]); ?>">Q<?php echo ($q["id"]); ?></button>
        </div><?php endforeach; endif; ?>
      </div>
      <span style="margin:10px">&nbsp</span>
      <div class="btn-group">
        <div class="btn-group">
          <button id="addQ" type="button" class="btn btn-default" style="background-color:#eab863" title="Add Question"> + </button>
        </div>
        <div class="btn-group">
          <button id="addA" type="button" class="btn btn-default" style="background-color:#bdebe1" title="Add Choice"> + </button>
        </div>
        <div class="btn-group">
          <button id="addT" type="button" class="btn btn-default" style="background-color:#b56686" title="Add Conclusion"> + </button>
        </div>
      </div>
      <span style="margin:10px">&nbsp</span>
      <div class="btn-group" id="nonet">
        <?php if(is_array($tnone)): foreach($tnone as $key=>$t): ?><div class="btn-group">
          <button type="button" class="tnone btn btn-default" style="background-color:#b56686" data-type="T" data-id="<?php echo ($t["id"]); ?>" title="結論<?php echo ($t["id"]); ?>: <?php echo ($t["body"]); ?>">T<?php echo ($t["id"]); ?></button>
        </div><?php endforeach; endif; ?>
      </div>
    </div> -->

  <div class="col-md-2"></div>
  </div>
</div>
<!--/Main--> 



<!-- Add Q Modal -->
<div class="modal fade" id="addQModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cancel</span></button>
        <h4 class="modal-title">Add New Question</h4>
      </div>
      <div class="modal-body">

        <form>
          <textarea id="addqcontent" name="addqcontent" class="form-control" rows="3"  placeholder="Enter New Question"></textarea>
        </form>
        <br>
        <div id="addqstatus">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" id="addqcancel">Cancel</button>
        <button type="button" class="btn btn-primary" id="addqadd">Add</button>
      </div>
    </div>
  </div>
</div>
<!--/ Add Q Modal -->


<!-- Add T Modal -->
<div class="modal fade" id="addTModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cancel</span></button>
        <h4 class="modal-title">Add New Conclusion</h4>
      </div>
      <div class="modal-body">

        <form>
          <textarea id="addtcontent" name="addtcontent"  class="form-control" rows="3" placeholder="Enter New Conclusion"></textarea>
        </form>
        <br>
        <div id="addtstatus">
        </div>
        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" id="addtcancel">Cancel</button>
        <button type="button" class="btn btn-primary" id="addtadd">Add</button>
      </div>
    </div>
  </div>
</div>
<!--/ Add T Modal -->

<!-- Add A Modal -->
<div class="modal fade" id="addAModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cancel</span></button>
        <h4 class="modal-title">Add New Choice</h4>
      </div>
      <div class="modal-body">

        <form>
          <div class="row">
            <div class="col-md-4">
              <label>Select Question</label>
              <select id="addafrom" name="addafrom" class="form-control">
                <option value="">select FROM</option>
              </select>
              <label>Select Target</label>
              <select id="addato" name="addato" class="form-control">
                <option value="">select TO</option>
              </select>

            </div>
            <div class="col-md-8">
              <label>Enter Choice Content</label>
              <textarea id="addacontent" name="addacontent" class="form-control" rows="3"  placeholder="Enter New Choice"></textarea>
            </div>

          </div>
          
        </form>
        <br/>
        <div id="addastatus">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" id="addacancel">Cancel</button>
        <button type="button" class="btn btn-primary" id="addaadd">Add</button>
      </div>
    </div>
  </div>
</div>
<!--/ Add A Modal -->

<!-- Edit Q Modal -->
<div class="modal fade" id="editQModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cancel</span></button>
        <h4 class="modal-title" id="editqtitle">Edit Question</h4>
      </div>
      <div class="modal-body">

        <form>
          <textarea id="editqcontent" name="editqcontent" class="form-control" rows="3"  placeholder="Edit This Question"></textarea>
        </form>
        <br/>
        <div id="editqstatus">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" id="editqdelete">Delete</button>
        <button type="button" class="btn btn-default" data-dismiss="modal" id="editqcancel">Cancel</button>
        <button type="button" class="btn btn-primary" id="editqsave">Save</button>
      </div>
    </div>
  </div>
</div>
<!--/ Edit Q Modal -->

<!-- Edit T Modal -->
<div class="modal fade" id="editTModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cancel</span></button>
        <h4 class="modal-title" id="editttitle">Edit Conclusion</h4>
      </div>
      <div class="modal-body">

        <form>
          <textarea id="edittcontent" name="edittcontent" class="form-control" rows="3"  placeholder="Edit This Question"></textarea>
        </form>
        <br/>
        <div id="edittstatus">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" id="edittdelete">Delete</button>
        <button type="button" class="btn btn-default" data-dismiss="modal" id="edittcancel">Cancel</button>
        <button type="button" class="btn btn-primary" id="edittsave">Save</button>
      </div>
    </div>
  </div>
</div>
<!--/ Edit T Modal -->

<!-- Edit A Modal -->
<div class="modal fade" id="editAModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cancel</span></button>
        <h4 class="modal-title" id="editatitle">Edit Choice</h4>
      </div>
      <div class="modal-body">

        <form>
          <div class="row">
            <div class="col-md-4">
              <label>Select Question</label>
              <select id="editafrom" name="editafrom" class="form-control">
                <option value="">select FROM</option>
              </select>
              <label>Select Target</label>
              <select id="editato" name="editato" class="form-control">
                <option value="">select TO</option>
              </select>

            </div>
            <div class="col-md-8">
              <label>Enter Choice Content</label>
              <textarea id="editacontent" name="editacontent" class="form-control" rows="3"  placeholder="Enter New Choice"></textarea>
            </div>

          </div>
          
        </form>
        <br/>
        <div id="editastatus">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" id="editadelete">Delete</button>
        <button type="button" class="btn btn-default" data-dismiss="modal" id="editacancel">Cancel</button>
        <button type="button" class="btn btn-primary" id="editasave">Save</button>
      </div>
    </div>
  </div>
</div>
<!--/ Edit A Modal -->

</body>


<script src="http://d3js.org/d3.v2.min.js?2.9.1"></script>
<script src="__PUBLIC__/js/sankey.js"></script>
<script>

var margin = {top: 50, right: 5, bottom: 6, left: 1},
    width = 960 - margin.left - margin.right,
    height = 500 - margin.top - margin.bottom;

var formatNumber = d3.format(",.0f"),
    format = function(d) { return formatNumber(d) + " TiMeS"; },
    color = d3.scale.category20();

var svg = d3.select("#chart").append("svg")
    .attr("width", width + margin.left + margin.right)
    .attr("height", height + margin.top + margin.bottom)
  .append("g")
    .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

var sankey = d3.sankey()
    .nodeWidth(8)
    .nodePadding(20)
    .size([width, height]);

var path = sankey.link();

var mydata=<?php echo ($data); ?>;
var myqnone=<?php echo ($qnonejson); ?>;
var mytnone=<?php echo ($tnonejson); ?>;
if(myqnone!=null){
for(var i=0; i<myqnone.length; i++){
$("#addafrom").append('<option value="Q_'+myqnone[i].id+'">*Q'+myqnone[i].id+' '+myqnone[i].body+'</option>');
$("#addato").append('<option value="Q_'+myqnone[i].id+'">*Q'+myqnone[i].id+' '+myqnone[i].body+'</option>');
$("#editafrom").append('<option value="Q_'+myqnone[i].id+'">*Q'+myqnone[i].id+' '+myqnone[i].body+'</option>');
$("#editato").append('<option value="Q_'+myqnone[i].id+'">*Q'+myqnone[i].id+' '+myqnone[i].body+'</option>');
}
}
if(mytnone!=null){
for(var i=0; i<mytnone.length; i++){
$("#addato").append('<option value="T_'+mytnone[i].id+'">*T'+mytnone[i].id+' '+mytnone[i].body+'</option>');
$("#editato").append('<option value="T_'+mytnone[i].id+'">*T'+mytnone[i].id+' '+mytnone[i].body+'</option>');
}
}
//add 
if(mydata!=null){
for(var i=0; i<mydata.nodes.length; i++){
  var ntype=mydata.nodes[i].type;
  var nid=mydata.nodes[i].id;
  var nbody=mydata.nodes[i].body;
  if(ntype=="Q"){
    $("#addafrom").append('<option value="'+ntype+'_'+nid+'">'+ntype+nid+' '+nbody+'</option>');
    $("#addato").append('<option value="'+ntype+'_'+nid+'">'+ntype+nid+' '+nbody+'</option>');
    $("#editafrom").append('<option value="'+ntype+'_'+nid+'">'+ntype+nid+' '+nbody+'</option>');
    $("#editato").append('<option value="'+ntype+'_'+nid+'">'+ntype+nid+' '+nbody+'</option>');
  }else if(ntype=="T"){
    $("#addato").append('<option value="'+ntype+'_'+nid+'">'+ntype+nid+' '+nbody+'</option>');
    $("#editato").append('<option value="'+ntype+'_'+nid+'">'+ntype+nid+' '+nbody+'</option>');
  }
}
}





sankey
    .nodes(mydata.nodes)
    .links(mydata.links)
    .layout(32);

var link = svg.append("g").selectAll(".link")
    .data(mydata.links)
  .enter().append("path")
    .attr("class", "link")
    .attr("d", path)
    .attr("title", function(d){return d.value})
    .style("stroke-width", function(d) { return Math.max(1, d.dy); })
    .sort(function(a, b) { return b.dy - a.dy; });

// link.append("title")
//     .text(function(d) { 
//       return d.source.name + " → " + d.target.name + "\n" + format(d.value);
//        });

var node = svg.append("g").selectAll(".node")
    .data(mydata.nodes)
  .enter().append("g")
    .attr("class", "node")
    .attr("transform", function(d) { return "translate(" + d.x + "," + d.y + ")"; })
  .call(d3.behavior.drag()
    .origin(function(d) { return d; })
    .on("dragstart", function() { this.parentNode.appendChild(this); })
    .on("drag", dragmove));

node.append("text")
    .attr("x", -6)
    .attr("y", function(d) { return d.dy / 2; })
    .attr("dy", ".35em")
    .attr("text-anchor", "end")
    .attr("transform", null)
    .text(function(d) { return d.type+d.id+': '+d.body; })
  .filter(function(d) { return d.x < width / 2; })

    .attr("data-type", function(d) { return d.type; })
    .attr("data-id", function(d) { return d.id; })
    .attr("x", 6 + sankey.nodeWidth())
    .attr("text-anchor", "start");

node.append("rect")
    .attr("height", function(d) { return d.dy; })
    .attr("width", sankey.nodeWidth())
    .attr("data-type", function(d) { return d.type; })
    .attr("data-id", function(d) { return d.id; })
    .style("fill", function(d) { 
      var nodetype=d.type;
      if(nodetype=="Q"){
        return d.color = "#eab863"; 
      }else if(nodetype=="A"){
        return d.color = "#bdebe1"; 
      }else if(nodetype=="T"){
        return d.color = "#b56686"; 
      }
    })
    .style("stroke", function(d) { return '#888888'; })
  .append("title")
    .text(function(d) { 
      var nodetype=d.type;
      var str='';
      if(nodetype=='Q'){ 
        str="問題";
      }else if(nodetype=="A"){
        str="選択肢";
      }else if(nodetype=="T"){
        str="結論";
      }
      return str +d.id+ "\n" + d.body; 
    });



function dragmove(d) {
  d3.select(this).attr("transform", "translate(" + d.x + "," + (d.y = Math.max(0, Math.min(height - d.dy, d3.event.y))) + ")");
  sankey.relayout();
  link.attr("d", path);
}

</script>
<script src="__PUBLIC__/js/admin.js"></script>
</html>