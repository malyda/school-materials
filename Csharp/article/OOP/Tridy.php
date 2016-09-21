<h2>Třídy</h2><br>
<p class="introduction">Objekt tvoří základ objektového programování. Každý objekt má svou strukturu, pokud má více objektů stejnou strukturu, jsou odvozené od jejich třídy.</p>
<h3>Teorie</h3>
<h4>Pro představu</h4>
<p>Pro jednodušší představu si lze třídu (dočasně) přejmenovat na kategorii a objekt na všeobecný význam slova věc. Věci lze dělit do kategorií např. židle k počítači, židle k jídelnímu stolu, venkovní židle -> židle na základě jejich společných rysů.</p>
<p>
Samotné třídy mohou také spadat pod jinou třídu např. židle, stůl, polička spadají pod třídu nábytek (vpomeňme na slova nadřazená a podřazená).
</p>
<h4>Atributy a metody</h4>
<p>Třída je návrhový vzor pro množinu dat, který může obsahovat:
<ul>
	<li><b>atributy</b> (proměnné) - data třídy </li>
	<li><b>metody</b> (OOP ekvivalent funkcí) které lze na daný objekt aplikovat</li>
</ul>
<p>Základní myšlenkou OOP je to, že se snaží co nejvíce přiblížit lidskému pohledu na svět. Vezmeme-li objekt židle k počítači, můžeme si ji představit do detailu právě na základě jejích atributů.</p>
<p>
Taková židle může mít kolečka, polohovací sedák, opěrku na záda, či ruce a určitě bude mít svou barevnou kombinaci, to vše jsou její základní atributy.</p>
<p>Metody vycházejí ze základních atributů třídy. Jsou odpovědí na otázku, co s danou třídou lze dělat. S židlí lze jezdit, polohovat sedák a opěrky, lze měnit její barvu, či vyměnit kolečka.</p>
<h4>Struktury vs. třídy</h4>
<p>
Třídy vychází ze struktur (struct), které nepodporovaly metody, instance ani konstruktory, či destruktory. Struktury mají běžnou viditelnost (access modifers) <b>veřejnou</b> (public), ale třídy <b>privátní</b> (private)<br>
<ul>
	<li> pro většinu tříd je nutné vytvořit jejich <b>instanci</b> (zavést je do životního cyklu, do paměti počítače) -> třída Osoba/instance Karel Řípa</li>
	<li> je možné se setkat s pojmem "tvorba vlastní datových typů" -> jako je např. int, char, string, může být i programátorem vytvořená třída chápána jako datový typ (<strong>referenční</strong> datový typ)</li>
 </ul>
<br>
<h3>Hierarchie programu</h3>
<ol>
	<li> <b>Jmenný prostor</b> - zaštiťuje třídy -> ve jmenném prostoru se nesmějí jména tříd opakovat více viz. <a href='http://www.cs.vsb.cz/behalek/vyuka/pcsharp/text/ch04s02.html'> jmenný prostor </a></li>
	<li> Třídy - zaštiťují vlastní metody a atributy</li>
	<li> atributy/metody - zajišťují základní funkcionalitu programu</li>
</ol>
<br>
<p>Pozn. <i>Ve jmenném prostoru se <strong>na stejné úrovni</strong> nesmí opakovat žádné jméno třídy, vytvářet již existující proměnná, nebo deklarovat metoda se stejnými parametry jako její jmenovkyně.</i></p>
<p>Ukázka jmenného prostoru, který obklopuje třídy.<br></p>
<img src = "images/Namespace.png">

<h3>Tvorba instance třídy</h3>
<p>Vytvoření instance třídy StringBuilder a uložení této instance do proměnné stringBuilder</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">StringBuilder stringBuilder = new StringBuilder();
</code></pre>
<p>Základní pravidlo pro tvorbu proměnných v C# říká: "Před název proměnné se vždy píše její datový typ.". V tomto případě se jedná o třídu (je chápána jako datový typ), čímž umožňuje práci s jejími atributy/metodami. <br>
Nová instance třídy se tvoří pomocí klíčového slova <strong>new</strong> a názvu konstruktoru třídy viz. tvorba třídy<br>
<h3>Jména Třídy, metod a proměnných</h3>
<p>Je dobrým zvykem názvy tříd pojmenovávat velkým počátečním písmenem a jména proměnných malým. <br>
V programovacím jazyku C#, či Java se používá <b>velbloudí notace</b> (camel caps), čili jména proměnných složených z více slov se píší dle vzoru: počáteční písmeno prvního slova se liší podle toho, zda jde o proměnnou či třídu a každé další slovo začíná velkým počátečním písmenem bez podtržítka/mezer apod.<br>
Tvorba třídy všímaje si jmen:</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">namespace ObjCars
{
	class Trida
	{
		public int cislo;
		public string nazev;
		public boolean pravdaPokudJeTakUlozeno;
		
		public string metoda(){}
		public vratCislo(){return cislo;}
		public nastavNazev(string parametr){nazev = parametr;}
	}
}
</code></pre>
<h3>Přístupové rozhraní</h3>
<p>Přístupová rozhraní se využívají kvůli zachování konzistence objektu, kde každý objekt je zodpovědný za data, která obsahuje.<br>
K proměnným, metodám i třídám lze omezit přístupnost (místo odkud jsou používaná). Tomu říkáme přístupové oprávnění (access modifer).<br>
Přístupové rozhraní je metoda, která zpřístupňuje nepřístupné prvky. Její viditelnost je zpravidla public.<br>
<dd>Tato metoda nemá stejný název jako daný prvek a skládá se z částí: <strong>get{}</strong>a <strong>set{}</strong>, který se volí automaticky dle toho, zda byl do metody předán parametr při jejím volání.</dd><br>
Používáme několik typů přístupových rozhraní:</p>
<ul>
	<li><strong>Public</strong> - viditelnost je nastavena tak, že lze k danému prvku přistupovat odkudkoli.</li>
	<li><strong>Private</strong> - viditelnost je nastavena tak, že je daný prvek přístupný pouze z místa třídy, kde je vytvořen.</li>
