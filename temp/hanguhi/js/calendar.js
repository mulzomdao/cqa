<!--
var target;																	// ȣ���� Object�� ����
var stime;
document.write("<div id=minical style=\"position:absolute;margin:0; padding:0;width:180;height:196;display:none;position: absolute; z-index: 99\"><iframe name=calendar_frame width=180 height=196 frameborder=0 leftmargin=0 marginwidth=0 topmargin=0 marginheight=0 scrolling=no src='/common/blank.html'></iframe></div>");

function Calendar(obj,userX,userY) {														// jucke
	var now = obj.value.split("-");
	var x, y;

	target = obj;																// Object ����;

	if(!userX || !userY) {

		/*
			var preview_width = 330;
			var preview_height = 150;
			preview_x=event.x + document.body.scrollLeft+5;
			preview_y=event.y + document.body.scrollTop;
			if (preview_x+preview_width-document.body.scrollLeft > document.body.clientWidth) preview_x=preview_x-preview_width-10;
			if (preview_y+preview_height-document.body.scrollTop > document.body.clientHeight) preview_y=preview_y-preview_height-10;
			obj.left = preview_x;
			obj.top = preview_y;
		*/

		x = (document.layers) ? loc.pageX : event.clientX;
		y = (document.layers) ? loc.pageY : event.clientY;
		x = document.body.scrollLeft + x;											// ��ũ�� ���� ����
		y = document.body.scrollTop + y;
		minical.style.pixelTop	= y+7;
		minical.style.pixelLeft	= x-50;
	} else {
		x = userX;
		y = userY;
		x = document.body.scrollLeft + x;											// ��ũ�� ���� ����
		y = document.body.scrollTop + y;
		minical.style.pixelTop	= y+7;
		minical.style.pixelLeft	= x-50;
	}
	minical.style.display = (minical.style.display == "block") ? "none" : "block";

	if (now.length == 3) {														// ��Ȯ���� �˻�
		Show_cal(now[0],now[1],now[2]);											// �Ѿ�� ���� ����Ϸ� �и�
	} else {
		now = new Date();
		Show_cal(now.getFullYear(), now.getMonth()+1, now.getDate());			// ���� ��/��/���� �����Ͽ� �ѱ�.
	}
}

//������Ŀ��� �޷� �ҷ�����
function Doc_Calendar(obj,userX,userY) {														// jucke
	var x, y;

	target = obj.date_txt;																// Object ����;

	if(!userX || !userY) {

		/*
			var preview_width = 330;
			var preview_height = 150;
			preview_x=event.x + document.body.scrollLeft+5;
			preview_y=event.y + document.body.scrollTop;
			if (preview_x+preview_width-document.body.scrollLeft > document.body.clientWidth) preview_x=preview_x-preview_width-10;
			if (preview_y+preview_height-document.body.scrollTop > document.body.clientHeight) preview_y=preview_y-preview_height-10;
			obj.left = preview_x;
			obj.top = preview_y;
		*/

		x = (document.layers) ? loc.pageX : event.clientX;
		y = (document.layers) ? loc.pageY : event.clientY;
		x = document.body.scrollLeft + x;											// ��ũ�� ���� ����
		y = document.body.scrollTop + y;
		minical.style.pixelTop	= y+7;
		minical.style.pixelLeft	= x-50;
	} else {
		x = userX;
		y = userY;
		x = document.body.scrollLeft + x;											// ��ũ�� ���� ����
		y = document.body.scrollTop + y;
		minical.style.pixelTop	= y+7;
		minical.style.pixelLeft	= x-50;
	}
	minical.style.display = (minical.style.display == "block") ? "none" : "block";

	now = new Date();
	Doc_Show_cal(now.getFullYear(), now.getMonth()+1, now.getDate());			// ���� ��/��/���� �����Ͽ� �ѱ�.
}

function doOver() {																// ���콺�� Į�������� ������
	var el = calendar_frame.event.srcElement;
	cal_Day = el.title;
	if (cal_Day.length > 7) {													// ���� ���� ������.
		el.style.borderTopColor = el.style.borderLeftColor = "buttonhighlight";
		el.style.borderRightColor = el.style.borderBottomColor = "buttonshadow";
	}
	calendar_frame.clearTimeout(stime);													// Clear
}

