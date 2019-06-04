<style type="text/css">
	#collapscat-3{
		display:none !important;
	}
</style>	
<script type="text/javascript">
$ = window.jQuery;	
var help= new Array();
	help[0] = new Array();
	help[0][0] ='Тип';help[0][1] = 'Обобщенная характеристика, определяющая назначение (трансформатор тока, напряжения, комбинированный, силовой, нулевой последовательности) и конструктивные особенности трансформатора';help[0][2]=3;
	help[1] = new Array();
	help[1][0] ='Класс напряжения, кВ';help[1][1] = 'Номинальное междуфазное напряжение электроустановки, для работы в которой предназначен трансформатор. Класс напряжения определяет уровень изоляции оборудования';help[1][2]=3;
	help[2] = new Array();
	help[2][0] ='Климатическое исполнение';help[2][1] = 'Условия окружающей среды, для работы в которой предназначен трансформатор. Буквенная часть обозначает климатическую зону, цифровая часть означает категорию размещения по ГОСТ 15150-69';help[2][2]=3;
	help[3] = new Array();
	help[3][0] ='Вариант выполнения выводов';help[3][1] = 'Конструктивный вариант вида и расположения выводов вторичных обмоток. В зависимости от типа и конструктивного исполнения трансформатора могут быть доступны не все варианты';help[3][2]=3;
	help[4] = new Array();
	help[4][0] ='Исполнение';help[4][1] = 'Определяет форму корпуса, габаритные, установочные и присоединительные размеры, массу, вид и расположение контактных выводов первичной обмотки. Первая цифра обозначает конструктивные особенности, вторая – вариант по длине корпуса';help[4][2]=1;
	help[5] = new Array();
	help[5][0] ='Длина гибких выводов, м';help[5][1] = 'Для варианта выполнения вторичных выводов из гибкого провода длина вывода выбирается из диапазона 0,1 – 10 м';help[5][2]=1;
	help[6] = new Array();
	help[6][0] ='Наличие барьеров';help[6][1] = 'Изолирующие барьеры, расположенные в верхней части трансформатора, увеличивают изоляционное расстояние между рядом расположенными токоведущими частями разных фаз. Конструктивно барьеры могут быть выполнены только на некоторых типоисполнениях';help[6][2]=1;
	help[7] = new Array();
	help[7][0] ='Номинальный первичный ток, А';help[7][1] = 'Номинальное значение тока, протекающего по первичной обмотке, при котором предусмотрена длительная и надежная работа трансформатора тока и вторичных цепей';help[7][2]=1;
	help[8] = new Array();
	help[8][0] ='Ток терм.стойкости, кА';help[8][1] = 'Максимальное значение тока, протекающего по первичной обмотке в момент короткого замыкания, которое может выдержать трансформатор в течении нормированного промежутка времени без повреждений, нарушающих его работоспособность';help[8][2]=1;
	help[9] = new Array();
	help[9][0] ='Время протекания, с';help[9][1] = 'Максимально допустимое время, в течении которого трансформатор может выдержать воздействие тока термической стойкости';help[9][2]=1;
	help[10] = new Array();
	help[10][0] ='Расширенный диапазон первичного тока, %';help[10][1] = 'Максимальное значение тока в процентах от номинального первичного тока, при котором трансформатор работает длительное время и при этом обеспечивается заявленный класс точности вторичных обмоток для измерения. По умолчанию трансформаторы изготавливаются с диапазоном до 120%';help[10][2]=1;
	help[11] = new Array();
	help[11][0] ='Переключение по первичному току';help[11][1] = 'Возможность изменять коэффициент трансформации вдвое на всех вторичных обмотках одновременно путем параллельного или последовательного соединения секций первичной обмотки. Доступно только для некоторых типоисполнений и значений номинального первичного тока';help[11][2]=1;
	help[12] = new Array();
	help[12][0] ='№ обмотки';help[12][1] = 'Порядковый номер обмотки в трансформаторе. Максимально возможное количество обмоток зависит от типоисполнения трансформатора, исполнения вторичных выводов и количества отпаек';help[12][2]=1;
	help[13] = new Array();
	help[13][0] ='Выводы';help[13][1] = 'Обозначение выводов вторичной обмотки. Первая цифра обозначает порядковый номер вторичной обмотки, вторая – порядковый номер вывода вторичной обмотки';help[13][2]=1;
	help[14] = new Array();
	help[14][0] ='Первичный ток, А';help[14][1] = 'Условное значение тока, по которому определяется коэффициент трансформации вторичной обмотки. По умолчанию коэффициент трансформации равен отношению номинального первичного тока трансформатора к номинальному вторичному току обмотки';help[14][2]=1;
	help[15] = new Array();
	help[15][0] ='Вторичный ток, А';help[15][1] = 'Номинальное значение тока во вторичной обмотке. Стандартизованные значения – 1 или 5 А';help[15][2]=1;

var sesid = '';
var number = '';
var inn = '';

var manager = '';
var objectt = '';
var count = '';
var adednew = false;

var tdbuttongn = 'tdbuttongn';
var aded = 'Добавлено';
var address = '';
var mail = '';
var phone = '';
var prim = '';
var delrow = '';

