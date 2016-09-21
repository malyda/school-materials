<h2>Základní příkazy pro C#</h2>
<p class="introduction">Několik příkladů sloužících pro zrychlení orientace žáků v novém programovacím jazyku.</p>
<h3>String</h3>
<p>Třída String je nejběžnější prostředek pro práci s řetězcem znaků.</p>
<p>
String - je třída<br>
string - je alias pro třídu String, je <strong>vhodné používat tuto variantu</strong></p>

<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">using System.Collections;
String retezec = "Ahoj";
String.Compare(retezec, "Nazdar"); => vrací o kolik se liší dva Stringy ( 0, pokud jsou stejné)
String.Equals(retezec, "jiná hodnota")); vrací true, pokud jsou dva Stringy stejné
</code></pre>
<p>Špatné porovnání dvou řetězců</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">if(string1 == string2){}
</code></pre>
<h3>Třída Console</h3>
<p>Třída obslující komunikuci s uživatelem na úrovni příkazového řádku.</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">Using System; 	// používání jmenného prostoru System

Console.Write("slovo");	// Vypíše zadaný String do konzole a nezalomí za ním řádek
Console.WriteLine("slovo");	// Vypíše zadaný String do konzole a zalomí za ním řádek
//Některé metody v Console automatiky volají metody objektů .toString() pro převedení objektu na řetězec znaků(string)

Console.ReadLine();// vrací string s hodnotou, kterou uživatel zadal do konzole a potvrdil enterem
Console.ReadKey(); // vrací stisknutý znak na klávesnici uživatele
</code></pre>
<h3>Primitivní pole</h3>
<p>Jednoduchá pole tvroří "shluk" proměnných stejného datového typu.<br>
Primitivní pole jsou vhodná pro uložení dat v jejich nejjednoduší sekvenční pobobě.</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">string[] args; 	// jedná se o pole typu string
int[], float[], double[], char[].... 	// pro vytvoření pole z proměnné stačí zapsat za datový typ []
int[][], int[][][], double[][][][][][][] ... 	// čím více [], tím více rozměrů je schopné pole nabýt, dvourozměrná pole se používají typicky pro souřadnicové systémy, nebo obraz tabulky relační databáze tj. [sloupec][řádek]
	
int[] poleInt = new int[50];// primitivní pole musí mít specifikovanou svou délku
pole.Length;	// vrací číslo (int) s délkou celého pole
string[,] pole = new string[10, 10]; // deklarace dvourozměrného pole o velikosti 10x10
string prvekNaSourad = pole[1, 3]; // -> přístup k jednomu prvku na daných souřadnicích
</code></pre>
<h3>Kolekce</h3>
<p>
V C# se běžně používají kolekce více než primitivní pole. Jedná se doplnění primitivních polí o více metod a <strong>rozšiřitelnost</strong>.
</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">// Většina základních kolekcí je k nalezení v:
using System.Collections;
</code></pre>
<h4>List</h4>
<p>Tato kolekce je doporučená a bežně se používá.<br>
Může obsahovat pouze data stejného datového typu.</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">using System.Collections;
List< string > list = new List< string >(); // pro použití objektu je nutné vytvořit jeho instanci a určit základní datový typ, který je rozšiřován

list.Add("prvek"); // Přidá prvek do Listu
list.Clear(); // Smaže obsah Listu
list.Sort(); // Seřadí daný List
int pocetPrvku = list.Count(); // Získá počet prvků v Listu
list.RemoveAt(0); //Smaže prvek na dané pozici
       
List< int > list2 = new List< int >();
list2.Sum(); // vrátí součet vnitřních hodnot Listu
list.Select; list.Where;list.OrderBy;.... // Je možné v Listu stejně jako v databázi vyhledávat
// A mnoho dalších metod, různících se podle datového typu, který je Listem rozšiřován
</code></pre>

