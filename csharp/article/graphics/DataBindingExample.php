<h2>Data binding</h2>
<p>U každého prvku v XAML je možnost získání hodnoty přímo z proměnné, nebo od jiného prvku. Ukázka níže popisuje získání hodnoty z proměnné a odkaz na celou aplikaci je pod článkem.</p>
<h3>Data binding pro jednu proměnnou</h3>
<p>XAML prvek s nastaveným data binding.</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">//valueInXml je název proměnné
&lt; Label x:Name="label" Content="{Binding valueInXml}" /></code></pre>

<p>Každá proměnná, která má notifikovat o své změně, musí implementovat rozhraní <strong>INotifyPropertyChanged</strong>.</p>
<p>C# nastavení proměnné pro data binding.</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">/// Private field
private int ValueInXml;

/// Event handler 
public event PropertyChangedEventHandler PropertyChanged;

/// Public property used in label
public int valueInXml
{
	get
	{
		return ValueInXml;
	}
	set
	{
		ValueInXml = value;

		// Notify about change and specific which property changed
		OnPropertyChanged("valueInXml");
	}
}
/// Notify about property changes
protected void OnPropertyChanged(string name)
{
	PropertyChangedEventHandler handler = PropertyChanged;
	if (handler != null)
	{
		handler(this, new PropertyChangedEventArgs(name));
	}
}
</code></pre>
<h3>Data binding pro kolekci</h3>
<p>Narozdíl od jedné proměnné, která implementuje INotifyPropertyChanged, tak pro kolekce je vyčleněno rozhraní ObservableCollection<T> s typem kolekce místo T např. List.<br><br>
Implementace View grafického prvku, který umožňuje použití kolekcí</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">&lt;ListView ItemsSource="{Binding Guys}" Margin="189,40,30,52">
	&lt;ListView.View >
		&lt;GridView>
			&lt;GridViewColumn DisplayMemberBinding="{Binding Name}" Header="Guy"/>
			&lt;GridViewColumn DisplayMemberBinding="{Binding Age}" Header="Age"/>
		&lt;/GridView>
	&lt;/ListView.View>
&lt;/ListView>
</code></pre>
<p>Použití v C#.</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">// Deklarace kolekce implementující třídu Person
public ObservableCollection<Person> Guys { get; protected set; }
// Naplnění kolekce daty v libovolné metodě
Guys = new ObservableCollection<Person>();
Guys.Add(new Person("Julius Caesar", 40));
Guys.Add(new Person("Pompeius Magnus", 46));
Guys.Add(new Person("Marcus Crassus", 55));

// Oznámení o změně dat
RaisePropertyChanged("Guys");


private void RaisePropertyChanged(string propName)
{
	PropertyChanged(this, new PropertyChangedEventArgs(propName));
}

// Samotná třída Person implementující oznámení o změně vnitřních dat
public class Person : INotifyPropertyChanged
{
	public string Name { get; set; }
	public int Age { get; set; }

	public Person(string name, int age)
	{
		Name = name;
		Age = age;
	}

	public event PropertyChangedEventHandler PropertyChanged;

	private void RaisePropertyChanged(string propName)
	{
		PropertyChanged(this, new PropertyChangedEventArgs(propName));
	}
}

</code></pre>
<a class="right" href="attachment/WpfDataBinding.zip">Ukázka data binding</a><br>