function addzakaz(proba) {
	org = document.getElementById('org').value;
	//manager = document.getElementById('manager').value;
	objectt = document.getElementById('objectt').value;
	count = document.getElementById('count').value;
	srt = document.getElementById('srt'+proba);
	nomen_id = document.getElementById('id'+proba);
	nomenid = nomen_id.value;
	inn = document.getElementById('inn').value;
	prim = '';
	number = $('#nomzakaz').attr('value');
	
    $.ajax({
      type: "POST",
      url: "/wp-content/themes/semicolon/addzakaz.php",
      //data: "table="+ encodeURIComponent("analogs") + '&column0='+ encodeURIComponent("*") + '&case='+ encodeURIComponent("zavodeq'СЭЩ'"),
      data: "table=proba&name='"+encodeURIComponent(srt.innerText)+"'&count="+count+"&manager=''&objectt='"+encodeURIComponent(objectt)+"'&sesid="+sesid+"&address=''&mail=''&phone=''&status=12&prim='"+encodeURIComponent(prim)+"'&number=''&able=1&time=1&coast=1&address='"+encodeURIComponent(address)+"'&inn='"+encodeURIComponent(inn)+"'&nomenid="+nomenid+"&org='"+encodeURIComponent(org)+"'",
      success: function(data20){
        //$("#d_vtor_a_"+(t)+"_" + (rowCount-1)).html(seldata+data20);
        sesid = data20;
		//alert("table=proba&name='"+encodeURIComponent(srt.innerText)+"'&count="+count+"&manager='"+encodeURIComponent(manager)+"'&objectt='"+objectt+"'&sesid="+sesid+"&address='"+encodeURIComponent(address)+"'&mail='"+encodeURIComponent(mail)+"'&phone='"+encodeURIComponent(phone)+"'&status=12&prim='"+encodeURIComponent(prim)+"'&number='"+encodeURIComponent(number)+"'&able=1&time=1&coast=1&inn='"+inn+"'&nomenid="+nomenid+"&org='"+encodeURIComponent(org)+"'");
		//document.getElementById('safenew').outerHTML = '<div id="safenew" class="tdbuttonor" onclick="safenew(sesid);" style="width:160px;height:50px;line-height:48px;font-size:16px;display:inline-block;"><b>Сохранить заказ</b></div>';
		//document.getElementById('clearzakaz').outerHTML = '<div id="clearzakaz" class="tdbuttonor" onclick="clearzakaz(sesid);" style="width:160px;height:50px;line-height:48px;font-size:16px;display:inline-block;"><b>Очистить список</b></div>';
		//document.getElementById('clearall').outerHTML = '<div id="clearall" class="tdbuttonor" onclick="clearall(sesid);" style="width:160px;height:50px;line-height:48px;font-size:16px;display:inline-block;"><b>Новый заказ</b></div>';

		$.ajax({
      		type: "POST",
      		url: "/wp-content/themes/semicolon/res2var.php",
      		data: "table=proba&column0=org&case=session_id_eq_'"+sesid+"'",
      		success: function(data21){
        	  $('#org_z').val(data21);
	        }
	    });
    	$.ajax({
      		type: "POST",
      		url: "/wp-content/themes/semicolon/res2var.php",
      		data: "table=proba&column0=object&case=session_id_eq_'"+sesid+"'",
      		success: function(data22){
        	  $('#objectt_z').val(data22);
	        }
	    });
		head = '<tr><td colspan="6"><p><b>Подбираемое оборудование</b></p></td></tr><tr><td><p>Нименование продукции</p></td><td><p>Кол-во</p></td><td><p>Примечание</p></td><td><p>Возможность изготовления</p></td><td><p>Тип запроса</p></td><td><p>Подтверждение</p></td><td><p>Удаление</p></td></tr>';
    	$.ajax({
      		type: "POST",
      		url: "/wp-content/themes/semicolon/res2tab.php",
      		data: "table=proba&column0=name&column1=count&column2=prim&number='"+encodeURIComponent(number)+"'&case=session_id_eq_'"+sesid+"'",
      		success: function(data23){
        	  $('#zakaz').html(head+data23);
	        }
	    });
    	$.ajax({
      		type: "POST",
      		url: "/wp-content/themes/semicolon/res2var.php",
      		data: "table=proba&column0=inn&case=session_id_eq_'"+sesid+"'",
      		success: function(data28){
        	  $('#inn_z').val(data28);
			  inn = data28;	
	        }
	    });
		if (number && (number !='')){
    	$.ajax({
      		type: "POST",
      		url: "/wp-content/themes/semicolon/cnt2var.php",
      		data: "table=proba&number='"+number+"'&case=session_id_eq_'"+sesid+"'_or_number_eq_'"+number+"'",
      		success: function(data29){
        	  $('#sumzak').text(' '+number+' ('+data29+')');
        	  $('#sumzak_').text(' '+number+' ('+data29+')');
	        }
	    });
		}
		else{
    	$.ajax({
      		type: "POST",
      		url: "/wp-content/themes/semicolon/cnt2var.php",
      		data: "table=proba&case=session_id_eq_'"+sesid+"'",
      		success: function(data29){
        	  $('#sumzak').text(' "Новый" ('+data29+')');
        	  $('#sumzak_').text(' "Новый" ('+data29+')');
	        }
	    });
		}
      }
    });
	document.getElementById('safenew').outerHTML = '<div id="safenew" class="tdbuttonbl" style="width:160px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Сохранить заказ</b></div>';
	document.getElementById('newfind').outerHTML = '<div id="newfind" class="tdbuttonbl" onclick="novy();" style="width:120px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Новый поиск</b></div>';
	document.getElementById('newobject').outerHTML = '<div id="newobject" class="tdbuttonbl" onclick="newobject(sesid);" style="width:120px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Новый объект</b></div>';
	document.getElementById('newclearzak').outerHTML = '<div id="newclearzak" class="tdbuttongr" style="width:120px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Новый заказ</b></div>';
	document.getElementById('safezakaz').outerHTML = '<div id="safezakaz" class="tdbuttongr" style="width:130px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Сохраненить и отправить</b></div>';
	document.getElementById('sendnew').outerHTML = '<div id="sendnew" class="tdbuttongr" style="width:120px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Заказать</b></div>';

	document.getElementById('safenew_').outerHTML = '<div id="safenew_" class="tdbuttongr" style="width:160px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Сохранить заказ</b></div>';
	document.getElementById('newfind_').outerHTML = '<div id="newfind_" class="tdbuttonbl" onclick="novy();" style="width:120px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Новый поиск</b></div>';
	document.getElementById('newobject_').outerHTML = '<div id="newobject_" class="tdbuttonbl" onclick="newobject(sesid);" style="width:120px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Новый объект</b></div>';
	document.getElementById('newclearzak_').outerHTML = '<div id="newclearzak_" class="tdbuttongr" style="width:120px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Новый заказ</b></div>';
	document.getElementById('safezakaz_').outerHTML = '<div id="safezakaz_" class="tdbuttongr" style="width:130px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Сохраненить и отправить</b></div>';
	document.getElementById('sendnew_').outerHTML = '<div id="sendnew_" class="tdbuttongr" style="width:120px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Заказать</b></div>';
	return false;
}

