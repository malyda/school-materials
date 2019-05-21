<h2>Úvod do Xamarin</h2>

<h3>Ověření Palindromu</h3>
<p>
    Vytvořte program ve Xamarin.Forms, kde uživatel napíše do textového pole slovo a program vypíše, zda se jedná o palindrom.
</p>
<p>viz. <a href="#pole">Palindrom</a></p>

<h3>Profil uživatele</h3>
<p>
    Vytvořte aplikaci, která přehledně zobrazuje profil uživatele.
</p>

<p>Tvorba aplikace se skládá se ze dvou částí:</p>
<ol>
    <li>
        Návrh aplikace např. v <a href=" https://marvelapp.com/">MarvelApp</a>
    </li>
    <li>
        Vytvoření aplikace v Xamarin.Forms
    </li>
</ol>
Pozn.<i> běžně jsou tyto aplikace propojené s QR čtečkou, která načítá QR kód např. z vizitky.</i>

<h3>Telefonní Seznam</h3>
<p>Vytvořte aplikaci, která zobrazuje kontakty (fiktivní) na jedné stránce v seznamu (ListView) a na druhé stránce detail kontaktu.</p>
	<p>Bonus: aplikace bude umět reálně vytáčet tel. čísla.<br>
	Bonus: Ukládání a načítání dat ze souboru.
	<img src="http://i-cdn.phonearena.com/images/articles/127521-image/Contacts-2-current-Android-L-Preview.jpg" class="img-custom">
	<a href="https://github.com/malyda/Xamarin-ListView">Zdrojový projekt vč. práce se souborem a ListView</a>

		<strong>Telefonní seznam + databáze</strong><br>
		K telefonnímu seznamu přidejte data uložená v databázi. Jednotlivé kontakty je možné zobrazovat, editovat a mazat.
    </p>

<h3>Todolist</h3>
<p>Vytvořte mobilní aplikaci (Xamarin.Forms), kde uživatel může evidovat položky, které ještě musí dodělat (Todo list), položky vkládá do kategorií, které může sám spravovat.</p>
<p>
	Požadavky:
</p>

<ul>
	<li>Databáze (SQL) </li>
	<li>Položky umisťuje do kategorií - U položek je evidován název a jestli je hotová </li>
	<li>Kategorie může uživatel spravovat (vytvářet, měnit a mazat) - Aplikace v základu obsahuje kategorii „Nezařazeno“ </li>
</ul>
<p>
<a href="https://github.com/malyda/Xamarin-SQLite">Zdroje k databázi</a><br>
<a href="https://ucitel.sps-prosek.cz/~maly/PRG/materials/xamarin/#sqlite">Vysvětlení SQLite</a>
</p>

<h3>Průměry známek</h3>
<p>
	Vytvořte aplikace, které evidují známky (váha,hodnota) a jejich předměty. Aplikace umí vypočítat vážený průměr z předmětu.
</p>
<p>
	Data ukládá do lokálního souboru SQLite - nuget SQLite.Net.PCL (Krueger)
</p>
<p>
	Projekt je rozdělen následovně:
</p>
<p>
	Client
</p>
<ul>
	
		<li> Console (.NET Core)</li>
		<li> XamarinForms -> hotové veškeré UI (min. 2 page)</li>
</ul>
<p>
	Model
</p>
<ul>
		<li> .NET Standard </li>
		<li> obsahuje veškerou logiku a SQLite </li>
</ul>
<p>
	Za jedničku: WPF client (.NET Framework)
</p>