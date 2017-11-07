<H2> Dělení programovacích jazyků </H2>
<p class="introduction" >
	Na celém světě neexistuje jediný nástroj, který by byl dokonalý pro všechny činnosti. Programovací jazyky jsou nástroje pro tvorbu programů a stejně tak, není žádný z nich ideální pro úplně všechny typy programů. Zde je uvedeno několik způsobů jejich rozdělení, spolu s jejich konkrétními příklady.
</p>
Programovací jazyky lze dělit dle:
<ol>
	<li>toho, jako moc kontrolují programátora</li>
	<li>využití</li>
	<li>zpracování kódu</li>
</ol>
<h3>Dle přístupu</h3>
<ol>
	<li> 
		<strong>Nižší</strong> <br>
		Programovací jazyky, které jsou co nejblíže počítači, jsou závislé na dané platformě<br>
		<ul>		
			<li>Určeny pro přímou kontrolu daného zařízení</li>
			<li>Mohou být časově náročnější při vývoji větších aplikací</li>
			<li>Neomezují programátora při přístupu k prostředkům zařízení</li>
			<li>Jazyky: <strong>Assembler, Basic</strong></li>
		</ul>
	</li><br>
	<li> 
		<strong>Střední</strong> <br>
		Jsou blíže programátorovi, zrychlují vývoj, jsou robustnější.
		<ul>		
			<li>Dávají programátorovi volnost v jeho působení -> <i>s velkou mocí přichází i velká zodpovědnost</i></li>
			<li>Běží nativně na daném stroji</li>
			<li>Jazyky: <strong>C,C++</strong></li><br>
		</ul>
		Pozn. <i> někdy je žádoucí si danou funkci napsat podle sebe, než použít již existující např. vlastní správa paměti vs. Garbage collector </i>
		Pozn. <i> rozdělení na střední je hlavně teoretické, běžně se používá pouze nižší a vyšší </i>
	</li><br>
	<li> 
		<strong>Vyšší</strong> <br>
		Nejblíže programátorovi, urychlují vývoj, jsou nezávislé na platformě (běží virtualizovaně).		
		<ul>
			<li>Kontrolují programátora např. neumožňují mu pracovat přímo s pamětí, poskytují přístupové rozhraní</li>
			<li>Předpokládá se, že slouží k rychlému vývoji robustních systémů</li>
			<li>Jsou objektové</li>
			<li>Nejrobustnější programovací jazyky.</li>
			<li>Cíleny na multiplatformní funkčnost -> <i>write once, run everywhere</i></li>
			<li>Jazyky: <strong>Java, C#</strong></li>
		</ul>
	</li>
</ol>
<h4>Kdy jaký vybrat?</h4>
<ol>
	<li>
		<strong>Přímá práce se speciálním HW</strong>
		<ul>
			Nižší programovací jazyky
			<li>Výrobní linky, tovární zařízení, automaty</li>
		</ul>
	</li>
	<li>
		<strong>Závislost na daném typu zařízení</strong>, škálovatelnost, urychlení práce v týmu
		<ul>
			Střední programovací jazyky
			<li>Pokladní, kontrolní, kamerové systémy</li>
		</ul>
	</li>
	<li>
		<strong>Nemožnost specializace na konkrétní typy zařízení</strong>, škálovatelnost, velké pracovní týmy
		<ul>
			Vyšší programovací jazyky
			<li>Aplikace pro telefony, počítače</li>
		</ul>
	</li>
</ol>
<h3>Dle využití</h3>
<ol>
	<li>
	<strong>Značkovací / deklarativní</strong>
		<ul>
			<li>HTML</li>
			<li>XML, XAML, JSON</li>
		</ul>
		Pozn. <i>Spíše se jedná o datové formáty, než o programovací jazyky -> výstupem není program, spíše obohacují text</i>
	</li><br>
	<li>
		<strong>Programovací</strong>
		<ul>	
			<li>Assembler</li>
			<li>C++, Java, Python, PHP</li>
		</ul>
		Pozn. <i>Výstupem je program</i>
	</li>
</ol>
<h3>Dle zpracování kódu</h3>
<ol>
	<li>
	<strong>Kompilované</strong>
		<ul>
			<li>C++, Java, C#</li>
		</ul>
		Pozn. <i>Kód se předzpracovává před dodáním na cílové zařízení a poté se konkretizuje</i>
	</li><br>
	<li>
		<strong>Interpretované</strong>
		<ul>		
			<li>Python, PHP</li>
			Pozn. <i>Kód je dodán na cílové zařízení, kde je zpracován až v době, kdy je potřeba.</i>
			<i>Je možné, aby se sám za běhu přepisovaly části, které nejsou zrovna používané</i>
		</ul>
		Pozn. <i>Výstupem je program</i>
	</li>
</ol>
	