function doClick() {															// ���ڸ� �����Ͽ��� ���
	cal_Day = calendar_frame.event.srcElement.title;
	calendar_frame.event.srcElement.style.borderColor = "red";							// �׵θ� ���� ����������
	if (cal_Day.length > 7) {													// ���� ����������
		target.value=cal_Day													// �� ����
	}
	minical.style.display='none';												// ȭ�鿡�� ����
//	minical.innerHTML = "";
}


function Doc_doClick() {															// ���ڸ� �����Ͽ��� ���
	cal_Day = calendar_frame.event.srcElement.title;
	calendar_frame.event.srcElement.style.borderColor = "red";							// �׵θ� ���� ����������
	if (cal_Day.length > 7) {													// ���� ����������
		var cal_Day_arr = cal_Day.split("-");
		document.form.date_txt1.value=cal_Day_arr[0];
		document.form.date_txt2.value=cal_Day_arr[1]
		document.form.date_txt3.value=cal_Day_arr[2]
	}
	minical.style.display='none';												// ȭ�鿡�� ����
//	minical.innerHTML = "";
}

function doOut() {
	var el = calendar_frame.event.fromElement;
	cal_Day = el.title;

	if (cal_Day.length > 7) {
		el.style.borderColor = "white";
	}
	//stime=window.setTimeout("minical.style.display='none';", 200);              //���̾ ����� ������� �Ѵ�.
}

function day2(d) {																// 2�ڸ� ���ڷ� ����
	var str = new String();

	if (parseInt(d) < 10) {
		str = "0" + parseInt(d);
	} else {
		str = "" + parseInt(d);
	}
	return str;
}

