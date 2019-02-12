
<h2>Creational design pattern - Builder</h2>
<p class="author">Vojtěch Doutnáč</p>
<p class="introduction">Builder je návrhový vzor, který popisuje, jak lze přistupovat k tvorbě instancí, které mají podobný konstrukční proces. Patří do skupiny vytvářejících (creational) návrhových vzorů.</p>

<p>Builder je vhodné použít například když máme rozdílné třídy, jež mají podobný proces konstrukce. Třídy můžou být nezávislé a rozdílné, čímž se builder liší například od Abstract factory, jejíž pomocí se dají tvořit podobné objekty. </p>

<h3>Struktura</h3>
<img src="./images/Builder.png" alt="Builder" width="500"/>
<ul>
    <li><strong>Director</strong>
        <p>Třída, která řídí proces vytváření objektů. Instance třídy Director dostane od klienta určení, který Builder má použít. Tím je zároveň definováno, jaký produkt bude vyráběn. Director řídí vytvoření produktu voláním metod pro zhotovení jednotlivých částí z rozhraní Builder. Po vytvoření požadované části výsledného produktu je daná část do něho začleněna. Výsledný produkt je možné získat použitím metody getResult.</p>
    </li>
    <li><strong>Concrete Builder</strong>
        <p>Implementace rozhraní Builder, která je schopná vytvářet další objekty. Vytváří a sestavuje součásti pro tvorbu složitých objektů. Metoda getResult je užívána k předání výsledného produktu a volá ji zpravidla klient, který konstrukci objektu vyvolal. Na základě použitých dat, která mají být zobrazena, může být rozhodnuto, která z možných tříd ConcreteBuilder je použita pro vytvoření objektu. Například pokud má být zobrazeno několik položek, je klientu předán jako Product seznam tvořen „checkBoxy“. V případě více položek bude vytvořen a předán rozbalovací seznam. Samozřejmě kromě zobrazovaných dat mohou hrát roli i jiné faktory. Directoru je předán jako parametr instance ConcreteBuilder a Director, s využitím metod nadefinovaných v rozhraní, řídí proces vytváření produktu.</p>
    </li>
    <li><strong>Builder</strong>
        <p>Abstraktní rozhraní pro tvorbu objektů (produkt). Metoda buildPart slouží k vytvoření konkrétní části objektu, o její volání se stará Director.</p>
    </li>
</ul>
<h4>Příklad užití</h4>
<p>Nyní si ukážeme využití builderu na konkrétním příkladu a tím bude stavba domu.</p>

<strong>Budova</strong>
<p>Pozn.
    <i>Stavitelé v našem příkladu budou mít několik společných metod, na zahájení nové stavby, položení podlahy, stavbu zdí, stavbu střechy a získání výsledné budovy. Proto vytvoříme rozhraní, které budou všichni stavitelé implementovat.</i>
</p>


<strong>Rozhraní stavitelů</strong>
<p>Pozn.
    <i>Začneme jednoduchou třídou, která představuje budovu. Bude mít tři atributy: podlahu (floor), zdi (walls) a střechu (roof). Budova bude naším produktem. Různé budovy se od sebe budou lišit podlahou, zdmi a střechou. Důležité je, že klient o postavení budovy požádá řídící objekt (stavbyvedoucího) a o proces jejího vystavění se již nestará.</i>
</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">public interface Builder {
  /**
   * Zahájí novou stavbu.
   */
  void startNew();

  /**
   * Položí podlahu.
   */
  void buildFloor();

  /**
   * Postaví zdi.
   */
  void buildWalls();

  /**
   * Postaví střechu.
   */
  void buildRoof();

  /**
   * Vrátí výslednou budovu.
   * @return výsledná budova
   */
  Building getResult();
}xhtml1
</code>
</pre>

<strong>Stavitelé</strong>
<p>Pozn.
    <i>Pro náš příklad vytvoříme dvě různé implementace stavitelů: jeden bude stavě budovy levné, druhý luxusní. Klient si pak jednoho z nich vybere a tuto volbu sdělí stavbyvedoucímu. Oba stavitelé budou v našem případě výkonnými objekty, protože zajišťují konkrétní úkony při stavbě.</i>
</p>

<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">public class CheapBuilder implements Builder {
  private Building result;

  @Override
  public void startNew() {
    this.result = new Building();
  }

  @Override
  public void buildFloor() {
    this.result.setFloor("laminate floor");
  }

  @Override
  public void buildWalls() {
    this.result.setWalls("panel walls");
  }

  @Override
  public void buildRoof() {
    this.result.setRoof("wooden roof");
  }

  @Override
  public Building getResult() {
    return this.result;
  }
}
</code>
</pre>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">public class LuxuryBuilder implements Builder {
  private Building result;

  @Override
  public void startNew() {
    this.result = new Building();
  }

  @Override
  public void buildFloor() {
    this.result.setFloor("wooden floor");
  }

  @Override
  public void buildWalls() {
    this.result.setWalls("brick walls");
  }

  @Override
  public void buildRoof() {
    this.result.setRoof("shindel roof");
  }

  @Override
  public Building getResult() {
    return this.result;
  }
}

</code>
</pre>
<strong>Stavbyvedoucí</strong>
<p>Pozn.
    <i>V roli řídícího objektu zde bude vystupovat stavbyvedoucí. Ten dostane k dispozici stavitele, s jehož pomocí budovu postupně vystaví. Začne podlahou, pokračuje stěnami a nakonec postaví střechu. Po dokončení všech operací vrátí klientovi výslednou budovu.</i>
</p>

<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">public class Director {
  /**
   * Postaví budovu s použitím zadaného stavitele.
   * @param builder stavitel
   * @return výsledná budova
   */
  public Building build(final Builder builder) {
    // zahájit stavbu nové budovy
    builder.startNew();
	// položit podlahu
    builder.buildFloor();
	// postavit zdi
    builder.buildWalls();
	// postavit střech
    builder.buildRoof();
	// vrátit výsledek
    return builder.getResult();
  }
}
</code>
</pre>

<p>Použití je následující:</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">Person person = Person.builder()
    .withName("Karel Slupka")
    .ofAge(value)
    .build();
</code>
</pre>