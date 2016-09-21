<h2>Primitivní pole</h2>
<p class="introduction">Jedná se o pole (array), které rozšiřuje primitivní datové typy např. int, char a bez možnosti změny své velikosti.</p>
Opakování:<br>
<ul>
	<li>Pole si lze představit jako velkou skříň, která obsahuje jednotlivé šuplíky. Nebo řadu čísel, kde můžeme identifikovat každou číslici.</li>
	<li>Každý "šuplík" je identifikován pomocí čísla -> 1. šuplík, 2. šuplík. Můžeme použít pro člověka přijatelnější číslování, jako první, či druhý šuplík.</li>
	<li>Číslování je vždy od <strong>0</strong>, 1. šuplík je tedy šuplík č. 0.</li>
	<li>Jednotlivá čísla nazýváme <strong>indexy</strong>.</li>
	<li>Pomocí indexů můžeme ukazovat na konkrétní šuplíky.</li>
</ul></p>
<h3>Deklarace primitivního pole</h3>
Deklarace pole čísel o velikosti 32 (indexy: 0-31).
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">int[] ciselnePole = new int[32];
</code></pre>
<p>Používáme zde znaky [ ] pro označení pole u datového typu proměnné (levá strana deklarace).<br>
Poté ještě jednou pro označení velikosti pole (pravá strana deklarace).
<br><br><i>Pozn. všimněme si, že při deklaraci nového pole neodkazujeme na konstruktor.</i><br><br>
Při deklaraci pole můžeme použít místo konkrétního čísla i proměnnou.<br>
Pole v C# mají po deklaraci <strong>neměnnou délku</strong>.<br><br>
Příklady dalších deklarací:</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">String[] stringovePole = new String[50];
bool[] boolPole = new bool[90];
long[] longPole = new long[150];
char[] charPole = new char[5];
</code></pre>
<h3>Prvky v poli</h3>
<p>Po deklaraci pole lze k jednotlivým prvkům přistoupit pomocí jejich indexů. Poté se s nimi pracuje jako s běžnou proměnnou daného dat. typu.</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">int[] ciselnePole = new int[32];
ciselnePole[0] = 5;
ciselnePole[10] = 500+10;
// Běžné operace s int
ciselnePole[30] = ciselnePole[10] - ciselnePole[0];
</code></pre>
<p>Po deklaraci má každý prvek pole základní hodnotu určenou pro daný datový typ (int = 0; String = null).</p>
<h3>Procházení pole</h3>
<p>Díky indexům lze pole procházet pomocí běžných iterovatelných cyklů (for, while, dowhile).<br>
Naplnění číselného pole, tak aby hodnota prvku odpovídala jeho indexu.</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">int[] ciselnePole = new int[32];
for (int i = 0; i < ciselnePole.Length; i++) ciselnePole[i] = i;
</code></pre>
<p><i>Pozn. proměnná Length je read-only a vrací číselnou hodnotu, která odpovídá počtu prvků v poli.</i><br><br>
Lze využít i foreach cyklu</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">int[] ciselnePole = new int[32];
foreach (int prvek in ciselnePole) Console.WriteLine(prvek);
</code></pre>