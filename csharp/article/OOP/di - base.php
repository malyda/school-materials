<h2>Dependency injection</h2>
<p class="author">David Mašata</p>
<p class="introduction">Dependency injection (česky: Vkládání závislostí) je technika pro předávání závislostí mezi jednotlivými komponentami aplikace tak, aby jedna komponenta mohla používat druhou.</p>

<p>Dependency Injection je ve své podstatě velmi jednoduchým vzorem, který funguje tak, že volá z projektu kód projektu jiného. Pokud ho budete správně používat, získáte dobře čitelný a znovupoužitelný kód. Dependency Injection přebírá zodpověnost za třídu za zíkávání objektů. Třídě se objekty předávají až při vytváření. Jednoduše se tedy dá říct, že pomocí Dependency injection je možné volat z projektu kód projektu jiného. Třída, která je propojená s interfacem (pomocí Dependency injection ) ho realizuje. Celé se to dá shrnout do jedné sobecké věty: „<strong>nic nesháněj, ať se postará někdo jiný</strong>“.</p>

<h4>Vložení závislostí</h4>
<p>Vložení zavislostí do projektu zahrnuje 4 základní role:</p>
<ul>
    <li><strong>Service</strong> (služba) - Určuje objekty, které mají být použity.</li>
    <li><strong>Client</strong> - Objekt závislý na službách, které používá.</li>
    <li><strong>Interface</strong> - Rozhraní, které definuje jak může klient dané služby využívat.</li>
    <li><strong>Injector</strong> - Injektor, který je zodpovědný za stabvu služeb.</li>
</ul>
<p>Jakýkoliv objekt, který může být použit může být považován za službu. Jakýkoli objekt, který používá jiné objekty lze považovat za klienta.</p>

<h3>Výhody a nevýhody</h3>
<h4>Výhody</h4>
<ul>
    <li>Dependency injection snižuje propojení mezi třídou a její závislostí.</li>
    <li>Celý sdílený kód v projektu je programován proti Interface.</li>
    <li>Dependency service se stará o převedení Interface za třídu.</li>
</ul>

<h4>Nevýhody</h4>
<ul>
    <li>Náročnější správa kódu.</li>
    <li>Dependency injection může podpořit závislost na DI framework.</li>
</ul>

<h3>Mechanismy vkládání</h3>
<h4>Vkládání konstruktorem</h4>
<p>Výhodou tohoto způsobu je, že všechny závislosti jsou definovány najednou a objekt je tak po svém vytvoření plně funkční. Naopak nevýhodou je nepřehledný zápis v případě většího počtu závislostí, stává se nepřehledný.</p>

<strong>Constructor injection</strong>

<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">class Gallery
{
        /** @var PDO */
        private $connection;

        public function __construct(PDO $connection)
        {
                $this->connection = $connection;
        }
}
</code>
</pre>

<h4>Vkládání setterem</h4>
<p>Ke každé závislosti je vytvořen odpovídající setter a okolí tyto settery zavolá před prvním použitím objektu. Nevýhodou je, že není zaručeno, že budou tyto settery skutečně před použitím objektu zavolány. Proto může dojít během vykonávání programu k chybám.</p>

<strong>Setter injection</strong>

<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">class Gallery
{
        /** @var PDO */
        private $connection;

        public function setConnection(PDO $connection)
        {
                $this->connection = $connection;
        }
}
</code>
</pre>

<h4>Vkládání interface</h4>
<p>Jedná se o rozhraní. To v sobě bude obsahovat názvy metod, které předají dané objekty.</p>

<strong>Interface injection</strong>

<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">interface InjectConnection
{
        public function injectConnection(PDO $connection);
}
</code>
</pre>

<a href="http://www.theserverside.com/news/1321158/A-beginners-guide-to-Dependency-Injection">Dependency-Injection for beginners</a>
