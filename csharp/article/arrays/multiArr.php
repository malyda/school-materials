<h2>Vícerozměrná pole</h2>
<p class="introduction"> Vícerozměrné pole je doslova pole polí, kde každý jeden prvek obsahuje další pole.<br>
Např. dvourozměrné pole obsahuje navíc pouze jedno pole. Lze si ho představit jako tabulku, kde každý jeden řádek obsahuje sloupce.</p>
<p>Rozlišujeme dva typy vícerozměrných polí:</p>
<ul>
	<li><strong>Pravidelná</strong> (maticová) - pole, kde jsou všechna pole stejně velká -> tabulka 3x3, 8x8, 50x50</li>
	<li><strong>Nepravidelná</strong> (zubatá) - pole, kde se délky jednotlivých polí svou délkou liší -> tabulka 2x8, 50x3</li>
</ul> </p>
<h3>Reprezentace vícerozměrných polí</h3>
<strong>Skříně a šuplíky</strong>

<p>Jednorozměrné pole si můžeme představit jako skříň plnou šuplíků.<br>
Dvourozměrné pole jako pokoj plný těchto skříní.<br>
Trojrozměrné jako dům plný pokojů, v nich skříně, které obsahují šuplíky.<br><br></p>
<div style="text-align:center"> Skříň se šuplíky </div>
<img src = "images/Skrin.png" style="width:200px; height:200px;" class="center"><br>

<strong>Graf</strong><br>
<p>Můžeme zvolit i reprezentaci grafickou.<br>
Jednorozměrné pole je graf s osou x.<br>
Dvourozměrné pole je graf s osou x a y<br>
Trojrozměrné pole je graf os x, y a z<br><br></p>
<br>
<div style="text-align:center">Příklad dvourozměrného pole při použití grafu</div><br>
<img src = "images/graf.png"><br><br>

<strong>Tabulka</strong><br>
<p>Tabulka je vhodná zejména pro jednorozměrná a dvojrozměrná pole.<br>
Jednorozměrné pole si lze představit jako tabulku o jednom řádku a několika sloupcích.<br><br> <br></p>
<div style="text-align:center">Jednorozměrné pole</div>
<div >
<table class="table-basic">
  <tr>
    <th>Index</th>
	<td>0</td>
	<td>1</td>	
	<td>2</td>	
	<td>3</td>	
	<td>4</td>		
  </tr>
  <tr>
    <th>Hodnota</th>
    <td>1</td>		
    <td>50</td>
	<td>150</td>
	<td>2</td>
	<td>0</td>
  </tr>
</table>
</div>
<br><br>
<p>Dvojrozměrné pole si lze představit jako tabulku o více řádcích.<br><br>
<br><div style="text-align:center">Dvojrozměrné pole</div></p>

<table class="table-basic">
  <tr>
    <th>Indexy/<br>Hodnoty</th>
    <td>0</td>		
    <td>1</td>
	<td>2</td>
	<td>3</td>
  </tr>
  <tr>
    <td>0</td>
    <td>Smith</td>
	<td class="blue">William</td>		
    <td>50</td>
	<td>1</td>
  </tr>
  <tr>
    <td>1</td>
    <td>Jackson</td>
	<td>Kate</td>		
    <td>94</td>
	<td>400</td>
  </tr>
  <tr>
    <td>2</td>
    <td>Doe</td>
	<td>Mark</td>			
    <td>30</td>
	<td>90</td>
  </tr>
    <tr>
    <td>3</td>
    <td>Defoe</td>
	<td>Kuba</td>		
    <td>80</td>
	<td>100</td>
  </tr>
</table>
<p><br>Pro identifikaci vybraného prvku použijeme souřadnicový systém jako u grafů, kde <strong>nejdříve specifikujeme řádek a poté sloupec</strong>.<br>
Pro výběr jména William použijeme souřadnice: [ 0, 1 ] -> řádek č. 0 a sloupec č. 1.<br><br>
<i>Pozn. Při SQL dotazování na tabulku postupujeme podobně, zajímá nás záznam (řádek) a v něm konkrétní sloupec.</i></p>
<br>
<h3>Deklarace 2D pole</h3>
<p>Deklarace dvojrozměrného pole je podobná jako deklarace jednorozměrného pole, vlastně se jedná pouze o jeho rozšíření.<br>
Deklarace celočíselného pole o 50 řádcích a 50 sloupcích.</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">int[,] dvojrozmernePole = new int [50, 50];
</code></pre><br>
<h3>Přístup k prvkům 2D pole</h3>
<p>Stejně jako u jednorozměrného pole se k prvkům přistupuje pomocí indexů. Jen je zapotřebí indetifikovat dvě hodnoty místo jedné.<br>
Pro představu tabulky lze uvést orientaci v poli jako identifikaci řádku a poté sloupce.<br>
Přístup k 2. prvku v 1. řádku (řádek č. 0):</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">int[,] dvojrozmernePole = new int [50, 50];
dvojrozmernePole[0, 2] = 50;
</code></pre><br>
<h3>Procházení 2D pole</h3>
<p>Oproti jednorozměrnému poli přibyla jedna proměnná v součtu jsou tedy 2. Přesně tolik cyklů potřebujeme na průchod celým polem.<br><br>
<i>Pozn. čím více rozměrů, tím více cyklů je potřeba.</i><br><br>
Průchod celým polem a jeho vypsání do konzole:
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">int[,] dvojrozmernePole = new int[3, 3];
dvojrozmernePole[0, 2] = 5;
for(int i = 0; i < dvojrozmernePole.GetLength(0); i ++)
{
	for( int f = 0; f < dvojrozmernePole.GetLength(1); f++)
	{
		Console.Write(dvojrozmernePole[i, f]);
	}
	Console.WriteLine();
}
</code></pre>
Důležité je znát metodu <strong>GetLength()</strong>, která vrací počet prvků na danou dimenzi, kde 0 = 1. dimenze -> řádky; 1  = 2. dimenze -> sloupce.</p><br>
<h3>Používání vícerozměrných polí</h3><br>
<p>Pole o více rozměrech se chová stejně jako 2D pole, jen jsou vždy větší o určitý počet dimenzí (rozměrů).<br>
Příklad 4D pole - naplnění:
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">int[,,,] ctyrrozmernePole = new int[5, 10, 3, 8];
// Iterace 1. dimenze
for(int i = 0; i< ctyrrozmernePole.GetLength(0); i++)
{
	// Iterace 2. dimenze
	for (int j = 0; j < ctyrrozmernePole.GetLength(1); j++)
	{
		// Iterace 3. dimenze
		for (int g = 0; g < ctyrrozmernePole.GetLength(2); g++)
		{
			// Iterace 4. dimenze
			for (int h = 0; h < ctyrrozmernePole.GetLength(3); h++)
			{
				ctyrrozmernePole[i, j, g, h] = h;
			}
		}
	}
}
</code></pre><br>
<p><i>Pozn. počet D = počtu cyklů a proměnných. 4D pole -> 4 cykly, 4 proměnné (i,j,g,h)</i></p>
