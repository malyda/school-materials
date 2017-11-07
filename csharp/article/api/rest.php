<h2>RestAPI</h2>
<p class="author">Václav Mencl</p>
<p class="introduction">
    REST je jednoduchý způsob jak vytvořit, číst, editovat nebo smazat informace ze serveru pomocí jednoduchého volání HTTP
</p>
<p>
    Jedná se o architekturu rozhraní, navržená pro distribuované prostředí.
    Rozhraní REST je použitelné pro jednotný a snadný přístup ke zdrojům (zdroje => data) nebo stavům aplikace.
    REST je orientováno datově, ne procedurálně.
    Všechny zdroje mají vlastní identifikátor URI a REST definuje čtyři základní metody pro přístup k nim.
</p>

<!--                                        METODY                                        -->
<h3>Metody pro přístup</h3>
<p>REST obsahuje čtyři základní metody, označovány jako CRUD:</p>
<table class="table-basic left-text">
    <tr class="mdl-color--primary white-text">
        <th>Seznam Metod </th>
    </tr>
    <tr>
        <td>Create - Vytvoření dat</td>
    </tr>
    <tr>
        <td>Retrieve - Získání dat</td>
    </tr>
    <tr>
        <td>Update - Změnu dat</td>
    </tr>
    <tr>
        <td>Delete - Smazání dat</td>
    </tr>
</table>

<p>Implementace metod probíhá pomocí odpovídajícího protokolu HTTP</p>

<!--                                        CREATE                                        -->
<h3>Create (POST)</h3>
<p>
    Vytvoření dat je velmi jednoduché. K Vytvoření dat slouží metoda POST, známá z HTML formulářů. Při volání metody POST není známy přesný identifikátor zdroje (protože ještě neexistuje). Proto je pro POST domluvený společný identifikátor: <strong>endpoint</strong> .
</p>
<p>
    <i>Příklad služby Twitter:
</p>
<p>
    Vytvoření dat (zprávy) je potřeba zavolat zdroj s URI "/statuses/update" pomocí HTTP metody POST. Kdy v parametru "status" je předávána zpráva pro novou zprávu. K vytvoření nové zprávy je potřeba autorizace uživatelských dat, twitter podporuje dvě autentizace: prostá autentizace nebo OAuth. OAuth je na vyšší úrovní zabezpečení, oproti prostému HTTP autentizaci, při niž se posílá jméno a heslo v otevřeném textu.
</p>
<p>

    Ukázka použití prosté HTTP autentizace za pomocí POST metody:</i>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">curl -u user:password -d "status=Zkousime REST API" http://twitter.com/statuses/update.xml</code>
</pre>
<p>
    Po odeslání by server měl vrátit určitý kód HTTP, v tomto případě: 201 - Created
</p>

<!--                                        RETRIEVE                                        -->

<h3>Retrieve (GET)</h3>
<p>Základní metoda pro přístup k datům je získání zdroje pomocí metody GET, taktéž známá z formulářů HTML.</p>
<i>Ukázka požadavku na stránku:</i>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">GET /api/user/vaclav
HOST: www.server.cz</code>
</pre>

<p>Podle REST má každý zdroj svůj vlastní identifikátor (URI). Pomocí HTTP GET požadavku lze získat data konkrétního zdroje. </p>

<p><i>Ukázka získání posledních zpráv uživatele VaclavMencl na twitteru.
        Podle dokumentace Twitteru lze získat zprávy konkrétního uživatele jako zdroj "/statuses/user_timeline". Přesný tvar je:
        <pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">http://twitter.com/statuses/user_timeline/uživatel.formát</code>
</pre>Data uživatele získáme pomocí HTTP požadavku:</i></p>

<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">GET /statuses/user_timeline/VaclavMencl.xml
HOST: twitter.com</code>
</pre>

<!--                                        DELETE                                        -->
<h3>DELETE</h3>
<p>Zdroj lze smazat pomocí volání URI HTTP metodou DELETE. Volání metody je podobné jako volání metody GET</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">DELETE /api/user/vaclav
HOST: www.server.cz</code>
</pre>
<p>U metody DELETE může dojít k problému vyvolaném tím, že některé nástroje či HTML formuláře jsou omezené pouze na metody POST a GET.
    V praxi se proto použivájí náhradní způsoby: volání POST s určitým parametrem, který sděluje, že ve skutečnosti byla použita metoda DELETE, nebo pomocí speciální URI:</p>

