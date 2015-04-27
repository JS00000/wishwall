//////////////////////////////
// jQuery
(function($){
var hasTouch = /android|iphone|ipad/i.test(navigator.userAgent.toLowerCase()),
    eventName = hasTouch ? 'touchend' : 'click';
/**
 * Bind an event handler to the "double tap" JavaScript event.
 * @param {function} doubleTapHandler
 * @param {number} [delay=300]
 */
$.fn.doubletap = function(doubleTapHandler, delay){
    delay = (delay == null) ? 300 : delay;
    this.bind(eventName, function(event){
        var now = new Date().getTime();
        // the first time this will make delta a negative number
        var lastTouch = $(this).data('lastTouch') || now + 1;
        var delta = now - lastTouch;
        if(delta < delay && 0 < delta){
            // After we detct a doubletap, start over
            $(this).data('lastTouch', null);
            if(doubleTapHandler !== null && typeof doubleTapHandler === 'function'){
                doubleTapHandler(event);
            }
        }else{
            $(this).data('lastTouch', now);
        }
    });
};
})(jQuery);


//////////////////////////////
// set edition
function is_weixin(){  
	var ua = navigator.userAgent.toLowerCase();  
	if(ua.match(/MicroMessenger/i) == "micromessenger"){  
		return true;
	}
	return false;  
}
if (!is_weixin()) {
	window.location='errorEdition.html';
};


//////////////////////////////
//var
	var xmlhttp;
	var obj;
	var t=1;
	var searchmode=0;
	var tid;
	var colornum = 0;
	var colorarr = [];
	var colorurl = [];
	var colorListurl = [];
//set color
	colorarr[0] = "#49bec9";
	colorarr[1] = "#00bfa5";
	colorarr[2] = "#f9ce1d";
	colorarr[3] = "#ef9a9a";
	colorurl[0] = "url('img/bg_blue.png')";
	colorurl[1] = "url('img/bg_green.png')";
	colorurl[2] = "url('img/bg_yellow.png')";
	colorurl[3] = "url('img/bg_pink.png')";
	colorListurl[0] = "url('img/bg_list_blue.png')";
	colorListurl[1] = "url('img/bg_list_green.png')";
	colorListurl[2] = "url('img/bg_list_yellow.png')";
	colorListurl[3] = "url('img/bg_list_pink.png')";


//////////////////////////////
//Ajax
function loadXMLDoc(url,cfunc){
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=cfunc;
	xmlhttp.open("GET",url,true);
	xmlhttp.send();
}

function makeDiv(i,j){
	var element,para,para2;
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
				element=document.createElement('img');
				element.src='img/dot.png'
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

		$('#wishbox'+i + ' .avatar').css('backgroundColor',colorarr[obj.page[j].color]);
		$('#wishbox'+i + ' .iwishbox').css('backgroundImage',colorListurl[obj.page[j].color]);
		$('#wishbox'+i + ' .to').html(obj.page[j].toWho);
		$('#wishbox'+i + ' .to').html(obj.page[j].toWho);
		$('#wishbox'+i + ' .to').html(obj.page[j].toWho);
		$('#wishbox'+i + ' .content').html(obj.page[j].content);
		$('#wishbox'+i + ' .from').html(obj.page[j].fromWho);
		$('#wishbox'+i + ' .time').html(obj.page[j].time.substring(0,10));
}



function makePage(){
	var i,j,element,para;
	for (i = pageN*34; i < pageN*34 + obj.page.length ; i++) {
		j = i - pageN*34;
		makeDiv(i,j);
	}
}

function makeSearch(){
	var j,element,para;
		para=document.body;
		element=document.getElementById('main');
		para.removeChild(element);
		element=document.createElement('div');
		element.id='main';
		para.appendChild(element);
	for (var i = 0; i < obj.page.length; i++) {
		makeDiv(i,i);
	};
}


function loadPage(pageN){
	loadXMLDoc("load.php?pageN="+pageN,function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			var text = xmlhttp.responseText.replace(/\r\n/ig,"</br>");
			// document.getElementById("myDiv").innerHTML=text; 
			obj = eval("(" + text + ")");
			if (obj.page.length>0) {
				document.getElementById('main').setAttribute('page',pageN);
				makePage();
			};
		}
	})
}

window.onscroll = function(){
	var a = document.documentElement.scrollTop == 0 ? document.body.clientHeight : document.documentElement.clientHeight;
	var b = document.documentElement.scrollTop == 0 ? document.body.scrollTop : document.documentElement.scrollTop;
	var c = document.documentElement.scrollTop == 0 ? document.body.scrollHeight : document.documentElement.scrollHeight;
	if (b != 0){
		if (a + b == c){
			pageN+=1;
			loadPage(pageN);
		}
	}
}

//search mode
function loadSearch(searchbox){
	loadXMLDoc("search.php?pageN=0&searchbox="+searchbox,function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			var text = xmlhttp.responseText.replace(/\r\n/ig,"</br>");
			// document.getElementById("myDiv").innerHTML=text; 
			obj = eval("(" + text + ")");
			searchmode = 1;
			makeSearch();
		}
	})
}

function getSearchBox(){
	searchbox=document.getElementById('searchbox').value;
	loadSearch(searchbox);
}


//////////////////////////////
//dynamic action

function makewish(){
			tid = document.getElementById('wish');
			tid.style.zIndex="21";
			tid.style.top="2em";
			tid.style.opacity="0.96";
			document.getElementById('wishwin').style.zIndex="20";
			document.getElementById('wishwin').style.opacity="0.3";
			setTimeout("document.getElementById('to').focus();",500);
}

function iclose(){
	$("#wishwin").css("z-index","-2");
	$("#wishwin").css("opacity","0");
	$("#wish").css("z-index","-1");
	$("#wish").css("top","-20%");
	$("#wish").css("opacity","0");
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
	setTimeout("tid.style.top='2em';",500);
	setTimeout("tid.style.opacity='0.96';",500);
	document.getElementById('color').value=colornum;
}

document.getElementById('makewish').addEventListener("click", makewish);
document.getElementById('wishwin').addEventListener("click", iclose);
$('#doubleClickArea1,#doubleClickArea2,#doubleClickArea3').doubletap(function(){
	turncolor();
});
