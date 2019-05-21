<H2>MVVM model</H2>

<p class="author">Michal Moudrý</p>

Při vydání WPF v roce 2006 si softwaroví inženýři v Microsoftu řekli, že by bylo dobré nějakým způsobem členit kód aplikace, a tedy vytvořili vzorec MVVM, který bude sloužit tomuto účelu na všech možných XAML platformách.
<p></p>
Jedná se tedy o vzorec pro rozčlenění kódu v projektu. Kdy se dá aplikovat na všech XAML platformách. Cílem MVVM je poskytnout jasné oddělení ovladačů v uživatelském rozhraní a jejich logikou. Jak z názvu vyplívá, tak se skládá ze tří částí, tedy Model, View, ViewModel. Ale doopravdy jsou zde čtyři části, kdy ke třem zmíněným částem patří část Services. Tento vzorec může být těžší na pochopení, vzhledem k jeho názvu (Model-View-ViewModel, kdy struktura je View-ViewModel-Model) a také kvůli existenci čtvrté vrstvy tohoto vzorce, přesto všechno je velice jednoduchý a užitečný viz. výhody.

<H3>Výhody</H3>
<ul>
    <li>Výborný workflow mezi vývojáři a designery, konkrétně poskytuje výhody jako usnadnění práce během procesu vývoje aplikace, kdy vývojáři a designeři mohou pracovat nezávisle a souběžně na jejich komponentách projektu. Například designeři budou pracovat s View částí a vývojáři budou pracovat s ViewModel a Model částmi.</li>
    <li>Usnadění testování jednotek, kdy vývojáři mohou provádět dané testy bez používání View částí.<br>Jednotka v testování jednotek: <a href="https://dev.to/ruidfigueiredo/what-exactly-is-a-unit-in-unit-testing" title="Unit in unit testing" target="_blank">dev.to - Unit in unit testing</a></li>
    <li>Možnost upravování designu aplikace bez nutnosti úpravy kódu, protože View část je dělána v XAML a nová verze by tedy měla fungovat s existující ViewModel částí.</li>
    <li>Pokud existuje implementace Model části, u které je riskantní provádět změny, tak v tomto případě ViewModel část funguje jako adaptér pro tyto části a umožňuje se vyhnout velkým změnám kódu.</li>
</ul>

<H3>Nevýhody</H3>
<ul>
    <li>Generalizace ViewModel části u rozsáhlejších aplikací je složitější, tedy data binding způsobuje větší využití hardwarových prostředků cílového zařízení.</li>
</ul>

<p>

</p>

<H3>Struktura</H3>

<H4>View</H4>
<p>
    Tato vrstva definuje strukturu, layout a obecně vzhled uživatelského rozhraní. View by měl být ve většině napsaný v XAML s minimálním code-behind, který neobsahuje logiku (př. Page1.xaml je část s XAML a Page1.xaml.cs je code-behind pro tuto část). View a ViewModel jsou propojeny za pomoci code-behind.<br>
    <img src="images/View.png" title="Ukázka části View" alt="Ukázka části View" />
</p>

<H4>ViewModel</H4>
<p>
    ViewModel souží jako prostředník mezi View a Model, kdy je odpovědný za zpracovávání operace s Model vrstvou, kdy typicky zapomoci metod pracuje s daným Modelem a pak poskytuje jeho data View části pro zobrazení uživateli.<br>
    <img src="images/ViewModel.png" title="Ukázka části ViewModel" alt="Ukázka části ViewModel" />
</p>

<H4>Model</H4>
<p>
    Model je implementace doménového modelu aplikace, který zahrnuje business a validační logiku, uložiště, DTO a POCO, například to je třída Person, která má nějaké atributy a může mít i logiku pro porovnávání objektů viz. <a href="https://ucitel.sps-prosek.cz/~maly/PRG/materials/csharp/#porovnavani-objektu" title="Porovnávání objeků" alt="Porovnávání objeků" target="_blank">Porovnávání objektů</a>.<br>
    <img src="images/Model.png" title="Ukázka části Model" alt="Ukázka části Model" />
