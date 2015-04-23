// set edition
function IsPC() {
	var userAgentInfo = navigator.userAgent;
    var Agents = ["Android", "iPhone",
                "SymbianOS", "Windows Phone",
                "iPad", "iPod","MQQBrowser","BlackBerry"];
    var flag = true;
    for (var v = 0; v < Agents.length; v++) {
        if (userAgentInfo.indexOf(Agents[v]) > 0) {
            flag = false;
            break;
        }
    }
    return flag;
}
if (IsPC()) {
	window.location='http://lifefavorite.com/wish/wishwall_beta4';
};


//var
	var xmlhttp;
	var obj;
	var t=1;
	var searchmode=0;
	var pxset=16;
	var ienter = 1;
	var tid;
	var lasttime;
	var dateObj=new Date();
	var colornum = 0;
	var colorarr = [];
	var colorurl = [];
	var colorListurl = [];
//set color
	// colorarr[0] = "#ff00a2";
	// colorarr[1] = "#ff5bf5";
	// colorarr[2] = "#64b5f6";
	// colorarr[3] = "#18ffff";
	colorarr[0] = "#44bdc9";
	colorarr[1] = "#06dbbd";
	colorarr[2] = "#ffd633";
	colorarr[3] = "#fecdd2";
	colorurl[0] = "url('img/bg_blue.png')";
	colorurl[1] = "url('img/bg_green.png')";
	colorurl[2] = "url('img/bg_yellow.png')";
	colorurl[3] = "url('img/bg_pink.png')";
	colorListurl[0] = "url('img/bg_list_blue.png')";
	colorListurl[1] = "url('img/bg_list_green.png')";
	colorListurl[2] = "url('img/bg_list_yellow.png')";
	colorListurl[3] = "url('img/bg_list_pink.png')";
	// colorarr[4] = "#a6ffcc";
	// colorarr[5] = "#00e676";
	// colorarr[6] = "#dce775";
	// colorarr[7] = "#eeff41";
	// colorarr[8] = "#ffde80";
	// colorarr[9] = "#ffb74d";
	// colorarr[10] = "#ff6e40";
	// colorarr[11] = "#f50057";


	// for (var i = 1; i <= 34; i++) {
	// 	if (colornum==4) {colornum=0};
	// 	$('#wishbox'+i+' .avatar').css('background-color',colorarr[colornum]);
	// 	colornum++;
	// };
	// colornum = 0;

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
	var element,para,para2;
	if (searchmode==1) {
		para=document.body;
		element=document.getElementById('main');
		para.removeChild(element);
		element=document.createElement('div');
		element.id='main';
		para.appendChild(element);
		searchmode = 0;
	};
	for (i = 0; i <= obj.page.length - 1; i++) {
		//DIVDIY 俗称造物
		para=document.getElementById('main');
		element=document.createElement('div');
		element.className='wishbox';
		element.id='wishbox'+i;
		para.appendChild(element);
			
			para=element;
			element=document.createElement('div');
			element.className='avatar';
			para.appendChild(element);
			
			element=document.createElement('div');
			element.className='line';
			para.appendChild(element);
			
				para2=element;
				element=document.createElement('i');
				element.className='fa fa-circle';
				para2.appendChild(element);
				element=document.createElement('i');
				element.className='fa fa-circle';
				para2.appendChild(element);

			element=document.createElement('div');
			element.className='iwishbox';
			para.appendChild(element);

				para=element;
				element=document.createElement('div');
				element.className='wishword';
				para.appendChild(element);

					para=element;
					element=document.createElement('p');
					element.className='to';
					para.appendChild(element);

					element=document.createElement('p');
					element.className='content';
					para.appendChild(element);

					element=document.createElement('p');
					element.className='from';
					para.appendChild(element);

					element=document.createElement('p');
					element.className='time';
					para.appendChild(element);

		$('#wishbox'+i).attr('check',1);
		$('#wishbox'+i + ' .avatar').css('backgroundColor',colorarr[obj.page[i].color]);
		$('#wishbox'+i + ' .iwishbox').css('backgroundImage',colorListurl[obj.page[i].color]);
		$('#wishbox'+i + ' .to').html(obj.page[i].toWho);
		$('#wishbox'+i + ' .to').html(obj.page[i].toWho);
		$('#wishbox'+i + ' .to').html(obj.page[i].toWho);
		$('#wishbox'+i + ' .content').html(obj.page[i].content);
		$('#wishbox'+i + ' .from').html(obj.page[i].fromWho);
		$('#wishbox'+i + ' .time').html(obj.page[i].time.substring(0,10));
	}
	}
  })
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

// function onClickMyFunc(){
// 	var main = document.getElementById('main');
// 	var page = Number(this.id.substring(3,5));
// 	main.setAttribute('page',page);
// 	myFunction('load.php',page);
// }
// function onClickMyFunc2(){
// 	var main = document.getElementById('main');
// 	var page = Number(this.id.substring(3,5));
// 	name = document.getElementById('searchbox').value;
// 	main.setAttribute('page',page);
// 	myFunction('search.php',page,name);
// }
function makewish(){
			tid = document.getElementById('wish');
			tid.style.zIndex="21";
			tid.style.top="5%";
			tid.style.opacity="0.96";
			document.getElementById('wishwin').style.zIndex="20";
			document.getElementById('wishwin').style.opacity="0.3";
}

function iclose(iwishwin,iwish,ishow){
	if ( iwishwin == 1) {
		$("#wishwin").css("z-index","-2");
		$("#wishwin").css("opacity","0");
	};
	if ( iwish == 1) {
		$("#wish").css("z-index","-1");
		$("#wish").css("top","-20%");
		$("#wish").css("opacity","0");
	};
	if ( ishow == 1) {
		$("#show").css("z-index","-1");
		$("#show").css("width","5em");
		$("#show").css("height","3em");
		$("#show").css("opacity","0");
	};
}

function turncolor(){
	tid = document.getElementById('wish');
	tid.style.top="-20%";
	tid.style.opacity="0";
	colornum++;
	if (colornum==4) {colornum=0};
	setTimeout("tid.style.backgroundImage=colorurl[colornum];",250);
	setTimeout("document.getElementById('wishwin').style.zIndex='20';",500);
	setTimeout("document.getElementById('wishwin').style.opacity='0.3';",500);
	setTimeout("tid.style.zIndex='21';",500);
	setTimeout("tid.style.top='5%';",500);
	setTimeout("tid.style.opacity='0.96';",500);
	document.getElementById('color').value=colornum;
}


function dbclick(){
	lasttime = dateObj.getTime();
	dateObj=new Date();
	if (dateObj.getTime()-lasttime<2000) {
		turncolor();
	};
}

document.getElementById('makewish').addEventListener("click", makewish);
document.getElementById('wishwin').addEventListener("click", function(){iclose(1,1,1);});
document.getElementById('closewish').addEventListener("click", function(){iclose(1,1,1);});
// document.getElementById('closeshow').addEventListener("click", function(){iclose(1,1,1);});
document.getElementById('doubleClickArea1').addEventListener("click", dbclick);
document.getElementById('doubleClickArea2').addEventListener("click", dbclick);
document.getElementById('doubleClickArea3').addEventListener("click", dbclick);

//touch
document.getElementById('searchword').addEventListener('touchstart', function(event) { 
	this.style.backgroundColor='#178d98';
}, false);