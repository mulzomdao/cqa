function prodUseCheck(form){
	if(form.name.value==""){
		alert("이름을 입력해주세요");
		form.name.focus();
		return false;
	}
	if(form.passwd.value==""){
		alert("비밀번호를 입력해주세요");
		form.passwd.focus();
		return false;
	}
	if(form.main.value==""){
		alert("내용을 입력해주세요");
		form.main.focus();
		return false;
	}

	form.submit();
}

function joongbok2() {
	var a = document.memberAdd;
	
	if(!a.id.value) {
		alert('아이디는 필수사항 입니다.');
		a.id.focus();
		return false;
	}
	else {
		window.open("id_search.html?id="+a.id.value,"agag","width=300, height=165, scrollbars=no");
		return true;
	}
}

function memberCheck() {
	var a = document.memberAdd;

	if(!a.id.value) {
		alert('아이디는 필수사항 입니다.');
		a.id.focus();
		return false;
	}

	if(!a.name.value) {
		alert('이름은 필수사항 입니다.');
		a.name.focus();
		return false;
	}
	if(a.passwd.value.length < 4 || a.passwd.value.length > 10) {
		alert('암호입력은 4~10 자 입니다.');
		a.passwd.focus();
		a.passwd.select();
		return false;
	}
	if(a.passwd2.value.length < 4 || a.passwd2.value.length > 10) {
		alert('암호확인은 4~10 자 입니다.');
		a.passwd2.focus();
		a.passwd2.select();
		return false;
		}
	if(a.passwd.value !== a.passwd2.value) {
		alert('두 패스워드가 서로 일치하지 않습니다.');
		a.passwd.value ='';
		a.passwd2.value ='';
		a.passwd.focus();
		return false;
	}	
	if (a.jumin1.value == "") {
		alert("주민등록번호 앞자리를 입력하세요.");
		a.jumin1.focus();
		return false;
	}
	else {
		if (a.jumin1.value.length != 6 ) {
			alert("주민등록번호를 확인해주세요.\n 6자리입니다.");
			a.jumin1.focus();
			a.jumin1.select();
			return false;
		}
		else {
			thisfilednum = Check_Num(a.jumin1.value);
			if (!thisfilednum) {
				alert("주민등록번호는 숫자만 가능합니다.");
				a.jumin1.focus();
				a.jumin1.select();
				return false;
			}
		}
	}

	if (a.jumin2.value == "") {
		alert("주민등록번호 7자리를 입력하십시오.");
		a.jumin2.focus();
		return false;  		   		   
	} else {
		if ( a.jumin2.value.length != 7 ) {
			alert("주민등록번호 를 입력하십시오.\n 7자리의 숫자입니다.");
			a.jumin2.focus();
			a.jumin2.select();
			return false;
		}
		else {
			thisfilednum = Check_Num(a.jumin2.value);
			if (!thisfilednum) {
				alert("주민등록번호는 숫자만 가능합니다.");
				a.jumin2.focus();
				a.jumin2.select();
				return false;
			}
		}
	}

	if( a.jumin1.value != "999999" && a.jumin2.value != "9999999" && a.jumin1.value != "888888" && a.jumin2.value != "8888888" && a.jumin1.value != "777777" && a.jumin2.value != "7777777" ) {
		if ( !check_ResidentNO() ) {
			alert("올바른 주민등록번호가 아닙니다. 다시 한번 확인해 주시기 바랍니다.");
			a.jumin1.focus();
			a.jumin1.select();
			return false;
		}
	}

	
	if(!a.zipcode.value) {
		alert('우편번호를 입력하셔야 합니다.');
		a.zipcode.focus();
		return false;
	}
	if(!a.addr2.value) {
		alert('상세주소를 입력하셔야 합니다.');
		a.addr2.focus();
		return false;
	}

	
	if(!a.email.value) {
		alert('이메일을 입력하셔야 합니다.');
		a.email.focus();
		return false;
	}
	
	if(check_email(a.email.value)!=""){	
		alert(check_email(a.email.value));
		a.email.focus();
		return false;
	}

	memberAdd.submit();
}

