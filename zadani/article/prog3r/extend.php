<h2>Úkoly, které využívají zdrojů ze cvičení</h2>
<p class="introduction">
    Následující zadání staví na zdrojích, které byly vypracovány během práce na samostatných cvičeních.
</p>
<h3>Either Mouse</h3>
<p>
    Vytvořte aplikací, která umožňuje pracovat s profily citlivosti myši, podobně jako to dělá aplikace EitherMouse.
</p>
<p>
    Požadavky na aplikaci:
</p>
<ul>
    <li>Aplikace využívá TrayIcon, kde je možné přepínat mezi profily myši</li>
    <li>Uživatel může spravovat profily a za běhu aplikace měnit citlivost myši</li>
    <li>Kromě změn citlivosti aplikace umí měnit i rychlost dvojkliku a počet řádků posunutých při scrollování </li>
</ul>
<p>
    Požadavky na technické zpracování:
</p>
<ul>
    <li>Aplikace uchovává informace o profilech ve formátu json</li>
</ul>
<p>
	Za jedničku navíc: Aplikace je celá napsaná v MVVM modelu
</p>
<img src="images/eithermouse.png" class="img-thirty">
<p>
    Pro změnu nastavení myši využívejte knihovnu User32.dll, zde naleznete i atributy, které souvisejí s nastavenm myši viz. <a href="https://msdn.microsoft.com/en-us/library/ms724947.aspx">SystemParametersInfo dokumentace</a>.
</p>

<h3>Either mouse + REST API</h3>
<p>
	Rozšiřte předešlou aplikaci o client-server komunikaci, ta se týká profilů nastavení myši. 
</p>
<p>
	Profil je možné na server uložit, načíst všechny a načíst vybraný např. dle ID.
</p>
<p>
	Klientská aplikace si ukládá data do lokální databáze a umí využívat server pro synchronizaci jejich.
</p>