$('#password').focusin(function(){
  $('form').addClass('up')
});
$('#password').focusout(function(){
  $('form').removeClass('up')
});

// Panda Eye move
$(document).on( "mousemove", function( event ) {
  var dw = $(document).width() / 15;
  var dh = $(document).height() / 15;
  var x = event.pageX/ dw;
  var y = event.pageY/ dh;
  $('.eye-ball').css({
    width : x,
    height : y
  });
});

// validation
$('.btn').click(function(){
  $('form').addClass('wrong-entry');
    setTimeout(function(){ 
       $('form').removeClass('wrong-entry');
     },3000 );
});


//Canvas
var c = document.getElementById("nouveau_canvas");
var ctx = c.getContext("2d"); //Contexte 2D
ctx.moveTo(0,0); //Point de référence
ctx.lineTo(200,100); //Axe
ctx.stroke(); //Dessine

var c = document.getElementById("canvas_one");
var ctx = c.getContext("2d");
ctx.beginPath();
ctx.arc(95, 50, 40, 0,2*Math.PI);
ctx.stroke();

var c = document.getElementById("canvas_two");
var ctx = c.getContext("2d");
ctx.font = "30px Arial";
ctx.fillText("Bonjour",10,50);

//Jquery use


$(document).ready(function(){
  $( ".button_form" ).click(function() {
  $( ".canvas_container" ).toggle();
});
});