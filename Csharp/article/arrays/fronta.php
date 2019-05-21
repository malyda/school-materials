<h2>Fronta</h2>
<p class="introduction">Jedna ze základních datových struktur.<br>
Nepoužívá indexy, spoléhá se na garantované pořadí: <strong>První prvek dovnitř, první ven</strong>.</p>
<p>Speciálním typem fronty je prioritní fronta, kde mohou prvky, dle své priority "předbíhat".</p>
<p>Možné operace s frontou:</p>
<ul>
	<li>Dequeue() - načte a odstraní první prvek ve frontě</li>
	<li>Enqueue(T) - přidá prvek na konec fronty</li>
	<li>Peek() - získá první prvek fronty a nechá ho tam</li>
</ul>
<h3>Vizualizace</h3>
<img src = "images/Queue.png" class="center"><br>
<h3>Zdrojový kód</h3>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">Queue<string> numbers = new Queue<string>();
numbers.Enqueue("one");
numbers.Enqueue("two");
numbers.Enqueue("three");
numbers.Enqueue("four");
numbers.Enqueue("five");

// Čtení prvků ve frontě
foreach( string number in numbers ) Console.WriteLine(number);
// Odstraní první prvek
String prvek = numbers.Dequeue();

// Získá první prvek ve frontě
numbers.Peek();
</code></pre>