function addnew(proba) {
	pref = 'sform';
	zpref = 'newzakaztxt';
	if (proba.value.substr(0,4) == 'like'){
	  pref = 'likesform';
	  zpref = 'likezakaztxt';
	}
	if (!adednew && document.getElementById(pref).value !=''){
	org = document.getElementById('org').value;
	objectt = document.getElementById('objectt').value;
	count = document.getElementById('count').value;
	prim = document.getElementById(zpref).value;
	inn = document.getElementById('inn').value;
	number = $('#nomzakaz').attr('value');
	//alert("table=proba&name='"+encodeURIComponent(proba.value)+"'&count="+count+"&org='"+encodeURIComponent(org)+"'&objectt='"+encodeURIComponent(objectt)+"'&sesid="+sesid+"&address='"+encodeURIComponent(address)+"'&inn='"+encodeURIComponent(inn)+"'&mail='"+encodeURIComponent(mail)+"'&phone=''&status=1&prim='"+encodeURIComponent(prim)+"'&number='"+encodeURIComponent(number)+"'&able=1&time=1&coast=1&inn='"+inn+"'");
    $.ajax({
      type: "POST",
      url: "/wp-content/themes/semicolon/addzakaz.php",
      //data: "table="+ encodeURIComponent("analogs") + '&column0='+ encodeURIComponent("*") + '&case='+ encodeURIComponent("zavodeq'СЭЩ'"),
      data: "table=proba&name='"+encodeURIComponent(proba.value)+"'&count="+count+"&org='"+encodeURIComponent(org)+"'&objectt='"+encodeURIComponent(objectt)+"'&sesid="+sesid+"&address='"+encodeURIComponent(address)+"'&inn='"+encodeURIComponent(inn)+"'&mail='"+encodeURIComponent(mail)+"'&phone=''&status=1&prim='"+encodeURIComponent(prim)+"'&number='"+encodeURIComponent(number)+"'&able=1&time=1&coast=1&inn='"+inn+"'",
      success: function(data24){
        //$("#d_vtor_a_"+(t)+"_" + (rowCount-1)).html(seldata+data20);
        sesid = data24;
        adednew = true;
		$.ajax({
      		type: "POST",
      		url: "/wp-content/themes/semicolon/res2var.php",
      		data: "table=proba&column0=org&case=session_id_eq_'"+sesid+"'",
      		success: function(data25){
        	  $('#org_z').val(data25);
	        }
	    });
    	$.ajax({
      		type: "POST",
      		url: "/wp-content/themes/semicolon/res2var.php",
      		data: "table=proba&column0=object&case=session_id_eq_'"+sesid+"'",
      		success: function(data26){
        	  $('#objectt_z').val(data26);
	        }
	    });
    	$.ajax({
      		type: "POST",
      		url: "/wp-content/themes/semicolon/res2var.php",
      		data: "table=proba&column0=inn&case=session_id_eq_'"+sesid+"'",
      		success: function(data28){
        	  $('#inn_z').val(data28);
				inn = data28;
	        }
	    });
		head = '<tr><td colspan="6"><p><b>Подбираемое оборудование</b></p></td></tr><tr><td><p>Нименование продукции</p></td><td><p>Кол-во</p></td><td><p>Примечание</p></td><td><p>Возможность изготовления</p></td><td><p>Тип запроса</p></td><td><p>Подтверждение</p></td><td><p>Удаление</p></td></tr>';
    	$.ajax({
      		type: "POST",
      		url: "/wp-content/themes/semicolon/res2tab.php",
      		data: "table=proba&column0=name&column1=count&column2=prim&number='"+encodeURIComponent(number)+"'&case=session_id_eq_'"+sesid+"'",
      		success: function(data27){
				//alert(document.getElementById('clicknew'));
			  document.getElementById('clcknew').className = 'tdbuttongn';
			  document.getElementById('clcknew').innerText = 'Добавлено';
        	  $('#zakaz').html(head+data27);
	        }
	    });
		if (number && (number !='')){
    	$.ajax({
      		type: "POST",
      		url: "/wp-content/themes/semicolon/cnt2var.php",
      		data: "table=proba&number='"+number+"'&case=session_id_eq_'"+sesid+"'_or_number_eq_'"+number+"'",
      		success: function(data29){
        	  $('#sumzak').text(' '+number+' ('+data29+')');
        	  $('#sumzak_').text(' '+number+' ('+data29+')');
	        }
	    });
		}else{
    	$.ajax({
      		type: "POST",
      		url: "/wp-content/themes/semicolon/cnt2var.php",
      		data: "table=proba&case=session_id_eq_'"+sesid+"'",
      		success: function(data29){
        	  $('#sumzak').text(' "Новый" ('+data29+')');
        	  $('#sumzak_').text(' "Новый" ('+data29+')');
	        }
	    });
		}  
      }
    });
	document.getElementById('safenew').outerHTML = '<div id="safenew" class="tdbuttongr" style="width:160px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Сохранить заказ</b></div>';
	document.getElementById('newfind').outerHTML = '<div id="newfind" class="tdbuttonbl" onclick="novy();" style="width:120px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Новый поиск</b></div>';
	document.getElementById('newobject').outerHTML = '<div id="newobject" class="tdbuttonbl" onclick="newobject(sesid);" style="width:120px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Новый объект</b></div>';
	document.getElementById('newclearzak').outerHTML = '<div id="newclearzak" class="tdbuttongr" style="width:120px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Новый заказ</b></div>';
	document.getElementById('safezakaz').outerHTML = '<div id="safezakaz" class="tdbuttongr" style="width:130px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Сохранить и отправить</b></div>';
	document.getElementById('sendnew').outerHTML = '<div id="sendnew" class="tdbuttongr" style="width:120px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Заказать</b></div>';

	document.getElementById('safenew_').outerHTML = '<div id="safenew_" class="tdbuttongr" style="width:160px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><p style="line-height:48px;"><b>Сохранить заказ</b></p></div>';
	document.getElementById('newfind_').outerHTML = '<div id="newfind_" class="tdbuttonbl" onclick="novy();" style="width:120px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Новый поиск</b></div>';
	document.getElementById('newobject_').outerHTML = '<div id="newobject_" class="tdbuttonbl" onclick="newobject(sesid);" style="width:120px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Новый объект</b></div>';
	document.getElementById('newclearzak_').outerHTML = '<div id="newclearzak_" class="tdbuttongr" style="width:120px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Новый заказ</b></div>';
	document.getElementById('safezakaz_').outerHTML = '<div id="safezakaz_" class="tdbuttongr" style="width:130px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><p style="line-height:24px;"><b>Сохранить и отправить</b></p></div>';
	document.getElementById('sendnew_').outerHTML = '<div id="sendnew_" class="tdbuttongr" style="width:120px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Заказать</b></div>';
  }
  return false;
}

function delzakaz(nid, nsesid){
  number = $('#nomzakaz').attr('value');
  $.ajax({
    type: "POST",
    url: "/wp-content/themes/semicolon/res2var.php",
    data: "table=proba&column0=name&case=id_eq_"+nid+"_and_session_id_eq_'"+nsesid+"'",
    success: function(data27){
	delrow = data27;

	if (confirm('Вы действительно хотите удалить запись '+delrow)){
	  $.ajax({
      	type: "POST",
      	url: "/wp-content/themes/semicolon/delzakaz.php",
      	data: "table=proba&case=id_eq_"+nid+"_and_session_id_eq_'"+nsesid+"'",
      	success: function(data28){

		  head = '<tr><td colspan="7"><p><b>Подбираемое оборудование</b></p></td></tr><tr><td><p>Нименование продукции</p></td><td><p>Кол-во</p></td><td><p>Примечание</p></td><td><p>Возможность изготовления</p></td><td><p>Тип запроса</p></td><td><p>Подтверждение</p></td><td><p>Удаление</p></td></tr>';
    	  $.ajax({
      		type: "POST",
      		url: "/wp-content/themes/semicolon/res2tab.php",
      		data: "table=proba&column0=name&column1=count&column2=prim&case=session_id_eq_'"+nsesid+"'",
      		success: function(data29){
				//alert(document.getElementById('clicknew'));
			  	//document.getElementById('clcknew').className = 'tdbuttongn';
			  	//document.getElementById('clcknew').innerText = 'Добавлено';
			  	if (data29 != '') {
        	  		$('#zakaz').html(head+data29);
				}
				else{
					$('#zakaz').html(data29);
				}
	        }
		  });
		if (number && (number !='')){
    	$.ajax({
      		type: "POST",
      		url: "/wp-content/themes/semicolon/cnt2var.php",
      		data: "table=proba&number='"+number+"'&case=session_id_eq_'"+sesid+"'_or_number_eq_'"+number+"'",
      		success: function(data29){
        	  $('#sumzak').text(' '+number+' ('+data29+')');
        	  $('#sumzak_').text(' '+number+' ('+data29+')');
	        }
	    });
		}else{
    	$.ajax({
      		type: "POST",
      		url: "/wp-content/themes/semicolon/cnt2var.php",
      		data: "table=proba&case=session_id_eq_'"+sesid+"'",
      		success: function(data29){
        	  $('#sumzak').text(' "Новый" ('+data29+')');
        	  $('#sumzak_').text(' "Новый" ('+data29+')');
	        }
	    });
		}  
	    }
	  });
	}
    }
  });

}

