<h2>Quick sort</h2>
<p class="introduction">Algoritmus fungující na principu rozděl a panuj (nejde-li daný problém řešit, rozložíme ho na menší již řešitelné části). <br>
V současnosti se jedná o jeden z nejrychlejších univerzálních řadících algoritmů.
<br>Základní vlastnosti</p>
<ul>
	<li>Stabilita: <strong>nestabilní</strong></li>
	<li>Složitost: <strong>O(n * log n)</strong></li>	
	<li>Paměťová náročnost: v nejhorším případě <strong>lineární</strong>, po optimalizacích dodatečnou paměť skoro nepotřebuje</li>
	<li>Přirozenost: <strong>není přirozený</strong></li>	
</ul>
<h3>Princip řazení</h3>
<p>Základní myšlenkou tohoto algoritmu je práce s pivotem. Pivot je jeden z prvků neseřazeného pole, se kterým porovnáváme okolní prvky. <br>
Principiálně je postup takový:</p>
<ul>
	<li>Zvolíme pivot</li>
	<li>Seřazení pole na prvky např. menší vlevo a větší vpravo od pivota tak, že se vymění pivot s vhodným prvkem </li>
	<li>Poté se vlevo i vpravo zvolí další pivoty a okolo nich se pole opět přeskupí</li>
	<li>Algoritmus končí ve chvíli, kdy pro volbu pivota zbyla pouze jednoprvková pole</li>
</ul>
<p>Činnost algoritmu je tedy rozdělena na dvě části a opakování:</p>
<ul>
	<li>Volba pivota</li>
	<li>Seřazení okolí vůči pivotu</li>
	<li>Opakování celého postupu pro části vlevo i vpravo od pivota</li>
</ul>
<ol><h4><li>Volba pivota</h4>
<p>Využívá se několik způsobů volby.</p>
<ul>
	<li>Nejjednodušší je zvolit náhodný prvek. Tento způsob je efektivní a často používaný.</li>
	<li>Sofistikovanější způsob je zvolit vždy prostřední prvek, nebo jemu blízký. Tím je možné dosáhnout nejefektivnější složitosti algoritmu</li>
</ul> <br> <br>
<p><i> Pozn.  u většiny algoritmů, které dělí pole, je nejlepší pole rozdělovat pokud možno na poloviny</i></p>
</li>
<h4><li>Seřazení okolí pivota</h4>
<p>Všechny prvky v okolí pivota se s daným pivotem porovnají a umístí se buď vlevo nebo vpravo od něj. Na pořadí nezáleží.</p>
</li>
<h4><li>Opakování postupu</h4>
<p>Po volbě pivota a přeskupení prvků vlevo a vpravo od něj se rozdělilo původní pole na dvě části. Pro každou část opakuje znovu všechny kroky, tedy v každé části zvolíme pivot a opět pole přeskupíme. <br>
Postupným dělením vstupního pole ve výsledku zůstanou pouze jednoprvková pole a v tu chvíli je již celé pole seřazené a algoritmus končí. <br>
Nevýhodou může být při neefektivní volbě pivota vzrůstající paměťová náročnost.</p>
</li>
</ol>
<h3>Vizualizace</h3>
<img src = "images/QuickSoer.png">

<h3>Zdrojový kód</h3>
<p>Zdrojový kód je stejně jako postup algoritmu rozdělen na dvě části:</p>
<ol>
	<li>Metoda na dělení pole na dvě části, která umisťuje prvek na správné místo a vrací jeho pozici - Partition(pole, zacatekLevehoPole, konecPravehoPole)</li>
	<li>Metoda pro rekurzivní volání dělení pole na části a hledání pivota - QuickSort_Recursive(pole, zacatekLevehoPole, konecPravehoPole)</li>
</ol><br>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">/// Rozdělí pole na dvě části, seřadí je a celou proceduru opakuje
/// <param name="arr">Pole k seřazení</param>
/// <param name="left">Začátek části pole</param>
/// <param name="right">Konec části pole</param>
public static void QuickSort(int[] arr, int left, int right)
{
	// Rekurze se zastaví pokud je začátek a konec pole stejný => jednoprvková nebo prázdná pole
	if (left < right)
	{
		// Rozdělení pole na dvě části a získání pivota
		int partitionIndex = Partition(arr, left, right);
	   
		// Opakování pro obě části pole => rekurze
		QuickSort(arr, left, partitionIndex - 1);
		QuickSort(arr, partitionIndex + 1, right);
	}
}
/// Určí pivot, podle něj rozdělí pole na dvě části
/// <param name="arr">Pole k seřazení</param>
/// <param name="left">Začátek části pole - index</param>
/// <param name="right">Konec části pole - index</param>
/// <returns>Vrací pozici pivota</returns>
private static int Partition(int[] arr, int left, int right)
{
	// Pivo je poslední prvek
	int pivot = arr[right];
	int temp;
	// Začátek pole
	int i = left;
	// Pro celou část pole
	for (int j = left; j < right; j++)
	{
		// Porovnání hodnoty s pivotem
		if (arr[j] <= pivot)
		{
			// Pokud je prvek menší než pivot, tak je vymění
			temp = arr[j];
			arr[j] = arr[i];
			arr[i] = temp;
			i++;
		}
	}
	arr[right] = arr[i];
	arr[i] = pivot;
	return i;
}
</code></pre>
<p><i>Pozn. Velká rychlost algoritmu je vyvážena jeho neefektivností na částečně seřazených polích</i><br>
<br>Vylepšenou verzí je QuickSort 3, který rozděluje pole na menší, stejné a větší prvky.
<br><br> Odkazy pro rozšíření daného téma:<br></p>
 <a class="right" href="http://www.itnetwork.cz/algoritmy/razeni/algoritmus-quick-sort-razeni-cisel-podle-velikosti/">ITnetwork</a><br>
 <a class="right" href="https://www.algoritmy.net/article/10/Quicksort" >Algoritmy.net</a>
