(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-6afcb8e1"],{"0502":function(t,e,n){"use strict";var o=n("9d66");t.exports=function(t,e){var n=[][t];return!!n&&o((function(){n.call(null,e||function(){throw 1},1)}))}},"0e68":function(t,e,n){var o=n("6266"),r=n("21f6"),i=n("442e"),u=n("ed2d"),a=n("a4f0"),s=n("af17"),c=r([].push),l=function(t){var e=1==t,n=2==t,r=3==t,l=4==t,f=6==t,d=7==t,p=5==t||f;return function(h,v,y,b){for(var g,m,w=u(h),L=i(w),S=o(v,y),x=a(L),E=0,k=b||s,O=e?k(h,x):n||d?k(h,0):void 0;x>E;E++)if((p||E in L)&&(g=L[E],m=S(g,E,w),t))if(e)O[E]=m;else if(m)switch(t){case 3:return!0;case 5:return g;case 6:return E;case 2:c(O,g)}else switch(t){case 4:return!1;case 7:c(O,g)}return f?-1:r||l?l:O}};t.exports={forEach:l(0),map:l(1),filter:l(2),some:l(3),every:l(4),find:l(5),findIndex:l(6),filterReject:l(7)}},"20e2":function(t,e,n){
/*!
  * vue-scrollto v2.20.0
  * (c) 2019 Randjelovic Igor
  * @license MIT
  */
(function(e,n){t.exports=n()})(0,(function(){"use strict";function t(e){return t="function"===typeof Symbol&&"symbol"===typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"===typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t},t(e)}function e(){return e=Object.assign||function(t){for(var e=1;e<arguments.length;e++){var n=arguments[e];for(var o in n)Object.prototype.hasOwnProperty.call(n,o)&&(t[o]=n[o])}return t},e.apply(this,arguments)}var n=4,o=.001,r=1e-7,i=10,u=11,a=1/(u-1),s="function"===typeof Float32Array;function c(t,e){return 1-3*e+3*t}function l(t,e){return 3*e-6*t}function f(t){return 3*t}function d(t,e,n){return((c(e,n)*t+l(e,n))*t+f(e))*t}function p(t,e,n){return 3*c(e,n)*t*t+2*l(e,n)*t+f(e)}function h(t,e,n,o,u){var a,s,c=0;do{s=e+(n-e)/2,a=d(s,o,u)-t,a>0?n=s:e=s}while(Math.abs(a)>r&&++c<i);return s}function v(t,e,o,r){for(var i=0;i<n;++i){var u=p(e,o,r);if(0===u)return e;var a=d(e,o,r)-t;e-=a/u}return e}function y(t){return t}var b=function(t,e,n,r){if(!(0<=t&&t<=1&&0<=n&&n<=1))throw new Error("bezier x values must be in [0, 1] range");if(t===e&&n===r)return y;for(var i=s?new Float32Array(u):new Array(u),c=0;c<u;++c)i[c]=d(c*a,t,n);function l(e){for(var r=0,s=1,c=u-1;s!==c&&i[s]<=e;++s)r+=a;--s;var l=(e-i[s])/(i[s+1]-i[s]),f=r+l*a,d=p(f,t,n);return d>=o?v(e,f,t,n):0===d?f:h(e,r,r+a,t,n)}return function(t){return 0===t?0:1===t?1:d(l(t),e,r)}},g={ease:[.25,.1,.25,1],linear:[0,0,1,1],"ease-in":[.42,0,1,1],"ease-out":[0,0,.58,1],"ease-in-out":[.42,0,.58,1]},m=!1;try{var w=Object.defineProperty({},"passive",{get:function(){m=!0}});window.addEventListener("test",null,w)}catch(A){}var L={$:function(t){return"string"!==typeof t?t:document.querySelector(t)},on:function(t,e,n){var o=arguments.length>3&&void 0!==arguments[3]?arguments[3]:{passive:!1};e instanceof Array||(e=[e]);for(var r=0;r<e.length;r++)t.addEventListener(e[r],n,!!m&&o)},off:function(t,e,n){e instanceof Array||(e=[e]);for(var o=0;o<e.length;o++)t.removeEventListener(e[o],n)},cumulativeOffset:function(t){var e=0,n=0;do{e+=t.offsetTop||0,n+=t.offsetLeft||0,t=t.offsetParent}while(t);return{top:e,left:n}}},S=["mousedown","wheel","DOMMouseScroll","mousewheel","keyup","touchmove"],x={container:"body",duration:500,lazy:!0,easing:"ease",offset:0,force:!0,cancelable:!0,onStart:!1,onDone:!1,onCancel:!1,x:!1,y:!0};function E(t){x=e({},x,t)}var k=function(){var e,n,o,r,i,u,a,s,c,l,f,d,p,h,v,y,m,w,E,k,O,_,F,C,T,G,j,P=function(t){s&&(F=t,k=!0)};function M(t){var e=t.scrollTop;return"body"===t.tagName.toLowerCase()&&(e=e||document.documentElement.scrollTop),e}function A(t){var e=t.scrollLeft;return"body"===t.tagName.toLowerCase()&&(e=e||document.documentElement.scrollLeft),e}function D(){O=L.cumulativeOffset(n),_=L.cumulativeOffset(e),d&&(v=_.left-O.left+u,w=v-h),p&&(m=_.top-O.top+u,E=m-y)}function $(t){if(k)return I();T||(T=t),i||D(),G=t-T,j=Math.min(G/o,1),j=C(j),V(n,y+E*j,h+w*j),G<o?window.requestAnimationFrame($):I()}function I(){k||V(n,m,v),T=!1,L.off(n,S,P),k&&f&&f(F,e),!k&&l&&l(e)}function V(t,e,n){p&&(t.scrollTop=e),d&&(t.scrollLeft=n),"body"===t.tagName.toLowerCase()&&(p&&(document.documentElement.scrollTop=e),d&&(document.documentElement.scrollLeft=n))}function q(v,O){var _=arguments.length>2&&void 0!==arguments[2]?arguments[2]:{};if("object"===t(O)?_=O:"number"===typeof O&&(_.duration=O),e=L.$(v),!e)return console.warn("[vue-scrollto warn]: Trying to scroll to an element that is not on the page: "+v);if(n=L.$(_.container||x.container),o=_.hasOwnProperty("duration")?_.duration:x.duration,i=_.hasOwnProperty("lazy")?_.lazy:x.lazy,r=_.easing||x.easing,u=_.hasOwnProperty("offset")?_.offset:x.offset,a=_.hasOwnProperty("force")?!1!==_.force:x.force,s=_.hasOwnProperty("cancelable")?!1!==_.cancelable:x.cancelable,c=_.onStart||x.onStart,l=_.onDone||x.onDone,f=_.onCancel||x.onCancel,d=void 0===_.x?x.x:_.x,p=void 0===_.y?x.y:_.y,"function"===typeof u&&(u=u(e,n)),h=A(n),y=M(n),D(),k=!1,!a){var T="body"===n.tagName.toLowerCase()?document.documentElement.clientHeight||window.innerHeight:n.offsetHeight,G=y,j=G+T,I=m-u,V=I+e.offsetHeight;if(I>=G&&V<=j)return void(l&&l(e))}if(c&&c(e),E||w)return"string"===typeof r&&(r=g[r]||g["ease"]),C=b.apply(b,r),L.on(n,S,P,{passive:!0}),window.requestAnimationFrame($),function(){F=null,k=!0};l&&l(e)}return q},O=k(),_=[];function F(t){for(var e=0;e<_.length;++e)if(_[e].el===t)return _.splice(e,1),!0;return!1}function C(t){for(var e=0;e<_.length;++e)if(_[e].el===t)return _[e]}function T(t){var e=C(t);return e||(_.push(e={el:t,binding:{}}),e)}function G(t){var e=T(this).binding;if(e.value){if(t.preventDefault(),"string"===typeof e.value)return O(e.value);O(e.value.el||e.value.element,e.value)}}var j={bind:function(t,e){T(t).binding=e,L.on(t,"click",G)},unbind:function(t){F(t),L.off(t,"click",G)},update:function(t,e){T(t).binding=e}},P={bind:j.bind,unbind:j.unbind,update:j.update,beforeMount:j.bind,unmounted:j.unbind,updated:j.update,scrollTo:O,bindings:_},M=function(t,e){e&&E(e),t.directive("scroll-to",P);var n=t.config.globalProperties||t.prototype;n.$scrollTo=P.scrollTo};return"undefined"!==typeof window&&window.Vue&&(window.VueScrollTo=P,window.VueScrollTo.setDefaults=E,window.VueScrollTo.scroller=k,window.Vue.use&&window.Vue.use(M)),P.install=M,P}))},"3ad0":function(t,e,n){"use strict";n.d(e,"c",(function(){return r})),n.d(e,"b",(function(){return i})),n.d(e,"a",(function(){return u}));var o=n("70f6");function r(t){Object(o["Message"])({message:t||"操作成功",type:"success",duration:2e3})}function i(t){Object(o["Message"])({message:t||"操作失败",type:"danger",duration:2e3})}function u(t,e,n){o["MessageBox"].confirm(t,"提示",{confirmButtonText:"确定",cancelButtonText:"取消",type:"warning"}).then((function(){e()})).catch((function(){}))}},"41d3":function(t,e,n){"use strict";n.r(e);var o=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",[n("el-row",{staticClass:"op"},[n("el-col",{staticClass:"title",attrs:{span:2}},[t._v("操作")]),n("el-col",{attrs:{span:22}},[n("el-radio",{attrs:{label:1},model:{value:t.type,callback:function(e){t.type=e},expression:"type"}},[t._v("增加")]),n("el-radio",{staticClass:"c-danger",attrs:{label:2},model:{value:t.type,callback:function(e){t.type=e},expression:"type"}},[t._v("去除")])],1)],1),n("el-row",{staticClass:"role"},[n("el-col",{staticClass:"title",attrs:{span:2}},[t._v("角色")]),n("el-col",{attrs:{span:22}},t._l(t.roles,(function(e){return n("el-checkbox",{key:e.id,attrs:{label:e.id},model:{value:t.roleIdList,callback:function(e){t.roleIdList=e},expression:"roleIdList"}},[t._v(" "+t._s(e.name)+" ")])})),1)],1),n("div",{staticStyle:{"margin-top":"10px"}},[n("div",{staticClass:"groups",style:{top:t.top+"px"}},t._l(t.groups,(function(e){return n("div",{key:e.id,staticClass:"group-item",on:{click:function(n){return t.onPosition(e.id)}}},[t._v(" "+t._s(e.name)+" ")])})),0),n("div",{staticClass:"container",attrs:{span:21}},[t._l(t.permissions,(function(e){return n("div",{key:e.group.id,staticClass:"ps-group",attrs:{id:"group-"+e.group.id}},[n("el-checkbox",{attrs:{indeterminate:t.halfForGroup[e.group.id]},on:{change:function(n){return t.onSelect(e.group.id)}},model:{value:t.statusForGroup[e.group.id],callback:function(n){t.$set(t.statusForGroup,e.group.id,n)},expression:"statusForGroup[gl.group.id]"}},[t._v(" "+t._s(e.group.name)+" ")]),n("el-checkbox-group",{on:{change:function(n){return t.onSelectGroup(e.group.id)}},model:{value:t.idList[e.group.id],callback:function(n){t.$set(t.idList,e.group.id,n)},expression:"idList[gl.group.id]"}},t._l(e.tree,(function(e){return n("el-checkbox",{key:e.id,attrs:{label:e.id}},[t._v(" "+t._s(e.name)+" ")])})),1)],1)})),n("div",{staticStyle:{padding:"10px 0"}},[n("el-button",{attrs:{type:"primary"},on:{click:t.onSubmit}},[t._v("确认设置")])],1)],2)])],1)},r=[],i=(n("a4c0"),n("f90c"),n("2bde"),n("e963")),u=n("3ad0"),a=n("20e2"),s=n.n(a),c={data:function(){return{loading:!0,top:226,statusForGroup:{},halfForGroup:{},groups:[],roles:[],permissions:[],idList:[],roleIdList:[],type:1}},created:function(){this.init(),window.addEventListener("scroll",this.onScroll)},beforeDestroy:function(){window.removeEventListener("scroll",this.onScroll)},methods:{init:function(){var t=this;this.loading=!0,i["a"].batchQuery().then((function(e){t.roles=e.roles,t.groups=e.groups;var n=[],o=[],r={},i={};e.groups.forEach((function(t){var u=[];e.permissions.forEach((function(e){e.group_id===t.id&&u.push(e)})),r[t.id]=!1,i[t.id]=!1,n[t.id]=[],o.push({group:t,tree:u})})),t.statusForGroup=r,t.halfForGroup=i,t.idList=n,t.permissions=o,t.loading=!1}))},onSelect:function(t){var e=this;this.halfForGroup[t]=!1;var n=this.statusForGroup[t];this.permissions.every((function(o){if(o.group.id!==t)return!0;var r=[];o.tree.forEach((function(t){n&&r.push(t.id)})),e.idList[t]=r}))},onSelectGroup:function(t){for(var e in this.permissions)if(this.permissions[e].group.id===t)return this.idList[t].length>0&&this.idList[t].length<this.permissions[e].tree.length?this.halfForGroup[t]=!0:this.halfForGroup[t]=!1,void(this.idList[t].length===this.permissions[e].tree.length&&(this.statusForGroup[t]=!0))},onSubmit:function(){if(!this.loading){var t=[];for(var e in this.idList)t=t.concat(this.idList[e]);i["a"].batchSet({roles:this.roleIdList,type:this.type,permissions:t}).then((function(t){Object(u["c"])("权限设置成功")}))}},onPosition:function(t){s.a.scrollTo("#group-"+t,"body",{})},onScroll:function(){document.documentElement.scrollTop>200?20!==this.top&&(this.top=20):226!==this.top&&(this.top=226)}}},l=c,f=(n("abb4"),n("bdd7")),d=Object(f["a"])(l,o,r,!1,null,null,null);e["default"]=d.exports},"8e80":function(t,e,n){},abb4:function(t,e,n){"use strict";n("8e80")},cc03:function(t,e,n){"use strict";var o=n("0e68").forEach,r=n("0502"),i=r("forEach");t.exports=i?[].forEach:function(t){return o(this,t,arguments.length>1?arguments[1]:void 0)}},e963:function(t,e,n){"use strict";var o=n("bdd0");e["a"]={roleQuery:function(t){return Object(o["a"])("api.acl.role.query",t)},roleSet:function(t){return Object(o["a"])("api.acl.role.set",t)},batchQuery:function(){return Object(o["a"])("api.acl.batch.query")},batchSet:function(t){return Object(o["a"])("api.acl.batch.set",t)}}},f90c:function(t,e,n){var o=n("2ef6"),r=n("2672"),i=n("9bda"),u=n("cc03"),a=n("25eb"),s=function(t){if(t&&t.forEach!==u)try{a(t,"forEach",u)}catch(e){t.forEach=u}};for(var c in r)r[c]&&s(o[c]&&o[c].prototype);s(i)}}]);