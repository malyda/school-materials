<h2>Task-based Asynchronous Pattern (TAP)</h2>
<p class="author">Michal Zatloukal</p>
<p class="introduction">Pattern pro moderní asynchronní programování s automatickou správu multithreadingu .NET Frameworkem.</p>

<p>Task-based Asynchronous Pattern (TAP) využívá datové typy <i>System.Threading.Tasks.Task</i> a <i>System.Threading.Tasks.Task&lt;TResult></i> k reprezentaci libovolné asynchronní operace. Je tedy nutné naimportovovat namespace <i>System.Threading.Tasks.</i></p>

<p>Inicializace a dokončení asynchronní operace je na rozdíl od jiných patternů v TAP reprezentováno jednou metodou. Asynchronní metody v TAP se pojmenovávají s příponou “Async” (např. “NázevMetodyAsync”).</p>

<p>Metody v TAP vrací buď <i>System.Threading.Tasks.Task</i> (pro datový typ <i>void</i> odpovídající synchronní metody), nebo <i>System.Threading.Tasks.Task&lt;TResult></i> (pro jakýkoliv jiný návratový datový typ). Asynchronní metoda založená na TAP by měla obsahovat minimální množství synchronní práce, obvykle jen validaci parametrů či inicializaci asynchronní operace před tím, než vrací výsledný <i>Task.</i></p>

<p>Tento pattern je moderní a jednoduchý na implementaci. Implementují se klíčová slova <i>async</i> a <i>await</i>, zatímco framework se postará o multithreading.</p>

<h3>Příklad asynchronní metody</h3>
<p>Pro demonstraci funkcionalit TAP si představme dlouho běžící synchronní metodu.</p>

<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">public static IEnumerable&lt;int> getPrimes(int min, int count)
{
	return Enumerable.Range(min, count).Where
		(n => Enumerable.Range(2, (int)Math.Sqrt(n) - 1).All(i =>
			n % i > 0));
}
</code>
</pre>
<p>V závislosti na parametrech tato metoda může trvat dlouhou dobu.</p>
<p>Změnění této metody na asynchronní lze dosáhnout změnou návratového typu metody.</p>

<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">public static Task&lt;IEnumerable&lt;int>> getPrimesAsync(int min, int count)
{
     return Task.Run (()=> Enumerable.Range(min, count).Where
     	(n => Enumerable.Range(2, (int)Math.Sqrt(n) - 1).All(i =>
    		n % i > 0)));
}
</code>
</pre>
<p>Nyní je návratový datový typ <i>Task&lt;T></i> a proto lze tuto metodu volat s použitím <i>await</i>, což znamená, že při volání metody se zpracovává okamžitě další kód a průběh metody nezastaví na čas aplikaci. Nečekáme tedy na odpověď přímo, ale necháme, ať se metoda ozve sama, až bude odpověď připravená.</p>
<p>Metoda <i>getPrimesAsync</i> je poté níže volána asynchronně.</p>

<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">private static async void PrintPrimaryNumbersAsync()
{
    for (int i = 0; i < 10; i++)
    {
        var result = await getPrimesAsync(i * 100000 + 1, i * 1000000);
        result.ToList().ForEach(x => Trace.WriteLine(x));
    }
}
</code>
</pre>

<p>Všiměte si nutnosti klíčového slova <i>async</i> v metodě <i>PrintPrimaryNumbersAsync</i>, která volá asynchronně metodu <i>getPrimesAsync</i> pomocí <i>await</i>. Jakmile je zavolána, zpracování v hlavním vlákně postupuje okamžitě dále a hlavní vlákno se postará o zpracování výstupu až když vedlejší vlákno dokončí zpracování metody (v tomto případě metoda najde prvočísla v zadaném rozsahu).</p>
<p>Program pak vypadá takto:</p>

<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">static void Main(string[] args)
{
    PrintPrimaryNumbersAsync();
    Trace.WriteLine("Any Key to terminate!!");
}
</code>
</pre>

<h3>Příklad asynchronní práce s API</h3>
<p>Třída webového klienta obsahuje asynchronní metody:</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">class Rest
{
    public async Task&lt;ObservableCollection&lt;Person>> GetPersonsListAsync()
    {
        string url = "http://example.com/persons/list.php";
        var client = new RestClient(url);

        var request = new RestRequest("", Method.POST);
        IRestResponse response = client.Execute(request);

        IParser parser = new JsonParser();
        return await parser.DeserializeAsync&lt;ObservableCollectio&lt;Person>>(response.Content);
    }

    public async Task CreatePersonAsync(Person newPerson)
    {
        JsonParser parser = new JsonParser();
        string personString = await parser.SerializeAsync&lt;Person>(newPerson);
        await Task.Run(() =>
        {
            string url = "http://example.com/persons/create.php";
            var client = new RestClient(url);

            var request = new RestRequest("", Method.POST);
            request.AddParameter("Person", personString);

            IRestResponse response = client.Execute(request);
        });
    }
}
</code>
</pre>
<p>V programu jsou metody třídy dále volány asynchronně:</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">Rest webClient = new Rest();
await webClient.CreatePersonAsync(person);
...
Rest webClient = new Rest();
Persons = await webClient.GetPersonsListAsync();
</code>
</pre>

<h4>Užitečné odkazy</h4>
<a href="https://docs.microsoft.com/en-us/dotnet/standard/asynchronous-programming-patterns/task-based-asynchronous-pattern-tap" target="_blank">Microsoft TAP</a>
<a href="https://docs.microsoft.com/en-us/dotnet/standard/asynchronous-programming-patterns/implementing-the-task-based-asynchronous-pattern" target="_blank">Microsoft implementace TAP</a>
<a href="https://docs.microsoft.com/en-us/dotnet/csharp/programming-guide/concepts/async/" target="_blank">Microsoft asynchronní programování</a>
<a href="https://www.codeproject.com/Tips/591586/Asynchronous-Programming-in-Csharp-5-0-using-async" target="_blank">Ukázka TAP</a>