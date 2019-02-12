<h2>Get dotaz</h2>
<p class="introduction">
    Získání vtipu o Chucku Norrisovi z webové API.
</p>

<p>
    Dotaz lze provést pomocí třídy HttpClient, která se nachází v System.Net.Http a je součástí .Net Framework.
</p>
<p>
    Pro deserializaci je použita knihovna <a href="https://www.newtonsoft.com/json">Json.NET</a>.
</p>
<p>
    Api pro vtipy je: <a href="https://api.chucknorris.io">https://api.chucknorris.io</a>
</p>
<h3>Dynamic</h3>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">public async void Send()
{
    // Vytvoření klienta
    HttpClient client = new HttpClient();

    // Odeslání dotazu na API + pamaretr pro výpis z kategorie dev
    var response = await client.GetAsync("https://api.chucknorris.io/jokes/random?category=dev" );

    // Získání odpovědi v Json
    string json = await response.Content.ReadAsStringAsync();

    // Deserializace na dynamic objekt
    dynamic c = JsonConvert.DeserializeObject(json);

    // Vypsání z Dynamic
    string joke = c.value;
}</code>
</pre>

<h3>Striktně typové - třída</h3>
<p>
    Ideální je vytvořit třídu dle struktury dat, které přijdou v odpovědi API. Na to je mnoho nástrojů např. <a href="http://json2csharp.com/">json2C#</a>, kam stačí zadat json z odpovědi a vygeneruje se potřebný kód pro třídu v C#.
</p>

<p>
    Pro výše použitou API vypadá třída následovně:
</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">class JokeFromApi
{
    public List&ltstring> category { get; set; }
    public string icon_url { get; set; }
    public string id { get; set; }
    public string url { get; set; }
    public string value { get; set; }
}</code>
</pre>

<p>
    Výsledný kód se poté liší pouze v deserializaci, kde je třída použita:
</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">public async void Send()
{
    // Vytvoření klienta
    HttpClient client = new HttpClient();

    // Odeslání dotazu na API + pamaretr pro výpis z kategorie dev
    var response = await client.GetAsync("https://api.chucknorris.io/jokes/random?category=dev" );

    // Získání odpovědi v Json
    string json = await response.Content.ReadAsStringAsync();

    // Deserializace na JokeFromApi objekt
    JokeFromApi c = JsonConvert.DeserializeObject&ltJokeFromApi>(json);

    // Vypsání z JokeFromApi objektu
    string joke = c.value;
}</code>
</pre>
<h2>Post dotaz</h2>
<p>
    Post dotaz se píše podobným způsobem jako GET. Místo GetAsync je použita metoda SendAsync s kustomizovaným dotazem pro POST.
</p>
<p>
    K dotazu jsou v ukázce připojena i data.
</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">public async void Send()
{
    // Vytvoření klienta
    var client = new HttpClient();

    var request = new HttpRequestMessage(HttpMethod.Post, "https://ucitel.sps-prosek.cz/~maly/PRG/json.php");

    // Data, která se přidají k POST dotazu -> klíč je typu string a data jsou typu string
    var keyValues = new List&ltKeyValuePair&ltstring, string>>();
    keyValues.Add(new KeyValuePair&ltstring, string>("klíč", "data"));

    // Přidání dat do dotazu
    request.Content = new FormUrlEncodedContent(keyValues);

    // Zaslání POST dotazu
    var response = await client.SendAsync(request);

    // Získání odpovědi
    string responseContent = await response.Content.ReadAsStringAsync();
}</code>
</pre>