<h2>Ukládání nastavení Aplikace PCL</h2>
<p class="author">Jakub Bednář</p>
<p class="introduction">Jak iOS tak Android mají svě přístupy k ukládání nastavení aplikace. Tímto uložením se zadaná data propíší pěvně do paměti a nezmizí při ukončení aplikace.</p>

<h3>Využití</h3>
<p>Existuje nespočet ruzných možností, co u jaké aplikace nastavovat. Příkladem může být uložení Jména a Hesla pro přihlášení nebo nastavení lokalizačního balíčku. Knihovnu je také možné využít pro přístup k systémovým "klíčenkám"</p>

<h3>Advexp.Settings Local</h3>
<p>Advexp.Settings Local je PCL knihovna určená pro Android a iOS platformy. Stačí přidat <a href="https://components.xamarin.com/view/advexp-settings-local">Advexp.Settings Local</a> nugget do všech solutionu.</p>

<p>Po zdárné instalaci nuget je třeba vytvořit třídu, která definuje nastavení. Jako příklad je níže uvedena třída pro ukládání jména.</p>

<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">using System;
using Advexp;

namespace dataSave
{
    public class Settings: Advexp.Settings<Settings>
    {
        // Definice prvku který chceme ukládat (prvků muže být kolik chceme)
        [Setting(Name = "SettingString", Default = "Derp")]
        public String SettingString { get; set; }

        // ** Netřeba měnit **
        // Jméno konfguračního souboru je automaticky
        // "{NamespaceName}.{ClassName}.{FieldName}"
        // Definice jména může být změněna
        // použitím SettingsConfiguration.SettingsNamePattern property
        // Defaultní název je: "{NamespaceName}.{ClassName}.{FieldName}"
        [Setting]
        public static String SettingWithAutoName { get; set; }
    }
}</code>
</pre>


<p>Pro načtení konfigurace stačí přidat následující řádek za inicializaci komponent (InitializeComponent();).</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">Settings.LoadSettings();</code>
</pre>


<p>Pro uložení do konfigurace stačí přidat následující řádek a nejpozději při ukončování aplikace Uložit nastavení vz. řádek 2.</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">Settings.Instance.SettingString = entry.Text;
Settings.SaveSettings();</code>
</pre>