<h2>Layouty</h2>
<p class="introduction">
	Grafické prvky lze shlukovat do množin, které ovlivňují jejich vlastnosti. Takové prvky se nazývají layouty. Layouty mohou ovlivňovat vše od barev po pozicování prvků.
</p>

<h3>Xamarin.Forms layouty</h3>
<p>
	Xamarin.Forms využívá layoutů hlavně pro určování způsobu, jakým jsou prvky pozicované. Pro ilustraci je rozděluje do několika skupin:
	<ol>
		<li>s daným pozicováním</li>
		<li>programátorem nastavitelným pozicováním</li>
		<li>Custom</li>
	</ol>
</p>

<h4>Dané pozicování</h4>
<p>
	Layouty, které určují, jak budou prvky v nich pozicované. Mezi základní layouty patří StackLayout a Grid.
</p>
<img class="img-big" src="images/stack layouts.png">

<h5>Stack Layout</h5>
<p>
		Stack layout pozicuje prvky za sebou. Umožňuje nastavení pro horizontální řazení, či vertikální. Jeho velkou předností je jednoduchost návrhu. Programátor nastaví základní vlastnosti layoutu a poté do něj vkládá další UI prvky.
</p>
<p>
	Vytvoření layoutu v code-behind, je možný i XAML zápis.
<p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">var stack = new StackLayout {
	Spacing = 20,
	Children = {
	  new Label {Text = "Hello World!"},
	  new Button {Text = "Click Me!"}
	}
};
</code></pre>

<h5>Grid</h5>
<p>
	Rozděluje View na řádky a sloupce. Nejedná se o Table View.  Každý řádek a sloupec musí mít definované základní vlastnosti, čímž se liší od Table View. K prvkům se přistupuje pomocí indexů (souřadnicový systém - řádky, sloupce).
</p>
<p>
	Zápis Grid Layoutu v XAML. Vytvoří 4x, label 2 v každém řádku gridu (celkem 2 řádky a 2 sloupce).
</p>

<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">&lt;Grid>
  &lt;Grid.RowDefinitions>
    &lt;RowDefinition Height="*" />
    &lt;RowDefinition Height="*" />
  &lt;/Grid.RowDefinitions>
  &lt;Grid.ColumnDefinitions>
    &lt;ColumnDefinition Width="*" />
    &lt;ColumnDefinition Width="*" />
  &lt;/Grid.ColumnDefinitions>
  &lt;Label Text="Top Left" Grid.Row="0" Grid.Column="0" />
  &lt;Label Text="Top Right" Grid.Row="0" Grid.Column="1" />
  &lt;Label Text="Bottom Left" Grid.Row="1" Grid.Column="0" />
  &lt;Label Text="Bottom Right" Grid.Row="1" Grid.Column="1" />
&lt;/Grid>
</code></pre>
<a href="https://forums.xamarin.com/discussion/24969/tableview-vs-grid-vs-stacklayout-listview-best-practice">TableView vs Grid vs StackLayout / ListView - best practice ? </a> 

<h3>Nastavitelné pozicování</h3>
<p>
	Layouty, které určují způsob, jak budou prvky pozicované, ale samotnou implementaci nechávají na vývojáři. Mezi takové patří Absolute a Relative layout.
</p>
<img class="img-big" src="images/Absolute layouts.png">


<h4>Absolute Layout</h4>
<p>
	Layout, který určuje pozici prvků v absolutních číslech od stran obrazovky (souřadnicový systém).
</p>
<p>
	Label pozicovaný na souřadnice (x,y - 0.5,1) na daných platformách. Jedná se o proporciální hodnoty, které jsou odvíjené od základních hodnot layotu. 0.5 při šířce layoutu je 500 = 250 (500 * 0.5). Stejně i pro výšku a souřadnici y.
</p>
<p>
	Pozn. <i> LayoutBounds = x, y, šířka, výška elementu</i>
</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">&ltLabel Text="I'm bottom center on every device."
AbsoluteLayout.LayoutBounds=".5,1,.5,.1" AbsoluteLayout.LayoutFlags="All"  />
</code></pre>

<p>Je možná zadávat souřadnice i v absolutních číslech </p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">&ltLabel Text="Label with absolute cords."
AbsoluteLayout.LayoutBounds="300,200,250,100"  />
</code></pre>

<h4>Relative layout</h4>
<p>
	Prvky v tomto layoutu jsou pozicované v závisloti jednoho na druhý. Např. jeden prvek je pod druhým a třetí vpravo od druhého.
</p>

<p>
	Většinou se takový layout rozděli na kvadranty, kde je v každém jeden vodicí prvek, kterému je udaná pozice vzhledem ke kvadrantu. Další prvky jsou poté pozicované podle něj.
</p>

<p>
	Relative layout se používá zejména proto, že umožňuje dynamicky nastavovat prvky v závislosti na velikosti obrazovky. Neumožňuje pixel-perfect.
</p>
<p>
	Pomocí Constraint je určována relativita vzhledem k ostatním prvkům. V Type je určeno, jestli je daný prvek relativní vzhledem k rodiči, nebo jinému View na jeho úrovni. Factor je scale (násobek) vzhledem k hodnotě určené v Property.
</p>
<p>
	BoxView má pozici Y udanou vzhledem k rodičově délce * 0.15. Takže je umístěno v rodiči.
</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">&ltBoxView Color="Red" x:Name="redBox"
        RelativeLayout.YConstraint="{ConstraintExpression Type=RelativeToParent,
            Property=Height,Factor=.15,Constant=0}" />
</code></pre>
<p>
	Následující ukázka vkládá červený box do relativního layoutu a nastavuje ho na červeno.
</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">&ltRelativeLayout BackgroundColor="Aqua">
    &ltBoxView Color="Red" x:Name="redBox"
        RelativeLayout.YConstraint="{ConstraintExpression Type=RelativeToParent,
            Property=Height,Factor=.15,Constant=0}"
        RelativeLayout.WidthConstraint="{ConstraintExpression
            Type=RelativeToParent,Property=Width,Factor=1,Constant=0}"
        RelativeLayout.HeightConstraint="{ConstraintExpression
            Type=RelativeToParent,Property=Height,Factor=.8,Constant=0}" />
&lt/RelativeLayout>
</code></pre>

<img class="img-custom" src="images/relativeLayout.png">
<a href="https://developer.xamarin.com/guides/xamarin-forms/user-interface/layouts/relative-layout/">Relative layout</a>
<br>
<a href="https://github.com/malyda/Xamarin.Forms.Layouts.git">Zdrojový projekt</a>