window.onload=function()
               {
                  $("#Post,#Newborrow").hide();
                 
               };
$("#smallpost :text").focus(function()
                      {
                        $(this).hide();
                        $("#Post").slideDown(2000);
                        $("#Post").show();
                      });

$("#showchatnotif").click(function()
                      {
                         $("#chatnotif").slideToggle(1000);

                       });

$("#shownotifications").click(function()
                      {
                         $("#notifs").slideToggle(1000);

                       });

$("#adminnotif").click(function()
                      {
                         $("#notifmenu").slideToggle(1000);

                       });

$("#notifmessage").click(function()
                      {
                         $("#messagemenu").slideToggle(1000);

                       });


$("#out").click(function()
                      {
                         $("#outmenu").slideToggle(1000);

                       });
