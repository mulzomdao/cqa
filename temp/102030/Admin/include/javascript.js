function boardAdd(form){
	if(form.board.value==""){
		alert("게시판 Table명을 적어주세요");
		form.board.focus();
		return false;
	}
	if(form.boardName.value==""){
		alert("게시판 이름을 적어주세요");
		form.boardName.focus();
		return false;
	}
	form.action="b_edit.html";
	form.submit();
}

function categoryCheck(form){
	if(form.categoryCode.value==""){
		alert("메뉴코드를 적어주세요")
		form.categoryCode.focus();
		return false;
	}
	if(form.categoryName.value==""){
		alert("메뉴명를 적어주세요")
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
		alert("검색어를 입력해주세요");
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
			alert("대분류를 선택해주세요")
			form.category1.focus();
			return false;
		}
		if(form.category2.value==""){
			alert("중분류를 선택해주세요")
			form.category2.focus();
			return false;
		}
	}
	
	if(form.flag.value=="modify"){
		if(form.category1.value!=""){
			if(form.category2.value==""){
				alert("중분류를 선택해주세요")
				form.category2.focus();
				return false;
			}
		}
	}

	if(form.prodName.value==""){
		alert("제품명을 적어주세요")
		form.prodName.focus();
		return false;
	}
	if(form.salePrice.value==""){
		alert("할인가격를 적어주세요")
		form.salePrice.focus();
		return false;
	}
	
	if(form.flag.value=="add"){
		if(form.prodImg.value==""){
			alert("이미지를 선택해 주세요")
			form.prodImg.focus();
			return false;
		}
	}
	
	form.action="p_edit.html";
	form.submit();
}


function my_round(num, round_num){
// 반올림할 위치와 소숫점을 맞추기 위해 숫자를 알맞게 가공
tmp_num1=num*Math.pow(10, round_num);

// 가공된 숫자를 반올림
tmp_num2=Math.round(tmp_num1);

// 역순으로 다시 가공
result=tmp_num2/Math.pow(10, round_num); 

return result;
}

function sale(form){
	/*
	if(form.price.value==""){
		alert("소비자가격을 입력해주세요");
		form.price.focus();
		return false;
	}
	*/
	
	//my_round(123.456, 2); -> 123.46 이 나오겠죠?
	//my_round(6980, -2); -> 7000 이 나오겠죠?

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
		alert("대분류를 선택해주세요")
		form.category1.focus();
		return false;
	}
	form.submit();
}

function categoryAdd(form){
	if(form.category1.value==""){
		alert("대분류를 선택해주세요")
		form.category1.focus();
		return false;
	}
	if(form.category2.value==""){
		alert("중분류를 선택해주세요")
		form.category2.focus();
		return false;
	}

	form.flag.value="categoryAdd";
	form.submit();
}

function categoryMove(form){
	if(form.category1.value==""){
		alert("대분류를 선택해주세요")
		form.category1.focus();
		return false;
	}
	if(form.category2.value==""){
		alert("중분류를 선택해주세요")
		form.category2.focus();
		return false;
	}

	form.flag.value="categoryMove";
	form.submit();
}

function saeunCheck(form){
	if(form.saeunName.value==""){
		alert("사은품이름을 입력해주세요")
		form.saeunName.focus();
		return false;
	}
	if(form.saeunImg.value==""){
		alert("이미지를 입력해주세요")
		form.saeunImg.focus();
		return false;
	}
	if(form.orderPrice.value==""){
		alert("가격을 입력해주세요")
		form.orderPrice.focus();
		return false;
	}
	if(form.saeunInfo.value==""){
		alert("제품설명을 입력해주세요")
		form.saeunInfo.focus();
		return false;
	}

	form.submit();
}

function bannerAdd(form){
	if(form.bannerCategory.value==""){
		alert("카테고리를 입력해주세요");
		form.bannerCategory.focus();
		return false;
	}
	/*
	if(form.flag.value=="bannerAdd"){
		if(form.bannerImg1.value==""){
			alert("배너이미지를 입력하셔야 합니다.");
			form.bannerImg1.focus();
			return false;
		}
	}
	*/

	form.submit();
}

function besongAdd(form){
	if(form.company.value==""){
		alert("배송업체를 입력해주세요");
		form.company.focus();
		return false;
	}
	if(form.besongbi.value==""){
		alert("배송비를 입력해주세요");
		form.besongbi.focus();
		return false;
	}
	if(form.free.value==""){
		alert("무료배송비를 입력해주세요");
		form.free.focus();
		return false;
	}

	form.submit();
}

function memberCheck() {
	var a = document.memberAdd;
	if(a.id.value=="") {
		alert('아이디는 필수사항 입니다.');
		a.id.focus();
		return false;
	}
	if(a.name.value=="") {
		alert('이름은 필수사항 입니다.');
		a.name.focus();
		return false;
	}
	if(a.addr2.value=="") {
		alert('상세주소를 입력하셔야 합니다.');
		a.addr2.focus();
		return false;
	}
	if(a.email.value=="") {
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

function pointAdd(form){
	if(form.id.value==""){
		alert("아이디를 입력해주세요");
		form.id.focus();
		return false;
	}
	if(form.pointInfo.value==""){
		alert("포인트내역을 입력해주세요");
		form.pointInfo.focus();
		return false;
	}
	if(form.point.value==""){
		alert("포인트점수를 입력해주세요");
		form.point.focus();
		return false;
	}
	form.submit();
}

function prodUseAdd(form){
	if(form.name.value==""){
		alert("이름을 입력해주세요");
		form.name.focus();
		return false;
	}
	if(form.prodCode.value==""){
		alert("제품번호를 입력해주세요");
		form.prodCode.focus();
		return false;
	}
	if(form.main.value==""){
		alert("내용을 입력해주세요");
		form.main.focus();
		return false;
	}
	if(form.passwd.value==""){
		alert("비밀번호를 입력해주세요");
		form.passwd.focus();
		return false;
	}

	form.submit();
}

function todayCheck(form){
	if(form.prodCode.value==""){
		alert("제품코드를 입력해주세요");
		form.prodCode.focus();
		return false;
	}
	if(form.chancePrice.value==""){
		alert("찬스가격을 입력해주세요");
		form.chancePrice.focus();
		return false;
	}
	if(form.salePrice.value==""){
		alert("할인가격을 입력해주세요");
		form.salePrice.focus();
		return false;
	}
	if(form.startTime.value==""){
		alert("시작일을 입력해주세요");
		form.startTime.focus();
		return false;
	}
	if(form.endTime.value==""){
		alert("마감일을 입력해주세요");
		form.endTime.focus();
		return false;
	}

	form.submit();
}