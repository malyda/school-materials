<h2>Přidání nove XAML page do Xamarin.Forms projektu</h2>
<p class="intruduction"> 
	Každá moderní aplikace se dnes vyznačuje přívětivým uživatelským rozhraním, bez něho, jako by nebyla.
</p>

<h3>Přidání nové Page</h3>

<p> 
	Xamarin.Forms Pages jsou multiplatformní třídy spravující grafické uživatelské rozhraní. Pro vytvoření nové Xamarin.Forms Page ji stačí přidat jako novou položku do Portable projektu.
</p>
<img class="img-screen" src="images/newItem.png">
<p>
	Pro zápis a nastavení grafických elementů se používá značkovací jazyk podobný XML:
	<ul>
		<li>WPF - XAML</li>
		<li>Android - XML</li>
		<li>iOS - XML</li>
	</ul>
	Značkovací jazyk (XML) se používá pro jeho vysokou efektivitu, pre-compilační compresi a jednoduché programatické zpracování. Oproti JSON je více strukturovaný a zažitý mezi vývojáři.
</p>

<p>Výběr šablony pro XAML page je: <strong>Visual C# -> Cross-platform</strong>. Zde jsou k nalezení i další šablony:
	<ul>
		<li>Forms ContentPage - Page vytvořená pouze pomocí Code-behind</li>
		<li>Forsm ContentView - šablona pro vytvoření vlastního grafického prvku</li>
		<li>Forms XAML Page - Page vytvořená pomocí XAML a spravovaná pomocí Code-behind</li>
	</ul>
	Xaml je efektivní pro sdružování grafických elementů a jejich nastavení. C# je použit pro dynamiku a ovládání chování aplikace.
</p>
<img class="img-screen" src="images/newXAMLPage.png">

<p>
	Po přidání šablony se automaticky zařadí do vybraného projektu (OurPage je název této Page). Nová Page je rozdělená na několik částí:
	<ol>
		<li>OurPage.xaml - pro xaml zápis </li>
		<li>OurPage.xaml.cs - třída rozšiřující xaml o code-behind</li>
	</ol>
</p>
<img class="img-screen" src="images/createdXAMLPage.png">

<p>Po otevření OurPage.xaml se zobrazí základní XAML zápis Xamarin.Forms Page, který určí základní konfiguraci, code-behind třídu a vytvoří jeden Label, který je vycentrovaný.</p>

<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C#">&lt;?xml version="1.0" encoding="utf-8" ?>
&lt;ContentPage xmlns="http://xamarin.com/schemas/2014/forms"
             xmlns:x="http://schemas.microsoft.com/winfx/2009/xaml"
             x:Class="ShowApp.OurPage">
  &lt;Label Text="{Binding MainText}" VerticalOptions="Center" HorizontalOptions="Center" />
&lt;/ContentPage> />
</code></pre>

<p>
	Pro změnu textu Labelu stačí změnit hodnotu v Text = např.:
</p>

<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C#">&lt;Label Text="Our first page" VerticalOptions="Center" HorizontalOptions="Center" />
</code></pre>

<p>Code-behind pouze inicializuje základní komponenty. Odkazuje se na dědičnost na ContenPage (základní konfigurace pro Page).</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C#">namespace ShowApp
{
    public partial class OurPage : ContentPage
    {
        public OurPage()
        {
            InitializeComponent();
        }
    }
}
</code></pre>

<h3>Zobrazení nově přidané Xamarin.Forms Page</h3>
<p>
	Pro zjednodušení ukázky nahradíme předdefinovanou Page nově vytvořenou. Ta se zobrazí jako úvodní obrazovka aplikace.
</p>

<p>
	Definice pro úvodní stránku se nalézá v třídě App umístěné v Portable projektu.
</p>
<img class="img-screen" src="images/appClass.png">

<p>
	App třída je inicializační třída pro všechny projekty vč. platform-specific. Dědí z Application, která zaštiťuje celou aplikaci. Jako taková obsahuje základní metody pro spravování životního cyklu úvodní Page.
</p>
<p>
	Ze základní šablony pro Xamarin.Forms projekt pomocí code-behind vytváří novou Page, v ní centrovaný Label s pozdravem.
</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C#">  public class App : Application
{
	public App()
	{
		// The root page of your application
		MainPage = new ContentPage
		{
			Content = new StackLayout
			{
				VerticalOptions = LayoutOptions.Center,
				Children = {
					new Label {
						HorizontalTextAlignment = TextAlignment.Center,
						Text = "Welcome to Xamarin Forms!"
					}
				}
			}
		};
	}

	protected override void OnStart()
	{
		// Handle when your app starts
	}

	protected override void OnSleep()
	{
		// Handle when your app sleeps
	}

	protected override void OnResume()
	{
		// Handle when your app resumes
	}
}
</code></pre>
<p>
	Část, která vytvářící novou Page nahradíme námi vytvořenou XAML Page. Editovat stačí pouze constructor třídy. Výsledný constructor vypadá takto:
</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C#">public App()
{
	MainPage = new OurPage();
}
</code></pre>