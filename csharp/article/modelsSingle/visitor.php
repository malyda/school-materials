<h2>Visitor pattern</h2>
<p class="author">Jan Jankovský</p>
<p class="introduction">V objektově orientovaném programování je visitor pattern způsobem oddělení algoritmu od objektové struktury, na které pracuje. Praktickým výsledkem této separace je schopnost přidávat nové operace do stávajících objektových struktur bez úpravy struktur.</p>
<h3>Důvod k využití</h3>
<p>Mnoho zřetelných a nesouvisejících operací musí být provedeno na objektech uzlu v heterogenní souhrnné struktuře. Chcete se vyhnout "znečištění" tříd uzlů s těmito operacemi. A nechcete, abyste museli dotazovat na typ každého uzlu a před provedením požadované operace hodit ukazatel na správný typ.</p>
<h3>Úmysl visitor patternu</h3>
<ul>
    <li>Představuje operaci, která má být provedena na elementech struktury objektu.</li>
    <li>Visitor umožňuje definovat novou operaci bez změny tříd prvků, na kterých pracuje.</li>
    <li>Klasická technika pro obnovu ztraceného typu informací.</li>
    <li>"Double dispatch"</li>
</ul>
<h3>Účel</h3>
<p>Primárním účelem Visitor patternu je abstraktní funkce, která lze aplikovat na hromadnou hierarchii objektů. Tento přístup podporuje navrhování lehkých tříd prvků - protože funkce zpracování je odstraněna ze seznamu odpovědností. Nové nové funkce lze snadno přidat do původního hierarchie dědičnosti vytvořením nové podtřídy návštěvníka.</p>
<h3>Aplikace</h3>
<p>Provádění probíhá následovně. Vytvoření hierarchie třídy Visitor, která definuje metodu visit() v abstraktní základní třídě pro každou třídu odvozenou od konkrétních tříd v hierarchii agregovaných uzlů. Každá metoda visit() přijímá jediný argument - ukazatel nebo odkaz na původní třídu odvozenou od prvku.</p>
<h3>"Double dispatch" - dvojí odeslání</h3>
<p>Visitor provádí "dvojí odeslání". OO zprávy se běžně zobrazují jako "jednorázové odeslání"(operace, kterou provádíte, závisí na: název požadavku a typu přijímače). Při "dvojím odeslání" závisí provedená operace na: název požadavku a typ dvou přijímačů ("the type of the visitor" a typ prvku, který navštíví).<p>
<h3>Struktura</h3>
<p>Hierarchie prvků je vybavena "univerzálním metodickým adaptérem". Implementace accept() v každé třídě odvozené od elementu je vždy stejná. Ale nemůže být přesunuta do základní třídy Element a zděděna všemi odvozenými třídami, protože odkaz na to ve třídě Element vždy mapuje na základní typ Element.</p>
<img class="imgdiagram" src="images/Visitor1.png" class="visitor" alt="diagram">

<h3>Ukázka</h3>
<p>Klasický Visitor pattern v C#</p>
<p>Zde jsou operace tisku pro každý typ implementovány v jedné třídě ExpressionPrinter, a jsou klasifikovány jako počet přetížení Visitor metody.</p>


<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">Stack myStack = new Stack();
namespace Wikipedia
{
  using System;
  using System.Text;

  interface IExpressionVisitor
  {
    void Visit(Literal literal);
    void Visit(Addition addition);
  }

  interface IExpression
  {
    void Accept(IExpressionVisitor visitor);
  }

  class Literal : IExpression
  {
    internal double Value { get; set; }

    public Literal(double value)
    {
      this.Value = value;
    }
    public void Accept(IExpressionVisitor visitor)
    {
      visitor.Visit(this);
    }
  }

  class Addition : IExpression
  {
    internal IExpression Left { get; set; }
    internal IExpression Right { get; set; }

    public Addition(IExpression left, IExpression right)
    {
      this.Left = left;
      this.Right = right;
    }

    public void Accept(IExpressionVisitor visitor)
    {
      visitor.Visit(this);
    }
  }

  class ExpressionPrinter : IExpressionVisitor
  {
    StringBuilder sb;

    public ExpressionPrinter(StringBuilder sb)
    {
        this.sb = sb;
    }

    public void Visit(Literal literal)
    {
      sb.Append(literal.Value);
    }

    public void Visit(Addition addition)
    {
      sb.Append("(");
      addition.Left.Accept(this);
      sb.Append("+");
      addition.Right.Accept(this);
      sb.Append(")");
    }
  }

  public class Program
  {
    public static void Main(string[] args)
    {
      // emulate 1+2+3
      var e = new Addition(
        new Addition(
          new Literal(1),
          new Literal(2)
        ),
        new Literal(3)
      );
      var sb = new StringBuilder();
      var expressionPrinter = new ExpressionPrinter(sb);
      e.Accept(expressionPrinter);
      Console.WriteLine(sb);
    }
  }
}
</code>
</pre>

<p>Dynamický Visitor pattern v C#</p>
<p>Tento příklad deklaruje samostatnou třídu ExpressionPrinter, která se stará o tisk. Všimněte si, že třídy výrazů musí vystavit své členy, aby to bylo umožněno.</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">static Main()
namespace Wikipedia
{
  using System;
  using System.Text;

  abstract class Expression
  {
  }

  class Literal : Expression
  {
    public double Value { get; }

    public Literal(double value)
    {
      this.Value = value;
    }
  }

  class Addition : Expression
  {
    public Expression Left { get; }
    public Expression Right { get; }

    public Addition(Expression left, Expression right)
    {
      Left = left;
      Right = right;
    }
  }

  class ExpressionPrinter
  {
    public static void Print(Literal literal, StringBuilder sb)
    {
      sb.Append(literal.Value);
    }

    public static void Print(Addition addition, StringBuilder sb)
    {
      sb.Append("(");
      Print((dynamic) addition.Left, sb);
      sb.Append("+");
      Print((dynamic) addition.Right, sb);
      sb.Append(")");
    }
  }

  class Program
  {
    static void Main(string[] args)
    {
      // emulate 1+2+3
      var e = new Addition(
        new Addition(
          new Literal(1),
          new Literal(2)
        ),
        new Literal(3)
      );
      var sb = new StringBuilder();
      ExpressionPrinter.Print((dynamic) e, sb);
      Console.WriteLine(sb);
    }
  }
}
</code>
</pre>
