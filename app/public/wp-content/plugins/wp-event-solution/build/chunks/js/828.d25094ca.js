"use strict";(globalThis.webpackChunkwp_event_solution=globalThis.webpackChunkwp_event_solution||[]).push([[828],{5063:(e,t,a)=>{a.d(t,{$4:()=>r,GI:()=>i});var l=a(27154),n=a(69815);const i=n.default.div`
	background-color: #ffffff;
	max-width: 1200px;
	border-radius: 6px;
	margin: 0 auto;

	.header-title {
		text-align: center;
		font-weight: 600;
		font-size: 30px;
		color: #000000;
		margin-top: 10px;
		margin-bottom: 0px;
	}
	.header-desc {
		color: #475569;
		font-size: 16px;
		text-align: center;
		margin-bottom: 30px;
	}

	.intro-title {
		font-weight: 600;
		font-size: 2rem;
		line-height: 38px;
		margin: 0 0 20px;
		color: #020617;
	}

	.intro-list {
		display: flex;
		flex-direction: column;
		align-items: flex-start;
		font-size: 1rem;
		gap: 8px;
		margin: 0 0 2rem;
		padding: 0;
		color: #020617;
		list-style: none;
		font-weight: 400;
	}
	.intro-button {
		display: flex;
		align-items: center;
		border-radius: 6px;
	}
`,r=(n.default.div`
	margin: 0;
	position: relative;

	@media screen and ( max-width: 768px ) {
		margin: 0 0 2rem;
	}

	img {
		display: block;
		max-width: 100%;
	}

	iframe {
		border: none;
		border-radius: 10px;
	}

	.video-play-button {
		position: absolute;
		left: 50%;
		top: 50%;
		transform: translate( -50%, -50% );
		border-radius: 50%;
		background-color: rgba( 255, 255, 255, 0.2 );
		color: #fff;
		width: 60px !important;
		height: 60px;
		border-color: #f0eafc;

		&:hover {
			background-color: ${l.PRIMARY_COLOR};
			color: #fff;
			border-color: transparent;
		}

		&:focus {
			outline: none;
		}
	}
`,n.default.button`
	display: flex;
	align-items: center;
	gap: 8px;
	padding: 8px 16px;
	font-size: 16px;
	font-weight: 500;
	background: #f9f5ff;
	border: none;
	border-radius: 6px;
	cursor: pointer;
	position: relative;
	transition: all 0.2s ease;

	&::before {
		content: '';
		position: absolute;
		inset: -2px;
		border-radius: 6px;
		padding: 1px;
		background: linear-gradient( to left top, #fc8229, #e93da0, #404ef0 );
		-webkit-mask:
			linear-gradient( #fff 0 0 ) content-box,
			linear-gradient( #fff 0 0 );
		mask:
			linear-gradient( #fff 0 0 ) content-box,
			linear-gradient( #fff 0 0 );
		-webkit-mask-composite: xor;
		mask-composite: exclude;
	}

	&:hover {
		transform: translateY( -1px );
		background: rgba( 99, 102, 241, 0.04 );
	}

	&:active {
		transform: translateY( 0 );
	}

	svg {
		color: #ff69b4;
	}
`,n.default.span`
	background: linear-gradient(
		90deg,
		#fc8327 0%,
		#e83aa5 50.5%,
		#3a4ff2 100%
	);
	-webkit-background-clip: text;
	-webkit-text-fill-color: rgba( 0, 0, 0, 0 );
	background-clip: text;
`,n.default.div`
	width: 100%;
	border: 1px solid #d9d9d9;
	border-radius: 6px;

	img {
		width: 100%;
	}

	.content-wrapper {
		padding: 20px;

		&-title {
			color: #0f172a;
			font-size: 20px;
			font-weight: 600;
			line-height: 28px;
			margin-top: 0px;
		}

		&-description {
			position: relative;
			margin: 0px 0px 12px 10px;
			color: #475569;
			font-size: 14px;
			&::before {
				content: '';
				position: absolute;
				width: 10px;
				height: 10px;
				background-color: ${({color:e})=>e};
				border-radius: 100px;
				left: -20px;
				bottom: 5px;
			}
		}
	}
`)},5100:(e,t,a)=>{a.d(t,{m:()=>i,t:()=>r});var l=a(51609),n=a(54725);const i=[{key:"gutenberg",title:"Block Editor",icon:(0,l.createElement)(n.WordpressIcon,null)},{key:"elementor",title:"Elementor",icon:(0,l.createElement)(n.ElementorTemplateIcon,null)}],r="https://support.themewinter.com/docs/plugins/plugin-docs/template-builder/how-to-create-event-templates/"},6525:(e,t,a)=>{a.d(t,{f:()=>n,g:()=>i});var l=a(69815);const n=l.default.div`
	background-color: #f4f6fa;
	padding: 12px 32px;
	min-height: 100vh;
`,i=l.default.div`
	padding: 20px;
	margin-top: -20px;
	.ant-tabs-nav-wrap {
		background-color: #fff;
	}
	.ant-tabs {
		.ant-tabs-tab {
			font-size: 18px;
			font-weight: 600;
			background: transparent;
			color: #262626;
			padding: 15px 20px;
		}
		.ant-tabs-content-holder {
			background-color: #ffffff;
			border: 1px solid #d9d9d9;
			border-radius: 8px;
			padding: 20px;
		}
		.ant-tabs-tab-active {
			background-color: #ffffff;
			border-bottom: 2px solid #d9d9d9;
		}
	}
`},9765:(e,t,a)=>{a.d(t,{A:()=>m});var l=a(51609),n=a(29491),i=a(47143),r=a(86087),o=a(27723),s=a(7638),c=a(64282),d=a(92911);const p=(0,i.withDispatch)(e=>({setShowCreateTemplateModal:e("eventin/global").setShowCreateTemplateModal})),m=(0,n.compose)([p])(({selectedEditor:e,setOpenSelectEditorModal:t,setShowCreateTemplateModal:a})=>{const[n,i]=(0,r.useState)(!1);return(0,l.createElement)(d.A,{gap:12,justify:"flex-end"},(0,l.createElement)(s.Ay,{variant:s.Vt,onClick:()=>t(!1)},(0,o.__)("Cancel","eventin")),(0,l.createElement)(s.Ay,{variant:s.zB,onClick:async()=>{try{i(!0),(await c.A.settings.updateSettings({selected_template_builder:e})).selected_template_builder&&(t(!1),a(!0))}catch(e){console.log(e)}finally{i(!1)}},loading:n},(0,o.__)("Apply Template","eventin")))})},12236:(e,t,a)=>{a.d(t,{A:()=>g});var l=a(51609),n=a(56427),i=a(27723),r=a(52741),o=a(92911),s=a(71524),c=a(32099),d=a(54725),p=a(75093),m=a(7638),u=a(27154);function g(e){const{title:t,buttonText:a,onClickCallback:g,handleOpenEditorSelectModal:f,selectedEditor:v}=e;return(0,l.createElement)(n.Fill,{name:u.PRIMARY_HEADER_NAME},(0,l.createElement)(o.A,{justify:"space-between",align:"center",wrap:"wrap",gap:20},(0,l.createElement)(p.LogoWithTitle,{title:t}),(0,l.createElement)(o.A,{align:"center",gap:8,wrap:"wrap"},v||window.localized_data_obj?.selected_template_builder?(0,l.createElement)(l.Fragment,null,(0,l.createElement)("p",null,(0,i.__)("Selected builder : ","eventin")),(0,l.createElement)(s.A,{color:"magenta"},(v||window.localized_data_obj?.selected_template_builder).charAt(0).toUpperCase()+(v||window.localized_data_obj?.selected_template_builder).slice(1))):null,(0,l.createElement)(c.A,{title:(0,i.__)("Open builder select","eventin"),placement:"bottomRight"},(0,l.createElement)(m.Ay,{variant:p.secondary,onClick:f},(0,l.createElement)(d.SelectEditorSettingsIcon,null))),(0,l.createElement)(p.PrimaryButton,{htmlType:"button",onClick:g,sx:{display:"flex",alignItems:"center",fontSize:"16px",fontWeight:600,borderRadius:"6px",height:"44px"}},(0,l.createElement)(d.PlusOutlined,null),a),(0,l.createElement)(r.A,{type:"vertical",style:{height:"44px",marginInline:"12px",top:"0"}}))))}},18448:(e,t,a)=>{a.d(t,{W:()=>s});var l=a(6836),n=a(27723);const i=(0,l.assetURL)("/images/events/event-emptypage.webp"),r=(0,l.assetURL)("/images/events/ticket-image.webp"),o=(0,l.assetURL)("/images/events/certificate.webp"),s=[{key:"template",title:(0,n.__)("Create your landing template","eventin"),lists:[(0,n.__)("Choose a layout that matches your event style","eventin"),(0,n.__)("Add your event details  & customize","eventin"),(0,n.__)("Save & publish your landing page instantly","eventin")],docs_link:"https://support.themewinter.com/docs/plugins/plugin-docs/template-builder/how-to-create-event-templates/",image:i,color:"#874CFC"},{key:"tickets",title:(0,n.__)("Create your tickets ","eventin"),lists:[(0,n.__)("Pick a professional ticket design","eventin"),(0,n.__)("Fill in event details & customize","eventin"),(0,n.__)("Save & publish your ready-to-use tickets","eventin")],docs_link:"https://support.themewinter.com/docs/plugins/plugin-docs/template-builder/template-builder-for-eventin-certificate-and-ticket/",image:r,color:"#3B82F6"},{key:"certificates",title:(0,n.__)("Create your certificates  ","eventin"),lists:[(0,n.__)("Select a certificate template you like","eventin"),(0,n.__)("Enter recipient details & add your signature","eventin"),(0,n.__)("Save & publish your certificate with one click","eventin")],docs_link:"https://support.themewinter.com/docs/plugins/plugin-docs/template-builder/certificate-builder-for-attendee/",image:o,color:"#10B981"}]},28631:(e,t,a)=>{a.d(t,{f:()=>i});var l=a(86087),n=a(64282);const i=()=>{const[e,t]=(0,l.useState)([]),[a,i]=(0,l.useState)(!1);return{getAllActiveTemplateBuilders:async()=>{i(!0);try{const e=await n.A.template.getActiveTemplateBuilders();return t(e),e}catch(e){console.log(e)}finally{i(!1)}},builderLists:e,builderLoading:a}}},30828:(e,t,a)=>{a.r(t),a.d(t,{default:()=>_});var l=a(51609),n=a(29491),i=a(47143),r=a(86087),o=a(52619),s=a(27723),c=a(75093),d=a(87968),p=a(64282),m=a(42670),u=a(69460),g=a(48290),f=a(57922),v=a(6525),h=a(43715),x=a(74349),b=a(12236),E=a(77247);const y=(0,i.withSelect)(e=>{const t=e("eventin/global");return{templateList:t.getTemplateList(),templateListLoading:t.getTemplateListLoading()}}),w=(0,i.withDispatch)(e=>({setShowCreateTemplateModal:e("eventin/global").setShowCreateTemplateModal})),_=(0,n.compose)([y,w])(e=>{const{setShowCreateTemplateModal:t,templateList:a,templateListLoading:n}=e,[i,y]=(0,r.useState)(window?.localized_data_obj?.selected_template_builder),[w,_]=(0,r.useState)(!1),[k,A]=(0,r.useState)("event"),{selectTemplate:T,getSelectedTemplate:S}=(0,f.A)(a),C=()=>{window?.localized_data_obj?.selected_template_builder||i?t(!0):_(!0)},z=async e=>{try{const t=await p.A.template.selectEventTemplate({id:e.id,type:e.type});t?.message&&T(e.type,{...e})}catch(e){(0,o.doAction)("eventin_notification",{type:"error",message:e.message})}};return n?(0,l.createElement)("div",null,(0,l.createElement)(b.A,{title:(0,s.__)("Template Builder","eventin"),buttonText:(0,s.__)("New Template","eventin"),onClickCallback:C,selectedEditor:i,handleOpenEditorSelectModal:()=>_(!0)}),(0,l.createElement)(d.A,null)):(0,l.createElement)("div",null,(0,l.createElement)(b.A,{title:(0,s.__)("Template Builder","eventin"),buttonText:(0,s.__)("New Template","eventin"),onClickCallback:C,selectedEditor:i,handleOpenEditorSelectModal:()=>_(!0)}),a&&a.length>0?(0,l.createElement)(v.f,{className:"eventin-page-wrapper"},(0,l.createElement)(E.A,{activeTab:k,setActiveTab:A,children:{event:(0,l.createElement)(h.A,{templates:a.filter(e=>"event"===e.type),templateType:"event",onTemplateSelect:z,selectedTemplateId:S("event")?.id,isLoading:n}),tickets:(0,l.createElement)(h.A,{templates:a.filter(e=>"ticket"===e.type),templateType:"ticket",onTemplateSelect:z,selectedTemplateId:S("ticket")?.id,isLoading:n}),certificate:(0,l.createElement)(h.A,{templates:a.filter(e=>"certificate"===e.type),templateType:"certificate",onTemplateSelect:z,selectedTemplateId:null,isLoading:n}),speaker:(0,l.createElement)(h.A,{templates:a.filter(e=>"speaker"===e.type),templateType:"speaker",onTemplateSelect:z,selectedTemplateId:S("speaker")?.id,isLoading:n})}})):(0,l.createElement)(g.A,null),(0,l.createElement)(m.A,{selectedEditor:i,setSelectedEditor:y,openSelectEditorModal:w,setOpenSelectEditorModal:_}),(0,l.createElement)(u.A,{selectedEditor:i,templateType:k}),(0,l.createElement)(x.A,null),(0,l.createElement)(c.FloatingHelpButton,null))})},38693:(e,t,a)=>{a.d(t,{A:()=>p});var l=a(51609),n=a(27723),i=a(92911),r=a(54725),o=a(72725),s=a(5100),c=a(80624),d=a(74871);const p=({installResponse:e,setInstallResponse:t,selectedEditor:a,setSelectedEditor:p,builderLists:m,builderLoading:u})=>(0,l.createElement)(d.d4,null,(0,l.createElement)(i.A,{justify:"center",gap:10},s.m.map(e=>(0,l.createElement)(d.$w,{key:e.key,active:a===e.key,onClick:()=>(async e=>{p(e)})(e.key)},a===e.key&&(0,l.createElement)("span",{className:"eve-svg-wrapper"},(0,l.createElement)(r.EditorSelectIcon,null)),e.icon,(0,l.createElement)("h4",null,e.title)))),(0,o.P)(m,a)&&a||"gutenberg"===a||e?.is_active||!a?(0,l.createElement)("p",{className:"eve-editor-list"},(0,n.__)("Please choose your preferred page builder from the list so you will only see templates that are made using that page builder.","eventin"),(0,l.createElement)("a",{className:"eve-link",href:s.t,target:"_blank"},(0,n.__)(" learn More","eventin"))):(0,l.createElement)(c.c,{installResponse:e,setInstallResponse:t,selectedEditor:a}))},42670:(e,t,a)=>{a.d(t,{A:()=>p});var l=a(51609),n=a(86087),i=a(27723),r=a(75093),o=a(72725),s=a(38693),c=a(28631),d=a(9765);const p=({selectedEditor:e,setSelectedEditor:t,openSelectEditorModal:a,setOpenSelectEditorModal:p})=>{const[m,u]=(0,n.useState)(null),{getAllActiveTemplateBuilders:g,builderLists:f,builderLoading:v}=(0,c.f)();return(0,n.useEffect)(()=>{g()},[]),(0,l.createElement)(r.Modal,{open:a,onCancel:()=>p(!1),footer:!!((0,o.P)(f,e)&&e||"gutenberg"===e||m?.is_active)&&(0,l.createElement)(d.A,{selectedEditor:e,setOpenSelectEditorModal:p}),width:"670px",destroyOnHidden:!0,wrapClassName:"etn-template-create-modal",title:(0,i.__)("Choose a Page Builder to Continue","eventin")},(0,l.createElement)(s.A,{builderLists:f,builderLoading:v,installResponse:m,setInstallResponse:u,selectedEditor:e,setSelectedEditor:t}))}},43715:(e,t,a)=>{a.d(t,{A:()=>u});var l=a(51609),n=a(47143),i=a(52619),r=a(27723),o=a(16133),s=a(90455),c=a(36082),d=a(80734),p=a(61751),m=a(64282);const u=(0,n.withDispatch)(e=>{const t=e("eventin/global");return{setRevalidateData:e=>{t.setRevalidateTemplateList(e),t.invalidateResolution("getTemplateList")}}})(({templates:e,setRevalidateData:t,templateType:a,onTemplateSelect:n,selectedTemplateId:u,isLoading:g=!1})=>{if(g)return(0,l.createElement)(c.g,null,Array.from({length:6}).map((e,t)=>(0,l.createElement)(c.O,{key:t})));if(0===e.length)return"certificate"===a?(0,l.createElement)(s.A,null):(0,l.createElement)(o.A,{description:(0,r.__)("No templates found","eventin"),style:{marginTop:"40px"}});const f=e=>{window.open(e,"_blank")},v=e=>{(0,d.A)({title:(0,r.__)("Are you sure?","eventin"),content:(0,r.__)("Are you sure you want to delete this template?","eventin"),onOk:()=>(async e=>{try{await m.A.template.deleteTemplate(e),t(!0),(0,i.doAction)("eventin_notification",{type:"success",message:(0,r.__)("Successfully deleted the template!","eventin")})}catch(e){(0,i.doAction)("eventin_notification",{type:"error",message:(0,r.__)("Failed to delete the template!","eventin")})}})(e)})};return(0,l.createElement)(c.g,null,e.map((e,t)=>(0,l.createElement)("div",{key:e.id,className:"template-card-item"},(0,l.createElement)(p.A,{selectedTemplateId:u,templateType:a,handleClick:()=>n(e),handleDeleteConfirm:v,handleEdit:f,template:e}))))})},48290:(e,t,a)=>{a.d(t,{A:()=>m});var l=a(51609),n=a(16370),i=a(92911),r=a(47152),o=a(27723),s=a(54725),c=a(7638),d=a(18448),p=a(5063);const m=()=>(0,l.createElement)(p.GI,{className:"wrapper"},(0,l.createElement)("h3",{className:"header-title"},(0,o.__)("Template Builder","eventin")),(0,l.createElement)("p",{className:"header-desc"},(0,o.__)("Easily create landing pages, tickets, and certificates in just a few steps.","eventin")),(0,l.createElement)(r.A,{className:"intro",gutter:[30,30],align:"middle"},d.W.map(e=>(0,l.createElement)(n.A,{xs:24,sm:24,md:12,lg:8,key:e.key},(0,l.createElement)(p.$4,{color:e.color},(0,l.createElement)("img",{src:e.image}),(0,l.createElement)("div",{className:"content-wrapper"},(0,l.createElement)("h4",{className:"content-wrapper-title"},e.title),(0,l.createElement)(i.A,{vertical:!0,gap:4},e.lists.map(e=>(0,l.createElement)("p",{className:"content-wrapper-description",key:e},e))),(0,l.createElement)(c.Ay,{variant:c.Qq,sx:{color:e.color,fontSize:"16px",fontWeight:600},icon:(0,l.createElement)(s.NewTabOpenIcon,{color:e.color}),iconPosition:"end",onClick:()=>window.open(e.docs_link,"_blank")},(0,o.__)("learn More","eventin"))))))))},57922:(e,t,a)=>{a.d(t,{A:()=>n});var l=a(86087);const n=e=>{const[t,a]=(0,l.useState)({event:null,ticket:null,certificate:null,speaker:null}),n=(0,l.useCallback)((e,t)=>{a(a=>({...a,[e]:{...t}}))},[]),i=(0,l.useCallback)(e=>t[e],[t]);return(0,l.useEffect)(()=>{Array.isArray(e)&&e.forEach(e=>{e.is_default&&a(t=>({...t,[e.type]:{...e}}))})},[e]),{selectedTemplates:t,selectTemplate:n,getSelectedTemplate:i}}},72725:(e,t,a)=>{a.d(t,{P:()=>l});const l=(e=[],t)=>{if(!Array.isArray(e)||0===e.length)return!1;const a=e.find(e=>e&&e.id===t);return!!a&&Boolean(a.is_active)}},74349:(e,t,a)=>{a.d(t,{A:()=>o});var l=a(51609),n=a(86087),i=a(500),r=a(48290);const o=()=>{var e;const[t,a]=(0,n.useState)(null===(e=JSON.parse(localStorage.getItem("showGuideModal")))||void 0===e||e),o=()=>{localStorage.setItem("showGuideModal",!1),a(!1)};return(0,l.createElement)(i.A,{open:t,destroyOnHidden:!0,onCancel:o,onOk:o,footer:null,maskClosable:!1,width:"75vw",className:"create-template-guide-modal"},(0,l.createElement)(r.A,null))}},74871:(e,t,a)=>{a.d(t,{$w:()=>i,Gj:()=>r,d4:()=>n});var l=a(69815);const n=l.default.div`
	.eve-editor-list {
		font-size: 14px;
		line-height: 18px;
		color: #454545;

		.eve-link {
			color: #6b2ee5;
			font-weight: 500;
			cursor: pointer;
		}
	}
`,i=l.default.div`
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	min-width: 120px;
	min-height: 120px;
	border-radius: 6px;
	border: 1px solid ${({active:e})=>e?"#6B2EE5":"#F0F0F0"};
	position: relative;
	cursor: pointer;
	h4 {
		color: #334155;
		font-size: 14px;
		font-weight: 500;
		line-height: 16px;
		margin: 12px 0px 0px 0px;
	}

	.eve-svg-wrapper {
		position: absolute;
		top: 8px;
		right: 8px;
	}
`,r=l.default.div`
	background-color: #f5f5f5;
	padding: 20px;
	border-radius: 6px;
	margin-top: 12px;

	h3 {
		font-weight: 600;
		font-size: 18px;
		color: #454545;
		margin: 0px;
	}
	p {
		font-size: 14px;
		line-height: 18px;
		color: #454545;
	}
`},77247:(e,t,a)=>{a.d(t,{A:()=>s});var l=a(51609),n=a(27723),i=a(80560),r=a(54725),o=a(6525);const s=({activeTab:e,setActiveTab:t,children:a})=>{const s=[{key:"event",label:(0,l.createElement)("span",{style:{display:"flex",alignItems:"center",gap:"8px"}},(0,l.createElement)(r.LandingPageIcon,null),(0,n.__)("Landing page","eventin")),children:a.event},{key:"ticket",label:(0,l.createElement)("span",{style:{display:"flex",alignItems:"center",gap:"8px"}},(0,l.createElement)(r.TicketIcon,null),(0,n.__)("Tickets","eventin")),children:a.tickets},{key:"certificate",label:(0,l.createElement)("span",{style:{display:"flex",alignItems:"center",gap:"8px"}},(0,l.createElement)(r.CertificateIcon,null),(0,n.__)("Certificate","eventin")),children:a.certificate},{key:"speaker",label:(0,l.createElement)("span",{style:{display:"flex",alignItems:"center",gap:"8px"}},(0,l.createElement)(r.SpeakerAndOrganizerIcon,null),(0,n.__)("Speaker","eventin")),children:a.speaker}];return(0,l.createElement)(o.g,null,(0,l.createElement)(i.A,{activeKey:e,onChange:t,items:s,style:{marginTop:"24px"}}))}},80624:(e,t,a)=>{a.d(t,{c:()=>c});var l=a(51609),n=a(86087),i=a(27723),r=a(7638),o=a(64282),s=a(74871);const c=({setInstallResponse:e,selectedEditor:t})=>{const[a,c]=(0,n.useState)(!1);return(0,l.createElement)(s.Gj,null,(0,l.createElement)("h3",null,(0,i.__)("It seems that the page builder you selected is inactive.","eventin")),(0,l.createElement)("p",null,(0,i.__)("By selecting Elementor, you can edit all Event, Certificate, and Ticket templates with ease. Create your own designs using both Eventin’s widgets and Elementor’s widgets easily.","eventin")),(0,l.createElement)(r.Ay,{variant:r.Vt,onClick:async()=>{c(!0);try{const a=await o.A.template.activeSelectedEditor({builder_id:t});return e(a),a}catch(e){console.log(e)}finally{c(!1)}},loading:a},(0,i.__)("Install & Active","eventin")))}},87968:(e,t,a)=>{a.d(t,{A:()=>p});var l=a(51609),n=a(69815),i=a(92911),r=a(75063);const o=n.default.div`
	padding: 24px;
	background: white;
	border-radius: 8px;
	box-shadow: 0 1px 3px rgba( 0, 0, 0, 0.1 );
`,s=n.default.div`
	padding: 24px;
	background: white;
`,c=(n.default.div`
	display: flex;
	justify-content: space-between;
	gap: 16px;
	margin-bottom: 24px;
	flex-wrap: wrap;

	@media ( max-width: 768px ) {
		flex-direction: column;
		gap: 24px;

		> div {
			width: 100%;
			justify-content: flex-start;
			flex-wrap: wrap;
		}
	}
`,n.default.div`
	display: grid;
	grid-template-columns: 40px 2fr 1fr 1fr 1fr 1fr 80px;
	padding: 12px 0;
	background: #f9fafb;
	margin-bottom: 8px;
	border-radius: 4px;

	@media ( max-width: 1024px ) {
		grid-template-columns: 40px 2fr 1fr 1fr 1fr 80px;
	}

	@media ( max-width: 768px ) {
		grid-template-columns: 40px 2fr 1fr 1fr 80px;
	}

	@media ( max-width: 576px ) {
		display: none;
	}
`),d=n.default.div`
	display: grid;
	grid-template-columns: 40px 2fr 1fr 1fr 1fr 1fr 80px;
	padding: 16px 0;
	align-items: center;
	border-bottom: 1px solid #f0f0f0;

	@media ( max-width: 1024px ) {
		grid-template-columns: 40px 2fr 1fr 1fr 1fr 80px;
	}

	@media ( max-width: 768px ) {
		grid-template-columns: 40px 2fr 1fr 1fr 80px;
	}

	@media ( max-width: 576px ) {
		grid-template-columns: 20px 1.5fr 1fr 1fr 80px;
		> div:first-of-child {
			display: none;
		}
		> div:nth-of-child( 7 ) {
			display: none;
		}
	}
`,p=()=>(0,l.createElement)(o,null,(0,l.createElement)(s,null,(0,l.createElement)(c,null,(0,l.createElement)("div",null),(0,l.createElement)(r.A.Button,{active:!0,size:"small",style:{width:80}}),(0,l.createElement)(r.A.Button,{active:!0,size:"small",style:{width:80}}),(0,l.createElement)(r.A.Button,{active:!0,size:"small",style:{width:80}}),(0,l.createElement)(r.A.Button,{active:!0,size:"small",style:{width:80}}),(0,l.createElement)(r.A.Button,{active:!0,size:"small",style:{width:80}}),(0,l.createElement)(r.A.Button,{active:!0,size:"small",style:{width:80}})),[1,2,3,4,5,6].map(e=>(0,l.createElement)(d,{key:e},(0,l.createElement)("div",null),(0,l.createElement)(r.A.Button,{active:!0,size:"small",style:{width:"80%"}}),(0,l.createElement)(r.A.Button,{active:!0,size:"small",style:{width:"80%"}}),(0,l.createElement)(r.A.Button,{active:!0,size:"small",style:{width:"80%"}}),(0,l.createElement)(r.A.Button,{active:!0,size:"small",style:{width:"80%"}}),(0,l.createElement)(r.A.Button,{active:!0,size:"small",style:{width:"80%"}}),(0,l.createElement)(r.A.Button,{active:!0,size:"small",style:{width:"80%"}}))),(0,l.createElement)(i.A,{justify:"space-between",style:{marginTop:24},wrap:"wrap",gap:16},(0,l.createElement)(r.A.Button,{active:!0,style:{width:150}}),(0,l.createElement)(r.A.Button,{active:!0,style:{width:200}}))))}}]);