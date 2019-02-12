<h2>Abstraktní třída</h2>
<p class="introduction">
	Abstraktní třída je nástrojem abstrakce systému. Určuje identitu objektů, předepisuje atributy a metody, které mohou ostatní objekty dědit. 
</p>
<p>
	Podobně jako Interface může definovat pouze hlavičky metod bez implementace těla. Nejčastěji se využívá její vlastnosti kombinování abstraktních metod (pouze hlavičky) a reálných (včetně těla), čímž umožňuje redukovat opakování kódu a udržovat strukturu systému.
</p>
<a href="http://stackoverflow.com/q/1320745/3864686" class="right">Abstract class in Java</a>

<h3>Abstraktní třída a dědičnost</h3>
<p>
	Jako nástroj abstrakce systému nemůže být abstraktní třída instancována, je nutné ji jinou třídou <strong>konkretizovat</strong> (podědit její vlastnosti a implementovat funkčnost).
</p>
<p>
	Umožňuje použití <strong>abstraktních metod</strong> - pouze hlavičky metod bez implementace těla. Subclass (třídy, které realizují abstraktní nástroje, nebo dědí jiné třídy) musí abstraktní metody implementovat (stejně jako u Interface).
</p>
<p>
	Třída konkretizuje abstraktní třídu. Dědí její atributy a metody.
</p>
<img src="images/AbstractInTheory.png">
<p>
	Třída ConcretizationOfAbstractClass podědila Field Attribute a metodu Method(). K tomu rozšířila abstrakci o vlastní metodu NewMethod.
</p>

<h3>Konkrétní příklad - Zvířata</h3>
<p>
	Na obrázku je vymodelovaná situace, kde abstraktní třída zaštiťuje všechna zvířata (stejně jako v reálném světě, zvíře není žádná existující entita). A dva konkrétní zástupci zvířat.
</p>

<img src="images/AbstractionInPractise.png">
<p>
	DogMaster a CatStupido implementují vše z abstraktního předka - Animal. Animal je abstraktní třída, nelze vytvořit její instanci.
</p>

<p>
	Definice Animal:
		<ul>
			<li> Deklaruje proměnnou (Field) Name, která je public </li> 
			<li> DateOfBirth, která je děditelná pouze v rámci stejné Assemly jako je abstraktní třída</li>
			<li> Implementuje metodu AgeText(), která je společná pro všechny podtřídy (subclasses)</li>
			<li> Předepisuje Abstraktní metodu DoSound(), kterou musí každá podtřída implementovat</li>
		</ul>
</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">public abstract class Animal
{
	// Public field Name
	public string Name;

	// Could be inherited only by classes in same assembly
	protected internal DateTime DateOfBirth = new DateTime();

	// Implements age info, which is same for all animals
	public string AgeText()
	{
		return DateOfBirth.ToString(CultureInfo.CurrentCulture);
	}
   
	// Abstract method which must be implemented by all subclasses
	public abstract string DoSound();
}
</code></pre>

<p>
	Definice CatStupido implementuje vše z Abstraktní třídy pomocí vlastních metod a mňouká k tomu.<br>
	CatStupido musí po svém implementovat abstraktní metodu DoSound() poděděnou z abstraktní třídy.
</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">class CatStupido : Animal
{
	// Not inherited methods

	/// Just get Name and add "Meow""
	public string GetNameWithCat()
	{
		// Inherited Name attribute from Base class
		return Name + "Meow";
	}

	/// Get name of cat and meow
	public string GetAgeWithMeow()
	{
		return AgeText() + " Meow";
	}

	public override string DoSound()
	{
		return "Meow";
	}
}
</code></pre>
<p>
	Definice DogMaster spoléhá na dědičnost a implementuje pomocí vlastních metod zděděné zdroje.<br>
	DogMaster musí po svém implementovat abstraktní metodu DoSound() poděděnou z abstraktní třídy.
</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">class DogMaster : Animal
{
	/// Barks by age (only years)
	/// return: Formatted string of Barks according to age
	public string BarkHowOldAreYou()
	{
		StringBuilder outputToPrintStringBuilder = new StringBuilder();

		outputToPrintStringBuilder.Append( AgeText() ).Append(Environment.NewLine);

		for(int i =0; i < (DateTime.Now.Year - DateOfBirth.Year); i ++) outputToPrintStringBuilder.Append("Bark").Append(Environment.NewLine);
	  
		return outputToPrintStringBuilder.ToString();
	}

	public override string DoSound()
	{
		return "Le Wuf";
	}
}
</code></pre>

<h3>Vícenásobná dědičnost</h3>
<p>
	V Českém i jiném jazyce, může být slovo podřazené nadřazené jinému např. hudební nástroj -> strunný nástroj -> kytara -> elektrická kytara -> Gibson Fender. Jedná se o postupnou konkretizaci abstraktních pojmů až k samotné konkrétní entitě.
</p>
<p>
	Následující diagram modeluje tuto situace v menším měřítku: Hudební nástroj -> strunný nástroj -> elektrická a basová kytara.
</p>
<img src="images/InstrumentsClassDiagram.png">
<p>
	Princip dědičnosti je zde zřejmý na první pohled (Strunný nástroj dědí z Hudebního nástroje a konkrétní typy strunných nástrojů, kytara, basa, dědí ze strunného nástroje).
</p>
<p>
	Za povšimnutí stojí, že jak třída Instrument, tak i Strunný nástroj jsou abstraktní třídy - neexistuje jejich reálná entita.<strong> Pokud je třída abstraktní a dědí z jiné abstraktní třídy, tak nemusí implementovat žádné její abstraktní metody.</strong> To je starost konkrétních tříd - BassGuitar a ElectricGuitar implementují abstraktní metodu Play() (označena hvězdičkou).
</p>