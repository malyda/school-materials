<h2>Dlouhodobé projekty</h2>
<h3>Šibenice</h3>
	<p>Naprogramovat hru Hangman (oběšenec) <br>
	umožnit levelování -> čím vyšší level, tím těžší slovo <br>
	</p>
</ol>
<h3>21 oko bere</h3>
<p>
Program, který reprezentuje hru: 21 oko bere. Používá balíček karet. Program hru implementuje tak, že počítač je bankéř a uživatel je hráč. Bankéř také hraje. </p>

<h3>Dračí doupě</h3>
<a href="https://www.youtube.com/watch?v=kym41_O727E">Belegost</a>
	<ul>
	
	<p> Naprogramovat hru na principu Dračího doupěte - zpracování je libovolné, musí však splňovat minimální požadavky: <br>
		<li> kód musí splňovat zásady pro tvorbu zdrojového kódu - <a href="http://www.codeproject.com/Articles/703634/SOLID-architecture-principles-using-simple-Csharp">SOLID</a></li>
		<li> kód musí být zdokumentovaný </li>
		<li> kód pro UI je oddělený od kódu pro programovou logiku <a href="https://ucitel.sps-prosek.cz/~maly/PRG/materials/csharp/#wpf">MVVM ve WPF</a> </li>
		<li> vlastní třídy pro: hráče, nepřátele (aspoň 2 druhy), hrací kostku </li>
		<li> hráčův charakter se skládá ze základních dovedností (síla, zdraví), které se po každém vyhraném souboji, nebo po dosažení vyššího levelu zvýší </li>
		<li> V programu musí být vhodně implementovány alespoň 4 Interface </li>
	</ul>
	<p>
		Zapracování:
	</p>
	<ul>
		<li>Příběh</li>
		<li>Grafická část práce</li>
	</ul>
<h4>Bonusové body/jedničky navíc</h4>
<p>
	Kromě kódu a výsledné práce je hodnocen i přístup k práci, který je nad rámec zadání. Zde je několik možností:
</p>
<ul>
	<li>Program je uložen na Gitovém serveru (Github, Bitbucked, atd.), kde jsou prokazatelně alespoň 4 Commity (nepočítaje Inicializační)</li>
	<li>Kód se drží jednotného návrhového vzoru např. <a href="https://ucitel.sps-prosek.cz/~maly/PRG/materials/csharp/#wpf">MVVM ve WPF</a> </li>
	<li>Program vhodně implementuje některý z <a href="http://www.dofactory.com/net/design-patterns">design patternů</a>
	<li>Abstraktní třída</li>
</ul> 
	
<h4>Nejčastější chyby</h4>
	<ul>
		<li>Vše v jedné metodě - Main, nebo jediná ve Worker -> nepochopení k čemu jsou matoda -> nepochopení OOP</li>
		<li>MVC neznamená, že musíte jasně napsat, zda se jedná o View, Model, Controller, jde o princip komunikace mezi třídami. Např. pokud jde veškerý výstup přes Console, tak to je v pořádku. Je-li, ale nutné výstup pokaždé formátovat, vytvoří se pro něj metoda/funkce a ta se poté vloží do třídy, která shlukuje podobné metody. Častou chybou je nevhodné míchání Console a Vaší View třídy.</li>
		<li>Tvorba metod/funkcí ještě jednou. Název metody se odvozuje od toho co dělá, jedná se o sled několika málo kroků např. checkUserInputDecission - kontroluje vstup uživatele a zda je v souladu s tím, co program požaduje jako rozhodnutí (číslo volby, slovní zápis atd.). Funkce/Metoda Game, která obsahuje celou hru bez dalších funkcí je špatně. Taková metoda by měla obsahovat pouze další metody např. Inicialization, StartGame atd.</li>
		<li>V některých IDE je zakázané mít jiný název třídy a souboru, jako Class Osoba v souboru Class1.cs. Porušením nepsaných pravidel je umístění více tříd do jednoho souboru.</li>
		<li>Programování procedurální i objektové je většinou hierarchické, kód je členěn do úrovní. Chybou je podúrovně zpracovávat v hlavní úrovni.</li>
		<li>Deklarace proměnných<br>
		<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">// Špatně
String y;
if(true)
{
	String x = "pravda";
	y = x;
}
else
{
	String x = "nepravda";
	y = x;
}
// Správně
String y;
if(true)
{
	y = "pravda";
}
else
{
	y = "nepravda";
}// Ideálně StringBuilder
</code></pre><br>
		</li>
		<li>Kombinace File.Write/Read a StreamWriter/StringBuilder</li><br>
	</ul>
	
	<h3>Idle hra</h3>
	<p>Naprogramovat hru na principu <a href="https://en.wikipedia.org/wiki/Incremental_game">idle </a>, s tím rozdílem, že se bude jednat o její strategické rozšíření o více proměnných.<br>
	V klasické idle hře jsou vydělávány peníze a za ně se kupují vylepšení, v této rozšířené verzi jsou navíc i suroviny, které jsou potřebné pro chod zařízení, a kvalifikovaní zaměstnanci.<br>
	Např. pro chod pily potřebujete dřevo, za peníze si kupujete její vylepšení, ale tím stoupá i její spotřeba dřeva.<br>
	Ve hře ANNO 1404 jsou obyvatelé rozděleny na 3 kategorie, 1. skupina nemá žádné požadavky a může vykonávat lehkou práci, 2. skupina již potřebuje větší péči a 3. je nejnáročnější. Každá ze skupin obyvatelstva se hodí na jinou práci.<br>
	Jedná se o lehkou kombinaci idle hry a rozsáhlých budovatelských strategií ve stylu ANNO 1404, nebo Stronghold<br>
	Účelem hry je postavit ze všech druhů surovin div světa do jeho maximální úrovně např. 10.<br>
	Základní požadavky:</p>
	<ul>
		<li>Grafická hra využívající WinForms nebo WPF</li>
		<li>Těžba surovin a jejich spotřeba v separátním vláknu, které bude ve vlastní třídě</li>
		<li>V jednom odvětví aspoň 3 úrovně např. Dřevařství - les, pila, papírna z nichž každá bude mít mnoho stupňů vylepšení</li>
		<li>Několik kategorií obyvatelstva, každá potřebná pro určité budovy a jejich chod</li>
		<li>Při nižší dodávce suroviny do budovy se její produkce sníží</li>
		<li>MVC či jiný model</li>
		<li>Kód musí být zdokumentovaný</li>
		<li>Vlastní třídy pro budovy, kategorie obyvatelstva</li>
		<li>Budova, jejím postavením a maximálním levelem končí hra</li>
	</ul>
	Je možná variace dle hry Banished<br>
