(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-4322e09a"],{"0502":function(t,e,n){"use strict";var i=n("9d66");t.exports=function(t,e){var n=[][t];return!!n&&i((function(){n.call(null,e||function(){throw 1},1)}))}},"0e68":function(t,e,n){var i=n("6266"),r=n("21f6"),o=n("442e"),c=n("ed2d"),a=n("a4f0"),s=n("af17"),u=r([].push),d=function(t){var e=1==t,n=2==t,r=3==t,d=4==t,l=6==t,f=7==t,h=5==t||l;return function(p,v,m,b){for(var y,g,I=c(p),w=o(I),E=i(v,m),j=a(w),k=0,_=b||s,x=e?_(p,j):n||f?_(p,0):void 0;j>k;k++)if((h||k in w)&&(y=w[k],g=E(y,k,I),t))if(e)x[k]=g;else if(g)switch(t){case 3:return!0;case 5:return y;case 6:return k;case 2:u(x,y)}else switch(t){case 4:return!1;case 7:u(x,y)}return l?-1:r||d?d:x}};t.exports={forEach:d(0),map:d(1),filter:d(2),some:d(3),every:d(4),find:d(5),findIndex:d(6),filterReject:d(7)}},"153c":function(t,e,n){var i=n("21f6"),r=n("218d"),o=n("420c"),c=n("fc5c"),a=i("".replace),s="["+c+"]",u=RegExp("^"+s+s+"*"),d=RegExp(s+s+"*$"),l=function(t){return function(e){var n=o(r(e));return 1&t&&(n=a(n,u,"")),2&t&&(n=a(n,d,"")),n}};t.exports={start:l(1),end:l(2),trim:l(3)}},"1e2d":function(t,e,n){var i=n("2ef6"),r=n("369e"),o=i.TypeError;t.exports=function(t){if(r(t))throw o("The method doesn't accept regular expressions");return t}},"28ee":function(t,e,n){"use strict";var i=n("49d9"),r=n("9614"),o=n("1478"),c=n("218d"),a=n("7549"),s=n("420c"),u=n("903d"),d=n("b653");r("search",(function(t,e,n){return[function(e){var n=c(this),r=void 0==e?void 0:u(e,t);return r?i(r,e,n):new RegExp(e)[t](s(n))},function(t){var i=o(this),r=s(t),c=n(e,i,r);if(c.done)return c.value;var u=i.lastIndex;a(u,0)||(i.lastIndex=0);var l=d(i,r);return a(i.lastIndex,u)||(i.lastIndex=u),null===l?-1:l.index}]}))},3618:function(t,e,n){"use strict";n("44db")},"384f":function(t,e,n){"use strict";n("61ae")},"44db":function(t,e,n){},"5ad4":function(t,e,n){var i=n("769d"),r=n("0bd7"),o=n("4841");t.exports=function(t,e,n){var c,a;return o&&i(c=e.constructor)&&c!==n&&r(a=c.prototype)&&a!==n.prototype&&o(t,a),t}},"5c6f":function(t,e,n){"use strict";n.r(e);var i=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("table",{ref:"table",staticStyle:{background:"white"},attrs:{width:"100%",border:"0",cellspacing:"0",cellpadding:"0"}},[n("tr",[n("td",{staticClass:"menus",attrs:{valign:"top"}},[t.full?n("h3",[t._v(t._s(t.project?t.project.name:""))]):t._e(),n("ul",t._l(t.menus,(function(e){return n("TreeItem",{key:e.type+"-"+e.id,attrs:{menu:e,id:t.id,level:1,model:e},on:{loadDoc:t.loadDoc}})})),1)]),n("td",{attrs:{valign:"top",align:"left"}},[n("div",{ref:"content",staticClass:"content markdown-body",domProps:{innerHTML:t._s(t.content)}}),t.full?n("div",{staticClass:"toolbar"},[n("span",{on:{click:function(e){t.search=!t.search}}},[n("i",{staticClass:"el-icon-search"})]),n("span",{on:{click:function(e){return t.$router.go(-1)}}},[n("i",{staticClass:"el-icon-arrow-left"})]),this.id>0?n("router-link",{attrs:{to:"/doc/content/"+this.id,tag:"span"}},[n("i",{staticClass:"el-icon-edit-outline"})]):t._e(),n("router-link",{attrs:{to:"/",tag:"span"}},[n("i",{staticClass:"el-icon-s-home"})])],1):t._e(),t.search?n("Search",{attrs:{projectId:t.projectId},on:{loadDoc:t.loadDoc}}):t._e()],1)])])},r=[],o=(n("fd13"),n("5f55"),n("28ee"),n("a4c0"),n("f90c"),n("bda7"),n("de52")),c=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("li",{key:t.menu.type+"-"+t.menu.id,class:t.active},[n("p",{on:{click:function(e){return t.onClick(t.menu)}}},[1===t.menu.type?[n("i",{class:t.menu.open?"el-icon-folder-opened":"el-icon-folder",staticStyle:{color:"rgb(165 165 26)","font-weight":"700"}})]:[n("i",{staticClass:"el-icon-document"})],t._v(" "+t._s(t.menu.title)+" ")],2),t.menu.children&&t.menu.children.length?n("ul",{class:t.menu.open?"open":"close"},t._l(t.menu.children,(function(e){return n("tree-item",{key:e.type+"-"+e.id,attrs:{menu:e,level:t.level+1,id:t.id,model:e},on:{loadDoc:t.loadDoc}})})),1):t._e()])},a=[],s=(n("7121"),{name:"TreeItem",props:["menu","level","id"],data:function(){return{}},computed:{active:function(){return this.id===this.menu.id&&2===this.menu.type?"active level-"+this.level:"level-"+this.level}},methods:{onClick:function(t){if(1===t.type)t.open=!t.open;else{if(this.$emit("loadDoc",t.id),this.id===this.menu.id)return;this.$router.replace({params:{id:this.menu.id}})}},loadDoc:function(t){this.$emit("loadDoc",t)}}}),u=s,d=n("bdd7"),l=Object(d["a"])(u,c,a,!1,null,null,null),f=l.exports,h=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{staticClass:"search"},[n("el-input",{ref:"input",attrs:{placeholder:"请输入搜索内容"},model:{value:t.key,callback:function(e){t.key=e},expression:"key"}}),n("div",{staticClass:"list"},t._l(t.list,(function(e){return n("p",{key:e.id,class:t.selectedId===e.id?"active":"",on:{click:function(n){return t.$emit("loadDoc",e.id)}}},[t._v(" "+t._s(e.title)+" ")])})),0)],1)},p=[],v=(n("cae2"),n("e475")),m={props:{projectId:{type:Number,required:!0}},data:function(){return{key:"",selectedIndex:-1,selectedId:0,list:[]}},mounted:function(){this.$refs.input.focus(),window.addEventListener("keydown",this.onEnter)},beforeDestroy:function(){window.removeEventListener("keydown",this.onEnter)},methods:{onEnter:function(t){var e=this;if(("Enter"===t.code||"ArrowDown"===t.code)&&this.key){if(t.preventDefault(),"ArrowDown"===t.code){if(0===this.list.length)return;this.$refs.input.blur();var n=this.selectedIndex+1;return n>=this.list.length&&(n=0),this.selectedIndex=n,void(this.selectedId=this.list[n].id)}this.selectedId>0?this.$emit("loadDoc",this.selectedId):v["a"].search({project_id:this.projectId,key:this.key}).then((function(t){e.list=t.datas}))}}}},b=m,y=(n("3618"),Object(d["a"])(b,h,p,!1,null,null,null)),g=y.exports,I=(n("24aa"),{components:{TreeItem:f,Search:g},data:function(){return{search:!1,shiftKeyTime:0,full:!1,loading:!0,isFirst:!0,content:"",id:0,projectId:0,project:{},doc:{},menus:[]}},created:function(){var t=this;this.$emit("load","read"),this.$route.path.startsWith("/read")&&(this.full=!0),this.projectId=this.$store.state.project.id,this.$route.params.id&&(this.id=parseInt(this.$route.params.id)),v["a"].tree(this.projectId).then((function(e){t.menus=e.datas,t.project=e.project,t.loading=!1,t.loadDoc()}))},mounted:function(){this.$refs.table.style.minHeight=document.documentElement.clientHeight+"px",window.addEventListener("keydown",this.onKeydown)},beforeDestroy:function(){window.removeEventListener("keydown",this.onKeydown)},methods:{loadDoc:function(t){var e=this;if(t&&(this.id=t),!this.loading){var n=this.search;this.search=!1,this.loading=!0,this.id?v["a"].info(this.id).then((function(t){e.doc=t,o["marked"].parse("<h1>"+t.title+"</h1> \n\n"+t.content,(function(t,n){e.content=n})),(e.isFirst||n)&&e.menus.forEach((function(e){1===e.type&&(e.id===t.directory_id&&(e.open=!0),e.children&&e.children.length>0&&e.children.forEach((function(n){1===n.type&&n.id===t.directory_id&&(n.open=!0,e.open=!0)})))})),e.isFirst=!1,e.loading=!1}),(function(t){e.loading=!1})):(this.loading=!1,this.content='<br><br><br><br><h1 style="text-align:center;border:none;">'+this.project.name+"</h1>")}},onKeydown:function(t){t.shiftKey&&(0===this.shiftKeyTime?this.shiftKeyTime=(new Date).valueOf():(new Date).valueOf()-this.shiftKeyTime<=500?this.search=!this.search:this.shiftKeyTime=(new Date).valueOf(),t.preventDefault())}}}),w=I,E=(n("384f"),Object(d["a"])(w,i,r,!1,null,null,null));e["default"]=E.exports},"61ae":function(t,e,n){},7549:function(t,e){t.exports=Object.is||function(t,e){return t===e?0!==t||1/t===1/e:t!=t&&e!=e}},"8df8":function(t,e,n){var i=n("21f6");t.exports=i(1..valueOf)},cae2:function(t,e,n){"use strict";var i=n("fdff"),r=n("2ef6"),o=n("21f6"),c=n("83d1"),a=n("7293"),s=n("8e14"),u=n("5ad4"),d=n("18e2"),l=n("cc40"),f=n("87d7"),h=n("9d66"),p=n("657a").f,v=n("39f5").f,m=n("b74d").f,b=n("8df8"),y=n("153c").trim,g="Number",I=r[g],w=I.prototype,E=r.TypeError,j=o("".slice),k=o("".charCodeAt),_=function(t){var e=f(t,"number");return"bigint"==typeof e?e:x(e)},x=function(t){var e,n,i,r,o,c,a,s,u=f(t,"number");if(l(u))throw E("Cannot convert a Symbol value to a number");if("string"==typeof u&&u.length>2)if(u=y(u),e=k(u,0),43===e||45===e){if(n=k(u,2),88===n||120===n)return NaN}else if(48===e){switch(k(u,1)){case 66:case 98:i=2,r=49;break;case 79:case 111:i=8,r=55;break;default:return+u}for(o=j(u,2),c=o.length,a=0;a<c;a++)if(s=k(o,a),s<48||s>r)return NaN;return parseInt(o,i)}return+u};if(c(g,!I(" 0o1")||!I("0b1")||I("+0x1"))){for(var O,D=function(t){var e=arguments.length<1?0:I(_(t)),n=this;return d(w,n)&&h((function(){b(n)}))?u(Object(e),n,D):e},N=i?p(I):"MAX_VALUE,MIN_VALUE,NaN,NEGATIVE_INFINITY,POSITIVE_INFINITY,EPSILON,MAX_SAFE_INTEGER,MIN_SAFE_INTEGER,isFinite,isInteger,isNaN,isSafeInteger,parseFloat,parseInt,fromString,range".split(","),T=0;N.length>T;T++)s(I,O=N[T])&&!s(D,O)&&m(D,O,v(I,O));D.prototype=w,w.constructor=D,a(r,g,D)}},cc03:function(t,e,n){"use strict";var i=n("0e68").forEach,r=n("0502"),o=r("forEach");t.exports=o?[].forEach:function(t){return i(this,t,arguments.length>1?arguments[1]:void 0)}},dd98:function(t,e,n){var i=n("600a"),r=i("match");t.exports=function(t){var e=/./;try{"/./"[t](e)}catch(n){try{return e[r]=!1,"/./"[t](e)}catch(i){}}return!1}},e475:function(t,e,n){"use strict";var i=n("bdd0");e["a"]={list:function(t){return Object(i["a"])("api.doc.list",t)},info:function(t){return Object(i["a"])("api.doc.info",{id:t})},add:function(t){return Object(i["a"])("api.doc.add",t)},update:function(t){return Object(i["a"])("api.doc.update",t)},content:function(t){return Object(i["a"])("api.doc.content",t)},upload:function(t){return Object(i["a"])("api.doc.upload",t)},search:function(t){return Object(i["a"])("api.doc.search",t)},tree:function(t){return Object(i["a"])("api.doc.tree",{id:t})},edit:function(t){var e="api.doc.add";return t.id&&(e="api.doc.update"),Object(i["a"])(e,t)},delete:function(t){return Object(i["a"])("api.doc.del",{id:t})},access:{info:function(t){return Object(i["a"])("api.doc.access.info",{id:t})},update:function(t){return Object(i["a"])("api.doc.access.update",t)}}}},f90c:function(t,e,n){var i=n("2ef6"),r=n("2672"),o=n("9bda"),c=n("cc03"),a=n("25eb"),s=function(t){if(t&&t.forEach!==c)try{a(t,"forEach",c)}catch(e){t.forEach=c}};for(var u in r)r[u]&&s(i[u]&&i[u].prototype);s(o)},fc5c:function(t,e){t.exports="\t\n\v\f\r                　\u2028\u2029\ufeff"},fd13:function(t,e,n){"use strict";var i=n("9a4c"),r=n("21f6"),o=n("39f5").f,c=n("925e"),a=n("420c"),s=n("1e2d"),u=n("218d"),d=n("dd98"),l=n("ec40"),f=r("".startsWith),h=r("".slice),p=Math.min,v=d("startsWith"),m=!l&&!v&&!!function(){var t=o(String.prototype,"startsWith");return t&&!t.writable}();i({target:"String",proto:!0,forced:!m&&!v},{startsWith:function(t){var e=a(u(this));s(t);var n=c(p(arguments.length>1?arguments[1]:void 0,e.length)),i=a(t);return f?f(e,i,n):h(e,n,n+i.length)===i}})}}]);