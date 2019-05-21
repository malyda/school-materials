<h2>Porovnání objektů</h2>
<p class="introduction">
    Některé objekty jsou natolik složité, že není jednoduchý způsob, jak je efektivně porovnat. Proto programátor musí způsob porovnání napsat sám.
</p>

<h3>Porovnání</h3>
<p>
    Účelem je porovnat dvě instance třídy Car, jestli jsou opravdu stejné. Následující píklad využívá třídy auto, která implemetuje IEquatable<Car> interface, pro stejný typ jako je sama třída (Car).
</p>
<h4>Chybové použití</h4>
<p>
    Třída Car
</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">class Car
{
    public int Id { get; set; }
    public string Name { get; set; }
    public bool IsMoving { get; set; }
}
</code></pre>
<p>
    Instance třídy
</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">Car c1 = new Car
{
    Id = 1,
    IsMoving = true,
    Name = "First Car"
};

Car c2 = new Car
{
    Id = 1,
    IsMoving = true,
    Name = "First Car"
};

// Check if c1 and c2 are same
Console.WriteLine(c1.Equals(c2)); // False
</code></pre>
<p>
  Obj.Equals() porovnává, jestli jsou dvě reference stejné -> tedy, jestli ukazují na stejné místo v paměti. Což v případě dvou různých instancí neplatí.
</p>
<h4>Správné použití</h4>
<p>
    Třída Car implementuje po svém metodu Equals, programátor musí ručně porovnat vnitřní hodnoty objektu.
</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# "> class Car : IEquatable&lt;Car>
{
    public int Id { get; set; }
    public string Name { get; set; }
    public bool IsMoving { get; set; }

    public bool Equals(Car o)
    {
        if (o != null && o is Car)
        {
                Car c =  o as Car;
                return Id == c.Id && string.Equals(Name, c.Name) && IsMoving == c.IsMoving;
        }
        return false;
    }
}
</code></pre>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">Car c1 = new Car
{
    Id = 1,
    IsMoving = true,
    Name = "First Car"
};

Car c2 = new Car
{
    Id = 1,
    IsMoving = true,
    Name = "First Car"
};

// Check if c1 and c2 are same
Console.WriteLine(c1.Equals(c2)); // True

Car c3 = new Car
{
    Id = 1,
    IsMoving = true,
    Name = "False Car"
};

// Check if c1 and c3 are same
Console.WriteLine(c1.Equals(c3)); // False
</code></pre>
<h6>Použití v Listu</h6>
<p>
    Pro zjištění, jestli je daný objekt v Listu se používá metoda Contains(), ta defaultně používá metodu Equals() dané třídy. Přepsáním metody Equals ve třídě Car je tedy automaticky zohledněno ostatními metodami např. List.Contains().
</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# "> // List of Cars contains only c1
List<Car> cars = new List<Car>();
cars.Add(c1);

// Compare if c1 in list is same as c2
// List.Contains() use Car.Equals() method by default
Console.WriteLine(cars.Contains(c2));
// True

// Compare if c1 in list is same as c3
Console.WriteLine(cars.Contains(c3));
// False
</code></pre>
<a href="https://github.com/malyda/CompareObjects">Ukázkový projekt</a>