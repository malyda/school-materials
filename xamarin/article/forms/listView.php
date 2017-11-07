<h2>ListView</h2>
<p class="introduction">
	ListView je jedním ze základních UI elementů grafických aplikací. Zobrazuje data jako položky seznamu.
</p>
<img src="images/ListView.png">

<h3>Jednoduché ListView</h3>
<p>
	Nejjednodušším typem ListView je výpis položek jako text.
<p>

<p>
	Zápis v XAML
</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">&lt;ListView x:Name="PeopleListViewNotFormatted"> </ListView>
</code></pre>

<p>
	Připojení dat v C#
</p>

<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">List &lt;Person> persons = new List&lt;Person>();
for (int i = 0; i < 10; i++) persons.Add(new Person() { Lastname = "Jméno" + i, Firstname = "Přijmení" + i, DateOfBirth = new DateTime(1980+i,1,1) });

PeopleListViewNotFormatted.ItemsSource = persons;
</code></pre>

<p>
	Třída Person.
</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">public class Person
{
	public string Lastname { get; set; }
	public string Firstname { get; set; }
	public int Age
	{
		get { return DateTime.Now.Year - DateOfBirth.Year; }
	}
	public DateTime DateOfBirth { get; set; }
	public ImageSource ProfilePhoto { get; set; }
	public string GetName => Lastname + " " + Firstname;
  
	public override string ToString()
	{
		return Firstname + " " + Lastname + " " + Age;
	}
}
</code></pre>


<h3>Formátované ListView</h3>
<p>
	Položky v ListView lze formátovat dle šablony tak, aby mohly zobrazovat složitější datové struktury.
</p>
<p>
	Tvorba šablony se řídá dle struktury ListView -> ItemTemplate -> DataTemplate -> ViewCell.
</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">&lt;ListView x:Name="PeopleListViewFormatted">
   &lt;ListView.ItemTemplate>
		&lt;DataTemplate>
		   &lt;ViewCell>
					
					// Šablona 
		
		   &lt;/ViewCell>
		 &lt;/DataTemplate>
   &lt;/ListView.ItemTemplate>
 &lt;/ListView>
</code></pre>
<p>
	ListView zobrazující položky jako kontakty v telefonu. Využívá DataBinding, které je nastavené na atributy třídy Person (GetName a Age).
</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">&lt;ListView x:Name="PeopleListViewFormatted" Grid.Row="1">
   &lt;ListView.ItemTemplate>
		&lt;DataTemplate>
		   &lt;ViewCell>
			 
				 &lt;Grid HeightRequest="100">
				   &lt;Grid.RowDefinitions>
						&lt;RowDefinition Height="*" ></RowDefinition>
						&lt;RowDefinition Height="*"></RowDefinition>
				   &lt;/Grid.RowDefinitions>
				   &lt;Grid.ColumnDefinitions>
						&lt;ColumnDefinition Width="*"></ColumnDefinition>
						&lt;ColumnDefinition Width="5*"></ColumnDefinition>
				   &lt;/Grid.ColumnDefinitions>
						&lt;Label Text="{Binding GetName}" FontAttributes="Bold" Grid.Row="0" Grid.Column="1" VerticalTextAlignment="End" ></Label>
						&lt;Label Text="{Binding Age}" Grid.Row="1"  Grid.Column="1" FontSize="11" VerticalTextAlignment="Start"  />
						&lt;abstractions:CircleImage  Source="{Binding ProfilePhoto}" WidthRequest="95" HeightRequest="95" HorizontalOptions="Center" Aspect="AspectFill" Grid.Column="0" Grid.RowSpan="2"></abstractions:CircleImage>
				 &lt;/Grid>
				 
		   &lt;/ViewCell>
		 &lt;/DataTemplate>
   &lt;/ListView.ItemTemplate>
 &lt;/ListView>
</code></pre>

<p>
	Použití v C#.
</p>

<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">List&lt;Person> persons = new List&lt;Person>();
for (int i = 0; i < 10; i++) persons.Add(new Person() { Lastname = "Jméno" + i, Firstname = "Přijmení" + i, DateOfBirth = new DateTime(1980+i,1,1) });

PeopleListViewFormatted.ItemsSource = persons;
</code></pre>

<p>
	Třída Person.
</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">public class Person
{
	public string Lastname { get; set; }
	public string Firstname { get; set; }
	public int Age
	{
		get { return DateTime.Now.Year - DateOfBirth.Year; }
	}
	public DateTime DateOfBirth { get; set; }
	public ImageSource ProfilePhoto { get; set; }
	public string GetName => Lastname + " " + Firstname;
	
	public override string ToString()
	{
		return Firstname + " " + Lastname + " " + Age;
	}
}
</code></pre>

<h3>Kliknutí na položku a zavolání metody</h3>
<p>
	V grafických aplikacích mohou být seznamy interaktivní. Nejběžnější interaktivitu zajišťuje výběr jedné položky v seznamu.
</p>
<p>
	Zápis v XAML.
</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">&lt;ListView x:Name="PeopleListViewFormatted" Grid.Row="1" ItemTapped="SelectedItemMethod"> &lt;/ListView>
</code></pre>

<p>
	Použití v C#
</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">private void SelectedItemMethod(object sender, ItemTappedEventArgs e)
{
	// Interaction logic
}
</code></pre>
