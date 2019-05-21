<h2>Merge sort</h2>
<p class="introduction">
Algoritmus fungující na principu rozděl a panuj (nejde-li daný problém řešit, rozložíme ho na menší již řešitelné části). <br>
Pole rozděluje po polovinách tak dlouho, dokud nezbudou pouze jednotková pole. Pole o jednom prvku můžeme automaticky považovat za seřazené.<br>
Poté stačí rozdělená pole spojit do jednoho ve správném pořadí.<br>
<br>Základní vlastnosti:</p>
<ul>
	<li>Stabilita: <strong>stabilní</strong></li>
	<li>Složitost: <strong>O(n * log n)</strong></li>	
	<li>Paměťová náročnost: <strong>dle počtu prvků v poli</strong></li>
	<li>Přirozenost: <strong>přirozený</strong></li>	
</ul>
<h3>Princip řazení</h3>
<p>Princip činnosti lze rozdělit do dvou aktivit:</p>
<ol>
	<li><strong>Rozdělování </strong>polí</li>
	<li><strong>Slévání</strong> rozdělených polí ve správném pořadí</li>
</ol>

<ol>
	<h4><li>Rozdělování pole</h4>
	<p>K dispozici máme jedno pole, které je potřeba seřadit. Toto pole rozdělíme na dvě poloviny (nevadí, že u lichých polí bude jedna část větší). Tyto dvě poloviny se opět rozdělí na další 2 (celkem tedy 4 části).<br>
	Tento postup opakujeme až do doby, kdy vzniknou pouze pole o jednom prvku (jednotková) a dělení se zastaví.<br><br>
	<i>Pozn. při prvním dělení vznikají dvě hlavní větve</i></p>
	</li>
	<h4><li>Slévání polí dohromady</h4>
	<p>K dispozici máme vždy dvě pole. V 1. kroku jsou to pole jednotková (ta, která vznikla po dělení). U každého ze dvou polí si musíme pamatovat indexy prvku, který čteme.<br>
	</p><strong>Porovnáváme hodnoty dle indexů</strong>, vybraný prvek umístíme do pomocné pomocného pole na pozici určenou <strong>součtem indexů</strong>, index u vybraného prvku posuneme o 1.<br>
	<br>
		<p class="center-text">Jednoprvková pole</p>
	<table >
	  <tr>
		<th>Index</th>
		<td>0</td>
	  </tr>
	  <tr>
		<th>1. pole</th>
		<td>1</td>		
	  </tr>
	  <tr>
		<th>2. pole</th>
		<td>0</td>		
	  </tr>
	</table>
	<br> 
	<p>Mějme indexy 1. prvků z obou polí, jménem index1 a index2. Obě tyto proměnné jsou rovny nule.<br>
	Je prvek  1. pole na indexu[index1] > než prvek 2. pole na indexu[index2]? => <strong>1 > 0 ?</strong><br>
	Jedna je větší než nula. Spočítáme součet indexů, tedy index1 + index2. Výsledkem je nula, což je zároveň index v pomocném poli.<br>
	Prvek, který prošel podmínkou (hodnota 1) umístíme na místo součtu indexů ( = 0 ) a přičteme k index1 +1, tento prvek <strong> odstraníme </strong> z původního pole.</p>
	<p class="center-text">Pomocné pole</p>
	<table>
	  <tr>
		<th>Index</th>
		<td>0</td>
		<td>1</td>	
	  </tr>
	  <tr>
		<th>Pom. pole</th>
		<td  class="blue">1</td>		
		<td></td>

	  </tr>
	</table><br>
	<p>Protože nám zbyl už jen jeden prvek ( 0), zařadíme ho na konec pomocného pole. Čímž vzniklo seřazené pole.</p>
<p class="center-text">Pomocné pole</p>
	<table >
	  <tr>
		<th>Index</th>
		<td>0</td>
		<td>1</td>	
	  </tr>
	  <tr>
		<th>Pom. pole</th>
		<td >1</td>		
		<td  class="blue">0</td>
	  </tr>
	</table><br>
	<p>Tento postup se opakuje, dokud nezůstane jedno seřazené pole.</p>
	<br>
	
	<p class="center-text">Po slití jednoprvkových polí</p>
	<table >
	  <tr>
		<th>Index</th>
		<td>0</td>
		<td>1</td>	
	  </tr>
	  <tr>
		<th>1. pole</th>
		<td>1</td>		
		<td>0</td>
	  </tr>
	  <tr>
		<th>2. pole</th>
		<td>40</td>		
		<td>3</td>
	  </tr>
	</table><br>
	<p>Je 1 > 40 ? Ne, není.<br>
	Součet indexů = 0<br>
	Umístíme hodnotu 40 na pozici 0, přičteme k index2 + 1 ( = 1 ) a 40 z původního pole odstraníme.</p>
	<br>
	<p class="center-text">Pomocné pole</p>
	<table >
	  <tr>
		<th>Index</th>
		<td>0</td>
		<td>1</td>	
		<td>2</td>	
		<td>3</td>	
	  </tr>
	  <tr>
		<th>Pom. pole</th>
		<td class="blue">40</td>		
		<td></td>
		<td></td>
		<td></td>
	  </tr>
	</table>
