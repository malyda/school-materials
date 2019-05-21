<h2>Insertion sort</h2>
<p class="introduction">Algoritmus fungující na principu rozděl a panuj (nejde-li daný problém řešit, rozložíme ho na menší již řešitelné části). V tomto případě vidíme, že se pole dat skládá ze setříděné a nesetříděné části.<br>
Hledá prvek, který se shoduje s podmínkou řazení, a poté pro něj hledá vhodné místo v již setříděné části pole.</p>
<p>Základní vlastnosti</p>
<ul>
	<li>Stabilita: <strong>stabilní</strong></li>
	<li>Složitost: <strong>O(n^2)</strong></li>	
	<li>Paměťová náročnost: <strong>konstantní</strong></li>
	<li>Přirozenost: <strong>přirozený</strong></li>	
</ul>
<h3>Princip řazení</h3>
<p>Máme k dispozici data ve formě pole.<br>
Algoritmus čte pole tolikrát, kolik má prvků. 
Považuje 1. prvek pole za setříděnou část a tak se zabývá prvkem následujícím, ten si uloží do paměti, poté <strong>hledá v setříděné části pole vhodnou pozici pro zařazení vybraného prvku</strong>. 
<br>Hledání probíhá pomocí porovnávání prvků v setříděné části pole s vybraným prvkem. 
Během tohoto hledání <strong>posouvá prvky o jednu pozici</strong> tak, aby vyplnily místo vybraného prvku a uvolnily jiné pro zařazení.<br>
Při nalezení vhodného místa <strong>zařadí vybraný prvek na uvolněné místo</strong>.<br>
Vzhledem k tomu, že jsme vybraný prvek rovnou <strong>přesunuly </strong>(žádné prohazování dvou prvků) a poté akci opakovali s každým dalším prvkem, není nutné dalšího cyklu pro opakování.
</p><br><br>
<h3>Vizualizace</h3>
<ul>
	<li>Prvky, které prošly řazením se barví do zelená</li>
	<li>Prvky, které aktuálně prochází kontrolou a je zde možnost, že budou vybrány jako vhodná pozice pro prvek v paměti, se barví do červená.</li>
	<li>V paměti je vybraný prvek, pro který je nutné najít vhodnou pozici v částečně seřazené posloupnosti. Tento prvek je zobrazen mimo řadu čísel a je modrý.</li>
	<li>Některé prvky po skončení algoritmu zůstanou bílé, protože jsou již umístěny na správné pozici -> <strong>řada je částečně seřazená => algoritmus je přirozený</strong></li>
</ul>
 <iframe class="center" src="article/algs/animation.php#insert" style="height: 300px;width:650px;" id="iframe"></iframe> <br>
<h3>Zdrojový kód</h3>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">//Proved pro cele pole
for(int i = 0;  i< array.Length-1; i++)
{
	// Pozice pivotu
	int j = i + 1;
	// Urči hodnotu pivotu
	int pivot = array[j];
	
	//Dokud nejsme na začátku pole a pivot je vetší než aktuální prvek v setříděném poli
	while(j > 0 && pivot > array[j - 1])
	{
		// Posuneme daný prvek o jedno místo doprava
		array[j] = array[j - 1];
		// Posuneme se o další prvek dal
		j--;
	}
	// While skončil bud na začátku pole, nebo před prvním prvkem, který nesplnil podmínku
	// V obou případech vytvořil potřebné místo, na které umísti pivot
	array[j] = pivot;
}
</code></pre>
<p><i>Pozn. Je rychlý i na malých polích a jednoduchý na napsání, někdy výkonnější než Quick sort</i><br><br>
Jeho rozšířením je:  <a class="right" href="https://www.algoritmy.net/article/154/Shell-sort">Shell-sort</a><br>
<br><br> Odkazy pro rozšíření daného téma:<br></p>
 <a  href="http://www.itnetwork.cz/algoritmy/razeni/algoritmus-insertion-sort-trideni-cisel-podle-velikosti/">ITnetwork</a>
 <a  href="https://www.algoritmy.net/article/8/Insertion-sort">Algoritmy.net</a>