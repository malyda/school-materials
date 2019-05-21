<h2>Universal Windows Platform</h2>
<p class="author">Michal Moudrý</p>
<p class="introduction">
    V červenci 2015 byl vydán Windows 10, který běžel na zařízeních jako herní konzole Xbox One, mobilní telefony, IoT, Microsoft Hololens a další viz. Obrázek 1.
    Tento OS měl stejné jádro a kód na všech zařízeních, což vedlo k vytvoření UWP, také známé jako UAP (Universal Application Platform).
</p>

<img src="images/uwp.png" title="Přehled UWP" alt="Přehled UWP" />
<strong style="text-align: center;">Obrázek 1 - Přehled UWP</strong>

<p>
    Tato platforma není runtime, ale jedná se o aplikační model a API, které je zaručeně dostupné na podporovaných typech zařízení.
    Vývojář tedy nebude závislý na operačním systému, jako tomu bylo před tím u WinRT. Místo toho se bude zaměřovat aplikační platformu, respektive na konkrétní sadu a verzi API.
    Ve výsledku lze tedy vytvořit jeden aplikační balíček, který lze nainstalovat na velké množství typů zařízení.
</p>

<p>Pozn.
    <i> UWP = Universal Windows Platform</i>
</p>

<p>
    <a href="https://github.com/MichalMoudry/UWP-TodoApp" title="UWP To-do app" target="_blank">Sample - UWP To-do app</a>
</p>

<h3>Univerzální Windows Aplikace</h3>
<p>
    Aplikace vyvíjené na této platformě jsou označovány jako Univerzální Windows Aplikace ve zkratce UWA.
</p>
<p>
    Rozdíly mezi nimi a ostatními je právě ta samotná platforma, jež poskytuje jednotné API, ale také jsou distribuovány ve formátu .appx, který poskytuje důvěryhodný instalační proces a zajišťuje, že aplikace budou nasazeny a aktualizovány.
    Samozřejmě tyto aplikace mohou využívat i ostatní API (Win32 nebo .NET) než univerzální, třeba pro implementaci určité funkcionality na mobilním telefonu nebo na herní konzoli.
    Tyto rozhraní jsou zahrnuty v tzv. Extension SDK.
</p>
<p>
    Jelikož lze UWA instalovat na mnoho zařízení, tak UWP poskytuje ovládací prvky, jež se přizpůsobují zařízení a aplikace tedy podporují velké množství vstupů, jako klávesnice, dotek, herní ovladač a další.
</p>
<p>
    Pro přizpůsobení prvků UI se používá systém pro škálování a tzv. <i>Effective pixels</i> za účelem zlepšení čitelnosti a zjednodušení používání daných prvků.
    Tento systém využívá algoritmus, který pro optimalizaci uživatelského rozhraní vezme PPI zařízení společně s průměrnou vzdáleností mezi uživatelem a zařízením viz. Obrázek 2.
</p>

<img src="images/scalling.png" title="Ukázka škálování fontu" alt="Ukázka škálování fontu" />
<strong style="text-align: center;">Obrázek 2 - Ukázka škálování fontu</strong>

<p>
    Vývojář při tvorbě uživatelského rozhraní tedy nepracuje s fyzickými pixely ale s efektivními (epx), kdy se jedná o virtuální jednotku a používá se pro specifikování rozměrů nezávisle na PPI displeje zařízení.
</p>

<h3>Device famillies</h3>
<p>
    Jelikož je důležité, aby aplikace běžely na různých typech zařízení, tak byl vytvořen koncept zvaný <i>Device famillies</i>, přičemž se jedná o označení skupin zařízení viz. Obrázek 3, respektive popis dostupných API, systémových vlastností a jejich chování na daném typu.
</p>
<p>
    Mezi ně patří kupříkladu Desktop device family, jež označuje desktop, laptop i tablet. Ve výsledku to znamená, že každá rodina přidává dodatečné rozhraní ke zděděným z Universal device family, která poskytuje API dostupné na všech zařízeních.
    Ovšem vývojář se musí rozhodnout, které bude podporovat a k tomuto rozhodnutí musí uzpůsobit výslednou aplikaci, tedy napsání tzv. adaptivního kódu (využití API za podmínky její dostupnosti) nebo přizpůsobení UI pro jednotlivé druhy zařízení nebo vytvořit adaptivní uživatelské rozhraní k čemuž se použijí epx při určování takzvaných breakpoints viz. Tabulka 1.
