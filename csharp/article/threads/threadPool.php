<h2>ThreadPool</h2>
<p class="introduction">Mnoho aplikací vytváří vlákna, která stráví většinu svého času spánkem a čekání na událost. ThreadPool sdružuje všechna vlákna a umožňuje jejich efektivní správu.</p>
<p>ThreadPool spolu s vlákny ukládá i jejich data, která jsou při obnovení činnosti vlákna znovu použita. Takto fungují pouze data označena jako ThreadStaticAttribute.</p>
<p>ThreadPool může být využit i tak, že nějaká metoda bude dynamicky volat vlákna dle potřeby pomocí QueueUserWorkItem.</p>
<p>Vždy je <strong>jeden ThreadPool na jeden proces</strong>.</p>
<p>ThreadPool je primárně <strong>určen pro vlákna běžící na pozadí</strong>.</p>

<h3>Vlákna běžící na pozadí a v popředí</h3>
<p>Nejdůležitějším rozdílem je: <strong>vlákna běžící na pozadí neudržují běžící prostředí</strong>, jsou stavěna na čekání, či uspání.</p>
<p>Ve chvíli, kdy jsou všechna vlákna běžící na popředí zastavena, systém ukončí aplikaci společně s vlákny na pozadí.</p>

<p>Všechna vlákna, která jsou vytvořena pomocí <strong>new Thread()</strong> jsou defaultně označena jako vlákna běžící <strong>v popředí</strong>. Všechna vlákna vytvořena v <strong>ThreadPool</strong> jsou označena jako vlákna běžící <strong>na pozadí</strong>.</p>
Každá metoda přidaná do ThreadPool se automaticky zavolá hned, jak to bude možné.
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">ThreadPool.QueueUserWorkItem(new WaitCallback(NeverEndingProc), token);
</code></pre>

