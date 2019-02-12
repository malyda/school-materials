
<h2>  Xamarin plugin Geolocator</h2>
<p class="author">Tomáš Faltýn</p>

<p>Geolocator je jednoduchý multiplatformní geolokační plugin, určený pro získávání nejen lokace, ale i směru pohybu, rychlosti a dalších údajů na základě GPS. K dispozici je především pro Xamarin, ale podporuje mnoho dalších platforem – Xamarin.iOS (iOS 8+), Xamarin.Android (API 14+), Windows 10 UWP (10+), macOS (všechny verze) a tvOS (10+).</p>

<h3>Jak nainstalovat a zprovoznit plugin</h3>
<ul>
    <li>Nainstalovat <a href="https://www.nuget.org/packages/Xam.Plugin.Geolocator/">plugin Geolocator</a> z nabídky nuget balíčků</li>
    <li>Plugin se musí vložit do všech projektů, které aplikace obsahuje</li>
    <li>Do části namespace se musí napsat <strong>using Plugin.Geolocator;</strong>, což zaruří plnou funkčnost pluginu</li>
</ul>

<h4>Použití API pluginu</h4>
<p>Přístup k API je velmi snadný. Do všech projektů se musí vložit kód vypsaný níže.</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">public bool IsLocationAvailable()
{
    //podmínka, která se dotazuje, zda je plugin podporovaný na dané platformě
    if(!CrossGeolocator.IsSupported)
        return false;

    return CrossGeolocator.Current.IsGeolocationAvailable;
}</code>
</pre>
<h4>Další potřebná nastavení</h4>
<p>Než se plugin může spustit, musí se nastavit ještě několik potřebných oprávnění a nastavení. Pro každou platformu budou vypsané potřebné kroky, které musí uživatel udělat.</p>
<h5>Android</h5>
<p>Cílová verze na rozhraní se musí nastavit na API 25+.</p>
<p>Plugin využívá tzv. <strong>Current Activity Plugin</strong>, což znamená, že potřebuje přístup k aktivitě Android zařízení. Kód, který musí uživatel vložit do projektu je následovný:</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">Plugin.CurrentActivity.CrossCurrentActivity.Current.Activity = this;</code>
</pre>
<p>Dále se musí vložit do jednotlivých projektů kde má být plugin funkční kód, který je k vidění níže:</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">public override void OnRequestPermissionsResult(int requestCode, string[] permissions, Android.Content.PM.Permission[] grantResults)
{
    Plugin.Permissions.PermissionsImplementation.Current.OnRequestPermissionsResult(requestCode, permissions, grantResults);
}</code>
</pre>
<h5>iOS/tvOS/macOS</h5>
<p>Aby plugin mohl využívat aktuální polohu zařízení, musí se vytvořit klíče, které budou vloženy do souboru <strong>Info.plist</strong>. Vložený kód bude vypadat takto:</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">< key>NSLocationWhenInUseUsageDescription< /key> // musí se odstranit mezery u <>
< string>This app needs access to location when open.< /string> // musí se odstranit mezery u <>
</code>
</pre>

<h3>Získávání aktuální polohy</h4>
    <p>Nyní budou vypsány a vysvětleny hlavní funkce celého pluginu, nakonec bude ukázka celého kódu.</p>
    <pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">double DesiredAccuracy { get; set; } // určuje přenost v metrech, základní hodnota je 100 metrů
bool SupportsHeading { get; } // zjišťuje, zda daná platformá a zařízení podporuje směr, ve kterém se zařízení nachází (např. otáčející se šipka u navigací)
bool IsGeolocationAvailable { get; } // zjišťuje, zda je geolokace na zařízení dostupná
bool IsGeolocationEnabled { get; } // zjišťuje, za je geolokace na zařízení povolena</code>
</pre>
    <p>Základní kód pluginu by tedy mohl vypadat takto:</p>
    <pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">public async Task<Position> GetCurrentLocation()
{
   public static async Task<Position> GetCurrentPosition()
	{
			Position position = null;
			try
			{
					var locator = CrossGeolocator.Current;
					locator.DesiredAccuracy = 100; // přesnost nastavena na 100 metrů

					position = await locator.GetLastKnownLocationAsync(); // zjišťuje poslední známou lokaci (uložena v paměti Cache)

					if (position != null)
					{
							// pokud je známa poslední lokace, bude vrácena
							return position;
					}

					if (!locator.IsGeolocationAvailable || !locator.IsGeolocationEnabled)
					{
							//zjišťuje, zda je geolokace na zařízení k dispozici a povolena
							return null;
					}

					position = await locator.GetPositionAsync(TimeSpan.FromSeconds(20), null, true); // získání zadané pozice; doba čekání nastavena na 20 sekund, možnost zrušení nastavena na null, dotaz, zda chce uživatel směrovou šipku

			}
			catch (Exception ex)
			{
					Debug.WriteLine("Unable to get location: " + ex); // vypíše chybu pokud aplikace nemůže zadanou adresu najít
			}

			if (position == null) // když není zadaná lokace, nic se nestane
					return null;

			var output = string.Format("Time: {0} \nLat: {1} \nLong: {2} \nAltitude: {3} \nAltitude Accuracy: {4} \nAccuracy: {5} \nHeading: {6} \nSpeed: {7}",
					position.Timestamp, position.Latitude, position.Longitude,
					position.Altitude, position.AltitudeAccuracy, position.Accuracy, position.Heading, position.Speed); // poté co se zadaná lokace nalezne, vypíše se: Doba trasy (0), zeměpisná šířka (1), zeměpisná délka (2), nadmořská výška (3), přesnost nadmořské výšky (4), přesnost (5), směr (6), rychlost (7)

			Debug.WriteLine(output); // bude vypsána výše zmíněná proměnná output

			return position;
	}
}</code>
</pre>

    <h3>Další možnosti pluginu</h4>
        <p>Jako další funkcí pluginu je možnost změny zadané lokace, takže se všechny vypočítané hodnoty přepíší podle nově zadané lokace. Mezi další funkce patří tzv. <strong>geocoding</strong>, což je proces, který dokáže převést poštovní adresu (ulice, město, PSČ) na místo, které se schoduje s danou adresou (souřadnice). Funkce dokáže zmíněný převod udělat i naopak, takže při zadání místa se vytvoří poštovní adresa. Názorná ukázka funkce <strong>geocoding</strong> bude nyní ukázána a vysvětlena.</p>
        <pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">try
{
	string mapKey = null; //musí se vytvořit pouze na platformě UWP
  var addresses = await locator.GetAddressesForPositionAsync (position, mapKey); // načtení adresy; přesná pozice (zeměpisná šířka a délka) a mapKey (pouze na platformě UWP)
  var address = addresses.FirstOrDefault();

  if(address == null)
    Console.WriteLine ("No address found for position."); // nebyla nalezena adresa ze zadané pozice
  else
    Console.WriteLine ("Address: {0} {1} {2}", address.Thoroughfare, address.Locality, address.CountryCode); // bude vypsáno číslo silnice/cesty, lokalita, kód dané republiky, ve které se adresa nachází
}
catch(Exception ex)
{
  Debug.WriteLine("Unable to get address: " + ex); // nebylo možnost získat adresu
}</code>
</pre>