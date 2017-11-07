<h2>Reference objektu</h2>
<p class="introduction">Když programátor vytvoří proměnnou, je pro ni vymezena paměť, programátor poté pracuje pouze s ukazatelem na tuto paměť, který se předává napříč programem (odkazuje na paměť, kde jsou data proměnné).</p>
<p class="introduction">
Instance třídy je chápána jako proměnná a pracuje se pouze s ukazatelem na paměť, kde je uložena.</p>

<h3>Předání instance třídy metodě</h3>
V objektově orientovaném programovacím jazyku je několik způsobů, jak předat data metodě.<br>
<ul>
	<li>Jako primitivní datový typ</li>
	<li>Jako primitivní pole</li>
	<li>Jako jednoduchý objekt např. String</li>
	<li>Složitý objekt např. instance třídy Osoba</li>
	<li>Nějaká forma seznamu např. List</li>
</ul>
U prvních dvou případů platí, že se vytvoří lokální kopie daného parametru a s ní daná metoda pracuje, poté se zahodí. <br>
Ve zbylých případech se předává pouze odkaz na vytvořenou instanci objektu, se kterou je možné dále pracovat a ovlivnit tak i celý objekt.<br>
Jednoduchý program, který vytvoří pole a vypíše jeho hodnoty
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# "> using System.Collections.Generic;

// Vytvoření nové instance třídy List obalující datový typ int
List<int> list = new List<int>();

// Naplnění hodnotami
list.Add(1);
list.Add(2);

// Vypsání seznamu hodnot
foreach (int one in list) Debug.WriteLine(one);

// Záměna 1. a 2. prvku v seznamu 
switchFunction(list);

// Vypsání seznamu hodnot
Debug.WriteLine("");
foreach (int one in list) Debug.WriteLine(one);


public static void switchFunction(List<int> list)
{
	int t = list[0];
	list[0] = list[1];
	list[1] = t;
}
</code></pre>
Výstup je:
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">1
2

2
1
</code></pre>
<strong>Jinak řečeno, ovlivníme-li hodnotu u referenčního datového typu, ovlivníme ji pro celý program, ne jen pro konkrétní metodu.</strong><br>