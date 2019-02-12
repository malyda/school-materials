<h2>  Visual Studio - Snippety</h2>
<p class="author">Tomáš Smetana</p>
<p class="introduction"> Jednou ze zásadních funkcí Visual Studia, která výrazně zjednodušuje psaní opakujícího se zdrojového kódu, jsou <Strong>snippety</Strong>.</p>

<h3>Vložení snippetu</h3>
<p>Snippet se vloží pomocí kliknutí pravého tlačítka myši přes možnost <Strong>Insert Snippet</Strong>.</p>
<img class="image1" src="images/image1.png" class="demo-avatar" alt="image">

<p>Otevře se seznam složek obsahující snippety. Vyberme složku C# a snippet s názvem prop. Dvakrát na něj poklepejme.</p>
<img class="image2" src="images/image2.png" class="demo-avatar" alt="image">

<p>Do zdrojového kódu se vloží definice vlastnosti v C# s 2 zvýrazněnými částmi (datovým typem a názvem vlastnosti).</p>
<img class="image3" src="images/image3.png" class="demo-avatar" alt="image">

<p>Obě části lze přepisovat a přesouvat se mezi nimi dá tabulátorem. Jedná se o velmi rychlý způsob, jak napsat vlastnost v C#. </p>
<p>Výhoda snippetů je že nemusíte psát nic navíc, jako je např. slovo public a oblast get a set v závorkách.</p>
<p>Vkládání snippetů z nabídky jde celkem špatně a proto existuje ještě jedna možnost, jak je vložit, a to tak, že se do kódu ručně napíše jejich název a stiskne se tabulátor. Snippet není moc dobře odsazen - například odsazení složených závorek.</p>
<img class="image4" src="images/image4.png" class="demo-avatar" alt="image">

<h3>Tvorba vlastního snippetu</h3>
<p>Velkou výhodou je možnost vytvořit si svoje vlastní snippety. Snippet je reprezentován jako XML soubor, který definuje, jak bude snippet vypadat, kde jsou oblasti k zadávání hodnot, atd…</p>
<p>Nejjednodušší příklad snippetu, je ten, který vloží meta hlavičky s informacemi, aby webové prohlížeče načítanou stránku neukládali do cache. Snippet se tedy bude používat v jazyce HTML. V nabídce file se vybere New > File a vyhledá se XML soubor.</p>
<img class="image5" src="images/image5.png" class="demo-avatar" alt="image">
<p>Potvrzením Open se vytvoří kořenový element CodeSnippets a jako jmenný prostor se nastaví:</p>
<a href="http://schemas.microsoft.com/VisualStudio/2005/CodeSnippet">http://schemas.microsoft.com/VisualStudio/2005/CodeSnippet</a>

<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">?xml version="1.0" encoding="utf-8"?
CodeSnippets xmlns="http://schemas.microsoft.com/VisualStudio/2005/CodeSnippet"

/CodeSnippets
</code>
</pre>

<p>Vložení nového elementu CodeSnippet.</p>
<img class="image6" src="images/image6.png" class="demo-avatar" alt="image">
<p>Visual Studio označí element CodeSnippet se 2 varováními. Jednak se musí specifikovat parametr Format a za druhé musí mít CodeSnippet hlavičku. Musí se tedy doplnit parametr Format na hodnotu 1.0.0 (aktuální podporované snippety mají právě tuto verzi). Dále snippet musí mít hlavičku, jedná se o element Header. Poslední důležitou věcí je, že ve snippetu chybí element Snippet, který definuje samotný kód snippetu. Pořadí hlavičky a Snippetu se nesmí zaměnit, jinak se nebude jednat o validní Snippet a Visual Studio ho podtrhne s varováním. Zdrojový kód snippetu vypadá následovně:</p>

<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">?xml version="1.0" encoding="utf-8"?
CodeSnippets xmlns="http://schemas.microsoft.com/VisualStudio/2005/CodeSnippet"
	CodeSnippet Format="1.0.0"
    	Header

    	/Header
        Snippet

        /Snippet
	/CodeSnippet
/CodeSnippets
</code>
</pre>

<h3>Hlavička snippetu</h3>
<p><Strong>IntelliSense</Strong> (našeptávač) napovídá, jaké hodnoty by se měli vyplnit.</p>
<img class="image7" src="images/image7.png" class="demo-avatar" alt="image">

