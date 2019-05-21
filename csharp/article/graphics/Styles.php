
<h2>  WPF Styly</h2>
<p class="author">Josef Smola</p>
<p class="introduction"> Stejně jako ve většině aplikací, či webových stránkách je uživatelsky příjemné dodržování vzhledu a jeho neměnost. Je to jak příjemnější na pohled, tak jednodušší na vytvoření. Je tedy jednodušší vytvořit si jednotný styl, který budeme aplikovat na celé WPF, než si vzhled přenášet mezi jednotlivými okny samostatně.</p>

<p>Pokud vytváříte nějak stylizovaný projekt, určitě se bude chtít vyvarovat různorodosti vzhledu a také si budete chtít ulehčit práci. Od toho tu jsou jednotné styly, které jsou k dispozici i při vytváření WPF aplikací. Jedná se o laicky řečeno jednotnou šablonu, kterou si vytvoříte vzhled pro celý svůj projekt. Vyvarujete se tím rozkopírovávání vzhledu mezi jednotlivými prvky, okny a tomu i chybám, které během tohoto procesu nastávají (např. zapomenete/špatně okopírujete nějakou část apod.). Ano, u jednoduchého maloprvkového projektu je to snesitelné, jelikož toho kopírování není tolik, ale pokud pracujete na větším projektu, rozhodně se rozkopírovávání vyhněte. Je ho tolik, že to přerůstá přes hlavu. => Bez jednotného stylu se neobejdete, pokud si chcete zachovat psychické zdraví.</p>

<h3>WPF GRID</h3>
<p class="introduction">Co je to vlastně WPF grid a k čemu je?</p>
<p>Jedná se o velice důležitou věc ve vzhledovém formátování WPF aplikací. Je to forma pozicování, přičemž je okno WPF aplikace rozděleno do řádků a sloupců (počet řádků a sloupců si nadefinuje každý jak potřebuje). Tyto řádky a sloupce se poté přidělují k jednotlivým prvkům, tím je definována jejich pozice v okně.</p>


<strong>Definice gridů</strong>
<p>
    <i>Definici gridů píšeme do již předdefinovaného Gridu, který je prázdný.</i>
</p>

<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">Grid.Rowdefinitons
// Započne definování řádků v okně.

RowDefinition Height='xx'
// Nadefinuje jeden řádek, místo "xx" se dosazuje hodnota v pixelech.

Grid.ColumnDefinitions
// Započne definování sloupců v okně.

ColumnDefinition Width='xx'
// Nadefinuje jeden sloupec, místo "xx" se dosazuje hodnota v pixelech.

// Pokud nenadefinujeme výšku/šířku, grid nám automaticky tyto hodnoty nastaví tak, aby vyplnily celé okno podle počtu řádků/sloupců.

// Nyní máme nadefinovaný sloupec a řádek. Řádků a sloupců můžeme přidat kolik potřebujeme. Nyní je potřeba k určitým prvkům přiřadit jejich pozice.

TextBox Grid.Column="xx" Grid.Row="xx"
// TextBox jsme dosadili do pozice ve sloupci a řádku. Místo "xx" se dosadí číslo řádku/sloupce přičemž se řádky/sloupce počítají od 0.


// Čtení prvků ve frontě
 foreach ( Object obj in myCollection ) Console.WriteLine(obj);

// Odstraní první prvek a načte ho
String prvek = myStack.Pop();

// Získá první prvek v zásobníku
numbers.Peek();
</code>
</pre>

<img src="images/grid1.PNG">
<p>
    <i>Konečný výsledek.</i>
</p>

<img src="images/grid2.PNG">
<p>
    <i>Nastavení Gridu v okně.</i>
</p>

<h3>Lokální styl</h3>
<p>Jedná se o nastylování aktuálního okna přímo v ovládání pod oknem preview okna. Vesměs jde jen o definování vzhledu pro prvky na aktuálním okně.</p>

<img src="images/local1.PNG">
<p>
    <i>Konečný výsledek.</i>
</p>

<img src="images/local2.PNG" height="60px">
<p>
    <i>Nastavení okna.</i>
</p>

<p>
    <i>Možnosti nastavení vzhledu prvku je opravdu mnoho, od barev až po ohraničení, velikost fontu aj.</i>
</p>

<h3>Styl pro celou aplikaci</h3>
<p>Tento druh stylu nám nastyluje celou aplikaci. Není pak potřeba rozkopírovávat, či znovu nastavovat vzhled na jednotlivých oknech.

    Vzhled definujeme v "App.xaml", které nám vytvoří Visual Studio již při založení projektu (k nalezení vpravo v solution exploreru).</p>

<pre class="prettyprint linenums scroll-horizontal"
<code class="language-C# ">// Hodnoty se zapisují do Application.Resources
    Style TargetType="xx"
    // Nejprve zvolíme cílový prvek, který nám bude styl definovat. Místo "xx" lze zvolit cokoliv z prvků, zvolil jsem TextBox, jak můžete vidět na screenshotu níže.

    Setter Property="xx" Value="xx"
    // Setter nám nastavuje hodnoty(vzhled) pro námi zvolený prvek výše. Místo "xx" u Property se nastaví část vzhledu, kterou chceme modifikovat a u Value její volitelná hodnota. Níže můžete vidět, že jsem zvolil několik věcí k modifikování, např.: Property="Foreground" a Value="Blue".
</code>
</pre>

<img src="images/appstyle4.PNG">
<p>
    <i>Konečný výsledek.</i>
</p>

<img src="images/appstyle1.PNG">
<p>
    <i>App.xaml v solution exploreru.</i>
</p>
<img src="images/appstyle2.PNG">
<p>
    <i>Nastavení stylů v solution exploreru.</i>
</p>

<img src="images/appstyle3.PNG">
<p>
    <i>Nastavení okna.</i>
</p>


<p>
    <i>V okně už pouze vytvoříme daný prvek, který se nám poté automaticky zmodifikuje podle výše nastavených stylů.</i>
</p>


<h3>Zdroje</h3>
<a href="http://www.wpf-tutorial.com/styles/using-styles/">http://www.wpf-tutorial.com/styles/using-styles/</a>
<a href="https://msdn.microsoft.com/en-us/library/ms745683(v=vs.110).aspx">https://msdn.microsoft.com/en-us/library/ms745683(v=vs.110).aspx</a>
<a href="https://wpftutorial.net/GridLayout.html">https://wpftutorial.net/GridLayout.html</a>