<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">http://twitter.com/statuses/destroy/číslo.formát</code>
</pre>

<p>Jestliže se, ale setkáme s nástrojem který DELETE podporuje, lze metodu vyvolat pomocí:</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">curl -u user:password --http-request DELETE http://twitter.com/statuses/destroy/1472669360.xml</code>
</pre>

<!--                                        UPDATE                                        -->
<h3>Update (PUT)</h3>
<p>Metoda změny je podobná jako metoda vytvoření (POST), pouze s tím rozdílem, že voláme konkrétní URI konkrétního zdroje, který chceme změnit. V těle předáváme novou hodnotu.
    U metody PUT platí to samé co u metody DELETE.
    Taktéž ne každý nástroj či formulář ji podporuje, proto některá REST API použivájí jiné řešení.</p>
<i>Ukázka:</i>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">DELETE /api/user/vaclav
HOST: www.server.cz</code>
</pre>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">curl -u user:password -d "url=http://vaclav.mencl.cz" http://twitter.com/account/update_profile.xml</code>
</pre>

<!--                                        Stavové Kódy                                        -->

<h3>Stavové Kódy</h3>
<table class="table-basic left-text">
    <tr class="mdl-color--primary white-text" >
        <th >Stavové Kódy</th>
    </tr>
    <tr>
        <td>200 OK</td>
        <td>Požadavek proběhl v pořádku</td>
    </tr>
    <tr>
        <td>201 Created</td>
        <td>Při POST, jestliže došlo k vytvoření nového obsahu</td>
    </tr>
    <tr>
        <td>204 No Content</td>
        <td>Požadavek proběhne v pořádku, ale server nic nevrátí</td>
    </tr>
    <tr>
        <td>304 No Modified</td>
        <td>Pokud nedošlo od posledního požadavku ke změně obsahu</td>
    </tr>
    <tr>
        <td>400 Bad Request</td>
        <td>Jestliže došlo k nečitelnosti požadavku na serveru</td>
    </tr>
    <tr>
        <td>401 Unauthorized</td>
        <td>Klient není ověřen</td>
    </tr>
    <tr>
        <td>403 Forbidden</td>
        <td>Klient nemá přístup k danému obsahu</td>
    </tr>
    <tr>
        <td>404 Not Found</td>
        <td>Zdroj nebyl nalezen</td>
    </tr>
    <tr>
        <td>405 Method not Allowed</td>
        <td>Zdroj nepovoluje tuto metodu</td>
    </tr>
    <tr>
        <td>410 Gone</td>
        <td>Zdroj není dostupný</td>
    </tr>
    <tr>
        <td>415 Unsupported Media Type</td>
        <td>Uvedená hlavička "Content-Type", není podporována</td>
    </tr>
    <tr>
        <td>422 Unprocessable Entity</td>
        <td>Chyba validace dat - např. u formuláře</td>
    </tr>
    <tr>
        <td>429 Too-Many Requests</td>
        <td>Pokud klient překročil maximální počet požadavků na den</td>
    </tr>
</table>
<!--                                        Ukazka Metod                                        -->
<h3>Ukázka metody POST a GET pomocí C# (Bing Maps)</h3>

<h4>Použité Using</h4>

<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">using BingMapsRESTToolkit;</code>
</pre>


<h4>Vytvoření Session</h4>
<p><i>Ukázka zobrazuje jak vytvořit Session Klíč k instanci "Bing Mapám"</i></p>


<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">Map.CredentialsProvider.GetCredentials((c) =>
{
    string sessionKey = c.ApplicationId;

});</code>
</pre>

<h5>CredentialsProvider Class</h5>
<p>Pověření používané mapou ke kontrole</p>

<table class="table-basic left-text">
    <tr class="mdl-color--primary white-text">
        <th>Konstruktor</th>
    </tr>
    <tr>
        <td>CredentialsProvider()</td>
    </tr>
