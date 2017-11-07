<h2>Více formulářů v jedné aplikaci</h2>
<p class="introduction">Aplikace často vyžaduje více různých oken. Ten nejhorší způsob, kterým lze řešit více oken, je vytvořit jedno okno, které dynamicky obměňovat prvek po prvku.</p>
<p>Dobrou praxí je na každé okno více formulářů, ty jako celky obměňovat.</p>
<p>Jednoduchým příkladem je z jednoho formuláře spouštět druhý např. po stisknutí tlačítka:</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# "> private void button1_Click(object sender, EventArgs e)
{
	// Vytvoření nové instance formuláře
	Form2 form2 = new Form2();
	
	// Zobrazení formuláře
	form2.Show();
}</code></pre>
<p>Takto, se nepřenášíme do nového formuláře žádná data.</p><br>
<p>Formulář je objekt, tak se i jako objekt chová. Stejnými způsoby lze do něj přenášet data.</p>
<p>To lze pomocí:</p>
<ol>
	<li>konstruktoru</li>
	<li>metod</li>
	<li>objektu určeného pro přenos dat (DTO)</li>
	<li>vyčlenění veřejných atributů pro ovlivnění</li>
</ol>

<ol>
<h4><li> Pomocí konstruktoru</h4>
	<pre class="prettyprint linenums scroll-horizontal">
	<code class="language-C# "> private void button1_Click(object sender, EventArgs e)
{
	// Data pro přenos do formuláře
	String data = "dataToPass";
	String dataInt = 2;
	String dataBool = true;
	
	// Vytvoření nové instance formuláře a předání dat
	Form2 form2 = new Form2(data, dataInt,dataBool);
	
	// Zobrazení formuláře
	form2.Show();
}</code></pre>
	Pozn.<i>Potencionální nevýhodou je, že lze data přenést pouze při vytváření formuláře</i><br><br>
</li>
<h4><li> Pomocí metod</h4>
	<pre class="prettyprint linenums scroll-horizontal">
	<code class="language-C# "> private void button1_Click(object sender, EventArgs e)
{
	// Vytvoření nové instance formuláře
	Form2 form2 = new Form2();
	
	// Data pro přenos do formuláře
	String data = "dataToPass";
	String dataInt = 2;
	String dataBool = true;
	
	form2.update(data, dataInt,dataBool);
	
	// Zobrazení formuláře
	form2.Show();
}</code></pre>
	Pozn.<i>Metoda update musí být ve form2 deklarovaná a přístupná</i><br><br>
</li>
<h4><li> Data tranfer object (DTO)</h4>
	DTO je objekt, který slouží pouze pro přenos dat, neměl by mít žádné zatěžující metody <a href="http://martinfowler.com/eaaCatalog/dataTransferObject.html"> více</a>.<br>
	Pro jednoduché použití (není úplně správné bez nastudování DTO problematiku) lze vytvořit objekt pouze s atributy a přístupovými rozhraními a ten předat 1. nebo 2. způsobem viz výše.
	<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">Form2 form2 = new Form2(dataObject);
form2.update(dataObject);</code></pre><br>
</li>

<h4><li> Vyčlenění veřejného rozhraní existujícího ovládacího prvku</h4>
	Situace: Uživatel v 1. formuláři vyplní své jméno a ve 2. formuláři ho chce zobrazit.<br>
	Nabízí se tedy možnost textový box v 2. formuláři prohlásit za public a z 1. formuláře přímo měnit jeho text.<br>
	Tento postup se nedoporučuje a většinou je přímo proti programovacímu modelu, místo něj je lepší využít možnost č.2 viz výše.
</li>
<p></p>
 <a class="right" href="attachment/WinFormsToolsMore.zip">Ukázka jednoduché aplikace s více formuláři</a><br>
</ol>