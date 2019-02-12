<!-- sem vlož HTML, ať vidíš formátování  !-->
<H2>Abstrakce systému</H2>

<p class="author">Michal Moudrý a Martin Zbořil</p>

<p>Abstrakce je způsob zjednodušení systému. Princip je snaha o snížení duplikace informací v programu, toto může být zobecněno jako tzv. "don't repeat yourself" princip . Programátor tedy pracuje s rozhraními/abstraktními třídami, které bude využívat pro přidávání další funkcionality do komplexnějšího programu. Výhodou je snažší přidávání funkcionality do programu a snažší práce s věcmi, které by vyžadovali o mnoho více práce. Nevýhodou je nadměrné používání abstrakce v jednodušších programech v případě nezkušenosti programátora (využití tzv. "<a href="https://en.wikipedia.org/wiki/KISS_principle" title="KISS princip" target="_blank">KISS</a>" principu).
<p></p>
Příklad 1: Služby v rámci programovacího modelu MVVM. (Abstrakce metod, které využívá ViewModel.)<br>
Příklad 2: <a href="https://ucitel.sps-prosek.cz/~prochap/OSY/struktury.pdf" target="_blank" title="Popis HAL vrstvy" alt="Popis HAL vrstvy">HAL vrstva</a> v OS.<br>
Příklad 3: Programátor bude mít v programu abstraktní třídu, která bude sloužit jako základ pro uživatelské nastavení aplikace. Tuto třídu konkretizuje ve třídě pro ukládání nastavení do lokálního uložiště a pak například ve třídě pro ukládání nastavení aplikace na server.</p>

<H3>Nástroje</H3>
<p>
    <h4>Abstraktní třída</h4>
    Abstrakční třída je jedním z nástrojů abstrakce sytému. V praxi slouží abstraktní třída ke sdružování společných atributů a metod. Abstraktní třída nemůže být instancována, musí být konkretizována další třídou. Třída, která konkretizuje abstraktní třídu zdědí všechny její atributy a metody, také může mít svoje vlastní. Metody můžou být společné pro všechny třídy a jsou automaticky implementovány (abstraktní třída definuje hlavičku a tělo metody) nebo jsou jen předepsané a každá podtřída si je musí implementovat (tzv. abstraktní metody, kdy abstraktní třída definuje hlavičku metody stejně jako u realizace rozhraní).<br>
<p></p>
Příklad: Auto má nějaké vlastnosti (atributy) a může se pohybovat (metoda Pohyb()), ale každé auto má jinou spotřebu (abstraktní metoda <i>SpotřebaPaliva()</i>). Třída Tesla tedy bude definovat tělo metody jinak než třída Audi, vzhledem k vlastnostem výrobního modelu. Například do vzorce pro výpočet spotřeby automobilu Tesla se musí zadat více faktorů než u aut se spalovacím motorem.<p></p>
<img src="images/diagram_abst_trida.png" alt="Ukázka Abstraktní třídy" title="Ukázka Abstraktní třídy" /><p></p>
Praktická ukázka: AppData.Settings helper pro UWP aplikace viz. <a href="https://gist.github.com/martinsuchan/9f31502a03cab5120c10c1b161eef33e" title="AppData.Settings helper - Martin Suchan" alt="AppData.Settings helper - Martin Suchan" target="_blank">AppData.Settings helper - Martin Suchan</a>.<br>
Poznámka 1: <i>Konkretizace je v UML stejně značena (prázdný trojúhelník) jako generalizace.</i><br>
Poznámka 2: <i>Abstraktní třídy a metody se v UML značí kurzívou.</i>
<p>

<p>
    <h4>Dědičnost</h4>
Jedná se o vazbu na úrovni tříd, kdy jedna třída (podtřída nebo také child) využívá pro svou definici, definici druhé třídy (nadtřída nebo také parent). To znamená, že třída získává všechny nebo některé vlastnosti (atributy a metody) jiné třídy.<p></p>
<p></p>
<p></p>
Příklad: Osoba má nějaké vlastnosti, jako jméno, věk. Student má také tyto vlastnosti a proto třída Student bude dědit ze třídy Osoba viz. Obrázek. 1. Výsledkem je, že třída Student pak bude mít své vlastní vlastnosti a k tomu vlastnosti třídy Osoba.<p></p>
<img src="images/inheritance.png" alt="Ukázka dědění" title="Ukázka dědění" /><p></p>
Typy dědění:
<ul>
    <li><strong>Jednoduché dědění</strong><br>Třída využívá pro svou definici, definici druhé třídy viz. Obrázek 1.</li>
    <li><strong>Vícenásobné dědění</strong><br>Třída využívá pro svou definici, definice více tříd.</li>
    <li><strong>Víceúrovňové dědění</strong><br>Třída využívá pro svou definici, definici druhé třídy, která využívá pro svou definici, definici třetí třídy, ...<br>
        Příklad: syn-otec-děda, kdy třída Syn zdědí vlastnosti třídy Otec, která zdědila vlastnosti třídy Děda viz. Obrázek 2</li>
    <li><strong>Hierarchické dědění</strong><br>Třída slouží jako nadtřída pro více než jednou podtřídu.</li>
</ul>
<img src="images/multilevel_inheritance.png" alt="Ukázka víceúrovňového dědění" title="Ukázka víceúrovňového dědění" /><br>
Poznámka 1: <i>Některé třídy mohou být označeny jako neděditelné, tzn. nemůže mít podtřídy. V C# jsou takové třídy označeny klíčovým slovem <b>sealed</b> viz. <a href="https://msdn.microsoft.com/en-us/library/88c54tsw.aspx" alt="MS Developer Network" target="_blank" title="MS Developer Network">MSDN</a>.</i><br>
Poznámka 2: <i>Dědičnosti se také říká generalizace.</i>
</p>

<H3>Redukce vazeb na třídu</H3>
<p>
    Redukce vazeb na třídu je způsob zjednodušení práce s mnoha třídami, které stejně či podobně chovají. Principem redukce je využití jedné třídy, která agreguje či kompozicuje své podtřídy (viz. <a href="https://cs.m.wikipedia.org/wiki/Diagram_tříd#Agregace_.28Aggregation.29" title="Rozdíl mezi agregací a kompozicí" target="_blank">Rozdíl mezi agregací a kompozicí</a>) za účelem snažší práce s více třídami.<p></p>
Příklad 1:  HAL vrstva v OS, kdy tato vrstva poskytuje přístup k různě fungujícímu HW. Na Obrázku 4 je třída Ovladač, která přistupuje na HW přes vrstvu HAL, která je reprezentována třídou HAL. Tato třída agreguje třídu HW, která agreguje a kompozicuje třídy reprezentující HW komponenty.<p></p>
<img src="images/diagram_redukce_vazeb_HAL.png" alt="Ukázka redukce vazeb č. 1" title="Ukázka redukce vazeb č. 1" /><p></p>
Příklad 2: Existuje mnoho různě fungujících souborových systémů a OS má ve své struktuře vrstvu jménem Virtuální Souborový Systém, který poskytuje jednotné rozhraní pro přístup k těmto souborovým systémům viz. Obrázek 5. Na tomto obrázku je třída Operační systém, která agreguje třídu VFS, která slouží jako jednotné rozhraní pro třídy znázorňující různé souborové systémy.<p></p>
<img src="images/diagram_redukce_vazeb_VFS.png" alt="Ukázka redukce vazeb č. 2" title="Ukázka redukce vazeb č. 2" />
</p>

