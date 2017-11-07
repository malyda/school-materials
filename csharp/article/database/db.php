<h2>Relační databáze</h2>
<p class="introduction">
	Je založená na tabulkách, kde sloupce označují strukturu tabulky a řádky jednotlivé záznamy. Data v tabulkách lze spojovat pomocí klíčů, které utváří relace.
</p>
<a href="http://programujte.com/clanek/2008071900-normalizace-relacnich-databazi/">Normální formy</a>
<a href="https://www.tutorialspoint.com/mysql/mysql-introduction.htm">RDMBS - relační databázový model</a>
<h3>MySQL</h3>
<p>
    Je databázový server, nejčastěji používaný při vývoji webových stránek. Patří do skupiny otevřeného SW LAMP - Linux, Apache, MySQL, a PHP.
</p>
<p>
    Pro běžné používání je uvolněn pod <a href="https://cs.wikipedia.org/wiki/GNU_General_Public_License">GPL</a> licencí, pro změnu zdrojového kódu, nebo používání MySQL jinak, než dovoluje GPL, je nutné zakoupit komerční licenci (většinou v ní je zahrnuta i podpora od Sun Microsystems).
</p>
<h4>Struktura MySQL</h4>
<p>
    První vrstva slouží pro obsluhu klient/server připojení, každý připojený klient dostane na MySQL serveru vlastní vlákno, které zpracovává jeho požadavky. Vlákna se cachují, takže není potřeba s nově připojeným klientem vytvářet nové vlákno.
</p>
<p>
    Druhá vrstva zpracovává dotaz (parsuje SQL query), popřípadě vrací předem nacachovaný výsledek. Cache je pouze pro Select příkazy.
</p>
<p>
    Třetí vrstva se stará o optimalizaci dotazu. Vytváří si interní stromovou strukturu dotazu např. Tabulka -> sloupec -> podmínka -> limit.
</p>
<p>
    Čtvrtá vrstva jsou úložné moduly, které se starají o úložiště dat.
</p>
<ul>
    <li>
        Blackhole - přijímá data, ale neukládá
    </li>
    <li>
        Memory - data jsou uložena pouze v operační paměti
    </li>
    <li>
        CSV - ukládá data v csv
    </li>
    <li>
        InnoDB - defaultní modul pro ukládání dat pomocí MySQL
    </li>
</ul>
<a title="By Clary.Aldringen (Own work) [Public domain], via Wikimedia Commons" href="https://commons.wikimedia.org/wiki/File%3AMysql_architekture_schema.png"><img class="img-half" alt="Mysql architekture schema" src="https://upload.wikimedia.org/wikipedia/commons/7/78/Mysql_architekture_schema.png"/></a>
<h4>Ukládání dat v MySQL</h4>
<p>
    Každá tabulka je uložena do několika souborů
</p>
<ul>
    <li>
        .frm - základní popis tabulky
    </li>
    <li>
        .MYD - data
    </li>
    <li>
        .MYI - indexy
    </li>
</ul>
<a href="https://cs.wikipedia.org/wiki/MySQL">WIkipedia</a>
<p></p>
<a href="https://cs.wikipedia.org/wiki/InnoDB">InnoDB</a>

<h3>SQLite</h3>
<p>
	V současnosti nejpoužívanější engine pro malé a střední aplikace. Publikovaná pod public domain licencí a stále rozšiřovaná komunitou.
</p>
<ul>
	<li>Veškerá data vč. struktury jsou uložena v jednom souboru, který je přenositelný mezi platformami</li>
	<li>Nemá separátní server proces pro obsluhu dat</li>
	<li>Nabízí možnost přístupu k záznamům pomocí dotazovacího jazyka SQL</li>
</ul>
<p>
    Kromě souboru kam jsou ukládána data, SQLite používá rollback journal, kde si ukládá transakce. Pokud dojde k chybě, nebo přerušení, může SQLite obnovit svůj stav do bodu, kde byla před každou transakcí.
</p>
<p>
    Maximální velikost databázového souboru je cca 140 TB. Většinou velikost souboru narazí dříve na limity souborového systému, než na vlastní interní limit.
</p>
<a href="http://www.sqlite.org/about.html">Více o SQLite</a>
<h3>SQLite a C#</h3>
<p>
	Následující příklad ukazuje program, který vypisuje všechny položky TodoItem z databáze. V programu jsou i metody pro ukládání, mazání a přidávání záznamů do SQLite databáze.
</p>
<h4>Nuget balíček</h4>
<p>
	Pro jednotné použití SQLite i v Xamarin (PCL) je vybrán Nuget balíček <a href="https://www.nuget.org/packages/sqlite-net-pcl/">SQLite-net PCL</a>. Pro  přístup k databázi bez ohledu na PCL mohou být využité i jiné balíčky např. System.Data.SQLite.
