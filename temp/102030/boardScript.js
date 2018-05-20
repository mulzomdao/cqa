function boardAddCheck(){
	if(boardAdd.name.value==""){
		alert("�̸��� �����ּ���");
		boardAdd.name.focus();
		return false;
	}
	if(boardAdd.title.value==""){
		alert("������ �����ּ���");
		boardAdd.title.focus();
		return false;
	}
	if(boardAdd.main.value==""){
		alert("������ �����ּ���");
		boardAdd.main.focus();
		return false;
	}
	if(boardAdd.passwd.value==""){
		alert("��й�ȣ�� �����ּ���");
		boardAdd.passwd.focus();
		return false;
	}
	if(boardAdd.email.value!=""){
		if(check_email(boardAdd.email.value)!=""){	
			alert(check_email(boardAdd.email.value));
			boardAdd.email.focus();
			return false;
		}
	}
	if(boardAdd.flag.value=="boardModify"){
		if(unEncrypt(boardAdd.passwd1.value)!=boardAdd.passwd.value){
			alert("��й�ȣ�� ���� �ʽ��ϴ�.");
			boardAdd.passwd.focus();
			return false;
		}
	}
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

function tailAddCheck(form){
	if(form.name.value==""){
		alert("�̸��� �����ּ���");
		form.name.focus();
		return false;
	}
	if(form.main.value==""){
		alert("������ �����ּ���");
		form.main.focus();
		return false;
	}
	if(form.passwd.value==""){
		alert("��й�ȣ�� �����ּ���");
		form.passwd.focus();
		return false;
	}
	form.submit();
}

function Encrypt(theText) {
	output = new String;
	Temp = new Array();
	Temp2 = new Array();
	TextSize = theText.length;
	for (i = 0; i < TextSize; i++) {
	rnd = Math.round(Math.random() * 122) + 68;
	Temp[i] = theText.charCodeAt(i) + rnd;
	Temp2[i] = rnd;
	}
	for (i = 0; i < TextSize; i++) {
	output += String.fromCharCode(Temp[i], Temp2[i]);
	}
	return output;
}

function unEncrypt(theText) {
	output = new String;
	Temp = new Array();
	Temp2 = new Array();
	TextSize = theText.length;
	for (i = 0; i < TextSize; i++) {
	Temp[i] = theText.charCodeAt(i);
	Temp2[i] = theText.charCodeAt(i + 1);
	}
	for (i = 0; i < TextSize; i = i+2) {
	output += String.fromCharCode(Temp[i] - Temp2[i]);
	}
	return output;
}
