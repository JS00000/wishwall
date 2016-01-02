//////////////////////////////
// set edition
!function(){  
	var ua = navigator.userAgent.toLowerCase();  
	if(ua.indexOf('micromessenger') == -1 ){
		// window.location='errorEdition.html';
	}  
}.apply(this);


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
			
				para2=element;
				element=document.createElement('a');
				element.href='delete.php?key='+ key + '&id=' + obj.page[j].ID;
				para2.appendChild(element);

					para3=element;
					element=document.createElement('i');
					element.className='fa fa-close';
					para3.appendChild(element);


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