function check_email(email) {
	var pattern = /^(.+)@(.+)$/;
	var atom = "\[^\\s\\(\\)<>#@,;:!\\\\\\\"\\.\\[\\]\]+";
	var word="(" + atom + "|(\"[^\"]*\"))";
	var user_pattern = new RegExp("^" + word + "(\\." + word + ")*$");
	var ip_pattern = /^\[(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,3})\]$/;
	var domain_pattern = new RegExp("^" + atom + "(\\." + atom +")*$");

	var arr = email.match(pattern);
	if (!arr) return "올바르지 않은 이메일 주소입니다.";
	if (!arr[1].match(user_pattern)) return "올바르지 않은 이메일 주소입니다.";

	var ip = arr[2].match(ip_pattern);
	if (ip) {
		  for (var i=1; i<5; i++) if (ip[i] > 255) return "올바르지 않은 이메일 주소입니다.";
	}
	else {
		  if (!arr[2].match(domain_pattern)) return "올바르지 않은 이메일 주소입니다.";
		  var domain = arr[2].match(new RegExp(atom,"g"));
		  if (domain.length<2) return "올바르지 않은 이메일 주소입니다.";
		  if (domain[domain.length-1].length<2 || domain[domain.length-1].length>3)
				 return "올바르지 않은 이메일 주소입니다.";
	}
	return false; 
} 

