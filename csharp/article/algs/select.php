<h2>Selection sort</h2>
<p class="introduction">Algoritmus, který využívá základní vlastnosti posloupnosti hodnot, kde je jedna hodnota různá od následující dle stálého pravidla</p>
<p>Např. řazení od nejmenšího prvku po největší znamená, že nejmenší prvek je jako první. Větší prvek než první, ale menší než třetí je druhý atd.<br>
Na základě této vlastnosti stačí nalézt vhodný prvek a zařadit jej na správné místo.</p>
<br>Základní vlastnosti
<ul>
	<li>Stabilita: <strong>nestabilní</strong></li>
	<li>Složitost: <strong>O(n^2)</strong></li>	
	<li>Paměťová náročnost: <strong>konstantní</strong></li>
	<li>Přirozenost: <strong>přirozený</strong></li>
</ul>
<h3>Princip řazení</h3>
<p>Máme k dispozici data ve formě pole.<br>
Algoritmus čte pole tolikrát, kolik má prvků. Nejprve <strong>zvolíme 1. prvek pole jako pivot</strong> (prvek, se kterým ostatní prvky porovnáváme) a poté <strong>hledáme prvek, který je větší</strong> (dle řazení), najdeme-li takový<strong>, určíme ho jako pivot</strong>. Tímto způsobem najdeme největší prvek v poli.<br>
Po přečtení celého pole <strong>provedeme záměnu  1. prvku s nalezeným největším prvkem</strong> v poli (poslední pivot).<br>
Abychom seřadili celé pole, je nutné tento postup opakovat tolikrát, kolik má pole prvků. Můžeme s jistotou říci, že po provedení záměny, je již daný prvek správně zařazen, proto ho nemusíme znovu určovat jako pivot a jednoduše určíme jako pivot prvek následující.<br><br>
</p><h3>Vizualizace</h3>
<ul>
	<li>Menší ze dvou prvků se barví do Červená a posouvá se doprava.</li>
	<li>Některé prvky zůstanou po seřazení červené, to je dáno právě stabilitou algoritmu, kde stejné prvky nejsou zpracovávány a dochází k jejich přeskočení. Tyto prvky byly posunuty rovnou na správné místo.</li>
	<li>Některé prvky si po určitou dobu zachovají bílou barvu, to je dáno tím, že v dané chvíli byly již správně seřazeny a mohly být tedy přeskočeny. Některé z nich jsou bílé po celou dobu řazení, to znamená, že jsou již od začátku algoritmu na správném místě -> <strong>řada je částečně seřazená => algoritmus je přirozený</strong>.</li>
</ul>
 <iframe class="center" src="article/algs/animation.php#select" style="height: 300px;width:650px;" id="iframe"></iframe> <br>
<h3>Zdrojový kód</h3>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">// Proveď pro cele pole
for(int i = 0; i < array.Length-1; i ++)
{
	// Urči pivot
	int pivot = i;

	// Pro cele pole od prvku určený jako pivot
	for(int j = i+1; j < array.Length; j ++)
	{
		// Najdi prvek vetší než pivot a určí ho jako novy pivot
		if (array[j] > array[pivot]) pivot = j;
	}
	// Záměna posledního pivota s prvním pivotem
	int temp = array[pivot];
	array[pivot] = array[i];
	array[i] = temp;
}
</code></pre>
<p>Stabilní verzí je: <a href="https://en.wikipedia.org/wiki/Selection_sort">Bing sort</a><br>
<br><br>
<i>Pozn. V obecném měřítku je rychlejší než Bubble sort, ale pomalejší než Insertion sort.<br>
Vhodný pokud situace vyžaduje co nejméně zápisů do paměti např. řazení souborů na SSD disku nebo jiné paměti.</i>
<br><br> Odkazy pro rozšíření daného téma:<br></p>
 <a  href="http://www.itnetwork.cz/algoritmy/razeni/algoritmus-selection-sort-razeni-cisel-podle-velikosti/">ITnetwork</a>
 <a  href="https://www.algoritmy.net/article/4/Selection-sort">Algoritmy.net</a>