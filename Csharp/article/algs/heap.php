 <h2>Heap sort</h2>
<p>Jeden z nejefektivnějších řadících algoritmů. Vhodný pro běžné použití, protože má zaručeně neměnnou složitost.
<br>Základní vlastnosti</p>
<ul>	
	<li>Stabilita: <strong>není stabilní</strong></li>
	<li>Složitost: <strong>O(n * log n)</strong></li>
	<li>Paměťová náročnost: <strong>konstantní</strong></li>
	<li>Přirozenost: <strong>není přirozený</strong></li>
</ul>
<h3>Princip řazení</h3>
<p>Máme k dispozici data ve formě pole.<br>
Na pole je nutné koukat jako na haldu (binární strom, hierarchická struktura s max 2 potomky na 1 rodiče). Stěžejní vlastností haldy je jistota, že <strong>každý rodič je vždy větší nebo stejně velký</strong> (nebo vždy menší dle návrhu) <strong>než jeho potomci</strong>.<br>
Na základě tohoto faktu stačí z haldy vždy odebrat Root (prvek, který je na vrcholu pyramidy) s naprostou jistotou, že v haldě nezbyl žádný větší prvek (nebo menší dle návrhu haldy).<br>
Postupně se berou prvky od konce haldy, nahrazují odebrané rooty a dle potřeby obnoví princip haldy (rodič > potomci). Tento postup se opakuje dokud v haldě nezbudou žádná data.<br>
<br>
Existují dva způsoby kam ukládat odebrané rooty.</p>
<ol>
	<li>Zavést nové pole o velikosti neseřazeného a do něj vkládat postupně odebrané prvky -> neefektivní</li>
	<li>Jelikož je halda jen pohled na pole, je možné ho rozdělit na seřazená data a neseřazená.<br>
	<dd>Neseřazená část je ona halda, která se s každým odebraným prvkem zmenšuje. Dále po odebrání prvku je na jeho místo přemístěn poslední prvek neseřazeného pole. Tím vzniká místo na konci pole pro odebraný prvek.</dd>
	<dd>Seřazená část pole jsou odebrané prvky, které se do ní vkládají za sebou tak, jak byly odebrány.</dd>
	</li>
</ol>

<h3>Halda</h3>
<p>Pohled na data, která jsou zapsaná sekvenčně -> za sebou ve formě pole.<br>
Reprezentuje binární strom, kde má každý rodič maximálně dva potomky.<br></p>
<br>Vlastnosti haldy
<ul>	
	<li><strong>Každý rodič má maximálně 2 potomky</strong></li>
	<li><strong>Halda má dva druhy sestavení - od největšího prvku po nejmenší a naopak</strong></li>
	<li><strong>Zaručenost, že každý potomek je dle návrhu haldy vždy větší či stejný než jeho potomci </strong></li>
	<li>Není zaručeno, že jsou potomci vůči sobě ve správném pořadí</li>
</ul>
<p class="center-text" > Špatně x Správně postavená halda </p>
<img src = "images/Heap2.png"><br>
<p class="center-text" > Ukázka hierarchie </p>
<img src = "images/Heap.png">

<h3>Vizualizace</h3>
<img src = "images/Heapsort-example.gif">
Heapsort-example.gif Autor: <a href="//commons.wikimedia.org/w/index.php?title=User:Swfung8&amp;action=edit&amp;redlink=1" class="new" title="User:Swfung8 (page does not exist)">Swfung8</a> – <span class="int-own-work" lang="cs">Vlastní dílo</span> <a title="Creative Commons Attribution-Share Alike 3.0" href="http://creativecommons.org/licenses/by-sa/3.0">CC BY-SA 3.0</a>

<h3>Zdrojový kód</h3>
Zdrojový kód je rozdělen na 3 části
<ol>
	<li>Metoda pro vytvoření pohledu haldy na pole</li>
	<li>Metoda pro odebrání rootu, posunutí posledního prvku pole na jeho místo</li>
	<li>Metoda pro přeorganizování haldy</li>
</ol><br>
<p>Maximum haldy je vždy na indexu 0.<br>
K získání rodiče se využívá vlastností haldy, kde je každý rodič v poli k nalezení na pozici <strong> (i - 1)/2</strong>, kde i je pozice potomka a dělení je celočíselné.<br>
Je-li i rodič, tak jeho potomci jsou na pozici: levý - <strong>2 * i + 1</strong> a pravý - <strong> 2 * i + 2</strong>
 </p><pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">/** řazení haldou (vzestupně)
* @param array pole k seřazeni
*/
public static void Heapsort(int[] array)
{
	// Pro všechny rodiče
	for (int i = array.Length / 2 - 1; i >= 0; i--)
	{
		// Oprav Haldu, aby splňovala své vlastnosti
		RepairTop(array, array.Length - 1, i);
	}
	// Pro všechny prvky v haldě
	for (int i = array.Length - 1; i > 0; i--)
	{
		// Zaměň root s vybraným prvkem, root umísti na vhodnou pozici
		int tmp = array[i];
		array[i] = array[0];
		array[0] = tmp;

		// Oprav haldu, po umístění posledního prvku jako root
		RepairTop(array, i - 1, 0);
	}
}
/**
* Opravuje haldu tak, aby byl rodič vždy větší, či stejný jako potomek
* @param bottom - poslední index nesestřiženého pole
* @param topIndex -aktuálně kontrolovaný rodič
*/
private static void RepairTop(int[] array, int bottom, int topIndex)
{
	// Zapamatuj si aktuálního rodiče
	int tmp = array[topIndex];
	// Zjisti 1. potomka
	int succ = topIndex * 2 + 1;
	// Je potomek ještě v nesestřiženém poli a je větší než jeho sourozenec?
	if (succ < bottom && array[succ] > array[succ + 1]) succ++; // Místo rodiče dosazujeme vždy většího z potomků
	// Dokud není konec haldy a větší z potomků je i větší než otec, tak je vymění
	// Opakujeme pro všechny potomky, aby se halda opravila
	while (succ <= bottom && tmp > array[succ])
	{
		array[topIndex] = array[succ];
		topIndex = succ;
		// Posune ukazatel na 1. potomka dalšího rodiče
		succ = succ* 2 + 1;
		// Opět porovná oba potomky
		if (succ < bottom && array[succ]> array[succ + 1]) succ++;
	}
	// Umístí na správné místo prvek, kvůli kterému se halda opravuje
	array[topIndex] = tmp;
}
</code></pre><br>
<p> <i>Pozn. Tento algoritmus je vhodný zejména díky jeho zaručeně neměnné složitosti. Touto vlastností předčí QuickSort, který v nejhorších případech zaostává.<br>
 </i>
<br><br> Odkazy pro rozšíření daného téma:<br></p>
 <a class="right" href="http://www.itnetwork.cz/algoritmy/razeni/algoritmus-heap-sort-trideni-cisel-podle-velikosti/">ITnetwork</a><br>
 <a class="right" href="https://www.algoritmy.net/article/17/Heapsort" >Algoritmy.net</a>
 

 