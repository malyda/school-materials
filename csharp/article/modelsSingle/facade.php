<h2>  Facade (fasáda) design pattern</h2>
<p class="author">Ivan Merxbauer</p>
<p class="introduction"> Návrhový vzor fasáda zjednodušuje rozhraní komplexního systému.</p>

<p>
    Nabízí jednotné rozhraní k sadě rozhraní v podsystému. Definuje rozhraní vyšší úrovně, které zjednodušuje použití podsystému.
    <br>Řeší problém segmentu klientské komunity, který potřebuje zjednodušené rozhraní k celkové funkčnosti komplexního subsystému.
</p>
<p>Fasádu nemusí tvořit jediná třída, některé systémy mohou vyžadovat fasádu rozsáhlejší. Složitost fasády by však nikdy neměla přesáhnout složitost zapouzdřeného systému samotného či obtížnost řešené úlohy.</p>

<h3>Důvod vytvoření</h3>
<p>Programátoři mnohdy pracují při vývoji aplikace s několika rozhraními různých tříd. Tyto rozhraní mohou být často velice nepřehledné, pokud jsou rozhraní tříd složité, či jich je mnoho. Pokud spolu třídy logicky souvisí, můžeme je sdružit do takzvaného subsystému pomocí fasády. Získáme tak jednotné rozhraní pro funkcionalitu, kterou nám subsystém poskytuje.u</p>

<h3>Výhody</h3>
<ul>
    <li>
        sníží počet tříd, které musí klient znát a se kterými musí komunikovat
    </li>
    <li>
        umožní výměnu či změnu komponent "za fasádou" beze změny jejího vnějšího rozhraní
    </li>
    <li>
        vznikne možnost k funkcím jednotlivých komponent přidat i jednoduchou řídící logiku
    </li>
    <li>
        centralizace dané úlohy sníží duplicitu kódu
    </li>
    <li>
        vznikne možnost ke komponentám přidat jednoduchou řídící logiku
    </li>
</ul>
<h3>Sekvenční diagram</h3>
<p>Pozn.
    <i> ukázka byla převzata ze stránky <a href="https://dzone.com/articles/design-patterns-uncovered-1">dzone.com</a></i>
</p>
<p>
    Zde je ukázka sekvenčního diagramu, kde je vyobrazeno to, jak funguje fasáda. Nejprve klient vyžádá metodu z fasády, která již automaticky
    provede veškeré potřebné metody na vykonání té vyvolané a vrátí její hodnotu z metody. Tím pádem klient nepotřebuje znát kód do hloubky,
    protože se o něj postará fasáda
</p>
<p>
    <img src="images/facade_seq.PNG" alt="sekvencni_diagram">
</p>
<h3>Ukázka fasády</h3>
<p>Pozn.
    <i> ukázka byla převzata ze stránky <a href="https://sourcemaking.com/design_patterns/facade">sourcemaking.com</a></i>
</p>
<p>Toto je asi nejstručnější příklad toho jak zhruba funguje fasáda. Zákazník pouze volá na linku,
    kde už ho obstará nějaký člověk, v tomto případě by se dalo říci fasáda a ten už zařizuje veškeré věci jako
    vyřizování objednávky, poštovné, či placení. Tím pádem člověk neřeší tyto okolnosti, ale pouze využívá "subsystém" v podobě zaměstnance, který
    dokáže ovládat všechny tyto potřebné věci k dokončení objednávky.
</p>
<p>
    <img width="500px;" alt="ukazka_fasady" src="images/Facade_example1-2x.png">
</p>
<h3>Ukázka fasády ze života</h3>
<p>Pozn.
    <i> ukázka byla převzata ze stránky <a href="https://www.codeproject.com/Articles/481297/UnderstandingplusandplusImplementingplusFacadeplus">codeproject.com</a></i>
</p>
<h4>Úvod do problému</h4>
<p>
    Dejme tomu, že každé ráno před tím než jdu cvičit, musím na mobilu:
</p>
<ul>
    <li>vypnout WIFI</li>
    <li>zapnout DATA</li>
    <li>zapnout GPS</li>
    <li>zapnout hudbu</li>
    <li>zapnout SportsTrackerApp</li>
</ul>
<p>
    Když končím s cvičením tak:
</p>
<ul>
    <li>zapnout WIFI</li>
    <li>vypnout DATA</li>
    <li>vypnout hudbu</li>
    <li>vypnout GPS</li>
    <li>vypnout SportsTrackerApp</li>
</ul>
<h4>Ukázka kódu</h4>
<p>Kód je psaný v C# a je to konzolová aplikace</p>
<h5>Controller pro GPS a další služby</h5>

