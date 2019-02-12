<h2>Použití GIF obrázků ve WPF aplikaci</h2>
<p class="author">Šimon Hrubý</p>
<p class="introduction">
    Při tvoření her nebo interaktivních aplikací se většinou používají pro reprezentaci různých charakterů statické obrázky.
    Po použití pohyblivých obrázků se však celá aplikace oživí a působí zábavněji. Přitom na tom není nic těžkého.
</p>
<p>Ukázka z WPF aplikace využívající animace ze hry World of Warcraft</p>

<div style="position: relative">
    <img style="position: absolute; margin: 0 0 0 -50px;" src="images/jumpattack.gif" alt="">
    <img style="margin: 0" src="images/example.jpg" alt="">
</div>

<h3>Instalace</h3>
<p>
    Jediný balíček, který je třeba pro použití GIF obrázků v aplikaci nainstalovat, je <a href="https://github.com/XamlAnimatedGif/WpfAnimatedGif">WpfAnimatedGif</a>
    <br>To lze provést pohodlně ve Visual Studiu za pomocí Správce Nuget balíčků
</p>

<h3>Přidání do šablony</h3>

<p>Pro vložení gifu do šablony stačí vložit následující řádek a upravit cestu k obrázku v atributu <i>gif:ImageBehavior.AnimatedSource</i>.
    <br>V návrhu se nebude zobrazovat, to až po spuštění aplikace. Pro účely návrhu lze nastavit klasický atribut <i>Source</i> pro zobrazení gifu ve statické podobě, ale není to nutné.</p>
<pre class="prettyprint linenums scroll-horizontal"><code class="language-html">&lt;Image
			gif:ImageBehavior.AnimatedSource="Images/animated.gif"
			Source="Images/animated.gif"/></code></pre>
<br>
<p>
    V šabloně je ještě možné nastavit počet opakování atributem <i>gif:ImageBehavior.RepeatBehavior</i>.
    <br><i>0x</i> je defaultní nastavení, kdy se gif opakuje stále dokola. Pro opakování dvakrát za sebou by se nastavilo <i>2x</i>.
</p>
<pre class="prettyprint linenums scroll-horizontal"><code class="language-html">&lt;Image
			gif:ImageBehavior.AnimatedSource="Images/animated.gif"
			Source="Images/animated.gif"
			gif:ImageBehavior.RepeatBehavior="2x"/></code></pre>

<pre class="prettyprint linenums scroll-horizontal"><code class="language-html">&lt;Image gif:ImageBehavior.AnimatedSource="Images/animated.gif" /></code>
</pre>

<h3>Manipulace z kódu</h3>

<p>
    Za účelem střídání ruzných animací nebo jiné kontroly lze s gifem manipulovat ze zdrojových C# souborů v back-endu.
</p>
<p>
    Vytvoření gifu zobrazuje následující ukázka, do které se dosadí cesta v podobě <i>Uri</i>.
    <br>
    Je uchovávaný v proměnné <i>image</i> a následně se v 5. řádku vykreslí do šablony. Do prvního parametru se musí nastavit prvek typu <i>Image</i> s identifikátorem <i>x:Name</i>: "CharacterImage".
</p>

<pre class="prettyprint linenums scroll-horizontal"><code class="language-C#">var image = new BitmapImage();
image.BeginInit();
image.UriSource = new Uri("pack://application:,,,/Resources/Character.gif");
image.EndInit();
ImageBehavior.SetAnimatedSource(CharacterImage, image);</code>
</pre>

<p>
    Tomuto gifu by se poté nastavil počet opakování následujícím způsobem:
    <br><i>(Do argumentu RepeatBehavior počet opakování číslem)</i>
</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C#">ImageBehavior.SetRepeatBehavior(CharacterImage, new RepeatBehavior(1));</code>
</pre>

<h4>Akce po skončení gifu</h4>
<p>Pokud máme například základní gif postoje, který by se měl stále opakovat a poté se přehraje animace útoku, po jejím konci by se měla animace vrátit zpět na postoj.</p>
<div style="position: relative; overflow: hidden; margin-top: -50px">
    <img style="position: absolute; margin: 0 0 0 -120px" src="images/default.gif" alt="">
    <img style="margin: 0 0 0 120px" src="images/attack1.gif" alt="">
</div>

<p>
    Takový event lze nastavit následujícím způsobem:
    <br><i>První argument je prvek obrázku, druhý handler</i>
</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C#">ImageBehavior.AddAnimationCompletedHandler(CharacterImage, Handler);</code>
</pre>
<p>Kdy handler je funkce s dvouma povinnými argumenty.</p>

<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C#">public void Handler(object sender, RoutedEventArgs e)
{
// Do something
}</code>
</pre>

<h3>Závěr</h3>
<p>
    To by mělo pro základní použití stačit. Teď už nic nebrání tvorbě impozantních aplikací vyrážejících dech způsobující lásku na první pohled.
    <br>Pro detailnější popis použití můžete navštívit oficiální dokumentaci: <a href="https://github.com/XamlAnimatedGif/WpfAnimatedGif/wiki">https://github.com/XamlAnimatedGif/WpfAnimatedGif/wiki</a>, ale budu to brát jako urážku.
</p>
