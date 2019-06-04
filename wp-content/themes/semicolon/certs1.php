<div id="certs" >
	
<a href="https://intzv.ru/wp-content/uploads/doc/deklaracija-o-sootvetstvii+protokol-tol-ntz-10-20-35.pdf">Декларация о соответствии ТОЛ-НТЗ-10 (20, 35)</a>
<a href="https://intzv.ru/wp-content/uploads/doc/svidetelstvo-ob-utverzhdenii-tipa-sredstv-izmerenij-tol-ntz.pdf">Свидетельство об утверждении типа СИ ТОЛ-НТЗ</a>
<a href="https://intzv.ru/wp-content/uploads/doc/ot-si-tol-ntz.pdf">Описание типа CИ ТОЛ-НТЗ</a>
<a href="https://intzv.ru/wp-content/uploads/doc/udostoverenie-odobrenija-tipa-sredstv-izmerenija-tol-bolgarija.pdf">Удостоверение одобрения типа СИ в Республике Болгария</a>
<a href="https://intzv.ru/wp-content/uploads/doc/sertifikat-ob-utverzhdenii-tipa-sredstv-izmerenij-rb-nolp-tshl-tpl-tol-znolp.pdf">Сертификат об утверждении типа СИ в Республике Беларусь</a>
<a href="https://intzv.ru/wp-content/uploads/doc/sertifikat-o-priznanie-utverzhdenija-tipa-sredstva-izmerenija-tol-ntz-kaz.jpeg">Сертификат о признании утверждения типа СИ в Республике Казахстан</a>
<a href="https://intzv.ru/wp-content/uploads/doc/sertifikat-utverzhdenija-tipa-si-tur-tol-ntz.pdf">Сертификат утверждения типа СИ в Туркменистане</a>
<a href="https://intzv.ru/wp-content/uploads/doc/sertifikaty-priznanija-utverzhdennogo-tipa-si-uz-tol-ntz.pdf">Сертификат признания утверждённого типа СИ в Республике Узбекистан</a>
<a href="https://intzv.ru/wp-content/uploads/doc/sertifikat-o-priznanie-utverzhdeniya-tipa-si-taj-tol-ntz.pdf">Сертификат о признании утверждения типа СИ в Таджикистане</a>
<a href="https://intzv.ru/wp-content/uploads/doc/sertifikat-ob-utverzhdenii-tipa-sredstv-izmerenij-tol-ntz-arm.pdf">Сертификат об утверждении типа СИ в Республике Армения</a>
<a href="https://intzv.ru/wp-content/uploads/doc/sertifikat-o-priznanii-ut-si-tol-ntz-kgz.pdf">Сертификат об утверждении типа СИ в Киргизии</a>
<a href="https://intzv.ru/wp-content/uploads/doc/sertifikat-sootvetstvija-trebovanijam-pozharnoj-bezopasnosti-tol-ntz-10-20-35.pdf">Сертификат пожарной безопасности</a>
<a href="https://intzv.ru/wp-content/uploads/doc/attestacija-fsk-tol.pdf">Заключение аттестационной комиссии на соответствие техническим требованиям ПАО «Россети»</a>
<a href="https://intzv.ru/wp-content/uploads/doc/akt-o-podtverzhdenii-rascheta-urovnja-lokalizacii-tol-ntz-10-utv.pdf">Акт локализации РЖД</a>
</div>
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