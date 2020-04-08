$(document).ready(function()
 {
         $("html").niceScroll({
            cursorcolor:"#ddd",
            cursorwidth:"13px",
            background:"rgba(20,20,20,0.3)",
            cursorborder:"1px solid aquamarine",
            cursorborderradius:10
            });
        $(".gear-check").click(function()
        {
            $(".color-option").fadeToggle();
        } );
        
           
       /*color opion */
       
       $(".color-option ul li").click(function()
        {
             
              $("link[href*='theme']").attr("href",$(this).attr("data-value"));
        }                          
       );
     
       
       var mybtn = $(".top-btn");
       $(window).scroll(function(){
              if($(this).scrollTop() >= 700)
              {
                     mybtn.fadeIn(700);
              }
              else
              {
                     mybtn.fadeOut(700);
              }
              });
       mybtn.click(function(){
         $("html,body").animate({scrollTop : 0},600);     
              });
      
 }
 
);

/*start loading */
$(window).load(function(){
        
       $(".loading .sk-folding-cube").fadeOut(1000,function(){
              $(this).parent().fadeOut(1000,function(){
                     $("body").css("overflow","auto");
                     $(this).remove();  
                     });
              });   
       });
 $(".grid-quarter").imagefill(); 

