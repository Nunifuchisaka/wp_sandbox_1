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
    el: "#article",
    data: {
      age: [],
      sex: "",
      hobby: []
    },
    created: function () {
      console.log("created");
    },
    method: function () {
      console.log("method");
    },
    beforeUpdate: function(){
      console.log("beforeUpdate");
    },
    updated: function (a,b,c) {
      var self = this;
      this.$nextTick(function () {
        console.group("updated");
        //console.log(self);
        self.age = age_hoge(self.age);
        console.log("age", self.age, age);
        console.groupEnd();
      });
    }
  });
  
  
  new COMMON.SmoothScroll();
  
});


function age_hoge(age){
  console.group("age_hoge");
  console.log(age);
  age = age.split("_");
  console.groupEnd();
  return age;
}


})(jQuery, this, this.document);