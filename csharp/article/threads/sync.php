<h2>Synchronizace vláken</h2>
<p class="introduction">Nejdůležitější při práci s vlákny je zajištění synchronizace. V případě efektivní spolupráce, je dosaženo ideálního cíle.</p>
<p>V praxi se většina programátorů spokojí s Thread-Safe třídami.</p>
<strong>Thread-Safe</strong> třída, je ta třída, která kromě běžných přístupových rozhraní ještě počítá se simultánním používáním více vlákny, také se používá klíčové slovo <strong>synchronized</strong>.</p>
<p>Uvažme následující příklad:</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">static bool check;
static void Main()
{
	new Thread (SomeMethod).Start();
	SomeMethod();
}
static void SomeMethod()
{
	if (!check)
	{
		check = true;
		Console.WriteLine ("Done"); 
	}
}
</code></pre>
<p>Nejdříve se vytvoří a spustí nové vlákno s metodou, která zjišťuje podmínku a poté vypisuje do konzole zprávu. Simultánně v hlavním vlákně se volá ta samá metoda.</p>
<p>V jednu chvíli se ke zpracování připraví dvě metody. Čteme-li kód odshora dolů, lze si odvodit, že jako první je zpracována metoda v separátním vlákně.<br>
Obě metody pracují se stejnou proměnnou check.</p>
<p>Při provedení metody v separátním vlákně se změnila hodnota check a vypsala se na obrazovku zpráva, při zpracování té samé metody se díky podmínce již žádná zpráva nevypsala.</p>
<p>Otočíme-li pořadí check = true a Console.WriteLine():</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">static bool check;
static void SomeMethod()
{
	if (!check)
	{
		Console.WriteLine ("Done"); 
		check = true;
	}
}
</code></pre>
<p>Stane se, že zpráva <strong>může</strong> být na obrazovku vypsána 2x, kvůli tomu, že jedna metoda může již vyhodnotit podmínku a druhá teprve ovlivňovat proměnnou check.</p>
<p>Tento způsob lze přirovnat ke skákání do řeči v rozhovoru.</p>

<h3>Lock</h3>
<p>Jsou případy, kdy skákání do řeči nevadí, ale jsou i takové, které mohou narušit celý koncept, jako u příkladu výše, kde chceme vypsat zprávu pouze jednou.</p>
<p>Označíme-li určitý kus kódu za kritický (blok, který musí být proveden bez ovlivňování) je nutné ho určitým způsobem uzamknout.</p>
<p>K tomu slouží klíčové slovo lock() a objekt, který slouží jako vrátný. Tento objekt může být libovolného typu, funguje pouze jako hradba.</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">static bool check;
static Object locker = new Object();

static void Main()
{
	new Thread (SomeMethod).Start();
	SomeMethod();
}

static void SomeMethod()
{
	lock (locker)
	{
		if (!check)
		{ 
			Console.WriteLine ("Done");
			check = true; 
		}
	}
}
</code></pre>
<p>Pokud jedno vlákno vstoupí do kritické sekce, druhé se do ní nedostane, dokud první nedokončí svou činnost.</p>
<p>Nejčastější chyby při multitaskingu vznikají právě kvůli špatnému zacházení se sdílenými daty. Je několik způsobů, jak vytvořit Thread-Safe aplikaci při použití lock().</p>
<ul>
	<li>Zamknutí kritické části metody viz. příklad výše</li>
	<li>Zamknutí přístupového rozhraní dat</li>
</ul>
<h4>Zamknutí přístupového rozhraní</h4>
<p>Zamykání přístupového rohraní je vhodné pouze tehdy, pokud je nutné provést činnost, která není atomická.
Atomická činnost je čtení, nebo zapisování, to ale neplatí u určitých datových typů.<br>
Například zapisování do Int32 je jedna instrukce do procesoru, pokud je použit 32bit systém, zapisování do Int64 na 32bit operačním systému jsou operace dvě. V druhém případě se tedy nejedná o atomickou operaci.</p>
<p>Důležité je také použití klíčového slova <strong>volatile</strong>, které varuje kompiler před tím, že daná proměnná může být měněna z více vláken např. by se nemělo stávat, že se bude daná proměnná Cachovat.</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">class DataStore
{
	private volatile int cislo;
	private object locker = new object();
	public int Cislo
	{
		get
		{
			int result;
			lock (locker)
			{
				result = cislo;
			}
			return result;
		}
		set
		{
		  
			lock(locker) cislo = value;
		}
		// Čtení a zároveň zápis do jedné proměnné je nebezpečné
		// Proto je použit vždy stejný zámek
	}
}
</code></pre>
<p>Tento způsob má své výhody, protože v jednu chvíli není možné číst a zároveň zapisovat do proměnné, ale jako častější se zamyká volání samotných metod jako v 1. příkladu.</p>
<i>Pozn. použití lock() je svázané s instancí aplikace, je-li nutné použití systémového objektu, který existuje napříč prostředím, je k tomu navržen Mutex. Tedy synchronizace mezi procesy.</i>
