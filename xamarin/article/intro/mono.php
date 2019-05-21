<h2>  Mono (.NET framework)</h2>
<p class="author">Martin Ševčík</p>
<p class="introduction"> Mono je softwarová platforma navržená tak, aby umožňovala vývojářům snadno vytvářet síťové aplikace, které jsou součástí .NET Foundation .</p>

<h3>Účel</h3>
<p>Mono je vývojová platforma s otevřeným zdrojovým kódem založená na rozhraní .NET Framework, umožňuje vývojářům vytvářet multiplatformové aplikace. Implementace .NET společnosti Mono je založena na normách ECMA pro C# a Common Language Infrastructure .</p>

<h4>Instalace</h4>
<p>Mono platforma je dostupná pro všechny operační systémy. Mono platforma je ke stažení na webových stránkách Mono.</p>

<p>Pozn.
    <i><a> https://www.mono-project.com/</a></i>
</p>

<h3>Komponenty</h3>

<h4>C# Compiler - kompilátor </h4>
<p>Mono C# je pro C# 1.0, 2.0, 3.0, 4.0, 5.0 a 6.0 (ECMA).</p>

<h4>Mono Runtime </h4>
<p>Runtime implementuje Common Language Infrastructure (CLI) ECMA. Runtime obsahuje kompilátor Just-in-Time (JIT), překladač Ahead of Time (AOT), knihovní nakladač, sběrač odpadků, systém závitů a funkčnost interoperability.</p>

<h4>.NET Framework Class Library</h4>
<p>Platforma Mono poskytuje komplexní soubor tříd, které poskytují pevný základ pro vytváření aplikací. Tyto třídy jsou kompatibilní s třídami Microsoft .Net Framework.</p>

<h4>Mono Class Library</h4>
<p>Mono nabízí také mnoho tříd, které přesahují základní knihovnu tříd poskytovanou společností Microsoft. Tyto funkce poskytují další užitečné funkce, zejména při vytváření aplikací pro systém Linux. Některé příklady jsou třídy pro Gtk +, Zip soubory, LDAP, OpenGL, Cairo, POSIX atd.</p>

<h3>Základy Mono</h3>

<h4>Výpis konzole</h4>
<p>Chcete-li otestovat nejzákladnější dostupné funkce, zkopírujte následující kód do souboru s názvem hello.cs.</p>

<pre class="prettyprint linenums scroll-horizontal"><code class="language-C# ">using System;

public class HelloWorld
{
    static public void Main ()
    {
        Console.WriteLine ("Hello Mono World");
    }
}</code></pre>

<strong>Pro kompilaci použijte mcs:</strong>
<pre class="prettyprint linenums scroll-horizontal"><code class="language-C# "><strong>csc</strong> hello.cs</code></pre>

<strong>Kompilátor vytvoří "hello.exe", který můžete spustit pomocí:</strong>
<pre class="prettyprint linenums scroll-horizontal"><code class="language-C# "><strong>mono</strong> hello.exe</code></pre>

<strong>Program by měl běžet a výstupem je:</strong>
<pre class="prettyprint linenums scroll-horizontal"><code class="language-C# ">Hello Mono World</code></pre>

<h4>Připojení HTTPS</h4>
<p>Chcete-li zajistit, aby připojení HTTPS fungovalo, stáhněte a spusťte nástroj tlstest (potřebuje Mono> = 3.4.0).</p>

<pre class="prettyprint linenums scroll-horizontal"><code class="language-C# ">csc tlstest.cs -r:System.dll
mono tlstest.exe https://www.nuget.org</code></pre>

<p>Pozn.
    <i>Pokud chybí něco, program vyhodí chybu.</i>
</p>

<h4>Gtk#</h4>
<p>Následující programové testy zapisují aplikaci Gtk#:</p>

<pre class="prettyprint linenums scroll-horizontal"><code class="language-HTML ">using Gtk;
using System;

class Hello
{
       static void Main ()
       {
           Application.Init ();

           Window window = new Window ("Hello Mono World");
           window.Show ();

           Application.Run ();
       }
}</code></pre>

<strong>Chcete-li zkompilovat, použijte mcs s volbou -pkg a řekněte kompilátoru, aby vytáhl knihovny Gtk# (Gtk# musí být nainstalován ve vašem systému, aby to fungovalo):</strong>
<pre class="prettyprint linenums scroll-horizontal"><code class="language-C# "><strong>mcs</strong> hello.cs -pkg:gtk-sharp-2.0</code></pre>

<strong>Kompilátor vytvoří "hello.exe", který můžete spustit pomocí:</strong>
<pre class="prettyprint linenums scroll-horizontal"><code class="language-C# "><strong>mono</strong> hello.exe</code></pre>

<h4>WinForms</h4>
<p>V aplikaci System.Windows.Forms:</p>

<pre class="prettyprint linenums scroll-horizontal"><code class="language-HTML ">using System;
using System.Windows.Forms;

public class HelloWorld : Form
{
    static public void Main ()
    {
        Application.Run (new HelloWorld ());
    }

    public HelloWorld ()
    {
        Text = "Hello Mono World";
    }
}</code></pre>

<strong>Chcete-li kompilovat, použijte příkaz csc s volbou -r a řekněte kompilátoru, aby vytáhl knihovny WinForms:</strong>
<pre class="prettyprint linenums scroll-horizontal"><code class="language-C# "><strong>csc</strong> hello.cs -r:System.Windows.Forms.dll</code></pre>

<strong>Kompilátor vytvoří "hello.exe", který můžete spustit pomocí:</strong>
<pre class="prettyprint linenums scroll-horizontal"><code class="language-C# "><strong>mono</strong> hello.exe</code></pre>

<p>Pozn.
    <i>V systému Mac OS X budete muset počkat asi minutu, kdy se poprvé spustíte tento příkaz. Musíte také použít, mono32 protože WinForms zatím není podporován na 64bit.</i>
</p>
