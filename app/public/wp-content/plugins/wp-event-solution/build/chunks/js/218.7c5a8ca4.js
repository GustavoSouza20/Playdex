"use strict";(globalThis.webpackChunkwp_event_solution=globalThis.webpackChunkwp_event_solution||[]).push([[218],{38296:(e,t,n)=>{n.d(t,{A:()=>s});var a=n(51609),i=n(56427),l=n(92911),o=n(18062),r=n(27154);function s(e){const{title:t}=e;return(0,a.createElement)(i.Fill,{name:r.PRIMARY_HEADER_NAME},(0,a.createElement)(l.A,{justify:"space-between",align:"center",wrap:"wrap",gap:20},(0,a.createElement)(o.A,{title:t})))}},94218:(e,t,n)=>{n.r(t),n.d(t,{default:()=>p});var a=n(51609),i=n(29491),l=n(47143),o=n(27723),r=n(98731),s=n(47767),c=n(69815),u=n(75093),g=n(38296);const m=(0,l.withSelect)(e=>{const t=e("eventin/global");return{settings:t.getSettings(),isLoading:t.isResolving("getSettings")}}),p=(0,i.compose)(m)(function(e){(0,r.fB)({prefix:"eve"});const{settings:t,isLoading:n}=e||{},i=(0,s.useNavigate)();if(t&&"on"!==t?.modules?.automation)return(0,a.createElement)(s.Navigate,{to:"/dashboard",replace:!0});const l=c.default.div`
		background-color: #f4f6fa;
		padding: 12px 32px;

		.automation-list__header .ant-btn-primary {
			height: 40px;
		}
	`;return(0,a.createElement)(a.Fragment,null,(0,a.createElement)(g.A,{title:(0,o.__)("Automation","eventin")}),(0,a.createElement)(l,null,(0,a.createElement)(r.eb,{onEdit:e=>i(`/automation/${e}/edit`)})),(0,a.createElement)(u.FloatingHelpButton,null))})}}]);