<h4>Autor</h4>
<p>Element <Strong>autor</Strong> obsahuje jméno nebo instituci autora.</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">Author
	Tomáš Smetana
/Author
</code>
</pre>

<h4>Description</h4>
<p><Strong>Popisek</Strong>, který výstižně označí, k čemu snippet slouží. V tomto případě se jedná o zabránění cachování.</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">Description
	Disable cache by meta tags in head element
/Description
</code>
</pre>


<h4>HelpUrl</h4>
<p><Strong>HelpUrl</Strong> označuje adresu, která se otevře při vyvolání nápovědy (F1). Využití odkazu:</p>
<a href"http://stackoverflow.com/…1133/2229538">http://stackoverflow.com/…1133/2229538</a>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">HelpUrl
	http://stackoverflow.com/a/1341133/2229538
/HelpUrl
</code>
</pre>

<h4>KeyWords</h4>
<p><Strong>Keywords</Strong> označuje klíčová slova. Zadávají se v podelementech KeyWord. Použijeme třeba klíčová slova web browsers, cache, force, disable</p>

<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">Keywords
	Keyword
		web browsers
	/Keyword
/Keywords
</code>
</pre>

<h4>Shortcut</h4>
<p>Označuje, pod jakou zkratkou se bude snippet vyvolávat. Měl by být krátký, protože kdyby byl dlouhý, začínal by postrádat smysl a ideálně by měl být snadno zapamatovatelný (např. prop = Property.).</p>

<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">Shortcut
	discach
/Shortcut
</code>
</pre>

<h4>SnippetTypes</h4>
<p>Typy snippetů můžeme použít 2. Existuje <Strong>SurroundsWith a Expansion</Strong>. SurroundWith vkládá snippet okolo vybrané oblasti a Expansion ke kurzoru. Typ se udává v elementu SnippetType:</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">SnippetTypes
	SnippetType
		Expansion
	/SnippetType
/SnippetTypes
</code>
</pre>

<h4>Title</h4>
<p>Je samotný <Strong>titulek</Strong> snippetu. Jedná se o název v správci snippetů a v nabídce výběru snippetu.</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">Title
	Disable browser cache
/Title
</code>
</pre>

<h4>Obsah snippetu</h4>
<p>Obsah snippetu se udává v elementu <Strong>Code</Strong>. Code vyžaduje parametr <Strong>Language</Strong>, který specifikuje, o jaký programovací jazyk se jedná. Obsah kódu se udává v sekci <Strong>CDATA</Strong>.</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">Code Language="html"
![CDATA[
        ]]
/Code
</code>
</pre>
<p>V sekci CDATA budeme mít naše meta hlavičky, které najdeme v odkazu pro nápovědu.</p>
<p>Celý element Code bude vypadat následovně:</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">Code Language="html"
	![CDATA[meta http-equiv="cache-control" content="max-age=0" /
		meta http-equiv="cache-control" content="no-cache" /
		meta http-equiv="expires" content="0" /
		meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" /
		meta http-equiv="pragma" content="no-cache" />]]
/Code
</code>
</pre>
<p>Nakonec se snippet uloží s příponou *.snippet (File > Save).</p>
<img class="image8" src="images/image8.png" class="demo-avatar" alt="image">

<h3>Instalace snippetů</h3>
<p>Visual Studio zatím neví, že jej chce uživatel použít. Je potřeba znovu otevřít správce snippetů.</p>

<h4>Přidání celé složky</h4>
<p>Visual studio umí načítat snippety ze složky. Dělá se to tlačítkem Add… a následným vybráním složky.</p>

<h4>Import snippetu</h4>
<p>Snippety lze importovat i jednotlivě pomocí tlačítka <Strong>Import…</Strong> a následným vybráním snippetu.</p>
<p>Snippety lze načítat i ze sítě. Hodí se to zejména ve firmách, kdy zaměstnanci mezi sebou mohou snippety sdílet.</p>
<p>Snippet si naimportujte nebo nechte načítat složku. Pak vytvořme novou webovou stránku HTML (Fie > New > File > HTML page) a zkusme si vložit snippet. Uvidíte, že zdrojový kód se vloží.</p>
