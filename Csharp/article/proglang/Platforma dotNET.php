<H2>.NET</H2>
<p class="introduction">Platfroma .NET je soubor technologií umožňující, co největší přenositelnost aplikací na různé operační systémy a typy HW.<br>
Tyto nástroje vytváří jednotné prostředí se zárukou sdílených knihoven.<br>
Nabízí řešení problému, kdy mnoho aplikací využívalo stejné knihovny, které musely být pokaždé zakompilované do aplikace. .NET tyto knihovny poskytuje všem programům, které je potřebují.<br>
</p>
<p>Výhody:</p>
<ul>
	<li><strong>Přenositelnost a multiplatformost</strong> </li>
	<li>Aktualizace externích nástrojů je na správci OS</li>
	<li>Vždy obsahuje <strong>CLR</strong> (VirtualMachine) </li>
	<li>Stará se o přidělování zdrojů zařízení - paměť, čas procesoru, přístup k I/O zařízení</li>
	<li>Definuje a sjednocuje chápání základních datových typů</li>
	<li>Aplikace může být napsána ve více programovacích jazycích</li>
</ul> 
<p>.NET lze dělit na:</p>
<ul>
	<li>Microsoft .NET Framework - pro osobní počítače.</li>
	<li>Microsoft .NET Compact Framework - pro kapesní počítače a mobilní zařízení s Windows Mobile</li>
	<li>Microsoft .NET Micro Framework - pro embedded zařízení, s minimálním HW výbavou</li>
	<li>Projekt Mono - je produktem nezávislé OpenSource komunity implementující .NET pro operační systému Linuxového typy (CentOS, Debian, Mac OS X)</li>
</ul>
<p>Technologie obsažené v .NET:</p>
<ul>
	<li> ASP.NET - technologie pro webové aplikace</li>
	<li> WCF - Windows Communication Foundation - webové služby a komunikační infrastruktura</li>
	<li> <strong>WPF</strong> - technologie pro tvorbu grafických aplikací</li>
	<li> <strong>LINQ</strong> - objektový přístup k datům</li>
</ul>
<p>Podporované programovací jazyky: VisualBasic.NET, Delphy, F#, J#, C#, je podporována většina rozšířených jazyků.</p>

<H4>Kompilace na .NET</H4>
<p>Jakýkoliv zdrojový kód podporovaného programovacího jazyka je zkompilován do CIL, a poté interpretován na cílové platformě pomocí CLR (VM).</p>
<H3>ECMA 335</H3>
<p>Standard ECMA popisuje CIL a rozděluje ho na:</p>
<ol>
	<li>Část 1: Concept a architektura - určuje základní architekturu aplikace a poskytuje normalizované informace o <br>
		<dd>○ CTS - <strong>popisuje, jak jsou reprezentovány definice a specifické hodnoty v paměti</strong> -> udává jednotné prostředí pro všechny prog. Jazyky, které jsou kompilovány do CIL</dd><br>
		<td>○ VES - informace pro virtuální stroj, který zpracovává aplikaci v CIL</td><br>
		<dd>○ CLS - specifikace pro unifikované nástroje -> <strong>rozhraní pro práci s již vytvořenými knihovnami, bez nutnosti znát v jakém jazyku byly napsány</strong></dd></li>
	<li> Část 2: Metadata a sémantika -> poskytuje normalizovaný pohled na popis metadat -> jak pracovat s určitými typy souborů, logických pohledů -> jak pohlížet např. Na tabulky a jejich vazby</li>
	<li> Část 3: Popisuje Instrukční set -> <strong>základní sada instrukcí</strong>, které jsou používané pro zpracování aplikace procesorem</li>
	<li> Část 4: profily a knihovny -> poskytuje přehled o knihovnách CIL</li>
	<li> Část 5: Popisuje standardní cestu pro debugging</li>
<li>Část 6: obsahuje několik ukázkových programů napsaných v CIL -> podobné assembleru , pro ukázku základních postupů a použití instrukčních setů atd.</li>
</ol>
<a class="right" href="http://www.ecma-international.org/publications/standards/Ecma-335.htm">Celé znění normy</a>