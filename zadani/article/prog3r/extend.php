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
    <li>Aplikace je celá napsaná v MVVM modelu</li>
    <li>Aplikace uchovává informace o profilech ve formátu json</li>
</ul>
<img src="images/eithermouse.png" class="img-thirty">
<p>
    Pro změnu nastavení myši využívejte knihovnu User32.dll, zde naleznete i atributy, které souvisejí s nastavenm myši viz. <a href="https://msdn.microsoft.com/en-us/library/ms724947.aspx">SystemParametersInfo dokumentace</a>.
</p>