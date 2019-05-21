<h2>  Design Patterns - Interpreter</h2>
<p class="author">Marek Moravčík</p>
<p class="introduction"> Interpreter slouží k překladu gramatiky z libovolného „jazyka“ do obecné formy. Vytváří reprezentaci pro části gramatiky a je zároveň schopen větu nebo frázi interpretovat skrze definice vytvořené uživatelem. </p>

<p>Pozn.
    <i> Jazykem je chápán jakýkoliv obor slov, který obsahuje nějakou strukturu (gramatiku).</i>
</p>

<h3>Kdy použít Interpreter?</h3>
<p>Používá se v případech, kdy je třeba interpretovat gramatiku některého jazyka. Interpreter lze použít v případě, že je možné definovat pravidla gramatiky, podle kterých se jazyk bude řídit.</p>

<h3>Použití</h3>
<img src="images/InterpreterUML.gif" alt="UML diagram">

<p><strong>Client</strong> reprezentuje rozhraní skrze které se vytváří abstraktní strom expresí a volá samotnou interpretaci věty</p>
<p><strong>AbstractExpression</strong> definuje interface použitý pro interpretaci</p>
<p><strong>TerminalExpression</strong> vyjadřuje konečný výraz</p>
<p><strong>NonterminalExpression</strong> vyjadřuje složený výraz, pro který obsahuju další definice vyjadřující části výrazu</p>
<p><strong>Context</strong> obsahuje globální informaci s kterou se pracuje</p>
<strong>C#</strong>
<p></p>








<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">Context context = new Context();
 // Abstraktní strom výrazů
ArrayList list = new ArrayList();
list.Add(new TerminalExpression());
list.Add(new NonterminalExpression());


// Interpretace
foreach (AbstractExpression exp in list)
{
	exp.Interpret(context);
}</code>
</pre>

<pre class="prettyprint linenums scroll-horizontal"><code class="language-C# ">// Abstraktní třída
abstract class AbstractExpression
  {
    public abstract void Interpret(Context context);
  }

  // Třída konečného výrazu
  class TerminalExpression : AbstractExpression
  {
    public override void Interpret(Context context)
    {
		// Udělej něco pro konečný výraz
    }
  }

  // Třída složeného výrazu
  class NonterminalExpression : AbstractExpression
  {
    public override void Interpret(Context context)
    {
		// Udělej něco pro složený výraz
    }
  }</code>
</pre>

<h3>Ukázka</h3>
<p>Překlad římských číslic na arabské</p>
<p></p>


<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">string roman = "MMXVIII";
Context context = new Context { Input = roman };
</code>
</pre>

<p>List výrazů</p>
<pre class="prettyprint linenums scroll-horizontal"><code class="language-C# "> List<Expression> tree = new List<Expression>();
	 tree.Add(new ThousandExpression());
	 tree.Add(new HundredExpression());
	 tree.Add(new TenExpression());
	 tree.Add(new OneExpression());</code>
</pre>

<p>Interpretace zvoleného čísla</p>
<pre class="prettyprint linenums scroll-horizontal"><code class="language-C# "> foreach (Expression expression in tree)
{
	expression.Interpret(context);
}

 Console.WriteLine("{0} = {1}", roman, context.Output);

 // Počkej na uživatele
Console.ReadKey();
</code>
</pre>

<p>Definice třídy s textem </p>
<pre class="prettyprint linenums scroll-horizontal"><code class="language-C# "> class Context
{
	public string Input { get; set; }
	public int Output { get; set; }
}
</code>
</pre>

<p>Definice abstraktní třídy výrazu, který bude interpretován</p><pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# "> abstract class Expression
{
	public void Interpret(Context context)
	{
		 if (context.Input.Length == 0)
			 return;

		 if (context.Input.StartsWith(Nine()))
		 {
			 context.Output += (9 * Multiplier());
			 context.Input = context.Input.Substring(2);
		}
		else if (context.Input.StartsWith(Four()))
		 {
			 context.Output += (4 * Multiplier());
			 context.Input = context.Input.Substring(2);
		}
		else if (context.Input.StartsWith(Five()))
		 {
			 context.Output += (5 * Multiplier());
			 context.Input = context.Input.Substring(1);
		}

		while (context.Input.StartsWith(One()))
		{
			 context.Output += (1 * Multiplier());
			 context.Input = context.Input.Substring(1);
		}
	}

	 public abstract string One();
	public abstract string Four();
	public abstract string Five();
	public abstract string Nine();
	public abstract int Multiplier();
}</code>
</pre>

<p>Třídy pro číslice Tisíc, sto, deset a jedna</p>
<pre class="prettyprint linenums scroll-horizontal"><code class="language-C# ">  // Tisíc je reprezentováno písmenem M
class ThousandExpression : Expression
{
	public override string One() { return "M"; }
	public override string Four() { return " "; }
	public override string Five() { return " "; }
	public override string Nine() { return " "; }
	public override int Multiplier() { return 1000; }
}

// Sto je reprezentováno písmeny C, CD, D or CM
class HundredExpression : Expression
{
	public override string One() { return "C"; }
	public override string Four() { return "CD"; }
	public override string Five() { return "D"; }
	public override string Nine() { return "CM"; }
	public override int Multiplier() { return 100; }
}

// Deset je reprezentováno písmeny X, XL, L and XC
class TenExpression : Expression
{
	public override string One() { return "X"; }
	public override string Four() { return "XL"; }
	public override string Five() { return "L"; }
	public override string Nine() { return "XC"; }
	public override int Multiplier() { return 10; }
}


// Jedna je reprezentováno písmeny I, II, III, IV, V, VI, VI, VII, VIII, IX
class OneExpression : Expression
{
	public override string One() { return "I"; }
	public override string Four() { return "IV"; }
	public override string Five() { return "V"; }
	public override string Nine() { return "IX"; }
	public override int Multiplier() { return 1; }
}
</code>
</pre>

<p><strong>Output:</strong></p>
<img src="images/InterpreterUkazka.png" alt="Output">