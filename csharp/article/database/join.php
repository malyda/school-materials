<h2>SQL Joiny</h2>
<p class="author">Jan Půda</p>
<p class="introduction"> <strong>JOIN</strong> je syntaktická konstrukce jazyka SQL. Slouží ke spojování výsledku dotazu SELECT ze dvou vstupních množin (typicky tabulek relační databáze).</strong></p>

<h3>Příprava tabulek a dat</h3>
<p>Pro plné pochopení JOINŮ si vytvoříme dvě tabulky. Tyto tabulky se budou jmenovat <strong>Uživatelé</strong> a <strong>Články</strong></p>
<h4>Uživatelé</h4>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">CREATE TABLE [Uzivatele] (
[Id] INT IDENTITY,
[Prezdivka] NVARCHAR(155),
[Email] NVARCHAR(155),
[Heslo] NVARCHAR(255),
PRIMARY KEY ([Id])
);
</code>
</pre>
<p>Do tabulky vložíme hodnoty</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">INSERT INTO [Uzivatele] ([Jmeno], [Email], [Heslo]) VALUES
('Honza', 'honza@gmail.com', 'dGg#@$DetA53d'),
('Petr', 'petr@gmail.com', '$#fdfgfHBKBKS'),
('Martin', 'martin@gmail.com', 'Jmls_aSW2RFss'),
('Ondra', 'ondra@gmail.com', 'fw8QT32qmcsld');
</code>
</pre>
<h4>Články</h4>
<p>Článek, bude propojen s jeho autorem, tedy s Uživatelem. Tabulky propojíme tak, že do tabulky Články, přidáme sloupec s ID autora. Tam bude hodnota ID uživatele (tedy primární klíč z tabulky Uzivatele), který článek napsal.</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">CREATE TABLE [Clanky](
[Id] INT IDENTITY,
[AutorId] INT,
[Popis] NVARCHAR(155),
[Url] NVARCHAR(155),
[Titulek] NVARCHAR(155),
[Obsah] TEXT,
[Publikovano] DATETIME,
PRIMARY KEY ([Id])
);
</code>
</pre>
<p>Do tabulky Články, vložíme vzorové články. K nim přiřadíme uživatele jako autory.</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">INSERT INTO [Clanky] ([AutorId], [Popis], [Url], [Titulek], [Obsah], [Publikovano]) VALUES
(1, 'Popis C1', 'clanek-1', 'TitulekKClanku1', 'Obsah clanku 1.', '2017-4-10'),
(2, 'Popis C2', 'clanek-2', 'TitulekKClanku2', 'Obsah clanku 2', '2017-4-11'),
(3, 'Popis C3', 'clanek-3', 'TitulekKClanku3', 'Obsah clanku 3', '2017-4-12'),
(2, 'Popis C4', 'clanek-4', 'TitulekKClanku4', 'Obsah clanku 4', '2017-4-13');
</code>
</pre>
<h3>Dotazy přes více tabulek</h3>
<p>Vše potřebné máme. Nyní vytvoříme dotaz pro tyto dvě tabulky, ve kterém chceme získat články a k nim připojit jména jejich autorů.</p>
<p>Příkaz pro propojení těchto dvou tabulek je právě <strong>JOIN.</strong></p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">SELECT [Titulek], [Jmeno]
FROM [Clanky]
JOIN [Uzivatele] ON [Clanky].[AutorId] = [Uzivatele].[Id]
ORDER BY [Jmeno];
</code>
</pre>
<p>Výsledek:</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">TitulekKClanku1         Honza
TitulekKClanku2         Petr
TitulekKClanku3         Martin
TitulekKClanku4         Petr
</code>
</pre>
<p>Nejprve pomocí příkazu SELECT vyjmenujeme co nás zajímá. Jelikož vybíráme články a k nim připojujeme uživatele, budeme vybírat z tabulky Clanky. Připojení dat z jiné tabulky uděláme pomocí příkazu JOIN, kde uvedeme tabulku, kterou připojujeme, a poté klauzuli ON.</p>
<p>Klauzule ON je podobná jako WHERE, jen platí pro připojovanou tabulku a ne pro tu, ze které primárně vybíráme. V podmínce uvedeme, aby se ke každému článku připojil ten uživatel, jehož ID je uvedeno ve sloupci AutorID. Výsledek jsme seřadili podle jména uživatelů.</p>
<h3>Inner Join a Outer Join</h3>
<p><strong>INNER</strong> (vnitřní) a <strong>OUTER</strong> (vnější) <strong>JOIN</strong> jsou 2 typy příkazu JOIN. Fungují úplně stejně, jediný rozdíl je v tom, co se stane, když položka, na kterou se vazba odkazuje, neexistuje.</p>
<h4>Inner Join</h4>
<p>Pokud uvedeme v SQL dotazu pouze JOIN, pokládá ho SQL databáze za tzv. INNER JOIN. Pokud by v našem případě neexistoval uživatel s id, které je u článku uvedeno, článek bez uživatele by vůbec nebyl ve výsledcích obsažen. Vazba je nerozdělitelná.</p>
<p>Přidejme tedy pro vyzkoušení článek s neexistujícím ID autora.</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">INSERT INTO [Clanky] ([AutorId], [Popis], [Url], [Titulek], [Obsah], [Publikovano]) VALUES
(99, 'Popis C5', 'clanek-5', 'TitulekKClanku5', 'Obsah clanku 5', '2017-4-14');
</code>
</pre>
<p>Díky tomu, že se článek odkazuje na autora s ID 99, který v naší databázi není, tak po opětovném spuštění dotazu</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">SELECT [Titulek], [Jmeno]
FROM [Clanky]
INNER JOIN [Uzivatele] ON [Clanky].[AutorId] = [Uzivatele].[Id]
ORDER BY [Jmeno];
</code>
</pre>
<p>Dostaneme naprosto stejný výsledek jako předtím.</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">TitulekKClanku1         Honza
TitulekKClanku2         Petr
TitulekKClanku3         Martin
TitulekKClanku4         Petr
</code>
</pre>
<h4>Left Outer Join</h4>
<p>Vnější JOINy umožňují vybírat i ty výsledky, které se nepodařilo spojit z důvodu chybějících položek. Zkusme si tzv. LEFT JOIN, který výsledek uzná, pokud existuje levá část vazby (zde článek) a pravá (ta připojovaná, zde uživatel) neexistuje. Do hodnot sloupců z připojované části se vloží NULL.</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">SELECT [Titulek], [Jmeno]
FROM [Clanky]
LEFT JOIN [Uzivatele] ON [Clanky].[AutorId] = [Uzivatele].[Id]
ORDER BY [Jmeno];
</code>
</pre>
<p>Výsledek:</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">TitulekKClanku1         Honza
TitulekKClanku2         Petr
TitulekKClanku3         Martin
TitulekKClanku4         Petr
TitulekKClanku5         NULL
</code>
</pre>
<h4>Right Outer Join</h4>
<p>Right Outer Join naopak od Left Outer Joinu uzná vazbu v případě, že existuje pravá část a levá ne. Takže v našem případě pokud existuje uživatel, ale není k němu přiřazen článek, stejně se do výsledku zařadí.</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">SELECT [Titulek], [Jmeno]
FROM [Clanky]
LEFT JOIN [Uzivatele] ON [Clanky].[AutorId] = [Uzivatele].[Id]
ORDER BY [Jmeno];
</code>
</pre>
<p>Výsledek:</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">TitulekKClanku1         Honza
TitulekKClanku2         Petr
TitulekKClanku3         Martin
TitulekKClanku4         Petr
NULL                    Ondra
</code>
</pre>