<ol>
	<li><strong>Palindromy</strong><br>
	Vytvořte program, který při prvním spuštění vytvoří textový soubor s vybranými slovními spojeními/slovy (jeden řádek = jedno slovní spojení/slovo).<br>
	Program tento soubor načte a vyhledá v něm palindromy - slovní spojení, nebo slovo, které je stejné po předu i pozpátku Př. Anna, krk, nepochopen, nezařazen, Qaanaaq, Signate, signate, mere me tangis et angis (příklady lze nalézt na <a href="https://cs.wikipedia.org/wiki/Palindrom">Wikipedii</a>)<br>
	Výstupem programu je vypsání <strong>nejdelšího a nejkratšího opakujícího se</strong> palindromu.<br>
	Bonus: co nejefektivnější hledání palindromů<br><br>
	Doba na vypracování: 3 vyuč. hodiny, kontrola na 4. vyuč.hod. od zadání úkolu.<br>
	
Ukázka souboru:
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">Anna
Kuba
Lev
Nepochopen
Anna
Ryba
Nepochopen
Krk
</code></pre>
Výstup: nejdelší opakující se palindrom je:	Nepochopen, nejkratší je: Anna<br><br>
<i>Pozn. nehledí se na diakritiku a velikost písmen.</i><br>
</li><br><br>
<li><strong>Dvojrozměrné pole - poprvé</strong><br>
Vytvořte dvojrozměrné pole o velikosti 7x5 a toto pole vypište ve formě tabulky.
 </li><br><br>
<li><strong>Dvojrozměrné pole - práce se souborem</strong><br>
Připravte v souboru tabulku čísel, tuto tabulku načtěte do dvojrozměrného pole a to vypište tak, aby výstup byl opět ve formě tabulky.<br>
Příklad souboru:
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">1;2;3;4
5;6;7;8
9;10;11;12
</code></pre>
Výstup programu:<br>
1  2  3  4<br>
5  6  7  8<br>
9 10 11 12<br>
<br><i>Pozn. počet řádků v souboru lze zjisti pomocí:
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">int lineCount = File.ReadLines(@"C:\file.txt").Count();
//nebo
int lineCount = File.ReadAllLines(@"C:\file.txt").Length;
</code></pre>
</i>
</li><br><br>
<li><strong><strong>Dvojrozměrné pole - matice</strong></strong><br>
Vytvořte program, který použije uživatelem definovaný textový soubor a zamění řádky a sloupce. Kde jsou sloupce odděleny ";".<br>
Vytvořte dvojrozměrné pole tak, aby reprezentovalo matici (tabulka o stejném počtu řádků a sloupců) a <strong>zaměňte řádky za sloupce</strong>.<br><br>
<i>Pozn. zkontrolujte zda daný soubor je ve formátu matice, pokud není, vytvořte největší možnou.</i><br>
</li><br>
<li>
<strong>Dvojrozměrné pole - diagonály</strong><br>
Vytvořte program, který prohodí prvky nad hlavní diagonálou za prvky pod ní. <br><br>
<i>
Diagonála - úsečka, vedoucí od jednoho rohu ke druhému (například ve čtverci).<br>
Rozlišujeme hlavní a vedlejší diagonálu:
<ul>
	<li>Hlavní je od levého horního rohu po pravý spodní - na obrázku modrá</li>
	<li>Vedlejší je od pravého horního rohu po levý spodní - na obrázku zelená</li>
</ul>
</i>
</li><br>
<table class="center tabeů-square">
	<tr>
		<td class="blue"> 1</td>
		<td> 2</td>
		<td class="green"> 3</td>
	</tr>
	<tr>
		<td> 4</td>
		<td class="mid"> 5</td>
		<td> 6</td>
	</tr>
	<tr>
		<td class="green"> 7</td>
		<td> 8</td>
		<td class="blue">9</td>
	</tr>
</table>
<br>
<li> <strong>Dvojrozměrné pole - součet diagonál </strong><br>
Vytvořte program, který sečte prvky pod hlavní diagonálou a porovná je se součtem prvků nad vedlejší diagonálou. Poté vypíše, který součet je větší. <br><br>
<i> Pozn. prvky nad nebo pod diagonálou jsou prvky, kterých se diagonála netýka to jsou prvky 1,5,10 viz. tabulka výše. <br>
</li><br>
<li><strong>Dvojrozměrné pole - prohledávání</strong><br>
Vytvořte soubor, který obsahuje tabulku. Tabulka představuje zisk společnosti, kde je každý řádek jeden rok a každý sloupec jeden kvartál (celkem 4) + první nebo pátý sloupec označuje konkrétní rok.<br>
Program vypíše v jakém roce měla společnost největší zisk a v jakém kvartálu z celé této tabulky nejvíce prosperovala.<br>
<br><i>Pozn. techničtější zadání: Vytvořte program, který načte ze souboru tabulku čísel, najde největší v každém sloupci a vytvoří průměr čísel v daném řádku. Poté vypíše nejvyšší průměr z jednotlivých řádků a vyznačí hodnotu a řádek, kde je největší číslo ve sloupci.</i>
<br><br>
<li><strong>Bubbleshooter</strong><br>
Vytvořte program, který vygeneruje 2D pole o několika řádkách a sloupcích. Hodnoty v poli budou odpovídat barvám. 
<br><br>Účelem programu je: pomocí souřadnic vybírat vhodné pozice, kde je více barev na jednom místě a doplňovat řady tak, aby byly stejné barvy. Pokud jsou v řadě více než 2 prvky stejné barvy, tato skupina prvků zmizí.<br>
<br><i>Pozn. inspirace hrou <a href = "https://en.wikipedia.org/wiki/Puzzle_Bobble_2">Puzzle Bobble 2</a></i>

</ol>


<style>
table, th, td {
    border: 1px solid black;
	margin-left: auto;
	margin-right: auto;
	max-width: 1000px;
	text-align:center;
}
th, td {
    padding: 15px;
}

</style>