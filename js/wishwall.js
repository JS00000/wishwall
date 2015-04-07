//set edition
// function IsPC() {
//     var userAgentInfo = navigator.userAgent;
//     var Agents = ["Android", "iPhone",
//                 "SymbianOS", "Windows Phone",
//                 "iPad", "iPod","MQQBrowser","BlackBerry"];
//     var flag = true;
//     for (var v = 0; v < Agents.length; v++) {
//         if (userAgentInfo.indexOf(Agents[v]) > 0) {
//             flag = false;
//             break;
//         }
//     }
//     return flag;
// }
// alert(IsPC());


//var
	var xmlhttp;
	var obj;
	var t=1;
	var searchmode=0;
	var pxset=15;
	var ienter = 1;
	var tid;

//set color
	var colorarr = [];
	colorarr[0] = "#ff00a2";
	colorarr[1] = "#ff5bf5";
	colorarr[2] = "#64b5f6";
	colorarr[3] = "#18ffff";
	colorarr[4] = "#a6ffcc";
	colorarr[5] = "#00e676";
	colorarr[6] = "#dce775";
	colorarr[7] = "#eeff41";
	colorarr[8] = "#ffde80";
	colorarr[9] = "#ffb74d";
	colorarr[10] = "#ff6e40";
	colorarr[11] = "#f50057";

	// for (var i = 1; i <=colorarr.length; i++) {
		// document.getElementById('exambox'+i).style.backgroundColor=colorarr[i-1];
	// };
	var colornum;
	for (var i = 1; i <= 34; i++) {
		colornum = Math.floor(Math.random()*12);
		document.getElementById('wishbox'+i).style.backgroundColor=colorarr[colornum];
	};
	
//width adjustment
	// alert(screen.width);
	if (document.body.clientWidth >799) {
		pxset = Math.floor(document.body.clientWidth/100)+2;
		// document.getElementById('nav').style.fontSize=pxset;
		document.getElementById('main').style.fontSize=pxset;
		document.getElementById('wish').style.fontSize=pxset;
		document.getElementById('show').style.fontSize=pxset;
		// $('body').css("font-size",Math.floor(pxset));
		document.getElementById('backwords').style.fontSize=Math.floor(document.body.clientWidth/50);
	}
// alert(document.body.clientWidth);        //网页可见区域宽(body)

//Ajax
function loadXMLDoc(url,cfunc)
{
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=cfunc;
xmlhttp.open("GET",url,true);
xmlhttp.send();
}

function myFunction(url,page,searchbox)
{
loadXMLDoc(url+"?pageN="+page+"&searchbox="+searchbox,function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    var text = xmlhttp.responseText.replace(/\r\n/ig,"</br>");
    // document.getElementById("myDiv").innerHTML=text; 
    obj = eval("(" + text + ")");
    $('.content').html('');
	$('.name').html('');
	$('.time').html('');
    for (var i = 34; i >= 1; i--) {
    	$('#wishbox'+i).attr('check',0);
    	// $('#wishbox'+i).css("background-color","#fff");
    	$('#wishbox'+i).css("opacity",0.5);
    };
    for (var i = 0; i <= obj.maxpage+1; i++) {
		$('#nav'+i).css("opacity",0.07);
    };
    for (var i = 1; i <= 34; i++) {
		colornum = Math.floor(Math.random()*12);
		document.getElementById('wishbox'+i).style.backgroundColor=colorarr[colornum];
	};
    for (i = obj.page.length - 1; i >= 0; i--) {
    	$('#wishbox'+obj.page[i].choose).attr('check',1);
    	// $('#wishbox'+obj.page[i].choose).css("backgroundColor",colorarr[obj.page[i].color]);
    	$('#wishbox'+obj.page[i].choose).css("opacity",1);
    	$('#wishbox'+obj.page[i].choose + ' .content').html(obj.page[i].content);
    	$('#wishbox'+obj.page[i].choose + ' .name').html(obj.page[i].name);
    	$('#wishbox'+obj.page[i].choose + ' .time').html(obj.page[i].time.substring(0,10));
    };
    if (t==1) {
    	t=0;
		for (i = 0; i <= obj.maxpage+1; i++) {
			var para=document.createElement("i");
			para.className='fa fa-circle';
			para.id="nav"+i;
			para.addEventListener("click", onClickMyFunc);
			var element=document.getElementById("nav");
			element.appendChild(para);
		};
	}
	else{
		if (searchmode==1) {
			document.getElementById('makewish').style.display='none';
			para=document.body;
			element=document.getElementById('nav');
			para.removeChild(element);
			element=document.createElement("div");
			element.id="nav";
			element.style.fontSize=pxset;
			para.appendChild(element);
			for (i = 0; i <= obj.maxpage; i++) {
				var para=document.createElement("i");
				para.className='fa fa-circle';
				para.id="nav"+i;
				para.addEventListener("click", onClickMyFunc2);
				var element=document.getElementById("nav");
				element.appendChild(para);
			};
		};
	}
	$('#nav'+page).css("opacity",0.5);
    }
  });
}

//search mode
function myFunction2(){
	var name = document.getElementById('searchbox').value;
	if (name!='') {
		searchmode = 1;
		myFunction('search.php',0,name);
		ienter = 0;
	}
	else{
		location='index.php';
	}
}


