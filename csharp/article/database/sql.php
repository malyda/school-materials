<h2>SQL</h2>
<p class="introduction">
    V databázi je uloženo velké množství dat, která je potřeba automatizovaně zpracovávat. K ulehčení práce s relačními databázemi vznikl dotazovací strukturovaný jazyk SQL.
</p>
<a href="https://sqlbolt.com/">Procvičení SQL</a>
<h3>Historie</h3>
<ul>
    <li>
        Vznik v 70. letech spolu s vývojem relační databáze u IBM jakožto jazyk SEQUEL, dotazy jsou psány co nejblíže angličtině
    </li>
    <li>
        Standartizován institutem ANSI jako SQL-86 (rok vydání), další standarty SQL-92 (SQL2) a dnešní SQL-99 (SQL3)
    </li>
    <li>
        Většina databází obsahuje jen část prvků z norem. Přenositelnost SQL dotazů mezi různými DB používající SQL je tedy omezená
    </li>
</ul>

<h3>Datové typy</h3>
<p>
    Každý sloupec v SQL databázi má přidělený datový typ, ten určuje jakou část paměti pro daný sloupec použijeme a tedy i jak velkou hodnotu můžeme do pole uložit.
</p>
<ul>
    <li>
        int - Celočíselné hodnoty
    </li>
    <li>
        varchar - Znaky
    </li>
    <li>
        text - Znaky s dynamickou délkou
    </li>
    <li>
        bit - Bolean
    </li>
</ul>

<h3>Klíče (Indexy)</h3>
<p>
    SQL jazyk využívá škálu indexů, což jsou databázové konstrukce, které slouží ke zrychlení vyhledávání a dotazování v databázi. Při správném použití indexování lze vidět značné zrychlení databáze jako celku.
</p>
<p>
    Příliš mnoho nerozvážných indexů přináší opačný dopad a výsledek může ztrácet na efektivitě.
</p>
<p>
    Rozlišujeme několik základních indexů:
</p>
<ul>
    <li>
        Primární - (PRIMARY)
    </li>
    <li>
        Unikátní - (UNIQUE)
    </li>
    <li>
        Sekundární - (INDEX)
    </li>
    <li>
        Fulltextové - (FULLTEXT)
    </li>
    <li>
        Kandidátní - (CANDIDATE KEY)
    </li>
    <li>
        Cizí - (FOREIGN KEY)
    </li>
</ul>

<h4>Primární klíč</h4>
<p>
    Primární klíč je pro každý záznam unikátní a jednoznačně definován sloupcem, či více sloupci. Ze zvyklosti, je vžitá konvence nazývat tento sloupec ID a používat celočíselný datový typ (SMALLINT, INT).
</p>
<h4>Kandidátní klíč</h4>
<p>
    Jedná se o indexy, které splňují stejné podmínky jako primární klíč. Jsou to tedy unikátní hodnoty, dle kterých se dají záznamy jednoznačně indentifikovat.
</p>
<h4>Cizí klíč</h4>
<p>
    Cizí klíč definuje vztah mezi dvěmy tabulkami, a to tak, že hodnota ve sloupci odkazuje na jinou (primární) tabulku, která v ní musí existovat. Tomuto spojení se též říká reference nebo odkaz.
</p>
<p>
    Na cizí klíč lze nastavit handlery, které se spustí při úpravě/smazání hodnoty, na kterou odkazují.
</p>
<h3>SQL příkazy</h3>
<p>
    SQL příkazy lze dělit na pět základních skupin:
</p>
<ol>
    <li>
        Příkazy pracující s daty  (SELECT, INSERT, UPDATE, DELETE, ...)
    </li>
    <li>
        Příkazy pro definici prostředí (CREATE, ALTER, DROP, ...)
    </li>
    <li>
        Příkazy pro řízení přístupových práv (GRANT, REVOKE)
    </li>
    <li>
        Příkazy pro řízení transakcí (START TRANSACTION, COMMIT, ROLLBACK)
    </li>
    <li>
        Ostatní a speciální příkazy
    </li>
</ol>
<h4>Příklady příkazů</h4>
<h5>SELECT</h5>
<p>
    Slouží k výpisu dat z databáze podle určitých kritérií.
</p>

<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">Syntax  SELECT `table`.`row` FROM `table`;
SELECT * FROM `table`;
</code></pre>

<p>
    Další nepovinné sektory příkazu
</p>
<ul>

    <li>
        WHERE - Vybere pouze výsledky odpovídající následující podmínce
    </li>
    <li>
        JOIN - Spojí dotaz s jinou tabulkou a prováže je danými sloupci
    </li>
    <li>
            GROUP BY - Sloučí stejné výsledky dle daného sloupce
    </li>
    <li>
            ORDER BY - Seřadí dle sloupců
    </li>
    <li>
            LIMIT - Vybere výsledky od daného pořadí, druhé číslo určuje počet řádků.
    </li>
</ul>
<p>
    Příklady příkazů
</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">SELECT * FROM `table` WHERE `id` = 3;
SELECT `id` FROM `table` WHERE `name` LIKE 'admin';
SELECT * FROM `table` WHERE `psw` = '4ccfef82'
SELECT * FROM `table` WHERE `lastActive` < 1406547898 ORDER BY `id` ASC;
SELECT * FROM `table` WHERE 50, 100;
SELECT * FROM `table` AS `u` JOIN `userInfo` AS `ui` ON `u`.`id`=`ui`.`id`;
SELECT COUNT(*) FROM `table` WHERE `agree` = 1;
SELECT `table`, COUNT(`money`) FROM `transactions`;
</code></pre>

<h5>Insert</h5>
<p>
    Slouží k zápisu dat do databáze.
</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">INSERT INTO `table` (`row`,`row2`) VALUES (12, 'val'), ( 15, 'val');
</code></pre>
<h5>Update</h5>
<p>
    Slouží k přepisu dat v databázi.
</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">
UPDATE `table` SET `row` = 'aa';
UPDATE `table` SET `row` = `rowOld`;
UPDATE `table` SET `row` = `rowOld` + 1;
</code></pre>

<h5>Delete</h5>
<p>
    Slouží k mazání dat z databáze.
</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">DELETE FROM `table`;
DELETE FROM `table` WHERE `accept` = 0 LIMIT 50;
</code></pre>
