<h2>Nástroje abstrakce</h2>
<h3>Dědičnost</h3>
<ol>
	<li>
		<p>
			Vytvořte program pro evidenci uživatelů.
			Uživatel se může přihlásit.
		</p>
		<p>		
			Administrátor může mazat a vytvářet uživatele.
			- administrátor se ověřuje proti master heslu -> zadané natvrdo v kódu
			- pouze administrátor může přistupovat k poli uživatelů
		</p>
	</li>
	<li>
		<p>Realizujte následující diagram jako evidenci knih.
			<img src="images/inheritance.png">
		</p>
	</li>
</ol>

<h3>Interface</h3>
	<p>Realizujte následující diagram a vytvořte program, který umí uložit a načíst data jedné třídy např. Osoba v různých formátech (dle diagramu).
		<img src="images/diagram-CSVJsonXML.png">
	</p>

<h3>Abstraktní třída</h3>
	<p>Realizujte následující diagram jako program, kde je možné se přihlásit jako Student, nebo jako zaměstnanec.
		<img src="images/diagram-AbstractClass.png">
	</p>

<h2>Implementace abstrakčních nástrojů</h2>
<h3>Lidé ve škole</h3>
	<p>Realizujte následující diagram a vytvořte program, který umožňuje spravovat zaměstance školy a studenty. Všechny metody v diagramu budou realizovány a jejich použítí je možné skrze konzolovou aplikaci.
		<img src="images/diagram-AbstractClassImplementation.png">
	</p>
	<h3>Inventář</h3>
<p>
	Vytvořte program, který bude fungovat jako inventář pro herní postavu. Program vytvořte tak, aby byla využita co nejvyšší míra abstrakce.
</p>
<p>
	Typy předmětů:
</p>
<ol>
	<li>Brnění: boty, kalhoty, hrudní zbroj, nárameníky, helmy</li>
	<li>Zbraně: na blízko, na dálku, speciální</li>
	<li>Spotřební: jídlo + doplňkové efekty, náboje</li>
	<li>Možnost vylepšení předmětů a přidávání různých efektů</li>
</ol>
<p>
	<b>Vypracujte Class diagram Vašeho programu.</b>
	<img src="https://i.stack.imgur.com/2ajCN.gif">
</p>


<h3>Strategy pattern</h3>
<p>Realizujte následující diagram jako souboj hráče s příšerou. Příšera na základně určité podmínky (např. počet životů) mění svou soubojovou strategii během boje.</p>
<p>
	Diagram dle potřeby rozšiřte.
</p>
<img src="images/MonstersClassDiagram.png">