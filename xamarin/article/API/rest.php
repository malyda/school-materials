<h2>Práce s REST</h2>

<p class="author">Martin Zbořil</p>

<p class="introduction">REST slouží pro vytvoření jednotného rozhraní ke kterému může přistupovat webová stránka, mobilní aplikace a další technologie. Přes toto rozhraní se dají snadno vytvářet, číst, editovat nebo mazat informace ze serveru. V následujícím článku je vysvětleno, jak se s REST pracuje v Xamarin.</p>

<p>V technologii Xamarin lze pracovat s rozhraním REST po nainstalování nugget balíčku <a href="https://www.nuget.org/packages/Microsoft.Net.Http">Microsoft.Net.Http</a>. Tento balíček zprostředková roli klienta a zajišťuje posílání požadavků na API. Dále musí být nainstalovaný balíček <a href="https://www.newtonsoft.com/json">Newtonsoft.Json</a>, který převadí jednotlivá data do formy tak, aby mohly být zpracovány aplikací a REST.</p>

<p>Po nainstalování zmiňovaných balíčků je potřeba oba implementovat, tam kde chceme pracovat s rozhraním REST. </p>

<pre class="prettyprint linenums scroll-horizontal"><code class="language-C# ">using System.Net.Http;
using Newtonsoft.Json;</code></pre>

<p>Pokud jsou tyto části splněny, můžou se začít vytváře jednotlivé požadavky na REST.</p>

<p><strong>Získání dat</strong></p>

<p>Získání dat je zajištěno pomocí metody HttpClient.GetAsync. Tato metoda posílá GET požadavek na rozhraní, které je definováno URL adresou. Následně je obdržena odpověď, ve formě dat získaných z rozhraní na, které byl zasílán požadavek. V následující ukázce je zobrazen kód pro získání dat:</p>

<pre class="prettyprint linenums scroll-horizontal"><code class="language-C# ">public async Task<List<Item>> GetItemAsync ()
{
  // RestUrl = http://example.com/
  var uri = new Uri (string.Format (Constants.RestUrl, string.Empty));

  var response = await client.GetAsync (uri);
  if (response.IsSuccessStatusCode) {
      var content = await response.Content.ReadAsStringAsync ();
      Items = JsonConvert.DeserializeObject <List<Item>> (content);
  }
}</code></pre>

<p>Služba REST pošle po požadavku také status zda-li bylo vše v pořádku, v takové případě je označen jako 200 (OK). Tento status je obsažen v HttpResponseMessage.IsSuccessStatusCode. Data jsou získána z HTTP pomocí metody HttpContent.ReadAsStringAsync, která je převede na string. Nakonec musí být tato data ještě změněna z JSON na podobu, kterou jsme si zvolili.</p>

<p><strong>Vytváření dat</strong></p>

<p>Vytváření dat je zprostředkováno pomocí metody HttpClient.PostAsync, která zašle POST poždavek na určenou adresu. Dále musí být data k odeslání, převedena do JSON a následně vložena do těla obsahu HTTP.</p>

<pre class="prettyprint linenums scroll-horizontal"><code class="language-C# ">public async Task SaveItemAsync (Item item)
{
  // RestUrl = http://example.com/
  var uri = new Uri (string.Format (Constants.RestUrl, string.Empty));

  var json = JsonConvert.SerializeObject (item);
  var content = new StringContent (json, Encoding.UTF8, "application/json");

  HttpResponseMessage response = null;
  response = await client.PostAsync (uri, content);
  }

  if (response.IsSuccessStatusCode) {
    Debug.WriteLine (@"Item successfully saved.");
  }
}</code></pre>

<p>Také při POST požadavku vrací REST status. Zde je jako úspěšný status považován 201 (CREATED), který symbolizuje vytvoření nového záznamu na serveru.</p>

<p><strong>Upravování dat</strong></p>

<p>Pro upravování je určena metoda HttpClient.PutAsync, která posílá PUT požadavek na rozhraní, které je dáno URL adresou. V tomto požadavku musí být data určena k odeslání stejně jako při POST, převedena do JSON. V podstatě jde o stejný princip jako u vytváření záznamů a tak následující ukázka obsahuje pouze to, v čem se liší a to je metoda PutAsync().</p>

<pre class="prettyprint linenums scroll-horizontal"><code class="language-C# ">public async Task UpdateItemAsync (Item item)
{
  ...
  response = await client.PutAsync (uri, content);
  ...
}</code></pre>

<p>Pokud je požadavek zpracován správně, výsledný status je 204 (NO CONTENT), který značí úspěšné provedení požadavku.</p>

<p><strong>Mazání dat</strong></p>

<p>Mazání dat je řešeno pomocí metody HttpClient.DeleteAsync, která pošle DELETE požadavek na danou URL adresu.</p>

<pre class="prettyprint linenums scroll-horizontal"><code class="language-C# ">public async Task DeleteItemAsync (string id)
{
  // RestUrl = http://example.com/{0}
  var uri = new Uri (string.Format (Constants.RestUrl, id));
  ...
  var response = await client.DeleteAsync (uri);
  if (response.IsSuccessStatusCode) {
    Debug.WriteLine (@"Item successfully deleted.");
  }
  ...
}</code></pre>

<p>REST vrací podobně jako v předchozích případech status o provedení požadavku. V tomto případě je jako úspěšný označen 204 (NO CONTENT).</p>