try{jQuery(document).ready(function($){window.grading_function=function(){let inside=$(document).find('.inside-circle');if(inside){$.each(inside,function(index,value){let grading=$(this).data('value');let percent=grading/5*100;percent=percent*180/100;$(this).html(grading);var parent=$(this).parents('.myLoading-indicator-circle-wrap');rotate(parent.find('.mask.full'),percent);rotate(parent.find('.fill'),percent);})}}
window.grading_function();function rotate(el,degree){el.css({WebkitTransform:'rotate('+degree+'deg)'});el.css({'-moz-transform':'rotate('+degree+'deg)'});}});}catch(e){}