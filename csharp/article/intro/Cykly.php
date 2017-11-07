<h2>Cykly</h2>
<p class="introduction">Cykly se používají při opakováné činnosti. Jejich trvání je dáno podmínkou. <br>

<p>Základní typy cyklů - <b>while, for, dowhile </b> <br>
Rozšířené typy cyklů - <b>foreach</b> <br>

<p><strong>While</strong></p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">while(podmínka)
{
	provedAcki;
}
</code></pre>
<br>
<p><strong>DoWhile</strong><br></p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">cyklus: // Návěstí
	provedAkci;
	if(podmínka) goto cyklus; // Vždy se poprvé provede akce a až poté se dotáže na podmínku -> jistota prvního provedení akce
	else goto end;
end:
</code></pre>
<p>Či ekvivalentní zápis</p>
<pre class="prettyprint linenums scroll-horizontal">do
{
	provedAcki;
}
while(podmínka);
</code></pre>
<h3>Běžné typy cyklů</h3>
<p>Př. Dokud se auto pohybuje, přičítej ujeté metry <br></p>

<p><strong>While</strong></p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">int metres = 0;
while(carIsMoving)metres ++; // Přičte k metres 1
</code></pre>

<p>Nekonečný cyklus ( z pohledu psaní ), může skončit, když je program ukončen -> ukončil ho OS, došla paměť atd.</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">while(true){}
</code></pre>

<p>Cyklus se provede 10x a pokaždé se k i přičte 1, v každé jedné otočce cyklu vypíše do konzole proměnnou i</p>
<p><strong>For</strong><br></p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">for(int i = 0; i < 10; i++)	Console.Write(i);
</code></pre>
<p>Výstup:<br>
12345678910<br><br>
Přečti celé pole a vypiš jeho obsah. <br>
Cyklus se provede tolikrát, kolik má pole jednotlivých prvků a vypíše do konzole každý jeden prvek</p>
<strong>Foreach</strong><br>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">foreach(String prvek in pole)
{
	Console.WriteLine(prvek);
	// Pokud je pole prázdné, neprovede se ani jednou
	// Pokud je pole neinicializované tj. == null, zahlásí chybu
} 
</code></pre>
Každý cyklus je možné zapsat pomocí návěstí a skoků, ale jedná se o <strong>zastaralou a méně používanou formu zápisu</strong>:</p>
<p><strong>While</strong></p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">cyklus: // návěstí
	if(podmínka) 
	{
		provedAkci;
		goto cyklus; // Cyklus se opakuje dokud je podmínka splněná -> goto = skok
	}
	else goto end; // podmíněný skok
end:
</code></pre>