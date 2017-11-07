<h2>Grafické elementy v Xamarin Forms</h2>
<p class="introduction">
	Nedílnou součástí každé aplikace jsou ovládací prvky, které ji umožní ovládat. Ovládacími prvky můžeme chápat výzvy aplikace k činosti uživatele např. Stiskněte libovolnou klávesu, nebo pasivní prvky např. tlačítka, či agresivní např. vyskakovací oznámení. Xamarin.Forms nabízí většinu ovládacích prvků, které jsou k nalezení na nejpoužívanějších platformách (tlačítka, labely, přepínače atd.).
</p>

<h3>Grafické elementy</h3>
<p>
	Xamarin.Forms využívá grafických elementů, které jsou podobné na každé platformě. Mezi takové prvky lze zařadit tlačítka, textová pole, přepínače, layouty, navigaci i složitější např. Mapy či WebView. Speciální kategorií pro rozšíření grafických prvků jsou animace.
</p>

<p>
	Každý grafický element v Xamarin.Forms je reprezentován odpovídající třídou.
</p>
	<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">Button button = new Button
{
	Text = "Stiskni"
};
</code></pre>

<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">Label label = new Label
{
	Text = "Oznamovací text"
};
</code></pre>
<p>Také mohou být zapsány v XAML a poté zpracovávany pomocí code-behind.</p>

<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C#">&lt;Button Text = "Stiskni" />
</code></pre>

<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">&lt;Label Text="Oznamovací text"/>
</code></pre>
<p>
	Tyto elemetny budou vykresleny vždy s nativním nastavením dané platformy, ale zpracovávají se pomocí sdíleného kódu stejně.
</p>


<h3>Různá nastavení pro různé platformy</h3>
<p>
	Xamarin.Forms umožňuje měnit nastavení dle platformy, na které aplikace zrovna běží. Stejně jako u zápisu grafických elementů je možné toto nastevení měnit v C# i v XAML.
</p>
<p>
	Pro nastavení v C# použijeme Device.OnPlatform(iOS,Android,WinPhone), kde na místě jmen platforem můžeme použít různé hodnoty. Při změně velikosti fontu dle platformy v C# 
</p>

<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">FontSize = Device.OnPlatform<double>(15, 13, 14);
</code></pre>

<p>
	Pro stejný efekt, ale v XAML použijeme následující kód.
</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">&lt;Button.FontSize>
    &lt;OnPlatform x:TypeArguments="x:double" iOS="15" Android="13" WinPhone="14" />
&lt;/Button.FontSize>
</code></pre>

<p>
	Záleží pouze na programátorovi, jestli upřednostní code-behind, nebo XAML přístup. Doporučuje se XAML.
</p>
<a href="http://stackoverflow.com/questions/1002604/xaml-or-c-sharp-code-behind">Code-behind or XAML?</a>

<h3>Xamarin.Forms native UI</h3>
<img src = "http://cdn1.xamarin.com/webimages/images/infographics/xamarin-infographic-top-mobile-app-controls.png " alt="xamarin-form-cheat">