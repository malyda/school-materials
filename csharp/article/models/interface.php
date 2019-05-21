<h2>Interface - rozhraní</h2>
<p class="introduction">
	Určuje třídě co, bezpodmínečně, musí umět. Interface lze využít jako přístupové rozhraní, na které je spolehnutí např. komunikační API, bez znalosti zbytku třídy (HAL Windows NT). Napomáhá abstrakci a zapouzdření tříd, je základem mnoha programovacích modelů.
</p>

<h3>Interface a vlastnosti třídy</h3>
<p>
	Interface je set metod a atributů, na které třída reaguje. Např. počítač nereaguje na žádné uživatelské vstupy, až na ty, které mu jsou předány pomocí různých komunikačních rozhraní - klávesnice, myš, tlačíko pro zapnutí apod. Pokud mu jsou předány zprávy pomocí správných rozhraní, víme, že bude reagovat.
</p>
<p>
	Komunikační rozhraní umožňuje zapouzdřit objekt tak, že je ovladatelný hlavně přes rozhraní - počítač jako bedna, která bez vstupních a výstupních rozhraní nereaguje. Pokud bude na zprávy odeslané pomocí vhodných rozhraní reagovat, nemusíme se více zajímat o jeho funkčnost.
</p>
<p>
	Základní logikou interface je implementování všech atributů a metod, které předepisuje. Interface nereřeší konkrétní implementaci, proto předepisuje pouze hlavičky metod a atributy.
</p>

<p>
	Následující příklad ukazuje, že myčka na nádobí i osoba mohou mýt nádobí, ikdyž se jedná o dva různé objekty. Oba implementují metodu Wash() z iterface IWash. Kdybychom chtěli další objekt, který myje nádobí, stačí aby implementoval rozhraní IWash.
</p>
<img src="images/DishWasherAndPersonClassDiagram.png">
<p>Interface, které předpisuje několik atributů a metod, které musí třída implementovat.</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">interface IInterface
{
	// Atributes
	string InheriancedAttribute1 { get; set; }
	int InheriancedAttribute2 { get; set; }
   
	// Method headers
	string InheriancedMethod();
	string InheriancedMethodWithArguments(int[] args);
}
</code></pre>

<p> Třída, která implementuje interface, přidává logiku do metod a využívá jedné vlastní pomocné metody</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">class ClassImplemensIInterface : IInterface
{
	// Inherianced attributes
	public string InheriancedAttribute1 { get; set; }
	public int InheriancedAttribute2 { get; set; }
	public string InheriancedMethod()
	{
		// Method body
		return string.Empty;
	}

	public string InheriancedMethodWithArguments(int[] args)
	{
		// Method body
		return InnerMethod();
	}

	// Helper method
	private string InnerMethod()
	{
		return string.Empty;
	}
}
</code></pre>
<p>
	Danou třídu, díky zapoužření a polymorfismu interface, můžeme používat jako implementaci daného interface (jako její datový typ je ono interface).
</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">IInterface classImplemensIInterface = new ClassImplemensIInterface();
classImplemensIInterface.InheriancedMethod();
</code></pre>
<img class="img-custom" src="images/InterfaceInTheoryClassDiagram.png">
<h3>Interface a konkrétní použití</h3>
<p>
	V systému je již navržená třída DishWasher, která obsahuje metody Wash() a atribut Name. Do systému chceme přidat novou třídu Person, která bude mít stejnou strukturu jako DishWasher, jen přidá atribut DateOfBirth a metodu Wash si aplikuje po svém. Jednoduše řečeno, chceme, aby Osoba i Myčka uměli mýt nádobí a dostalo se jim jména tak, aby byla zajištěna struktura projektu.
</p>
<p>
	<strong>Špatné řešení - dědičnost:</strong> V takovém případě se nabízí použití jednoho ze základních konceptů OOP - dědičnost, který udržuje strukturu návrhu. Jenže tento způsob řešení s sebou nese velké množství problémů:
	<ol>
		<li>Nepřepsání rodičovské metody Wash() třída Person myje nádobí stejným způsobem jako myčka na nádobí.</li>
		<li>Při využití záměny předka jeho potomkem (vlastnost dědičnosti) říkáme, že Person je rozšíření DishWasher (osoba je rozšířením myčky na nádobí).</li>
		<li>Podědění atributu Name sémanticky vzato říká, že význam Name pro DishWasher a pro Person je stejný, což ve skutečnosti není.</li>
	</ol>
</p>
<p>
	<strong>Správné řešení - interface:</strong> Definujeme interface IWash, ve které bude definována metoda Wash(). Toto interface implementují obě třídy (Person i DishWasher) a přidají vlastní atribut Name, které je poté sémanticky srpávně. Toto řešení přidává několik výhod:
	<ul>
		<li>Při záměně DishWasher a Person není nutné měnit kód.</li>
		<li>Při přidání dalšího objektu, který má mýt nádobí, je model dobře rozšiřitelný</li>
		<li>Nedochází k sémantickým chybám</li>
	</ul>
</p>
<img class="img-custom" src="images/Interface.png">
<h4>Implementace interface</h4>
<p>Jako první samotná definice interface IWash</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">interface IWash
{
	void Wash();
}
</code></pre>
<p>Poté definice jednotlivých tříd, které implementují IWash interface</p>
<p>Person</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">class Person : IWash
{
	public string Name { get; set; }
	public void Wash()
	{
		// Wash like Person
	}
}
</code></pre>
<p>DishWasher</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">class DishWasher : IWash
{
	public string Name { get; set; }
	public void Wash()
	{
		// Wash like DishWasher
	}
}
</code></pre>
<p>Samotné použití tohoto modelu</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">IWash washerObject = new DishWasher();
washerObject.Wash();
// OR
washerObject = new Person();
washerObject.Wash();
</code></pre>
<h3>Další vlastnosti Interface</h3>
<p>
	Všechny metody a proměnné definované v interface jsou automaticky <strong>public</strong>. Proměnné jsou pokládány za atributy tříd a jako takové musí být zapouždřené pomocí get;set; přístupového rozhraní (access modifers).
</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">class DishWasher : IWash
{
	// Autoproperty
	public string Name { get; set; }
	// OR
	// Manual binding
	private string _name;
	public string Name
	{
		get
		{
			return _name;
		}
		set
		{
			_name = value;
		}
	}
}
</code></pre>
<p>
	Interface stejně jako Abstraktní třída jsou nástroje abstrakce (<a href="http://studium.vos-sps-jicin.cz/oop/index.php?page=abstrakce">abstrakce v PHP - SPŠ Jičín </a>)objektového návrhu. Protože abstraktní objekty nemají v reálném světě žádné zastání (sami o sobě nemohou existovat), tak nelze vytvořit jejich instance. Proto musí být tyto třídy vždy realizovány pomocí jiných objektů.
</p>
<p>
	Jeden objekt může realizovat několik interface.
</p>
<a href="https://github.com/malyda/Interface-BasicImplementation">Zdrojový projekt</a>