function prodUseCheck(form){
	if(form.name.value==""){
		alert("�̸��� �Է����ּ���");
		form.name.focus();
		return false;
	}
	if(form.passwd.value==""){
		alert("��й�ȣ�� �Է����ּ���");
		form.passwd.focus();
		return false;
	}
	if(form.main.value==""){
		alert("������ �Է����ּ���");
		form.main.focus();
		return false;
	}

	form.submit();
}

function joongbok2() {
	var a = document.memberAdd;
	
	if(!a.id.value) {
		alert('���̵�� �ʼ����� �Դϴ�.');
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
		alert('���̵�� �ʼ����� �Դϴ�.');
		a.id.focus();
		return false;
	}

	if(!a.name.value) {
		alert('�̸��� �ʼ����� �Դϴ�.');
		a.name.focus();
		return false;
	}
	if(a.passwd.value.length < 4 || a.passwd.value.length > 10) {
		alert('��ȣ�Է��� 4~10 �� �Դϴ�.');
		a.passwd.focus();
		a.passwd.select();
		return false;
	}
	if(a.passwd2.value.length < 4 || a.passwd2.value.length > 10) {
		alert('��ȣȮ���� 4~10 �� �Դϴ�.');
		a.passwd2.focus();
		a.passwd2.select();
		return false;
		}
	if(a.passwd.value !== a.passwd2.value) {
		alert('�� �н����尡 ���� ��ġ���� �ʽ��ϴ�.');
		a.passwd.value ='';
		a.passwd2.value ='';
		a.passwd.focus();
		return false;
	}	
	if (a.jumin1.value == "") {
		alert("�ֹε�Ϲ�ȣ ���ڸ��� �Է��ϼ���.");
		a.jumin1.focus();
		return false;
	}
	else {
		if (a.jumin1.value.length != 6 ) {
			alert("�ֹε�Ϲ�ȣ�� Ȯ�����ּ���.\n 6�ڸ��Դϴ�.");
			a.jumin1.focus();
			a.jumin1.select();
			return false;
		}
		else {
			thisfilednum = Check_Num(a.jumin1.value);
			if (!thisfilednum) {
				alert("�ֹε�Ϲ�ȣ�� ���ڸ� �����մϴ�.");
				a.jumin1.focus();
				a.jumin1.select();
				return false;
			}
		}
	}

	if (a.jumin2.value == "") {
		alert("�ֹε�Ϲ�ȣ 7�ڸ��� �Է��Ͻʽÿ�.");
		a.jumin2.focus();
		return false;  		   		   
	} else {
		if ( a.jumin2.value.length != 7 ) {
			alert("�ֹε�Ϲ�ȣ �� �Է��Ͻʽÿ�.\n 7�ڸ��� �����Դϴ�.");
			a.jumin2.focus();
			a.jumin2.select();
			return false;
		}
		else {
			thisfilednum = Check_Num(a.jumin2.value);
			if (!thisfilednum) {
				alert("�ֹε�Ϲ�ȣ�� ���ڸ� �����մϴ�.");
				a.jumin2.focus();
				a.jumin2.select();
				return false;
			}
		}
	}

	if( a.jumin1.value != "999999" && a.jumin2.value != "9999999" && a.jumin1.value != "888888" && a.jumin2.value != "8888888" && a.jumin1.value != "777777" && a.jumin2.value != "7777777" ) {
		if ( !check_ResidentNO() ) {
			alert("�ùٸ� �ֹε�Ϲ�ȣ�� �ƴմϴ�. �ٽ� �ѹ� Ȯ���� �ֽñ� �ٶ��ϴ�.");
			a.jumin1.focus();
			a.jumin1.select();
			return false;
		}
	}

	
	if(!a.zipcode.value) {
		alert('�����ȣ�� �Է��ϼž� �մϴ�.');
		a.zipcode.focus();
		return false;
	}
	if(!a.addr2.value) {
		alert('���ּҸ� �Է��ϼž� �մϴ�.');
		a.addr2.focus();
		return false;
	}

	
	if(!a.email.value) {
		alert('�̸����� �Է��ϼž� �մϴ�.');
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
	if (!arr) return "�ùٸ��� ���� �̸��� �ּ��Դϴ�.";
	if (!arr[1].match(user_pattern)) return "�ùٸ��� ���� �̸��� �ּ��Դϴ�.";

	var ip = arr[2].match(ip_pattern);
	if (ip) {
		  for (var i=1; i<5; i++) if (ip[i] > 255) return "�ùٸ��� ���� �̸��� �ּ��Դϴ�.";
	}
	else {
		  if (!arr[2].match(domain_pattern)) return "�ùٸ��� ���� �̸��� �ּ��Դϴ�.";
		  var domain = arr[2].match(new RegExp(atom,"g"));
		  if (domain.length<2) return "�ùٸ��� ���� �̸��� �ּ��Դϴ�.";
		  if (domain[domain.length-1].length<2 || domain[domain.length-1].length>3)
				 return "�ùٸ��� ���� �̸��� �ּ��Դϴ�.";
	}
	return false; 
} 

// �ֹι�ȣ üũ�ҽ�
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

// �����ΰ��� üũ��
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
		alert("���̵� �Է����ּ���");
		form.id.focus();
		return false;
	}
	if(form.passwd.value==""){
		alert("��й�ȣ�� �Է����ּ���");
		form.passwd.focus();
		return false;
	}
	form.submit();
}