<br>
	<p>index1 = 0 a index2 = 1<br>
	Je pole1[index1] > pole2[index2] ? => 1 > 3 ?<br>
	Součet indexů = 1<br>
	Ne, není.<br>
	Umístíme hodnotu 3 na pozici 1, přičteme k index2 + 1 ( = 2 ) a 3 z původního pole odstraníme.</p>
	<p class="center-text">Pomocné pole</p>
	<table >
	  <tr>
		<th>Index</th>
		<td>0</td>
		<td>1</td>	
		<td>2</td>	
		<td>3</td>	
	  </tr>
	  <tr>
		<th>Pom. pole</th>
		<td>40</td>		
		<td class="blue"> 3 </td>
		<td></td>
		<td></td>
	  </tr>
	</table><br>
	<p>Tím jsme vyčerpali 2. pole a na konec pomocného přidáme zbývající prvky z 1. pole a vzniklo slité seřazené pole.<br></p>
		<p class="center-text">Pomocné pole</p>
	<table >
	  <tr>
		<th>Index</th>
		<td>0</td>
		<td>1</td>	
		<td>2</td>	
		<td>3</td>	
	  </tr>
	  <tr>
		<th>Pom. pole</th>
		<td>40</td>		
		<td> 3 </td>
		<td class="blue"> 1 </td>
		<td class="blue"> 0</td>
	  </tr>
	</table><br>
	</li>
</ol>

<br><br>
<h3>Vizualizace</h3>
<img src="images/Merge.png" class="center">
<h3>Zdrojový kód</h3>
<p>Zdrojový kód je stejně jako postup algoritmu rozdělen na dvě části:</p>
<ol>
	<li>Metoda na dělení pole na dvě části</li>
	<li>Metoda na slití dvou polí do jednoho setříděného</li>
</ol><br>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">// Rozdělení polí
public static void merge_sort(int[] list)
{
	if (list.Length <= 1) return; // Ukončení rekurze
	int center = list.Length / 2; // Zjištění středu pole, kvůli určení poloviny

	int[] left = new int[center]; // deklarace a inicializace levé větve
	for (int i = 0; i < center; i++) left[i] = list[i];

	int[] right = new int[list.Length - center]; // deklarace a inicializace pravé větve
	for (int i = center; i < list.Length; i++) right[i - center] = list[i];

	merge_sort(left); // rekurzivní rozdělení polí na další poloviny
	merge_sort(right);
	merge(list, left, right); // sliti rozdělených polí
}


// Slití dvou polí do jednoho
// Parametry levá a pravá větev a celé pole, do kterého se dosadí slité pole
public static void merge(int[] list, int[] left, int[] right)
{
	// Indexy pro obě pole
	int i = 0; // index pro 1. pole
	int j = 0; // index pro 2. pole

	// Dokud neprojde jedno celé pole
	while ((i < left.Length) && (j < right.Length))
	{
		// Vybrání menšího prvku, jeho dosazení do pole, posunutí indexu
		if (left[i] < right[j])
		{
			list[i + j] = left[i];
			i++;
		}
		else
		{
			list[i + j] = right[j];
			j++;
		}
	}

	// Zbytek z druhého pole přidáme za 1. seřazené pole
	if (i < left.Length)// identifikace levé větve pole
	{
		while (i < left.Length)
		{
			list[i + j] = left[i];
			i++;
		}
	}
	else // práce jen s pravou větví pole
	{
		while (j < right.Length)
		{
			list[i + j] = right[j];
			j++;
		}
	}
}
</code></pre><br><br>
<p><i>Pozn. problémem tohoto algoritmu je nutnost pomocné paměti pro každé provedení funkce</i>
<br><br> Odkazy pro rozšíření daného téma:<br></p>
 <a  href="http://www.itnetwork.cz/algoritmy/razeni/algoritmus-merge-sort-trideni-cisel-podle-velikosti/">itnetwork.cz</a>
 <a  href="https://www.algoritmy.net/article/13/Merge-sort" >Algoritmy.net</a>
 