//dynamic action
function onClickMyFunc(){
	var main = document.getElementById('main');
	var page = Number(this.id.substring(3,5));
	main.setAttribute('page',page);
	myFunction('load.php',page);
}
function onClickMyFunc2(){
	var main = document.getElementById('main');
	var page = Number(this.id.substring(3,5));
	name = document.getElementById('searchbox').value;
	main.setAttribute('page',page);
	myFunction('search.php',page,name);
}
function makewish(){
		var boo=0;
		for (var i = 34; i >=1; i--) {
			if ($("#wishbox"+i).attr("check")==0) {
				boo=i;
				break;
			}
		};
		if (boo==0) {
			alert("这颗心已经满满的都是祝福啦，换一颗吧～");
		}else{
			// $("#wishwin").css("z-index","20");
			// $("#wish").css("z-index","21");
			// $("#wish").css("top","7em");
			// $("#wish").css("opacity","0.96");
			tid = document.getElementById('wish');
			tid.style.zIndex="21";
			tid.style.top="7em";
			tid.style.opacity="0.96";
			document.getElementById('wishwin').style.zIndex="20";
			document.getElementById("choose").value = boo;
			document.getElementById("page").value = document.getElementById('main').getAttribute('page');
			document.getElementById("content").focus();
		};
}

function iclose(iwishwin,iwish,ishow){
	if ( iwishwin == 1) {
		$("#wishwin").css("z-index","");
	};
	if ( iwish == 1) {
		$("#wish").css("z-index","-1");
		$("#wish").css("top","0em");
		$("#wish").css("opacity","0");
	};
	if ( ishow == 1) {
		$("#show").css("z-index","-1");
		$("#show").css("width","5em");
		$("#show").css("height","3em");
		$("#show").css("opacity","0");
	};
}

	$('.wishbox').click(function(event){
		if (this.getAttribute('check')!=1 && searchmode!=1) {
			$("#wish").css("z-index","21");
			$("#wish").css("top","7em");
			$("#wish").css("opacity","0.96");
			document.getElementById("choose").value = this.id.substring(7,9);
			document.getElementById("page").value = this.parentNode.getAttribute('page');
			document.getElementById("content").focus();
			
			setTimeout("document.getElementById('wishwin').style.zIndex=20;",500);
		}});
	$('.wishbox').mouseover(function(event){
		if (this.getAttribute('check')==1) {
			$("#fcont").html($(this).children('.content').html());
			$("#fname").html($(this).children('.name').html());
			$("#ftime").html($(this).children('.time').html());
			$("#wishwin").css("z-index","4");
			$("#show").css("z-index","21");
			$("#show").css("width","20em");
			$("#show").css("height","12em");
			$("#show").css("opacity","0.96");
			var zy = event.pageY+10;
			var zx = event.pageX+10;
			var maxy = document.body.clientHeight;
			var maxx = document.body.clientWidth;
			if (zy+pxset*12+10 > maxy) zy = maxy-pxset*12;
			if (zx+pxset*20+10 > maxx) zx = maxx-pxset*20;
			$("#show").css("top",zy+'px');
			$("#show").css("left",zx+'px');
		} else {
			iclose(1,1,1);
		}
	});
	$('#wishwin').mouseover(function(event){
			iclose(0,0,1);
	});


function pageleft(){
		main = document.getElementById('main');
		page = Number(main.getAttribute('page'));
		if (searchmode == 0) {
			if (page>0) {
				page -= 1;
				main.setAttribute('page',page);
				myFunction('load.php',page);
			}else {
				page = obj.maxpage+1;
				main.setAttribute('page',page);
				myFunction('load.php',page);
			}
		}
		else{
			name = document.getElementById('searchbox').value;
			if (page>0) {
				page -= 1;
				main.setAttribute('page',page);
				myFunction('search.php',page,name);
			}else {
				page = obj.maxpage;
				main.setAttribute('page',page);
				myFunction('search.php',page,name);
			}			
		}
}
function pageright(){
		main = document.getElementById('main');
		page = Number(main.getAttribute('page'));
		if (searchmode == 0) {
			if (page<obj.maxpage+1) {
				page += 1;
				main.setAttribute('page',page);
				myFunction('load.php',page);
			}else {
				page = 0;
				main.setAttribute('page',page);
				myFunction('load.php',page);
			}
		}
		else{
			name = document.getElementById('searchbox').value;
			if (page<obj.maxpage) {
				page += 1;
				main.setAttribute('page',page);
				myFunction('search.php',page,name);
			}else {
				page = 0;
				main.setAttribute('page',page);
				myFunction('search.php',page,name);
			}			
		}	
}


// document.getElementById('makewish').addEventListener("click", makewish);
document.getElementById('wishwin').addEventListener("click", function(){iclose(1,1,1);});
document.getElementById('closewish').addEventListener("click", function(){iclose(1,1,1);});
document.getElementById('closeshow').addEventListener("click", function(){iclose(1,1,1);});
document.getElementById('pageleft').addEventListener("click", pageleft);
document.getElementById('pageright').addEventListener("click", pageright);


//set keyboard
function ifEnter(e){
	var e = e || window.event; 
	if (e.keyCode == 13) myFunction2();
}
function ifName(e){
	var e = e || window.event; 
	if (e.keyCode == 13){
		document.getElementById('form1').submit();
	}
}
function key(e){
	var e = e || window.event;
	if (ienter==1) {
		if (e.keyCode==13) {
			makewish();
			document.getElementById("content").innerHTML='';
		};
		if (e.keyCode==27) iclose(1,1,1);
		if (e.keyCode==37) pageleft();
		if (e.keyCode==39) pageright();
	};
	// if (ienter==1) alert(e.keyCode);
}
// document.onkeypress = key(event);
document.onkeydown = key;