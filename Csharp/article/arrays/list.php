<h2>Seznam - List, Vector</h2>
<p class="introduction">Seznam je odvozená datová struktura, jeho interpretace se liší dle objektu, který rozšiřuje. Základní vlastností je, že se může dle potřeby zvětšovat či zmenšovat.</p>
<p>Umožňuje přidat libovolný počet prvků na rozdíl od primitivního pole, kde je počet prvků v poli pevně stanoven.</p>
<p>Z hlediska paměti je Seznam náročnější než primitivní pole, protože si udržuje přehled o pořadí prvků.<br>
V běžném použití rozlišujeme List a Vector ze dvou důvodů:</p>
<ol>
	<li>List při rozšiřování alokuje polovinu své velikosti, List není synchronizovaný</li>
	<li>Vector se zvětšuje 2x, Vector je synchronizovaný</li>
</ol>
<p><i>Pozn. synchronizovaný znamená, že v jednu chvíli může s danými daty pracovat pouze jedno vlákno. Nesynchronizovaná datová struktura je k dispozici více vláknům v jeden čas, např. čtení a zápis.</i><br>
</p>
<h3>Spojový seznam - Linked List</h3>
<p>Spojový seznam je rozšíření běžného seznamu.<br>
Dle toho, jaká data o prvcích spojový seznam ukládá se liší jeho jednotlivé typy.</p>
<img src = "images/LinkedList.png" class="center"><br>

<h3>Zdrojový kód</h3>
<p><strong>List</strong></p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">using System.Collections;
// Při používání Listu je nutné specifikovat datový typ, který rozšiřuje
List< string > list = new List< string >();

// Přidá prvek na konec Listu
list.Add("prvek");
// Smaže veškerý obsah Listu
list.Clear();
// Seřadí daný List
list.Sort(); 

List< int > list2 = new List< int >();
// Metody Listu se liší dle typu, který rozšiřuje
// vrátí součet vnitřních hodnot Listu
list2.Sum(); 
</code></pre><br>

<h4>ArrayList</h4>
<p><strong>Zastaralá</strong> kolekce, je možné ji stále používat. ArrayList nekontroluje datový typ dat, které se do něj ukládají. Často vznikají problémy při automatickém zpracování, kdy se do této kolekce dostanou hodnoty, které zde nemají co dělat.</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">using System.Collections;
ArrayList arrayList = new ArrayList();	// pro použití objektu je nutné vytvořit jeho instanci

arrayList.Add("prvek");     // přidá prvek na konec pole
arrayList.Add(1);   // přidá prvek na konec pole
arrayList.Insert(1, "prvek2");     // vloží na dané místo zadaný prvek
arrayList.Clear(); // vymaže obsah pole
arrayList.Contains("prvek"); // vrací true/false pokud je daný prvek v poli
arrayList.ToArray(); // konvertuje ArrayList na jednoduché pole
	// A mnoho dalších metod
</code></pre>
<p><strong>Chybový stav ArrayList</strong></p>
<p>Program se zkompiluje a běží, dokud nenarazí na řetězec znaků místo čísla.<br>
V runtime "spadne", protože nelze k číslu sum přičítat řetěžec znaků.</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">ArrayList arrayList = new ArrayList();
arrayList.Add(1);
arrayList.Add(2);
arrayList.Add(3);
arrayList.Add(4);
arrayList.Add(5);
arrayList.Add("prvek");
int sum = 0;

foreach(int x in arrayList)
{
	summ += x;
}
</code>
</pre>
<p>Při hledání chybového stavu aplikace bude programátor nejdříve hledat chybu v přičítání čísel, poté zjistí, že je chyba v uložení dat v ArrayList a až poté začne řešit problém s tím, jak se špatná hodnota do ArrayList dostala.</p> 

<a href='http://beginnersbook.com/2013/12/difference-between-arraylist-and-vector-in-java/' class="right"> Rozdíl mezi ArrayList a Vector</a><br>
<a href='http://stackoverflow.com/a/2279059/3864686'class="right"> Rozdíl mezi ArrayList a List</a><br>
<a href='http://stackoverflow.com/questions/169973/when-should-i-use-a-list-vs-a-linkedlist'class="right"> Kdy použít LinkedList, ArrayList či List</a>

