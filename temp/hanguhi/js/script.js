function file_down(file_nm){
	//window.open('../common/file_down.html?file_nm='+file_nm,'_file_down','width=200,height=200,scrollbars=no, status=no, location=no');
	location.href('../common/file_down.html?file_nm='+file_nm);
}

function sabon_down(file_nm){
	//window.open('../common/file_down.html?file_nm='+file_nm,'_file_down','width=200,height=200,scrollbars=no, status=no, location=no');
	location.href('../common/sabon_down.html?file_nm='+file_nm);
}

function zipopen(form_nm, zipcode_nm, addr1_nm, addr2_nm){
	window.open('../common/search_post.html?form_nm='+form_nm+'&zipcode_nm='+zipcode_nm+'&addr1_nm='+addr1_nm+'&addr2_nm='+addr2_nm,'_zipsearch','width=660,height=350,scrollbars=no');
}

// 주민번호 체크소스
function check_ResidentNO(jumin1, jumin2) {
	var str_f_num = jumin1;
	var str_l_num = jumin2;
	var i3=0
	var i4=0

	if(str_f_num == "111111"){
		return true;
	}

  	for (var i=0;i<str_f_num.length;i++) {
		var ch1 = str_f_num.substring(i,i+1);
		if (ch1<'0' || ch1>'9') {
			i3=i3+1
		}
  	}

	if ((str_f_num == '') || ( i3 != 0 )) {
		return (false);
	}

	for (var i=0;i<str_l_num.length;i++) {
		var ch1 = str_l_num.substring(i,i+1);
		if (ch1<'0' || ch1>'9') {
			i4=i4+1
		}
	}

	if ((str_l_num == '') || ( i4 != 0 )) {
		return (false);
	}

	if(str_f_num.substring(0,1) < 4) {
		return (false);
	}

	if(str_l_num.substring(0,1) > 2) {
		return (false);
	}

	if((str_f_num.length > 7) || (str_l_num.length > 8)) {
		return (false);
	}

	if ((str_f_num == '72') || ( str_l_num == '18')) {
		return (false);
	}

	var f1=str_f_num.substring(0,1)
	var f2=str_f_num.substring(1,2)
	var f3=str_f_num.substring(2,3)
	var f4=str_f_num.substring(3,4)
	var f5=str_f_num.substring(4,5)
	var f6=str_f_num.substring(5,6)

	var hap=f1*2+f2*3+f3*4+f4*5+f5*6+f6*7

	var l1=str_l_num.substring(0,1)
	var l2=str_l_num.substring(1,2)
	var l3=str_l_num.substring(2,3)
	var l4=str_l_num.substring(3,4)
	var l5=str_l_num.substring(4,5)
	var l6=str_l_num.substring(5,6)
	var l7=str_l_num.substring(6,7)

	hap=hap+l1*8+l2*9+l3*2+l4*3+l5*4+l6*5

	hap=hap%11
	hap=11-hap
	hap=hap%10

	if (hap != l7) {
		return (false);
	}
	return true;
}



function onlyNum(){
	if(
	  (event.keyCode >= 48 && event.keyCode <=57) ||
	  (event.keyCode >= 96 && event.keyCode <=105) ||
	  (event.keyCode >= 37 && event.keyCode <=40) ||
	  event.keyCode == 9 ||
	  event.keyCode == 8 ||
	  event.keyCode == 46
	  ){
	  //48-57(0-9)
	  //96-105(키패드0-9)
	  //8 : backspace
	  //46 : delete key
	  //9 :tab
	  //37-40 : left, up, right, down
	  event.returnValue=true;
	}
	else{
	  //alert('숫자만 입력 가능합니다.');
	  event.returnValue=false;
	}
}


function is_int(obj,excep)
{
	var k = event.keyCode;
	var exception = new Array();
	exception[45] = '-';
	exception[46] = '.';
	exception[37] = '%';
	exception[58] = ':';

	if(excep){
		if(excep.toString().search("\,").toString() > -1){
			var arr_excep = excep.split(',');
			var excep_msgs = '';
			var if_k = '';
			for(var i = 0; i < arr_excep.length; i++){
				excep_msgs += '\'' + exception[arr_excep[i]] + '\'';
				if_k += 'k != ' + arr_excep[i];
				if(i < arr_excep.length - 1){
					excep_msgs += ',';
					if_k += ' && ';
				}
			}
			if(k != 13 && k != 45 && eval(if_k) && (k < 48 || k > 57)){
				alert('숫자,(' + excep_msgs + ')로만 입력하세요');
				obj.focus();
				return false;
			}
		}
		else{
			if(k != 13 && k != 45 && k != excep && (k < 48 || k > 57)){
				alert('숫자,(' + exception[excep] + ')로만 입력하세요');
				obj.focus();
				return false;
			}
		}
	}
	else{
		if(k != 13 && (k < 48 || k > 57)){
			alert('숫자로만 입력하세요');
			obj.focus();
			return false;
		}
	}
	return true;
}


function is_alphabat(obj)
{
	var k = event.keyCode;
	//alert(k);
	if((k != 13) && (k < 48 || k > 57) && (k < 59 || k > 90) && (k < 96 || k > 122)){
		alert('영문/숫자로만 입력하세요');
		obj.focus();
		return false;
	}
	return true;
}


function chkTelNumber(obj,gbn)
{
	var F = document.wForm;
	var telno = obj.value.replace(/\-/gi,'');
	var arr_tel = new Array("010","011","016","017","018","019","02","031","032","033","041","042","043","051","052","053","054","055","061","062","063","064","070");
	var tel1 = "";
	var tel2 = "";
	var tel3 = "";

	if(telno){
		if(gbn == 1){
			var total_len = telno.length;
			if(total_len < 9){
				alert('전화번호 형식이 맞지 않습니다. 국번포함 정확히 입력해주세요');
				obj.select();
				obj.focus();
				return false;
			}
			for(var i = 0; i < arr_tel.length; i++){
				if(telno.substr(0,arr_tel[i].length) == arr_tel[i]){
					tel1 = arr_tel[i];	//국번
					//국번길이
					var tel1_len = tel1.length;
					//국번을 제외한 길이
					var tel_len2 = total_len - tel1_len;

					if(tel_len2 == 7){
						tel2 = telno.substr(tel1_len,3);
						tel3 = telno.substr(parseInt(tel1_len) + 3,4);
					}
					else if(tel_len2 == 8){
						tel2 = telno.substr(tel1_len,4);
						tel3 = telno.substr(parseInt(tel1_len) + 4,4);
					}
					else{
						alert('전화번호 형식이 맞지 않습니다.');
						obj.select();
						obj.focus();
						return false;
					}
					break;
				}
			}
			if(!tel1 || !tel2 || !tel3){
				alert('전화번호 형식이 맞지 않습니다. 다시한번 확인해주세요');
				obj.select();
				obj.focus();
				return false;
			}
			obj.value = tel1 + "-" + tel2 + "-" + tel3;
		} else if(gbn == 2){
			obj.value = telno;
			obj.select();
			obj.focus();
		}
	}
}


CheckboxFlag=false;
function checkAll(ElementName){
    var EleSize=ElementName.length;
    var i=0;
    if(!CheckboxFlag){
        if(!EleSize){
            ElementName.checked=true;
        }else{
            for(i;EleSize>i;++i){
                ElementName[i].checked=true;
            }
        }
        CheckboxFlag=true;
    }else{
        if(!EleSize){
            ElementName.checked=false;
        }else{
            for(i;EleSize>i;++i){
                ElementName[i].checked=false;
            }
        }
        CheckboxFlag=false;
    }
}