function Show_cal(sYear, sMonth, sDay) {
	var Months_day = new Array(0,31,28,31,30,31,30,31,31,30,31,30,31)
	var Weekday_name = new Array("��", "��", "ȭ", "��", "��", "��", "��");
	var intThisYear = new Number(), intThisMonth = new Number(), intThisDay = new Number();
//	document.all.minical.innerHTML = "<iframe name=calendar_frame width=170 height=188 frameborder=0 leftmargin=0 marginwidth=0 topmargin=0 marginheight=0 scrolling=no></iframe>";
	datToday = new Date();													// ���� ���� ����

	intThisYear = parseInt(sYear);
	intThisMonth = parseInt(sMonth);
	intThisDay = parseInt(sDay);

	if (intThisYear == 0) intThisYear = datToday.getFullYear();				// ���� ���� ���
	if (intThisMonth == 0) intThisMonth = parseInt(datToday.getMonth())+1;	// �� ���� ������ ���� -1 �� ���� �ŵ��� ����.
	if (intThisDay == 0) intThisDay = datToday.getDate();

	switch(intThisMonth) {
		case 1:
				intPrevYear = intThisYear -1;
				intPrevMonth = 12;
				intNextYear = intThisYear;
				intNextMonth = 2;
				break;
		case 12:
				intPrevYear = intThisYear;
				intPrevMonth = 11;
				intNextYear = intThisYear + 1;
				intNextMonth = 1;
				break;
		default:
				intPrevYear = intThisYear;
				intPrevMonth = parseInt(intThisMonth) - 1;
				intNextYear = intThisYear;
				intNextMonth = parseInt(intThisMonth) + 1;
				break;
	}

	NowThisYear = datToday.getFullYear();										// ���� ��
	NowThisMonth = datToday.getMonth()+1;										// ���� ��
	NowThisDay = datToday.getDate();											// ���� ��

	datFirstDay = new Date(intThisYear, intThisMonth-1, 1);						// ���� ���� 1�Ϸ� ���� ��ü ����(���� 0���� 11������ ����(1������ 12��))
	intFirstWeekday = datFirstDay.getDay();										// ���� �� 1���� ������ ���� (0:�Ͽ���, 1:������)

	intSecondWeekday = intFirstWeekday;
	intThirdWeekday = intFirstWeekday;

	datThisDay = new Date(intThisYear, intThisMonth, intThisDay);				// �Ѿ�� ���� ���� ����
	intThisWeekday = datThisDay.getDay();										// �Ѿ�� ������ �� ����

	varThisWeekday = Weekday_name[intThisWeekday];								// ���� ���� ����

	intPrintDay = 1																// ���� ���� ����
	secondPrintDay = 1
	thirdPrintDay = 1

	Stop_Flag = 0

	if ((intThisYear % 4)==0) {													// 4�⸶�� 1���̸� (��γ����� ��������)
		if ((intThisYear % 100) == 0) {
			if ((intThisYear % 400) == 0) {
				Months_day[2] = 29;
			}
		} else {
			Months_day[2] = 29;
		}
	}
	intLastDay = Months_day[intThisMonth];										// ������ ���� ����
	Stop_flag = 0

	Cal_HTML = "<html><head><link href=\"http://wikey01.cafe24.com/css/style2.css\" rel=\"stylesheet\" type=\"text/css\"></head><body>\n"
			+ "<TABLE WIDTH=100% height=100% CELLPADDING=5 CELLSPACING=5 ONMOUSEOVER=parent.doOver(); ONMOUSEOUT=parent.doOut(); bgcolor='AAAAAA'>\n"
			+ "<TR ALIGN=CENTER>\n"
            + "<TD nowrap=nowrap align=center bgcolor=FFFFFF valign=top>\n"

            + "<table width=100% border=0 cellpadding=1 cellspacing=0>\n"
            + "<TR ALIGN=CENTER>\n"
            + "<TD COLSPAN=7 nowrap=nowrap align=center>\n"
            + "<img src='/images/btn_prev.gif' title='������' style='cursor:hand;' onClick='parent.Show_cal("+intPrevYear+","+intPrevMonth+","+intThisDay+");'>\n"
			+ ""+get_Yearinfo(intThisYear,intThisMonth,intThisDay)+" "+get_Monthinfo(intThisYear,intThisMonth,intThisDay)+"\n"
            + "<img src='/images/btn_next.gif' title='������' style='cursor:hand;' onClick='parent.Show_cal("+intNextYear+","+intNextMonth+","+intThisDay+");'>\n"
			+ "</TD></TR>\n"
			+ "<TR align=center bgcolor='AAAAAA' STYLE='color:FFFFFF;padding-top:2' height=20 ><b><TD style='font-size:9pt; font-family:Verdana'>��</TD><TD style='font-size:9pt; font-family:Verdana'>��</TD><TD style='font-size:9pt; font-family:Verdana'>ȭ</TD><TD style='font-size:9pt; font-family:Verdana'>��</TD><TD style='font-size:9pt; font-family:Verdana'>��</TD><TD style='font-size:9pt; font-family:Verdana'>��</TD><TD style='font-size:9pt; font-family:Verdana'>��</TD></TR>\n";

	for (intLoopWeek=1; intLoopWeek < 7; intLoopWeek++) {						// �ִ��� ���� ����, �ִ� 6��
		Cal_HTML += "<TR align=center bgcolor=FFFFFF>\n"
		for (intLoopDay=1; intLoopDay <= 7; intLoopDay++) {						// ���ϴ��� ���� ����, �Ͽ��� ����
			if (intThirdWeekday > 0) {											// ù�� �������� 1���� ũ��
				Cal_HTML += "<TD onClick=parent.doClick(); style='font-size:9pt; font-family:Verdana'>\n";
				intThirdWeekday--;
			} else {
				if (thirdPrintDay > intLastDay) {								// �Է� ��¦ �������� ũ�ٸ�
					Cal_HTML += "<TD onClick=parent.doClick(); style='font-size:9pt; font-family:Verdana'>\n";
				} else {														// �Է³�¥�� ������� �ش� �Ǹ�
					Cal_HTML += "<TD style='font-size:9pt; font-family:Verdana' onClick=parent.doClick(); title="+intThisYear+"-"+day2(intThisMonth).toString()+"-"+day2(thirdPrintDay).toString()+" STYLE=\"cursor:Hand;border:1px solid white;";
					if (intThisYear == NowThisYear && intThisMonth==NowThisMonth && thirdPrintDay==intThisDay) {
						Cal_HTML += "background-color:BBDDFF;";
					}

					switch(intLoopDay) {
						case 1:													// �Ͽ����̸� ���� ������
							Cal_HTML += "color:red;"
							break;
						case 7:
							Cal_HTML += "color:blue;"
							break;
						default:
							Cal_HTML += "color:black;"
							break;
					}

					Cal_HTML += "\">"+thirdPrintDay;

				}
				thirdPrintDay++;

				if (thirdPrintDay > intLastDay) {								// ���� ��¥ ���� ���� ������ ũ�� ������ Ż��
					Stop_Flag = 1;
				}
			}
			Cal_HTML += "</td>\n";
		}
		Cal_HTML += "</tr>\n";
		if (Stop_Flag==1) break;
	}
	Cal_HTML += "</table>\n</td>\n</tr>\n</table>\n</body>\n</html>\n";

//	document.all.minical.innerHTML = Cal_HTML;
//	calendar_frame.document.write(Cal_HTML);
	document.frames['calendar_frame'].document.body.innerHTML = Cal_HTML;

	calendar_frame.focus();

}

