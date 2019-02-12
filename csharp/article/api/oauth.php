<h2> OAuth </h2>
<p class="author">Jan Kočvara</p>
<p class="introduction"> OAuth není API, jde o protokol s cílem poskytnout bezpečný způsob autentizace a autorizace, který většina API postrádá. </p>

<p> Bezpečnost zajišťuje jednotně pro desktopové, mobilní i webové aplikace, je tedy jeden protokol určený pro vše. OAuth má dvě verze, první verzi OAuth 1.0, která je dnes již zastaralá a nepoužívá se. Jeho nástupcem je moderní a dnes velmi často používaný OAuth 2.0.</p>

<h3>Princip funkcionality OAuth 2.0 </h3>
<p> OAuth protokol funguje na principu ověřování tokenů, které Vám služba vygeneruje. Tokeny, které se ověřují jsou dva: <strong> Client ID </strong> a <strong> Secret</strong>. Klientské ID máte u dané služby vždy stejné, jde o Vaše ID, zkrátka Váš unikátní identifikátor. Nadruhou stranu Secret lze vždy znovu vygenerovat, jedná se o hash, který je svázán s vašim klientským ID. Každá aplikace, kterou autorizujete pro použití OAuth protokolu u třetích stran by měla mít svůj vlastní secret token.</p>
<img src="images/Oauth-dia.png" />

<h3>Využití OAuth 2.0</h3>
<p>OAuth protokol je aktuálně nejpoužívanější protokol pro udržení bezpečnosti při výměně citlivých dat uživatelů skrze API. Aplikace, které používají OAuth zabezpečení, poskytují uživatelská data a identity, aniž by uživatelé museli prozrazovat své heslo komukoliv dalšímu. Tyto data se přenášejí nejčastěji ve formátu JSON. Zároveň využití OAuth protokolu jde ruku v ruce s REST API.</p>

<p> Ve zkratce stačí se registrovat na jednom místě a poté ověřit přihlášením svou identitu na jiném místě, při úspěšném ověření se vaše data bezpečně přenesou na stránku, kde jste se právě nově přihlásili. </p>

<h3>Služby používající OAuth</h3>
<p>Implementace OAuth do aplikací je poměrně jednoduchá, protože velké služby, které dnes OAuth používají, jako je například Google či Facebook mají připravenou dokumentaci pro vývojáře, kteří chtějí využít API (včetně OAuth) pro svou aplikaci. Pro ještě jednodušší a rychlejší implementaci často vytvářejí na GIT již předpřipravené jazykové knihovny, které obsahují veškerou logiku využití API. Stačí je tedy jen stáhnout, implementovat do svého projektu a doplnit o Vaše autorizační údaje, které Vám služba vygeneruje. </p>
<table class="table-basic">
    <tr class="mdl-color--primary">
        <th> Služba </th>
        <th> Verze OAuth </th>
        <th> Dostupné jazykové knihovny </th>
    </tr>
    <tr>
        <td>Google</td>
        <td>2.0</td>
        <td> Java, Python, Go, .NET, Ruby, PHP, JavaScript, GTMAppAuth (Mac / iOS) </td>
    </tr>
    <tr>
        <td>Twitch</td>
        <td> 2.0 </td>
        <td> Nemá předpřipravené jazykové knihovny, vše pomocí JSON / CURL</td>
    </tr>
    <tr>
        <td>Instagram</td>
        <td> 2.0 </td>
        <td> Python, Ruby </td>
    </tr>
    <tr>
        <td>Dropbox</td>
        <td> 2.0 </td>
        <td> HTTP, .NET, Java, JavaScript, Python, Swift, Objective C, Komunitní SDK </td>
    </tr>
</table>
<p>Pozn.
    <i> Jelikož Google využívá jeden účet pro všechny své pod-aplikace, spadá pod jejich OAuth i aplikace jako je Youtube a další.</i>
</p>

<p> Pro ještě jednodušší použití existují služby třetích stran, které mají implementované ve svém kódu většinu předpřipravených jazykových knihoven a fungují tedy jako centrální OAuth služba. V tu chvíli stačí implementovat pouze tuto jedinou službu, místo vícero knihoven (např. Facebook, Twitch a Google) a pouze zažádat o použití již připravené jazykové knihovny. Takovéto služby bývají často placené, jednou z nich je i <a href="http://www.oauth.io" target="_blank"> <strong> Oauth.io </strong> </a> </p>

<h3> Implementace OAuth 2.0 - Google Login </h3>
<p> Pro implementaci stačí použít kód projektu, který je přiřazen. Kód obsahuje konfiguraci klienta, ve které je potřeba nastavit klientské ID a Secret, což je Váš osobní token, který je potřeba chránit. Tyto dva údaje jsou vygenerovány pomocí Google služby. Tyto údaje je třeba si nejdříve vygenerovat ve <a href="https://console.developers.google.com/" target="_blank">webové konzoli</a> google. Pro použití tohoto samplu je potřeba stáhnout celý projekt, s NuGet balíčkem <strong> Newtonsoft.Json </strong>.

<p>Pozn.
    <i> Veškerá logika projektu z této ukázky je uvnitř stránky MainWindow. </i>
</p>
<p>Pozn.
    <i> Tento sample používá testovací uživatelské ID a Secret, které je určeno pro ukázky přímo od společnosti Google Inc. </i>
</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">
// client configuration
    const string clientID = "581786658708-elflankerquo1a6vsckabbhn25hclla0.apps.googleusercontent.com"; //potřeba přepsat
    const string clientSecret = "3f6NggMbPtrmIBpgx-MK2xXK"; //potřeba přepsat

    //Tyto údaje zůstavají stejné, minimiálně do verze ke dni 14.4.2018
    const string authorizationEndpoint = "https://accounts.google.com/o/oauth2/v2/auth";
    const string tokenEndpoint = "https://www.googleapis.com/oauth2/v4/token";
    const string userInfoEndpoint = "https://www.googleapis.com/oauth2/v3/userinfo";
</code>
</pre>
<p> Zdrojový sample:
    <i> Oficiální Google <a href="https://github.com/googlesamples/oauth-apps-for-windows" target="_blank"> Git Sample Project</a> pro WPF | UWP | Android. </i>
</p>
<p> Zdrojová dokumentace:
    <i> Ofifiální Google <a href="https://developers.google.com/api-client-library/dotnet/guide/aaa_oauth" target="_blank"> dokumentace </a> k .NET </i>
</p>
