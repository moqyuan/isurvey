$(document).ready(function(){

  //click reck
  $("rect").click(function(){
    var el=$(this);
    var eltype=el.attr("data-type");
    if(eltype=="Q"){//call Q out

      $.ajax(getq, {
        timeout: 3000,
        success: function(data) {
          $("#editqtitle").html("Edit Question "+data.id);
          $("#editqcontent").html(data.body);
          $("#editqdelete").hide();
          $("#editqsave").attr("data-id",data.id);
          $("#editQModal").modal("show");
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
          "type": el.attr("data-type"),
          "id": el.attr("data-id")
        }
      });

    }else if(eltype=="T"){//call T out
      $.ajax(gett, {
      timeout: 3000,
      success: function(data) {
        $("#editttitle").html("Edit Conclusion "+data.id);
        $("#edittcontent").html(data.body);
        $("#edittdelete").hide();
        $("#edittsave").attr("data-id",data.id);
        $("#editTModal").modal("show");
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
        "type": el.attr("data-type"),
        "id": el.attr("data-id")
      }
    });

    }else if(eltype=="A"){//call A out
      $.ajax(geta, {
      timeout: 3000,
      success: function(data) {
        var fromA='Q_'+data.qid;
        var toA=data.target;
        //$("option").attr("selected","");
        $("#editafrom").find("option[value='"+fromA+"']").attr("selected","selected");
        $("#editato").find("option[value='"+toA+"']").attr("selected","selected");
        $("#editatitle").html("Edit Choice "+data.id);
        $("#editacontent").html(data.body);
        $("#editasave").attr("data-id",data.id);
        $("#editadelete").attr("data-id",data.id);
        $("#editAModal").modal("show");
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
        "type": el.attr("data-type"),
        "id": el.attr("data-id")
      }
      });
      
    } 
  });
  //click Q none
  $(".qnone").click(function(){
    var el=$(this);
    $.ajax(getq, {
      timeout: 3000,
      success: function(data) {
        $("#editqtitle").html("Edit Question "+data.id);
        $("#editqcontent").html(data.body);
        $("#editqdelete").show();
        $("#editqdelete").attr("data-id",data.id);
        $("#editqsave").attr("data-id",data.id);
        $("#editQModal").modal("show");
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
        "type": el.attr("data-type"),
        "id": el.attr("data-id")
      }
    });
  });
  //click T none
  $(".tnone").click(function(){
    var el=$(this);
    $.ajax(gett, {
      timeout: 3000,
      success: function(data) {
        $("#editttitle").html("Edit Conclusion "+data.id);
        $("#edittcontent").html(data.body);
        $("#edittdelete").show();
        $("#edittdelete").attr("data-id",data.id);
        $("#edittsave").attr("data-id",data.id);
        $("#editTModal").modal("show");
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
        "type": el.attr("data-type"),
        "id": el.attr("data-id")
      }
    });
  });



  //---additems
  $("#addQ").click(function(){
    $("#addQModal").modal("show");
  });

  $("#addA").click(function(){
    $("#addAModal").modal("show");
  });


  $("#addT").click(function(){
    $("#addTModal").modal("show");
  });
  //---/additems

  //---addqmodal actions
  $("#addqadd").click(function(){
    if($("#addqcontent").val()==""){
      $("#addqstatus").html('<div class="alert alert-danger">Content is EMPTY!</div>');
      return;
    }
    $.ajax(addq, {
      timeout: 3000,
      success: function(data) {
        window.location.reload();
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
      data: {
        "content": $("#addqcontent").val()
      }
    });
  });

  $("#addtadd").click(function(){
    if($("#addtcontent").val()==""){
      $("#addtstatus").html('<div class="alert alert-danger">Content is EMPTY!</div>');
      return;
    }
    $.ajax(addt, {
      timeout: 3000,
      success: function(data) {
        window.location.reload();
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
      data: {
        "content": $("#addtcontent").val()
      }
    });
  });
  $("#addaadd").click(function(){
    var afrom=$("#addafrom").val();
    var ato=$("#addato").val();
    var acontent=$("#addacontent").val();

    if(afrom==""){
      $("#addastatus").html('<div class="alert alert-danger">FROM is EMPTY!</div>');
      return;
    }else if(ato==""){
      $("#addastatus").html('<div class="alert alert-danger">TO is EMPTY!</div>');
      return;
    }else if(acontent==""){
      $("#addastatus").html('<div class="alert alert-danger">CONTENT is EMPTY!</div>');
      return;
    }
    if(afrom==ato){
      $("#addastatus").html('<div class="alert alert-danger">FROM and TO CANNOT be SAME!</div>');
      return;
    }

    $.ajax(adda, {
      timeout: 3000,
      success: function(data) {
        window.location.reload();
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
      data: {
        "content": acontent,
        "from": afrom,
        "to": ato
      }
    });
  });

  

  //-------------delete---
  $("#editqdelete").click(function(){
    $.ajax(delq, {
      timeout: 3000,
      success: function(data) {
        window.location.reload();
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
      data: {
        "id": $("#editqdelete").attr("data-id")
      }
    });

  })

  $("#edittdelete").click(function(){
    $.ajax(delt, {
      timeout: 3000,
      success: function(data) {
        window.location.reload();
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
      data: {
        "id": $("#edittdelete").attr("data-id")
      }
    });

  })

  $("#editadelete").click(function(){
    $.ajax(dela, {
      timeout: 3000,
      success: function(data) {
        window.location.reload();
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
      data: {
        "id": $("#editadelete").attr("data-id")
      }
    });

  })

  //---------edit-------------------------
  $("#editqsave").click(function(){
    if($("#editqcontent").val()==""){
      $("#editqstatus").html('<div class="alert alert-danger">Content is EMPTY!</div>');
      return;
    }
    $.ajax(editq, {
      timeout: 3000,
      success: function(data) {
        window.location.reload();
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
      data: {
        "content": $("#editqcontent").val(),
        "id":$(this).attr("data-id")
      }
    });
  });

  $("#edittsave").click(function(){
    if($("#edittcontent").val()==""){
      $("#edittstatus").html('<div class="alert alert-danger">Content is EMPTY!</div>');
      return;
    }
    $.ajax(editt, {
      timeout: 3000,
      success: function(data) {
        window.location.reload();
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
      data: {
        "content": $("#edittcontent").val(),
        "id":$(this).attr("data-id")
      }
    });
  });

  $("#editasave").click(function(){
    var afrom=$("#editafrom").val();
    var ato=$("#editato").val();
    var acontent=$("#editacontent").val();

    if(afrom==""){
      $("#editastatus").html('<div class="alert alert-danger">FROM is EMPTY!</div>');
      return;
    }else if(ato==""){
      $("#editastatus").html('<div class="alert alert-danger">TO is EMPTY!</div>');
      return;
    }else if(acontent==""){
      $("#editastatus").html('<div class="alert alert-danger">CONTENT is EMPTY!</div>');
      return;
    }
    if(afrom==ato){
      $("#editastatus").html('<div class="alert alert-danger">FROM and TO CANNOT be SAME!</div>');
      return;
    }

    $.ajax(edita, {
      timeout: 3000,
      success: function(data) {
        window.location.reload();
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
      data: {
        "content": acontent,
        "from": afrom,
        "to": ato,
        "id": $(this).attr("data-id")
      }
    });
  });




  //end
});