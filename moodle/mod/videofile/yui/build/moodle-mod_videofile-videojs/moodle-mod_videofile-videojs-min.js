YUI.add("moodle-mod_videofile-videojs",function(e,t){M.mod_videofile=M.mod_videofile||{},M.mod_videofile.videojs={init:function(e,t,n,r,i){function f(){var e=u.offsetWidth;s.width(e).height(e*a)}var s=videojs("videofile-"+e),o=document.getElementById(s.id()),u=o.parentElement,a=r/n;i&&(o.style.maxWidth=n+"px",o.style.maxHeight=r+"px"),f(),window.onresize=f}}},"@VERSION@",{requires:["base","node","event"]});
