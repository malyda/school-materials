<h2>Úvod do Xamarin.Forms</h2>
	<p class="introduction">
		Logika aplikace je sdílená v rámci Xamarin platformy, nicméně UI prvky jsou na každé platformě odlišné. Xamarin.Forms sjednocuje UI prvky do jednotného rozhraní, tak aby mohlo být sdílené společně s kódem.
	</p>

	<h3>Forms</h3>
	<p>
		Xamarin.Forms je framework, který je volitelným doplňkem pro aplikace na Xamarin platformě.
	</p>

	<p>
		Dříve se UI pro jednotlivé platformy tvořilo odděleně pro každou zvlášť. Tento přístup byl zdlouhavý a náročný, také nevyhovoval některým metodikám vývoje (<a href="https://en.wikipedia.org/wiki/Rapid_application_development" >RAD</a>). Výhodou tohoto přístupu bylo, že umožňoval přizpůsobit grafiku aplikace konkrétní platformě.
	</p> 

	<p> 
		Xamarin Forms se hodí pro většinu běžných aplikací, které nepotřebují specializované ovládání, nebo platformě závislé ovládání.
	</p>
		<a class="right" href="https://developer.xamarin.com/guides/xamarin-forms/"> developer.xamarin.com</a>
	

<h3>Struktura Xamarin.Forms</h3>

<p> 
	Android má své Activity, iOS View Controller a Page Windows(WPF). Všechny tyto třídy slouží k tomu, aby zobrazily jednu UI aplikace, držely v paměti informace o doposud událých akcích a zprostředkovávaly přístup k dalším funkcím aplikace. Xamarin.Forms k tomuto účelu používá <a href="https://developer.xamarin.com/guides/xamarin-forms/controls/pages/">Page</a>.
</p>

<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">public class MainPage : ContentPage
{
	public MainPage()
	{
		Content = new StackLayout
		{
			Children = {
				new Label { Text = "Hello ContentPage" }
			}
		};
	}
}
</code></pre>
<p>
	Aby měl vývojář kontrolu nad tím, která Page bude použita při startu aplikace, využívá Xamarin.Forms třídu App. Ta je zpracována vždy jako 1. při spuštění aplikace.
</p>

<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">
public class App : Application
{
	public App()
	{
		// The root page of your application
		MainPage = new MainPage();
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
	Jak Page, tak i App třídy prochází různými stavy při běhu aplikace:
	<ul>
		<li>Start - při startu aplikace (spuštění)</li>
		<li>Sleep - pokaždé, když aplikace ustoupí do pozadí (stlačení Home button, překrytí)</li>
		<li>Resume - při obnovení aplikace z pozastaveného stavu</li>
	</ul>
	<a class="right" href="https://developer.xamarin.com/guides/xamarin-forms/working-with/app-lifecycle/">Životní cyklus událostí</a>
	<br>
	<a class="right" href="https://developer.xamarin.com/guides/xamarin-forms/getting-started/introduction-to-xamarin-forms/"> Getting started </a>
	<br>
	<a class="right" href="http://www.rarelyimpossible.com/blog/2016/9/26/building-beautiful-apps-with-xamarin-forms"> Beutifull apps with Xamarin.Forms </a>
</p>		
	