</ul>
<p><strong>Static</strong> je klíčové slovo, které určuje, že daný prvek není závislý na vytvoření instance třídy.<br>
Přistupuje se k němu pomocí jména třídy.</p><br>
Ukázka vytvoření třídy a jejího použití.
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">namespace ObjCars
{
	public static Main()
	{
		Trida1 trida1 = new Trida1();
		trida1.pristupneCislo = 10; -> přístupné
		trida1.nepristupneCislo => nelze přistoupit, IDE upozorní na chybu
		
		int ziskaneCislo = trida1.NepristupneCislo; // Zavolání metody, která vrátí hodnotu požadovaného prvku
		trida1.NepristupneCislo=25;// Metoda nastaví novou hodnotu pro požadovaný prvek
		
		Trida1.statickaPromenna = 150;// Přímá práce se statickou proměnnou
		
	}
	Class Trida1()
	{
		public int pristupneCislo;
		private int nepristupneCislo;
		public int statickaPromenna;
		
		public int NepristupneCislo
		{
            get { return velikost; }
            set { nepristupneCislo = value; }
		}
	}
}
</code></pre>
<h3>Konstruktor</h3>
<p>Konstruktor je metoda, která slouží k<strong> vytvoření nové instance třídy</strong>.<br>
<strong>Jmenuje se stejně jako třída</strong>.<br>
Je volán vždy při použití klíčového slova <strong>new</strong> a názvu třídy(konstruktoru). <br>
<strong>Nemá návratovou hodnotu</strong>. </p>
<h4>Příklad</h4>
<p>Tvorba třídy Letadlo</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">namespace ObjCars
{
	class Letadlo
	{
		private int velikost;
		private string oznaceni;
		public static int pocetLetadel=0;
		
		public Letadlo(){} // Konstruktor pro volání bez parametrů
		public Letadlo(string x)// Konstruktor pro volání s jedním parametrem a to datového typu string
		{
            oznaceni = x;
            pocetLetadel++; // Pokaždé, když je vytvořena instance třídy s jednou proměnnou datového typu string, zvýší se počet letadel o 1, tato proměnná je public a tak je možné sledovat kolik instancí třídy bylo v celém programu vytvořeno
		}
       
		// Přístupové rozhraní k proměnné velikost 
		public int Velikost
		{
			get {return velikost;}
			set{velikost = value;}
		}

		// Přístupové rozhraní k proměnné oznaceni
		public string Oznaceni
		{
			get
			{return oznaceni;}
			set{oznaceni = value;}
		}
	}
}
</code></pre><br>
Tvorba instance třídy Letadlo:
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">Letadlo letadlo = new Letadlo(); // Tvorba instance třídy Letadlo pomocí konstruktoru
	
	letadlo.Velikost = 1;// Využití přístupového rozhraní Velikost (blok set{}) -> změna hodnoty
	int vel = letadlo.Velikost; // Využití přístupového rozhraní Velikost (blok get{}) -> získání hodnoty
	
	letadlo.Oznaceni = "RC model";// Přístupové rozhraní je stejné pro jakýkoliv datový typ (primitivní i referenční)
	
	// Vypsání do Console hodnotu proměnné  velikost na základě vytvořené instance
	Console.WriteLine("Velikost letadla je: "+ letadlo.Velikost);
	
	// Vytvoření nové instance třídy Letadlo a zavolání konstruktoru, který má definovanou jednu vstupní proměnnou datového typu string. Tento konstruktor automaticky zvyšuje hodnotu proměnné pocetLetadel o 1
	Letadlo letadlo2 = new Letadlo("Cesna");
	Letadlo letadlo3 = new Letadlo("RC model");
	Letadlo letadlo4 = new Letadlo("Hracka"); 
	
	// Letadlo.pocetLetadel; -> přistupuje ke statickému atributu třídy, proto se použije název třídy a ne proměnné/instance -> Letadlo. vs. instance. (letadlo3)
	// Vypíše: Pocet letadel je: 3
	Console.WriteLine("Pocet letadel je: " + Letadlo.pocetLetadel);
</code></pre><br><br>
<a class="right" href="https://codingsec.net/2016/04/method-overloading-vs-method-overriding/"> method overloading vs method overriding </a>
</p>