$(".carousel").carousel({
                              interval:6000
                        });
$("#offers .btn-danger").click(function()
                              {
                                    $(this).parent().hide();                           
                              });
/*********************************************************************/
$(document).ready(function()
                  {
                        $("body").css("overflow","auto");
                        $("#loading img").fadeOut(1000,function()
                                                  {
                                                        $(this).parent().fadeOut(1000,function()
                                                                                 {
                                                                                          $(this).remove();
                                                                                 });
                                                  });
                  });
/*********************************************************************/
var scrolltop=$("#scrolltop");
$(window).scroll(function()
                 {
                       console.log($(this).scrollTop());
                       if($(this).scrollTop()>=300)
                       {
                              scrolltop.show();
                       }
                       else
                       {
                              scrolltop.hide();
                       }
                 });
scrolltop.click(function()
                {
                      $("html,body").animate({scrollTop:0},600);
                });
/*********************************************************************/



