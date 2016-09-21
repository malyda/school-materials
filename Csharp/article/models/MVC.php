<h2>Model View Controller (MVC) </h2>
<p>MVC je model, který shlukuje objekty na základě jejich <strong>podobných činností</strong>. 
<br><br>Aby se udržel pořádek ve velkém množství těchto objektů, umísťuje je do tří kategorií:</p>
<ol>
	<li> <b> View </b> <br>
		<dd> Slouží ke zpracování a zobrazení obsahu určeného pro uživatele (UI,UX) </dd> </li>
	<li> <b> Controller </b> <br>
		<dd> Slouží ke zpracování dat, která jsou získána od uživatele pomocí vrstvy View. </dd> </li>
	<li> <b> Model </b> <br>
		<dd> Vrstva obsahující přístup k datům</dd> </li>
</ol>
<p><i>Pozn. rozdělení tříd do vrstev si lze představit jako rozdělení hudby dle toho, kde má hrát: tančeni, relaxační, epická, romantická atd.</i></p>

 <br>
   <img src = "images/MVC-model.png" width='950px' height='400px'><br><br><br><br>
   
    <b>Praktické použití MVC</b> <br>
	<dd> Situace: Webová stránka nabízí textové pole, do kterého uživatel napíše uživatelské jméno. Toto jméno je poté zpracováno a uloženo do SQL databáze.
<ol> Skládá se z částí:
	<li> <b> View </b> <br>
		<dd> HTML zobrazující textové pole </dd> </li>
	<li> <b> Controller </b> <br>
		<dd> Ošetření hodnoty zapsané do textového pole - PHP </dd> </li>
	<li> <b> Model </b> <br>
		<dd> Přístup k databázi - PHP+SQL</dd> </li>
</ol>
   <img src = "images/MVC-prakticky.png" width='950px' height='400px'>

   <br><br><br>
    Z praxe:<ol>
   <li> View nezpracovává data, měla by je pouze zobrazovat. </li>
   <li> Data z modelu by měla být již připravená pro zobrazení </li>
   <li> Může být použito i více vrstev MVC např. mezi View a Controller -> vrstva pro AJAX, mezi Controller a Model -> překladač pro použití na vícero databázích (textové soubory/SQL) atd.</li>
   <li> <a href='http://techportal.inviqa.com/2010/02/22/scaling-web-applications-with-hmvc/'>Kohana framework pro PHP </a> </li>  
   </ol>
   
  Další modely:  <ol>
   <li> MVP - Model, View, Presenter <br>
	<dd> View je statická vrstva. Presenter dynamicky ovlivňuje View např. dynamické formuláře v Nette frameworku. Model je vrstva pro práci s daty. </dd></li>
   <li> Naked Objects <br>
   <dd> Navržení objektů tak, aby každý zastával svou funkci. Jejich použití je přímo podřízeno nejefektivnějšímu způsobu řešení problému. </dd></li>
   </ol></p>