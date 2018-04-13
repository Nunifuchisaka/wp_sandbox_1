;(function($, window, document, undefined){
"use strict";

window.COMMON = new Object();

COMMON.device = (function(u){
  return {
    Tablet:(u.indexOf("windows") != -1 && u.indexOf("touch") != -1 && u.indexOf("tablet pc") == -1) 
      || u.indexOf("ipad") != -1
      || (u.indexOf("android") != -1 && u.indexOf("mobile") == -1)
      || (u.indexOf("firefox") != -1 && u.indexOf("tablet") != -1)
      || u.indexOf("kindle") != -1
      || u.indexOf("silk") != -1
      || u.indexOf("playbook") != -1,
    Mobile:(u.indexOf("windows") != -1 && u.indexOf("phone") != -1)
      || u.indexOf("iphone") != -1
      || u.indexOf("ipod") != -1
      || (u.indexOf("android") != -1 && u.indexOf("mobile") != -1)
      || (u.indexOf("firefox") != -1 && u.indexOf("mobile") != -1)
      || u.indexOf("blackberry") != -1
  }
})(window.navigator.userAgent.toLowerCase());



/*
## SmoothScroll
*/

COMMON.SmoothScroll = function(opts) {
  opts = _.extend({
    target: ".js_smooth-scroll_1"
  }, opts);
  
  $(opts.target).click(function(){
    var href = $(this).attr("href");
    COMMON.$html_body.stop(true,false).animate({
      scrollTop: $(href).offset().top
    }, 1500, "easeOutExpo");
    return false;
  });
}



$(function(){
  
  COMMON.$window = $(window);
  COMMON.$document = $(document);
  COMMON.$html_body = $("html, body");
  
  
  new Vue({
    el: "#hobby",
    data: {
      checkedNames: []
    }
  });
  
  
  new COMMON.SmoothScroll();
  
});


})(jQuery, this, this.document);