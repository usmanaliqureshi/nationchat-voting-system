$(document).ready(function(){
  $(".personalize").mouseenter(function(){
  $(".togper").css("visibility","visible");
  	if($(".toguser").css("visibility","visible")) {
	$(".toguser").css("visibility","hidden");
	} 
	if($(".togmng").css("visibility","visible")) {
	$(".togmng").css("visibility","hidden");
	}
  });
  
    $(".togper").mouseleave(function(){
    $(".togper").css("visibility","hidden");
  });
  
  /*$(".personalize").mouseleave(function(){
  if($(".togper").mouseenter) {
  $(".togper").css("visibility","visible");
  } else if($(".togper").mouseleave) {
  $(".togper").css("visibility","hidden");
  });*/
  
  $(".contact").mouseenter(function(){
	$(".togper").css("visibility","hidden");
	$(".toguser").css("visibility","hidden");
	$(".togmng").css("visibility","hidden");
  });
  
  $(".logout").mouseenter(function(){
	$(".togper").css("visibility","hidden");
	$(".toguser").css("visibility","hidden");
	$(".togmng").css("visibility","hidden");
  });
  
  $(".dash").mouseenter(function(){
	$(".togper").css("visibility","hidden");
	$(".toguser").css("visibility","hidden");
	$(".togmng").css("visibility","hidden");
  });
  
  $(".usermgmt").mouseenter(function(){
    $(".toguser").css("visibility","visible");
	if($(".togper").css("visibility","visible")) {
	$(".togper").css("visibility","hidden");
	} 
	if($(".togmng").css("visibility","visible")) {
	$(".togmng").css("visibility","hidden");
	}
  });
  
  
  $(".toguser").mouseleave(function(){
    $(".toguser").css("visibility","hidden");
  });
  
    $(".usermgmtactive").mouseenter(function(){
    $(".toguser").css("visibility","visible");
	if($(".togper").css("visibility","visible")) {
	$(".togper").css("visibility","hidden");
	} 
	if($(".togmng").css("visibility","visible")) {
	$(".togmng").css("visibility","hidden");
	}
  });
  
  
  $(".toguser").mouseleave(function(){
    $(".toguser").css("visibility","hidden");
  });
  
    $(".mng").mouseenter(function(){
    $(".togmng").css("visibility","visible");
	if($(".toguser").css("visibility","visible")) {
	$(".toguser").css("visibility","hidden");
	} 
	if($(".togper").css("visibility","visible")) {
	$(".togper").css("visibility","hidden");
	}
  });
  
  
  $(".togmng").mouseleave(function(){
    $(".togmng").css("visibility","hidden");
  });
  
      $(".mngactive").mouseenter(function(){
    $(".togmng").css("visibility","visible");
	if($(".toguser").css("visibility","visible")) {
	$(".toguser").css("visibility","hidden");
	} 
	if($(".togper").css("visibility","visible")) {
	$(".togper").css("visibility","hidden");
	}
  });
  
  
  $(".togmng").mouseleave(function(){
    $(".togmng").css("visibility","hidden");
  });
  
 });