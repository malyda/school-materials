<h2>Práce se soubory</h2>
<p>
    Tvorba launcheru pro školní projekty
</p>

<h4>Skripty a moduly plug-in</h4>
<p>
    Vytvořte aplikaci, která umí spouštět (v runtime - za běhu) C# kód uložený v souboru. Pro sjednocení kódu pluginů využijte vhodného nástroje abstrakce např. Interface.
</p>
<p>
    Vytvořte aplikaci, ve které je možné načíst soubory maker a poté je jednotlivě spouštet. Aplikace umožní makrům využívat informace o herní postavě, která obsahuje:
    <ul>
        <li>List položek vybavení, kde každá položka má definované jméno a hodnotu (např. diamant, 1000 ,-)</li>
        <li>Herní atributy postavy např. síla, zdraví, inteligence apod.</li>
    </ul>
</p>
<p>
    Vytvořte makra:
    <ol>
        <li>přidá herní postavě novou položku vybavení</li>
        <li>zvýší hodnotu všech položek * 1,5</li>
    </ol>

</p>
<p>
    K aplikaci napište návod pro použití maker, kam přidáte příklady a popis informací, které dáváte makrům k dispozici. Popište třídu Globals, její proměnné a metody, také popište všechny třídy, které jsou zahrnuté v třídě Globals (např. Osoba, Položka inventáře) viz. <a href="https://gist.github.com/PurpleBooth/109311bb0361f32d87a2">How to write Readme on Github</a>.
</p>

<p>
    Za jedničku:
</p>
<ul>
    <li>Podpora více jazyků maker než jen C#</li>
    <li>Spouštění maker v odděleném prostředí - <a href="https://docs.microsoft.com/en-us/dotnet/framework/misc/how-to-run-partially-trusted-code-in-a-sandbox">sandbox</a></li>
    <li>Stahování maker z vlastní API, kde se uživateli nejdříve vypíše seznam maker vč. popisu a poté je možné přímo v aplikaci vybraná makra stáhnout a spustit</li>
</ul>
<a href="https://github.com/dotnet/roslyn/wiki/Scripting-API-Samples">Roslyn compiler documentation</a><br>
<a href="https://github.com/malyda/RoslynScriptingAPI">Sample project</a>
<h4>Launcher 1.0</h4>
<p>
    Vytvořte launcher pro své aplikace, který na základě cesty, kterou zadá uživatel, najde všechny projekty a umožní spouštět výstupní .exe soubory. K projektům je možné přidat informace a zobrazit je např. Readme.md. Launcher umí projekty přesunovat na nové lokace, umí je i mazat.
</p>
<p>
    Je několik možností, jak hledání .exe souborů zpracovat:
</p>
<ul>
    <li>Po nalezení .sln, nebo .csproj souboru, najde v podsložkách soubor se stejným jménem, ale s .exe příponou</li>
    <li>Hledá .csproj soubor, ve kterém ja zapsána cesta k výstupním složkám projektu</li>
</ul>
<p>
    Nalezené exe soubory vypíše, uživatel může vybrat .exe soubor a spustit ho.
</p>
<img src="https://cloud.addictivetips.com/wp-content/uploads/2016/02/paperplane.jpg" class="img-custom">

<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">Process proc = new Process();
proc.StartInfo.FileName = programPath;
proc.StartInfo.WorkingDirectory = Path.GetDirectoryName(programPath);
proc.Start();
</code></pre>

<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">//Now Create all of the directories
foreach (string dirPath in Directory.GetDirectories(SourcePath, "*",
    SearchOption.AllDirectories))
    Directory.CreateDirectory(dirPath.Replace(SourcePath, DestinationPath));

//Copy all the files & Replaces any files with the same name
foreach (string newPath in Directory.GetFiles(SourcePath, "*.*",
    SearchOption.AllDirectories))
    File.Copy(newPath, newPath.Replace(SourcePath, DestinationPath), true);
</code></pre>

<h4>Launcher 2.0 - Prohlížeč souborů</h4>
<p>
    Vytvořte vlastní alternativní prohlížeč souborů jako je např. <a href="https://www.ghisler.com/">Total Commander</a>.
</p>
<p>
    Prohlížeč umí:
</p>
<ul>
    <li>procházet soubory a zobrazovat jejich obsah</li>
    <li>kopírovat, přesouvat, mazat i vytvářet nové soubory a složky</li>
    <li>dokáže zobrazit více stránek, kde je možné procházet složky. Stránky mezi sebou umí spolupracovat např. soubor z jedné stránky zkopírovat do stránky druhé (lokace, která je zobrazenou stránkou)</li>
    <li>podporuje makra, umožňuje jejich načítání ze složky definované cestou v konfiguračním souboru</li>
    <li>podporuje vyhledávání dle zadaného řetezce</li>
</ul>

<p>
    Makra:
</p>
<ul>
    <li>k programu napište makro, které dokáže dle zadaných podmínek hromadně přejmenovat soubory např. všechny soubory s přípomou .png ve složce i podsložkách přejmenovat dle datumu pořízení fotografie</li>
</ul>
<img src="https://static.makeuseof.com/wp-content/uploads/2017/07/directory-opus-670x476.png" alt="Directory Opus"/>

<h3>Dlužníček</h3>
<p>
	Vytvořte grafickou aplikaci, která eviduje finance uživatele.
</p>
<p>
	Požadavky na aplikaci:
</p>
<ul>
	<li>Uživatel může do aplikace zadávat kdy a za co utrácel. Aplikace mu poté přehledně zobrazí statistiky za měsíc a za rok.</li>
	<li>Uživatel může vytvářet seznamy plánovaných výdajů např. seznam věcí, které si bude muset kupovat v zahraniční na dovolené. Zde bude zadávat položky vč. cen a aplikace zobrazí jejich celkový součet.</li>
	<li>V aplikaci použijte vlastní styly pro grafické zpracování a databázi pro evidenci všech informací.</li>
	<li>Aplikujte při vývoji aplikace v co největší míře princip kompozice a minimalizujte dědičnost.</li>
</ul>
<p>
	Za jedničku grafy.
</p>

<h3>Dlužníček v2</h3>
<p>
    Aplikace pracuje s myšlenkou, že si uživatel může evidovat dluhy svých známých.
</p>
<p>
    U každého dluhu je kromě položek a jejich cen evidováno i datum, do kdy má být dluh splacen. Je možné zadat úrokovou sazbu, o kterou se dluh zvedne každý měsíc po uplynutí lhůty splacení.
</p>
<p>
    Při každém spuštění aplikace jsou kontrolovány lhůty pro splacení dluhů. Uživatel je upozorněn, pokud nějaký dluh překročil lhůtu splacení.
</p>
<h4>Co bude hodnoceno především</h4>
<ul>
    <li>Použitelnost pro uživatele (další potřebné funkce aplikace)</li>
    <li>UI (aplikace musí být použitelná pro běžné uživatele)</li>
    <li>UX (aplikace se ovládá intuitivně)</li>
    <li>Kód z hlediska SOLID a základních principů OOP</li>
</ul>