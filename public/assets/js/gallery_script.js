$(document).ready(function(){
    $(".gallery-card").click(function(){
    var t = $(this).attr("src");
    $(".modal-body").html("<img src='"+t+"' class='modal-img'>");
    $("#myModal").modal();
  });
  
  $(".vid").click(function(){
    var v = $("video > source");
    var t = v.attr("src");
    $(".modal-body").html("<video class='model-vid' controls><source src='"+t+"' type='video/mp4'></source></video>");
    $("#myModal").modal();  
  });
  });//EOF Document.ready