
			
			<h2>Multiplatfomní barcodová čtečka</h2>
			<p class="author">Jakub Bednář</p>
			<p class="introduction">Všechen spotřební materiál v našem okolí má dnes nějaké identifikační číslo doplněné čárovým nebo QR kódem. Tento článek popisuje jak jednoduše získat číslo z toho kódu do multiplatformní aplikace.</p>
			
			<h3>ZXing.Net.Mobile</h3>
			
			<p>ZXing.Net.Mobile je PCL knihovna určená pro Android, iOS a Win. platformy. Stačí přidat <a href="https://components.xamarin.com/view/zxing.net.mobile">ZXing</a> nuget do všech solutionu.</p>
			<p>Pro zobrazení fotoaparátu čtečky stačí vložit následující kód který otevře novou Page se skenerem (upravené zobrazení fotoaparátu)</p>

<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">var scanPage = new ZXingScannerPage();
//Když zachití skenovaný kód vratí se o stránku zpět 
//kde vypíše DisplayAlert hlašku s naskenovaným kódem
scanPage.OnScanResult += (result) => {
    // Přestane skenovat
    scanPage.IsScanning = false;
    // Vrátí se o stránku zpet
    Device.BeginInvokeOnMainThread(() => {
        Navigation.PopAsync();
        DisplayAlert("Scanned Barcode", result.Text, "OK");
    });
};
// Otevíra skener (fotoaparát)
Navigation.PushAsync(scanPage);</code>
</pre>


			<h4>Specifické úpravy pro Android</h4>
				<p>V droid solution je třeba vložit řádek inicializace <strong>Droid -> MainActivity.cs -> OnCreate() -> vložit</strong>. Inicializaci je nutné umístit až za <strong>global::Xamarin.Forms.Forms.Init(this, bundle);</strong></p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">ZXing.Net.Mobile.Forms.Android.Platform.Init();
</code></pre>				

			<h4>Specifické úpravy pro iOS</h4>
				<p>V iOS solution je třeba vložit řádek inicializace <strong>iOS -> AppDelegate.cs -> FinishedLaunching() -> vložit</strong> . Inicializaci je nutné umístit až za <strong>global::Xamarin.Forms.Forms.Init();</strong></p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">ZXing.Net.Mobile.Forms.iOS.Platform.Init();
</code></pre>

	
<p>Dále je nutné vytvořit oprávnění na používaní fotoaparátu. Toto oprávnění se vytváří v <strong>iOS -> Info.plist -> Zdroj(dole)</strong>. Pod výpisem již zadáních klíčů je <strong>Přidat novou položku</strong> když máme vytvořenou novou položku namísto <strong>Custom Property</strong> nastavíme <strong>Privacy - Camera Usage Description</strong>. Jako Typ nastavíme Řetězec a namísto hodnoty vložíme hlášku tázající se na možnost použít fotoaparát uživatele.</p>

<p>Po vyplnění by měl klíč vypadat takto:</p>
<table class="table-basic">
	<tr class="mdl-color--primary">
		<th>Vlastnost</th>
		<th>Typ</th>
		<th>Hodnota</th>
	</tr>
	<tr>
		<td>Privacy - Camera Usage Description</td>
		<td>Řetězec</td>
		<td>Can we use your camera?</td>
	</tr>
</table>

			<h4>Specifické úpravy pro UWP</h4>
				<p>V UWP solution je třeba vložit řádek inicializace <strong>UWP -> (Hlavní stranka) -> vložit do konstruktoru</strong></p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">ZXing.Net.Mobile.Forms.WindowsUniversal.ZXingScannerViewRenderer.Init();
</code></pre>	

			<h4>Nastavení ZXing</h4>
				<p>V případě, že potřebuje upravit nějakou vlastnost čtečky, je zde možnost úpravy vytvořením třídy "options".</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">	//noví objekt nastaveni
MobileBarcodeScanningOptions options = new MobileBarcodeScanningOptions();
//list povolených formátú pro skenovaní
options.PossibleFormats = new List<ZXing.BarcodeFormat>() {
	ZXing.BarcodeFormat.CODE_128
};
//další nastavení
options.AutoRotate = false;
options.TryHarder = true;

//noví objekt skenru
var scanPage = new ZXingScannerPage(options);

scanPage.OnScanResult += (result) => {
   	//Konec skenování
    scanPage.IsScanning = false;

    // navrat na uvodní stranku a vypis naskenované hodnoty
    Device.BeginInvokeOnMainThread(() => {
        Navigation.PopAsync();
        DisplayAlert("Scanned Barcode", result.Text, "OK");
    });
};

// Odevření skenru
Navigation.PushAsync(scanPage);</code></pre>


<p>Pro zprávnou funkčnost musíme mít nalinkované následující knihovny:</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">using ZXing.Net.Mobile.Forms;
using ZXing.Mobile;
</code></pre>

<p>Příklad ke stažení <a href="https://github.com/malyda/Xamarin-BarCodeScanner">ZDE</a></p>