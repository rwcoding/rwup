(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-2a17eee1"],{"0502":function(t,e,i){"use strict";var n=i("9d66");t.exports=function(t,e){var i=[][t];return!!i&&n((function(){i.call(null,e||function(){throw 1},1)}))}},"0e68":function(t,e,i){var n=i("6266"),r=i("21f6"),o=i("442e"),s=i("ed2d"),a=i("a4f0"),u=i("af17"),l=r([].push),c=function(t){var e=1==t,i=2==t,r=3==t,c=4==t,f=6==t,d=7==t,m=5==t||f;return function(h,p,v,$){for(var g,b,y=s(h),O=o(y),D=n(p,v),_=a(O),M=0,S=$||u,E=e?S(h,_):i||d?S(h,0):void 0;_>M;M++)if((m||M in O)&&(g=O[M],b=D(g,M,y),t))if(e)E[M]=b;else if(b)switch(t){case 3:return!0;case 5:return g;case 6:return M;case 2:l(E,g)}else switch(t){case 4:return!1;case 7:l(E,g)}return f?-1:r||c?c:E}};t.exports={forEach:c(0),map:c(1),filter:c(2),some:c(3),every:c(4),find:c(5),findIndex:c(6),filterReject:c(7)}},"0feb":function(t,e,i){"use strict";var n=i("bdd0");e["a"]={list:function(t){return Object(n["a"])("api.permission.list",t)},info:function(t){return Object(n["a"])("api.permission.info",t)},config:function(){return Object(n["a"])("api.permission.config")},add:function(t){return Object(n["a"])("api.permission.add",t)},edit:function(t){var e="api.permission.add";return t.id&&(e="api.permission.update"),Object(n["a"])(e,t)},update:function(t){return Object(n["a"])("api.permission.update",t)},delete:function(t){return Object(n["a"])("api.permission.del",t)},shift:function(t){return Object(n["a"])("api.permission.shift",t)},route:function(){return Object(n["a"])("api.permission.route")},group:{list:function(t){return Object(n["a"])("api.permission.group.list",t)},info:function(t){return Object(n["a"])("api.permission.group.info",t)},config:function(){return Object(n["a"])("api.permission.group.config")},add:function(t){return Object(n["a"])("api.permission.group.add",t)},edit:function(t){var e="api.permission.group.add";return t.id&&(e="api.permission.group.update"),Object(n["a"])(e,t)},update:function(t){return Object(n["a"])("api.permission.group.update",t)},delete:function(t){return Object(n["a"])("api.permission.group.del",t)}}}},"216c":function(t,e,i){"use strict";var n=function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("div",{staticClass:"rw-nav"},[i("el-row",[i("el-col",{attrs:{span:16}},[i("div",{staticClass:"grid-content links"},[t._l(t.links,(function(e,n){return[void 0!==e.to&&e.to?i("router-link",{key:n,class:e.active||1===t.links.length||t.menu===e.menu?"active":"",attrs:{to:e.to,tag:"span"}},[t._v(" "+t._s(e.title)+" ")]):t._e(),void 0!==e.to&&e.to?t._e():i("span",{key:"nav-"+n,class:e.active||1===t.links.length?"active":""},[t._v(" "+t._s(e.title)+" ")])]}))],2)]),i("el-col",{attrs:{span:8}},[i("div",{staticClass:"grid-content btns"},[t._l(t.btns,(function(e,n){return[void 0!==e.to&&e.to?i("router-link",{key:n,attrs:{to:e.to}},[i("el-button",{attrs:{icon:e.icon||"",type:e.type?e.type:"",size:"small",plain:""}},[t._v(" "+t._s(e.title)+" ")])],1):t._e(),void 0!==e.to&&e.to?t._e():i("el-button",{key:n,attrs:{type:e.type?e.type:"primary",icon:e.icon||"",size:"small",plain:""},on:{click:function(i){return t.handleClick(e.command)}}},[t._v(" "+t._s(e.title)+" ")])]}))],2)])],1)],1)},r=[],o=i("6c71"),s={props:{links:{type:Array,default:function(){return[]}},btns:{type:Array,default:function(){return[]}}},computed:Object(o["b"])({menu:function(t){return t.app.menu}}),methods:{handleClick:function(t){this.$emit("btnEvent",t)}}},a=s,u=i("bdd7"),l=Object(u["a"])(a,n,r,!1,null,null,null);e["a"]=l.exports},"3ad0":function(t,e,i){"use strict";i.d(e,"c",(function(){return r})),i.d(e,"b",(function(){return o})),i.d(e,"a",(function(){return s}));var n=i("70f6");function r(t){Object(n["Message"])({message:t||"操作成功",type:"success",duration:2e3})}function o(t){Object(n["Message"])({message:t||"操作失败",type:"danger",duration:2e3})}function s(t,e,i){n["MessageBox"].confirm(t,"提示",{confirmButtonText:"确定",cancelButtonText:"取消",type:"warning"}).then((function(){e()})).catch((function(){}))}},"3f7a":function(t,e,i){"use strict";var n=function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("el-dialog",{attrs:{title:t.title,visible:t.dialogVisible,"close-on-click-modal":!1,"close-on-press-escape":!1,"destroy-on-close":!0},on:{"update:visible":function(e){t.dialogVisible=e}}},[t._t("default",null,{data:t.data})],2)},r=[],o={props:["title","visible"],computed:{data:function(){return this.$props.data},dialogVisible:{get:function(){return this.$props.visible},set:function(t){this.$emit("close")}}}},s=o,a=i("bdd7"),u=Object(a["a"])(s,n,r,!1,null,null,null);e["a"]=u.exports},5292:function(t,e,i){!function(e,i){t.exports=i()}(0,(function(){"use strict";var t=1e3,e=6e4,i=36e5,n="millisecond",r="second",o="minute",s="hour",a="day",u="week",l="month",c="quarter",f="year",d="date",m="Invalid Date",h=/^(\d{4})[-/]?(\d{1,2})?[-/]?(\d{0,2})[Tt\s]*(\d{1,2})?:?(\d{1,2})?:?(\d{1,2})?[.:]?(\d+)?$/,p=/\[([^\]]+)]|Y{1,4}|M{1,4}|D{1,2}|d{1,4}|H{1,2}|h{1,2}|a|A|m{1,2}|s{1,2}|Z{1,2}|SSS/g,v={name:"en",weekdays:"Sunday_Monday_Tuesday_Wednesday_Thursday_Friday_Saturday".split("_"),months:"January_February_March_April_May_June_July_August_September_October_November_December".split("_")},$=function(t,e,i){var n=String(t);return!n||n.length>=e?t:""+Array(e+1-n.length).join(i)+t},g={s:$,z:function(t){var e=-t.utcOffset(),i=Math.abs(e),n=Math.floor(i/60),r=i%60;return(e<=0?"+":"-")+$(n,2,"0")+":"+$(r,2,"0")},m:function t(e,i){if(e.date()<i.date())return-t(i,e);var n=12*(i.year()-e.year())+(i.month()-e.month()),r=e.clone().add(n,l),o=i-r<0,s=e.clone().add(n+(o?-1:1),l);return+(-(n+(i-r)/(o?r-s:s-r))||0)},a:function(t){return t<0?Math.ceil(t)||0:Math.floor(t)},p:function(t){return{M:l,y:f,w:u,d:a,D:d,h:s,m:o,s:r,ms:n,Q:c}[t]||String(t||"").toLowerCase().replace(/s$/,"")},u:function(t){return void 0===t}},b="en",y={};y[b]=v;var O=function(t){return t instanceof S},D=function(t,e,i){var n;if(!t)return b;if("string"==typeof t)y[t]&&(n=t),e&&(y[t]=e,n=t);else{var r=t.name;y[r]=t,n=r}return!i&&n&&(b=n),n||!i&&b},_=function(t,e){if(O(t))return t.clone();var i="object"==typeof e?e:{};return i.date=t,i.args=arguments,new S(i)},M=g;M.l=D,M.i=O,M.w=function(t,e){return _(t,{locale:e.$L,utc:e.$u,x:e.$x,$offset:e.$offset})};var S=function(){function v(t){this.$L=D(t.locale,null,!0),this.parse(t)}var $=v.prototype;return $.parse=function(t){this.$d=function(t){var e=t.date,i=t.utc;if(null===e)return new Date(NaN);if(M.u(e))return new Date;if(e instanceof Date)return new Date(e);if("string"==typeof e&&!/Z$/i.test(e)){var n=e.match(h);if(n){var r=n[2]-1||0,o=(n[7]||"0").substring(0,3);return i?new Date(Date.UTC(n[1],r,n[3]||1,n[4]||0,n[5]||0,n[6]||0,o)):new Date(n[1],r,n[3]||1,n[4]||0,n[5]||0,n[6]||0,o)}}return new Date(e)}(t),this.$x=t.x||{},this.init()},$.init=function(){var t=this.$d;this.$y=t.getFullYear(),this.$M=t.getMonth(),this.$D=t.getDate(),this.$W=t.getDay(),this.$H=t.getHours(),this.$m=t.getMinutes(),this.$s=t.getSeconds(),this.$ms=t.getMilliseconds()},$.$utils=function(){return M},$.isValid=function(){return!(this.$d.toString()===m)},$.isSame=function(t,e){var i=_(t);return this.startOf(e)<=i&&i<=this.endOf(e)},$.isAfter=function(t,e){return _(t)<this.startOf(e)},$.isBefore=function(t,e){return this.endOf(e)<_(t)},$.$g=function(t,e,i){return M.u(t)?this[e]:this.set(i,t)},$.unix=function(){return Math.floor(this.valueOf()/1e3)},$.valueOf=function(){return this.$d.getTime()},$.startOf=function(t,e){var i=this,n=!!M.u(e)||e,c=M.p(t),m=function(t,e){var r=M.w(i.$u?Date.UTC(i.$y,e,t):new Date(i.$y,e,t),i);return n?r:r.endOf(a)},h=function(t,e){return M.w(i.toDate()[t].apply(i.toDate("s"),(n?[0,0,0,0]:[23,59,59,999]).slice(e)),i)},p=this.$W,v=this.$M,$=this.$D,g="set"+(this.$u?"UTC":"");switch(c){case f:return n?m(1,0):m(31,11);case l:return n?m(1,v):m(0,v+1);case u:var b=this.$locale().weekStart||0,y=(p<b?p+7:p)-b;return m(n?$-y:$+(6-y),v);case a:case d:return h(g+"Hours",0);case s:return h(g+"Minutes",1);case o:return h(g+"Seconds",2);case r:return h(g+"Milliseconds",3);default:return this.clone()}},$.endOf=function(t){return this.startOf(t,!1)},$.$set=function(t,e){var i,u=M.p(t),c="set"+(this.$u?"UTC":""),m=(i={},i[a]=c+"Date",i[d]=c+"Date",i[l]=c+"Month",i[f]=c+"FullYear",i[s]=c+"Hours",i[o]=c+"Minutes",i[r]=c+"Seconds",i[n]=c+"Milliseconds",i)[u],h=u===a?this.$D+(e-this.$W):e;if(u===l||u===f){var p=this.clone().set(d,1);p.$d[m](h),p.init(),this.$d=p.set(d,Math.min(this.$D,p.daysInMonth())).$d}else m&&this.$d[m](h);return this.init(),this},$.set=function(t,e){return this.clone().$set(t,e)},$.get=function(t){return this[M.p(t)]()},$.add=function(n,c){var d,m=this;n=Number(n);var h=M.p(c),p=function(t){var e=_(m);return M.w(e.date(e.date()+Math.round(t*n)),m)};if(h===l)return this.set(l,this.$M+n);if(h===f)return this.set(f,this.$y+n);if(h===a)return p(1);if(h===u)return p(7);var v=(d={},d[o]=e,d[s]=i,d[r]=t,d)[h]||1,$=this.$d.getTime()+n*v;return M.w($,this)},$.subtract=function(t,e){return this.add(-1*t,e)},$.format=function(t){var e=this,i=this.$locale();if(!this.isValid())return i.invalidDate||m;var n=t||"YYYY-MM-DDTHH:mm:ssZ",r=M.z(this),o=this.$H,s=this.$m,a=this.$M,u=i.weekdays,l=i.months,c=function(t,i,r,o){return t&&(t[i]||t(e,n))||r[i].substr(0,o)},f=function(t){return M.s(o%12||12,t,"0")},d=i.meridiem||function(t,e,i){var n=t<12?"AM":"PM";return i?n.toLowerCase():n},h={YY:String(this.$y).slice(-2),YYYY:this.$y,M:a+1,MM:M.s(a+1,2,"0"),MMM:c(i.monthsShort,a,l,3),MMMM:c(l,a),D:this.$D,DD:M.s(this.$D,2,"0"),d:String(this.$W),dd:c(i.weekdaysMin,this.$W,u,2),ddd:c(i.weekdaysShort,this.$W,u,3),dddd:u[this.$W],H:String(o),HH:M.s(o,2,"0"),h:f(1),hh:f(2),a:d(o,s,!0),A:d(o,s,!1),m:String(s),mm:M.s(s,2,"0"),s:String(this.$s),ss:M.s(this.$s,2,"0"),SSS:M.s(this.$ms,3,"0"),Z:r};return n.replace(p,(function(t,e){return e||h[t]||r.replace(":","")}))},$.utcOffset=function(){return 15*-Math.round(this.$d.getTimezoneOffset()/15)},$.diff=function(n,d,m){var h,p=M.p(d),v=_(n),$=(v.utcOffset()-this.utcOffset())*e,g=this-v,b=M.m(this,v);return b=(h={},h[f]=b/12,h[l]=b,h[c]=b/3,h[u]=(g-$)/6048e5,h[a]=(g-$)/864e5,h[s]=g/i,h[o]=g/e,h[r]=g/t,h)[p]||g,m?b:M.a(b)},$.daysInMonth=function(){return this.endOf(l).$D},$.$locale=function(){return y[this.$L]},$.locale=function(t,e){if(!t)return this.$L;var i=this.clone(),n=D(t,e,!0);return n&&(i.$L=n),i},$.clone=function(){return M.w(this.$d,this)},$.toDate=function(){return new Date(this.valueOf())},$.toJSON=function(){return this.isValid()?this.toISOString():null},$.toISOString=function(){return this.$d.toISOString()},$.toString=function(){return this.$d.toUTCString()},v}(),E=S.prototype;return _.prototype=E,[["$ms",n],["$s",r],["$m",o],["$H",s],["$W",a],["$M",l],["$y",f],["$D",d]].forEach((function(t){E[t[1]]=function(e){return this.$g(e,t[0],t[1])}})),_.extend=function(t,e){return t.$i||(t(e,S,_),t.$i=!0),_},_.locale=D,_.isDayjs=O,_.unix=function(t){return _(1e3*t)},_.en=y[b],_.Ls=y,_.p={},_}))},c968:function(t,e,i){"use strict";i.d(e,"d",(function(){return c})),i.d(e,"e",(function(){return f})),i.d(e,"a",(function(){return d})),i.d(e,"b",(function(){return m})),i.d(e,"c",(function(){return h}));i("a4c0"),i("f90c");var n=i("5292"),r=i.n(n),o=i("d3aa"),s=i.n(o),a=i("fe05"),u=i.n(a),l=i("4360");function c(t,e,i){for(var n in t)if(t[n].k===e)return t[n].v;return i}function f(t,e){var i=[];return e.forEach((function(e){var n=c(t,e,null);null!==n&&i.push(n)})),i}function d(t,e){return r.a.extend(s.a),r.a.extend(u.a),e||(e="YYYY-MM-DD HH:mm:ss"),r.a.utc(t).tz(l["a"].state.app.timezone).format(e)}function m(t,e){var i={};return e.forEach((function(e){i[e]=t[e]})),i}function h(t,e){e||(e=0);var i=[];return t.forEach((function(n){n.pid===e&&(n.children=h(t,n.id),i.push(n))})),i}},c988:function(t,e,i){"use strict";i.r(e);var n=function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("div",{staticClass:"rw-doc"},[i("Nav",{attrs:{links:t.links,btns:t.btns},on:{btnEvent:t.onDialog}}),i("div",{staticClass:"mt-20"},[i("router-view",{ref:"child",on:{dialogEvent:t.onDialog}})],1),t.idForRoleEdit>=0?i("Dialog",{attrs:{title:t.title,visible:t.idForRoleEdit>=0},on:{close:function(e){t.idForRoleEdit=-1}}},[i("RoleEdit",{attrs:{id:t.idForRoleEdit},on:{reload:function(e){return t.onReload("role")}}})],1):t._e(),t.idForPermissionEdit>=0?i("Dialog",{attrs:{title:t.title,visible:t.idForPermissionEdit>=0},on:{close:function(e){t.idForPermissionEdit=-1}}},[i("PermissionEdit",{attrs:{id:t.idForPermissionEdit},on:{reload:function(e){return t.onReload("permission")}}})],1):t._e(),t.idForGroupEdit>=0?i("Dialog",{attrs:{title:t.title,visible:t.idForGroupEdit>=0},on:{close:function(e){t.idForGroupEdit=-1}}},[i("GroupEdit",{attrs:{id:t.idForGroupEdit},on:{reload:function(e){return t.onReload("group")}}})],1):t._e(),t.shift?i("Dialog",{attrs:{title:t.title,visible:t.shift},on:{close:function(e){t.shift=!1}}},[i("PermissionShift",{on:{reload:function(e){return t.onReload("shift")}}})],1):t._e()],1)},r=[],o=i("216c"),s=i("3f7a"),a=function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("el-form",{staticStyle:{width:"100%"},attrs:{model:t.form,"label-width":"50px","label-position":"left",size:"small"}},[i("el-form-item",{attrs:{label:"名称",prop:"name"}},[i("el-input",{model:{value:t.form.name,callback:function(e){t.$set(t.form,"name",e)},expression:"form.name"}})],1),i("el-form-item",{attrs:{label:"权限",prop:"permission"}},[i("el-input",{model:{value:t.form.permission,callback:function(e){t.$set(t.form,"permission",e)},expression:"form.permission"}})],1),i("el-form-item",{attrs:{label:"分组",prop:"group"}},[i("el-select",{attrs:{placeholder:"选择分组"},model:{value:t.form.group_id,callback:function(e){t.$set(t.form,"group_id",e)},expression:"form.group_id"}},[i("el-option",{attrs:{value:0,label:"◆ 未分组 ◆"}}),t._l(t.groupNames,(function(t){return i("el-option",{key:t.k,attrs:{label:t.v,value:t.k}})}))],2)],1),i("el-form-item",{attrs:{label:"类型",prop:"type"}},[i("el-select",{attrs:{placeholder:"选择类型"},model:{value:t.form.type,callback:function(e){t.$set(t.form,"type",e)},expression:"form.type"}},t._l(t.typeNames,(function(t){return i("el-option",{key:t.k,attrs:{label:t.v,value:t.k}})})),1)],1),i("el-form-item",[i("el-button",{attrs:{type:"primary"},on:{click:t.onSubmit}},[t._v(" "+t._s(t.form.id>0?"确认修改":"新增")+" ")])],1)],1)},u=[],l=(i("a4c0"),i("4cd9"),i("ccaa"),i("c968")),c=i("0feb"),f=i("3ad0"),d={props:["id"],data:function(){return{loading:!0,groupNames:[],typeNames:[],form:{name:""}}},created:function(){var t=this,e=[c["a"].config()];this.$props.id&&(this.form.id=this.$props.id,e.push(c["a"].info({id:this.form.id}))),Promise.all(e).then((function(e){var i=e[0];if(t.groupNames=i.groups,t.typeNames=i.types,2===e.length){var n=e[1];t.form=n}t.loading=!1}))},methods:{onSubmit:function(){var t=this;this.loading||(this.loading=!0,c["a"].edit(this.form).then((function(e){Object(f["c"])(t.form.id?"编辑成功":"新增成功"),t.$emit("reload","permission")}),(function(e){t.loading=!1})))},vFromKV:l["d"]}},m=d,h=i("bdd7"),p=Object(h["a"])(m,a,u,!1,null,null,null),v=p.exports,$=function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("el-form",{staticStyle:{width:"100%"},attrs:{model:t.form,"label-width":"50px","label-position":"left",size:"small"}},[i("el-form-item",{attrs:{label:"权限",prop:"permission"}},[i("el-input",{model:{value:t.form.permission,callback:function(e){t.$set(t.form,"permission",e)},expression:"form.permission"}})],1),i("el-form-item",{attrs:{label:"分组",prop:"group"}},[i("el-select",{attrs:{placeholder:"选择分组"},model:{value:t.form.group_id,callback:function(e){t.$set(t.form,"group_id",e)},expression:"form.group_id"}},[i("el-option",{attrs:{value:0,label:"☀ 未分组 ☀"}}),t._l(t.groupNames,(function(t){return i("el-option",{key:t.k,attrs:{label:t.v,value:t.k}})}))],2)],1),i("el-form-item",[i("el-button",{attrs:{type:"primary"},on:{click:t.onSubmit}},[t._v("确认转移")])],1)],1)},g=[],b={data:function(){return{loading:!0,groupNames:[],form:{permission:"",group_id:0}}},created:function(){var t=this;c["a"].config().then((function(e){t.groupNames=e.groups,t.loading=!1}))},methods:{onSubmit:function(){var t=this;this.loading||(this.loading=!0,c["a"].shift(this.form).then((function(e){Object(f["c"])("转移成功"),t.$emit("reload")}),(function(e){t.loading=!1})))},vFromKV:l["d"]}},y=b,O=Object(h["a"])(y,$,g,!1,null,null,null),D=O.exports,_=function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("el-form",{staticStyle:{width:"100%"},attrs:{model:t.form,"label-width":"50px","label-position":"left",size:"small"}},[i("el-form-item",{attrs:{label:"名称",prop:"name"}},[i("el-input",{model:{value:t.form.name,callback:function(e){t.$set(t.form,"name",e)},expression:"form.name"}})],1),i("el-form-item",[i("el-button",{attrs:{type:"primary"},on:{click:t.onSubmit}},[t._v(" "+t._s(t.form.id>0?"确认修改":"新增")+" ")])],1)],1)},M=[],S=(i("bda7"),i("cc5e")),E={props:["id"],data:function(){return{loading:!0,form:{name:""}}},created:function(){var t=this;this.$props.id?(this.form.id=this.$props.id,S["a"].info({id:this.$props.id}).then((function(e){t.form.name=e.name,t.loading=!1}))):this.loading=!1},methods:{onSubmit:function(){var t=this;this.loading||(this.loading=!0,S["a"].edit(this.form).then((function(e){Object(f["c"])(t.form.id?"编辑成功":"新增成功"),t.$emit("reload","role")}),(function(e){t.loading=!1})))}}},w=E,k=Object(h["a"])(w,_,M,!1,null,null,null),x=k.exports,j=function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("el-form",{staticStyle:{width:"100%"},attrs:{model:t.form,"label-width":"50px","label-position":"left",size:"small"}},[i("el-form-item",{attrs:{label:"名称",prop:"name"}},[i("el-input",{model:{value:t.form.name,callback:function(e){t.$set(t.form,"name",e)},expression:"form.name"}})],1),i("el-form-item",{attrs:{label:"排序",prop:"ord"}},[i("el-input",{model:{value:t.form.ord,callback:function(e){t.$set(t.form,"ord",e)},expression:"form.ord"}})],1),i("el-form-item",[i("el-button",{attrs:{type:"primary"},on:{click:t.onSubmit}},[t._v(" "+t._s(t.form.id>0?"确认修改":"新增")+" ")])],1)],1)},F=[],T={props:["id"],data:function(){return{loading:!0,form:{name:"",ord:1}}},created:function(){var t=this;this.$props.id?(this.form.id=this.$props.id,c["a"].group.info({id:this.$props.id}).then((function(e){t.form.name=e.name,t.form.ord=e.ord,t.loading=!1}))):this.loading=!1},methods:{onSubmit:function(){var t=this;this.loading||(this.loading=!0,c["a"].group.edit(this.form).then((function(e){Object(f["c"])(t.form.id?"编辑成功":"新增成功"),t.$emit("reload","group")}),(function(e){t.loading=!1})))}}},Y=T,z=Object(h["a"])(Y,j,F,!1,null,null,null),C=z.exports,H={components:{Nav:o["a"],Dialog:s["a"],RoleEdit:x,PermissionEdit:v,PermissionShift:D,GroupEdit:C},data:function(){return{title:"权限管理",idForRoleEdit:-1,idForPermissionEdit:-1,idForGroupEdit:-1,shift:!1,links:[{title:"角色管理",to:"/acl/role",menu:"acl.role"},{title:"权限管理",to:"/acl/permission",menu:"acl.permission"},{title:"权限分组",to:"/acl/group",menu:"acl.group"},{title:"批量分配权限",to:"/acl/batch",menu:"acl.batch"}],btns:[{title:"角色",icon:"el-icon-plus",command:"role.add"},{title:"权限",icon:"el-icon-plus",command:"permission.add"},{title:"分组",icon:"el-icon-plus",command:"group.add"}]}},methods:{onDialog:function(t,e){"role.edit"===t?(this.idForRoleEdit=e,this.title="编辑角色"):"permission.edit"===t?(this.idForPermissionEdit=e,this.title="编辑权限"):"group.edit"===t?(this.idForGroupEdit=e,this.title="编辑权限分组"):"role.add"===t?(this.idForRoleEdit=0,this.title="新增角色"):"permission.add"===t?(this.idForPermissionEdit=0,this.title="新增权限"):"group.add"===t?(this.idForGroupEdit=0,this.title="新增权限分组"):"permission.shift"===t&&(this.shift=!0,this.title="权限分组转移")},onReload:function(t){var e="";"role"===t&&(e=0===this.idForRoleEdit?"add":"edit",this.idForRoleEdit=-1),"permission"===t&&(e=0===this.idForPermissionEdit?"add":"edit",this.idForPermissionEdit=-1),"group"===t&&(e=0===this.idForGroupEdit?"add":"edit",this.idForGroupEdit=-1),"shift"===t&&(e="shift",this.shift=!1,t="permission"),this.$route.path==="/acl/"+t&&this.$refs.child.load(e)}}},N=H,R=Object(h["a"])(N,n,r,!1,null,null,null);e["default"]=R.exports},cc03:function(t,e,i){"use strict";var n=i("0e68").forEach,r=i("0502"),o=r("forEach");t.exports=o?[].forEach:function(t){return n(this,t,arguments.length>1?arguments[1]:void 0)}},cc5e:function(t,e,i){"use strict";var n=i("bdd0");e["a"]={list:function(t){return Object(n["a"])("api.role.list",t)},info:function(t){return Object(n["a"])("api.role.info",t)},add:function(t){return Object(n["a"])("api.role.add",t)},edit:function(t){var e="api.role.add";return t.id&&(e="api.role.update"),Object(n["a"])(e,t)},update:function(t){return Object(n["a"])("api.role.update",t)},delete:function(t){return Object(n["a"])("api.role.del",t)}}},d3aa:function(t,e,i){!function(e,i){t.exports=i()}(0,(function(){"use strict";var t="minute",e=/[+-]\d\d(?::?\d\d)?/g,i=/([+-]|\d\d)/g;return function(n,r,o){var s=r.prototype;o.utc=function(t){var e={date:t,utc:!0,args:arguments};return new r(e)},s.utc=function(e){var i=o(this.toDate(),{locale:this.$L,utc:!0});return e?i.add(this.utcOffset(),t):i},s.local=function(){return o(this.toDate(),{locale:this.$L,utc:!1})};var a=s.parse;s.parse=function(t){t.utc&&(this.$u=!0),this.$utils().u(t.$offset)||(this.$offset=t.$offset),a.call(this,t)};var u=s.init;s.init=function(){if(this.$u){var t=this.$d;this.$y=t.getUTCFullYear(),this.$M=t.getUTCMonth(),this.$D=t.getUTCDate(),this.$W=t.getUTCDay(),this.$H=t.getUTCHours(),this.$m=t.getUTCMinutes(),this.$s=t.getUTCSeconds(),this.$ms=t.getUTCMilliseconds()}else u.call(this)};var l=s.utcOffset;s.utcOffset=function(n,r){var o=this.$utils().u;if(o(n))return this.$u?0:o(this.$offset)?l.call(this):this.$offset;if("string"==typeof n&&null===(n=function(t){void 0===t&&(t="");var n=t.match(e);if(!n)return null;var r=(""+n[0]).match(i)||["-",0,0],o=r[0],s=60*+r[1]+ +r[2];return 0===s?0:"+"===o?s:-s}(n)))return this;var s=Math.abs(n)<=16?60*n:n,a=this;if(r)return a.$offset=s,a.$u=0===n,a;if(0!==n){var u=this.$u?this.toDate().getTimezoneOffset():-1*this.utcOffset();(a=this.local().add(s+u,t)).$offset=s,a.$x.$localOffset=u}else a=this.utc();return a};var c=s.format;s.format=function(t){var e=t||(this.$u?"YYYY-MM-DDTHH:mm:ss[Z]":"");return c.call(this,e)},s.valueOf=function(){var t=this.$utils().u(this.$offset)?0:this.$offset+(this.$x.$localOffset||(new Date).getTimezoneOffset());return this.$d.valueOf()-6e4*t},s.isUTC=function(){return!!this.$u},s.toISOString=function(){return this.toDate().toISOString()},s.toString=function(){return this.toDate().toUTCString()};var f=s.toDate;s.toDate=function(t){return"s"===t&&this.$offset?o(this.format("YYYY-MM-DD HH:mm:ss:SSS")).toDate():f.call(this)};var d=s.diff;s.diff=function(t,e,i){if(t&&this.$u===t.$u)return d.call(this,t,e,i);var n=this.local(),r=o(t).local();return d.call(n,r,e,i)}}}))},f90c:function(t,e,i){var n=i("2ef6"),r=i("2672"),o=i("9bda"),s=i("cc03"),a=i("25eb"),u=function(t){if(t&&t.forEach!==s)try{a(t,"forEach",s)}catch(e){t.forEach=s}};for(var l in r)r[l]&&u(n[l]&&n[l].prototype);u(o)},fe05:function(t,e,i){!function(e,i){t.exports=i()}(0,(function(){"use strict";var t={year:0,month:1,day:2,hour:3,minute:4,second:5},e={};return function(i,n,r){var o,s=function(t,i,n){void 0===n&&(n={});var r=new Date(t);return function(t,i){void 0===i&&(i={});var n=i.timeZoneName||"short",r=t+"|"+n,o=e[r];return o||(o=new Intl.DateTimeFormat("en-US",{hour12:!1,timeZone:t,year:"numeric",month:"2-digit",day:"2-digit",hour:"2-digit",minute:"2-digit",second:"2-digit",timeZoneName:n}),e[r]=o),o}(i,n).formatToParts(r)},a=function(e,i){for(var n=s(e,i),o=[],a=0;a<n.length;a+=1){var u=n[a],l=u.type,c=u.value,f=t[l];f>=0&&(o[f]=parseInt(c,10))}var d=o[3],m=24===d?0:d,h=o[0]+"-"+o[1]+"-"+o[2]+" "+m+":"+o[4]+":"+o[5]+":000",p=+e;return(r.utc(h).valueOf()-(p-=p%1e3))/6e4},u=n.prototype;u.tz=function(t,e){void 0===t&&(t=o);var i=this.utcOffset(),n=this.toDate(),s=n.toLocaleString("en-US",{timeZone:t}),a=Math.round((n-new Date(s))/1e3/60),u=r(s).$set("millisecond",this.$ms).utcOffset(15*-Math.round(n.getTimezoneOffset()/15)-a,!0);if(e){var l=u.utcOffset();u=u.add(i-l,"minute")}return u.$x.$timezone=t,u},u.offsetName=function(t){var e=this.$x.$timezone||r.tz.guess(),i=s(this.valueOf(),e,{timeZoneName:t}).find((function(t){return"timezonename"===t.type.toLowerCase()}));return i&&i.value};var l=u.startOf;u.startOf=function(t,e){if(!this.$x||!this.$x.$timezone)return l.call(this,t,e);var i=r(this.format("YYYY-MM-DD HH:mm:ss:SSS"));return l.call(i,t,e).tz(this.$x.$timezone,!0)},r.tz=function(t,e,i){var n=i&&e,s=i||e||o,u=a(+r(),s);if("string"!=typeof t)return r(t).tz(s);var l=function(t,e,i){var n=t-60*e*1e3,r=a(n,i);if(e===r)return[n,e];var o=a(n-=60*(r-e)*1e3,i);return r===o?[n,r]:[t-60*Math.min(r,o)*1e3,Math.max(r,o)]}(r.utc(t,n).valueOf(),u,s),c=l[0],f=l[1],d=r(c).utcOffset(f);return d.$x.$timezone=s,d},r.tz.guess=function(){return Intl.DateTimeFormat().resolvedOptions().timeZone},r.tz.setDefault=function(t){o=t}}}))}}]);