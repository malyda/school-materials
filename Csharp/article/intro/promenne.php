<h2>Proměnné</h2>
<p class="introduction">Proměnná je místo v paměti, které je vyhrazené pro určitá data, aby je bylo možné používat opakovaně.<br>
 Programátor pracuje pouze s ukazatelem na toto místo.<br>
<h3>Tvorba proměnných</h3>
<p>Nejprve je nutné proměnnou <strong>deklarovat</strong>, co je zajištění potřebného místa v paměti a přiražení k němu ukazatele.<br>
Poté se do proměnné uloží základní hodnota -><strong>inicializace</strong><br><br>
Pozn. <i>Technicky se již při deklaraci vymaže veškerý obsah, kam ukazuje ukazatel, aby se nepracovalo s daty, která na něj uložil jiný program. Poté ukazuje na prázdná místo -> null</i><br>
</p><pre class="prettyprint linenums scroll-horizontal" >
<code class="language-C# ">int x; // deklarace
x = 5; // inicializace
int x = 5; // Deklarace a inicializace na jeden řádek
</code></pre>
<h3>Přístupnost proměnných</h3>
<p>Dělí se na <strong>globální a lokální</strong>. <br></p>
<ul>
	<li> <b>Globální</b> proměnné jsou deklarované vně funkce a jsou přístupné ze všech funkcí deklarovaných v bloku, kde tyto proměnné vznikly např. uvnitř třídy.</li>
	<li> <b>Lokální</b> proměnné jsou deklarované ve funkci a jsou přístupné pouze pro danou funkci. Atributy/parametry funkce jsou také lokální proměnné.<br>
		Lokální proměnná může mít stejný název jako globální. Má vlastní paměťový prostor a může obsahovat jinou hodnotu. Po skončení bloku, kde je deklarovaná zaniká.
	</li>
	
</ul>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">Class Program()
{
	int x; // Globální proměnná
	public void Main()
	{
		int x; // Lokální proměnná
	}
}
</code></pre></p>