function sendzakaz(nsesid){
	manager = document.getElementById('manager_z').value;
	objectt = document.getElementById('objectt_z').value;
	address = document.getElementById('address').value;
	mail = document.getElementById('mail').value;
	phone = document.getElementById('phone').value;
	org = document.getElementById('org_z').value;
	inn = document.getElementById('inn_z').value;
	//alert("table=proba&manager='"+encodeURIComponent(manager)+"'&objectt='"+encodeURIComponent(objectt)+"'&sesid='"+nsesid+"'&address='"+encodeURIComponent(address)+"'&mail='"+encodeURIComponent(mail)+"'&phone='"+encodeURIComponent(phone)+"'&prim='"+encodeURIComponent(prim)+"'&number='"+encodeURIComponent(number)+"'&inn='"+inn+"'&org='"+encodeURIComponent(org)+"'&case=session_id_eq_'"+nsesid+"'");
    $.ajax({
      	type: "POST",
      	url: "/wp-content/themes/semicolon/sendzakaz.php",
      	data: "table=proba&manager='"+encodeURIComponent(manager)+"'&objectt='"+encodeURIComponent(objectt)+"'&sesid='"+nsesid+"'&address='"+encodeURIComponent(address)+"'&mail='"+encodeURIComponent(mail)+"'&phone='"+encodeURIComponent(phone)+"'&prim='"+encodeURIComponent(prim)+"'&number='"+encodeURIComponent(number)+"'&inn='"+inn+"'&org='"+encodeURIComponent(org)+"'&case=session_id_eq_'"+nsesid+"'",
      	success: function(data29){
		  document.getElementById('safenew').outerHTML = '<div id="safenew" class="tdbuttongr" style="width:160px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Сохранить заказ</b></div>';
		  document.getElementById('newfind').outerHTML = '<div id="newfind" class="tdbuttongr" style="width:120px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Новый поиск</b></div>';
		  document.getElementById('newobject').outerHTML = '<div id="newobject" class="tdbuttongr" style="width:120px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Новый объект</b></div>';
		  document.getElementById('newclearzak').outerHTML = '<div id="newclearzak" class="tdbuttonbl" onclick="newclearzak(sesid);" style="width:120px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Новый заказ</b></div>';
		  document.getElementById('safezakaz').outerHTML = '<div id="safezakaz" class="tdbuttongn" style="width:130px;height:50px;line-height:48px;font-size:18px;display:inline-block;"><b>Сохранено и отправлено</b></div>';
		  document.getElementById('sendnew').outerHTML = '<div id="sendnew" class="tdbuttongr" style="width:120px;height:50px;line-height:48px;font-size:18px;display:inline-block;"><b>Заказать</b></div>';

		  document.getElementById('safenew_').outerHTML = '<div id="safenew_" class="tdbuttongr" style="width:160px;height:50px;line-height:48px;font-size:18px;display:inline-block;"><p style="line-height:48px;"><b>Сохранить заказ</b></p></div>';
		  document.getElementById('newfind_').outerHTML = '<div id="newfind_" class="tdbuttongr" style="width:120px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Новый поиск</b></div>';
		  document.getElementById('newobject_').outerHTML = '<div id="newobject_" class="tdbuttongr" style="width:120px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Новый объект</b></div>';
		  document.getElementById('newclearzak_').outerHTML = '<div id="newclearzak_" class="tdbuttonbl" onclick="newclearzak(sesid);" style="width:120px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Новый заказ</b></div>';
		  document.getElementById('safezakaz_').outerHTML = '<div id="safezakaz_" class="tdbuttongn" style="width:130px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Сохранено и отправлено</b></div>';
		  document.getElementById('sendnew_').outerHTML = '<div id="sendnew_" class="tdbuttongr" style="width:120px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Заказать</b></div>';
    	$.ajax({
      		type: "POST",
      		url: "/wp-content/themes/semicolon/res2var.php",
      		data: "table=proba&column0=number&case=session_id_eq_'"+nsesid+"'",
      		success: function(data28){
        		$('#nomzakaz').val(data28);
        		$('#nomzakaz_').val(data28);
				number = data28;  
    			$.ajax({
      				type: "POST",
      				url: "/wp-content/themes/semicolon/cnt2var.php",
      				data: "table=proba&number='"+number+"'&case=session_id_eq_'"+sesid+"'_or_number_eq_'"+number+"'",
      				success: function(data29){
        	  			$('#sumzak').text(' '+number+' ('+data29+')');
        	  			$('#sumzak_').text(' '+number+' ('+data29+')');
	        		}
	    		});
	  		}
		});
	  }
	});	
	//alert(nsesid);
}

function safezakaz(nid, nsesid){
//	общие поля
//поля по оборудованию
	count = document.getElementById('count-'+nid).value;
	prim = document.getElementById('prim-'+nid).value;
	able = ($('#able-'+nid).prop('checked'))?1:0;
	time = ($('#time-'+nid).prop('checked'))?1:0;
	coast = ($('#coast-'+nid).prop('checked'))?1:0;
	phone = '';
	num = $('#nomzakaz').val();
	
	head = '<tr><td colspan="7"><p><b>Подбираемое оборудование</b></p></td></tr><tr><td><p>Нименование продукции</p></td><td><p>Кол-во</p></td><td><p>Примечание</p></td><td><p>Возможность изготовления</p></td><td><p>Тип запроса</p></td><td><p>Подтверждение</p></td><td><p>Удаление</p></td></tr>';
//alert("table=proba&id="+nid+"&count="+count+"&sesid='"+nsesid+"'&address='"+encodeURIComponent(address)+"'&mail='"+encodeURIComponent(mail)+"'&phone='"+encodeURIComponent(phone)+"'&status="+status+"&prim='"+encodeURIComponent(prim)+"'&number='"+encodeURIComponent(number)+"'&able="+able+"&time="+time+"&coast="+coast+"&inn='"+inn+"'&case=session_id_eq_'"+nsesid+"'");

	$.ajax({
      	type: "POST",
      	url: "/wp-content/themes/semicolon/safezakaz.php",
      	data: "table=proba&id="+nid+"&count="+count+"&sesid='"+nsesid+"'&address='"+encodeURIComponent(address)+"'&mail='"+encodeURIComponent(mail)+"'&phone='"+encodeURIComponent(phone)+"'&status="+status+"&prim='"+encodeURIComponent(prim)+"'&number='"+encodeURIComponent(number)+"'&able="+able+"&time="+time+"&coast="+coast+"&inn='"+inn+"'&case=session_id_eq_'"+nsesid+"'",
      	success: function(data29){
			  //document.getElementById('safezakaz').outerHTML = '<div id="safezakaz" class="tdbuttongn" onclick="alert();" style="width:200px;height:50px;line-height:48px;font-size:16px;"><b>Заказ отправлен</b></div>';
        	$('#zakaz').html(head+data29);
			//alert($('.proundgn').length)
			if ($('.proundgn').length == 0) {
				document.getElementById('safenew').outerHTML = '<div id="safenew" class="tdbuttonbl" onclick="safenew(sesid);" style="width:160px;height:50px;line-height:24px;font-size:16px;display:inline-block;"><b>Сохранить заказ</b></div>';
		  		document.getElementById('newfind').outerHTML = '<div id="newfind" class="tdbuttonbl" onclick="novy(sesid);" style="width:120px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Новый поиск</b></div>';
				document.getElementById('newobject').outerHTML = '<div id="newobject" class="tdbuttonbl" onclick="newobject(sesid);" style="width:120px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Новый объект</b></div>';
				document.getElementById('newclearzak').outerHTML = '<div id="newclearzak" class="tdbuttongr" style="width:120px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Новый заказ</b></div>';
				document.getElementById('safezakaz').outerHTML = '<div id="safezakaz" class="tdbuttonbl" onclick="sendzakaz(sesid);" style="width:130px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><p style="line-height:24px;"><b>Сохранить и заказать</b></p></div>';
		  		document.getElementById('sendnew').outerHTML = '<div id="sendnew" class="tdbuttongr" style="width:120px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Заказать</b></div>';

				document.getElementById('safenew_').outerHTML = '<div id="safenew_" class="tdbuttonbl" onclick="safenew(sesid);" style="width:160px;height:50px;line-height:48px;font-size:18px;display:inline-block;"><p style="line-height:48px;"><b>Сохранить заказ</b></p></div>';
		  		document.getElementById('newfind_').outerHTML = '<div id="newfind_" class="tdbuttonbl" onclick="novy(sesid);" style="width:120px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Новый поиск</b></div>';
				document.getElementById('newobject_').outerHTML = '<div id="newobject_" class="tdbuttonbl" onclick="newobject(sesid);" style="width:120px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Новый объект</b></div>';
				document.getElementById('newclearzak_').outerHTML = '<div id="newclearzak_" class="tdbuttongr" style="width:120px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Новый заказ</b></div>';
				document.getElementById('safezakaz_').outerHTML = '<div id="safezakaz_" class="tdbuttonbl" onclick="sendzakaz(sesid);" style="width:130px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><p style="line-height:24px;"><b>Сохранить и заказать</b></p></div>';
		  		document.getElementById('sendnew_').outerHTML = '<div id="sendnew_" class="tdbuttongr" style="width:120px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Заказать</b></div>';
			}
	    }
	});		
					
}

