<h2>Databáze</h2>
<p>
    Všechny mobilní platformy mají přístup k nativní SQLite databázi, Xamarin umožňuje tuto databázi bez problémů používat.
</p>
<h3>Vytvoření a použití databáze</h3>
<p>
    Následující ukázka je vytvořená pro potřeby Xamarin se sdíleným kódem v PCL. Ukazuje práci s tabulkou TodoItem.
</p>
<h4>Nuget balíček</h4>
<p>
    <a href="https://github.com/praeclarum/sqlite-net">SQLite-net PCL</a> je doporučený balíček pro práci s SQLite databází v Xamarin PCL. Je aktivně vyvíjený a podporuje veškerou potřebnou funkčnost pro práci s SQLite databází.
</p>
<p>
    Balíček se skládá z částí pro využití v PCL a nativního kódu pro každou platformu.
</p>
<h4>SQLite connection a seznam základních Query</h4>
<p>
    Před samotnou prací s databází vytvoříme třídu, která zahrnuje všechny metody pro obsluhu databáze.
</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">public  class TodoItemDatabase
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
        return database.QueryAsync&lt;TodoItem>("SELECT * FROM [TodoItem] WHERE [Done] = 0");
    }

    public Task&lt;TodoItem> GetItemAsync(int id)
    {
        return database.Table&lt;TodoItem>().Where(i => i.ID == id).FirstOrDefaultAsync();
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
    Část pro SQLite connection a vytvoření tabulky TodoItem (zápis do databázového souboru).
</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">private SQLiteAsyncConnection database;

public TodoItemDatabase(string dbPath)
{
    database = new SQLiteAsyncConnection(dbPath);
    database.CreateTableAsync&lt;odoItem>().Wait();
}
</code></pre>
<h4>Tabulka TodoItem</h4>
<p>
    Na základě třídy TodoItem se vytvoří tabulka TodoItem v databázi, která je stejná. Pro potřeby indexace se do třídy přidají tagy pro SQLite databázi - PrimaryKey a AutoIncrement pro primární klíč.
</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">public  class TodoItem
{
    [PrimaryKey, AutoIncrement]
    public int ID { get; set; }
    public string Name { get; set; }
    public string Text { get; set; }

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
<h4>Databázový soubor v nativním uložišti</h4>
<p>
    Celá aplikace využívá SQLite connection ze třidy TodoItemDatabase, ta ale zatím nezná cestu k databázovému souboru. Lokace tohoto souboru je na každé platformě jiná, proto je potřeba zavolat nativní kód, který tuto lokaci zjistí.
</p>
<p>
    Nejprve si připravíme atribut, který bude udržovat spojení s databází a poté pomocí Dependency service zjistíme cestu k databázovému souboru.
</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">private static TodoItemDatabase _database;

public static TodoItemDatabase Database
{
    get
    {
        if (_database == null)
        {
            _database = new TodoItemDatabase(DependencyService.Get&lt;IFileHelper>().GetLocalFilePath("TodoSQLite.db3"));
        }
        return _database;
    }
}
</code></pre>
<p>
    Pro Dependency service je potřeba Interface a třídy, které ho implementují. Implementační třídy se nalézají v podprojektech daných platforem.
</p>
<h5>
    Interface
</h5>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">public interface IFileHelper
{
    string GetLocalFilePath(string filename);
}
</code></pre>
<h5>Android</h5>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">[assembly: Dependency(typeof(FileHelper))]
namespace SQLiteExample.Droid
{
    public class FileHelper : IFileHelper
    {
        public string GetLocalFilePath(string filename)
        {
            string path = System.Environment.GetFolderPath(System.Environment.SpecialFolder.Personal);
            return Path.Combine(path, filename);
        }
    }
}
</code></pre>

<h5>iOS</h5>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">[assembly: Dependency(typeof(FileHelper))]
namespace SQLiteExample.iOS
{
    public class FileHelper : IFileHelper
    {
        public string GetLocalFilePath(string filename)
        {
            string docFolder = Environment.GetFolderPath(Environment.SpecialFolder.Personal);
            string libFolder = Path.Combine(docFolder, "..", "Library", "Databases");

            if (!Directory.Exists(libFolder))
            {
                Directory.CreateDirectory(libFolder);
            }

            return Path.Combine(libFolder, filename);
        }
    }
}
</code></pre>

<h5>UWP</h5>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">[assembly: Dependency(typeof(FileHelper))]
namespace SQLiteExample.UWP
{
    public class FileHelper : IFileHelper
    {
        public string GetLocalFilePath(string filename)
        {
            return Path.Combine(ApplicationData.Current.LocalFolder.Path, filename);
        }
    }
}
</code></pre>
<a href="https://developer.xamarin.com/guides/xamarin-forms/working-with/databases/">Práce s databází - tutoriál</a>
<p></p>
<a href="https://github.com/malyda/Xamarin-SQLite">Ukázkový projekt</a>

