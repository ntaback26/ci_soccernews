
/*** ESSENTIAL STYLES ***/
.sf-menu, .sf-menu * {
	margin:			0;
	padding:		0;
	list-style:		none;
}
.sf-menu {
	line-height:	1.0;
}
.sf-menu ul {
	position:		absolute;
	top:			-999em;
	width:			13em; /* left offset of submenus need to match (see below) */
}
.sf-menu ul li {
	width:			100%;
}
.sf-menu li:hover {
	visibility:		inherit; /* fixes IE7 'sticky bug' */
}
.sf-menu li {
	float:			left;
	position:		relative;
}
.sf-menu li li {
	margin:3px 0 10px 0;
}
.sf-menu li:hover ul,
.sf-menu li.sfHover ul {
	left:			0;
	top:			1.7em; /* match top ul list item height */
	z-index:		99;
	border-top:		4px solid #ea4748;
}
ul.sf-menu li:hover li ul,
ul.sf-menu li.sfHover li ul {
	top:			-999em;
}
ul.sf-menu li li:hover ul,
ul.sf-menu li li.sfHover ul {
	left:			10em; /* match ul width */
	top:			0;
}
ul.sf-menu li li:hover li ul,
ul.sf-menu li li.sfHover li ul {
	top:			-999em;
}
ul.sf-menu li li li:hover ul,
ul.sf-menu li li li.sfHover ul {
	left:			10em; /* match ul width */
	top:			0;
}

/*** DEMO SKIN ***/
.sf-menu {
	float:			left;
	margin-bottom:	1em;
}
.sf-menu a {
	text-decoration:none;
}
.sf-menu li {
	background:		none;
}
.sf-menu li ul{
	background:#fafafa;	
	padding:15px 10px 5px 10px;
}
.sf-menu li:hover,
.sf-menu a:focus, .sf-menu a:hover, .sf-menu a:active {
	background:		none;
	outline:		0;
	color: 			#ea4748;
	
}
ul.sf-menu li.sfHover ul li a{
	color:			#696969;
}
ul.sf-menu li.sfHover ul li a:hover{
	color: 			#ea4748;
}
ul.sf-menu li.sfHover ul li i{
	color:			#696969;
}
ul.sf-menu li.sfHover ul li:hover i{
	color: 			#ea4748;
}
/*** arrows **/
.sf-menu a.sf-with-ul {
	min-width:		1px; /* trigger IE7 hasLayout so spans position accurately */
}
.sf-sub-indicator {
	position:		absolute;
	display:		none;
	right:			.75em;
	top:			1.05em; /* IE6 only */
	width:			10px;
	height:			10px;
	text-indent: 	-999em;
	overflow:		hidden;
	background:		url('../images/arrows-ffffff.png') no-repeat -10px -100px; /* 8-bit indexed alpha png. IE6 gets solid image only */
}
a > .sf-sub-indicator {  /* give all except IE6 the correct values */
	top:			.8em;
	background-position: 0 -100px; /* use translucent arrow for modern browsers*/
}
/* apply hovers to modern browsers */
a:focus > .sf-sub-indicator,
a:hover > .sf-sub-indicator,
a:active > .sf-sub-indicator,
li:hover > a > .sf-sub-indicator,
li.sfHover > a > .sf-sub-indicator {
	background-position: -10px -100px; /* arrow hovers for modern browsers*/
}

/* point right for anchors in subs */
.sf-menu ul .sf-sub-indicator { background-position:  -10px 0; }
.sf-menu ul a > .sf-sub-indicator { background-position:  0 0; }
/* apply hovers to modern browsers */
.sf-menu ul a:focus > .sf-sub-indicator,
.sf-menu ul a:hover > .sf-sub-indicator,
.sf-menu ul a:active > .sf-sub-indicator,
.sf-menu ul li:hover > a > .sf-sub-indicator,
.sf-menu ul li.sfHover > a > .sf-sub-indicator {
	background-position: -10px 0; /* arrow hovers for modern browsers*/
}

/*** shadows for all but IE6 ***/
.sf-shadow ul {
	background:	url('../images/shadow.png') no-repeat bottom right;
	padding: 0 8px 9px 0;
	-moz-border-radius-bottomleft: 17px;
	-moz-border-radius-topright: 17px;
	-webkit-border-top-right-radius: 17px;
	-webkit-border-bottom-left-radius: 17px;
}
.sf-shadow ul.sf-shadow-off {
	background: transparent;
}
