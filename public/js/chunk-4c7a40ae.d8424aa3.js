(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-4c7a40ae"],{"216c":function(t,n,e){"use strict";var i=function(){var t=this,n=t.$createElement,e=t._self._c||n;return e("div",{staticClass:"rw-nav"},[e("el-row",[e("el-col",{attrs:{span:16}},[e("div",{staticClass:"grid-content links"},[t._l(t.links,(function(n,i){return[void 0!==n.to&&n.to?e("router-link",{key:i,class:n.active||1===t.links.length||t.menu===n.menu?"active":"",attrs:{to:n.to,tag:"span"}},[t._v(" "+t._s(n.title)+" ")]):t._e(),void 0!==n.to&&n.to?t._e():e("span",{key:"nav-"+i,class:n.active||1===t.links.length?"active":""},[t._v(" "+t._s(n.title)+" ")])]}))],2)]),e("el-col",{attrs:{span:8}},[e("div",{staticClass:"grid-content btns"},[t._l(t.btns,(function(n,i){return[void 0!==n.to&&n.to?e("router-link",{key:i,attrs:{to:n.to}},[e("el-button",{attrs:{icon:n.icon||"",type:n.type?n.type:"",size:"small",plain:""}},[t._v(" "+t._s(n.title)+" ")])],1):t._e(),void 0!==n.to&&n.to?t._e():e("el-button",{key:i,attrs:{type:n.type?n.type:"primary",icon:n.icon||"",size:"small",plain:""},on:{click:function(e){return t.handleClick(n.command)}}},[t._v(" "+t._s(n.title)+" ")])]}))],2)])],1)],1)},s=[],l=e("6c71"),a={props:{links:{type:Array,default:function(){return[]}},btns:{type:Array,default:function(){return[]}}},computed:Object(l["b"])({menu:function(t){return t.app.menu}}),methods:{handleClick:function(t){this.$emit("btnEvent",t)}}},c=a,o=e("bdd7"),r=Object(o["a"])(c,i,s,!1,null,null,null);n["a"]=r.exports},eff6:function(t,n,e){"use strict";e.r(n);var i=function(){var t=this,n=t.$createElement,e=t._self._c||n;return e("div",{staticClass:"rw-doc"},[e("Nav",{attrs:{links:t.links}}),t._m(0)],1)},s=[function(){var t=this,n=t.$createElement,e=t._self._c||n;return e("div",{staticClass:"mt-20"},[e("h1",[t._v("功能开发中")])])}],l=e("216c"),a={components:{Nav:l["a"]},data:function(){return{links:[{title:"BUG管理",to:"/bug",menu:"bug.list"}]}}},c=a,o=e("bdd7"),r=Object(o["a"])(c,i,s,!1,null,null,null);n["default"]=r.exports}}]);