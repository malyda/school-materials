		<h2>  Strategy pattern </h2>
			<p class="author"> David Povýšil </p>
			<p class="introduction"> Strategy pattern (také znám jako policy pattern) je strategie používaná v objektově orientovaném programování, která umožňuje změnit chování třídy za běhu programu. </p>
			<h3>Strategie</h3>
				<p>
					Na začátek by bylo dobré si říct něco o tom, jak strategie vůbec fungují. Představme si tedy například třídu Auto, interface IChovaniBrzd a metody (strategie)
					Brzdit() a Brzdit_s_ABS().
					Třída auto bude implementovat interface IChovaniBrzd, který v sobě bude mít strategie Brzdit() a Brzdit_s_ABS(). Poté je pro každé auto třeba definovat chování (strategii), 
					jak bude brzdit.
					<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/4b/StrategyPattern_IBrakeBehavior.svg/530px-StrategyPattern_IBrakeBehavior.svg.png" alt="Obrázek popisující strategie" />
					<i> Obrázek popisující strategie </i>
				</p>
			<h3> Základ </h3>
				<p>
					Vysvětleme si na tomto příkladu velice jednoduše fungování strategy pattern.
					<i>
						auto = new Auto();
						auto.akcelerace();
					</i>
					Vytvořili jsme novou instanci třídy Auto a následně jsme autu řekli, aby pomocí metody akcelerace() začalo zrychlovat svou rychlost.
					A teď si představme, že se před námi objevila kolona a chceme změnit chování (strategii) auta. Nemůžeme dále akcelerovat, musíme brzdit.
					Pomocí strategy pattern lze toto chování změnit za běhu programu (runtimu). 
				</p>
			<h3> Upgrade auta </h3>
				<p>
					Jako další příklad si můžeme uvést upgrade auta ve hře.
					Chceme-li změnit chování auta, tak změníme jeho motor. Jiný motor bude mít jiné výkonnostní hodnoty.
					<i>
					<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">Class Auto() 
{
	this.motor = new Motor(this)
	
	method jezdi()
	{
		this.motor.jezdi();
	}
	method zmenaMotoru(motor) 
	{
		this.motor = motor;
	}
}</code>
</pre>
					</i>
					Změna motoru ovlivní metodu jezdi() a tím ovlivní i vlastnosti auta.
					Strategy pattern je užitečná pro situace, kde je nezbytné dynamicky změnit algoritmus používaný v aplikaci.
				</p>
			<h3> Počítač </h3>
				<p>
					V tomto příkladě upgradujeme počítač. Ve hře jsme se dostali k lepšímu vybavení počítače a můžeme ho upgradovat. Novými komponenty se změní jejich hodnoty a celkový výkonnost PC.
					<i>
										<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">Class Pocitac() 
{
	this.cpu = new cpu(this)
	
	method vykonnostCpu()
	{
		this.cpu.vykonnostCpu();
	}
	
	this.gpu = new gpu(this)
	
	method vykonnostGpu()
	{
		this.gpu.vykonnostGpu();
	}
	
	this.ram = new ram(this)
	
	method vykonnostRam()
	{
		this.ram.vykonnostRam();
	}
	method upgradePocitace(cpu, gpu, ram) 
	{
		this.cpu = cpu;
		this.gpu = gpu;
		this.ram = ram;
	}
}</code></pre>
					</i>
				</p>
			<h3> Class diagram </h3>
				<p>
					<h4> Obecný class diagram </h4>
						<p>
							Na tomto obecném class diagramu můžeme vidět třídu Strategy, kde je společný kód; 3 třídy nějaké konkrétní strategie ConcreteStrategyX, které implementují daný algoritmus Strategy interface; třídu Context, kterou vytváří konkrétní strategie.
							<img src="http://www.dofactory.com/images/diagrams/net/strategy.gif" alt="Obecný diagram" />
						</p>
					<h4> Konkrétní class diagram </h4>
						<p>
							Na tomto obrázku můžeme vidět podobný příklad s autem. Třída Car používá interface IBrakeBehavior, ve kterém jsou zakomponovány metody chování při brždění s ABS a bez něj - BrakeWithABS a Brake.
							<i><pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">Class Auto() 
{
	if (soucastky["brzdnySystemABS"]>0) 
	{
		method brzdi()
		{
			this.auto.brzdiSABS();
		}
	}
	else
	{
		method brzdi()
		{
			this.auto.brzdi();
		}
	}
}</code></pre>
							</i>
							<img src="https://upload.wikimedia.org/wikipedia/commons/4/4b/StrategyPattern_IBrakeBehavior.svg" alt="Chování brzd" />
						</p>