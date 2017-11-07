<h2>PCL vs Shared</h2>
<p class="introduction">
	V Xamarinu má programátor několik možností, jak svůj kód sdílet na více platforem. Nejzásadnějšími jsou Portable Class Library a Shared projekty.
</p>
<h3>Shared</h3>
<p>
	Kód je mezi různé platformy rozdělěn pomocí direktiv compileru a vzniká tak, po kompilaci, několik unikátních projektů, každý speciálně pro danou platformu.
</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">#if __ANDROID__
#elif ___IOS__</code>
</pre>
<p>
	Výhodou se může zdát, že je projekt lépe rozdělen do jednotlivých bloků pro každou platformu.
</p>
<p>
	Nevýhodou je, že takové rozdělení nezapadá do koncepu OOP a s narůstající velikostí projektu se stává kód nepřehledným.
</p>

<h3>PCL</h3>
<p> 
	Multiplatformní kód je napsaný v přenositelné knihovně, která je poté za běhu zpracovávána. Při kompilaci vzniká jedna společná knihovna a několik menších projektů, které ji využívají, také nesou platformě závislý kód.
</p>
<a href="https://developer.xamarin.com/guides/cross-platform/application_fundamentals/pcl/introduction_to_portable_class_libraries/">Introduction to PCL</a>
<p> Výhodou je zapojení muliplatformního i specializovaného kódu do jedné OOP architektury. Portable Class Library je jednoduše linkovatelná všemi částmi projektu a její tvorba je již mezi programátory zažitá.</p>
<p> Nevýhodou je nutnost větší robustnosti projektů i při méně rozsáhlých aplikacích. Také není schopná využívat knihoven, které jsou přítomné ve více knihovnách (System.IO v MonoTouch a Mono for Android), řešením je Dependency injection.</p>

<h3> V praxi </h3>
<p>
	V praxi se více využívá PCL oproti Shared. Nicméně Shared má stále velmi mnoho zastánců.
</p>
