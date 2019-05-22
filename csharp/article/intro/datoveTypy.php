<h2>Datové typy</h2>
<p class="introduction">Určují, jakých hodnot smí nabývat proměnná. Dělí se na základní datové typy a na ty, které skládají vícero primitivních a vytváří tak nové.</p>
<H3> Primitivní datové typy </H3>
<p>Jsou takové datové typy, které <strong>se neskládají z jiných datových typů</strong>.<br>
Primitivní datové typy, které mohou být použity v C#.</p>
<ul>
	<li> char    - jeden znak </li>
	<li> int     - celá čísla (32bit)</li>
	<li> double  - desetinná čísla s plovoucí desetinnou čárkou (64bit)</li>
	<li> decimal - celá čísla (128bit)</li>
	<li> void    - žádná hodnota</li>
	<li> boolean - true/false, někdy je možné reprezentovat jako bit - 0/1</li>
</ul>
<p>Rozdíl mezi double/float a decimal</p>
<ul>
	<li> float/double jsou reprezentovány (uloženy) v binární podobě </<li>
	<li> decimal je uložen jako desetinné číslo - nedochází k tak velké odchylce při ukládání</<li>
	<li> Decimální datové typy jsou kontrolovány vetšinou IDE, tak aby nedošlo k přetečení jejich minimální nebo maximální hodnoty</<li>
</ul>
<H3>Referenční datové typy </H3>
<p><strong>Vznikají použitím datové struktury, nebo třídy</strong>.<br>
Referenční -> používají odkaz(referenci) na jiný objekt.</p>
<p>Příklady:<br>
	<dd> Třída String: jedná se o statickou třídu, která implementuje pole (array) datového typu char.<br>
	<dd> Oproti struktuře String v C/C++ obohacuje String ještě o metody např. lenght;contains...<br> 
	<td> Třída Auto může obsahovat pocetKol(int), nazevAuta(String) a jiné</td></p>
</p>
<i>Pozn. jakékoliv pole je děděné z třídy Object a tak je referenční datový typ.</i>