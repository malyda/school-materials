
<h2>  Decorator Pattern</h2>
<p class="author">Lukáš Drechsel</p>
<p class="introduction">Decorator pattern se používá pro přidání nové funkcionality existujícímu objektu se zachováním jeho původní struktury.</p>

<p>Tento pattern vytváří třídu decorator, která se přiřadí k originální třídě. Následně ji přidává nové možnosti chování a operace, které lze s objektem provádět.</p>

<h3>Příklady použití</h3>
<ul>
    <li>Pro přidání dalšího stavu nebo chování k objektu a to dynamicky.</li>
    <li>Udělat změnu v některých objektech v jedné třídě, aniž by ovlivnila jiné.</li>
</ul>
<h3>Decorator Pattern - UML Diagram a implementace</h3>
<p>Níže se nachází UML class diagram pro implementaci designového patternu decorator:</p>

<img src="images/decorator_uml.png" alt="DecoratorPatternUML">

<h4>1. Component</h4>
<p>Interface obsahující členy, který jsou implementovány třídami ConcreteClass a Decorator.</p>
<h4>2. ConcreteComponent</h4>
<p>Třída, která implementuje Component interface.</p>
<h4>3. Decorator</h4>
<p>Abstraktní třída, která implementuje Component interface a obsahuje reference k instanci Component. Tato třída se chová jako základní třída pro všechny dekorátory pro komponenty.</p>
<h4>4. ConcreteDecorator</h4>
<p>Třída, která dědí z druhé třídy Decorator a poskytuje dekorátor pro komponenty.</p>

<h3>Zdrojový kód pro implementaci</h3>
<pre class="prettyprint linenums scroll-horizontal"><code class="language-C# ">public interface Component
{
	void Operation();
}

public class ConcreteComponent : Component
{
	public void Operation()
	{
 		Console.WriteLine("Component Operation");
 	}
}

public abstract class Decorator : Component
{
	private Component _component;

 	public Decorator(Component component)
 	{
 		_component = component;
 	}

 	public virtual void Operation()
 	{
 		_component.Operation();
 	}
}

public class ConcreteDecorator : Decorator
{
	public ConcreteDecorator(Component component) : base(component) { }

 	public override void Operation()
 	{
 		base.Operation();
 		Console.WriteLine("Override Decorator Operation");
 	}
}
</code>
</pre>

<h3>Vzorový kód</h3>

<p>Představme si, že máme jednu abstraktní třídu VehicleDecorator, další třídu HondaCity a interface Vehicle. Vehicle představuje auto, který má nějaký model a cenu.</p>

<p>Nyní máme situaci, ve které potřebujeme přidat do již existující třídy další vlastnost objektu. V tomto případě se jedná o SpecialOffer, nějaká speciální nabídka na daný typ auta, obashující například procentuální slevu.</p>

<p>Nejprve si vytvoříme interface auta.</p>

<pre class="prettyprint linenums scroll-horizontal"><code class="language-C# ">
public interface Vehicle
{
   string Make { get; }
   string Model { get; }
   double Price { get; }
}
</code>
</pre>

<p>Následuje třída ConcreteComponent.</p>

<pre class="prettyprint linenums scroll-horizontal"><code class="language-C# ">
public class HondaCity : Vehicle
{
 	public string Make
 	{
 		get { return "HondaCity"; }
 	}

 	public string Model
 	{
 		get { return "CNG"; }
 	}

 	public double Price
 	{
 		get { return 1000000; }
 	}
}
</code>
</pre>

<p>Dále dekorátor abstraktní třídy.</p>

<pre class="prettyprint linenums scroll-horizontal"><code class="language-C# ">
public abstract class VehicleDecorator : Vehicle
{
 	private Vehicle _vehicle;

 	public VehicleDecorator(Vehicle vehicle)
 	{
 		_vehicle = vehicle;
 	}

 	public string Make
 	{
 		get { return _vehicle.Make; }
 	}

 	public string Model
 	{
 		get { return _vehicle.Model; }
 	}

 	public double Price
 	{
 		get { return _vehicle.Price; }
 	}
}
</code>
</pre>

<p>A samotná třída ConcreteDecorator.</p>

<pre class="prettyprint linenums scroll-horizontal"><code class="language-C# ">
public class SpecialOffer : VehicleDecorator
{
 	public SpecialOffer(Vehicle vehicle) : base(vehicle) { }

 	public int DiscountPercentage { get; set; }
 	public string Offer { get; set; }

 	public double Price
 	{
 		get
 		{
 			double price = base.Price;
 			int percentage = 100 - DiscountPercentage;
 			return Math.Round((price * percentage) / 100, 2);
 		}
 	}
}
</code>
</pre>

<p>Nakonec se napíše tato část kódu, která představuje speciální nabídku na auto se slevou 25%.</p>
<pre class="prettyprint linenums scroll-horizontal"><code class="language-C# ">
class Program
{
 	static void Main(string[] args)
 	{
 		// Základní auto
 		HondaCity car = new HondaCity();

 		Console.WriteLine("Honda City base price are : {0}", car.Price);

 		// Speciální nabídka
 		SpecialOffer offer = new SpecialOffer(car);
 		offer.DiscountPercentage = 25;
 		offer.Offer = "25 % discount";

 		Console.WriteLine("{1} @ Diwali Special Offer and price are : {0} ", offer.Price, offer.Offer);

 		Console.ReadKey();

 	}
}
</code>
</pre>

<h3>Zdroje</h3>
<p><a href="http://www.dotnettricks.com/learn/designpatterns/decorator-design-pattern-dotnet">dotnettricks.com</a></p>
<p><a href="http://www.dofactory.com/net/decorator-design-pattern">dofactory.com</a></p>
<p><a href="https://www.codeproject.com/Articles/479635/UnderstandingplusandplusImplementingplusDecoratorp">codeproject.com</a></p>