function Doc_Show_cal(sYear, sMonth, sDay) {
	var Months_day = new Array(0,31,28,31,30,31,30,31,31,30,31,30,31)
	var Weekday_name = new Array("��", "��", "ȭ", "��", "��", "��", "��");
	var intThisYear = new Number(), intThisMonth = new Number(), intThisDay = new Number();
//	document.all.minical.innerHTML = "<iframe name=calendar_frame width=170 height=188 frameborder=0 leftmargin=0 marginwidth=0 topmargin=0 marginheight=0 scrolling=no></iframe>";
	datToday = new Date();													// ���� ���� ����

	intThisYear = parseInt(sYear);
	intThisMonth = parseInt(sMonth);
	intThisDay = parseInt(sDay);

	if (intThisYear == 0) intThisYear = datToday.getFullYear();				// ���� ���� ���
	if (intThisMonth == 0) intThisMonth = parseInt(datToday.getMonth())+1;	// �� ���� ������ ���� -1 �� ���� �ŵ��� ����.
	if (intThisDay == 0) intThisDay = datToday.getDate();

	switch(intThisMonth) {
		case 1:
				intPrevYear = intThisYear -1;
				intPrevMonth = 12;
				intNextYear = intThisYear;
				intNextMonth = 2;
				break;
		case 12:
				intPrevYear = intThisYear;
				intPrevMonth = 11;
				intNextYear = intThisYear + 1;
				intNextMonth = 1;
				break;
		default:
				intPrevYear = intThisYear;
				intPrevMonth = parseInt(intThisMonth) - 1;
				intNextYear = intThisYear;
				intNextMonth = parseInt(intThisMonth) + 1;
				break;
	}

	NowThisYear = datToday.getFullYear();										// ���� ��
	NowThisMonth = datToday.getMonth()+1;										// ���� ��
	NowThisDay = datToday.getDate();											// ���� ��

	datFirstDay = new Date(intThisYear, intThisMonth-1, 1);						// ���� ���� 1�Ϸ� ���� ��ü ����(���� 0���� 11������ ����(1������ 12��))
	intFirstWeekday = datFirstDay.getDay();										// ���� �� 1���� ������ ���� (0:�Ͽ���, 1:������)

	intSecondWeekday = intFirstWeekday;
	intThirdWeekday = intFirstWeekday;

	datThisDay = new Date(intThisYear, intThisMonth, intThisDay);				// �Ѿ�� ���� ���� ����
	intThisWeekday = datThisDay.getDay();										// �Ѿ�� ������ �� ����

	varThisWeekday = Weekday_name[intThisWeekday];								// ���� ���� ����

	intPrintDay = 1																// ���� ���� ����
	secondPrintDay = 1
	thirdPrintDay = 1

	Stop_Flag = 0

	if ((intThisYear % 4)==0) {													// 4�⸶�� 1���̸� (��γ����� ��������)
		if ((intThisYear % 100) == 0) {
			if ((intThisYear % 400) == 0) {
				Months_day[2] = 29;
			}
		} else {
			Months_day[2] = 29;
		}
	}
	intLastDay = Months_day[intThisMonth];										// ������ ���� ����
	Stop_flag = 0

	Cal_HTML = "<html><head><link href=\"http://wikey01.cafe24.com/css/style2.css\" rel=\"stylesheet\" type=\"text/css\"></head><body>\n"
			+ "<TABLE WIDTH=100% height=100% CELLPADDING=5 CELLSPACING=5 ONMOUSEOVER=parent.doOver(); ONMOUSEOUT=parent.doOut(); bgcolor='AAAAAA'>\n"
			+ "<TR ALIGN=CENTER>\n"
            + "<TD nowrap=nowrap align=center bgcolor=FFFFFF valign=top>\n"

            + "<table width=100% border=0 cellpadding=2 cellspacing=0>\n"
            + "<TR ALIGN=CENTER>\n"
            + "<TD COLSPAN=7 nowrap=nowrap align=center>\n"
            + "<img src='/img/btn_prev.gif' title='������' style='cursor:hand;' onClick='parent.Show_cal("+intPrevYear+","+intPrevMonth+","+intThisDay+");'>\n"
			+ ""+get_Yearinfo(intThisYear,intThisMonth,intThisDay)+" "+get_Monthinfo(intThisYear,intThisMonth,intThisDay)+"\n"
            + "<img src='/img/btn_next.gif' title='������' style='cursor:hand;' onClick='parent.Show_cal("+intNextYear+","+intNextMonth+","+intThisDay+");'>\n"
			+ "</TD></TR>\n"
			+ "<TR align=center bgcolor='AAAAAA' STYLE='color:FFFFFF;'><TD>��</TD><TD>��</TD><TD>ȭ</TD><TD>��</TD><TD>��</TD><TD>��</TD><TD>��</TD></TR>\n";

	for (intLoopWeek=1; intLoopWeek < 7; intLoopWeek++) {						// �ִ��� ���� ����, �ִ� 6��
		Cal_HTML += "<TR align=center bgcolor=FFFFFF>\n"
		for (intLoopDay=1; intLoopDay <= 7; intLoopDay++) {						// ���ϴ��� ���� ����, �Ͽ��� ����
			if (intThirdWeekday > 0) {											// ù�� �������� 1���� ũ��
				Cal_HTML += "<TD onClick=parent.Doc_doClick();>\n";
				intThirdWeekday--;
			} else {
				if (thirdPrintDay > intLastDay) {								// �Է� ��¦ �������� ũ�ٸ�
					Cal_HTML += "<TD onClick=parent.Doc_doClick();>\n";
				} else {														// �Է³�¥�� ������� �ش� �Ǹ�
					Cal_HTML += "<TD onClick=parent.Doc_doClick(); title="+intThisYear+"-"+day2(intThisMonth).toString()+"-"+day2(thirdPrintDay).toString()+" STYLE=\"cursor:Hand;border:1px solid white;";
					if (intThisYear == NowThisYear && intThisMonth==NowThisMonth && thirdPrintDay==intThisDay) {
						Cal_HTML += "background-color:BBDDFF;";
					}

					switch(intLoopDay) {
						case 1:													// �Ͽ����̸� ���� ������
							Cal_HTML += "color:red;"
							break;
						case 7:
							Cal_HTML += "color:blue;"
							break;
						default:
							Cal_HTML += "color:black;"
							break;
					}

					Cal_HTML += "\">"+thirdPrintDay;

				}
				thirdPrintDay++;

				if (thirdPrintDay > intLastDay) {								// ���� ��¥ ���� ���� ������ ũ�� ������ Ż��
					Stop_Flag = 1;
				}
			}
			Cal_HTML += "</td>\n";
		}
		Cal_HTML += "</tr>\n";
		if (Stop_Flag==1) break;
	}
	Cal_HTML += "</table>\n</td>\n</tr>\n</table>\n</body>\n</html>\n";

//	document.all.minical.innerHTML = Cal_HTML;
//	calendar_frame.document.write(Cal_HTML);
	document.frames['calendar_frame'].document.body.innerHTML = Cal_HTML;

	calendar_frame.focus();

}

