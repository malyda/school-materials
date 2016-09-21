<h2>Task - Úloha</h2>
<p class="introduction">Úloha je stejně jako vlákno jen soubor instrukcí, které má procesor vykonat.<br>
Úloha může mít několik podob</p>
<ul>
	<li><strong>Thread</strong> - způsob využívající abstrakci na nižší úrovni</li>
	<li><strong>Task</strong> - vysokoúrovňová abstrakce, .NET na ní staví nové technologie - doporučená</li>
	<li><strong>Async</strong> - typicky nevytváří nové vlákno, pouze běží, když jsou uvolněny prostředky</li>
	<li><strong>Await</strong> - podobné jako Async, ale očekává metodu, která je awaitable</li>
	<li><strong>ThreadPool</strong> - třída do které se ukládají všechna vlákna</li>
	<li><strong>TaskParallel Library</strong> - knihovna pro rozdělení jedné činnosti do více vláken</li>
</ul>
<p>Úloha běží tak dlouho jako celý aplikační proces. S ukončením aplikace jsou ukončena i všechna její vlákna.</p>

<h3>ThreadPool</h3>
<p>Použití třídy ThreadPool umožňuje spravovat všechna vlákna, která jsou do něj uložena.</p>

<p>Organizace pomocí ThreadPool:</p>
<ul>
	<li>Při vytvoření nového vlákna se uloží do ThreadPool.</li>
	<li>Při pozastavení vlákna se jeho stav uloží.</li>
	<li>Při obnovení činnosti vlákna se jeho poslední stav získá z ThreadPool včetně celé instance vlákna.</li>
</ul>
<p>Využívá se hlavně kvůli tomu, že při pozastavení vlákna se může stát, že bude smazáno a při jeho obnovení by se muselo znovu vytvářet, takto ho stačí jen znovu načíst.</p>

<h3>Async - Await a Task/Thread</h3><br>
<p>Pro pochopení: Vlákno si můžeme představit jako pracovníka (worker), který hraje hry, ale dostal hlad.</p>
<p>Má dvě možnosti:</p>
<ol>
	<li>Pauznout hru a udělat si jídlo - async/await -> stejný worker</li>
	Nebo
	<li>Zavolat na tuto činnost jiného pracovníka a hrát dál, až do chvíle než své jídlo dostane - new Thread/Task - další worker</li>
</ol>
<h3>Task</h3>
<p>Vytvoření nového vlákna a spuštění vybrané metody.</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">using System.Threading.Tasks;

Task task = new Task(new Action(Metoda));
task.Start();
</code></pre>
<a href="http://dotnetcodr.com/2014/01/01/5-ways-to-start-a-task-in-net-c/">7 způsobů jak spustit Task</a><br><br>
<h3>Thread</h3><br>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">using System.Threading.Tasks;
Thread workerThread = new Thread(NeverEndingProc);
workerThread.Start();
</code></pre>