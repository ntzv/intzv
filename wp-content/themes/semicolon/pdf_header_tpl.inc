	data1 = '';
	data1 +='<IMG WIDTH="40" HEIGHT="40" SRC="https://intzv.ru/wp-content/themes/semicolon/ntz-volhov1.png">';
	data1 +='<table>';
	data1 +='<tr><td WIDTH="70px" ALIGN="CENTER" HEIGHT="4mm"><font size="10" color="#ffffff">.</font></td><td WIDTH="50mm" HEIGHT="4mm"><font size="10" color="#ffffff">.</font></td><td ALIGN="RIGHT" WIDTH="70mm"  HEIGHT="4mm"><font size="10" color="#000000">Организация-заказчик:</font></td></tr>';
	data1 +='<tr><td WIDTH="70mm" ALIGN="CENTER" HEIGHT="4mm"><font size="10" color="#ffffff">.</font></td><td WIDTH="50mm" HEIGHT="4mm"><font size="10" color="#ffffff">.</font></td><td ALIGN="RIGHT" WIDTH="70mm" HEIGHT="4mm"><font size="10" color="#000000"><b>'+$("#org").val()+'</b></font></td></tr>';
	data1 +='<tr><td WIDTH="70mm" ALIGN="CENTER" HEIGHT="4mm"><font size="10" color="#ffffff">.</font></td><td WIDTH="50mm" HEIGHT="4mm"><font size="10" color="#ffffff">.</font></td><td ALIGN="RIGHT" WIDTH="70mm" HEIGHT="4mm"><font size="10" color="#000000">ИНН:</font></td></tr>';
	data1 +='<tr><td WIDTH="70mm" HEIGHT="4mm"><font size="10" color="#ffffff">.</font></td><td WIDTH="50mm" HEIGHT="4mm"><font size="10" color="#ffffff">.</font></td><td align="RIGHT" WIDTH="70mm" HEIGHT="4mm"><font size="10" color="#000000"><b>'+$("#inn").val()+'</b></font></td></tr>';
	data1 +='<tr><td WIDTH="70mm" HEIGHT="4mm"><font size="10" color="#ffffff">.</font></td><td WIDTH="50mm" HEIGHT="4mm"><font size="10" color="#ffffff">.</font></td><td align="RIGHT" WIDTH="70mm" HEIGHT="4mm"><font size="10" color="#000000">Объект:</font></td></tr>';
	data1 +='<tr><td WIDTH="70mm" HEIGHT="4mm"><font size="10" color="#ffffff">.</font></td><td WIDTH="50mm" HEIGHT="4mm"><font size="10" color="#ffffff">.</font></td><td align="RIGHT" WIDTH="70mm" HEIGHT="4mm"><font size="10" color="#000000"><b>'+$("#objectt").val()+'</b></font></td></tr>';
	data1 +='<tr><td WIDTH="190mm" HEIGHT="8mm" ALIGN="CENTER" BORDER="B" BORDERCOLOR="#302060" BORDERWIDTH="1mm"><font size="14" color="#302060"><b>ОПРОСНЫЙ ЛИСТ</b></font></td></tr>';
	data1 +='<tr>';
	data1 +='</tr>';
	//data +='<tr><td width="100mm" BORDER="R" BORDERCOLOR="#000" BORDERWIDTH="0.1mm"><font size="10" color="#000"><b>Общие характеристики</b></font></td><td width="80mm" BORDER="R" BORDERCOLOR="#000" BORDERWIDTH="0.1mm">*</td></tr>';
	data1 +='<tr>';
	data1 +='<td WIDTH="38mm" align="CENTER" BORDER="1" BORDERCOLOR="#000000" BGCOLOR="#f0e8ff" BORDERWIDTH="0.1mm"><font size="10" color="#000000">Тип</font></td>';
	data1 +='<td WIDTH="30mm" align="CENTER" BORDER="1" BORDERCOLOR="#000000" BGCOLOR="#f0e8ff" BORDERWIDTH="0.1mm">Класс напряж., кВ</td>';
	data1 +='<td WIDTH="24mm" align="CENTER" BORDER="1" BORDERCOLOR="#000000" BGCOLOR="#f0e8ff" BORDERWIDTH="0.1mm">Исполнение</td>';
	data1 +='<td WIDTH="30mm" align="CENTER" BORDER="1" BORDERCOLOR="#000000" BGCOLOR="#f0e8ff" BORDERWIDTH="0.1mm">Климатич. исполн.</td>';
	data1 +='</tr>';
	data1 +='<tr>';
	data1 +='<td WIDTH="38mm" align="CENTER" BORDER="1" BORDERCOLOR="#000000" BORDERWIDTH="0.1mm">'+$("#tip option:selected").text()+'</td>';
	data1 +='<td WIDTH="30mm" align="CENTER" BORDER="1" BORDERCOLOR="#000000" BORDERWIDTH="0.1mm">'+$("#napr option:selected").text()+'</td>';
	data1 +='<td WIDTH="24mm" align="CENTER" BORDER="1" BORDERCOLOR="#000000" BORDERWIDTH="0.1mm">'+$("#gab option:selected").text()+($('#gab_nt').prop('checked')?' неточно':'')+'</td>';
	data1 +='<td WIDTH="30mm" align="CENTER" BORDER="1" BORDERCOLOR="#000000" BORDERWIDTH="0.1mm">'+$("#klim_kat option:selected").text()+'</td>';
	data1 +='</tr>';
	data1 +='<tr>';
	data1 +='</tr>';
	data1 +='</table>';
