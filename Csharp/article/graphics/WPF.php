<h2>Windows Presentation Foundation</h2>
<p class="introduction">WPF grafický framework od společnosti Microsoft, který nahrazuje WinForms.</p>
<p>Doba, kdy vznikly WinForms, nebyla nakloněna akcelerované grafice a podle toho byly WinForms navrženy.</p>
<p>Akcelerovanou grafiku na platformě Windows přinesl OS Vista a toho využívá WPF. </p>
<h3>Kdy WPF</h3>
<p>Podle operačního systému cílové skupiny zákazníků se lze rozhodnout, zda naspat aplikaci ve WinForms nebo ve WPF. WinForms se používá tam, kde jsou podporované staré verze OS Windows, a kdy se přepsání celé aplikace z WinForms do WPF nevyplatí.</p>
<p>Základními přednostmi WPF oproti WinForms jsou:</p>
<ul>
	<li>XAML zápis všech grafických objektů</li>
	<li>Akcelerovaná grafika umožňující vše od jednoduchých animací až po hry</li>
	<li>Aktuálnost vývoje. Microsoft upouští od vývoje WinForms a přesouvá se na WPF</li>
	<li>Množství rozšíření třetích stran</li>
</ul>
<h3>XAML</h3>
<p>XAML a podobné značkovací jazyky jsou budoucností tvorby grafických aplikací, jeho využití vidíme u webových stránek (HTML), Androidu (XAML) i u WPF a Silverlight.</p><br>
<p>Jeho výhodou je, že umožňuje rozdělení aplikace na prezentační a logickou část, kde designer nemusí umět programovat a naopak programátor nemusí chápat design, narozdíl od WinForms, kde je vše objektem a grafické změny jsou prováděny na úrovni kódu.</p>
<p>Výhodou XAML také je, že ho umí podporovat některé grafické editory, a tak grafik může být naprosto oddělěný od vývoje, stejně jako u šablon pro webové stránky.</p>

<h3>Model – View – ViewModel - MVVM</h3>
<p>Je programovací model, který je hojně využíván ve WPF aplikacích.<br>
Jeho základní myšlenkou je, že se aplikace skládá z View ViewModel a Model:</p>
<ul>
	<li><strong>View</strong> je to, co vidí uživatel a pomocí událostí se posílají data do ViewModel. View je napsáno v XAML</li>
	<li><strong>ViewModel</strong> udržuje stav aplikace a veškerá data, se kterými pracuje View. Je navržen tak, aby při zavření a znovuotevření okna ve View se nemusela veškerá data znovu načítat. Další výhodou může být, že s touto vrstvou pracují procesy běžící na pozadí a jsou tak oddělené od View.<br></li>
	<li><strong>Model</strong> je datová část aplikace</li>
</ul>

<p>K implementaci tohoto modelu slouží například speciálně uzpůsobené kolekce jako <strong>ObservableCollection<T></strong>, která hlásí změny, když se do ní přidají nebo se z ní odeberou data.</p>
<p>Pro MVVM se také využívá <strong>dataBindingu</strong>. Je to způsob, kterým se předávají data do GUI. Například u webových stránek je obsah HTML získáván pomocí PHP a je to PHP, kdo určuje jaká data se budou kam řadit. DataBinding pracuje na opačném principu, u většiny XAML prvků je možné přímo označit zdroj dat a XAML je z dané lokace (proměnné) načte.</p>
<strong>Při změně zdroje dat, se změní i data v XAML</strong>.<br><br>

<img src = "images/MVVM.png">
<a href="http://www.dotnetportal.cz/clanek/4994/MVVM-Model-View-ViewModel" class="right"> Rozšíření tématu MVVM</a><br><br>

<h3>Odkazy</h3><br>
<a class="right" href="attachment/Wpf.zip">Ukázka jednoduché aplikace ve WPF</a><br><br>
<a class="right" href="attachment/Wpf3D.zip">Ukázka jednoduché 3D aplikace ve WPF</a><br><br>
<a href="http://www.wpf-tutorial.com/about-wpf/what-is-wpf/" class="right"> What is WPF?</a><br>
<a href="https://dzone.com/articles/10-reasons-switch-wpf" class="right"> 10 reasons to switch to WPF </a><br>
<a href="http://www.codemag.com/article/0911031" class="right"> Why WPF?</a><br>

