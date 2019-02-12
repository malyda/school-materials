<h2>Bridge Pattern</h2>

<p class="author">Adam Šulc</p>

<p class="introduction">Bridge Pattern je strukturální designový vzor, který odděluje rozhraní objektu od vlastní implementace.</p>

<p>Designový vzor Bridge je používán, když je potřeba oddělit abstrakci od její implementace. Taková akce má za následek, že abstrakce a a její implementace se mohou nezávisle měnit. Tento typ designové vzoru odděluje implementační třídu a abstraktní třídu pomocí vytoření mostové struktury mezi nimi.</p>

<p>Tento vzor zahrnuje rozhraní, které se chová jako most, který udrřžuje funkcionalitu tříd nezávislých na rozhraní, které tyto třídy implementuje.
    Tímto je docíleno, že třídy i rozhraní mohou být změněny bez toho, aby se navzájem ovlivňovaly.
</p>

<p><strong>Demonstrace použití - DrawAPI</strong></p>

<p>Draw API slouží jako dobrý příklad pro použití Bridge vzoru, proto se většina ukázek odvíjí právě od této API.</p>

<p>Na obázku níže se nachází demonstrace použití Bridge vzoru. Ukázka dokazuje, že kruh může být namalován různými barvami, ale s použitím stejné abstraktní třídy. Bude pouze používat jinou implementační třídu Každá implemetnační třída tak reprezentuje jinou barvu. Ukázka zahrnuje použití DrawAPI.</p>

<img src="images/bridge.png" alt="bridge pattern">

<p>Tento vzor zahrnuje rozhraní, které se chová jako most, který udržuje funkcionalitu tříd nezávislých na rozhraní, které tyto třídy implementuje.
    Tímto je docíleno, že třídy i rozhraní mohou být změněny bez toho, aby se navzájem ovlivňovaly.
</p>

<p>Příklad toho, jak má kód vypadat za použití Bridge Patternu vypadá následovně:</p>
<p>Je důležité vědět, že kód nesouvisí s diagramem, který je znázorněný výše.</p>

<pre class="prettyprint linenums scroll-horizontal"><code class="language-C# ">
  public interface IBridge
  {
      void Function1();
      void Function2();
  }

  public class Bridge1 : IBridge
  {
      public void Function1()
      {
          Console.WriteLine("Bridge1.Function1");
      }

      public void Function2()
      {
          Console.WriteLine("Bridge1.Function2");
      }
  }

  public class Bridge2 : IBridge
  {
      public void Function1()
      {
          Console.WriteLine("Bridge2.Function1");
      }

      public void Function2()
      {
          Console.WriteLine("Bridge2.Function2");
      }
  }

  public interface IAbstractBridge
  {
      void CallMethod1();
      void CallMethod2();
  }

  public class AbstractBridge : IAbstractBridge
  {
      public IBridge bridge;

      public AbstractBridge(IBridge bridge)
      {
          this.bridge = bridge;
      }

      public void CallMethod1()
      {
          this.bridge.Function1();
      }

      public void CallMethod2()
      {
          this.bridge.Function2();
      }
  }
</code></pre>

<p><strong>Kdy použít Bridge Pattern?</strong></p>

<p>Bridge Pattern je vhodné použít za těchto podmínek:</p>

<p>Chcete využívat Run-Time binding implementaci.</p>

<p>Používáte proliferaci tříd, která vzniká z nakupených rozhraní a několika implementací.</p>

<p>Chcete sdílet implementaci více objektům</p>

<p><strong>Užitečné odkazy a zdroje</strong></p>
<p><a href="https://www.tutorialspoint.com/design_pattern/bridge_pattern.htm">Bridge Pattern</a></p>
<p><a href="https://sourcemaking.com/design_patterns/bridge">Bridge Pattern</a></p>
<p><a href="http://w3sdesign.com/?gr=s02&ugr=proble">Bridge Pattern</a></p>


