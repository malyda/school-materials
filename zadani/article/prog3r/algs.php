<ol>
	<li><strong>BubbleSort poprvé</strong><br><br>
	Vytvořit program, který vytvoří jednorozměrné číselné pole o velikosti min. 100 prvků a naplní ho náhodnými hodnotami.<br>
	Toto pole seřadí pomocí řadícího algoritmu BubbleSort a poté ho vypíše.<br>
	Bonus: program vypíše kolik uplynulo času při samotném řazení pole.
	</li><br>
	<li><strong>BubbleSort aplikace</strong><br><br>
	Vytvořit program, který jednorázově naplní databázový soubor (cca 50 řádků) při prvním spuštění. Databázový soubor představuje tabulku souborů uložených na pevném disku.<br>
	Struktura je následující:<br>
	<dd>- 1. řádek představuje popis sloupců - cesta k souboru;název souboru;velikost souboru</dd>
	<dd>- další řádky obsahují již konkrétní hodnoty</dd>
	<dd>- sloupce jsou odděleny pomocí <strong>;</strong></dd>
	Program tento soubor načte (do připravené třídy pro soubory) a nabídne uživateli, zda chce seřadit soubory od největšího, nebo od nejmenšího (myšlena velikost souboru). Poté seřazená data vypíše.<br>
	Program řadí soubory pouze pomocí BubbleSort algortimu, který aplikuje sám programátor.<br>
	Klíčové vlastnosti programu: zápis a čtení souboru, aplikace BubbleSort algoritmu, vhodný návrh třídy pro soubory, rozdělení tříd do MVC, či jiného modelu<br>
	<a class="right" href="article/ukoply2/bubble1.txt" download>Ukázka souboru</a><br>
	Bonus: Program vyzve uživatele, zda chce do výpisu souborů zahrnout i smazané soubory
	</li><br>
	
	<li><strong>SelectionSort poprvé</strong><br><br>
	Vytvořit program, který vytvoří jednorozměrné číselné pole o velikosti min. 1000 prvků a naplní ho náhodnými hodnotami.<br>
	Toto pole seřadí pomocí řadícího algoritmu SelectionSort a poté ho vypíše.<br>
	Bonus: program vypíše kolik uplynulo času při samotném řazení pole.
	</li><br>
	
	<li><strong>SelectionSort aplikace</strong><br><br>
	Vytvořit program, který jednorázově naplní databázový soubor (cca 25 řádků) při prvním spuštění. Databázový soubor představuje seznam dostupných jednotek armády.<br>
	Struktura je následující:<br>
	<dd>- 1. řádek představuje popis sloupců - jméno jednotky;životy;útok;obrana</dd>
	<dd>- další řádky obsahují již konkrétní hodnoty</dd>
	<dd>- sloupce jsou odděleny pomocí <strong>;</strong></dd>
	Program tento soubor načte (do připravené třídy pro soubory) a nabídne je uživateli. Komunikuje s uživatelem jako s generálem, který se chystá postavit linii armády a nabízí mu následující možnosti:
	<ul>
		<li>Sestavit linii tak, aby byly  nejslabší jednotky v první řadě a za nimi silnější</li>	
		<li>Sestavit linii tak, aby byly v první řadě jednotky s nejvyšším brněním</li>
	</ul>
	<br><br>
	Program řadí soubory pouze pomocí SelectionSort algortimu, který aplikuje sám programátor. <strong>Postup řazení je vypsán na obrazovku</strong>.<br>
	Klíčové vlastnosti programu: zápis a čtení souboru, aplikace SelectionSort algoritmu, vhodný návrh třídy pro soubory, rozdělení tříd do MVC, či jiného modelu<br>
	<a class="right" href="article/ukoly2/selection1.txt" download>Ukázka souboru</a><br>
	Bonus: Program sestaví linii tak, aby byly jednotky v dvojzástupech. 1. řada s nejvyšším brněním a druhá s nejvyšším poškozením. Typicky štítonoši a za nimi lučišníci.
	</li><br>
	
		
	<li><strong>InsertionSort poprvé</strong><br><br>
	Vytvořit program, který inicializuje jednorozměrné číselné pole o velikosti min. 10 000 prvků a naplní ho náhodnými hodnotami.<br>
	Toto pole seřadí pomocí řadícího algoritmu InsertionSort a poté ho vypíše.<br>
	Bonus: program vypíše kolik uplynulo času při samotném řazení pole.
	</li><br>
	
	<li><strong>InsertionSort aplikace</strong><br><br>
	Vytvořit program, který jednorázově naplní databázový soubor (cca 25 řádků) při prvním spuštění. Databázový soubor představuje seznam bojovníků v aréně.<br>
	Struktura je následující:<br>
	<dd>- 1. řádek představuje popis sloupců - jméno bojovníka;síla;obratnost</dd>
	<dd>- další řádky obsahují již konkrétní hodnoty</dd>
	<dd>- sloupce jsou odděleny pomocí <strong>;</strong></dd>
	Program tento soubor načte (do připravené třídy pro soubory) a nabídne je uživateli. Komunikuje s uživatelem jako se sportovním komentátorem za dob Říma např.
	<ul>
		<li>"Bojovník Maluch porazil gladiátora Ragnara a postoupil na 3. pozici v šampionátu"</li>	
		<li>"Bojovník Maluch byl poražen Ilidanem a propadl se na 4. pozici.</li>
	</ul>
	<br><br>
	<strong>Označení vítěze boje je na základě výpočtu jeho síly * obratnost a porovnání s protivníkovou hodnotou</strong>
	Program řadí gladiátory pouze pomocí InsertionSort algortimu, který aplikuje sám programátor. <strong>Postup řazení je vypsán na obrazovku - jednotlivé souboje</strong>.<br>
	Klíčové vlastnosti programu: zápis a čtení souboru, aplikace InsertionSort algoritmu, vhodný návrh třídy pro soubory, rozdělení tříd do MVC, či jiného modelu<br>
	Program vypíše seznam všech gladiátorů včetně jejich pořadí.<br>
	Bonus: Program před započetím třídění vypočítá u každého bojovníka síla * obratnost a poté pracuje pouze s touto hodnotou.
	</li><br><br>
	<br>
	<li><strong>MergeSort poprvé</strong><br><br>
	Vytvořit program, který vytvoří dvojrozměrné číselné pole o velikosti min. 10 000 prvků a naplní ho náhodnými hodnotami.<br>
	Toto pole seřadí dle 2. sloupce pomocí řadícího algoritmu MergeSort a poté ho vypíše.<br>
	Bonus: program vypíše kolik uplynulo času při samotném řazení pole.
	</li><br>
	<li><strong>MergeSort aplikace</strong><br><br>
	Vytvořit program, který jednorázově naplní dva soubory. 1. soubor slouží pro uložení informací o vozidlech cena, název, výrobce.., 2. soubor jsou předměty z aukce.<br>
	Tento program seřadí a vypíše informace dle jejich ceny (od nejvyšší).<br>
	Uvažujte princip řazení MergeSort.
	</li><br>
	
	<li><strong>QuickSort poprvé</strong><br><br>
	Vytvořit program, který vytvoří jednorozměrné číselné pole o velikosti min. 10 000 prvků a naplní ho náhodnými hodnotami.<br>
	Toto pole seřadí pomocí řadícího algoritmu QuickSort a poté ho vypíše.<br>
	Bonus: program vypíše kolik uplynulo času při samotném řazení pole.
	</li><br>
	
	<li><strong>QuickSort aplikace</strong><br><br>
	Vytvořit program, který jednorázově naplní databázový soubor (cca 25 řádků) při prvním spuštění. Databázový soubor představuje seznam spuštěných procesů.<br>
	Program tento soubor seřadí od nejvyšší priority a výsledek vypíše.
	</li><br>
	
	<li><strong>HeapSort poprvé</strong><br><br>
	Vytvořit program, který vytvoří jednorozměrné číselné pole o velikosti min. 10 000 prvků a naplní ho náhodnými hodnotami.<br>
	Toto pole seřadí pomocí řadícího algoritmu HeapSort a poté ho vypíše.<br>
	Bonus: program vypíše kolik uplynulo času při samotném řazení pole.
	</li><br>
	<li><strong>HeapSort aplikace</strong><br><br>
	Vytvořit databázový soubor s minimálním počtem 1 000 záznamů a minimálně 4 sloupci např. <a href="https://en.wikipedia.org/wiki/Lists_of_planets">List planet </a>.<br>
	Tento soubor poté seřadit dle programátorem zvolených kritérií. Výsledný program musí být k něčemu užitečný např. seřazení planet dle velikosti.
	</li><br>
</ol>
<strong>Kontrola úkolů č. 8, 10, 12 kdykoli na hodině po datu 22.5.2016 ve stejné hodině bude i test.<br>
Testy související s vyjmenovanými úkoly výše + datové struktury</strong>