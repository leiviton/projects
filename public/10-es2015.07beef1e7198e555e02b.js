(window.webpackJsonp=window.webpackJsonp||[]).push([[10],{glNo:function(l,n,u){"use strict";u.r(n);var t=u("8Y7J");class e{}var o=u("pMnS"),a=u("SVse"),c=u("Uo/Y"),s=u("IheW"),i=u("iInd"),b=u("EApP"),r=u("G0yt"),d=u("gFH1"),p=u("7g+E");let g=(()=>{class l extends c.a{constructor(){super(...arguments),this.eventEmitter=new t.m}builder(l=""){return super.builder(l)}}return l.ngInjectableDef=t.Tb({factory:function(){return new l(t.Ub(s.c),t.Ub(i.m),t.Ub(b.j),t.Ub(r.w),t.Ub(d.a),t.Ub(p.c))},token:l,providedIn:"root"}),l})();class v{constructor(l){this.service=l,this.audits=[],this.modalReference=null,this.closeResult="",this.fiscal=!1,this.link="",this.audit={id:"",user_type:"",event:"",auditable_type:"",auditable_id:"",old_values:"",new_values:"",url:"",ip_address:"",user_agent:"",tags:""},this.formData=new FormData}ngOnInit(){this.service.setAccessToken(),this.service.builder("admin/audit").list().then(l=>{this.audits=l.data,console.log(this.audits)})}open(l,n=null){this.audit=n,console.log(this.audit),this.service.open(l,{backdrop:"static"})}getEvent(l){switch(l){case"created":return"Criou";case"updated":return"Atualizou";case"deleted":return"Deletou";default:return"Visualizou"}}getEntidade(l){switch(l){case"ApiWebSac\\Models\\Company":return"Cliente";case"ApiWebSac\\Models\\User":return"Usu\xe1rio";case"ApiWebSac\\Models\\Solicitation":return"Solicita\xe7\xe3o";case"ApiWebSac\\Models\\Patient":return"Paciente";case"ApiWebSac\\Models\\Address":return"Endere\xe7o";case"ApiWebSac\\Models\\PatientContact":return"Contato";case"ApiWebSac\\Models\\SchedulingSolicitation":return"AgendaChamado";case"ApiWebSac\\Models\\SolicitationItem":return"ProdutoChamado";default:return"Visualizou"}}}var f=t.sb({encapsulation:0,styles:[[".content.companies[_ngcontent-%COMP%]   .card-header[_ngcontent-%COMP%]   button[_ngcontent-%COMP%]{background-color:#fff;padding:5px 10px}.content.companies[_ngcontent-%COMP%]   .card-header[_ngcontent-%COMP%]   button[_ngcontent-%COMP%]   i[_ngcontent-%COMP%]{font-size:12px}.content.companies[_ngcontent-%COMP%]   .card-header[_ngcontent-%COMP%]   button[_ngcontent-%COMP%]:hover{color:#2bbbad}.content.companies[_ngcontent-%COMP%]   .tab-content[_ngcontent-%COMP%]   table[_ngcontent-%COMP%]   tbody[_ngcontent-%COMP%]   button[_ngcontent-%COMP%]   i[_ngcontent-%COMP%]{font-size:14px}.content.companies[_ngcontent-%COMP%]   .tab-content[_ngcontent-%COMP%]   table[_ngcontent-%COMP%]   tbody[_ngcontent-%COMP%]   button[_ngcontent-%COMP%]:hover   i[_ngcontent-%COMP%]{color:#fff}.drs-custom-select[_ngcontent-%COMP%]   label[_ngcontent-%COMP%]{top:-30px;font-size:12px}.drs-custom-select[_ngcontent-%COMP%]   select[_ngcontent-%COMP%]{display:block!important;margin-top:2.5rem;border:1px solid #9e9e9e}.drs-custom-upload[_ngcontent-%COMP%]{margin-bottom:1rem}.drs-custom-upload[_ngcontent-%COMP%]   label[_ngcontent-%COMP%]{position:inherit;display:block;margin-bottom:.5rem}.pricingTable-header[_ngcontent-%COMP%]   .card[_ngcontent-%COMP%]{background-color:transparent}.pricingTable.greenColor[_ngcontent-%COMP%]:hover   .pricingTable-header[_ngcontent-%COMP%]{background:#2bbbad}"]],data:{}});function O(l){return t.Qb(0,[(l()(),t.ub(0,0,null,null,3,"tr",[],null,null,null,null,null)),(l()(),t.ub(1,0,null,null,2,"td",[["colspan","4"]],null,null,null,null,null)),(l()(),t.ub(2,0,null,null,1,"p",[["class","font-weight-bold"]],null,null,null,null,null)),(l()(),t.Ob(-1,null,["Sem dados para exibir"]))],null,null)}function m(l){return t.Qb(0,[(l()(),t.ub(0,0,null,null,11,"tr",[],null,null,null,null,null)),(l()(),t.ub(1,0,null,null,1,"td",[],null,null,null,null,null)),(l()(),t.Ob(2,null,["",""])),(l()(),t.ub(3,0,null,null,1,"td",[],null,null,null,null,null)),(l()(),t.Ob(4,null,["",""])),(l()(),t.ub(5,0,null,null,1,"td",[],null,null,null,null,null)),(l()(),t.Ob(6,null,["",""])),(l()(),t.ub(7,0,null,null,4,"td",[["class","text-center"]],null,null,null,null,null)),(l()(),t.ub(8,0,null,null,3,"div",[["style","display: flex; align-items: center; justify-content: center;"]],null,null,null,null,null)),(l()(),t.ub(9,0,null,null,2,"div",[],null,null,null,null,null)),(l()(),t.ub(10,0,null,null,1,"button",[["class","btn btn-outline-info btn-border-radius"]],null,[[null,"click"]],function(l,n,u){var e=!0;return"click"===n&&(e=!1!==l.component.open(t.Gb(l.parent,28),l.context.$implicit)&&e),e},null,null)),(l()(),t.ub(11,0,null,null,0,"i",[["class","fas fa-eye"]],null,null,null,null,null))],null,function(l,n){var u=n.component;l(n,2,0,n.context.$implicit.user.data.name),l(n,4,0,u.getEvent(n.context.$implicit.event)),l(n,6,0,u.getEntidade(n.context.$implicit.auditable_type))})}function h(l){return t.Qb(0,[(l()(),t.ub(0,0,null,null,5,"div",[["class","modal-header"]],null,null,null,null,null)),(l()(),t.ub(1,0,null,null,1,"h3",[["class","outs-title"]],null,null,null,null,null)),(l()(),t.Ob(-1,null,["Detalhes das Altera\xe7\xf5es"])),(l()(),t.ub(3,0,null,null,2,"button",[["aria-label","Close"],["class","close"],["type","button"]],null,[[null,"click"]],function(l,n,u){var t=!0;return"click"===n&&(t=!1!==l.context.dismiss("Cross click")&&t),t},null,null)),(l()(),t.ub(4,0,null,null,1,"span",[["aria-hidden","true"]],null,null,null,null,null)),(l()(),t.Ob(-1,null,["\xd7"])),(l()(),t.ub(6,0,null,null,45,"div",[["class","modal-body"]],null,null,null,null,null)),(l()(),t.ub(7,0,null,null,41,"div",[["class","card"]],null,null,null,null,null)),(l()(),t.ub(8,0,null,null,13,"div",[["class","card-header co-12"]],null,null,null,null,null)),(l()(),t.ub(9,0,null,null,12,"div",[["class","row"]],null,null,null,null,null)),(l()(),t.ub(10,0,null,null,5,"div",[["class","col-6"]],null,null,null,null,null)),(l()(),t.ub(11,0,null,null,4,"p",[["class","title"]],null,null,null,null,null)),(l()(),t.ub(12,0,null,null,2,"strong",[["class","font-bold"]],null,null,null,null,null)),(l()(),t.ub(13,0,null,null,0,"i",[["class","fas fa-user"]],null,null,null,null,null)),(l()(),t.Ob(-1,null,[" Usu\xe1rio: "])),(l()(),t.Ob(15,null,[" ",""])),(l()(),t.ub(16,0,null,null,5,"div",[["class","col-6"]],null,null,null,null,null)),(l()(),t.ub(17,0,null,null,4,"p",[["class","title"]],null,null,null,null,null)),(l()(),t.ub(18,0,null,null,2,"strong",[["class","font-bold"]],null,null,null,null,null)),(l()(),t.ub(19,0,null,null,0,"i",[["class","fa fa-edit"]],null,null,null,null,null)),(l()(),t.Ob(-1,null,[" A\xe7\xe3o: "])),(l()(),t.Ob(21,null,[" ",""])),(l()(),t.ub(22,0,null,null,26,"div",[["class","card-body"]],null,null,null,null,null)),(l()(),t.ub(23,0,null,null,12,"div",[["class","row"]],null,null,null,null,null)),(l()(),t.ub(24,0,null,null,6,"div",[["class","col-6"]],null,null,null,null,null)),(l()(),t.ub(25,0,null,null,5,"div",[],null,null,null,null,null)),(l()(),t.ub(26,0,null,null,4,"p",[],null,null,null,null,null)),(l()(),t.ub(27,0,null,null,1,"strong",[["class","font-bold"]],null,null,null,null,null)),(l()(),t.Ob(-1,null,["IP:"])),(l()(),t.ub(29,0,null,null,1,"span",[],null,null,null,null,null)),(l()(),t.Ob(30,null,[" ",""])),(l()(),t.ub(31,0,null,null,4,"div",[["class","col-12"]],null,null,null,null,null)),(l()(),t.ub(32,0,null,null,3,"p",[],null,null,null,null,null)),(l()(),t.ub(33,0,null,null,1,"strong",[["class","font-bold"]],null,null,null,null,null)),(l()(),t.Ob(-1,null,["Agente:"])),(l()(),t.Ob(35,null,[" ",""])),(l()(),t.ub(36,0,null,null,12,"div",[["class","row"]],null,null,null,null,null)),(l()(),t.ub(37,0,null,null,5,"div",[["class","col-6"]],null,null,null,null,null)),(l()(),t.ub(38,0,null,null,2,"p",[],null,null,null,null,null)),(l()(),t.ub(39,0,null,null,1,"strong",[["class","font-bold"]],null,null,null,null,null)),(l()(),t.Ob(-1,null,["OLD:"])),(l()(),t.ub(41,0,null,null,1,"code",[],null,null,null,null,null)),(l()(),t.Ob(42,null,[" "," "])),(l()(),t.ub(43,0,null,null,5,"div",[["class","col-6"]],null,null,null,null,null)),(l()(),t.ub(44,0,null,null,2,"p",[],null,null,null,null,null)),(l()(),t.ub(45,0,null,null,1,"strong",[["class","font-bold"]],null,null,null,null,null)),(l()(),t.Ob(-1,null,["NEW:"])),(l()(),t.ub(47,0,null,null,1,"code",[],null,null,null,null,null)),(l()(),t.Ob(48,null,[" "," "])),(l()(),t.ub(49,0,null,null,2,"div",[["_ngcontent-mia-c11",""],["class","form-line d-flex justify-content-end"]],null,null,null,null,null)),(l()(),t.ub(50,0,null,null,1,"button",[["_ngcontent-kfa-c12",""],["aria-label","Close"],["class","btn btn-outline-danger btn-border-radius mr-2"]],null,[[null,"click"]],function(l,n,u){var t=!0;return"click"===n&&(t=!1!==l.context.dismiss("Cross click")&&t),t},null,null)),(l()(),t.Ob(-1,null,["Fechar "]))],null,function(l,n){var u=n.component;l(n,15,0,u.audit.user.data.name),l(n,21,0,u.audit.event),l(n,30,0,u.audit.ip_address),l(n,35,0,u.audit.user_agent),l(n,42,0,u.audit.old_values),l(n,48,0,u.audit.new_values)})}function _(l){return t.Qb(0,[(l()(),t.ub(0,0,null,null,26,"section",[["class","content companies"]],null,null,null,null,null)),(l()(),t.ub(1,0,null,null,25,"div",[["class","container-fluid mt--7"]],null,null,null,null,null)),(l()(),t.ub(2,0,null,null,24,"div",[["class","row clearfix"]],null,null,null,null,null)),(l()(),t.ub(3,0,null,null,23,"div",[["class","col-lg-12 col-md-12 col-sm-12 col-xs-12"]],null,null,null,null,null)),(l()(),t.ub(4,0,null,null,22,"div",[["class","card"]],null,null,null,null,null)),(l()(),t.ub(5,0,null,null,2,"div",[["class","card-header table-list-header border-0 d-flex justify-content-between"]],null,null,null,null,null)),(l()(),t.ub(6,0,null,null,1,"h3",[["class","mb-0"]],null,null,null,null,null)),(l()(),t.Ob(-1,null,["Auditoria sistema"])),(l()(),t.ub(8,0,null,null,18,"div",[["class","tab-content"]],null,null,null,null,null)),(l()(),t.ub(9,0,null,null,17,"div",[["class","tab-pane fade in active show"],["role","tabpanel"]],null,null,null,null,null)),(l()(),t.ub(10,0,null,null,16,"div",[["class","table-responsive"]],null,null,null,null,null)),(l()(),t.ub(11,0,null,null,15,"div",[["class","table-responsive"]],null,null,null,null,null)),(l()(),t.ub(12,0,null,null,14,"table",[["class","table"]],null,null,null,null,null)),(l()(),t.ub(13,0,null,null,8,"thead",[["class","thead-light"]],null,null,null,null,null)),(l()(),t.ub(14,0,null,null,7,"tr",[],null,null,null,null,null)),(l()(),t.ub(15,0,null,null,1,"th",[["scope","col"]],null,null,null,null,null)),(l()(),t.Ob(-1,null,["Usu\xe1rio"])),(l()(),t.ub(17,0,null,null,1,"th",[["scope","col"]],null,null,null,null,null)),(l()(),t.Ob(-1,null,["A\xe7\xe3o"])),(l()(),t.ub(19,0,null,null,1,"th",[["scope","col"]],null,null,null,null,null)),(l()(),t.Ob(-1,null,["Entidade"])),(l()(),t.ub(21,0,null,null,0,"th",[["class","text-center"]],null,null,null,null,null)),(l()(),t.ub(22,0,null,null,4,"tbody",[],null,null,null,null,null)),(l()(),t.jb(16777216,null,null,1,null,O)),t.tb(24,16384,null,0,a.m,[t.O,t.L],{ngIf:[0,"ngIf"]},null),(l()(),t.jb(16777216,null,null,1,null,m)),t.tb(26,278528,null,0,a.l,[t.O,t.L,t.r],{ngForOf:[0,"ngForOf"]},null),(l()(),t.ub(27,0,null,null,1,"section",[],null,null,null,null,null)),(l()(),t.jb(0,[["content",2]],null,0,null,h))],function(l,n){var u=n.component;l(n,24,0,0==u.audits.length),l(n,26,0,u.audits)},null)}function C(l){return t.Qb(0,[(l()(),t.ub(0,0,null,null,1,"app-audit",[],null,null,null,_,f)),t.tb(1,114688,null,0,v,[g],null,null)],function(l,n){l(n,1,0)},null)}var M=t.qb("app-audit",v,C,{},{},[]),P=u("s7LF");class w{}var x=u("AjGe");u.d(n,"AuditModuleNgFactory",function(){return y});var y=t.rb(e,[],function(l){return t.Db([t.Eb(512,t.j,t.bb,[[8,[o.a,M]],[3,t.j],t.w]),t.Eb(4608,a.o,a.n,[t.t,[2,a.G]]),t.Eb(4608,P.v,P.v,[]),t.Eb(4608,g,g,[s.c,i.m,b.j,r.w,d.a,p.c]),t.Eb(1073742336,a.c,a.c,[]),t.Eb(1073742336,P.u,P.u,[]),t.Eb(1073742336,P.i,P.i,[]),t.Eb(1073742336,i.q,i.q,[[2,i.v],[2,i.m]]),t.Eb(1073742336,w,w,[]),t.Eb(1073742336,x.b,x.b,[]),t.Eb(1073742336,e,e,[]),t.Eb(1024,i.k,function(){return[[{path:"",component:v}]]},[])])})}}]);