function safenew(nsesid){
	manager = document.getElementById('manager_z').value;
	objectt = document.getElementById('objectt_z').value;
	address = document.getElementById('address').value;
	mail = document.getElementById('mail').value;
	phone = document.getElementById('phone').value;
	org = document.getElementById('org_z').value;
	inn = document.getElementById('inn').value;
	//alert("table=proba&manager='"+encodeURIComponent(manager)+"'&objectt='"+encodeURIComponent(objectt)+"'&sesid='"+nsesid+"'&address='"+encodeURIComponent(address)+"'&mail='"+encodeURIComponent(mail)+"'&phone='"+encodeURIComponent(phone)+"'&prim='"+encodeURIComponent(prim)+"'&number='"+encodeURIComponent(number)+"'&inn='"+encodeURIComponent(inn)+"'&org='"+encodeURIComponent(org)+"'&case=session_id_eq_'"+nsesid+"'");
    $.ajax({
      	type: "POST",
      	url: "/wp-content/themes/semicolon/safenew.php",
      	data: "table=proba&manager='"+encodeURIComponent(manager)+"'&objectt='"+encodeURIComponent(objectt)+"'&sesid='"+nsesid+"'&address='"+encodeURIComponent(address)+"'&mail='"+encodeURIComponent(mail)+"'&phone='"+encodeURIComponent(phone)+"'&prim='"+encodeURIComponent(prim)+"'&number='"+encodeURIComponent(number)+"'&inn='"+encodeURIComponent(inn)+"'&org='"+encodeURIComponent(org)+"'&case=session_id_eq_'"+nsesid+"'",
        success: function(data29){
    	$.ajax({
     	  type: "POST",
      	  url: "/wp-content/themes/semicolon/res2var.php",
      	  data: "table=proba&column0=number&case=session_id_eq_'"+nsesid+"'",
      	  success: function(data28){
		  //alert("table=proba&column0=number&case=session_id_eq_'"+nsesid+"'");
		  number = data28;
		  //alert(number);
          $('#nomzakaz').val(data28);
		  	document.getElementById('safenew').outerHTML = '<div id="safenew" class="tdbuttongn" style="width:160px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Заказ сохранён</b></div>';
		  	document.getElementById('newfind').outerHTML = '<div id="newfind" class="tdbuttonbl" onclick="novy();" style="width:120px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Новый поиск</b></div>';
			document.getElementById('newobject').outerHTML = '<div id="newobject" class="tdbuttonbl" onclick="newobject(sesid);" style="width:120px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Новый объект</b></div>';
			document.getElementById('newclearzak').outerHTML = '<div id="newclearzak" class="tdbuttonbl" onclick="newclearzak(sesid);" style="width:120px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Новый заказ</b></div>';
		  	document.getElementById('safezakaz').outerHTML = '<div id="safezakaz" class="tdbuttongr" style="width:130px;height:50px;line-height:48px;font-size:18px;display:inline-block;"><b>Сохранить и заказать</b></div>';
		  	document.getElementById('sendnew').outerHTML = '<div id="sendnew" class="tdbuttonbl" onclick="sendnew(sesid);" style="width:120px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Заказать</b></div>';

		  	document.getElementById('safenew_').outerHTML = '<div id="safenew_" class="tdbuttongn" style="width:160px;height:50px;line-height:24px;font-size:16px;display:inline-block;"><b>Заказ сохранён</b></div>';
		  	document.getElementById('newfind_').outerHTML = '<div id="newfind_" class="tdbuttonbl" onclick="novy();" style="width:120px;height:50px;line-height:24px;font-size:16px;display:inline-block;"><b>Новый поиск</b></div>';
			document.getElementById('newobject_').outerHTML = '<div id="newobject_" class="tdbuttonbl" onclick="newobject(sesid);" style="width:120px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Новый объект</b></div>';
			document.getElementById('newclearzak_').outerHTML = '<div id="newclearzak_" class="tdbuttonbl" onclick="newclearzak(sesid);" style="width:120px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Новый заказ</b></div>';
		  	document.getElementById('safezakaz_').outerHTML = '<div id="safezakaz_" class="tdbuttongr" style="width:130px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Сохранить и заказать</b></div>';
		  	document.getElementById('sendnew_').outerHTML = '<div id="sendnew_" class="tdbuttonbl" onclick="sendnew(sesid);" style="width:120px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Заказать</b></div>';
		$.ajax({
      		type: "POST",
      		url: "/wp-content/themes/semicolon/cnt2var.php",
      		data: "table=proba&number='"+number+"'&case=session_id_eq_'"+sesid+"'_or_number_eq_'"+number+"'",
      		success: function(data29){
        	  $('#sumzak').text(' '+number+' ('+data29+')');
        	  $('#sumzak_').text(' '+number+' ('+data29+')');
	        }
	    });
	      }
		});
	    }
	});					
}

function novy(){
	$('#org').focus();
	$('#org').blur();
     $.ajax({
       type: "POST",
       url: "/wp-content/themes/semicolon/txzn.php?sesid='"+sesid+"'",
       data: "tabl="+0,
	   dataType: "html",
	   async: false,	 
       success: function(datatml){
         $("#tabl").html("");
         $("#tabl").html(datatml);
		 $('#tip :first').attr("selected", "selected");
       }
     });
	$('#vkl1').attr('checked', true);
	$('#vkl10').attr('checked', true);
}

function nave(){
	$('#org').focus();
	$('#org').blur();
}

function noob(){
	$('#org').focus();
	$('#org').blur();
     $.ajax({
       type: "POST",
       url: "/wp-content/themes/semicolon/txzn.php?sesid='"+sesid+"'",
       data: "tabl="+tipn,
	   dataType: "html",
	   async: false,	 
       success: function(datatml){
         $("#tabl").html("");
         $("#tabl").html(datatml);
		 $('#tip :first').attr("selected", "selected");
		 $('#objectt').focus();
		 $('#objectt').val('');
       }
     });
}


