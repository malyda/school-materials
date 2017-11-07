<h2>Práce se soubory</h2>
<h3>Highscore</h3>
<p>
    Vytvořte prograrm, který umí načtat a ukládat score hráčů ze souboru. Formát dat je <a href="..\csharp\#csv">csv</a>. <br>
    Parsování dat můžete udlat ručně, nebo využijte již existující <a href="http://www.filehelpers.net/quickstart/">knihovnu</a>.
</p>

<p>
    Tvorba launcheru pro školní projekty
</p>

<h4>Launcher 1.0</h4>
<p>
    Vytvořte launcher pro své aplikace. Počáteční lokace projektů získává launcher z csv databáze, poté projde všechny složky a podsložky, dokud nenaraz na soubor .sln. Pro nalezení .sln souboru najde v podsložkách soubor se stejným jménem, ale s .exe příponou.
</p>
<ul>
    <li>C:\Users\username\Visual Studio Projects\WpfApp\WpfApp1.sln</li>
    <li>C:\Users\username\Visual Studio Projects\WpfApp\WpfAapp1\bin\Debug\WpfApp1.exe</li>
</ul>
<p>
    Nalezené exe soubory vypíše do seznamu, Uživatel může vybrat .exe soubor a spustit ho.
</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">Process proc = new Process();
proc.StartInfo.FileName = programPath;
proc.StartInfo.WorkingDirectory = Path.GetDirectoryName(programPath);
proc.Start();
</code></pre>

<h4>Launcher 2.0</h4>
<p>
    Využijte vytvořený launcher, umožněte do lokace k .sln souboru přidat .csv soubor s informacemi o projektu. Z launcheru je může užiavatel zobrazit i editovat.
</p>
<p>
    Launcher dokáže celý projekt zkopírovat do nové lokace např. z C: na D:, a upravit si vlastní dataázi cest k projektům.
</p>
<p>
    Celé projekty je možné i mazat.
</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">//Now Create all of the directories
foreach (string dirPath in Directory.GetDirectories(SourcePath, "*",
    SearchOption.AllDirectories))
    Directory.CreateDirectory(dirPath.Replace(SourcePath, DestinationPath));

//Copy all the files & Replaces any files with the same name
foreach (string newPath in Directory.GetFiles(SourcePath, "*.*",
    SearchOption.AllDirectories))
    File.Copy(newPath, newPath.Replace(SourcePath, DestinationPath), true);
</code></pre>