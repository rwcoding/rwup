(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-b937b0a8"],{"20ec":function(t,n,e){"use strict";e("48b5")},"48b5":function(t,n,e){},"52cd":function(t,n,e){"use strict";e.r(n);var c=function(){var t=this,n=t.$createElement,e=t._self._c||n;return e("div",{staticClass:"content markdown-body",domProps:{innerHTML:t._s(t.content)}})},o=[],a=e("de52"),i=(e("24aa"),e("c809")),r={data:function(){return{loading:!0,code:"",content:"",title:""}},created:function(){var t=this;this.$route.params.code&&i["a"].share({code:this.$route.params.code}).then((function(n){t.title=n.title,t.content=n.content,t.loading=!1,a["marked"].parse("<h1>"+n.title+"</h1> \n\n"+n.content,(function(n,e){t.content=e}))}))}},s=r,d=(e("20ec"),e("bdd7")),u=Object(d["a"])(s,c,o,!1,null,null,null);n["default"]=u.exports}}]);