<h2>  Stránky v Xamarin.Forms</h2>
<p class="author">Štěpán Štanc</p>
<p class="introduction"> Stránky jsou nejzákladnějším prvkem UI, obsahují všechny ostatní grafické prvky a
    určují, jak se uživatel může z nich v aplikaci pohybovat. Zabírají celou nebo většinu
    stránky, mohou v sobě mít pouze jeden prvek, čímž by většinou měl být layout.</p>


<h3>Stránky obecně</h3>
<p>Typy stránek v Xamarin.Forms:</p>
<ul>
    <li>Content page</li>
    <ul>
        <li>Základní strana - neovlivňuje navigaci</li>
        <li>běžně se používá v kombinaci s dalšími stránkami</li>
    </ul>
    <li>Master detail</li>
    <ul>
        <li>Umožňuje navigaci přes boční panel</li>
    </ul>
    <li>Navigation page</li>
    <ul>
        <li>Základní navigační strana - vracení přes špiku zpět</li>
    </ul>
    <li>Tabbed page</li>
    <ul>
        <li>Umožňuje navigaci pomocí tabů</li>
    </ul>
    <li>Templated page</li>
    <ul>
        <li>Pro vytváření šablon stránek - neovlivňuje navigaci</li>
    </ul>
    <li>Carousel page</li>
    <ul>
        <li>Umožňuje navigaci posouváním do strany - kolotoč</li>
    </ul>
</ul>

<img src="images/Pages.png">

<h4>Master detail page</h4>
<p>MasterDetailPage slouží jako boční panel a umožňuje snadnou navigaci celou aplikací
    nebo rychlý přistup k určitým funkcím, jako jsou třeba rychlé nastavení aplikace atd.
    Tato stránka lze lehce zobrazit zatažením zleva, nebo klepnutím na ikonku menu,
    která se přidá na její podstránky. MasterDetailPage musí obsahovat dvě podstránky a to
    master, která tvoří obsah samotného bočního panelu a pak detail tvořící obsah aktuálně
    zobrazené stránky. Při přecházení mezi stránkami se detail mění a master zůstává stejný.</p>



<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">//stránky v menu u MasterDetailPage
MenuItems = new ObservableCollection<MasterDetailMenuItem>(new[]
{
    new MasterDetailMenuItem { Id = 0, Title = "Yellow page", TargetType = typeof(ContentPage1) },
    new MasterDetailMenuItem { Id = 1, Title = "Green page", TargetType = typeof(ContentPage2) },
    new MasterDetailMenuItem { Id = 2, Title = "Orange page", TargetType = typeof(ContentPage3) }
});</code>
</pre>

<img src="images/masterDetail.png">

<h4>Navigation page</h4>
<p>NavigationPage slouží pro jednoduchou navigaci mezi stránkami pomocí šipky zpět,
    stejně jako MasterDetailPage detail má navigační bar, kde má od leva nejdříve šipku
    zpět a pak titulek stránky. Výchozí chování šipky zpět je vrácení na předchozí
    stránku, ale tato funkcionalita lze změnit na libovolnou stránku většinou se tady
    používá v hierarchickém pořadí. Používá se jako root page.</p>



<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">//pohyb mezi stránkami
protected override bool OnBackButtonPressed()
{
  NewPage();
  return true;
}

private async void NewPage()
{
  await Navigation.PushAsync(new NavigationPage(new ContentPage3()));
}</code>
</pre>

<img src="images/navigation.png" height="500">

<h4>Tabbed page</h4>
<p>TabbedPage umožňuje navigaci v aplikaci pomocí tabů, co tab to stránka. Pokud
    obsahuje příliš mnoho tabů, taby budou scrolovatelné. Musí obsahovat list stránek,
    které slouží jako jednotlivé taby.</p>



<pre class="prettyprint linenums scroll-horizontal">
<code class="language-XML ">&lt;!-- Tabbed page s přidanými stránkami --&gt;
&lt;TabbedPage xmlns="http://xamarin.com/schemas/2014/forms"
            xmlns:x="http://schemas.microsoft.com/winfx/2009/xaml"
            xmlns:local="clr-namespace:Pages"
            x:Class="Pages.Tabbed"&gt;

  &lt;local:ContentPage1 Title="Page1"/&gt;
  &lt;local:ContentPage2 Title="Page2"/&gt;
  &lt;local:ContentPage3 Title="Page3"/&gt;
&lt;/TabbedPage&gt;</code>
</pre>

<p>nebo</p>

<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">//přidání stránek v kódu
public Tabbed()
{
  InitializeComponent();
  Children.Add(new ContentPage1());
  Children.Add(new ContentPage2());
  Children.Add(new ContentPage3());
}</code>
</pre>

<img src="images/tabbed.png" height="500">

<h4>Carousel page</h4>
<p>CarouselPage umožňuje navigaci mezi stránkami pomocí posouvání do strany, jako
    v galerii obrázků. Stránky se do ní přidávají úplně stejně jako k tabbed, pouze s rozdílem že jejich <i>Title</i> není vidět</p>



<pre class="prettyprint linenums scroll-horizontal">
<code class="language-XML ">&lt;!-- Carousel page s přidanými stránkami --&gt;
&lt;CarouselPage xmlns="http://xamarin.com/schemas/2014/forms"
            xmlns:x="http://schemas.microsoft.com/winfx/2009/xaml"
            xmlns:local="clr-namespace:Pages"
            x:Class="Pages.Carousel"&gt;

  &lt;local:ContentPage1 /&gt;
  &lt;local:ContentPage2 /&gt;
  &lt;local:ContentPage3 /&gt;
&lt;/CarouselPage&gt;</code>
</pre>

<p>nebo</p>

<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">//přidání stránek v kódu
public Carousel()
{
  InitializeComponent();
  Children.Add(new ContentPage1());
  Children.Add(new ContentPage2());
  Children.Add(new ContentPage3());
}</code>
</pre>

<a href="https://docs.microsoft.com/en-us/xamarin/xamarin-forms/user-interface/controls/pages">Xamarin.forms stránky</a>
<a href="https://gitlab.com/stepan.stanc/Xamarin.forms.pages">Zdrojový projekt</a>