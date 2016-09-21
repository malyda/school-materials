<h2>WinForms</h2><br>
<p class="introduction">Každá grafická aplikace se skládá z jednoho či více oken. Každé okno může obsahovat různé grafické prvky, které dohromady tvoří stránku - formulář.</p>

<p><strong>Formulář</strong> je jedna stránka podobně jako u webových stránek, či Android aplikací (Activity), Xamarin.Forms (Page), která obsahuje různé ovládací prvky, jako jsou tlačítka, seznamy, obrázky apod.</p>

<p>WinForms je základní grafická knihovna, kterou využívá většina desktopových aplikací bez potřeby náročnějších grafických výpočtů.<br>
Každý formulář se skládá z popisu grafických prvků a třídy, která je obsluhuje.</p>

<h3>Události a render</h3>
<p><strong>Pokud uživatel udělá něco uvnitř okna, je vygenerovaná událost (event) a záleží jen na programu, zda danou událost zachytí a bude na ní reagovat.</strong></p>
<p>WinForms využívá grafickou knihovnu GDI+, která obsahuje většinu grafických prvků a stará se i o jejich vykreslování (narozdíl od WPF, kde je použit DirectX).</p>
<p>Je možné základní vlastnosti GDI+ knihovny rozšířit, např. knihovnami ToolStrip a MenuStrip, které umožňují složitější implementaci GUI, jsou přítomny například v MS Office 2013.</p>

<p>Visual Studio, Xamarin Studio i Eclipse umožňují použití designeru, který zjednodušuje práci s WinForms.<br>
Kromě používání předdefinovaných prvků je možné vytvářet i vlastní prvky pomocí knihovny Drawing.</p>
<p><i>Pozn. Microsoft upouští od vývoje WinForms a plně přechází k WPF</i>.</p>
<p>WinForms jsou určeny k jednoduché grafice bez animací a pokročilejších grafických výpočtů. Jsou dostačující pro většinu kancelářských aplikací.</p>
<h3>Struktura formuláře</h3>
<p>Formulář Form1 se skládá z</p>
<ul>
	<li>Form1.Designer.cs - umístění a atributy tlačítek v objektovém zápisu (v C#)</li>
	<li>Form1.resx - textové řetězce zobrazené ve formuláři, vhodné pro vícejazyčnost</li>
	<li>Form1 - metody pro operace s formulářem</li>
</ul>
 <a class="right" href="attachment/WinForm.zip">Ukázka jednoduché aplikace</a><br>
