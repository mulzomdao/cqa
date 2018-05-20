function boardAdd(form){
	if(form.board.value==""){
		alert("�Խ��� Table���� �����ּ���");
		form.board.focus();
		return false;
	}
	if(form.boardName.value==""){
		alert("�Խ��� �̸��� �����ּ���");
		form.boardName.focus();
		return false;
	}
	form.action="b_edit.html";
	form.submit();
}

function categoryCheck(form){
	if(form.categoryCode.value==""){
		alert("�޴��ڵ带 �����ּ���")
		form.categoryCode.focus();
		return false;
	}
	if(form.categoryName.value==""){
		alert("�޴��� �����ּ���")
		form.categoryName.focus();
		return false;
	}
	form.action="index.html";
	form.submit();
}

function categoryDel(form){
	form.action="index.html";
	form.submit();
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

function searchString(form){
	if(form.searchStr.value==""){
		alert("�˻�� �Է����ּ���");
		form.searchStr.focus();
		return false;
	}
	form.action="index.html";
	form.submit();
}

function removeStr(){
	searchForm.searchStr.value="";
}

function prodCheck(form){
	if(form.flag.value=="add"){
		if(form.category1.value==""){
			alert("��з��� �������ּ���")
			form.category1.focus();
			return false;
		}
		if(form.category2.value==""){
			alert("�ߺз��� �������ּ���")
			form.category2.focus();
			return false;
		}
	}
	
	if(form.flag.value=="modify"){
		if(form.category1.value!=""){
			if(form.category2.value==""){
				alert("�ߺз��� �������ּ���")
				form.category2.focus();
				return false;
			}
		}
	}

	if(form.prodName.value==""){
		alert("��ǰ���� �����ּ���")
		form.prodName.focus();
		return false;
	}
	if(form.salePrice.value==""){
		alert("���ΰ��ݸ� �����ּ���")
		form.salePrice.focus();
		return false;
	}
	
	if(form.flag.value=="add"){
		if(form.prodImg.value==""){
			alert("�̹����� ������ �ּ���")
			form.prodImg.focus();
			return false;
		}
	}
	
	form.action="p_edit.html";
	form.submit();
}


function my_round(num, round_num){
// �ݿø��� ��ġ�� �Ҽ����� ���߱� ���� ���ڸ� �˸°� ����
tmp_num1=num*Math.pow(10, round_num);

// ������ ���ڸ� �ݿø�
tmp_num2=Math.round(tmp_num1);

// �������� �ٽ� ����
result=tmp_num2/Math.pow(10, round_num); 

return result;
}

function sale(form){
	/*
	if(form.price.value==""){
		alert("�Һ��ڰ����� �Է����ּ���");
		form.price.focus();
		return false;
	}
	*/
	
	//my_round(123.456, 2); -> 123.46 �� ��������?
	//my_round(6980, -2); -> 7000 �� ��������?

	var salePrice1=form.price.value-(form.price.value*(form.salePro.value/100));
	//form.salePrice.value=Math.round(salePrice1/100)*100;
	form.salePrice.value=my_round(salePrice1, -1);
}

function b2b(form){
	var b2b1=form.price.value-(form.price.value*(form.b2bPro.value/100));
	form.b2bPrice.value=my_round(b2b1, 0);
}

function vip(form){
	var b2b1=form.price.value-(form.price.value*(form.vipPro.value/100));
	form.vipPrice.value=my_round(b2b1, -1);
}

function point1(form){
	if(form.salePrice.value!="" || form.salePrice.value!="0"){
		var pointPrice=form.salePrice.value;
	}else{
		var pointPrice=form.price.value;
	}

	var pointPrice1=pointPrice*(form.pointPro.value/100);
	form.point.value=my_round(pointPrice1, -1);
}



function categorySearch1(form){
	if(form.category1.value==""){
		alert("��з��� �������ּ���")
		form.category1.focus();
		return false;
	}
	form.submit();
}

function categoryAdd(form){
	if(form.category1.value==""){
		alert("��з��� �������ּ���")
		form.category1.focus();
		return false;
	}
	if(form.category2.value==""){
		alert("�ߺз��� �������ּ���")
		form.category2.focus();
		return false;
	}

	form.flag.value="categoryAdd";
	form.submit();
}

function categoryMove(form){
	if(form.category1.value==""){
		alert("��з��� �������ּ���")
		form.category1.focus();
		return false;
	}
	if(form.category2.value==""){
		alert("�ߺз��� �������ּ���")
		form.category2.focus();
		return false;
	}

	form.flag.value="categoryMove";
	form.submit();
}

function saeunCheck(form){
	if(form.saeunName.value==""){
		alert("����ǰ�̸��� �Է����ּ���")
		form.saeunName.focus();
		return false;
	}
	if(form.saeunImg.value==""){
		alert("�̹����� �Է����ּ���")
		form.saeunImg.focus();
		return false;
	}
	if(form.orderPrice.value==""){
		alert("������ �Է����ּ���")
		form.orderPrice.focus();
		return false;
	}
	if(form.saeunInfo.value==""){
		alert("��ǰ������ �Է����ּ���")
		form.saeunInfo.focus();
		return false;
	}

	form.submit();
}

function bannerAdd(form){
	if(form.bannerCategory.value==""){
		alert("ī�װ��� �Է����ּ���");
		form.bannerCategory.focus();
		return false;
	}
	/*
	if(form.flag.value=="bannerAdd"){
		if(form.bannerImg1.value==""){
			alert("����̹����� �Է��ϼž� �մϴ�.");
			form.bannerImg1.focus();
			return false;
		}
	}
	*/

	form.submit();
}

function besongAdd(form){
	if(form.company.value==""){
		alert("��۾�ü�� �Է����ּ���");
		form.company.focus();
		return false;
	}
	if(form.besongbi.value==""){
		alert("��ۺ� �Է����ּ���");
		form.besongbi.focus();
		return false;
	}
	if(form.free.value==""){
		alert("�����ۺ� �Է����ּ���");
		form.free.focus();
		return false;
	}

	form.submit();
}

function memberCheck() {
	var a = document.memberAdd;
	if(a.id.value=="") {
		alert('���̵�� �ʼ����� �Դϴ�.');
		a.id.focus();
		return false;
	}
	if(a.name.value=="") {
		alert('�̸��� �ʼ����� �Դϴ�.');
		a.name.focus();
		return false;
	}
	if(a.addr2.value=="") {
		alert('���ּҸ� �Է��ϼž� �մϴ�.');
		a.addr2.focus();
		return false;
	}
	if(a.email.value=="") {
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

function pointAdd(form){
	if(form.id.value==""){
		alert("���̵� �Է����ּ���");
		form.id.focus();
		return false;
	}
	if(form.pointInfo.value==""){
		alert("����Ʈ������ �Է����ּ���");
		form.pointInfo.focus();
		return false;
	}
	if(form.point.value==""){
		alert("����Ʈ������ �Է����ּ���");
		form.point.focus();
		return false;
	}
	form.submit();
}

function prodUseAdd(form){
	if(form.name.value==""){
		alert("�̸��� �Է����ּ���");
		form.name.focus();
		return false;
	}
	if(form.prodCode.value==""){
		alert("��ǰ��ȣ�� �Է����ּ���");
		form.prodCode.focus();
		return false;
	}
	if(form.main.value==""){
		alert("������ �Է����ּ���");
		form.main.focus();
		return false;
	}
	if(form.passwd.value==""){
		alert("��й�ȣ�� �Է����ּ���");
		form.passwd.focus();
		return false;
	}

	form.submit();
}

function todayCheck(form){
	if(form.prodCode.value==""){
		alert("��ǰ�ڵ带 �Է����ּ���");
		form.prodCode.focus();
		return false;
	}
	if(form.chancePrice.value==""){
		alert("���������� �Է����ּ���");
		form.chancePrice.focus();
		return false;
	}
	if(form.salePrice.value==""){
		alert("���ΰ����� �Է����ּ���");
		form.salePrice.focus();
		return false;
	}
	if(form.startTime.value==""){
		alert("�������� �Է����ּ���");
		form.startTime.focus();
		return false;
	}
	if(form.endTime.value==""){
		alert("�������� �Է����ּ���");
		form.endTime.focus();
		return false;
	}

	form.submit();
}