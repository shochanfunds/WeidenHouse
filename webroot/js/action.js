//QuickSearchのアクションについて記述した関数
$(function(){
  //カーソルを合わせたときの反応を記述
  $('#quick_search_title').hover(function(){
      $(this).stop().fadeTo('fast',.3);
  },function(){
      $(this).stop().fadeTo('fast',3);
  }
);
  //クリックした時のアクションを記述
  $('.search_form').hover(function(){
    $('#search_form_input').slideToggle('fast');
  });
});
/*
$(function(){
  $('#sidebar_list li p').hover(function(){
    $(this).next('ul').stop().fadeIn('fast');
  },function(){
    $(this).next('ul').stop().fadeOut('fast');
  });
});
*/
//searchformにてユーザを絞り出す関数
$(function(){
  //searchformの中身を取得
  $("#search_form_input div input").keyup(function(e){
    var form_value = $(this).val();
    var form_id = this.id;
    //inputのidを取得し、それぞれをdata属性と照らし合わせてdisplayプロパティを操作
    var form_value = $("#search_form_input").serializeArray();
    var client_name = form_value[0]["value"];
    var client_name_ruby = form_value[1]["value"];
    var project_name = form_value[2]["value"];
    var category = form_value[3]["value"];
    var birthday = form_value[4]["value"];
    var phone_number = form_value[5]["value"];
    $("tbody tr").each(function(){
      if($(this).data("username").match(client_name) && $(this).data("client-name-ruby").match(client_name_ruby) && $(this).data("birthday").match(birthday) && $(this).data("projectname").match(project_name) && $(this).data("groupname").match(category)){
        $(this).css("display" , 'table-row');
      }else{
        $(this).css("display", 'none');
      };
    });
  });
});