function get_Yearinfo(year,month,day) {											// �� ������ �޺� �ڽ��� ǥ��
	var min = parseInt(year) - 100;
	var max = parseInt(year) + 10;
	var i = new Number();
	var str = new String();

	str = "<SELECT onChange='parent.Show_cal(this.value,"+month+","+day+");' ONMOUSEOVER=parent.doOver(); style='font-size:9pt; font-family:Verdana'>\n";
	for (i=min; i<=max; i++) {
		if (i == parseInt(year)) {
			str += "<OPTION VALUE="+i+" selected ONMOUSEOVER=parent.doOver();>"+i+"</OPTION>\n";
		} else {
			str += "<OPTION VALUE="+i+" ONMOUSEOVER=parent.doOver();>"+i+"</OPTION>\n";
		}
	}
	str += "</SELECT>";
	return str;
}


function get_Monthinfo(year,month,day) {										// �� ������ �޺� �ڽ��� ǥ��
	var i = new Number();
	var str = new String();

	str = "<SELECT onChange='parent.Show_cal("+year+",this.value,"+day+");' ONMOUSEOVER=parent.doOver(); style='font-size:9pt; font-family:Verdana'>\n";
	for (i=1; i<=12; i++) {
		if (i == parseInt(month)) {
			str += "<OPTION VALUE="+i+" selected ONMOUSEOVER=parent.doOver();>"+i+"</OPTION>\n";
		} else {
			str += "<OPTION VALUE="+i+" ONMOUSEOVER=parent.doOver();>"+i+"</OPTION>\n";
		}
	}
	str += "</SELECT>";
	return str;
}
//-->