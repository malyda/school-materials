
<h2>  ActionAlert</h2>
<p class="author">Tomáš Hubka</p>
<p class="introduction"> ActionAlert je vysoce přizpůsobitelný cross platform systém alertů a notifikací pro Android a iOS. Obsahuje jak modální, tak nemodální alerty, dialogová okna a
    notifikace s minimem kódování pro rychlé zobrazení informací uživateli o procesech aplikace nebo rychlé upozornění na údálost. Tento plugin oproti defaultnímu DisplayAlert disponuje
    několika výhodami, jako například přetahovatelnými alerty, rozšířenými možnostmi samotných alertů a jejich vzhledem.</p>

<p> ActionAlert umožňuje jednodušše implementovat obrázky, indikátory aktivity, progress bary a interaktivní tlačítka do notifikace, a to bez potřeby změny kódu napříč platformami.
    V mnoha případech je kód použitý na zobrazení ActionAlert na jedné platformě možné použít téměř nepozměněný na druhé platformě. Plugin tak nejen že ušetří čas při kódování,
    ale usnadňuje údržbu kódu napříč platformami.</p>
<h3>Typy notifikací</h3>
<p>ActionAlert poskytuje 4 hlavní typy notifikací a alertů, které mohou být dále rozšířeny o nadpisy, popisy, ikony nebo tlačítka (např. OK nebo Zrušit). Základnímy tipy jsou:</p>
<ul>
    <li><b>Default</b> - Standartní typ alertu, který může obsahovat ikonu, nadpis a/nebo popisek. <b>Default</b> typ je nastaven na fixní šířku 312 pixelů a flexibilní výšku
        , která se dopočítává na základě obsahu.</li>
    <li>
        <b>ActivityAlert</b>
        - zobrazí indikátor aktivity (<img src="https://us.v-cdn.net/5019960/uploads/editor/tb/v7j8jr4m55d4.png" alt="indikátor aktivity u iOS" style="
						width:20px;margin-top: 0px;
						margin-bottom: 0px;
						display: initial;"> u iOS a <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMgAAADICAMAAACahl6sAAAAXVBMVEX///8AlogAkoMKm40DmIkTnpHw+fj6/f0gpJfG6OUmppr2/Pu+5OHc8e/Y7+3q9/ZFsqiO0cvN6uio29eY1c8yq58+r6V+ysNqwrpgvrVRt651x7+34t6s3dlkv7fYiA5BAAAFJklEQVR4nO2c64KiMAyFx4KAIiIiCl7m/R9z1bmdAN5zyuxuvt8zbdO0uTX49mYYhmEYhmEYhmEYhmEYhmEYhmEYhmH8t6RRnk3KclPXdVGWyyzLo3joNT1MdthsqyRwgiBZbItZNPTa7mdeB6PLuKCZD73CO8hWTeLcFTlOorikKbOhV3qVbBGG14X4IgzXv1aUvKxu6UIqZn3Ih15zH7vxA0J8Mn4fetVtojJ8RBk/WglXv8qKFdOnxDiLMl0NvfpvouppMT5E+SVXZRO8JMeRcDO0DEey5EUpzgyvlPKC3zgGJOum2M8m+WmJeb6c7YtmffSVF7QXDHxT3vvlON7gPEo7fx2n0X53ybwNaYnzdc+iXFjVV532rK76hHHbwQzxsud6uGAz76qiRZrtRj2iJANdlGXPWoLdvf9d9O3CkrneS0w6sboLNw/saVx2vWgw4a33El19hM3NM9Wi6JgK/zqZtdfgFk+sIXpvb0c401/rNfLO+T48N9Cyc0C9po95K2R3z2dJedMSZOzTdq1bk+8evR3IqjXYWm2ZN6nlyQ6K14Yr5fFytc4qb7ORO/i6zZy3fMqLG3P3tHIDNc50Ku9c6McIyzRKJwDPp0KSqcaYt2iEHIFSpLeU18RDKDwRnlDPVkqHEvAPlzwDT7rBPkoxcKU3cD8rPFhO1bzUvKG75OIA3B2z38dWHC6ugxcuRDsRyoQRpqokRoU49eShxMMVMF+F0PQyTjHGcE754CIZ7ljySqB4aQJxBXnvDnhDHKUQtUNBaPXHFH0IJ4oQQdeUoPMzmKazkuu9hzneKtitBcmmpDCJI6VYc7zqtFIt5ouOk7/jRQwpM5zBoJRigWMw8o74oLEBxVeMA4wBBFEhQiVjhiuZwU5tCeN/A/UhxyjXbUEQ6qvM4UclriGMDxrnFgcwVSCcYYyzxvrDI+hK9C8JpIZMm3WigKn0DzFE8PTaP0ylf0mgGOjUB788V6I9NnoRepX5Ha6jduqOdVJi6vYB3Ef1Ahe8ULlSeezuZGB/tV3iAcamv1ii+hVLgGegDsgvZ+KF1FY/pOuUSE6Qg9nS9lmQjCT0VosUBNG2LAsQhFUT+AGqHNqBNgji4RUGBFkoD22CPIUJchuvgqDV0hYEzS/dakVE8+tVEPTs2oJAiML37CiIdoroVRB8AtcOGiGM50e/h598RD2Mxw5Gej5SEBOrzGeGCO/UgfY5jsEi0nN22LREvYwNHnGkPXaLHGqB2v5QVPvZdS1uLRCK8Y5ajJclU4KFBH1TmxKEXWHUAuHBiutJ8JMUhl3BBidqFRuML6UrYQ4bpV6RBSKYJ2A860aQ7bg9YYJPsP9sSinYYF8YL7mK8Xma8fImQrnRiHbdC5jEkbrosAdJ3+N+4KOFQza4kZKSg4+mmggSN0dSCWqd1uYkrrvTTt3OFKh0nrfawyyjirBfaOJHjljkqMjNmaLHifkZiejOJHRToQ8JqFUn0SytXuDa4T5xE+ql+FZB+3Bhq1ZILjqJz4zVu5Dy6mujKH1BSCS/S1KPVPafO8W9IScOQhBCHXh12ipOe7REfIPoCN432o2djy/CU/kR4pqQv0cLLx/wycPltvxHXhbrliRDr+dp4tYnqfRaMI3Wb6H4MDEk9sLBs7JFH8ADlmN9uOCH7xrBX3zXP/j8tYa/+KZ/ce6fZbcA+yBeOA+vcD6Im3/gXJ2J6c+7hmEYhmEYhmEYhmEYhmEYhmEYhmEYhmEYhmEYhmEYhvE0fwCC2i1jAp5kIAAAAABJRU5ErkJggg==" alt="indikátor aktivity u iOS" style="
						width:20px;margin-top: 0px;
						margin-bottom: 0px;
						display: initial;"> u Androidu) společně s napisem a/nebo popiskem. ActivityAlert je nastaven na fixní šířku 312 pixelů a flexibilní výšku
        , která se dopočítává na základě obsahu.

    </li>
    <li><b>ActivityAlertMedium</b> - Stejný typ jako ActivityAlert až na jeho fixní šířku 123 pixelů.</li>
    <li><b>ProgressAlert</b> - Stejně jako Defaul, i tento typ může obsahovat ikonu, nadpis a/nebo popisek. K tomu ale ještě navíc obsahuje progress bar na spodní části notifikace.
        ProgressAlert je nastaven na fixní šířku 312 pixelů a flexibilní výšku, která se dopočítává na základě obsahu.
        notifikace.</li>
</ul>
<h4>Defaultní lokace a potahování uživatelem</h4>
<p> ActionAlert podporuje 3 defaultní lokace:<b>Nahoře</b>,<b>Uprostřed</b> a <b>Dole</b> s alerty centrovanými horizontálně. Pokud je lokace nastavená na <b>Custom</b>, může být
    alert napozicován kdekoliv pomocí kódu.</p>
<p> Alert také může být nastaven hodnotou <i>draggable</i> na true, kdy uživatel může s alertem pohybovat po obrazovce přetažením. Toto nastavení se dá dále omezit x a y koordináty,
    aby uživatel nemohl alert přetáhnout úplně kamkoliv nebo jen po určité ose. Na iPhonech a iPodech je osa x defaultně uzamknutá.</p>
<h4>Eventy</h4>
<p> ActionAlert definuje tyto eventy, které je možné monitorovat a reagovat na ně:</p>
<ul>
    <li>Touched</li>
    <li>Moved</li>
    <li>Released</li>
    <li>ButtonTouched</li>
    <li>ButtonReleased</li>
    <li>OverlayTouched (pro případ modálních alertů, kdy se uživatel dotkne oblasti mimo úroveň ActionAlert)</li>
</ul>
<h4>Vzhled</h4>
<p> ActionAlert byl navržen tak, aby vypadal stejně na všech platformách, nicméně jé možné nad ním mít plnou kontrolu. Plugin je plně přizpůsobitelný, od každého elementu UI
    po zaoblené alerty.</p>
<h4>Podpora iOS 8 a výše</h4>
<p> ActionAlert automaticky vybere vzhled verze iOS 7 na zařízeních běžících na verzi 7 a vyšší. Tento vzhled je samozřejmě možné upravit a přizpůsobit ho tak vzhledu aplikace.</p>
<h4>iOS příklady</h4>
<p> Níže se nacházejí příklady, které znázorňují rychlé použítí ActionAlert pomocí statických metod třídy UIActionAlert. Více kontroly lze docílit vytvořením vlastních instancí
    UIActionAlert a nastavením všech vlastností přímo.</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">using Appracatappra.ActionComponents.ActionAlert;

// Defaultní Alert pouze s nadpisem a popiskem
UIActionAlert.ShowAlert ("ActionAlert", "Cross platform Alert, Dialogový a notifikační systém pro iOS a Android.");

// Defaultní Alert s nadpisem, popiskem, ikonou a OK tlačítkem
UIActionAlert.ShowAlertOK (UIImage.FromFile ("ActionAlert.png"), "ActionAlert", "Cross platform Alert, Dialogový a notifikační systém pro iOS a Android.");

// Defaultní Alert s nadpisem, popiskem a vlastnímy tlačítky
_alert = UIActionAlert.ShowAlert ("ActionAlert", "Cross platform Alert, Dialogový a notifikační systém pro iOS a Android.","Zrušit,Možná,OK");

// Odezva ke zmáčknutí tlačítka
_alert.ButtonReleased += (button) => {
	_alert.Hide();
	UIActionAlert.ShowAlert(UIActionAlertLocation.Top, String.Format ("Zmáčknuli jste tlačítko {0}.", button.title),"");
};

// Nemodální Activity Alert s nadpisem, který může být posunut po obrazovce uživatelem
_alert = UIActionAlert.ShowActivityAlert ("Activity Alert", "", false);
_alert.draggable = true;

// Nemodální Activity Alert střední velikosti s nadpisem
_alert = UIActionAlert.ShowActivityAlertMedium ("Čekám...", false);

// Nemodální Activity Alert s progress barem nastaveným na 50%, nadpisem a popiskem
_alert = UIActionAlert.ShowProgressAlert ("Progress Alert", "Zobrazí alert pro proces s předem znanou délkou a vrací feedback uživateli.", false);
_alert.progressView.Progress = 0.5f;</code></pre>
<h4>Android příklady</h4>
<p> Níže se nacházejí příklady na platformu Android vytvořené pomocí metody <b>OnCreate</b>:</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">using Appracatappra.ActionComponents.ActionAlert;

// Defaultní Alert pouze s nadpisem a popiskem
UIActionAlert.ShowAlert (this, "ActionAlert", "Cross platform Alert, Dialogový a notifikační systém pro iOS a Android..");

// Defaultní Alert s nadpisem, popiskem, ikonou a OK tlačítkem
UIActionAlert.ShowAlertOK (this, Resource.Drawable.ActionAlert_57, "ActionAlert", "Cross platform Alert, Dialogový a notifikační systém pro iOS a Android.");

// Defaultní Alert s nadpisem, popiskem a vlastnímy tlačítky
_alert = UIActionAlert.ShowAlert (this, "ActionAlert", "Cross platform Alert, Dialogový a notifikační systém pro iOS a Android.","Cancel,Maybe,OK");

// Odezva ke zmáčknutí tlačítka
_alert.ButtonReleased += (button) => {
	_alert.Hide();
	UIActionAlert.ShowAlert(this, UIActionAlertLocation.Top, String.Format ("Zmáčknuli jste tlačítko {0}.", button.title),"");
};

// Nemodální Activity Alert s nadpisem, který může být posunut po obrazovce uživatelem
_alert = UIActionAlert.ShowActivityAlert (this, "Activity Alert", "", false);
_alert.draggable = true;

// Nemodální Activity Alert střední velikosti s nadpisem
_alert = UIActionAlert.ShowActivityAlertMedium (this, "Čekám...", false);

// Nemodální Activity Alert s progress barem nastaveným na 50%, nadpisem a popiskem
_alert = UIActionAlert.ShowProgressAlert (this, "Progress Alert", "Zobrazí alert pro proces s předem znanou délkou a vrací feedback uživateli.", false);
_alert.progressView.Progress = 50;
</code></pre>


<p>Stažení a dokumentace pluginu: <a href="https://components.xamarin.com/view/actionalert">ActionAlert</a></p>