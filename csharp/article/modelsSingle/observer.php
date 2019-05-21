<h2>  Observer design pattern</h2>
<p class="author">Jakub Staněk</p>
<p class="introduction"> Tento návrhový vzor definuje závislost mezi jedním a více objekty (one-to-many), takže když jeden objekt změní stav, všechny objekty závislé na něm bude automaticky upozorněny a aktuaizovány.</p>

<p>
    <strong>Pozorovatel - observer</strong>
</p>
<p>
    <strong>Vydavatel(pozorovaný) - subject</strong>
</p>

<p>
    <img src="images/observerClassDiagram.png" alt="observer pattern UML diagram" />
</p>
<p>Pozn.
    <i> Obrázek je použit ze stránky <a href="http://www.dotnettricks.com/learn/designpatterns/observer-design-pattern-c-sharp">dotnettricks.com</a></i>
</p>

<h3>Třídy a objektu vzoru</h3>
<h4>
    Subject
</h4>
<p>Zná svůj observer (pozorovatele)</p>
<p>Jakýkoli počet objektů pozorovatele může sledovat předmět</p>
<p>poskytuje rozhraní pro připojení a odpojení objektů pozorovatele</p>

<h4>
    ConcreteSubject(konkrétní předmět)
</h4>
<p>Konkrétní předmět, který obsahuje sbírku pozorovatelů, jak je vidět na obrázku výše</p>
<p>Uchovává stav konkrétního observer(pozorovatele)</p>
<p>Poskytuje rozhraní pro připojení a odpojení objektů pozorovatele</p>

<h4>
    Observer(pozorovatel)
</h4>
<p>Definuje různé rozhraní pro aktualizace jednotlivých objektů, které by měly být informovány o změnách v objektu</p>
<p>Jakýkoli počet objektů pozorovatele může sledovat předmět</p>

<h4>
    ConcreteObserver(konkrétní pozorovatel)

</h4>
<p>Odkazuje na objekt konkrétního předmětu</p>
<p>Uchovává stav, který by měl být zůstat v logickém souladu s předmětem</p>
<p>Implementuje rozhraní pro aktualizaci Observeru (pozorovatele), aby udrželo stav konkrétního předmětu</p>

<h3>Názorná ukázka na obrázku z praxe</h3>
<p>Pozn.
    <i> Obrázek a informace jsou použity ze stránky <a href="http://www.dotnettricks.com/learn/designpatterns/observer-design-pattern-c-sharp">dotnettricks.com</a></i>
</p>
<p>
    Některé dražby demonstrují tento vzor. Každý uchazeč má očíslované pádlo, které se používá k označení nabídky.
</p>
<p>
    Dražebník zahájí nabízení a "pozoruje", když je pádlo zvednuto, aby nabídku přijalo. Přijímáním nabídky se změní nabídková cena,
    která se vysílá všem uchazečům formou nové nabídky.
</p>
<h4>Další vysvětlení použítí návrhového vzoru v praxi</h4>
<p>
    Máte konkrétní příklad Studenta a MessageBoard. Student se zaregistruje přidáním do seznamu pozorovatelů, kteří chtějí být upozorněni, když je na MessageBoard zaslána nová zpráva.
</p>
<p>
    Když je do zprávy MessageBoard přidána zpráva, opakuje se nad seznamem pozorovatelů a upozorní je, že událost nastala.
</p>
<p>
    Přemýšlejte o Twitteru. Když říkáte, že chcete sledovat někoho, Twitter vás přidá do svého seznamu následovníků. Když vám poslali nový tweet, vidíš to na svém vstupu. V takovém případě je váš účet Twitter sledovatelem a osoba, kterou sledujete, je pozorovatelna.
</p>
<p>
    <img src="images/observerAuction.png" alt="Observer v praxi" />
</p>

<h3>Ukázka implementace Observeru v C#</h3>
<p>Pozn.
    <i> ukázka je použíta ze stránky <a href="https://sourcemaking.com/design_patterns/facade">sourcemaking.com</a></i>
</p>



<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">public abstract class Subject
{
 private ArrayList observers = new ArrayList();

 public void Attach(IObserver o)
 {
 observers.Add(o);
 }

 public void Detach(IObserver o)
 {
 observers.Remove(o);
 }

 public void Notify()
 {
 foreach (IObserver o in observers)
 {
 o.Update();
 }
 }
}

public class ConcreteSubject : Subject
{
 private string state;

 public string GetState()
 {
 return state;
 }

 public void SetState(string newState)
 {
 state = newState;
 Notify();
 }
}

public interface IObserver
{
 void Update();
}

public class ConcreteObserver : IObserver
{
 private ConcreteSubject subject;

 public ConcreteObserver(ConcreteSubject sub)
 {
 subject = sub;
 }

 public void Update()
 {
 string subjectState = subject.GetState();
 Console.WriteLine(subjectState);
 }
}
</code>
</pre>

<h4>Shrnutí</h4>
<p>Observer je velmi dobré využítí v praxi, jelikož "spravuje" objekty pod ním - notifikuje a aktualizuje. Vytváří přehlednost v kódu a také logicky upravuje kód.</p>
<h4>Zdroje</h4>
<a href="http://www.dotnettricks.com/learn/designpatterns/observer-design-pattern-c-sharp" alt="zdroj1">dotnettricks</a>
<a href="http://www.dofactory.com/net/observer-design-pattern" alt="zdroj2">dofactory</a>
<a href="https://www.codeproject.com/Tips/769084/Observer-Pattern-Csharp" alt="zdroj3">codeproject</a>
<a href="https://sourcemaking.com/design_patterns/observer" alt="zdroj4">sourcemaking</a>