	<h2>API v PHP</h2>
			<p class="author">David Povýšil</p>
			<p class="introduction">
				Pokud chceme, aby veškeré dotazy, či jiné úkony za nás prováděl server a ne samotná aplikace, tak můžeme vytvořit API. 
				Zde se pokusím popsat, jak zhruba bychom takovou API mohli vytvořit.
				Nejprve je třeba se připojit do databáze.
			</p>
			<pre class="prettyprint linenums scroll-horizontal"><code class="language-C#">define("dbserver", "127.0.0.1");
define("dbuser", "jmeno");
define("dbpass", "heslo");
define("dbname", "nazevTabulky");
						
$db = new PDO(
    "mysql:host=" .dbserver. ";dbname=" .dbname,dbuser,dbpass,
    array(
		PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
		PDO::MYSQL_ATTR_INIT_COMMAND => "SET CHARACTER SET utf8"
		)
	);</code></pre>
			<p>
				Následně musí API zjistit, jaký dotaz vlastně aplikace vyžaduje (více o dotazech za chvíli). Toho docílí pomocí switche.
			</p>
			<pre class="prettyprint linenums scroll-horizontal"><code class="language-C#">switch ($_SERVER["REQUEST_METHOD"])</code></pre>

			<h3>Dotazy</h3>
				<p>Serveru se můžeme ptát různými dotazy: GET, POST, PUT a DELETE. Pomocí GET data získáváme, pomocí POST data odesíláme serveru, pomocí PUT data aktualizujeme a pomocí DELETE data mažeme.</p>
			<h3>GET</h3>
        <p>
          Pokud webová API zjistí, že požadavek od vaší aplikace je GET - tedy záměr aplikace je získat nějaká data z databáze - tak k tomu použije následující kód.
          $result provede jednoduchý SQL dotaz, který vybere vše z databáze a odešle zpět do vaší aplikace. Aplikace vrací data v programovacích jazyku Json, který musí vaše aplikace pomocí JsonParseru dekódovat.
        </p>
			<pre class="prettyprint linenums scroll-horizontal"><code class="language-C#">case "GET": header ("Content-Type: text/json");
// V případě, že bude aplikace chtít něco získat ze serveru, tak použije metodu GET
{
    $result = $db -> prepare("SELECT * FROM tabulka");
		$result -> execute();
		echo json_encode ($result -> fetchAll())
		break;
}
// Dotaz vybere vše z tabulky a vypíše v programovacím jazyku Json</code></pre>

			<h3>POST</h3>
        <p>
          Pokud webová API zjistí, že požadavek od vaší aplikace je POST - tedy záměr aplikace je odeslat nějaká data do databáze - tak k tomu použije následující kód.
          $result provede jednoduchý SQL dotaz, který vloží odeslané hodnoty z aplikace do databáze. V tomto případě je uloženo jméno, příjmení a věk. Vaše aplikace musí posílat na webovou API příslušné argumenty v poli pro správné fungování.
        </p>
			<pre class="prettyprint linenums scroll-horizontal"><code class="language-C#">case 'POST': header ("Content-Type: text/json");
// V případě, že bude aplikace chtít něco odeslat na server, tak použije metodu POST
{
    $result = $db -> prepare("INSERT INTO tabulka (jmeno,prijmeni,vek) VALUES ($_POST["jmeno"],$_POST["prijmeni"],$_POST["vek"]");
		$result -> execute(array($_POST["jmeno"],$_POST["prijmeni"],$_POST["vek"]));
		break;
}
// Dotaz uloží jméno, příjmení a věk do databáze</code></pre>

			<h3>PUT</h3>
        <p>
          Pokud webová API zjistí, že požadavek od vaší aplikace je PUT - tedy záměr aplikace je aktualizovat nějaká data v databázi - tak k tomu použije následující kód.
          $stmt provede jednoduchý SQL dotaz, který aktualizuje odeslané hodnoty z aplikace v databáze podle ID. V tomto případě je aktualizováno jméno, příjmení a věk podle ID. 
          Vaše aplikace musí posílat na webovou API příslušné argumenty v poli pro správné fungování.
        </p>
			<pre class="prettyprint linenums scroll-horizontal"><code class="language-C#">case 'PUT': header ("Content-Type: text/json");
// V případě, že bude aplikace chtít něco aktualizovat, tak použije metodu PUT
{
    $stmt = $db->prepare("UPDATE tabulka SET jmeno= :jmeno, prijmeni = :prijmeni, vek = :vek WHERE id = :id");
		$stmt -> execute(array(':id' => $id[1], ':jmeno' => $data['jmeno'], ':prijmeni' => $data['prijmeni'], ':vek' => $data['vek']));
		break;
}
// Dotaz aktualizuje jméno, příjmení a věk v databázi</code></pre>
			<p>
				Nicméně pozor, na školních serverech PUT nefunguje, a tudíž doporučuji využít alternativu - poslat dotaz do POSTu a POST větvit podle požadavku aplikace.
			</p>

			<h3>DELETE</h3>
      <p>
          Pokud webová API zjistí, že požadavek od vaší aplikace je DELETE - tedy záměr aplikace je smazaní nějakých dat v databázi - tak k tomu použije následující kód.
          $stmt provede jednoduchý SQL dotaz, který smaže záznam v databáze podle ID, které odeslala aplikace. V tomto případě je smazán záznam podle ID.
        </p>
			<pre class="prettyprint linenums scroll-horizontal"><code class="language-C#">case 'DELETE': header ("Content-Type: text/json");
// V případě, že bude aplikace chtít něco smazat, tak použije metodu DELETE
{
    $stmt = $db -> prepare("DELETE FROM tabulka WHERE id = :id");
		$stmt->execute(array(':id' => $id[1]));
		break;
}
// Dotaz smaže záznam v databázi podle ID</code></pre>