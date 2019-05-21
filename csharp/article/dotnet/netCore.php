
<h2>  .NET CORE</h2>
<p class="author">Jakub Hořínek</p>
<p class="introduction">.NET core je open-source platforma založena na technologii .NET Framework. Tato platforma je vyvíjena a podporována firmou Microsoft. Slouží pro vývoj aplikací stejně jako klasická .NET Framework platforma, ale na rozdíl od ní podporuje více operačních systému než jen Windows.</p>

<h3>Podporované systémy</h3>
<p>V současné době platforma podporuje Windows, MacOS a některé distribuce Linuxu (viz. tabulka).</p>
<table class="table-basic ">
    <tr class="mdl-color--primary white-text">
        <th>Operační systém </th>
        <th>Verze</th>
        <th>Architektura </th>
    </tr>
    <tr>
        <td>Windows 10 Client</td>
        <td>Build 1607+</td>
        <td>x64, x86</td>
    </tr>
    <tr>
        <td>Windows Server</td>
        <td>2008 R2 SP1+</td>
        <td>x64, x86</td>
    </tr>
    <tr>
        <td>Fedora</td>
        <td>26,27</td>
        <td>x64</td>
    </tr>
    <tr>
        <td>Debian</td>
        <td>9</td>
        <td>x64</td>
    </tr>
    <tr>
        <td>Mac OS X</td>
        <td>10.12+</td>
        <td>x64</td>
    </tr>
    <tr>
        <td>Linux Mint</td>
        <td>17.10, 18</td>
        <td>x64</td>
    </tr>
    <tr>
        <td>Ubuntu</td>
        <td>17.10</td>
        <td>x64</td>
    </tr>
</table><br>

<p>.NET Core může být použit na normálních zařízeních, v cloudu nebo na embedded/IoT zařízeních. Dá se využívat i v jiných .NET Core platformách. Toho se využívá například při nasazovaní, které je v .NET Core jednoduché.</p>
<p>Nasazení může být v .NET Core buďto součástí aplikace, nebo nainstalováno "side-by-side", díky čemuž můžeme testovat více verzí.</p>
<p>Další výhodou je možnost využívání příkazové řádky. Díky ní můžou být všechny scénáře provedeny přímo z příkazové řádky</p>
<p>Co se týče kompatabilnosti, .NET Core je kompatabilní s .NET Framework, nebo třeba Xamarinem.</p>
<p>Tato platforma složí jako prostředník pro real-time funkce pro aplikace.</p>

<h3>Skládá se</h3>
<p>.NET Core se skládá z následujících částí:</p>
<ul>
    <li><b>.NET runtime:</b> poskytuje systém typů, načítá sestavení atd.</li>
    <li><b>Framework knihovny:</b> Poskytují základní nástroje pro práci s primitivními datovými typy.</li>
    <li><b>Sada SDK nástrojů a kompilátorů:</b> poskytují základní nástroje pro vývojáře.</li>
    <li><b>App host:</b> používá se ke spouštění .NET Core aplikací. Vybere modul runtime a hostitele modulu runtime. Poskytuje načítání sestavení a spuštění aplikace.</li>
</ul>

<h3>.NET Standard</h3>
<p>.NET Standard je specifikace rozhraní API, které popisuje konzistentní sadu rozhraní API .NET, které vývojář můžete očekávat v každém implementace rozhraní .NET.</p>
<p>.NET core implementuje .NET Standard, díky čemuž podporuje .NET Standard knihovny.</p>

<h3>Ukázka kódu</h3>
<p>Ukázka kódu pro nasazení.</p>

<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">public class Startup
{
    public IConfiguration Configuration { get; }
    public Startup(IConfiguration configuration) => Configuration = configuration;

    //Tato metoda se volá při spuštění. Používá se k přidání služeb. Více info zde: http://go.microsoft.com/fwlink/?LinkID=398940
    public void ConfigureServices(IServiceCollection services)
    {
    }

    // Tato metoda se volá při spuštění. Používá se ke konfiguraci HTTP requestů.
    public void Configure(IApplicationBuilder app, IHostingEnvironment env, ILoggerFactory loggerFactory)
    {
        loggerFactory.AddConsole();

        if (env.IsDevelopment())
        {
            app.UseDeveloperExceptionPage();
        }

        // Registruje ServiceStack jako .NET Core modul
        app.UseServiceStack(new AppHost
        {
            AppSettings = new NetCoreAppSettings(Configuration) // Využije: "appsettings.json" a konfiguruje zdroje
        });

        app.Run(async (context) =>
        {
            await context.Response.WriteAsync("Hello World!");
        });
    }
}
</code>
</pre>