function logInCheck2(form){
	if(form.id.value==""){
		alert("���̵� �Է����ּ���");
		form.id.focus();
		//return false;
	}else if(form.passwd.value==""){
		alert("��й�ȣ�� �Է����ּ���");
		form.passwd.focus();
		//return false;
	}else{
		form.submit();
	}
}

function orderLogInCheck(form){
	if(form.oTel1.value==""){
		alert("�ֹ��� ��ȭ��ȣ�� �Է����ּ���");
		form.oTel1.focus();
		return false;
	}
	if(form.oTel2.value==""){
		alert("�ֹ��� ��ȭ��ȣ�� �Է����ּ���");
		form.oTel2.focus();
		return false;
	}
	if(form.oTel3.value==""){
		alert("�ֹ��� ��ȭ��ȣ�� �Է����ּ���");
		form.oTel3.focus();
		return false;
	}
	if(form.oName.value==""){
		alert("�ֹ��ڸ��� �Է����ּ���");
		form.oName.focus();
		return false;
	}
	form.submit();
}

function prodUseCheck1(form){
	if(form.prodPasswd.value==""){
		alert("��й�ȣ�� �Է����ּ���");
		form.prodPasswd.focus();
		return false;
	}
		if(form.prodPasswd.value!=form.passwd1.value){
		alert("��й�ȣ�� ���� �ʽ��ϴ�.");
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
		alert("�ֹ��������� �Է����ּ���");
		form.oName.focus();
		return false;
	}
	if(form.oTel1.value==""){
		alert("��ȭ��ȣ�� �Է����ּ���");
		form.oTel1.focus();
		return false;
	}
	if(form.oTel2.value==""){
		alert("��ȭ��ȣ�� �Է����ּ���");
		form.oTel2.focus();
		return false;
	}
	if(form.oTel3.value==""){
		alert("��ȭ��ȣ�� �Է����ּ���");
		form.oTel.focus();
		return false;
	}
	if(form.oZipcode.value==""){
		alert("�����ȣ�� �Է����ּ���");
		form.oZipcode.focus();
		return false;
	}
	if(form.oAddr1.value==""){
		alert("�����ȣ�� �Է����ּ���");
		form.oZipcode.focus();
		return false;
	}
	if(form.oAddr2.value==""){
		alert("���ּҸ� �Է����ּ���");
		form.oAddr2.focus();
		return false;
	}

	if(form.dName.value==""){
		alert("����� �������� �Է����ּ���");
		form.dName.focus();
		return false;
	}
	if(form.dTel1.value==""){
		alert("��ȭ��ȣ�� �Է����ּ���");
		form.dTel1.focus();
		return false;
	}
	if(form.dTel2.value==""){
		alert("��ȭ��ȣ�� �Է����ּ���");
		form.dTel2.focus();
		return false;
	}
	if(form.dTel3.value==""){
		alert("��ȭ��ȣ�� �Է����ּ���");
		form.dTel.focus();
		return false;
	}
	if(form.dZipcode.value==""){
		alert("�����ȣ�� �Է����ּ���");
		form.dZipcode.focus();
		return false;
	}
	if(form.dAddr1.value==""){
		alert("�����ȣ�� �Է����ּ���");
		form.dZipcode.focus();
		return false;
	}
	if(form.dAddr2.value==""){
		alert("���ּҸ� �Է����ּ���");
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
		alert("�˻�� �Է����ּ���");
		searchItem.searchStr.focus();
	}else{
		searchItem.submit();
	}
}