// 주민번호 체크소스
function check_ResidentNO() {  
	var str_f_num = document.memberAdd.jumin1.value;
	var str_l_num = document.memberAdd.jumin2.value;
	var i3=0
	var i4=0
  	
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

function real(){
	resi = document.memberAdd.jumin1.value;
	resi1 = resi.substring(0,2);
	resi2 = resi.substring(2,4);
	resi3 = resi.substring(4,6);
	document.frm_entry.E_birth1.value = "19"+resi1;
	document.frm_entry.E_birth2.value = resi2;
	document.frm_entry.E_birth3.value = resi3;
}

// 숫자인가를 체크함
function Check_Num(tocheck) {
	var isnum = true;

	if (tocheck == null || tocheck == "") {
	isnum = false;
	return isnum;
	}

	for (var j = 0 ; j < tocheck.length; j++) {
		if (tocheck.substring(j, j + 1) != "0" &&
			tocheck.substring(j, j + 1) != "1" &&
			tocheck.substring(j, j + 1) != "2" &&
			tocheck.substring(j, j + 1) != "3" &&
			tocheck.substring(j, j + 1) != "4" &&
			tocheck.substring(j, j + 1) != "5" &&
			tocheck.substring(j, j + 1) != "6" &&
			tocheck.substring(j, j + 1) != "7" &&
			tocheck.substring(j, j + 1) != "8" &&
			tocheck.substring(j, j + 1) != "9" &&
			tocheck.substring(j, j + 1) != " " &&
			tocheck.substring(j, j + 1) != "-") {
			isnum = false;
		}
	}
	return isnum;
}

function logInCheck(form){
	if(form.id.value==""){
		alert("아이디를 입력해주세요");
		form.id.focus();
		return false;
	}
	if(form.passwd.value==""){
		alert("비밀번호를 입력해주세요");
		form.passwd.focus();
		return false;
	}
	form.submit();
}

function logInCheck2(form){
	if(form.id.value==""){
		alert("아이디를 입력해주세요");
		form.id.focus();
		//return false;
	}else if(form.passwd.value==""){
		alert("비밀번호를 입력해주세요");
		form.passwd.focus();
		//return false;
	}else{
		form.submit();
	}
}

function orderLogInCheck(form){
	if(form.oTel1.value==""){
		alert("주문자 전화번호를 입력해주세요");
		form.oTel1.focus();
		return false;
	}
	if(form.oTel2.value==""){
		alert("주문자 전화번호를 입력해주세요");
		form.oTel2.focus();
		return false;
	}
	if(form.oTel3.value==""){
		alert("주문자 전화번호를 입력해주세요");
		form.oTel3.focus();
		return false;
	}
	if(form.oName.value==""){
		alert("주문자명을 입력해주세요");
		form.oName.focus();
		return false;
	}
	form.submit();
}

function prodUseCheck1(form){
	if(form.prodPasswd.value==""){
		alert("비밀번호를 입력해주세요");
		form.prodPasswd.focus();
		return false;
	}
		if(form.prodPasswd.value!=form.passwd1.value){
		alert("비밀번호가 맞지 않습니다.");
		form.prodPasswd.value="";
		form.prodPasswd.focus();
		return false;
	}
	form.submit();
}

function sameCheck(){
	order.dName.value=order.oName.value;
	order.dTel1.value=order.oTel1.value;
	order.dTel2.value=order.oTel2.value;
	order.dTel3.value=order.oTel3.value;
	order.dHp1.value=order.oHp1.value;
	order.dHp2.value=order.oHp2.value;
	order.dHp3.value=order.oHp3.value;
	order.dZipcode.value=order.oZipcode.value;
	order.dAddr1.value=order.oAddr1.value;
	order.dAddr2.value=order.oAddr2.value;
	order.memo.focus();
}

function orderCheck(form){
	if(form.oName.value==""){
		alert("주문고객성명을 입력해주세요");
		form.oName.focus();
		return false;
	}
	if(form.oTel1.value==""){
		alert("전화번호를 입력해주세요");
		form.oTel1.focus();
		return false;
	}
	if(form.oTel2.value==""){
		alert("전화번호를 입력해주세요");
		form.oTel2.focus();
		return false;
	}
	if(form.oTel3.value==""){
		alert("전화번호를 입력해주세요");
		form.oTel.focus();
		return false;
	}
	if(form.oZipcode.value==""){
		alert("우편번호를 입력해주세요");
		form.oZipcode.focus();
		return false;
	}
	if(form.oAddr1.value==""){
		alert("우편번호를 입력해주세요");
		form.oZipcode.focus();
		return false;
	}
	if(form.oAddr2.value==""){
		alert("상세주소를 입력해주세요");
		form.oAddr2.focus();
		return false;
	}

	if(form.dName.value==""){
		alert("배송지 고객성명을 입력해주세요");
		form.dName.focus();
		return false;
	}
	if(form.dTel1.value==""){
		alert("전화번호를 입력해주세요");
		form.dTel1.focus();
		return false;
	}
	if(form.dTel2.value==""){
		alert("전화번호를 입력해주세요");
		form.dTel2.focus();
		return false;
	}
	if(form.dTel3.value==""){
		alert("전화번호를 입력해주세요");
		form.dTel.focus();
		return false;
	}
	if(form.dZipcode.value==""){
		alert("우편번호를 입력해주세요");
		form.dZipcode.focus();
		return false;
	}
	if(form.dAddr1.value==""){
		alert("우편번호를 입력해주세요");
		form.dZipcode.focus();
		return false;
	}
	if(form.dAddr2.value==""){
		alert("상세주소를 입력해주세요");
		form.dAddr2.focus();
		return false;
	}
	
	if(form.flag.value=="order" || form.flag.value=="b2bOrder"){
		form.action="shopEdit.html";
	}else if(form.flag.value=="creditOrder"){
		form.action="index.html?main=orderCredit.html";
	}else if(form.flag.value=="account"){
		form.action="index.html?main=orderAcount.html";
	}
	//alert(form.flag.value);

	form.submit();
}

function checkStr(){
	if(searchItem.searchStr.value==""){
		alert("검색어를 입력해주세요");
		searchItem.searchStr.focus();
	}else{
		searchItem.submit();
	}
}

function checkStr2(){
	if(searchForm.searchStr2.value==""){
		alert("검색어를 입력해주세요");
		searchForm.searchStr2.focus();
	}else{
		searchForm.submit();
	}
}

function idSearch(){
	var a = document.memberAdd;

	if(a.name.value==""){
		alert("이름을 입력해주세요");
		a.name.focus();
	}else if(a.jumin1.value == "") {
		alert("주민등록번호 앞자리를 입력하세요.");
		a.jumin1.focus();
	}else if(a.jumin1.value.length != 6 ) {
		alert("주민등록번호를 확인해주세요.\n 6자리입니다.");
		a.jumin1.focus();
		a.jumin1.select();
	}else if(a.jumin2.value == ""){
		alert("주민등록번호 7자리를 입력하십시오.");
		a.jumin2.focus();
	}else if(a.jumin2.value.length != 7){
		alert("주민등록번호 를 입력하십시오.\n 7자리의 숫자입니다.");
		a.jumin2.focus();
		a.jumin2.select();
	}else if(a.jumin1.value != "999999" && a.jumin2.value != "9999999" && a.jumin1.value != "888888" && a.jumin2.value != "8888888" && a.jumin1.value != "777777" && a.jumin2.value != "7777777" ) {
		if ( !check_ResidentNO() ) {
			alert("올바른 주민등록번호가 아닙니다. 다시 한번 확인해 주시기 바랍니다.");
			a.jumin1.focus();
			a.jumin1.select();
		}else{
			a.submit();
		}
	}
}

function passSearch(){
	var a = document.memberAdd2;

	if(a.name.value==""){
		alert("이름을 입력해주세요");
		a.name.focus();
	}else if(a.jumin1.value == "") {
		alert("주민등록번호 앞자리를 입력하세요.");
		a.jumin1.focus();
	}else if(a.jumin1.value.length != 6 ) {
		alert("주민등록번호를 확인해주세요.\n 6자리입니다.");
		a.jumin1.focus();
		a.jumin1.select();
	}else if(a.jumin2.value == ""){
		alert("주민등록번호 7자리를 입력하십시오.");
		a.jumin2.focus();
	}else if(a.jumin2.value.length != 7){
		alert("주민등록번호 를 입력하십시오.\n 7자리의 숫자입니다.");
		a.jumin2.focus();
		a.jumin2.select();
	}else if(a.id.value==""){
		alert("아이디를 입력해주세요");
		a.id.focus();
	}else if(a.email.value==""){
		alert("이메일을 입력해주세요");
		a.email.focus();
	}else{
		a.submit();
	}
}

function bottom_privercy() {
   window.open("html/privercy.html","privercy","height=570,width=590,scrollbars=yes");
}
function agree(){
	logwin = open("html/agree.htm", "Popup", "scrollbars=yes, location=no, directories=no, resizeable=no, width=640, height=500, left=10, top=10, status=no, toolbar=no, menubar=no");
}

function couponCheck1(){
	if(coupon9011.loginCheck.value==""){
		alert("로그인 해주세요.");
		return false;
	}else if(coupon9011.couponNo.value==""){
		alert("쿠폰번호를 입력해주세요.");
		coupon9011.couponNo.focus();
		return false;
	}else if(coupon9011.couponNo.value!="90142238"){
		alert("쿠폰번호가 맞지 않습니다.");
		coupon9011.couponNo.value="";
		coupon9011.couponNo.focus();
		return false;
	}else{
		coupon9011.submit();
	}
}

function couponCheck2(){
	if(coupon9012.loginCheck.value==""){
		alert("로그인 해주세요.");
		return false;
	}else if(coupon9012.couponNo.value==""){
		alert("쿠폰번호를 입력해주세요.");
		coupon9012.couponNo.focus();
		return false;
	}else if(coupon9012.couponNo.value!="90142233"){
		alert("쿠폰번호가 맞지 않습니다.");
		coupon9012.couponNo.value="";
		coupon9012.couponNo.focus();
		return false;
	}else{
		coupon9012.submit();
	}
}

function status(str){
	window.status='공지사항조회';
	//return true;
	//alert(str);
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

function ShowSubMenu(tmp){
	for ( var i = 1; i < 9; i++ )	{
		document.all ['SubMenu' + i].style.display = "none";
		if ( i == tmp)	{
			document.all ['SubMenu' + tmp].style.display = "";
		}	
	}
	selectedMenu = tmp;
}

function postOpen(){
	window.open('search_post.html','_box','width=400,height=250,scrollbars=yes');
}