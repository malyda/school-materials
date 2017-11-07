<h2>Chyby ve VS15 </h2>
<p class="introduction">
	Při zakládání projektu ve Visual Studio 2015 může dojít k několika chybám.
</p>

<h3>Chyby při zakládání projektu</h3>

<h4>Chybějící Nuget balíček</h4>
<p>
	Package Installation Error Could not add all required packages to the project. The following packages failed to install from 'C:\Program Files (x86)\Microsoft SDKs\NETCoreSDK': Microsoft.NetCore.UniversalWindowsPlatform.5.0.0: Package restore failed. Rolling back package changes for 'AppTest'
</p>
<image src="images/error_uwpPackage.png">
<p>
	Řešením této chyby je nainstalování chybějícího balíčku Microsoft.NETCore.UniversalWindowsPlatform do projektu UWP. Kontrolu, jestli je nainstalovaný, lze učinit na záložce nainstalové ve správci balíčků Nuget.
</p>
<image src="images/fix_uwpPackage.png">


<h3>Chyby při práci s projektem</h3>

<h4>Nastavení sestavení a nasazení projektu</h4>
<p>
	Project needs to be deployed before it can be started
</p>
<image src="images/error_deploy.png">
<p>
	Řešením této chyby je žaškrtnutí ve vlastnostech celého řešení(Solution) sestavení a nasazení pro jednotlivé projekty.
</p>
<image src="images/fix_deploy.png">

<h4>Balíček nelze přeinstalovat novější verzí</h4>
<p>
	Registration of the app failed. Another user has already installed a packaged version of this app. An unpackaged version cannot replace this. 
</p>
<p>
	Řešením této chyby je změna názvu balíčku vyvíjené aplikace. Ve vlastnostech projektu UWP: Application -> Package Manifest. V Package Manifest -> Packaging -> Package name změnit název na jiný.
</p>
<image src="images/fix_packageName.png">



<h3>Chyby při načítání projektu</h3>
<p>
	V tomto případě může vzniknout mnoho chyb, většinu z nich vyřeší opětovné sestavení celého řešení (Solution).
</p>
<image src="images/fix_loadingProject.png">

<h3>Varování</h3>
<h4>Více verzí stejné Assembly</h4>
<p>
	Vyřešeno aktualizací Xamarin For Visual Studio na poslední verzi (4.2.1.58).
</p>

<h4>An unexpected error occurred trying to initialize Android Designer.</h4>
<p>
	Vyřešeno updatem Android SDK Tools (na rev. 25.2.2) a Android Platform Tools (na rev. 25)
</p>


