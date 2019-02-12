<h2>Vývoj knihoven</h2>

<h3>Parsování</h3>
<p>Vytvořte aplikace, které sdílejí co největší množství společné logiky:</p>

<p>Konzolová:</p>
<ul>
	<li> získá cestu k souboru od uživatele (csv) </li>
	<li> soubor načte a zkontroluje, jestli je csv validní</li>
	<li> obsah souboru uloží do nového (dle cesty definované v aplikaci)</li>
</ul>
<p>Grafická:</p>
<ul>
	<li>slouží k zadávání a zobrazování highscore - řadí záznamy od nejvyššího</li>
</ul>



<h3>Databáze</h3>
<p>Vytvořte aplikace, které evidují známky (váha,hodnota) a jejich předměty. Aplikace umí vypočítat vážený průměr z předmětu.</p>

<p>Data ukládá do lokálního souboru SQLite - nuget SQLite.Net.PCL (Krueger)</p>
<p>Projekt je rozdělen následovně:</p>
	<p>Client</p>
	<ul>
		<li> Console (.NET Core) </li>
		<li> XamarinForms -> hotové veškeré UI (min. 2 page)</li>
	</ul>
	<p>Model</p>
	<ul>
		<li> .NET Standard</li>
		<li> obsahuje veškerou logiku a SQLite</li>
	</ul>

<p>Za jedničku: - WPF client (.NET Framework)</p>

<h3>Vlastní nuget balíček</h3>
<p>
	Vytvořte vlastní nuget balíček, který publikujete na místní úložiště (local feed) a můžete jej instalovat do Vašich projektů. Balíček může obsahovat i další kód, který se hodí pro využití v dalších projektech.
</p>
<p>
	Balíček podporuje .NET Standard 2.0 a umožňuje ukládat data do zvolené cesty a formátu
</p>
<p>
	Podporované formáty:
</p>
<ul>
	<li>Json</li>
	<li>Csv</li>
</ul>
<a href="https://docs.microsoft.com/en-us/nuget/hosting-packages/local-feeds">How to create Local Feed</a>
<br>Pokud není nuget command line nainstalováno na pc, je možné použít nuget balíček v projektu <a href="https://www.nuget.org/packages/NuGet.CommandLine/"> NuGet.CommandLine</a>