</p>
<p>
    Problémem je, že univerzální API nemusí být kompletní na zařízení, což vývojář musí vzít v úvahu při rozhodování, kdy například na herní konzoli Xbox není třída Web Account Manager, která se nachází v ostatních rozhraní.
</p>

<table class="table-basic">
    <tr class="mdl-color--primary">
        <th>Označení třídy</th>
        <th>Šířka v epx</th>
        <th>Úhlopříčka</th>
        <th>Typické zařízení</th>
    </tr>
    <tr>
        <td>Malé</td>
        <td><640epx</td>
        <td>4" - 6"</td>
        <td>Telefon</td>
    </tr>
    <tr>
        <td>Střední</td>
        <td>641epx - 1007epx</td>
        <td>7" - 12"</td>
        <td>Tablet</td>
    </tr>
    <tr>
        <td>Veliké</td>
        <td>>1007epx</td>
        <td>13" a větší</td>
        <td>Desktop, laptop, Surface Hub, ...</td>
    </tr>
</table>
<strong style="text-align: center;">Tabulka 1 - Přehled tříd velikostí</strong>

<img src="images/device-family-tree.png" title="Přehled rodin zařízení" alt="Přehled rodin zařízení" />
<strong style="text-align: center;">Obrázek 3 - Přehled rodin zařízení</strong>

<h3>Zdroje</h3>
<p>
    1. <strong>Wigley, Andy</strong> a <strong>Nixon, Jerry</strong>. Windows 10 - An Introduction to Building Windows Apps for Windows 10 Devices. MSDN Magazine. [Online] Microsoft, 5 2015. [Citace: 7. 3. 2018.]
    <a title="Windows 10 - An Introduction to Building Windows Apps for Windows 10 Devices" target="_blank" href="https://msdn.microsoft.com/magazine/dn973012.aspx">https://msdn.microsoft.com/magazine/dn973012.aspx</a>.
</p>
<p>
    2. <strong>Microsoft</strong> Windows 10 update history. Windows support. [Online] Microsoft. [Citace: 7. 3. 2018.]
    <a title="Windows 10 update history" target="_blank" href="https://support.microsoft.com/en-us/help/4000823">https://support.microsoft.com/en-us/help/4000823</a>.
</p>
<p>
    3. <strong>Whitney, Tyler</strong>. Intro to the Universal Windows Platform. Microsoft Docs. [Online] Microsoft, 27. 10. 2017. [Citace: 12. 2. 2018.]
    <a title="Intro to the Universal Windows Platform" target="_blank" href="https://docs.microsoft.com/en-gb/windows/uwp/get-started/universal-application-platform-guide">https://docs.microsoft.com/en-gb/windows/uwp/get-started/universal-application-platform-guide</a>.
</p>
<p>
    4. <strong>Radich, Quinn</strong>. What's a Universal Windows Platform (UWP) app? Microsoft Docs. [Online] Microsoft, 3. 22. 2018. [Citace: 7. 3. 2018.]
    <a title="What's a Universal Windows Platform (UWP) app?" target="_blank" href="https://docs.microsoft.com/en-us/windows/uwp/get-started/whats-a-uwp">https://docs.microsoft.com/en-us/windows/uwp/get-started/whats-a-uwp</a>.
</p>
<p>
    5. <strong>Zheng, Serena</strong>. Introduction to UWP app design. Microsoft Docs. [Online] Microsoft, 12. 13. 2017. [Citace: 7. 3. 2018.]
    <a title="Introduction to UWP app design" target="_blank" href="https://docs.microsoft.com/en-us/windows/uwp/design/basics/design-and-ui-intro">https://docs.microsoft.com/en-us/windows/uwp/design/basics/design-and-ui-intro</a>.
</p>
<p>
    6. <strong>Jacobs, Mike</strong>. Screen sizes and break points for responsive design. Microsoft Docs. [Online] Microsoft, 30. 8. 2017. [Citace: 8. 3. 2018.]
    <a title="Screen sizes and break points for responsive design" target="_blank" href="https://docs.microsoft.com/en-us/windows/uwp/design/layout/screen-sizes-and-breakpoints-for-responsive-design">https://docs.microsoft.com/en-us/windows/uwp/design/layout/screen-sizes-and-breakpoints-for-responsive-design</a>.
</p>