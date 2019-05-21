<h2>Opakování pro OOP</h2>
<p>Realizujte následující class diagramy v C#. Výsledkem je aplikace, která navtdro nastaví vzorová data, na kterých lze provádět operace dané v třídách. Relizujte i samotnou logiku metod.</p>
<p>
    V class diagramu:
<ul>
    <li>
        + značí Public
    </li>
    <li>
        - značí Private
    </li>
    <li>
        Vek(): Integer značí metodu se jménem Vek, bez parametrů, vrací hodnotu typu int
    </li>
</ul>
<p>
    Věnujte pozornost datovým typům.
</p>
<p>
    Aktuální modely lze nalézt <a href="https://repository.genmymodel.com/david.maly">zde</a>
</p>
<h3>Základ OOP</h3>
<ol>
    <li>Vytvoření třídy student a vypočítání jeho věku z rodného čísla.

        <img src="images/oop-student.png" clss="img-custom">
    </li>
    <li>Studenti studující ve škole.

        <img src="images/oop-skola-student.png" clss="img-custom">
    </li>
    <li>Statistiky studentů ve škole

        <img src="images/oop-skola-student-znamka.png" clss="img-custom">
        <i>Pozn. <a href="../csharp/#porovnavani-objektu">Porovnávání objektů</a></i>
    </li>
</ol>
<h3>Pokročilé OOP - Strategy pattern</h3>
<ol>
    <li>Seřazení Studentů různými způsoby (strategiemi). Metoda Sort přijímá jako parametr seznam studentů a vracího seřazený. Implementujte i samotnou logiku řazení.

        <img src="images/oop-strategy.png" clss="img-custom">
    </li>

</ol>
<h3>Encapsulation and Single responsibility </h3>
<p>
	Splňuje tato třída podmínky Zapouzdření (Encapsulation) a pouze jedné zodpovědnosti (Single responsibility)? Proč?
<p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">class User
{
	private string _name;
	private string _personalId;
	private DateTime _dateOfBirth;

	public User(string name, string personalId, DateTime dateOfBirth)
	{
		_name = name;
		_personalId = personalId;
		_dateOfBirth = dateOfBirth;
	}

	public int GetAge()
	{
		DateTime now = DateTime.Today;
		int age = now.Year - _dateOfBirth.Year;
		if (now < _dateOfBirth.AddYears(age)) age--;
		return age;
	}
}
</code></pre>

<p>
    Co je špatně na následující metodě?
</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">public static string GetTimeOfDay()
{
    DateTime time = DateTime.Now;
    if (time.Hour >= 0 && time.Hour < 6)
    {
        return "Night";
    }
    if (time.Hour >= 6 && time.Hour < 12)
    {
        return "Morning";
    }
    if (time.Hour >= 12 && time.Hour < 18)
    {
        return "Afternoon";
    }
    return "Evening";
}
</code></pre>
<p>Viz. <a href="https://www.toptal.com/qa/how-to-write-testable-code-and-why-it-matters">zdroj</a></p>