<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">class GPSController
{
    bool isSwitchedOn = false;

    public bool IsSwitchedOn
    {
        get
        {
            return isSwitchedOn;
        }
        set
        {
            isSwitchedOn = value;
            DisplayStatus();
        }
    }

    private void DisplayStatus()
    {
        string status = (isSwitchedOn == true) ? "ON" : "OFF";
        Console.WriteLine("GPS Switched {0}", status);
    }
}
</code>
</pre>
<p>Další controllery budou stejné jen s jiným jménem dané "služby", který bude controller ovládat. (takže WIFIController, InternetDataController, MusicController)</p>
<h5>SportsTrackerApp</h5>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">class SportsTrackerApp
{
    public void Start()
    {
        Console.WriteLine("Sports Tracker App STARTED");
    }

    public void Stop()
    {
        Console.WriteLine("Sports Tracker App STOPPED");
    }

    public void Share()
    {
        Console.WriteLine("Sports Tracker: Stats shared on twitter and facebook.");
    }
}
</code>
</pre>
<p>Tento controller bude "simulovat" aplikaci</p>
<h5>Hlavní vlákno (aplikace)</h5>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">static void Main(string[] args)
{
    // The phone has been booted up and all the controllers are running
    GPSController gps = new GPSController();
    MobileDataController data = new MobileDataController();
    MusicController zune = new MusicController();
    WifiController wifi = new WifiController();

    ///////////// Going for Jogging /////////////////////

    // 1. Turn off the wifi
    wifi.IsSwitchedOn = false;

    // 2. Switch on the Mobile Data
    data.IsSwitchedOn = true;

    // 3. Turn on the GPS
    gps.IsSwitchedOn = true;

    // 4. Turn on the Music
    zune.IsSwitchedOn = true;

    // 5. Start the Sports-Tracker
    SportsTrackerApp app = new SportsTrackerApp();
    app.Start();

    ///////////// Back from Jogging /////////////////////
    Console.WriteLine();

    // 0. Share Sports tracker stats on twitter and facebook
    app.Share();

    // 1. Stop the Sports Tracker
    app.Stop();

    // 2. Turn off the Music
    zune.IsSwitchedOn = false;

    // 3. Turn off the GPS
    gps.IsSwitchedOn = false;

    // 4. Turn off the Mobile Data
    data.IsSwitchedOn = false;

    // 5. Turn on the wifi
    wifi.IsSwitchedOn = true;
}
</code>
</pre>
<h4>Ukázka akutálního výstupu aplikace</h4>
<p>
    <img src="images/nofacadeSS.jpg" alt="vystup_aplikace">
</p>
<h4>Řešení pomocí fasády</h4>
<p>Ukázka řešení, které využívá pattern Fasáda</p>
<h5>Třída MyJoggingFacade</h5>
<p>Zde vytvoříme třídu, která bude použita jako fasáda</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">class MyJoggingFacade
{
    // These handles will be passed to this facade in a real application
    // also on actual device these controllers will be singleton too.
    GPSController gps = new GPSController();
    MobileDataController data = new MobileDataController();
    MusicController zune = new MusicController();
    WifiController wifi = new WifiController();

    SportsTrackerApp app = null;

    public void StartJogging()
    {
        // 1. Turn off the wifi
        wifi.IsSwitchedOn = false;

        // 2. Switch on the Mobile Data
        data.IsSwitchedOn = true;

        // 3. Turn on the GPS
        gps.IsSwitchedOn = true;

        // 4. Turn on the Music
        zune.IsSwitchedOn = true;

        // 5. Start the Sports-Tracker
        app = new SportsTrackerApp();
        app.Start();
    }

    public void StopJogging()
    {
        // 0. Share Sports tracker stats on twitter and facebook
        app.Share();

        // 1. Stop the Sports Tracker
        app.Stop();

        // 2. Turn off the Music
        zune.IsSwitchedOn = false;

        // 3. Turn off the GPS
        gps.IsSwitchedOn = false;

        // 4. Turn off the Mobile Data
        data.IsSwitchedOn = false;

        // 5. Turn on the wifi
        wifi.IsSwitchedOn = true;
    }
}
</code>
</pre>
<h5>Hlavní vlákno (aplikace)</h5>
<p>Zde je ukázka toto, jak by vypadalo hlavní vlákno (aplikace), pokud by se použil pattern Fasáda</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">static void Main(string[] args)
{
    MyJoggingFacade facade = new MyJoggingFacade();

    facade.StartJogging();
    Console.WriteLine();
    facade.StopJogging();
}
</code>
</pre>
<h4>Ukázka akutálního výstupu aplikace při použití patternu Fasáda</h4>
<p>Je uplně stejný</p>
<p>
    <img src="images/nofacadeSS.jpg" alt="vystup_aplikace">
</p>
<h5>Class Diagram</h5>
<p>Class diagram tohoto řešení, máme třídu, která ovládá subsystém</p>
<p>
    <img src="images/myFacade.jpg" alt="class_diagram">
</p>
<h4>Shrnutí</h4>
<p>Fasáda je výhodná v mnoha směrech demonstrovaných v příkladě nad. Již na první pohled je vidět, že jedna z těchto výhod je kratší kód v hlavním souboru aplikace</p>
<h4>Zdroje</h4>
<a href="https://www.tutorialspoint.com/design_pattern/facade_pattern.htm" alt="zdroj1">tutorialspoint</a>
<a href="https://sourcemaking.com/design_patterns/facade" alt="zdroj2">sourcemaking</a>
<a href="https://www.sspbrno.cz/~lenka.hruskova/maturita/temata/v4i-2011/20-navrhove-vzory.pdf" alt="zdroj3">sspbrno</a>
<a href="http://voho.eu/wiki/facade/" alt="zdroj4">voho.eu</a>
<a href="https://www.itnetwork.cz/navrh/navrhove-vzory/gof/gof-vzory-struktury/facade-navrhovy-vzor" alt="zdroj5">itnetwork</a>
<a href="https://www.codeproject.com/Articles/481297/UnderstandingplusandplusImplementingplusFacadeplus" alt="zdroj6">codeproject</a>