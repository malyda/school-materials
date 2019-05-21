<h2>  Adaptér</h2>
<p class="author">Vítek Horejš</p>
<p class="introduction"> Návrhový vzor Adapter (nebo také Wrapper) se používá při práci s komponentou, která má nestabilní nebo s naší aplikací nekompatibilní rozhraní. Umožňuje komponentu obalit naším rozhraním a tak aplikaci úplně odstínit od rozhraní původního.</p>

<p>Příkladem z reálného života je adaptér do zásuvek. Pojedete-li do jiné země, tak tam velmi pravděpodobně narazíte na zásuvky, které mají jiný tvar a jiné napětí. Z tohoto důvodu je zapotřebí vložit mezi zařízení a zásuvku adaptér, který zajistí jak vhodné napětí, tak samotnou možnost zapojení (kvůli tvaru zásuvky).</p>
<p>Obdobně funguje návrhový adaptér. Máme nějakou třídu, jejíž rozhraní je z nějakého důvodu nevyhovující. Proto vytvoříme třídu adaptér, implementující požadované rozhraní, která bude dané volání překládat a volat adaptovanou třídu. Druhým častým důvodem použití adaptéru je nestabilita rozhraní adaptované třídy, například když tuto adaptovanou třídu (modul) vyvíjí jiná společnost. Potom je vhodné vytvořit adaptér, který se při změně rozhraní jednoduše upraví (v opačném případě by bylo nutné přepisovat všechna použití dané nestabilní třídy).</p>

<i>Adaptér může být také považován za "Wrapper" (obal).
    Wrappery se často staví okolo databází (lze poté vyměnit databázi bez jediné změny v naší aplikaci) nebo okolo webových služeb, které mají často složitá API.
</i>
<img src="images/wrapper.png">
<p>Obr. 1
    <i>- wrapper</i>
</p>

<h3>Vzor</h3>
<p>Vzor je tedy jakýsi prostředník (spojovník) mezi naším rozhraním a rozhraním komponenty, které je pro aplikaci neznámé. Tohoto propojení můžeme dosáhnout na úrovni objektu nebo na úrovni třídy. Vzor má tedy 2 varianty.</p>

<h4>Object adapter</h4>
<img src="images/object_simple_adapter.png">
<p>Obr. 2
    <i>- object adapter</i>
</p>

<p>Klient je součást našeho systému, která volá naše rozhraní. Adaptee je ona komponenta, jejíž rozhraní je nestabilní, nekompatibilní nebo zkrátka nechceme, aby na něm naše aplikace byla závislá. Naše rozhraní je definováno v třídě Adapter, která zajišťuje transformaci metod od Klienta do Adaptee. Adapter může být pouze spojovník a volat jen jinak pojmenovouvanou metodu. Nebo může obsahovat jednoduchou logiku. Jako příklad si můžeme představit, že voláme metodu Vloz(tabulka, pole), která se přeloží jako DatabazovyDotaz('INSERT INTO tabulka VALUES hodnota1, hodnota2...'). Pole se transformovalo na prarametr a ten je předán Adaptee.</p>

<h4>Class adapter</h4>
<img src="images/class_adapter.png">
<p>Obr. 3
    <i>- class adapter</i>
</p>
<p>Class adapter je méně používaná varianta a to proto, že spoléhá na skutečnost, že třídu Adaptee lze dědit. Výsledný adapter je třída zděděná z Cil a Adapter. Cil bude samozřejmě interface, aby byla vícenásobná dědičnost možná. Také ztrácíme možnost pracovat zároveň s dědici Adaptee, což by u Object adapteru fungovalo (protože dědic poskytuje stejné rozhraní, jako předek). Výhodou však je, že můžeme přepsat některé metody Adaptee.</p>

<h3>Příklad</h3>
<strong>Obdélník a kalkulátor jeho obsahu</strong>

<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">public class Obdelnik
    {
        public int Vyska;
        public int Sirka;
    }

    public class Kalkulator
    {
        public int Obsah(Obdelnik obdelnik)
        {
            int obsah = obdelnik.Vyska * obdelnik.Sirka;
            return obsah;
        }
    }
</code>
</pre>
<strong>Čtverec použije adaptér, aby mohl vypočítat obsah pomocí funkce určené pro obdélník</strong>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">public class Ctverec
    {
        public int Velikost;
    }

    public class KalkulatorAdapter
    {
        public int Obsah(Ctverec ctverec)
        {
            Kalkulator kalkulator = new Kalkulator();

            Obdelnik obdelnik = new Obdelnik();
            obdelnik.Vyska = obdelnik.Sirka = cvterec.Velikost;

            int obsah = kalkulator.Obsah(obdelnik);

            return obsah;
        }
    }
</code>
</pre>
<strong>Výpočet obsahu obdélníku z objektu čtverec - jiné parametry než obdelník -> použití adaptéru</strong>

<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">// Vytvori ctverec o velikosti 10
Ctverec ctverec = new Ctverec();
ctverec.Velikost = 10;

// Pouziti adaptéru pro vypocet obsahu
KalkuratorAdapter adapter = new KalkulatorAdapter();
int obsah = adapter.Obsah(ctverec);
</code>
</pre>

<!--<table class="table-basic">
	<tr class="mdl-color--primary">
		<th>1. sloupec </th>
		<th>2. sloupec </th>
		<th>3. sloupec </th>
	</tr>
	<tr>
		<td>Adam</td>
		<td>Novák</td>
		<td>Guruk</td>
	</tr>
	<tr>
		<td>Jan</td>
		<td>Nedonošený</td>
		<td>Dřevorubec</td>
	</tr>
	<tr>
		<td>Otakar</td>
		<td>Věčný</td>
		<td>Bůh</td>
	</tr>
</table>
<p></p>
<table class="table-basic center-text">
	<tr class="mdl-color--primary">
		<th>1. sloupec </th>
	</tr>
	<tr>
		<td>Adam</td>

	</tr>
	<tr>
		<td>Jan</td>

	</tr>
	<tr>
		<td>Otakar</td>

	</tr>
</table>-->
<h4>Zdroje</h4>
<a href="https://cs.wikipedia.org/wiki/Adapt%C3%A9r_(n%C3%A1vrhov%C3%BD_vzor)">Odkaz</a>
<a href="https://en.wikipedia.org/wiki/Adapter_pattern">Odkaz</a>
<a href="https://www.tutorialspoint.com/design_pattern/adapter_pattern.htm">Odkaz</a>
<a href="https://sourcemaking.com/design_patterns/adapter/cpp/1">Odkaz</a>
<a href="https://www.itnetwork.cz/navrh/navrhove-vzory/gof/gof-vzory-struktury/adapter-wrapper-navrhovy-vzor/">Odkaz</a>
<a href="https://www.algoritmy.net/article/1635/Adapter">Odkaz</a>
<a href="https://www.c-sharpcorner.com/UploadFile/40e97e/adapter-pattern-in-C-Sharp/">Odkaz</a>