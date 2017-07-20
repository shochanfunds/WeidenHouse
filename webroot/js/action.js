//QuickSearchのアクションについて記述した関数
$(function(){
  //カーソルを合わせたときの反応を記述

  $('search_form').hover(function(){
      $(this).stop().fadeTo('fast',.3);
  },function(){
      $(this).stop().fadeTo('fast',3);
  }
);
  //クリックした時のアクションを記述
});
$(".not_hifun").keyup(function(){

  var text = $(this).val();
  if(text.indexOf('-') != -1){
    alert("ハイフンだけは含めないでください。取り除いておきます。");
    $(this).val(text.replace('-',''));
  }
});
//searchformの開閉を制御するスクリプト

$(".hover_effect h2").click(function(){
  $("#form_div").slideToggle();
});


$('#sidebar_list li p').click(function(){
  $(this).next().slideToggle();
});

$(".project_client h2").click(function(){
  $("#form_div").slideToggle();
});

$(document).ready(function(){
  var data_1 = window.parent.screen.width;
  var data_2 = window.parent.screen.height;
  document.getElementById("physicalwidth").value= data_1;
  document.getElementById("physicalheight").value= data_2;
});
