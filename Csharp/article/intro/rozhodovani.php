<h2>Rozhodování</h2>
<p class="introduction">Programy musí umět reagovat na vícero situací a být schopné vždy zvolit správnou variantu řešení - musí se tedy umět rozhodovat.<br>
Každé rozhodnutí musí splňovat jasně dané podmínky.</p>

<p>Jednoduchý zápis pro rozhodování</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">if(podmínka)
{
 //pokud je podmínka splněna
}
else
{
 // pokud je podmínka nesplněna
}
</code></pre>
<p>Či ve zkráceném zápisu</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">if(podmínka) // splněná
else // nesplněná
</code></pre>
<p>Podmínky je možné vnořovat do sebe.<br></p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">if(podmínka)
{
	if(další podmínka)
	{
	 if...
	}
	else
	{}
}
else
{
	if(další podmínka)
	else
}
</code></pre>
<p>Nesplní-li se podmínka, je možné zapsat další podmínku takto</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# "> else if(podmínka)
</code></pre>
<p>Podmínka je vždy buď pravda nebo nepravda -> <strong>true/false</strong></p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">// Podmínka - je pravda?
if(true) // je splněna vždy

boolean b = true;
if(b) // pokud je b = true podmínka je opět splněna
</code></pre>
<p>Všechny podmínky se ptají na výslednou hodnotu = true/false a na jejím základě se provede blok pro splněnou podmínku nebo blok pro nesplněnou.</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">if(isset(proměnná)) provedAkci;// Akce je provedena pokud funkce isset vrátí true
else provedAkci2; // Akce je provedena pokud funkce isset vrátí false
</code></pre>
<p>Myšlenka pro vyhodnocení, zda je podmínka splněná nebo ne, je použitelná ve všech případech, kde je možné vyhodnocovat podmínky např. if, nebo cykly: while, for atd.</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">if(true) podmínka je vždy splněná
while(true) //nekonečný cyklus, podmínka je vždy splněná
</code></pre></p>

<h3>Booleova algebra</h3>
<p>Dvě hodnoty se v C# porovnávají pomocí logických funkcí - AND, OR, NOT, atd., nebo pomocí porovnávání GE, EQ, LT atd. a porovnávání typů IS, ISNOT, AS... <br><br>
V C#<ul> 
	<li> AND -> && </li>
	<li> OR -> || </li>
	<li> EQ -> == </li>
	<li> NOT -> != </li>
	<li> GE -> >= </li>
	<li> GT -> > </li>
	<li> LT -> < </li>
	<li> LE -> <= </li>
</ul>
<br>
<p>Při použití <b>==</b> se hodnota výrazu převede do <strong>binární</strong> podoby a použije logická funkce <strong>EQ</strong>, která vrací 1/0 -> true/false (ekvivalence)</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">//Je 1 = 1?
if(1 == 1)// splněná podmínka
else //nesplněná podmínka
</code></pre>
<h4>Pokud nelze převést do binární podoby</h4>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">//Je ahoj v proměnné ahoj = ahoj v proměnné ahoj2?
string ahoj = "ahoj";
string ahoj2 ="ahoj";
if(ahoj == ahoj2) //Podmínka je splněná

//Je ahoj v proměnné ahoj = ahoj v proměnné ahoj2?
string ahoj = "ahoj";
string ahoj2 ="ahoj2";
if(ahoj == ahoj2)
// Podmínka je splněná
// V tomto případě <strong>== znamená "porovnej", jestli je objekt1 a objekt2 ve stejném paměťovém prostoru. </strong>
</code></pre>
<p>Podmínka je splněná, protože objekt String/string je vytvořen při zavádění programu a poté je pouze rozšiřován/pozměňován, tedy jeho paměťový prostor je stále stejný.</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">string ahoj = "ahoj"; 
string ahoj2 ="ahoj2";
// Proto podmínka v praxi vypadá
if(string == string)// Což je pravda a podmínka je splněná
</code></pre></p>
<h4>Switch</h4>
<p>Je-li potřeba zapsat za sebou mnoho podmínek, kdy je hodnota porovnávaná pokaždé s jinou hodnotou, je možné použít switch.<br>
Porovnává zadanou hodnotu s každou hodnotou v case.<br>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">string pozdrav = "ahoj"; 
switch(pozdrav) // porovnávaná hodnota
{
	case "ahoj": // porovnání proměnné ahoj s řetězcem znaků "ahoj"
		provedAkci;
		break; // pokud je podmínka splněná, další porovnávání je dobré přerušit pomocí break
	case "na shledanou":
		provedAkci2;
		break;
	case "sbohem":
		provedAkci3;
		break;
	default:  // default je použit, pokud žádná hodnota v case není ekvivalentní s hodnotou udanou podmínce switch
		provedAkci4;
		break;
}
// ekvivalentem pro tento switch je:
if(pozdrav.equals("ahoj"))provedAkci;
else if( pozdrav.equals("na shledanou") )provedAkci2;
else if( pozdrav.equals("sbohem") )provedAkci3;
else provedAkci4;
</code></pre></p>