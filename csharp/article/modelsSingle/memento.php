

<h2>Memento Pattern</h2>
<p class="author">David Hruška</p>
<p class="introduction">Jde o způsob jak zachytit a uchovat interní stav objektu bez porušení jeho zapouzdření. Účelem je zde znovuobnovení objektu do původního, uchovávaného stavu.</p>
<p class="introduction">Memento pattern je návrh softwarového vzoru, který umožňuje obnovit objekt do jeho původního stavu (vrátit zpět přes rollback).<strong> Vzor je realizován 3 objekty: Originator, caretaker a memento. Originator je objekt, který má vnitřní stav.</strong> Caretaker dělá něco pro originator, ale je schopen si zapamatovat původní stav a vrátit jej. Zpravidla se první ptá caretaker originatoru na memento objekt, poté lze provést operaci nebo sekvenci operací. Při vrácení se vždy objekt memnto vrátí do originatoru, samotný memento objekt je neprůhledný a proto jej caretaker nemůže změnit. Při používání tohoto vozru je potřeba dbát na to aby originator mohl měnit objekty nebo zdroje.<Strong> Memento pattern funguje i na jediném odkaze.</strong></p>

<strong>Ukázka mementa</strong>
<img src="images/memento.gif" alt="Memento" width="700px" />
<h3>Popis součástí:</h3>
<strong>Memento</strong>
<ul>
    <li>Ukládá vnitřní stav objektu Originator. Memento může podle vlastního uvážení skladovat tolik nebo jen málo vnitřního stavu originatoru.</li>
    <li>Chrání proti přístupu jinými předměty než originatorem.</li>
</ul>
<strong>Originator</strong>
<ul>
    <li>Vytváří memento obsahující snímek aktuálního interního stavu.</li>
    <li>Pomocí mementa obnoví svůj vnitřní stav.</li>
</ul>
<strong>Caretaker</strong>
<ul>
    <li>Je zodpovědný za úschovu mementa.</li>
    <li>Nikdy nepracuje ani neprohlíží obsah mementa.</li>
</ul>
<h3>Příklad:</h3>
<p>Pro využití tohoto návrhového vzoru je mimo jiné při podpoře „undo/redo“ operací. Také je možné aplikovat princip vzoru velmi dobře v internetových aplikacích, kde musíme ošetřovat výpadek spojení serverové a klientské části a další mimořádné stavy. Maloobchod si vytváří objednávku ovoce a zeleniny. Do svého „nákupního košíku“ přidává různé množství nabízených komodit. Vytvoření objednávky je poměrně důležitá a časově náročná činnost. Nemělo by tedy docházet ke ztrátě dat při výpadku spojení. Při každém požadavku na server dochází k vytvoření nebo aktualizace objektu Memento objednávky. Jelikož vytvářím objekt, nedochází k zatížení perzistentního úložiště. Pokud maloobchod pracoval na objednávce a řádně tuto činnost neukončil, je objednávka uložena a nabídnuta k dokončení při dalším přihlášení. Třída Velkoobchod zajišťuje funkci třídy Caretaker.</p>
<h3>Výsledek:</h3>
<p>Vytvořením objektu Memento a jeho naplněním je vyřešeno uchování stavových proměnných vně zdrojového objektu. Zapouzdřenost dat je zajištěna implementací exklusivního přístupu k obsahu objektu Memento pouze zdrojovým objektem. Objekt Caretaker ve vzoru zajišťuje logiku uchování Memento objektů a předávání zpět zdrojovým objektům</p>
<h3>Souvislosti:</h3>
<p>Tento návrhový vzor Memento využíváme, jestliže chceme zachytit stav objektu a neporušit tím princip zapouzdřenosti objektu.</p>
<p>Tento návrhový vzor je nadále rozpracováván ve smyslu uložení stavů do perzistentních úložišť, což rozšiřuje původní záměr tohoto vzoru a nenaplňuje všechny jeho principy (úplná zapouzdřenost dat). Je ovšem nutné počítat s tímto uložením, ke kterému můžeme využít databázové systémy, převedení do XML nebo převedení na posloupnost bajtů (Serializace).</p>
<h3>Které problémy Memento řeší?</h3>
<p>Vytvořte objekt (originator), který je sám odpovědný za:</p>
<ul>
    <li>Interní stav objektu by měl být uložen externě, aby mohl být objekt později obnoven.</li>
    <li>Za to, že zapouzdření objektu nesmí být narušeno.</li>