</p>
<a href="https://github.com/praeclarum/sqlite-net">SQLite-net PCL oficiální Github page</a>

<h4>Vytvoření struktury databáze</h4>
<p>
	K práci s databází je potřeba instance SQLiteAsyncConnection. K vytvoření struktury tabulek v databázi je dobré vytvořit třídu, která reprezentuje tabulku a určit primární klíč, popř. další atributy.
</p>
<p>
	SQLite connection + query na tabulku TodoItem v databázi. Veškerá query jsou Asynchronní - neblukují vlákno při dotazování, je možné je nahradit synchonními (umazat Async a Task).
</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">public class TodoItemDatabase
{
	private SQLiteAsyncConnection database;

	public TodoItemDatabase(string dbPath)
	{
		database = new SQLiteAsyncConnection(dbPath);
		database.CreateTableAsync&lt;TodoItem>().Wait();
	}


	public Task&lt;List&lt;TodoItem>> GetItemsAsync()
	{
		return database.Table&lt;TodoItem>().ToListAsync();
	}

	public Task&lt;List&lt;TodoItem>> GetItemsNotDoneAsync()
	{
		return database.QueryAsync&lt;TodoItem>("SELECT * FROM [TodoItem] WHERE [Done] = 0"); // klasické SQL
	}

	public Task&lt;TodoItem> GetItemAsync(int id)
	{
		return database.Table&lt;TodoItem>().Where(i => i.ID == id).FirstOrDefaultAsync(); // LINQ syntaxe
	}

	public Task&lt;int> SaveItemAsync(TodoItem item)
	{
		if (item.ID != 0)
		{
			return database.UpdateAsync(item);
		}
		else
		{
			return database.InsertAsync(item);
		}
	}

	public Task&lt;int> DeleteItemAsync(TodoItem item)
	{
		return database.DeleteAsync(item);
	}
}
</code></pre>
<p>
	Třída TodoItem je entita, která reprezentuje tabulku v databázi, je možné s ní pracovat přímo v kódu.
</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">public class TodoItem
{
	[PrimaryKey, AutoIncrement]
	public int ID { get; set; }
	public string Name { get; set; }
	public string Text { get; set; }

	public int Done { get; set; }
	public TodoItem()
	{
	}

	public override string ToString()
	{
		return "ID" + ID + " Name " + Name + " Text " + Text;
	}
}
</code></pre>
<a href="https://github.com/oysteinkrog/SQLite.Net-PCL/tree/master/src/SQLite.Net/Attributes"> Seznam SQL atributů </a>
<h4>Zápis struktury databáze do souboru a udržení spojení</h4>
<p>
	Před započetím práce s databází musí být její struktura zapsána do souboru, kam se ukládají data a vrátit aktuální instanci připojené databáze.
</p>
<p>
	Způsob vytvoření databáze a vrácení aktuání instance popsaný níže, připojí databázi ve chvíli, kdy to aplikace potřebuje a drží otevřené připojení až do ukončení aplikace.
</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">private static TodoItemDatabase _database;

public static TodoItemDatabase Database
{
	get
	{
		if (_database == null)
		{
			 var fileHelper = new FileHelper();
			_database = new TodoItemDatabase(fileHelper.GetLocalFilePath("TodoSQLite.db3"));
		}
		return _database;
	}
}
</code></pre>
<p> 
	Třída FileHelper pouze vrací cestu k databázovém souboru. V tomto případě se databázový soubor vytvoří na stejném místě jako je spouštěcí .exe soubor aplikace.
</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">class FileHelper
{
	public string GetLocalFilePath(string filename)
	{
		return Path.Combine("", filename);
	}
}
</code></pre>
<h4>Práce s databází</h4>
<p>
	Přidání položky to databáze využívající připojení k databázi viz. příklad výše.
</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">TodoItem item = new TodoItem();
item.Name = "item";
item.Text = "item text";
item.Done = 0;
Database.SaveItemAsync(item);
</code></pre>
<p>
	Získání všech položek třídy TodoItem z databáze.
</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">var itemsFromDb = Database.GetItemsNotDoneAsync().Result;
</code></pre>
<p>
	Výpis všech položek a jejich celkového počtu.
</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">var itemsFromDb = Database.GetItemsNotDoneAsync().Result;

Debug.WriteLine(itemsFromDb.Count);
foreach (TodoItem todoItem in itemsFromDb)
{
	Debug.WriteLine(todoItem);
}</code></pre>
<a href="https://github.com/malyda/WPF-SQLite.git">Zdrojový projekt pro WPF aplikaci</a>
<p></p>
<a href="https://developer.xamarin.com/guides/xamarin-forms/working-with/databases/">Xamarin Tutorial - official</a>
<p></p>
<a href="https://developer.xamarin.com/guides/xamarin-forms/working-with/databases/">Xamarin Tutoriál</a>