</p>


<H4>Services</H4>

<H4>Shrnutí činnosti mezi vrstvami</H4>
<p>
    Kód je tedy rozdělený na čtyři vrstvy, kdy je zde View část, která obsahuje všechny záležitosti týkající se grafiky, tedy různé animace, změny barvy, atd. Přičemž tato vrstva se dokáže odkazovat na ViewModel a ne naopak, výhodou je nezávislost ViewModelu pro přenášení mezi různými assembly. ViewModel vrstva slouží pro práci s Modelem, proto obsahuje operace (metody) s Modelem, ke kterému je "spojena" (pozn. v praxi má jeden Model vždy jeden ViewModel). Tato vrstva může využít vrstvy Services pro abstrakci metod, například ukládání do souboru, pokud to chceme změnit na ukládání na cloudové uložiště, tak stačí změnit vrstvu Services, bez nutnosti měnit ViewModel. Vrstva Model slouží jako logika aplikace, kdy tato vrstva zahrnuje například DTO, <a href="https://en.wikipedia.org/wiki/Plain_old_CLR_object" title="POCO" alt="POCO" target="_blank">POCO</a> anebo validační logiku (např. porovnání objektů).
</p>

<div>
    <img src="images/MVVM_Overview.png" title="Souhrn částí MVVM" alt="Souhrn částí MVVM" />
    <p style="text-align: center; width: 406px;">Obrázek 4 - Souhrn částí MVVM</p>
</div>

<p>
    Shrnutí MVVM vzorce v kurzu MVA: <a href="https://mva.microsoft.com/en-US/training-courses/building-blocks-universal-windows-platform-16064" title="MVA - Building blocks: UWP" target="_blank">Microsoft Virtual Academy - Building blocks: UWP</a>
</p>

<H3>Praktická ukázka</H3>
<p>
<p>
    Aplikace pro úpravu textu a ukládání textu do .json souboru.
</p>

<H4>View</H4>
<p>
    View část ukázky je RootPage.xaml a RootPage.xaml.cs, kde se nachází controly pro úpravu textu a jeho ukládání do souboru. V code-behind (RootPage.xaml.cs) jsou rutiny pro událost kliknutí a metody upravující uživatelské rozhraní.<br>
    <img src="images/SampleView.png" title="Ukázková aplikace - View" alt="Ukázková aplikace - View" />
</p>

<H4>ViewModel</H4>
<p>
    ViewModel část ukázky je FileViewModel.cs, což je třída, která pracuje s Model částí a má na starost ukládání a načítání z uložiště cílového zařízení. Přičemž využívá vrstvy Service, které mají za úkol abstrakci metod pro danou práci s Modelem.<br>
    <img src="images/SampleViewModel.png" title="Ukázková aplikace - ViewModel" alt="Ukázková aplikace - ViewModel" />
</p>

<H4>Model</H4>
<p>
    Model část ukázky je třída FileObj.cs reprezentují uložený soubor. Za účel má jenom uchovávat data o formátu souboru a samotném obsahu dokumentu.<br>
    <img src="images/SampleModel.png" title="Ukázková aplikace - Model" alt="Ukázková aplikace - Model" />
</p>

<H4>Services</H4>
<p>
    Services část ukázky je třída FileService.cs, která má za účel abstrakci metod ViewModelu a v tomto případě se jedná o ukládání a načítaní souboru z uložiště. Zde se projeví výhoda služeb, kdy je možné změnit službu a není nutné zasahovat do ViewModelu.<br>
    <img src="images/SampleServices.png" title="Ukázková aplikace - Services" alt="Ukázková aplikace - Services" />
</p>

<H4>Souhrn</H4>
<img src="images/SampleOverview.png" title="Souhrn ukázkové aplikace" alt="Souhrn ukázkové aplikace" /><br>
Odkaz na ukázku: <a href="https://github.com/MichalMoudry/School-Work/tree/master/MVVM/Sample" target="_blank" title="Notepad" alt="Notepad">Notepad</a>
</p>
