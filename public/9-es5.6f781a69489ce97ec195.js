(window.webpackJsonp=window.webpackJsonp||[]).push([[9],{glNo:function(l,n,u){"use strict";u.r(n);var t=u("CcnG"),e=function(){return function(){}}(),o=u("pMnS"),c=u("Ip0R"),a=u("mrSG"),i=u("Uo/Y"),s=u("t/Na"),b=u("ZYCi"),r=u("SZbH"),d=u("4GxJ"),p=u("gFH1"),w=u("miAi"),g=function(l){function n(){var n=null!==l&&l.apply(this,arguments)||this;return n.eventEmitter=new t.m,n}return a.c(n,l),n.prototype.builder=function(n){return void 0===n&&(n=""),l.prototype.builder.call(this,n)},n.ngInjectableDef=t.Vb({factory:function(){return new n(t.Wb(s.c),t.Wb(b.m),t.Wb(r.j),t.Wb(d.w),t.Wb(p.a),t.Wb(w.c))},token:n,providedIn:"root"}),n}(i.a),f=function(){function l(l){this.service=l,this.audits=[],this.modalReference=null,this.closeResult="",this.fiscal=!1,this.link="",this.audit={id:"",user_type:"",event:"",auditable_type:"",auditable_id:"",old_values:"",new_values:"",url:"",ip_address:"",user_agent:"",tags:""},this.formData=new FormData}return l.prototype.ngOnInit=function(){var l=this;this.service.setAccessToken(),this.service.builder("admin/audit").list().then(function(n){l.audits=n.data,console.log(l.audits)})},l.prototype.open=function(l,n){void 0===n&&(n=null),this.audit=n,console.log(this.audit),this.service.open(l,{backdrop:"static"})},l.prototype.getEvent=function(l){switch(l){case"created":return"Criou";case"updated":return"Atualizou";case"deleted":return"Deletou";default:return"Visualizou"}},l.prototype.getEntidade=function(l){switch(l){case"ApiWebSac\\Models\\Company":return"Cliente";case"ApiWebSac\\Models\\User":return"Usu\xe1rio";case"ApiWebSac\\Models\\Solicitation":return"Solicita\xe7\xe3o";case"ApiWebSac\\Models\\Patient":return"Paciente";case"ApiWebSac\\Models\\Address":return"Endere\xe7o";case"ApiWebSac\\Models\\PatientContact":return"Contato";case"ApiWebSac\\Models\\SchedulingSolicitation":return"AgendaChamado";case"ApiWebSac\\Models\\SolicitationItem":return"ProdutoChamado";default:return"Visualizou"}},l}(),v=t.ub({encapsulation:0,styles:[[".content.companies[_ngcontent-%COMP%]   .card-header[_ngcontent-%COMP%]   button[_ngcontent-%COMP%]{background-color:#fff;padding:5px 10px}.content.companies[_ngcontent-%COMP%]   .card-header[_ngcontent-%COMP%]   button[_ngcontent-%COMP%]   i[_ngcontent-%COMP%]{font-size:12px}.content.companies[_ngcontent-%COMP%]   .card-header[_ngcontent-%COMP%]   button[_ngcontent-%COMP%]:hover{color:#2bbbad}.content.companies[_ngcontent-%COMP%]   .tab-content[_ngcontent-%COMP%]   table[_ngcontent-%COMP%]   tbody[_ngcontent-%COMP%]   button[_ngcontent-%COMP%]   i[_ngcontent-%COMP%]{font-size:14px}.content.companies[_ngcontent-%COMP%]   .tab-content[_ngcontent-%COMP%]   table[_ngcontent-%COMP%]   tbody[_ngcontent-%COMP%]   button[_ngcontent-%COMP%]:hover   i[_ngcontent-%COMP%]{color:#fff}.drs-custom-select[_ngcontent-%COMP%]   label[_ngcontent-%COMP%]{top:-30px;font-size:12px}.drs-custom-select[_ngcontent-%COMP%]   select[_ngcontent-%COMP%]{display:block!important;margin-top:2.5rem;border:1px solid #9e9e9e}.drs-custom-upload[_ngcontent-%COMP%]{margin-bottom:1rem}.drs-custom-upload[_ngcontent-%COMP%]   label[_ngcontent-%COMP%]{position:inherit;display:block;margin-bottom:.5rem}.pricingTable-header[_ngcontent-%COMP%]   .card[_ngcontent-%COMP%]{background-color:transparent}.pricingTable.greenColor[_ngcontent-%COMP%]:hover   .pricingTable-header[_ngcontent-%COMP%]{background:#2bbbad}"]],data:{}});function m(l){return t.Sb(0,[(l()(),t.wb(0,0,null,null,3,"tr",[],null,null,null,null,null)),(l()(),t.wb(1,0,null,null,2,"td",[["colspan","4"]],null,null,null,null,null)),(l()(),t.wb(2,0,null,null,1,"p",[["class","font-weight-bold"]],null,null,null,null,null)),(l()(),t.Qb(-1,null,["Sem dados para exibir"]))],null,null)}function h(l){return t.Sb(0,[(l()(),t.wb(0,0,null,null,11,"tr",[],null,null,null,null,null)),(l()(),t.wb(1,0,null,null,1,"td",[],null,null,null,null,null)),(l()(),t.Qb(2,null,["",""])),(l()(),t.wb(3,0,null,null,1,"td",[],null,null,null,null,null)),(l()(),t.Qb(4,null,["",""])),(l()(),t.wb(5,0,null,null,1,"td",[],null,null,null,null,null)),(l()(),t.Qb(6,null,["",""])),(l()(),t.wb(7,0,null,null,4,"td",[["class","text-center"]],null,null,null,null,null)),(l()(),t.wb(8,0,null,null,3,"div",[["style","display: flex; align-items: center; justify-content: center;"]],null,null,null,null,null)),(l()(),t.wb(9,0,null,null,2,"div",[],null,null,null,null,null)),(l()(),t.wb(10,0,null,null,1,"button",[["class","btn btn-outline-info btn-border-radius"]],null,[[null,"click"]],function(l,n,u){var e=!0;return"click"===n&&(e=!1!==l.component.open(t.Ib(l.parent,28),l.context.$implicit)&&e),e},null,null)),(l()(),t.wb(11,0,null,null,0,"i",[["class","fas fa-eye"]],null,null,null,null,null))],null,function(l,n){var u=n.component;l(n,2,0,n.context.$implicit.user.data.name),l(n,4,0,u.getEvent(n.context.$implicit.event)),l(n,6,0,u.getEntidade(n.context.$implicit.auditable_type))})}function C(l){return t.Sb(0,[(l()(),t.wb(0,0,null,null,5,"div",[["class","modal-header"]],null,null,null,null,null)),(l()(),t.wb(1,0,null,null,1,"h3",[["class","outs-title"]],null,null,null,null,null)),(l()(),t.Qb(-1,null,["Detalhes das Altera\xe7\xf5es"])),(l()(),t.wb(3,0,null,null,2,"button",[["aria-label","Close"],["class","close"],["type","button"]],null,[[null,"click"]],function(l,n,u){var t=!0;return"click"===n&&(t=!1!==l.context.dismiss("Cross click")&&t),t},null,null)),(l()(),t.wb(4,0,null,null,1,"span",[["aria-hidden","true"]],null,null,null,null,null)),(l()(),t.Qb(-1,null,["\xd7"])),(l()(),t.wb(6,0,null,null,45,"div",[["class","modal-body"]],null,null,null,null,null)),(l()(),t.wb(7,0,null,null,41,"div",[["class","card"]],null,null,null,null,null)),(l()(),t.wb(8,0,null,null,13,"div",[["class","card-header co-12"]],null,null,null,null,null)),(l()(),t.wb(9,0,null,null,12,"div",[["class","row"]],null,null,null,null,null)),(l()(),t.wb(10,0,null,null,5,"div",[["class","col-6"]],null,null,null,null,null)),(l()(),t.wb(11,0,null,null,4,"p",[["class","title"]],null,null,null,null,null)),(l()(),t.wb(12,0,null,null,2,"strong",[["class","font-bold"]],null,null,null,null,null)),(l()(),t.wb(13,0,null,null,0,"i",[["class","fas fa-user"]],null,null,null,null,null)),(l()(),t.Qb(-1,null,[" Usu\xe1rio: "])),(l()(),t.Qb(15,null,[" ",""])),(l()(),t.wb(16,0,null,null,5,"div",[["class","col-6"]],null,null,null,null,null)),(l()(),t.wb(17,0,null,null,4,"p",[["class","title"]],null,null,null,null,null)),(l()(),t.wb(18,0,null,null,2,"strong",[["class","font-bold"]],null,null,null,null,null)),(l()(),t.wb(19,0,null,null,0,"i",[["class","fa fa-edit"]],null,null,null,null,null)),(l()(),t.Qb(-1,null,[" A\xe7\xe3o: "])),(l()(),t.Qb(21,null,[" ",""])),(l()(),t.wb(22,0,null,null,26,"div",[["class","card-body"]],null,null,null,null,null)),(l()(),t.wb(23,0,null,null,12,"div",[["class","row"]],null,null,null,null,null)),(l()(),t.wb(24,0,null,null,6,"div",[["class","col-6"]],null,null,null,null,null)),(l()(),t.wb(25,0,null,null,5,"div",[],null,null,null,null,null)),(l()(),t.wb(26,0,null,null,4,"p",[],null,null,null,null,null)),(l()(),t.wb(27,0,null,null,1,"strong",[["class","font-bold"]],null,null,null,null,null)),(l()(),t.Qb(-1,null,["IP:"])),(l()(),t.wb(29,0,null,null,1,"span",[],null,null,null,null,null)),(l()(),t.Qb(30,null,[" ",""])),(l()(),t.wb(31,0,null,null,4,"div",[["class","col-12"]],null,null,null,null,null)),(l()(),t.wb(32,0,null,null,3,"p",[],null,null,null,null,null)),(l()(),t.wb(33,0,null,null,1,"strong",[["class","font-bold"]],null,null,null,null,null)),(l()(),t.Qb(-1,null,["Agente:"])),(l()(),t.Qb(35,null,[" ",""])),(l()(),t.wb(36,0,null,null,12,"div",[["class","row"]],null,null,null,null,null)),(l()(),t.wb(37,0,null,null,5,"div",[["class","col-6"]],null,null,null,null,null)),(l()(),t.wb(38,0,null,null,2,"p",[],null,null,null,null,null)),(l()(),t.wb(39,0,null,null,1,"strong",[["class","font-bold"]],null,null,null,null,null)),(l()(),t.Qb(-1,null,["OLD:"])),(l()(),t.wb(41,0,null,null,1,"code",[],null,null,null,null,null)),(l()(),t.Qb(42,null,[" "," "])),(l()(),t.wb(43,0,null,null,5,"div",[["class","col-6"]],null,null,null,null,null)),(l()(),t.wb(44,0,null,null,2,"p",[],null,null,null,null,null)),(l()(),t.wb(45,0,null,null,1,"strong",[["class","font-bold"]],null,null,null,null,null)),(l()(),t.Qb(-1,null,["NEW:"])),(l()(),t.wb(47,0,null,null,1,"code",[],null,null,null,null,null)),(l()(),t.Qb(48,null,[" "," "])),(l()(),t.wb(49,0,null,null,2,"div",[["_ngcontent-mia-c11",""],["class","form-line d-flex justify-content-end"]],null,null,null,null,null)),(l()(),t.wb(50,0,null,null,1,"button",[["_ngcontent-kfa-c12",""],["aria-label","Close"],["class","btn btn-outline-danger btn-border-radius mr-2"]],null,[[null,"click"]],function(l,n,u){var t=!0;return"click"===n&&(t=!1!==l.context.dismiss("Cross click")&&t),t},null,null)),(l()(),t.Qb(-1,null,["Fechar "]))],null,function(l,n){var u=n.component;l(n,15,0,u.audit.user.data.name),l(n,21,0,u.audit.event),l(n,30,0,u.audit.ip_address),l(n,35,0,u.audit.user_agent),l(n,42,0,u.audit.old_values),l(n,48,0,u.audit.new_values)})}function _(l){return t.Sb(0,[(l()(),t.wb(0,0,null,null,26,"section",[["class","content companies"]],null,null,null,null,null)),(l()(),t.wb(1,0,null,null,25,"div",[["class","container-fluid mt--7"]],null,null,null,null,null)),(l()(),t.wb(2,0,null,null,24,"div",[["class","row clearfix"]],null,null,null,null,null)),(l()(),t.wb(3,0,null,null,23,"div",[["class","col-lg-12 col-md-12 col-sm-12 col-xs-12"]],null,null,null,null,null)),(l()(),t.wb(4,0,null,null,22,"div",[["class","card"]],null,null,null,null,null)),(l()(),t.wb(5,0,null,null,2,"div",[["class","card-header table-list-header border-0 d-flex justify-content-between"]],null,null,null,null,null)),(l()(),t.wb(6,0,null,null,1,"h3",[["class","mb-0"]],null,null,null,null,null)),(l()(),t.Qb(-1,null,["Auditoria sistema"])),(l()(),t.wb(8,0,null,null,18,"div",[["class","tab-content"]],null,null,null,null,null)),(l()(),t.wb(9,0,null,null,17,"div",[["class","tab-pane fade in active show"],["role","tabpanel"]],null,null,null,null,null)),(l()(),t.wb(10,0,null,null,16,"div",[["class","table-responsive"]],null,null,null,null,null)),(l()(),t.wb(11,0,null,null,15,"div",[["class","table-responsive"]],null,null,null,null,null)),(l()(),t.wb(12,0,null,null,14,"table",[["class","table"]],null,null,null,null,null)),(l()(),t.wb(13,0,null,null,8,"thead",[["class","thead-light"]],null,null,null,null,null)),(l()(),t.wb(14,0,null,null,7,"tr",[],null,null,null,null,null)),(l()(),t.wb(15,0,null,null,1,"th",[["scope","col"]],null,null,null,null,null)),(l()(),t.Qb(-1,null,["Usu\xe1rio"])),(l()(),t.wb(17,0,null,null,1,"th",[["scope","col"]],null,null,null,null,null)),(l()(),t.Qb(-1,null,["A\xe7\xe3o"])),(l()(),t.wb(19,0,null,null,1,"th",[["scope","col"]],null,null,null,null,null)),(l()(),t.Qb(-1,null,["Entidade"])),(l()(),t.wb(21,0,null,null,0,"th",[["class","text-center"]],null,null,null,null,null)),(l()(),t.wb(22,0,null,null,4,"tbody",[],null,null,null,null,null)),(l()(),t.lb(16777216,null,null,1,null,m)),t.vb(24,16384,null,0,c.m,[t.Q,t.N],{ngIf:[0,"ngIf"]},null),(l()(),t.lb(16777216,null,null,1,null,h)),t.vb(26,278528,null,0,c.l,[t.Q,t.N,t.t],{ngForOf:[0,"ngForOf"]},null),(l()(),t.wb(27,0,null,null,1,"section",[],null,null,null,null,null)),(l()(),t.lb(0,[["content",2]],null,0,null,C))],function(l,n){var u=n.component;l(n,24,0,0==u.audits.length),l(n,26,0,u.audits)},null)}function M(l){return t.Sb(0,[(l()(),t.wb(0,0,null,null,1,"app-audit",[],null,null,null,_,v)),t.vb(1,114688,null,0,f,[g],null,null)],function(l,n){l(n,1,0)},null)}var P=t.sb("app-audit",f,M,{},{},[]),O=u("gIcY"),y=function(){return function(){}}(),Q=u("VN57");u.d(n,"AuditModuleNgFactory",function(){return x});var x=t.tb(e,[],function(l){return t.Fb([t.Gb(512,t.j,t.db,[[8,[o.a,P]],[3,t.j],t.y]),t.Gb(4608,c.o,c.n,[t.v,[2,c.G]]),t.Gb(4608,O.v,O.v,[]),t.Gb(4608,g,g,[s.c,b.m,r.j,d.w,p.a,w.c]),t.Gb(1073742336,c.c,c.c,[]),t.Gb(1073742336,O.u,O.u,[]),t.Gb(1073742336,O.i,O.i,[]),t.Gb(1073742336,b.q,b.q,[[2,b.v],[2,b.m]]),t.Gb(1073742336,y,y,[]),t.Gb(1073742336,Q.b,Q.b,[]),t.Gb(1073742336,e,e,[]),t.Gb(1024,b.k,function(){return[[{path:"",component:f}]]},[])])})}}]);