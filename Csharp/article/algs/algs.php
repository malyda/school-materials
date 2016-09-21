<h2>Řadící algoritmy</h2><br>
<p class="introduction">Řadící algoritmy jsou návody, pomocí kterých lze řadit různá data dle kritérií např. jména dle abecedy, nebo čísla dle jejich hodnot.<br>
Tyto algoritmy se liší způsobem svého použití, některé jsou <strong>efektivní na krátkou řadu hodnot</strong>, ale se zvětšující se velikostí této řady <strong> se postupně stávají neefektivními</strong>.</p>
<p>
<h3>Měření efektivity algoritmu</h3>
Kvůli zjišťování efektivity algoritmů se zavedla měřítka:
<ul>
	<li><strong>Časová složitost</strong> - počet kroků algoritmu (jednotlivých operací). Dělí se na minimální, průměrnou a maximální</li>
	<li><strong>Prostorová složitost</strong> - kolik paměti daný algoritmus zabere</li>
	<li><strong>Jak dlouho nám zabere takový algoritmus napsat</strong></li>
</ul>
<p>Nejrychlejší algoritmy jsou ty, které si co nejvíce výpočtů vypočítají předem a poté se pouze koukají do databáze.
<br> Např. program, který má zjistit zda je dané číslo prvočíslo, si nejdříve spočítá prvočísla a poté porovnává vstupní parametr s těmito čísly.<br>
Takový program je na první pohled prostorově náročnější než program, který si každé prvočíslo dopočítává za běhu a nikam ho neukládá.<br><br>
<strong>Efektivní algoritmus je ten, který vhodně balancuje časovou a prostorovou složitost pro daný problém.</strong> Máme-li na základě těchto algoritmů více kandidátů na vhodný postup řešení, volíme takový, který nám zabere nejméně času na napsání i za cenu horší náročnosti.<br><br>
<i>Pozn. časovou složitost můžeme redukovat například tím, že si spočítáme opakovaný výskyt hodnot a pro každou tuto hodnotu provedeme potřebnou operaci, tím získáme pro všechny opakující se hodnoty výsledek s pouze jedním výpočtem pro každou unikátní hodnotu.</i><br><br>
Další kritéria hodnocení algoritmů jsou:</p>
<ul>
	<li><strong>Stabilita</strong> - algoritmus je stabilní, pokud nedojde ke zpracování dvou stejných prvků např. S = 1,2,2,3 -> čísla 2 a 2 se nevymění</li>
	<li><strong>Přirozenost</strong> - přirozenému algoritmu pomůže již částečně seřazená množina prvků</li>
</ul><br>
<h3>Vybrané řadící algoritmy</h3>
<p>Každý řadící algoritmus má vlastní metodu řazení, která ovlivňuje jeho chování a efektivitu.<br>
<br>Rozdělíme několik řadících algoritmů dle metod řazení</p>
<ul>
	<li><strong>Záměna - bubble sort</strong>, dle kritérií <strong>se dva prvky porovnají</strong> a v případě potřeby <strong>se provede jejich záměna</strong>. Proces se opakuje do úplného seřazení dat.</li>
	<br><li><strong>Výběr - selection sort</strong>, dle kritérií se vybere prvek a <strong>vloží se na konec, či začátek</strong> pomocného souboru dat, který se tímto tvoří již seřazený</li>
	<br><li><strong>Vkládání - insertion sort</strong>, zpočátku se vytvoří prázdný soubor dat o stejné velikosti jako neseřazený soubor, poté se každý prvek z neseřazeného <strong>vloží na přesné místo</strong> v pomocném souboru</li>
	<br><li><strong>Slučování - merge sort</strong>, vstupní soubor dat <strong>se rozdělí na menší části</strong>, ty se rozdělují, dokud nezbudou jednoprvková pole, <strong>poté se slejí již ve správném pořadí</strong> do jednoho celku. Tento postup má zaručenou neměnnou složitost.</li>
	<br><li><strong>Pivot - quick sort</strong>, zprvu <strong>se zvolí libovolný prvek</strong>, na jeho základě <strong>se pole přerovná</strong> na dvě části, v každé této části opět zvolíme libovolný prvek a opět přerovnáme. Tento postup opakujeme, dokud nezbudou pole o jednom prvku, v tomto kroku je celá množina dat seřazená.</li>
	<br><li><strong>Halda - heap sort</strong>, řazení haldou vychází ze základní vlastnosti datové struktury halda, kde j<strong>e nejvyšší prvek vždy největší nebo nejmenší</strong> v celém souboru dat. Algoritmus pouze <strong>odebere nejvyšší prvek</strong>, nechá hladu přerovnat a opět odebere nejvyšší.</li>
</ul>
<br>
<p><i>Pozn. V C# při použití metody Array.sort() jsou použity tři algoritmy:<br></p>
<ol>
	<li>Pokud je velikost pole do 16 prvků - Insertion sort</li>
	<li>Pokud je velikost pole větší než 2 * log^N, kde N je velikost pole - Heap sort</li>
	<li>Ve všech ostatních případech - Quick sort </li>
</ol></i>
</p>
<a class="right" href="http://www.sorting-algorithms.com/">Visualizace řadících algoritmů</a><br>
<a class="right" href="https://cw.fel.cvut.cz/wiki/_media/courses/x33dsp/dsp-p3.pdf">Materiály ČVUT Fel</a><br>
<a class="right" href="article/algs/Program.cs" download>Zdrojové kódy + Vícerozměrná pole</a>