</ul>
<p>Problém spočívá v tom, že dobře navržený objekt je zapouzdřen tak, že jeho reprezentace (datová struktura) je skrytá uvnitř objektu a nemůže být přístupná zvenku objektu.</p>



<strong>UML diagram Mementa</strong>
<img src="images/UML.jpg" alt="UML diagram" width="700px" />


<h4>Použití v C#</h4>
<p>Vzor mementa umožňuje zachytit vnitřní stav objektu bez narušení zapouzdření tak, že později lze v případě potřeby vrátit změny zpět / vrátit zpět. Zde je vidět, že objekt memento se skutečně používá k návratu změn provedených v objektu.</p>

<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">
//original object
public class OriginalObject
{
    private Memento MyMemento;

    public string String1 { get; set; }
    public string String2 { get; set; }

    public OriginalObject(string str1, string str2)
    {
        this.String1 = str1;
        this.String2 = str2;
        this.MyMemento = new Memento(str1, str2);
    }

    public void Revert()
    {
        this.String1 = this.MyMemento.string1;
        this.String2 = this.MyMemento.string2;
    }
}

//Memento object
public class Memento
{
    public readonly string string1;
    public readonly string string2;

    public Memento(string str1, string str2)
    {
        this.string1 = str1;
        this.string2 = str2;
    }
}
Python example
"""
Memento pattern example.
"""


class Memento(object):
    def __init__(self, state):
        self._state = state

    def get_saved_state(self):
        return self._state


class Originator(object):
    _state = ""

    def set(self, state):
        print("Originator: Setting state to", state)
        self._state = state

    def save_to_memento(self):
        print("Originator: Saving to Memento.")
        return Memento(self._state)

    def restore_from_memento(self, memento):
        self._state = memento.get_saved_state()
        print("Originator: State after restoring from Memento:", self._state)


saved_states = []
originator = Originator()
originator.set("State1")
originator.set("State2")
saved_states.append(originator.save_to_memento())

originator.set("State3")
saved_states.append(originator.save_to_memento())

originator.set("State4")

originator.restore_from_memento(saved_states[0])
</code>
</pre>

<h4>Použití v Pythonu</h4>

<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">
"""
Memento pattern example.
"""


class Memento(object):
    def __init__(self, state):
        self._state = state

    def get_saved_state(self):
        return self._state


class Originator(object):
    _state = ""

    def set(self, state):
        print("Originator: Setting state to", state)
        self._state = state

    def save_to_memento(self):
        print("Originator: Saving to Memento.")
        return Memento(self._state)

    def restore_from_memento(self, memento):
        self._state = memento.get_saved_state()
        print("Originator: State after restoring from Memento:", self._state)


saved_states = []
originator = Originator()
originator.set("State1")
originator.set("State2")
saved_states.append(originator.save_to_memento())

originator.set("State3")
saved_states.append(originator.save_to_memento())

originator.set("State4")

originator.restore_from_memento(saved_states[0])
</code>
</pre>

<h4>Použití v Java</h4>
<p>Následující program v Javě ukazuje použití "zpět" pro pattern memento.</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">
import java.util.List;
import java.util.ArrayList;
class Originator {
    private String state;
    // The class could also contain additional data that is not part of the
    // state saved in the memento..

    public void set(String state) {
        this.state = state;
        System.out.println("Originator: Setting state to " + state);
    }

    public Memento saveToMemento() {
        System.out.println("Originator: Saving to Memento.");
        return new Memento(this.state);
    }

    public void restoreFromMemento(Memento memento) {
        this.state = memento.getSavedState();
        System.out.println("Originator: State after restoring from Memento: " + state);
    }

    public static class Memento {
        private final String state;

        public Memento(String stateToSave) {
            state = stateToSave;
        }

        // accessible by outer class only
        private String getSavedState() {
            return state;
        }
    }
}

class Caretaker {
    public static void main(String[] args) {
        List<Originator.Memento> savedStates = new ArrayList<Originator.Memento>();

        Originator originator = new Originator();
        originator.set("State1");
        originator.set("State2");
        savedStates.add(originator.saveToMemento());
        originator.set("State3");
        // We can request multiple mementos, and choose which one to roll back to.
        savedStates.add(originator.saveToMemento());
        originator.set("State4");

        originator.restoreFromMemento(savedStates.get(1));
    }
}
</code>
</pre>
<strong>Výsledek: </strong>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">Originator: Setting state to State1
Originator: Setting state to State2
Originator: Saving to Memento.
Originator: Setting state to State3
Originator: Saving to Memento.
Originator: Setting state to State4
Originator: State after restoring from Memento: State3</code></pre>
