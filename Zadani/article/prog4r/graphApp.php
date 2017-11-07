<h2>Grafické aplikace</h2>
<p>Navázání na znalosti z minulého ročníku na téma grafické aplikace ve WPF</p>

<h3>Komunikace se serverem</h3>
<ol>
	<li>Vytvořte aplikaci, která se dotazuje na jeden z následujícíh <a href="http://stackoverflow.com/questions/5725430/http-test-server-that-accepts-get-post-calls"> serverů</a> a zobrazuje jejich odpověď</li>
	<li> z odkazu výše vyberte server, který vrací JSON. Na tento server se dotažte pomocí vytvořené aplikace, která získá JSON, nahraje jeho obsah do vytvořené třídy, přidá záznam o datu a času stáhnutí a uloží na lokální disk<br>
		<i>*Pozn. <a href = "http://json2csharp.com/">json to C#</a></i><br>
		Server s JSON <a href="https://ucitel.sps-prosek.cz/~maly/PRG/json.php"> odpovědí </a>
		<br><a href="https://github.com/malyda/REST"> Zdrojový projekt </a>
        <br><a href="https://ucitel.sps-prosek.cz/~maly/PRG/materials/csharp/#rest">Vysvětlení od studenta</a>
		<br><a href="https://jsonplaceholder.typicode.com/">Fake Json api </a>
	</li>
</ol>

<h3>Evidence osob</h3>
<ol>
	<li>Vytvořte aplikaci, která se dotazuje na Váš server, kde je databáze uživatelů.</li>
	<li>Aplikace umožní evidenci osob tj. přidávání, úprava a mazání uživatelů.</li>
	<li>U osob bude evidovat minimálně: Jméno, přijmení, rodné čislo (ve správném formátu), datum narození a pohlaví.</li>
	<li>Aplikace ošetří všechny zadané údaje a u složitějších (rč) napoví.</li>
	<li>Aplikace je grafická - WPF</li>
	<li>Ze serveru dokáže získat seznam osob dle parametru, jednu konkrétní osobu, kterou umožní měnit a také zakládat nové osoby</li>
</ol>

<h3>Autobazar</h3>
<ol>
    <li>Vytvořte aplikaci, která umožňuje pracovníkům autobazaru evidovat data o pracovnících, zákaznících, vozidlech a uskutečňování obchodů</li>
    <li>Aplikace ukládá data na server, kde je udržuje synchronizovaná s klientskou částí </li>
    <li>Klienstká část je grafická WPF aplikace. Uživatel aplikace se musí přihlásit, při přihlášení mu je vygenerován klíč, pomocí kterého je autentizován při každé operaci s daty</li>
    <li>Data jsou posílána pomocí PUT, DELETE metod ve formátu JSON</li>
    <li>Předmětem hodnocení je i back-end -> php, SQL. návrh databáze a grafické zpracování (UI, UX) klienta</li>
    <li>Aplikace je plně ošetřená (uživ. vstupy i odpovědi ze serveru), napovídá v případě složitějších uživ. vstupů</li>
</ol>
<p>Jednoduché přihlášení bez nutnosti certifikátů: klient zašle na server uživ. jméno, server vrátí session key (generovaný ). Klient zahashuje heslo spolu s session key a pošle na server, server zahashuje session key a porovná s hashem hesla v interní DB. Pokud se hashe shodují, zařadí se hash key  a hesla mezi autentizované (po určitý čas) a klient ho posílá při každém dotazu.</p>
<a href="http://stackoverflow.com/questions/12254710/client-server-authentication">Jednoduchá autentizace</a><p></p>
<a href="https://www.codeproject.com/Articles/2642/SSL-TLS-client-server-for-NET-and-SSL-tunnelling">SSL/TLS autentizace</a>
<a href="http://stackoverflow.com/questions/21732063/how-to-create-json-post-to-api-using-c-sharp">Json data v POST</a><p></p>
<a href="http://stackoverflow.com/questions/11558353/rest-api-to-put-or-to-post?noredirect=1&lq=1">PUT, POST, DELETE</a>

<h3>Práce pro vylepšení známky - SSL/TLS autentizace</h3>
<p>
    Vytvořte klient-server aplikaci, která komunikuje zabezpečeně pomocí SSL/TLS.
</p>