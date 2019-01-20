$(document).ready(function(){

    //Handling the trick list on mobile view
    var trickList = (function() {
      
      var trickContainer = $(".openDown");
      var ulList = $(".trickList");

      var bindFunctions = function() {
           trickContainer.on("click", function() {
            
               var parentContainer = $(this).parent();
               $(parentContainer).find("ul").toggle();
            
              
           });
          
            //$("input#share").on("click", inputClick)
      };
        

      var init = function() {
            bindFunctions();

       };


        return {
            init: init
        }


    })();

    trickList.init();
    

/*
    $(window).resize(function() {
        
        if (window.matchMedia('(max-width: 992px)').matches) {
            console.log("hey");
        }

        /*
        if ($(window).width() < 992) {
            
            console.log("hey");
        }
        */



});



