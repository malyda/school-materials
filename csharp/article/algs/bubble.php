<h2>Bubble sort</h2><br>
<p class="introduction">Algoritmus na základě představy stoupajících bublinek.</p>
<p>Nejlehčí bublinky stoupají ke hladině vody rychleji než těžké, proto v určitou chvíli můžeme s jistotou říci, že nejlehčí bublinky budou u hladiny jako první a těžké budou oproti nim stále u dna. Z toho plyne domněnka, že se bublinky samy seřadí dle hmotnosti (velikosti).
<br>Základní vlastnosti</p>
<ul>	
	<li>Stabilita: <strong>stabilní</strong></li>
	<li>Složitost: <strong>O(n^2)</strong></li>
	<li>Paměťová náročnost: <strong>konstantní</strong></li>
	<li>Přirozenost: <strong>přirozený</strong></li>
</ul>
<h3>Princip řazení</h3><br>
Máme k dispozici data ve formě pole.<br>
Algoritmus čte pole tolikrát, kolik má prvků. Každý prvek se porovná se sousedním prvkem a v případě potřeby se provede jejich záměna. Tímto způsobem dostaneme jeden prvek na konec pole -> <strong>máme jistotu, že je daný prvek největší, nebo nejmenší z celého pole</strong>.<br>
Seřadili jsme pouze jeden prvek, proto celý postup <strong>opakujeme tolikrát, kolik má pole prvků mínus počet již správně seřazených</strong> prvků.<br>
Počet cyklů se tedy snižuje s počtem již seřazených prvků -> seřazené prvky již nemusíme znovu kontrolovat.<br>
<h3>Vizualizace</h3><br>
<ul>
	<li>Větší ze dvou prvků se barví do červená, menší je zelený</li>
	<li>Některé prvky zůstanou i po seřazení zelené, to je dáno právě stabilitou algoritmu, kde stejné prvky nejsou zpracovávány a dochází k jejich přeskočení.</li>
	<li>Některé prvky si po určitou dobu zachovají bílou barvu, to je dáno tím, že v dané chvíli byly již správně seřazeny a mohly být tedy přeskočeny.</li>
	<li>Limita cyklu se posouvá s počtem již seřazených prvků.</li>
	<li>Šipka ukazuje na aktuálně největší prvek a po skončení řazení stále ukazuje na poslední prvek, který byl řazen.</li>
</ul>
 <iframe class="center" src="article/algs/animation.php#bubble" style="height: 300px;width:650px;" id="iframe"></iframe> <br>
<h3>Zdrojový kód</h3><br>
 <pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">// Proved pro cele pole
for(int i = 0; i < array.Length-1; i++)
{
	// Proved pro cele pole - pocet serazenych
	for(int j = 0; j < array.Length - i - 1; j++)
	{
		// Radime vzestupně
		if(array[j+1] < array[j])
		{
			// Záměna prvku
			int temp = array[j];
			array[j] = array[j + 1];
			array[j + 1] = temp;
		}
	}
}
</code></pre>
<p>Tento algoritmus je vhodný zejména kvůli jeho jednoduché implementaci. Spíše než k praktickému použití při řazení se hodí k účelům výuky algoritmizace.</p>
<p><i>Pozn. Nevýhodou tohoto algoritmu je například: situace, kde je nejnižší prvek na konci seznamu. Takový prvek je nutné porovnat se všemi předchozími prvky, než se dostane na své místo. Takový problém vyřešil <a href="https://www.algoritmy.net/article/93/Shaker-sort"> Shaker sort </a>.
 </i></p><br>
<p>Odkazy pro rozšíření daného téma:<br>
 <a class="right" href="https://cs.wikipedia.org/wiki/Bublinkov%C3%A9_%C5%99azen%C3%AD">Wikipedia</a><br>
 <a class="right" href=" https://www.algoritmy.net/article/3/Bubble-sort" >Algoritmy.net</a>
 <a class="right" href="http://www.algolist.net/Algorithms/Sorting/Bubble_sort">Rabbit</a></p>
 
 

 