</table>

<table class="table-basic left-text">
    <tr class="mdl-color--primary white-text">
        <th>Metody</th>
    </tr>
    <tr>
        <td>Equals(Object)</td>
    </tr>
    <tr>
        <td>Finalize()</td>
    </tr>
    <tr>
        <td>GetCredentials(Action<Credentials>)</td>
    </tr>
    <tr>
        <td>GetHashCode()</td>
    </tr>
    <tr>
        <td>GetType()</td>
    </tr>
    <tr>
        <td>MemberwiseClone()</td>
    </tr>
    <tr>
        <td>MemberwiseClone()</td>
    </tr>
    <tr>
        <td>ToString()</td>
    </tr>
</table>
<!--                                        HTTP GET METODA                                       -->
<h4>HTTP GET Metoda</h4>
<p><i>Využití metody GET s požadavkem na "Bing Mapy"</i></p>

<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">private void GetResponse(Uri uri, Action<Response> callback)
{
    WebClient wc = new WebClient();
    wc.OpenReadCompleted += (o, a) =>
    {
        if (callback != null)
        {
            DataContractJsonSerializer ser = new DataContractJsonSerializer(typeof(Response));
            callback(ser.ReadObject(a.Result) as Response);
        }
    };
    wc.OpenReadAsync(uri);
}</code>
</pre>
<!--                                        HTTP POST METODA                                       -->
<h4>HTTP POST Metoda</h4>
<p><i>Použití metody HTTP POST s požadavkem na "Bing Mapy". Přičemž "Bing Mapy" podporují POST protokol.</i></p>

<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">private void GetPOSTResponse(Uri uri, string data, Action<Response> callback)
{
    HttpWebRequest request = (HttpWebRequest)HttpWebRequest.Create(uri);

    request.Method = "POST";
    request.ContentType = "text/plain;charset=utf-8";

    System.Text.UTF8Encoding encoding = new System.Text.UTF8Encoding();
    byte[] bytes = encoding.GetBytes(data);

    request.ContentLength = bytes.Length;

    using (Stream requestStream = request.GetRequestStream())
    {
        requestStream.Write(bytes, 0, bytes.Length);
    }

    request.BeginGetResponse((x) =>
    {
        using (HttpWebResponse response = (HttpWebResponse)request.EndGetResponse(x))
        {
            if (callback != null)
            {
                DataContractJsonSerializer ser = new DataContractJsonSerializer(typeof(Response));
                callback(ser.ReadObject(response.GetResponseStream()) as Response);
            }
        }
    }, null);
}</code>
</pre>
<!--                                        Implementace Zadosti                                       -->

<h4>Implementace žádosti</h4>
<p><i>Ukázka HTTP GET požadavku na REST službu "Bing Map". Tento příklad zobrazí adresu "Novoborská, 190 00 Praha, Česká republika"</i></p>

<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">string key = "YOUR_BING_MAPS_KEY or SESSION_KEY";
string query = "Novoborská, 190 00 Praha, Česká republika ";

Uri geocodeRequest = new Uri(string.Format("http://dev.virtualearth.net/REST/v1/Locations?q={0}&key={1}", query, key));

GetResponse(geocodeRequest, (x) =>
{
    Console.WriteLine(x.ResourceSets[0].Resources.Length + " result(s) found.");
    Console.ReadLine();
});</code>
</pre>
<!--                                        Zdroje                                       -->
<h4>Zdroje</h4>

<a href="https://www.zdrojak.cz/clanky/rest-architektura-pro-webove-api/">https://www.zdrojak.cz/clanky/rest-architektura-pro-webove-api/</a>
<a href="http://www.itnetwork.cz/nezarazene/stoparuv-pruvodce-rest-api">http://www.itnetwork.cz/nezarazene/stoparuv-pruvodce-rest-api</a>
<a href="https://cs.wikipedia.org/wiki/Representational_State_Transfer">https://cs.wikipedia.org/wiki/Representational_State_Transfer</a>
<a href="https://msdn.microsoft.com/en-us/library/jj819168.aspx">https://msdn.microsoft.com/en-us/library/jj819168.aspx</a>


<!-- konec vloženého HTML !-->