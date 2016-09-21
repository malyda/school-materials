<h2>Události - Events</h2>
<p class="introduction">Pokaždé, když uživatel provede nějakou akci (stiskne tlačítko, klikne myší) vyvolává tím událost (event) a záleží jen na prostředí zda tuto událost zachytí.</p>
<p>Kromě uživatele mohou události vyvolávat i ostatní prvky v prostředí OS, typicky lze zachytit např. změnu textu u vybraného grafického elementu, nebo i odchytit zapnutí WIFI adaptéru.</p>
<h3>Události uživatele v souvislosti GUI</h3>
Několik vybraných událostí pro formulář:
<ul>
	<li>Click</li>
	<li>Closed</li>
	<li>Closing</li>
	<li>Font changed</li>
</ul>
A <a href ="https://msdn.microsoft.com/en-us/library/system.windows.forms.form_events%28v=vs.110%29.aspx"> další </a><br><br>
<p>Několik vybraných událostí pro TextBox:</p>
<ul>
	<li>Click</li>
	<li>BackgroundColorChanged</li>
	<li>DragOver</li>
	<li>GotFocus</li>
</ul>

<h3>Použití ve WinForms a WPF</h3>
<p>Následující příklad ukazuje:
</p>
<ol>
	<li>Vytvoření tlačítka</li>
	<li>Zaregistrování listeneru (naslouchání) na stisknutí tlačítka</li>
	<li>Metodu, která se provede po stisku tlačítka</li>
</ol>

<p>Vytvoření tlačítka ve WinForms</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">this.button1 = new System.Windows.Forms.Button();
</code></pre>

<p>Zaregistrování listeneru ve WinForms</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">this.button1.Click += new System.EventHandler(this.button1_Click);
</code></pre>

<p>Vytvoření tlačítka ve WPF včetně registrování listeneru Click</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">&lt;Button x:Name="button1" Content="Button" Width="231" Height="174" Click="button1_Click" />
</code></pre>

<p>Formulář Form1 a v něm tlačítko button1.<br>
Uživatel na toto tlačítko klikne a vyvolá událost Click.<br>
Zavolá se metoda Click spojená s tímto tlačítkem:</p>
 <pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# "> private void button1_Click(object sender, EventArgs e)
{
	// Set new location for first button
	button1.Location = new Point(60, 60);

	// shows "This window is called from your new Button"
	MessageBox.Show("This window is called from your new Button");
}
</code></pre>

<p>Metoda se jmenuje stejně jako tlačítko spojené s <strong>_</strong> a událostí, kterou odchytává. Je vždy na programátorovi, aby tyto události zachytil.</p>
<p>Pro správné fungování listeneru je nutné registrovat událost v deklaraci grafického rozhraní (WPF - XAML) a deklarovat potřebnou metodu přímo v kódu.</p>
<p>Object sender je zdroj události a EventArgs e jsou dodatečné parametry, které mohou být poslány společně s událostí.</p>
<p><i>Pozn. aktivita v hlavním vláknu aplikace by měla být vždy co nejjednodušší a v případě potřeby rozdělena do více vláken.</i></p>

<a class="right" href="attachment/WinFormsEvents.zip">Ukázka aplikace se základními eventy</a><br><br>
<a class="right" href="attachment/WinFormsTools.zip">Ukázka jednoduché aplikace se základními prvky</a>