function edzakaz(number){
	head = '<tr><td colspan="7"><p><b>Подбираемое оборудование</b></p></td></tr><tr><td><p>Нименование продукции</p></td><td><p>Кол-во</p></td><td><p>Примечание</p></td><td><p>Возможность изготовления</p></td><td><p>Тип запроса</p></td><td><p>Подтверждение</p></td><td><p>Удаление</p></td></tr>';
	//alert("table=proba&column0=name&column1=count&column2=prim&case=number_eq_'"+number+"'");
    $.ajax({
      type: "POST",
      url: "/wp-content/themes/semicolon/res2var.php",
      data: "table=proba&column0=inn&case=session_id_eq_'"+sesid+"'",
      success: function(data28){
		//alert("table=proba&column0=number&case=session_id_eq_'"+nsesid+"'");
		inn = data28;
		//alert(number);
        //$('#nomzakaz').html('<b>№ '+data28+'</b>');
	  }
	});

	$('#vkl3').attr('checked', true);
	$('#vkl30').attr('checked', true);
        $('#nomzakaz').val(number);
    	  $.ajax({
      		type: "POST",
      		url: "/wp-content/themes/semicolon/res2tab.php",
      		data: "table=proba&column0=name&column1=count&column2=prim&case=number_eq_'"+number+"'",
      		success: function(data29){
				//alert(document.getElementById('clicknew'));
			  	//document.getElementById('clcknew').className = 'tdbuttongn';
			  	//document.getElementById('clcknew').innerText = 'Добавлено';
			  	if (data29 != '') {
        	  		$('#zakaz').html(head+data29);
				}
				else{
					$('#zakaz').html(data29);
				}
	        }
		  });
    	$.ajax({
      		type: "POST",
      		url: "/wp-content/themes/semicolon/cnt2var.php",
      		data: "table=proba&number='"+number+"'&case=session_id_eq_'"+sesid+"'_or_number_eq_'"+number+"'",
      		success: function(data29){
        	  $('#sumzak').text(' '+number+' ('+data29+')');
        	  $('#sumzak_').text(' '+number+' ('+data29+')');
	        }
	    });
    	$.ajax({
     	  type: "POST",
      	  url: "/wp-content/themes/semicolon/res2var.php",
      	  data: "table=vsezakaz&column0=status&case=number_eq_'"+number+"'",
      	  success: function(data28){
		  	//alert("table=proba&column0=number&case=session_id_eq_'"+nsesid+"'");
		  	stat = data28;
		  	//alert(number);
		  	if (stat == 0){
		  		document.getElementById('safenew').outerHTML = '<div id="safenew" class="tdbuttongn" style="width:160px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Заказ сохранён</b></div>';
		  		document.getElementById('newfind').outerHTML = '<div id="newfind" class="tdbuttonbl" onclick="novy();" style="width:120px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Новый поиск</b></div>';
				document.getElementById('newobject').outerHTML = '<div id="newobject" class="tdbuttonbl" onclick="newobject(sesid);" style="width:120px;height:50px;line-height:24px;font-size:16px;display:inline-block;"><b>Новый объект</b></div>';
				document.getElementById('newclearzak').outerHTML = '<div id="newclearzak" class="tdbuttonbl" onclick="newclearzak(sesid);" style="width:120px;height:50px;line-height:24px;font-size:16px;display:inline-block;"><b>Новый заказ</b></div>';
		  		document.getElementById('safezakaz').outerHTML = '<div id="safezakaz" class="tdbuttongr" style="width:130px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Сохранить и заказать</b></div>';
		  		document.getElementById('sendnew').outerHTML = '<div id="sendnew" class="tdbuttonbl" onclick="sendnew(sesid);" style="width:120px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Заказать</b></div>';

		  		document.getElementById('safenew_').outerHTML = '<div id="safenew_" class="tdbuttongn" style="width:160px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Заказ сохранён</b></div>';
		  		document.getElementById('newfind_').outerHTML = '<div id="newfind_" class="tdbuttonbl" onclick="novy();" style="width:120px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Новый поиск</b></div>';
				document.getElementById('newobject_').outerHTML = '<div id="newobject_" class="tdbuttonbl" onclick="newobject(sesid);" style="width:120px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Новый объект</b></div>';
				document.getElementById('newclearzak_').outerHTML = '<div id="newclearzak_" class="tdbuttonbl" onclick="newclearzak(sesid);" style="width:120px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Новый заказ</b></div>';
		  		document.getElementById('safezakaz_').outerHTML = '<div id="safezakaz_" class="tdbuttongr" style="width:130px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Сохранить и заказать</b></div>';
		  		document.getElementById('sendnew_').outerHTML = '<div id="sendnew_" class="tdbuttonbl" onclick="sendnew(sesid);" style="width:120px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Заказать</b></div>';
			}
		  	if (stat == 1){
		  		document.getElementById('safenew').outerHTML = '<div id="safenew" class="tdbuttongn" style="width:160px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Заказ сохранён</b></div>';
		  		document.getElementById('newfind').outerHTML = '<div id="newfind" class="tdbuttongr" style="width:120px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Новый поиск</b></div>';
				document.getElementById('newobject').outerHTML = '<div id="newobject" class="tdbuttongr" style="width:120px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Новый объект</b></div>';
				document.getElementById('newclearzak').outerHTML = '<div id="newclearzak" class="tdbuttonbl" onclick="newclearzak(sesid);" style="width:120px;height:50px;line-height:24px;font-size:16px;display:inline-block;"><b>Новый заказ</b></div>';
		  		document.getElementById('safezakaz').outerHTML = '<div id="safezakaz" class="tdbuttongr" style="width:130px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Сохранить и заказать</b></div>';
		  		document.getElementById('sendnew').outerHTML = '<div id="sendnew" class="tdbuttongn" onclick="sendnew(sesid);" style="width:120px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Заказ отправлен</b></div>';

		  		document.getElementById('safenew_').outerHTML = '<div id="safenew_" class="tdbuttongn" style="width:160px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Заказ сохранён</b></div>';
		  		document.getElementById('newfind_').outerHTML = '<div id="newfind_" class="tdbuttongr" style="width:120px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Новый поиск</b></div>';
				document.getElementById('newobject_').outerHTML = '<div id="newobject_" class="tdbuttongr" style="width:120px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Новый объект</b></div>';
				document.getElementById('newclearzak_').outerHTML = '<div id="newclearzak_" class="tdbuttonbl" onclick="newclearzak(sesid);" style="width:120px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Новый заказ</b></div>';
		  		document.getElementById('safezakaz_').outerHTML = '<div id="safezakaz_" class="tdbuttongr" style="width:130px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Сохранить и заказать</b></div>';
		  		document.getElementById('sendnew_').outerHTML = '<div id="sendnew_" class="tdbuttongn" onclick="sendnew(sesid);" style="width:120px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Заказ отправлен</b></div>';
			}
	      }
		});
}
	
