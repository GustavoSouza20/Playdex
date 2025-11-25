"use strict";(globalThis.webpackChunkwp_event_solution=globalThis.webpackChunkwp_event_solution||[]).push([[555],{9555:(e,t,n)=>{n.r(t),n.d(t,{default:()=>P});var i=n(51609),a=n(29491),l=n(47143),r=n(86087),o=n(52619),s=n(27723),c=n(16370),d=n(54861),m=n(92911),u=n(60742),h=n(47152),p=n(428),_=n(32099),g=n(67313),f=n(74353),v=n.n(f),E=n(47767),A=n(54725),x=n(7638),b=n(94790),y=n(10012),k=n(6836),w=n(93015),S=n(64282),F=n(66878),T=n(16113),C=n(75093);const{Title:z,Text:D}=g.A,N=(0,l.withDispatch)(e=>{const t=e("eventin/global");return{invalidateScheduleList:()=>{t.invalidateResolution("getScheduleList")}}}),P=(0,a.compose)([N])(function(e){const{invalidateScheduleList:t}=e,[n]=u.A.useForm(),{id:a}=(0,E.useParams)(),l=(0,E.useNavigate)(),g=!!a,[f,N]=(0,r.useState)(!1),[P,I]=(0,r.useState)(!1);return(0,r.useEffect)(()=>{g&&(I(!0),S.A.schedule.singleSchedule(a).then(e=>{const t={...e,date:v()(e.date)};n.setFieldsValue(t)}).finally(()=>{I(!1)}))},[]),(0,i.createElement)(T.ff,null,(0,i.createElement)(F.A,null),(0,i.createElement)(T.sC,{className:"eventin-schedule-form-wrapper"},(0,i.createElement)(T.MG,{className:"eventin-schedule-form-container"},(0,i.createElement)("div",{style:{marginBottom:"40px"}},(0,i.createElement)(z,{level:3,style:{fontWeight:600,margin:"0 0 8px 0",fontSize:"26px",lineHeight:"32px",color:"#111827"}},g?(0,s.__)("Update your schedule","eventin"):(0,s.__)("Create new schedules for your event.","eventin")),(0,i.createElement)(D,{style:{fontSize:"14px",color:"#6B7280",display:"block"}},(0,s.__)("Add a schedule to keep your event organized and running smoothly.","eventin"))),P?(0,i.createElement)(m.A,{justify:"center",align:"center",style:{minHeight:"320px"}},(0,i.createElement)(p.A,null)):(0,i.createElement)(u.A,{layout:"vertical",form:n,scrollToFirstError:!0,size:"large",onFinish:async()=>{N(!0);try{await n.validateFields();const e=n.getFieldsValue(!0);if(e.date=(0,k.dateFormatter)(e.date),g){const n=await S.A.schedule.updateSchedule(a,e);if(!n?.id)throw new Error((0,s.__)("Couldn't edit schedule properly!","eventin"));t(),l("/schedules"),(0,o.doAction)("eventin_notification",{type:"success",message:(0,s.__)("Successfully updated the schedule!","eventin")})}else{const n=await S.A.schedule.createSchedule(e);if(!n?.id)throw new Error((0,s.__)("Couldn't create schedule properly!","eventin"));t(),l("/schedules"),(0,o.doAction)("eventin_notification",{type:"success",message:(0,s.__)("Successfully created the schedule!","eventin")})}}catch(e){console.error((0,s.__)("Couldn't create schedule!","eventin")),console.error(e)}finally{N(!1)}},initialValues:{schedule_slot:[""]}},(0,i.createElement)(h.A,{gutter:[16,0]},(0,i.createElement)(c.A,{xs:24,md:12},(0,i.createElement)(y.ks,{name:"program_title",label:(0,s.__)("Program Title","eventin"),rules:[{required:!0,message:(0,s.__)("Program title is required!","eventin")}],required:!0,placeholder:(0,s.__)("Program Title","eventin"),size:"large",tooltip:(0,s.__)("This is the main title shown to attendees and used to group topics.","eventin")})),(0,i.createElement)(c.A,{xs:24,md:12},(0,i.createElement)(u.A.Item,{name:"date",label:(0,s.__)("Select Date","eventin"),rules:[{required:!0,message:(0,s.__)("Program date is required!","eventin")}],tooltip:(0,s.__)("Pick the date this session or schedule will take place.","eventin")},(0,i.createElement)(d.A,{size:"large",minDate:v()(new Date),style:{width:"100%"},format:(0,k.getDateFormat)()})))),(0,i.createElement)(h.A,{gutter:[16,0]},(0,i.createElement)(c.A,{xs:24},(0,i.createElement)(m.A,{align:"center"},(0,i.createElement)("p",{style:{margin:"5px 0px",fontSize:"16px",fontWeight:500}},(0,s.__)("Schedule Topics","eventin")),(0,i.createElement)(_.A,{title:(0,s.__)("Give attendees a sneak peek at the key topics your event will address.","eventin")},(0,i.createElement)("span",{style:{marginLeft:"7px"}},(0,i.createElement)(A.InfoCircleOutlined,{width:15,height:15})))),(0,i.createElement)(u.A.List,{name:"schedule_slot",label:(0,s.__)("Schedule Topics","eventin")},(e,{add:t,remove:a},{errors:l})=>(0,i.createElement)(i.Fragment,null,(0,i.createElement)(w.A,{fields:e,form:n,remove:a}),(0,i.createElement)(u.A.Item,null,(0,i.createElement)(b.A,null,(0,i.createElement)(_.A,{title:(0,s.__)("Add a new schedule topic to provide more details about your event.","eventin")},(0,i.createElement)(x.Ay,{variant:x.Rm,onClick:()=>t(),icon:(0,i.createElement)(A.PlusOutlined,{width:16,height:16}),size:"middle",sx:{width:"100%",fontSize:"14px",fontWeight:500,height:"36px"}},(0,s.__)("Add Schedule Topic","eventin"))))))))),(0,i.createElement)(m.A,{gap:12,justify:"end"},(0,i.createElement)(x.Ay,{variant:x.Vt,onClick:()=>l("/schedules"),sx:{fontSize:"16px",fontWeight:"600",height:"44px",lineHeight:"1",color:"#262626",padding:"8px 24px"}},(0,s.__)("Cancel","eventin")),(0,i.createElement)(x.Ay,{variant:x.zB,loading:f,htmlType:"submit",sx:{fontSize:"16px",fontWeight:"600",height:"44px",lineHeight:"1"}},g?(0,s.__)("Update Schedule","eventin"):(0,s.__)("Create Schedule","eventin")))))),(0,i.createElement)(C.FloatingHelpButton,null))})},12824:(e,t,n)=>{n.d(t,{A:()=>i});const i={icon:{tag:"svg",attrs:{viewBox:"64 64 896 896",focusable:"false"},children:[{tag:"path",attrs:{d:"M904 160H120c-4.4 0-8 3.6-8 8v64c0 4.4 3.6 8 8 8h784c4.4 0 8-3.6 8-8v-64c0-4.4-3.6-8-8-8zm0 624H120c-4.4 0-8 3.6-8 8v64c0 4.4 3.6 8 8 8h784c4.4 0 8-3.6 8-8v-64c0-4.4-3.6-8-8-8zm0-312H120c-4.4 0-8 3.6-8 8v64c0 4.4 3.6 8 8 8h784c4.4 0 8-3.6 8-8v-64c0-4.4-3.6-8-8-8z"}}]},name:"menu",theme:"outlined"}},16113:(e,t,n)=>{n.d(t,{MG:()=>r,ff:()=>a,sC:()=>l});var i=n(69815);const a=i.default.div`
	background: #f3f5f7;
	min-height: calc( 100vh - 60px );
	padding-top: 30px;
`,l=i.default.div`
	background: #ffffff;
	border: 1px solid #e1e4e9;
	border-radius: 8px;
	padding: 20px;
	margin: 30px;
	margin-top: 0;
	@media ( max-width: 768px ) {
		padding: 10px;
		margin: 5px;
	}
`,r=i.default.div`
	max-width: 900px;
	padding: 20px 40px;
	margin: 0 auto;
	@media ( max-width: 768px ) {
		padding: 10px;
	}
`},44278:(e,t,n)=>{n.d(t,{A:()=>A});var i=n(51609),a=n(27723),l=n(86087),r=n(69815),o=n(16370),s=n(62567),c=n(60742),d=n(79888),m=n(47152),u=n(54725),h=n(7638),p=n(78847),_=n(37845),g=n(10012),f=n(6836),v=n(3087);const E=(0,r.default)(s.A)`
	.ant-collapse-content-box {
		background-color: #f5f5f5;
	}
`,A=e=>{const{form:t,field:n,remove:r}=e,[s,A]=(0,l.useState)(!1),[x,b]=(0,l.useState)(!1),[y,k]=(0,l.useState)(!1),w=[({getFieldValue:e})=>({validator(t,i){const a=e(["schedule_slot",n.name,"etn_shedule_end_time"]);if(a){const e=(0,f.getFormattedDateTime)({time:i});if((0,f.getFormattedDateTime)({time:a}).isBefore(e,"minutes"))return Promise.reject("Start time must be before end time")}return Promise.resolve()}})],S=[({getFieldValue:e})=>({validator(t,i){const l=e(["schedule_slot",n.name,"etn_shedule_start_time"]);if(l){const e=(0,f.getFormattedDateTime)({time:l});if((0,f.getFormattedDateTime)({time:i}).isBefore(e,"minutes"))return Promise.reject((0,a.__)("End time must be after start time","eventin"))}return Promise.resolve()}})],F=[{key:1,label:c.A.useWatch(["schedule_slot",n.name,"etn_schedule_topic"],{form:t,preserve:!0})||(0,a.__)("New Schedule Topic","eventin"),children:(0,i.createElement)(m.A,{gutter:[20,0]},(0,i.createElement)(o.A,{xs:24},(0,i.createElement)(g.ks,{name:[n.name,"etn_schedule_topic"],label:(0,a.__)("Topic Name","eventin"),placeholder:(0,a.__)("A short, clear title that attendees will understand.","eventin"),tooltip:(0,a.__)("What’s the session about? Placeholder: e.g. “The Future of AI”","eventin")})),(0,i.createElement)(o.A,{md:12,xs:24},(0,i.createElement)(p.A,{name:[n.name,"etn_shedule_start_time"],label:(0,a.__)("Start Time","eventin"),rules:w,tooltip:(0,a.__)("Add the start time block for this session","eventin"),dependencies:[["schedule_slot",n.name,"etn_shedule_end_time"]]})),(0,i.createElement)(o.A,{md:12,xs:24},(0,i.createElement)(p.A,{name:[n.name,"etn_shedule_end_time"],label:(0,a.__)("End Time","eventin"),tooltip:(0,a.__)("Add the end time block for this session","eventin"),dependencies:[["schedule_slot",n.name,"etn_shedule_start_time"]],rules:S})),(0,i.createElement)(o.A,{md:12,xs:24},(0,i.createElement)(c.A.Item,{name:[n.name,"speakers"],label:(0,a.__)("Speaker","eventin"),tooltip:(0,a.__)("Who’s speaking? Select from your added speakers","eventin")},(0,i.createElement)(_.A,{placeholder:(0,a.__)("Select the speakers for this event","eventin")},(0,i.createElement)(h.yl,{onClick:()=>A(!0)},(0,a.__)("Add New Speakers","eventin"))))),(0,i.createElement)(o.A,{md:12,xs:24},(0,i.createElement)(g.ks,{prefix:(0,i.createElement)(u.LocationOutlined,null),name:[n.name,"etn_shedule_room"],label:(0,a.__)("Location","eventin"),placeholder:(0,a.__)("Enter the room or location for this session","eventin"),tooltip:(0,a.__)("Where is this session taking place? Placeholder: e.g. Room 1, Building A","eventin")})),(0,i.createElement)(o.A,{xs:24},(0,i.createElement)(c.A.Item,{name:[n.name,"etn_shedule_objective"],label:(0,a.__)("Description","eventin"),placeholder:(0,a.__)("Add a brief description of this session","eventin"),tooltip:(0,a.__)("Add a description for this session","eventin")},(0,i.createElement)(d.A.TextArea,{className:"eventin-text-area",rows:3}))),(0,i.createElement)(v.A,{modalOpen:s,setModalOpen:A})),extra:y&&(0,i.createElement)(h.Ay,{variant:h.qy,icon:(0,i.createElement)(u.DeleteOutlined,{stroke:x?"#FF4D4F":"#747474"}),onClick:()=>r(n.name),onMouseEnter:()=>b(!0),onMouseLeave:()=>b(!1),size:"small"})}];return(0,i.createElement)(E,{expandIconPosition:"end",className:"etn-schedule-topic",items:F,style:{margin:"15px 0px"},accordion:!0,defaultActiveKey:[1],onChange:e=>k(!e?.length)})}},64463:(e,t,n)=>{n.d(t,{X:()=>d});var i=n(51609),a=n(43627),l=n(74979),r=n(69815),o=n(80635),s=n(44278);const c=r.default.div`
	position: relative;
	touch-action: none; // Important for mobile drag

	.drag-handle {
		position: absolute;
		left: -30px;
		top: 20px; // Align with accordion header
		height: 24px;
		width: 24px;
		display: flex;
		align-items: center;
		justify-content: center;
		color: #747474;
		cursor: grab;
		transition: color 0.2s ease;
		z-index: 10;
		background: white; // Optional: add background to ensure visibility

		&:hover {
			color: #40a9ff;
		}

		&.dragging {
			cursor: grabbing;
		}
	}

	&.dragging {
		z-index: 1;
		.etn-schedule-topic {
			background: white;
			box-shadow: 0 0 10px rgba( 0, 0, 0, 0.1 );
		}
	}
`;function d({id:e,field:t,remove:n,form:r}){const{attributes:d,listeners:m,setNodeRef:u,transform:h,transition:p,isDragging:_}=(0,a.gl)({id:e,transition:{duration:150,easing:"cubic-bezier(0.25, 1, 0.5, 1)"}}),g={transform:l.Ks.Transform.toString(h),transition:p};return(0,i.createElement)(c,{ref:u,style:g,className:_?"dragging":""},(0,i.createElement)("div",{className:"drag-handle "+(_?"dragging":""),...d,...m},(0,i.createElement)(o.A,null)),(0,i.createElement)(s.A,{field:t,remove:n,form:r}))}},66878:(e,t,n)=>{n.d(t,{A:()=>h});var i=n(51609),a=n(56427),l=n(27723),r=n(92911),o=n(47767),s=n(69815),c=n(54725),d=n(7638),m=n(18062),u=n(27154);function h(e){const{id:t}=(0,o.useParams)(),n=(0,o.useNavigate)(),h=!!t;return s.default.div`
		@media ( max-width: 560px ) {
			display: none;
			border: 1px solid red;
		}
	`,(0,i.createElement)(a.Fill,{name:u.PRIMARY_HEADER_NAME},(0,i.createElement)(r.A,{justify:"space-between",align:"center",wrap:"wrap",gap:20},(0,i.createElement)(r.A,{align:"center",gap:16},(0,i.createElement)(d.Ay,{variant:d.Vt,icon:(0,i.createElement)(c.AngleLeftIcon,null),sx:{height:"36px",width:"36px",backgroundColor:"#fafafa",borderColor:"transparent",lineHeight:"1"},onClick:()=>{n("/schedules")}}),(0,i.createElement)(m.A,{title:h?(0,l.__)("Edit Schedule","eventin"):(0,l.__)("New Schedule","eventin")}))))}},80635:(e,t,n)=>{n.d(t,{A:()=>s});var i=n(58168),a=n(51609),l=n(12824),r=n(12226),o=function(e,t){return a.createElement(r.A,(0,i.A)({},e,{ref:t,icon:l.A}))};const s=a.forwardRef(o)},93015:(e,t,n)=>{n.d(t,{A:()=>c});var i=n(51609),a=n(15871),l=n(43627),r=n(69815),o=n(64463);const s=r.default.div`
	margin-left: 30px;
	position: relative;

	.etn-schedule-topic {
		margin: 15px 0;
		transition: transform 200ms ease;
	}

	.etn-schedule-topic:first-of-child {
		margin-top: 0;
	}

	.etn-schedule-topic:last-child {
		margin-bottom: 0;
	}
`,c=({fields:e,form:t,remove:n})=>{const r=(0,a.FR)((0,a.MS)(a.AN,{activationConstraint:{distance:1}}),(0,a.MS)(a.uN,{coordinateGetter:l.JR}));return(0,i.createElement)(s,null,(0,i.createElement)(a.Mp,{sensors:r,collisionDetection:a.fp,onDragEnd:n=>{const{active:i,over:a}=n;if(a&&i.id!==a.id){const n=e.findIndex(e=>e.key===i.id),r=e.findIndex(e=>e.key===a.id),o=t.getFieldValue("schedule_slot");if(o){const e=(0,l.be)(o,n,r);t.setFieldsValue({schedule_slot:e})}const s=(0,l.be)(e,n,r);e.splice(0,e.length,...s)}}},(0,i.createElement)(l.gB,{items:e.map(e=>e.key),strategy:l._G},e.map(e=>(0,i.createElement)(o.X,{key:e.key,id:e.key,field:e,remove:n,form:t})))))}}}]);