<h2>Spuštění aplikace</h2>
<p class="introduction">
	Po vytvoření projektu je možné aplikaci zpracovat a spustit. Následují ukázky jsou pro spuštění Android a UWP aplikace.
</p>

<h3>Android</h3>
<p>
	Pro spuštění Android aplikace je potřeba splnit několik základních požadavků:
	<ul>
		<li>Android emulátor, nebo správně připojené reálné zařízení</li>
		<li>Správně vybraný projekt ke spuštění ve Visual Studio</li>
	</ul>
</p>
<p>
	Visual studio má vlastní Android emulátor, s Android SDK je stažený také základní AVD emulátor. Existuje také mnoho alternativ např. <a href="www.genymotion.com">Genymotion</a> nebo <a href="http://www.bluestacks.com/"> BlueStack</a>. Jeden z těchto emulátorů je potřeba spustit tak, aby Visual Studio registrovalo emulované zařízení jako reálně připojené (většinou není potřeba ve VS nic nastavovat). 
</p>

<h3>UWP</h3>
<p>
	Pro spuštění UWP aplikace je potřeba splnit několik základních požadavků:
	<ul>
		<li>Win 10, nebo zařízení kompatibilní s UWP platformou</li>
		<li>Správně vybraný projekt ke spuštění ve Visual Studio</li>
	</ul>
</p>

<h3>Nastavení konfigurace pro spuštění projektu</h3>
<p>
	Pro vybrání projektu je možné ho buď jednorázově vybrat v horní nabídce:
</p>
<img class="img-screen" src="images/selectRunConfiguration.png">

<p>Nebo vybrat daný projekt jako defaultní pro spuštění</p>
<img class="img-screen" src="images/startAsDefault.png">

<p>
	Poté stačí kliknout na zelenou šipku pro Run, nebo CTRL + F5 a aplikace se zkompiluje a spustí na vybraném zařízení.
</p>

<h3>Možný problém u UWP</h3>
<p>
	U některých verzí Xamarin, není v šabloně pro Xamarin.Forms Portable zahrnuto nastavení pro UWP. Toto nastavení může bránit v sestavení a spuštění aplikace. Typicky:
</p>
<img class="img-screen" src="images/UWP error.png">

<p>
	Náprava je naštěstí jednoduchá. Stačí vybrat vlastnosti Solution.
</p>
<img class="img-screen" src="images/solutionProperties.png">
<p>
	V nově zobrazeném okně v nabídce <strong>Configuration Properties</strong> žaškrtnout Build a Deploy pro UWP projekt. Zde je možné upravovat konfigurace i ostatních projektů.
</p>
<img class="img-screen" src="images/configurationProperties.png">

<h3>Výsledná aplikace</h3>
<h4>Android</h4>
<img class="img-screen-mobile-portrait" src="images/XAMLPageAppAndroid.png">
Pozn. <i>ScreenShot je z LG-G2 s Android verzí 5.0</i>
<h4>UWP</h4>
<img class="img-custom" src="images/XAMLPageAppUWP.png">
Pozn. <i>ScreenShot je z Win 10. Čísla v levém horním rohu jsou vditelná pouze v debug módu.</i>