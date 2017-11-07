<h2>První kroky s Xamarin.Forms</h3>
<p class="introduction">Založení Xamarin.Forms PCL projektu ve Visual Studio 2015.</p>
<h3>Založení projektu</h3>

<p>
	Xamarin.Forms projekt je k dispozici v předkonfigurovatelných šablonách a zakládá se stejně jako jakýkoliv jiný projekt ve Visual Studio.
</p>
	<img class="img-custom" src="images/newProject.png">
<p>
<p>Pozn.<i>Pro ukázky je použito Visual Studio 2015 Update 3 běžící na Win 10 (Xamarin for Visual Studio)</i></p>


	Šablony Xamarin.Forms jsou k nalezení ve <strong>Visual C# -> Cross-platform</strong>. K nalezení jsou zde šablony pro:
	<ul>
		<li>Nativní vývoj Portable i Shared</li>
		<li>Xamarin.Forms Portable i Shared</li>
		<li>XAML projekt</li>
		<li>PCL knihovna</li>
		<li>UI test</li>
	</ul>
		Pokračovat budeme s <strong>Blank App (Xamarin.Forms Portable)</strong>
</p>
	<img class="img-screen" src="images/PCL.png">
<p>
	Po vytvoření nového projektu ho Visual Studio automaticky načte a zobrazí.
</p>
<img class="img-screen" src="images/createdProject.png">
<p>
	Vpravo je zobrazena struktura projektu rozdělená do několika částí/podprojektů. Aplikace se jmenuje ShowApp a stejně tak i jmenný prostor. Droid, iOS, UWP, Windows, WinPhone jsou projekty určené pro platformě závislý obsah.
	<ul>
		<li>Portable - PCL se sdíleným kódem mezi ostatními projekty</li>
		<li>Droid - Android projekt</li>
		<li>iOS - projekt pro všechna iOS zařízení</li>
		<li>UWP - projekt pro celou UWP platformu (destktop Windows, XBox, novější WinPhone)</li>
		<li>Windwos - Windows 8.1</li>
		<li>WinPhone - Windows Phone 8.1</li>
	</ul>
	Pokud nebude programátor pracovat s jedním nebo více projekty, je možné je ze Solution vymazat, což může zrychlit build.
</p>
<img class="img-screen" src="images/projectStructure.png">
