<h2>Implementace interface</h2>

<p class="author">Martin Zbořil</p>

<p class="introduction">Implementace slouží jako příklad použití interface. Ukázka je založená na téma ohodnocení studenta ve škole. Kde se, dle studentových výkonů(známek) určuje počet hodin, které se musí učit a počet hodin, které může využít k hraní na PC.</p>

<p>Jako první samotná definice interface IPersonBehavior. Interface obsahuje atributy Study a Play a metoda GetResult().</p>

<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">interface IPersonBehavior
{
	int Study { get; set; }
	int Play { get; set; }
	string GetResult();
}
</code></pre>

<p>Třídy, které implementují interface.</p>

<p><strong>GoodPersonMark</strong></p>

<p>Třída, která vystihuje chování žáka, když má dobré známky. Či-li žák musí studovat 1 hodinu a hrát 5 hodin. Metoda <strong>GetResult()</strong> vrací výsledek s informací, kolik musí hrát a studovat.</p>

<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">class GoodPersonMark : IPersonBehavior
{
	private int _study = 1;

	public int Study
	{
		get { return _study; }
		set { _study = value; }
	}

	private int _play = 5;

	public int Play
	{
		get { return _play; }
		set { _play = value; }
	}

	public string GetResult()
	{
		return "Můžeš hrát: " + _play + " hodin" + " Studovat: " + _study + " hodin";
	}
}
</code></pre>

<p><strong>MediumPersonMark</strong></p>

<p>Třída, která vystihuje chování žáka, když má průměrné známky. Či-li žák musí studovat 3 hodiny, a hrát může taky 3 hodiny. Metoda <strong>GetResult()</strong> vrací výsledek s informací, kolik musí hrát a studovat.</p>

<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">class MediumPersonMark : IPersonBehavior
{
	private int _study = 3;

	public int Study
	{
		get { return _study; }
		set { _study = value; }
	}
	private int _play = 3;

	public int Play
	{
		get { return _play; }

		set { _play = value; }
	}
	
	public string GetResult()
	{
		return "Můžeš hrát: " + _play + " hodin" + " Studovat: " + _study + " hodin";

	}
}
</code></pre>

<p><strong>BadPersonMark</strong></p>


<p>Třída, která vystihuje chování žáka, když má špatné známky. Či-li žák musí studovat 5 hodiny, a hrát 1 hodinu. Metoda <strong>GetResult()</strong> vrací výsledek s informací, kolik musí hrát a studovat.</p>

<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">class BadPersonMark : IPersonBehavior
	{
		private int _study = 5;

		public int Study
		{
			get { return _study; }
			set { _study = value; }
		}

		private int _play = 1;

		public int Play
		{
			get { return _play; }
			set { _play = value; }
		}
		
		public string GetResult()
		{
			return "Můžeš hrát: " + _play + " hodin" + " Studovat: " + _study + " hodin";
		}
	}
</code></pre>

<p><strong>Person</strong></p>

<p>Třída, která vystihuje osobu(žáka). Obsahuje atributy Name a PersonRatingStrategy. Atribut <strong>PersonRatingStrategy</strong> je datový typ rozhraní(interface) a metoda <strong>GetReward()</strong>, vrací výsledek na základě tohoto atributu.</p>

<pre class="prettyprint linenums scroll-horizontal">

				<code class="language-C# ">class Person

				    {

				        public Person(int mark, string name, IPersonBehavior personratingstrategy)

				        {

				            this._mark = mark;

				            this._name = name;

				            this._personratingstrategy = personratingstrategy;

				        }

				        private string _name;

				        public string Name

				        {

				            get { return _name; }

				            set { _name = value; }

				        }

				        private IPersonBehavior _personratingstrategy;

				        public IPersonBehavior PersonRatingStrategy

				        {

				            get { return _personratingstrategy; }

				            set { _personratingstrategy = value; }

				        }

				    	public string GetRating()

				        {

				            return _personratingstrategy.GetResult();

				        }
				    }

				</code>

			</pre>

<p><strong>Person</strong></p>

<p>Instance třídy Person a vypsání ohodnocení.

<pre class="prettyprint linenums scroll-horizontal">

				<code class="language-C# ">///Špatné chování

					Person person = new Person("Albert", new BadPersonMark());

		            Console.WriteLine(person.Name + " " + person.GetRating());

		            ///Průměrné chování

		            Person person1 = new Person("Petr", new MediumPersonMark());

		            Console.WriteLine(person1.Name + " " + person1.GetRating());

		            ///Výborné chování

		            Person person2 = new Person("Jana", new GoodPersonMark());

		            Console.WriteLine(person2.Name + " " + person2.GetRating());

				</code>

			</pre>