function vse(){
  //alert('ИНН '+document.getElementById('inn0').value);
  if (document.getElementById('inn0') && ($('#inn0').val() != "") && ($('#inn0').val() != "''")){
  inn0 = $('#inn0').val();
	$.ajax({
      		type: "POST",
      		url: "/wp-content/themes/semicolon/vsezakaz.php",
      		data: "table=proba&inn='"+inn0+"'",
      		success: function(data27){
			  //alert("table=proba&inn='"+inn0+"'");
        	  $('#vsezakazy').html(data27);
	        }
	    });
  }
  else{
	if(inn && (inn != "") && (inn != "''")){
		$.ajax({
      		type: "POST",
      		url: "/wp-content/themes/semicolon/vsezakaz.php",
      		data: "table=proba&inn='"+inn+"'&sesid='"+sesid+"'",
      		success: function(data27){
			  //alert("table=proba&inn='"+inn+"'&sesid='"+sesid+"'");
        	  $('#vsezakazy').html(data27);
	        }
	    });
	   }  
  }
  return false;	
}

function deletezakaz(number){
	if (confirm('Вы действительно хотите удалить данные о Заказе '+number+' целиком ?')){
		//alert("table=proba&number='"+number+"'");
	  $.ajax({
      	type: "POST",
      	url: "/wp-content/themes/semicolon/deletezakaz.php",
      	data: "table=proba&number='"+number+"'",
      	success: function(data28){

		  head = '<tr><td colspan="7"><p><b>Подбираемое оборудование</b></p></td></tr><tr><td><p>Нименование продукции</p></td><td><p>Кол-во</p></td><td><p>Примечание</p></td><td><p>Возможность изготовления</p></td><td><p>Тип запроса</p></td><td><p>Подтверждение</p></td><td><p>Удаление</p></td></tr>';
    	  $.ajax({
      		type: "POST",
      		url: "/wp-content/themes/semicolon/res2tab.php",
      		data: "table=proba&column0=name&column1=count&column2=prim&case=session_id_eq_'"+sesid+"'",
      		success: function(data29){
				//alert(document.getElementById('clicknew'));
			  	//document.getElementById('clcknew').className = 'tdbuttongn';
			  	//document.getElementById('clcknew').innerText = 'Добавлено';
			  	if (data29 != '') {
        	  		$('#zakaz').html(head+data29);
				}
				else{
					$('#zakaz').html(data29);
				}
	        }
		  });
	    }
	  });
	}
  if (document.getElementById('inn0')){
  inn0 = $('#inn0').val();
	$.ajax({
      		type: "POST",
      		url: "/wp-content/themes/semicolon/vsezakaz.php",
      		data: "table=proba&inn='"+inn0+"'",
      		success: function(data27){
			  //alert(document.getElementById('vsezakazy'));
        	  $('#vsezakazy').html(data27);
	        }
	    });
  }
  else{
	$.ajax({
      		type: "POST",
      		url: "/wp-content/themes/semicolon/vsezakaz.php",
      		data: "table=proba&sesid='"+sesid+"'",
      		success: function(data27){
			  //alert(document.getElementById('vsezakazy'));
        	  $('#vsezakazy').html(data27);
	        }
	    });
  }
}
	
function sendnew(nsesid){
	num = $('#nomzakaz').val();
	number = strRight(11,num);
	//alert(number);
	org = document.getElementById('org_z').value;
	if(nsesid != ''){
		case0 = "session_id_eq_'"+nsesid+"'";
	}
	else{
		case0 = "number_eq_'"+number+"'";
	}	
	//alert("table=proba&number='"+encodeURIComponent(number)+"'&inn='"+inn+"'&org='"+encodeURIComponent(org)+"'&case="+case0+"");
    $.ajax({
      	type: "POST",
      	url: "/wp-content/themes/semicolon/sendnew.php",
      	data: "table=proba&number='"+encodeURIComponent(number)+"'&inn='"+inn+"'&org='"+encodeURIComponent(org)+"'&case="+case0+"",
      	success: function(data29){
		  	document.getElementById('newfind').outerHTML = '<div id="newfind" class="tdbuttongr" style="width:120px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Новый поиск</b></div>';
			document.getElementById('newobject').outerHTML = '<div id="newobject" class="tdbuttongr" style="width:120px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Новый объект</b></div>';
			document.getElementById('newclearzak').outerHTML = '<div id="newclearzak" class="tdbuttonbl" onclick="newclearzak(sesid);" style="width:120px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Новый заказ</b></div>';
		  document.getElementById('sendnew').outerHTML = '<div id="sendnew" class="tdbuttongn" style="width:120px;height:50px;line-height:48px;font-size:18px;display:inline-block;"><b>Заказ отправлен</b></div>';

		  	document.getElementById('newfind_').outerHTML = '<div id="newfind_" class="tdbuttongr" style="width:120px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Новый поиск</b></div>';
			document.getElementById('newobject_').outerHTML = '<div id="newobject_" class="tdbuttongr" style="width:120px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Новый объект</b></div>';
			document.getElementById('newclearzak_').outerHTML = '<div id="newclearzak_" class="tdbuttonbl" onclick="newclearzak(sesid);" style="width:120px;height:50px;line-height:24px;font-size:18px;display:inline-block;"><b>Новый заказ</b></div>';
		  document.getElementById('sendnew_').outerHTML = '<div id="sendnew_" class="tdbuttongn" style="width:120px;height:50px;line-height:48px;font-size:18px;display:inline-block;"><b>Заказ отправлен</b></div>';
		}
	});					
    $.ajax({
      type: "POST",
      url: "/wp-content/themes/semicolon/res2var.php",
      data: "table=proba&column0=number&case=session_id_eq_'"+nsesid+"'",
      success: function(data28){
        $('#nomzakaz').val(data28);
	  }
	});
        $('#nomzakaz').val(number);
}

function strRight(n,str){
   return str.substring(str.length-n,str.length);
}	
	
function newobject(sesid){
	$('#org').focus();
	$('#org').blur();
     $.ajax({
       type: "POST",
       url: "/wp-content/themes/semicolon/txzn.php?sesid='"+sesid+"'",
       data: "tabl="+0,
	   dataType: "html",
	   async: false,	 
       success: function(datatml){
         $("#tabl").html("");
         $("#tabl").html(datatml);
		 $('#tip :first').attr("selected", "selected");
		 $('#objectt').focus();
		 $('#objectt').val('');
       }
     });
	$('#vkl1').attr('checked', true);
	$('#vkl10').attr('checked', true);
	$('#objectt').focus();
}

function newclearzak(sesid){
	sesid = '';
	number = '';
    $('#nomzakaz').val('');
	$('#org').focus();
	$('#org').blur();
     $.ajax({
       type: "POST",
       url: "/wp-content/themes/semicolon/txzn.php?sesid='"+sesid+"'",
       data: "tabl="+0,
	   dataType: "html",
	   async: false,	 
       success: function(datatml){
         $("#tabl").html("");
         $("#tabl").html(datatml);
		 $('#tip :first').attr("selected", "selected");
		 $('#objectt').focus();
		 $('#objectt').val('');
       }
     });
	$('#vkl1').attr('checked', true);
	$('#vkl10').attr('checked', true);
    $('#sumzak').text('');
    $('#sumzak_').text('');
	head = '<tr><td colspan="6"><p><b>Подбираемое оборудование</b></p></td></tr><tr><td><p>Нименование продукции</p></td><td><p>Кол-во</p></td><td><p>Примечание</p></td><td><p>Возможность изготовления</p></td><td><p>Тип запроса</p></td><td><p>Подтверждение</p></td><td><p>Удаление</p></td></tr>';
    	$.ajax({
      		type: "POST",
      		url: "/wp-content/themes/semicolon/res2tab.php",
      		data: "table=proba&column0=name&column1=count&column2=prim&number=''&case=session_id_eq_''",
      		success: function(data27){
        	  $('#zakaz').html(head+data27);
	        }
	    });
}	

