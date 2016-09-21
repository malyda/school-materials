<h2>Zpracování zdrojového kódu</h2><br>
<p class="introduction">Před spuštěním zdrojového kódu, který napsal člověk, je nutné ho přeložit do řeči, kterou používá počítač.<br>
 Ten se řídí příkazy v nejjednodušší podobě - <strong>instrukcemi</strong>.<br>
Používají se dva přístupy, jak přeložit kód pro počítač.</p>
<ul>
	<li>Celý najednou</li>
	<li>Tlumočit ho po větách - interpretovat</li>
</ul>
<h4>Strojový kód</h4>
<p>Strojový kód je posloupnost instrukcí pro procesor a je uložen v hexadecimální soustavě.<br>
Před tím, než jsou instrukce provedeny, je převeden do binární soustavy.</p>

<H3> Kompilace</H3>
<p>Kompilace je převod zdrojového kódu na strojový <strong>na straně vývojáře</strong>.<br>
Tento postup umožňuje kontrolu chyb, ladění optimalizací a je zde skoro neomezený čas pro přípravu kódu -> zatížení při vývoji je ulehčení při používání.</p>
<p><strong>Průběh kompilace:</strong></p>
<ul>
	<li>Preprocesor
		<ul>
			<li>Odstraní nepotřebné části kódu např. komentáře</li>
			<li>Preprocesoru je možné sdělit nastavení -> direktivy preprocesoru</li>
		</ul>
	 </li>
	<li>Kompilátor
		<ul>
			<li>Zpracuje připravený zdrojový kód do hexadecimální podoby</li>
			<li>Provede optimalizace</li>
			<li>Zkontroluje chyby a případně zastaví kompilaci</li>
		</ul>
	</li>
	<li>Deploy
		<ul>
			<li>Přenesení výsledného programu na cílové zařízení</li>
		</ul>
	</li>
	<li>Spuštění
		<ul>
			<li>Převedení hexadecimálního kódu do binární podoby a zpracování procesorem</li>
		</ul>
	</li>
</ul>
<img src = "images/hexToBin.png">
<p>
	<strong>Kompilace </strong>je převod zdrojového kódu na strojový, v době vytvoření spustitelné aplikace, tedy na počítači programátora <br>
	<strong>Interpretace</strong> je převod zdrojového kódu na strojový v době, kdy je potřeba ho spustit
</p>

<p>
	<strong>Kompilátor</strong> - kompiluje zdrojový kód na strojový<br>
	<strong>Interpret</strong> - kompiluje kód za běhu
</p>

<h3>Interpretace</h3>
<p>Zpracovává zdrojový kód po menších celcích. Pracuje s myšlenkou tlumočníka, kde je vyřčena věta v jednom jazyce a přeložena do druhého. Stejný postup se opakuje pro další věty.</p>
<p>V případě zdrojového kódu je větou myšlen řádek, který je převeden na instrukce v hexadecimální podobě <br>
-> <strong>interpret přečte řádek, zpracuje ho a poté čte další. Interpret je na straně cílového zařízení</strong>.</p>
<p>Tento přístup umožňuje ladění chyb přímo za běhu programu, protože cílový stroj má k dispozici i zdrojový kód (myšlenku).</p>
Pozn.<i> Existují postupy, kde se tohoto přístupu využívá tak, že program přepisuje sám svůj vlastní zdrojový kód.</i></p>
<img src = "images/Interpretace.png">
<p><strong>Výhody kompilace</strong></p>
<ul>
	<li> Kód je připraven ve formě spustitelné aplikace, není potřeba <strong>žádné zdržení v době spuštění aplikace</strong></li>
	<li> Mnohem menší riziko krádeže zdrojového kódu. Zdrojový kód je přenášen jako strojový/bytecode.</li>
	<li> Většinu chyb odhalí kompilátor při kompilaci -> jejich dřívější řešení.</li>
	
</ul>
<p><strong>Výhody interpretace</strong></p>
<ul>
	<li> Zpracovává se pouze kód, který je aktuálně potřeba -> <strong>aplikace může být upravována za běhu</strong>.</li>
	<li> Přenáší se na cílový stroj celý zdrojový kód, je možné, aby ho kdokoliv mohl upravit.</li>
