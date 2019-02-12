	<h2>Command Pattern</h2>
			<p class="author">Jakub Růženec</p>
			<p class="introduction">Command Pattern, někdy taky nazýván jako Action Pattern nebo Transaction Pattern, je návrhový vzor, který popisuje „encapsulaci" neboli zapouzdření požadavku jako objekt, tak aby jste mohli řadit nebo přihlašovat klienty s jinými požadavky.</p>

      <p>Command Pattern je vždy spojován se 4 termíny: command, reciever, invoker a client. Command objekt ví o recieverovi a „invokuje" neboli vyvolá metodu recievera. Hodnoty parametrů od recievera jsou uloženy v commandu společně s objekty, které mají být zaslány. Reciever pak odvede práci, když je metoda execute() zavolána. Objekt invoker ví, jak poslat command a případně uloží informace o zaslaném commandu. Invoker neví nic o konkrétním commandu, ví pouze o rozhraní.</p>
      <p>Invoker, command a reciever jsou objekty, které drží client, client rozhoduje, který reciever přiřadí ke commandu a který command přiřadí k invokeru. Client také rozhoduje o tom jaký příkaz má být kde proveden. Pro zaslaní commandu musí být command předán invokerovi.</p>

      <h3>Příklady použití</h3>
      <ul>
          <li>GUI tlačítka</li>
          <li>Nahrávání Macro - Command si umí pamatovat sekvenci Actionů.</li>
          <li>Vícenásobné Undo - Command pattern si může pamatovat všechny commandy co jste použili a následně se v nich umí vracet.</li>
          <li>Networking</li>
      </ul>
			<h3>Command Pattern - UML Diagram a implementace</h3>
				<p>UML class diagram pro implementaci Command Patternu</p>
				<p> <img src="images\command.png">
				
			<h4>1. Client</h4>
				<p>Tato třída vytváří a spouští objekt příkazu.</p>
			<h4>2. Invoker</h4>	
				<p>Požádá příkaz, aby provedl akci.</p>
			<h4>3. Command</h4>
				<p>Rozhraní, které specifikuje operaci spuštění.</p>
			<h4>4. ConcreteCommand</h4>
				<p>Tato třídá provádí <strong>Execute</strong> vyvoláním operace/í na <strong>Receiver</strong>.</p>
			<h4>5. Receiver</h4>
				<p>Tato třída provádí <strong>Action</strong> spojenou s požadavkem.</p>

<h3>Zdrojový kód pro implementaci</h3>

<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">
public class Client
{
	 public void RunCommand()
	 {
	 Invoker invoker = new Invoker();
	 Receiver receiver = new Receiver();
	 ConcreteCommand command = new ConcreteCommand(receiver);
	 command.Parameter = "Dot Net Tricks !!";
	 invoker.Command = command;
	 invoker.ExecuteCommand();
	 }
}
 
public class Receiver
{
	 public void Action(string message)
	 {
	 	Console.WriteLine("Action called with message: {0}", message);
	 }
}
 
public class Invoker
{
	 public ICommand Command { get; set; }
	 
	 public void ExecuteCommand()
	 {
		 Command.Execute();
	 }
}
 
public interface ICommand
{
	 void Execute();
}
 
public class ConcreteCommand : ICommand
{
	 protected Receiver _receiver;
	 public string Parameter { get; set; }
	 
	 public ConcreteCommand(Receiver receiver)
	 {
	 	_receiver = receiver;
	 }
	 
	 public void Execute()
	 {
	 	_receiver.Action(Parameter);
	 }
}
</code>
</pre>

<h3>Vzorový kód</h3>

<p>Představte si jednoduchý vypínač. V tomto příkladě nakonfigurujeme vypínač pomocí 2 Commandů: vypnutí světla a zapnutí.</p>
<p>Tento příklad můžete využít na jakýkoli příkaz typu: „Vypnout/Zapnout", „Ano/Ne" a podobně.</p>

<p>Nejdříve si založíme Command rohraní:</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">
    public interface ICommand
    {
        void Execute();
    }
</code>
</pre>

<p>Jako další si musíme udělat třídu Invoker:</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">
    public class Switch
    {
        private List< ICommand > _commands = new List< ICommand >();

        public void StoreAndExecute(ICommand command)
        {
            _commands.Add(command);
            command.Execute();
        }
    }
</code>
</pre>

<p>Nyní uděláme Reciever třídu, kde napíšeme Action a v tomto případě i to co chceme vypsat.</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">
    public class Light
    {
        public void TurnOn()
        {
            Console.WriteLine("Svetlo sviti");
        }

        public void TurnOff()
        {
            Console.WriteLine("Svetlo nesviti");
        }
    }
</code>
</pre>



<p>Příkaz pro rozsvícení světla - „ConcreteCommand" #1</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">
    public class FlipUpCommand : ICommand
    {
        private Light _light;

        public FlipUpCommand(Light light)
        {
            _light = light;
        }

        public void Execute()
        {
            _light.TurnOn();
        }
    }
</code>
</pre>

<p>Příkaz pro zhasnutí světla - „ConcreteCommand" #2 </p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">

    public class FlipDownCommand : ICommand
    {
        private Light _light;

        public FlipDownCommand(Light light)
        {
            _light = light;
        }

        public void Execute()
        {
            _light.TurnOff();
        }
    }
</code>
</pre>

<p>A nakonec napíšeme následující:</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">


    class Program
    {
        static void Main(string[] args)
        {
            Console.WriteLine("Napis prikaz (zap/vyp) : ");
            string cmd = Console.ReadLine();

            Light lamp = new Light();
            ICommand switchUp = new FlipUpCommand(lamp);
            ICommand switchDown = new FlipDownCommand(lamp);

            Switch s = new Switch();

            if (cmd == "zap")
            {
                s.StoreAndExecute(switchUp);
            }
            else if (cmd == "vyp")
            {
                s.StoreAndExecute(switchDown);
            }
            else
            {
                Console.WriteLine("Zadejte \"zap\" nebo \"vyp\"");
            }

            Console.ReadKey();
        }
    }
</code>
</pre>

<p>Výstup z konzole:</p>
<p><img src="images\output.png"></p>
<p>A to je vše, jednoduché jako facka.</p>  

<h3>Kdy použít:</h3>
<ul>
  <li>Když potřebujete opakovaně volat funkce.</li>
  <li>Když potřebujete posílat požadavky ruzným příjemcům, kteří je umí vyřešit různými způsoby.</li>
  <li>Když chcete program ovládát příkazy.</li>
</ul>  
<h3>Zdroje:</h3>
  <a href="https://en.wikipedia.org/wiki/Command_pattern">Wikipedia.org</a>
  <a href="http://www.dotnettricks.com/learn/designpatterns/command-design-pattern-dotnet">dotnettricks.com</a>
  <a href="http://www.dofactory.com/net/command-design-pattern">dofactory.com</a>