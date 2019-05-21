<h2>  Factory Pattern</h2>
<p class="author">Tomáš Chalupa</p>
<p class="introduction"> Návrhový vzor Factory slouží k vytváření instancí objektů určitého typu (někdy označovaných jako Produkt).</p>

<p>Základní metodou vytváření instancí v objektově orientovaných jazycích je volání konstruktoru třídy za použití operátoru 'new' (nebo jeho variant).
    Tento způsob ale nemusí být vždy vhodný. Vytvoření a inicializace objektu mohou vyžadovat řadu parametrů, které nemusí být k dispozici v místě kódu,
    odkud se konstruktor volá. Někdy zase potřebujeme konstruovat objekty, které implementují určité rozhraní, ale neznáme typ objektu, který se má v aktuálním
    kontextu vytvořit a nemůžeme proto přímo volat konstruktor konkrétního typu. V těchto případech můžeme použít návrhový vzor Factory, který umožňuje
    delegování procesu vytváření a inicializace instancí objektu do k tomu určené metody nebo třídy.</p>

<p>
    V návrhovém vzoru Factory se využívá dědičnosti. Předpokládá se, že všechny konkrétní typy instancí, které Factory produkuje, implementují společné rozhraní,
    nebo jsou potomky společné základní třídy. Volající kód se pak odkazuje pouze na společné rozhraní a nepotřebuje znát konkrétní typy objektů.</p>

<h3>Factory Method</h3>
<p>Existuje více variant návrhového vzoru Factory. Nejjednodušší variantou je konkrétní třída, která implementuje tzv. Factory Method. Tato metoda vrací
    konkrétní instanci produktu na základě aktuálních parametrů nebo kontextu. </p>

<img src="images/factory1.png" alt="Factory Method">

<h3>Abstract Factory</h3>
<p>Složitější variantou je návrhový vzor Abstract Factory. V tomto případě existuje rozhraní nebo abstraktní třída, která obsahuje abstraktní Factory metodu
    (např. <i>CreateProduct()</i>). Konkrétní implementace tohoto rozhraní (nebo abstraktní třídy) pak slouží k vytváření objektů konkrétního typu. Klient funguje pouze proti
    obecnému rozhraní Factory a nepotřebuje znát konkrétní implementaci. Ta může být vytvořena jinde v aplikaci (např. pomocí dependency injection).</p>

<img src="images/factory2.png" alt="Abstract Factory">


<h3>Příklad</h3>
<p>Tento příklad využití návrhového vzoru Factory Pattern ukazuje vytvoření instance třídy, reprezentující hudební nástroj, který je právě nastaven. </p>
<p>Všechny hudební nástroje v programu implementují rozhraní <i>INastroj</i>. Třída <i>NastrojFactory</i> ví, jaký nástroj je aktuálně nastaven a podle toho vytvoří a vrátí
    požadovanou instanci třídy konkrétního nástroje (metoda <i>VytvorNastroj()</i>).</p>

<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">class NastrojFactory {

		private string nastavenyNastroj;

		public INastroj VytvorNastroj() {
					INastroj nastroj = null;
					switch (nastavenyNastroj) {
								case "kytara":
										nastroj = new Kytara();
										break;
								case "ukulele":
										nastroj = new Ukulele();
										break;
								case "banjo":
										nastroj = new Banjo();
										break;
					}
					return nastroj;
		}
}</code>
</pre>

<p>
    V jiné třídě v programu je poté možné získat aktuálně nastavený nástroj, aniž by daná třída toto nastavení znala.
</p>

<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">NastrojFactory nastrojFactory = new NastrojFactory();
INastroj nastroj = nastrojFactory.VytvorNastroj();</code>
</pre>

