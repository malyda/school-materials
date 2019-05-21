<h2>  Proxy Pattern</h2>
<p class="author">Zdeněk Hochman</p>
<p class="introduction">
    Proxy pattern někdy nazýván jako wrapper se používá pro práci s komponentou nestabilní, nebo nekompatibilní s rozhraním.
    Jinak řečeno. Pokud bychom měli komponentu na 100 místech v programu, bylo by potřeba při každé nové verzi přepisovat kód na mnoha místech.
    Adapter komponentu obalí vlastním rozhraním a aplikace je tak zcela odstíněna od původního rozhraní komponenty. Kdykoliv se toto rozhraní změní, stačí pouze aktualizovat adapter.
</p>

<h3>Logika</h3>
<p>
    Pattern je prostředník mezi naším rozhraním a rozhraním komponenty. Klient je součast nášeho systému, která volá naše rohraní.
    Adaptee je komponenta, jejíž rozhraní je nestabilní, nebo nekompatibilní. Naše rozhraní je definováno v třídě Adapter, která zajišťuje transformaci metod od Klient do Adaptee.
</p>

<img src="images/Pattern.png" alt="Pattern" />

<p>
    Pattern je možné vylepšít přidáním abstraktní třídy Cíl. Adapter dědí z abstraktní třídy Cíl. Smysl abstraktní třídy je ten, aby bylo možné Adaptér snáze vyměnit za jiný při zachování kompatibility.
</p>

<img src="images/Pattern2.png" alt="Pattern-Modifikace" />

<h3>Zdrojový kód pro implementaci</h3>

<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">public class Client
{
	private ITarget target;

	public Client(ITarget target)
	{
		this.target = target;
	}

	public void MakeRequest()
	{
		target.MethodA();
	}
}

public interface ITarget
{
	void MethodA();
}

public class Adapter : Adaptee, ITarget
{
	public void MethodA()
	{
		MethodB();
	}
}

public class Adaptee
{
	public void MethodB()
	{
		Console.WriteLine("MethodB() is called");
	}
}</code>
</pre>
<h3>Vzorový kód</h3>

<p>
    Vytvoříme jednoduchý příklad, který lze použít v praxi.<br/>
    V tomto případě budeme zobrazovat databázi zaměstnanců s použitím Adapter vzoru.<br/>
    Nejdříve založíme třídu ThirdPartyEmployee, která reprezentuje třídu Adaptee. Neboli tu, kterou poté budeme obalovat vlastním rozhraním.
</p>

<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">// 'Adaptee' class
class ThirdPartyEmployee
{
	public List<string> GetEmployeeList()
	{
		List<string> EmployeeList = new List<string>();
		EmployeeList.Add("Tom");
		EmployeeList.Add("Sam");
		EmployeeList.Add("Jack");
		EmployeeList.Add("Mary");
		return EmployeeList;
	}
}</code>
</pre>
<p>Dále je třeba vytvořit interface ITarget který reprezentuje třídu Cíl.</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">//'ITarget' interface
interface ITarget
{
	List<string> GetEmployees();
}</code>
</pre>
<p>Následně vytvoříme třídu Adapter. Což je vlastně to naše rozhraní kterým obalujeme třídu Adaptee.</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">// 'Adapter' class
class EmployeeAdapter : ThirdPartyEmployee, ITarget
{
	public List<string> GetEmployees()
	{
		return GetEmployeeList();
	}
}</code>
</pre>
<p>A jako poslední vytvoříme třídu Client která zavolá třídu Adapter a vypíše všechny zaměstnance.</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">class Client
{
	static void Main(string[] args)
	{
		ITarget adapter = new EmployeeAdapter();
		foreach (string employee in adapter.GetEmployees())
		{
			Console.WriteLine(employee);
		}
		Console.ReadLine();
	}
}</code>
</pre>

<p>Takhle by poté měl vypadat výstup v konzoli</p>

<img src="images/Result.png" alt="Result" />