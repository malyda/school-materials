<h2>Zásobník - stack</h2>
<p class="introduction">Nepoužívá indexy, spoléhá se na garantované pořadí: <strong>První prvek dovnitř, poslední ven</strong>.</p>
<p>Využívá se při ukládání stavů algortimů, nebo při rekurzy.</p>
<p>Možné operace se zásobníkem:</p>
<ul>
	<li>Pop() - načte a odstraní první prvek v zásobníku</li>
	<li>Push(T) - přidá prvek na konec fronty</li>
	<li>Peek() - získá první prvek fronty a nechá ho tam</li>
</ul>
<h3>Vizualizace</h3>
<img src = "images/Stack.png" class="center"><br>
<h3>Zdrojový kód</h3>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">Stack myStack = new Stack();
myStack.Push("Hello");
myStack.Push("World");
myStack.Push("!");

// Čtení prvků ve frontě
 foreach ( Object obj in myCollection ) Console.WriteLine(obj);

// Odstraní první prvek a načte ho
String prvek = myStack.Pop();

// Získá první prvek v zásobníku
numbers.Peek();
</code></pre>