</ul>
<p>Kompilované jazyky - <strong>C, C++</strong> - přenáší se již zkompilovaná aplikace<br>
Interpretované jazyky - <strong>PHP, Python</strong> - přenáší se pouze zdrojový kód<br>
Jazyky běžící pomocí VirtualMachine: <strong>C#, JAVA</strong><br></p>

<H3>VirtualMachine</H3>
<p>Kombinuje oba předešlé přístupy a bere si z každého to nejlepší:</p>
<ul>
	<li>Optimalizační a testovací fáze je odvedena na vývojovém zařízení</li>
	<li>Kód se nepřenáší v pro člověka čitelné podobě</li>
	<li>Kód je přenositelný napříč platformami, specializaci pro danou platformu (CPU, instrukční sady) zajišťuje VirualMachine (interpret) na každé platformě</li>
	<li>Přenositelný kód je nezávislý na programovacím jazyce, je možné napsat program v C# s využitím C++ knihoven a spustit ho na jakékoliv platformě, kde je CLR (VirtualMachine pro C#)</li>
</ul>
<p>Interpretuje kód, když je ho potřeba a <strong>spouští ho ve vlastním prostoru s přidělenými prostředky</strong></p>
<p><strong>Výhody VM</strong></p>
<ul>
	<li>Lze naprosto oddělit chod aplikace od operačního systému, či jiných aplikací (tzv. <strong>SandBox</strong>). V minulosti se mohlo stát, že špatně fungující program mohl narušit chod systému.</li><li>Zpracovává již připravený zdrojový kód (ByteCode, CIL), takže se <strong>na cílové zařízení nepřenáší ve zdrojové podobě</strong>. <strong>Velká část kompilace je zpracována při finalizaci aplikace a zbytek obstará v době spuštění VM</strong>.</li>
	<li>Zprostředkovává přístup aplikace ke knihovnám, není je tedy nutné zakompilovávat do aplikace.</li>
</ul>
<img src = "images/virtualMachine.png">
<p>Rozlišuje se několik druhů interpretace a některé z nich jsou:</p>
<ul>
	<li> <strong>JIT</strong> - Just In Time <br>
		<dd>V době spuštění aplikace se připraví její kód ke zpracování. Efektivní, pokud není dostatek paměti a není možné si aplikaci předpřipravit.</dd><br>
		<dd> Pozn. <i> Tento způsob interpretace se používal v mobilních zařízeních s OS Android do verze Lollipop.</i></li>
	<li> <strong>AOT</strong> - Ahead Of Time <br>
		<dd> Příprava aplikace pro její spuštění dříve než je potřeba. Aplikace se nahraje do RAM paměti, kde čeká na spuštění. Efektivní zejména pokud má zařízení k dispozici dostatek operační paměti.</dd><br>
		<dd> Pozn.<i> Tento způsob interpretace v současnosti využívají zařízení s OS Android od verze Lollipop výš.</i></li>
</ul>
<p>Známé VirtualMachines: Dalvik,ART - Android(Java), Java VM (desktopový VM), CLR - C#</p>

<H4>Zpracování kódu pro VirtualMachine</H4>
<p>Kompilátor kompiluje zdrojový kód do <strong>CIL</strong> (Common Intermediate Language), což je univerzální kód, který je poté interpretován na cílovém zařízení.</p>
<p>Interpret konkretizuje univerzální kód na cílové zařízení.</p>
<p>Díky tomu je kód přenositelný a splňuje <strong>"Write once, run everywhere".</strong></p>

<p>Průběh kompilace:</p>
<ul>
	<li>Preprocesor připraví kód</li>
	<li>Kompilátor vytvoří přenositelný strojový kód</li>
	<li>Přenesení strojového kódu na dané zařízení</li>
	<li>Spuštění aplikace, zde nastupuje VirtualMachine</li>
	<li>VirtualMachine interpretuje potřebné části kódu, když jsou potřeba</li>
</ul><br>
<br><a class="right" href="http://www.itnetwork.cz/csharp/zaklady/c-sharp-tutorial-uvod-do-jazyka-a-dot-net-framework/">Článek k rozšíření daného téma</a>