function createpdf(types){
//	data = $('#config').html();
	data = '';
	data +='<table>';
	data +='<tr><td colspan="5"><p><b>Общие характеристики</b></p></td></tr>';
	data +='<tr><td style="text-align:right;"><p>Организация-заказчик</p></td><td>'+$("#org").val()+'</td><td><p>ИНН</p></td><td>'+$("#inn").val()+'</td><td></td></tr>';
	data +='<tr><td style="text-align:right;"><p>Объект</p></td><td colspan="4">'+$("#objectt").val()+'</td></tr>';
	data +='<tr><td style="text-align:right;"><p>Тип</p></td><td>'+$("#tip option:selected").text()+'</td><td style="text-align:right;">Количество</td><td>'+$("#count").val()+'</td><td></td></tr>';
	data +='</table>';
	nali ='<table>';
	nali +='<tr><td><p>НАЛИ</p></td><td colspan="2"><p>Класс напряжения, кВ</p>'+$("#napr option:selected").text()+'</td><td><p>Исполнение</p>'+$("#gab option:selected").text()+' '+($('#gab_nt').prop('checked')?'неточно':'')+'</td><td colspan="2"><p>Климатическое исполнение</p>'+$("#klim_kat option:selected").text()+'</td></tr>';
	nali +='<tr><td style="vertical-align:top;"><p>Номинальная частота</p>'+$("#chast option:selected").text()+'</td><td colspan="2" style="vertical-align:top;"></td><td colspan="2"></td><td></td></tr>';
	nali +='<tr><td colspan="6"><p><b>Первичная обмотка</b></p></td></tr>';
	nali +='<tr><td colspan="2"><p>Номинальное напряжение первичной обмотки (ВН), В</p>'+$("#per_n option:selected").text()+'</td><td colspan="4"></td></tr>';
	nali +='</table>';
	nali +='<table>';
	nali +='<tr><td colspan="5"><p><b>Вторичные обмотки</b></p></td></tr>';
	nali +='<tr><td colspan="2"><p>Обмотка</p></td><td><p>Номинальное напряжение, В</p></td><td><p>Класс точности</p></td><td><p>Номинальная трехфазная мощность, ВА</p></td></tr>';
	if ($('#td_02').prop('checked')) {
		nali +='<tr><td id="tdd_0" width="14%">(добавлено)</td><td id="td_01" width="14%"><p>Основная (а<sub>1</sub>,в<sub>1</sub>,с<sub>1</sub>,о<sub>1</sub>)</p></td><td>'+$("#vtor_p_0 option:selected").text()+'</td><td>'+$("#vtor_v_0 option:selected").text()+' '+($('#vtor_v_0_nt').prop('checked')?'неточно':'')+'</td><td width="280px">'+$("#id_vtor_a_0 option:selected").text()+' '+($('#d_vtor_a_0_nt').prop('checked')?'неточно':'')+'</td></tr>';
	}	
	if ($('#td_12').prop('checked')) {
		nali +='<tr><td id="tdd_1" width="14%">(добавлено)</td><td id="td_11" width="14%"><p>Основная (а<sub>2</sub>,в<sub>2</sub>,с<sub>2</sub>,о<sub>2</sub>)</p></td><td>'+$("#vtor_p_1 option:selected").text()+'</td><td>'+$("#vtor_v_1 option:selected").text()+' '+($('#vtor_v_1_nt').prop('checked')?'неточно':'')+'</td><td width="280px">'+$("#id_vtor_a_1 option:selected").text()+' '+($('#d_vtor_a_1_nt').prop('checked')?'неточно':'')+'</td></tr>';	}
	nali +='<tr><td id="tdd_2" width="14%"></td><td id="td_21" width="14%"><p>Дополнительная (а<sub>д</sub>,х<sub>д</sub>)</p></td><td>'+$("#vtor_p_2 option:selected").text()+'</td><td>'+$("#vtor_v_2 option:selected").text()+' '+($('#vtor_v_2_nt').prop('checked')?'неточно':'')+'</td><td width="280px">'+$("#id_vtor_a_2 option:selected").text()+' '+($('#d_vtor_a_2_nt').prop('checked')?'неточно':'')+'</td></tr>';
	nali +='</table>';
	if (types == "НАЛИ"){
		data += nali;
	}
	data = encodeURIComponent(data);
//	win = window.open('crtpdf.php?data='+data, 'PDF');
//	function autoLogIn(un, pw) {
    var form1 = document.createElement("form");
    var element1 = document.createElement("textarea"); 
//    var element2 = document.createElement("input");  

    form1.method = "POST";
    form1.action = "/crtpdf/";   
    form1.target = "_blank";  
	form1.style.display = "none";

    element1.value = data;
    element1.name = "data";
    form1.appendChild(element1);  

//    element2.value=pw;
//    element2.name="pw";
//    form.appendChild(element2);

    document.body.appendChild(form1);

    form1.submit();
//}
/*
	$.ajax({
      	type: "POST",
      	url: "/wp-content/themes/semicolon/crtpdf.php",
      	data: "data="+encodeURIComponent($('#config').html())+"",
      	success: function(datapdf){

		}
	});	
*/	
}

	
</script>
<div class="korpus">
  <input type="radio" name="odin" checked="checked" id="vkl1"/><label for="vkl1" onclick="$('#vkl10').attr('checked', true);">Подбор по характеристикам</label><input type="radio" name="odin" id="vkl2"/><label for="vkl2" onclick="$('#vkl20').attr('checked', true);">Подбор по аналогам</label><input type="radio" name="odin" id="vkl3"/><label for="vkl3" onclick="$('#vkl30').attr('checked', true);">Заказ <p id="sumzak" style="width:28px;display:inline;"></p></label><input type="radio" name="odin" id="vkl4"/><label for="vkl4" onclick="$('#vkl40').attr('checked', true); vse();">Мои заказы</label>
  <div>
  <?php
    include("harakter.php");
  ?>
  </div>
  <div>
  <?php
    include("analogs.php");
  ?>
  </div>
  <div>
  <?php
    include("dopoln.php");
  ?>
  </div>
  <div id="vsezakazy">
  <?php
    include("vsezakaz.php");
  ?>
  </div>
</div>
<div class="korpus" style="border-top:#304060 solid 1px; padding-top:3px;margin-bottom:28px;">
  <input type="radio" name="dva" checked="checked" id="vkl10"/><label class="down" for="vkl10" onclick="$('#vkl1').attr('checked', true);">Подбор по характеристикам</label><input type="radio" name="dva" id="vkl20"/><label class="down" for="vkl20" onclick="$('#vkl2').attr('checked', true);">Подбор по аналогам</label><input type="radio" name="dva" id="vkl30"/><label class="down" for="vkl30" onclick="$('#vkl3').attr('checked', true);">Заказ <p id="sumzak_" style="width:28px;display:inline;"></p></label><input type="radio" name="dva" id="vkl40" /><label class="down" for="vkl40" onclick="$('#vkl4').attr('checked', true); vse();">Мои заказы</label>
</div>
<script type="text/javascript">
$('#nomzakaz').attr("value", "");
$('#nomzakaz_').attr("value", "");
</script>
