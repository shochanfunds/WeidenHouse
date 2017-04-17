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
$(function(){
  $('#sidebar_list li p').hover(function(){
    $(this).next('ul').stop().fadeIn('fast');
  },function(){
    $(this).next('ul').stop().fadeOut('fast');
  });
});
//searchformにてユーザを絞り出す関数
$(function(){
  //searchformの中身を取得
  $("#search_form_input div input").keyup(function(e){
    var form_value = $(this).val();
    var form_id = this.id;
    //inputのidを取得し、それぞれをdata属性と照らし合わせてdisplayプロパティを操作
    switch (form_id) {
      case "client-name":
        $("tbody tr").each(function(){
          var client_name = $(this).data("username");
          if(client_name.match(form_value)){
            $(this).css("display","table-row");
          }else{
            $(this).css("display","none");
          }
        });
        break;
      case "project-name":
        $("tbody tr").each(function(){
          var project_name = $(this).data("projectname");
          if(project_name.match(form_value)){
            $(this).css("display","table-row");
          }else{
            $(this).css("display","none");
          }
        });
        break;
      case "group-name":
        $("tbody tr").each(function(){
          var group_name = $(this).data("groupname");
          if(group_name.match(form_value)){
            $(this).css("display","table-row");
          }else{
            $(this).css("display","none");
          }
        });
        break;
      default:
        console.log("error");
        break;
    }
  });
});
