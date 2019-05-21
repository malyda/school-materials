<h2>  Reddit API</h2>
<p class="author">Pavel Flegr</p>
<p class="introduction"> Reddit poskytuje extenzivní API umožňující prohlížení i postování příspěvků a správu účtu. Lze tedy využít na vytvoření alternativního klienta pro použití redditu nebo bota, který shromažďuje informace nebo reaguje na příspěvky ostatních.</p>
<p>Jednoduché prohlížení příspěvků využívá stejné adresy jako normální reddit, akorát se za ně přidá .json
    V příkladech je použita knihovna RestSharp.
    Pro vytvoření potřebných tříd z vráceného textu lze použít <a href="http://json2csharp.com/">http://json2csharp.com/</a></p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">//vrátí seznam příspěvků ze subredditu včetně jejich id
var request = new RestRequest("r/cats.json");
var json = client.Execute(request).Content;</code>
</pre>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">//vrátí obsah příspěvku a komentáře
var request = new RestRequest("r/cats/8c6wqm.json");
var json = client.Execute(request).Content;</code>
</pre>
<p>Pro použití některých funkcí týkajících se třeba informací o účtu nebo postování komentářů je vyžadována autentizace pomocí OAUTH. K tomu slouží tato <a href="https://www.reddit.com/prefs/apps">stránka</a> (je třeba se přihlásit). V dolní části je tlačítko sloužící k registraci aplikace.</p>
<p>Je třeba vyplnit název a adresu pro přesměrování. Adresa přesměrování může být i localhost a ne vždy je použita.</p>
<p>Reddit rozlišuje 3 typy aplikací - internetová, instalovaná a skript.
<ul>
    <li>internetová aplikace využívá api jen na straně serveru a je tedy pro reddit důvěryhodná. Použije se pro třeba aplikace, které shromažďují a zpřístupňují ostatním nějaké informace.</li>
    <li>instalovaná aplikace může být využena kýmkoliv a není tedy důvěryhodná. Bude použita na např. pro alternativního klienta.</li>
    <li>skript je využíván pouze vývojářem a je tedy důvěryhodný. Má ale přístup pouze k účtu vývojáře, ne k ostatním.</li>
</ul>
</p>
<p>Při úspěšném vytvoření bude aplikace přidána do seznamu pod názvem obsahuje client_id a také secret, které budou potřeba později (pokud neobsahuje secret je třeba použít místo něj "nosecret")</p>
<p>Po zaregistrování aplikace je třeba už v samotné aplikaci získat autorizační token.</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">//třída pro vrácený JSON:
class AccesToken
{
	public string access_token { get; set; }
	public string token_type { get; set; }
	public string expires_in { get; set; }
	public string scope { get; set; }
}</code>
</pre>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">var client = new RestClient("https://www.reddit.com/api/v1/");
var request = new RestRequest("access_token", Method.POST);
//client_id a secret nahradit za hodnoty přiřazené aplikaci
request.Credentials = new System.Net.NetworkCredential("client_id", "secret");</code>
</pre>
<p>dále je třeba vybrat jednu ze situací</p>
<ul>
    <li>
        Pro skripty nebo aplikace, které nepotřebují účet vývojáře:
        <pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">request.AddParameter("grant_type", "https://oauth.reddit.com/grants/installed_client");
//id obsahuje 20-30 znaků by mělo být unikátní pro každé zařízení. Může být třeba náhodně generované nebo může být "DO_NOT_TRACK_THIS_DEVICE" aby nebylo používáno
request.AddParameter("device_id", "aaaaaaaaaaaaaaaaaaaaa");</code>
</pre>
    </li>
    <li>
        Pro skripty nebo aplikace, které využívají účet vývojáře:
        <pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">request.AddParameter("grant_type", "client_credentials");</code>
</pre>
    </li>
    <li>
        Pro aplikace, které potřebují účet uživatele:
        <p>Pokud je třeba použít účet uživatele aplikace musí požádat o jeho povolení. K tomu je použit odkaz v tomto formátu: https://www.reddit.com/api/v1/authorize?client_id=CLIENT_ID&response_type=temporary&
            state=neco&redirect_uri=URI&duration=temporary&scope=code (client_id a redirect_uri podle registrované aplikace, scope obsahuje hodnoty, které aplikace bude potřebovat podle použitých požadavků oddělené mezerami)</p>
        <p>Prohlížeč pak bude přesměrován na použitou adresu a součástí query je parametr code. Ten je potřeba z adresy extrahovat a použít pro získání tokenu:</p>
        <pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">//request.AddParameter("grant_type", "client_credentials");
request.AddParameter("grant_type", "authorization_code");
request.AddParameter("code", "získaný code");
request.AddParameter("redirect_uri", "http://locahost");</code>
</pre>
    </li>
</ul>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">var token = request.execute<AccesToken>().Data.access_token;</code>
</pre>
<p>Token pak lze použít pro tato <a href="https://www.reddit.com/dev/api">API</a>. Zde je příklad.</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">//pro autentizované požadavky se mění adresa
client.BaseUrl = new Uri("https://oauth.reddit.com/");
request = new RestRequest("api/v1/me", Method.GET);
//je třeba přidat získaný token
request.AddParameter("Authorization", "bearer " + token, ParameterType.HttpHeader);
var response = client.Execute(request);</code>
</pre>