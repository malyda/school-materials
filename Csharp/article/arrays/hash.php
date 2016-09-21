<h2>Hashovací tabulka - hash table</h2>
<p class="introduction">Slouží k ukládání hodnot identifikovaných pomocí klíčů, které si programátor volí sám jako řetězce znaků.</p>
<strong>Klíče musí být unikátní</strong>.
Možné operace s hashovací tabulkou:
<ul>
	<li>Add(klíč,hodnota) - Přidá prvek do tabulky pod konkrétní klíč</li>
	<li>K prvkům se přistupuje pomocí indexů</li>
</ul>
<h3>Vizualizace</h3>
<table>
  <tr>
	<td><strong>Klíč</strong></td>
	<td><strong>Hodnota</strong></td>
  </tr>
  <tr>
    <td>FPSLock</td>
    <td>0</td>
  </tr>
  <tr>
    <td>FOV</td>
    <td>80</td>
  </tr>
  <tr>
    <td>SoundEnabled</td>
    <td>1</td>
  </tr>
    <tr>
    <td>Contrast</td>
    <td>30</td>
  </tr>
</table>
<h3>Zdrojový kód</h3>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">Hashtable table = new Hashtable();
// Přidání prvků do tabulky, klíče nesmí být duplikátní, data ano
table.Add("txt", "notepad.exe");
table.Add("bmp", "paint.exe");
table.Add("dib", "paint.exe");
table.Add("rtf", "wordpad.exe");

// Získání hodnoty pod zadaným klíčem
table["rtf"];
</code></pre>
Bežně je třída HashTable nahrazovaná třídou Dictionary, ta je synchronizovaná, novější, generická a ve většině případů rychlejší.

