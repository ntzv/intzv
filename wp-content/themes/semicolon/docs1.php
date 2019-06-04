<a href="https://intzv.ru/wp-content/uploads/ti/0.ntz.135-001-ti-tol-ntz-10-20-35-uhl2-t2.pdf">Техническая информация ТОЛ-НТЗ-10 (20, 35)</a>
<a href="https://intzv.ru/wp-content/uploads/re/0.ntz.142.001-re-tol-ntz-10.pdf">Руководство по эксплуатации ТОЛ-НТЗ-10</a>
<h3>CAD модели</h3>
<a href="https://intzv.ru/wp-content/uploads/2d/2d-tol-ntz-10-11.zip">Габаритный чертеж ТОЛ-НТЗ-10-11</a>
<a href="https://intzv.ru/wp-content/uploads/2d/2d-tol-ntz-10-12.zip">Габаритный чертеж ТОЛ-НТЗ-10-12</a>
<a href="https://intzv.ru/wp-content/uploads/2d/2d-tol-ntz-10-13.zip">Габаритный чертеж ТОЛ-НТЗ-10-13</a>

<a href="https://intzv.ru/wp-content/uploads/3d/3d-tol-ntz-10-11.zip">3D модель ТОЛ-НТЗ-10-11</a>
<a href="https://intzv.ru/wp-content/uploads/3d/3d-tol-ntz-10-12.zip">3D модель ТОЛ-НТЗ-10-12</a>
<a href="https://intzv.ru/wp-content/uploads/3d/3d-tol-ntz-10-13.zip">3D модель ТОЛ-НТЗ-10-13</a>
<script language="javascript" type="text/javascript">
var zavod = '';
var typ = '';
	
$ = window.jQuery;	
$(document).ready(function(){
  $('#zavod').change(function(){	
	zavod = this.options[this.selectedIndex].value; 
	seldata = '<option value="">...</option>';
    $.ajax({
      type: "POST",
      url: "/wp-content/themes/semicolon/res2sel.php",
      //data: "table="+ encodeURIComponent("analogs") + '&column0='+ encodeURIComponent("*") + '&case='+ encodeURIComponent("zavodeq'СЭЩ'"),
      data: "table=analogs&column0=id&column1=oboznach&case=dopoln_eq_"+zavod,
      success: function(data){
        $("#typ").html(seldata+data);
      }
    });
  return false;
  });

  $('#typ').change(function(){	
	typ = this.options[this.selectedIndex].text; 
	tabheader = '<table style="max-width:100%;"><tr><th>Производитель</th><th>Обозначение</th><th>Наш аналог</th><th>Вариант</th><th>Характеристики</th><th>Габариты</th><th>Примечание</th></tr>';
    $.ajax({
      type: "POST",
      url: "/wp-content/themes/semicolon/res2taba.php",
      //data: "table="+ encodeURIComponent("analogs") + '&column0='+ encodeURIComponent("*") + '&case='+ encodeURIComponent("zavodeq'СЭЩ'"),
      data: "table=analogs&column0=zavod&column1=oboznach,analog,variant,harakter,gabarit,massa&case=oboznach_eq_'"+typ+"'",
      success: function(htmldata){
		  //alert("table=analogs&column0=zavod&column1=oboznach,analog,variant,harakter,gabarit,massa&case=oboznach_eq_'"+typ+"'");
        $("#dbcontent").html(tabheader+htmldata+'</table>');
      }
    });
  return false;
  });	
	
});

</script>