function checkStr2(){
	if(searchForm.searchStr2.value==""){
		alert("�˻�� �Է����ּ���");
		searchForm.searchStr2.focus();
	}else{
		searchForm.submit();
	}
}

function idSearch(){
	var a = document.memberAdd;

	if(a.name.value==""){
		alert("�̸��� �Է����ּ���");
		a.name.focus();
	}else if(a.jumin1.value == "") {
		alert("�ֹε�Ϲ�ȣ ���ڸ��� �Է��ϼ���.");
		a.jumin1.focus();
	}else if(a.jumin1.value.length != 6 ) {
		alert("�ֹε�Ϲ�ȣ�� Ȯ�����ּ���.\n 6�ڸ��Դϴ�.");
		a.jumin1.focus();
		a.jumin1.select();
	}else if(a.jumin2.value == ""){
		alert("�ֹε�Ϲ�ȣ 7�ڸ��� �Է��Ͻʽÿ�.");
		a.jumin2.focus();
	}else if(a.jumin2.value.length != 7){
		alert("�ֹε�Ϲ�ȣ �� �Է��Ͻʽÿ�.\n 7�ڸ��� �����Դϴ�.");
		a.jumin2.focus();
		a.jumin2.select();
	}else if(a.jumin1.value != "999999" && a.jumin2.value != "9999999" && a.jumin1.value != "888888" && a.jumin2.value != "8888888" && a.jumin1.value != "777777" && a.jumin2.value != "7777777" ) {
		if ( !check_ResidentNO() ) {
			alert("�ùٸ� �ֹε�Ϲ�ȣ�� �ƴմϴ�. �ٽ� �ѹ� Ȯ���� �ֽñ� �ٶ��ϴ�.");
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
		alert("�̸��� �Է����ּ���");
		a.name.focus();
	}else if(a.jumin1.value == "") {
		alert("�ֹε�Ϲ�ȣ ���ڸ��� �Է��ϼ���.");
		a.jumin1.focus();
	}else if(a.jumin1.value.length != 6 ) {
		alert("�ֹε�Ϲ�ȣ�� Ȯ�����ּ���.\n 6�ڸ��Դϴ�.");
		a.jumin1.focus();
		a.jumin1.select();
	}else if(a.jumin2.value == ""){
		alert("�ֹε�Ϲ�ȣ 7�ڸ��� �Է��Ͻʽÿ�.");
		a.jumin2.focus();
	}else if(a.jumin2.value.length != 7){
		alert("�ֹε�Ϲ�ȣ �� �Է��Ͻʽÿ�.\n 7�ڸ��� �����Դϴ�.");
		a.jumin2.focus();
		a.jumin2.select();
	}else if(a.id.value==""){
		alert("���̵� �Է����ּ���");
		a.id.focus();
	}else if(a.email.value==""){
		alert("�̸����� �Է����ּ���");
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
		alert("�α��� ���ּ���.");
		return false;
	}else if(coupon9011.couponNo.value==""){
		alert("������ȣ�� �Է����ּ���.");
		coupon9011.couponNo.focus();
		return false;
	}else if(coupon9011.couponNo.value!="90142238"){
		alert("������ȣ�� ���� �ʽ��ϴ�.");
		coupon9011.couponNo.value="";
		coupon9011.couponNo.focus();
		return false;
	}else{
		coupon9011.submit();
	}
}

function couponCheck2(){
	if(coupon9012.loginCheck.value==""){
		alert("�α��� ���ּ���.");
		return false;
	}else if(coupon9012.couponNo.value==""){
		alert("������ȣ�� �Է����ּ���.");
		coupon9012.couponNo.focus();
		return false;
	}else if(coupon9012.couponNo.value!="90142233"){
		alert("������ȣ�� ���� �ʽ��ϴ�.");
		coupon9012.couponNo.value="";
		coupon9012.couponNo.focus();
		return false;
	}else{
		coupon9012.submit();
	}
}

function status(str){
	window.status='����������ȸ';
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