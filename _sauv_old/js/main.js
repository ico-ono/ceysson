jQuery(function($){
   
   var current = null;                                                  // Element actuellement survolé
   var t = parseInt($('#photos a:first span.title').css('top'));       // Position du titre par rapport au top
   var l = parseInt($('#photos a:first span.desc').css('left'));      // Poisition du contenu par rapport à la gauche
   
   // Lorsque l'on survole un des lien
   $('#photos a').mouseover(function(){
       // On vérifie que l'on ne suvole pas l'élément courant
       if(current && $(this).index() != current.index()){
           // On cache les infos de l'élément précédement sélectionné
           current.find('span.bg').stop().fadeOut();
           current.find('span.title').show().animate({
               top : t - 25,
               opacity : 0
           });
           current.find('span.desc').show().animate({
               left : l - 50,
               opacity : 0
           });
       }
       // Si on survol l'éménent déja sélectionné on ne fait rien de plus
       if(current && $(this).index() == current.index()){
           return null; 
       }
       // On anime le fond/titre et description
       $(this).find('span.bg').hide().stop().fadeTo(500,0.7);
       $(this).find('span.title').stop().css({
           opacity : 0,
           top : t + 25
       }).animate({
           opacity : 1,
           top : t
       });
       $(this).find('span.desc').stop().css({
           opacity : 0,
           left : l + 50
       }).animate({
           opacity : 1,
           left : l
       });
       // On modifie l'élément courant
       current = $(this); 
   });
   
});


$(function(){
    
    $("#menu li a").mouseover(function(){
         $(this).stop().animate({backgroundPosition:"0px -200px"},500);
    });
    $("#menu li a").mouseout(function(){
         $(this).stop().animate({backgroundPosition:"0px 0px"},500);
    });  
})