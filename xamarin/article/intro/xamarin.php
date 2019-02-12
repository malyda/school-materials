<h2>Xamarin</h2>
<p class="introduction">
	Na počátku byl Linux, na kterém neběžely stejné aplikace jako na Windows. Několik chytrých hlav se sešlo a přepsalo platformu .NET tak, aby běžela na Linuxu, vznikl projekt Mono.
</p>

<h3>Mono</h3>
<p>
	Mono je opensourcová implementace .NET frameworku sponzorovaná společností Microsoft. Mono je vyvíjeno pod ECMA standardy pro C# a CLR. Cílem tohoto projektu je vyvíjet multiplatformní aplikace, které běží na operačních systémech jako Linux, Unix, Mac OS X, Solaris a Windows atd.
</p>

<p>
	Za vznikem projektu stojí Miguel de Icaza, který napsal vlastní kompilátor pro C#. Mono bylo oficiálně představeno na konferenci O'Reilly roku 2001. Protože je Mono open-source, tak kvůli vyvíjení vlastních produktů a licencování vznikla společnost Xamarin.
</p>

<p>
	Po úspěšném zavedení Mona na osobní počítače se projekt vyvíjel dál směrem k Mono Touch a Mono for Android. Vývoj Mono převzala společnost Xamarin a přejmenovala dosavadní produty na Xamarin.Android, Xamarin.Mac atd. Společnost Xamarin licencovala své produkty (Mono produkty zůstaly pod open-source, Xamarin ne).
</p>

<h3>Xamarin - společnost</h3>
<p>
	V roce 2016 společnost Microsoft odkoupila společnost Xamarin a oznámalila, že Xamarin SDK budou open-source a budou dodávány zdarma všem (společnost Xamarin stále stojí za vývojem produkty Xamarin).
</p>

<h3>Xamarin - platforma</h3>
<p>
	Umožňuje psát aplikace v C# pro různé operační systémy, samotná implementace zdrojového kódu probíhá pomocí konkrétních Xamarin SDK. Pro vývoj na Android v C# pomocí Xamarin se využívá Xamarin.Android, pro iOS Xamarin.iOS atd.
</p>
<p> 
	Kompilace probíhá stejně jako u .NET platformy,zdrojový kód se zkompiluje do přenositelného (CIL) a poté se na daném zařízení konkretizuje na nativní (dle CPU atd.).
</p>
<p>
	Xamarin platforma se skládá z z několika částí:
</p>
<ul>
	<li> C# - využívá velkou základnu programátorů, doplňků do VS, tutoriálů atd. </li>
	<li> .NET - poskytuje obrovské množství knihoven, je to platforma stavěná na multiplatformní vývoj </li>
	<li> Kompilátor - produkuje nativní kód založení na multiplatformním</li>
</ul>

<i> Pozn. <a href="https://developer.xamarin.com/guides/cross-platform/application_fundamentals/building_cross_platform_applications/part_1_-_understanding_the_xamarin_mobile_platform/"> Více o Xamarin </a></i>
<br><a href="https://developer.xamarin.com/samples-all/">Xamarin examples</a>
<br><a href="https://developer.xamarin.com/samples/xamarin-forms/all/">Xamarin  Forms examples</a>
<br><a href="https://channel9.msdn.com/Events/Connect/2017/B109">What is Xamarin</a>