<h2>Princip SOLID</h2>
<p class="author">Jan Půda</p>
<p class="introduction"> <strong>SOLID</strong> (single responsibility, open-closed, Liskov substitution, interface segregation, dependency inversion)</p>
<p>Je sada doporučení, principů a vodítek, sloužících k vytvoření kvalitnějšího objektového návrhu. Principy SOLID shromáždil a popsal <strong>Robert C. Martin</strong> (strýček Bob) kolem roku 2000.</p>	
    		
<h3>Přehled</h3>
<p>Každé písmeno ve slově SOLID představuje jeden princip.</p>
              <div id="demo">
                  <div class="table-responsive-vertical shadow-z-1">
                      <!-- Table starts here -->
                      <table id="table" class="table table-hover table-mc-light-blue table-basic">
                          <thead>
                              <tr>
                                  <th>Zkratka</th>
                                  <th>Název</th>
                                  <th>Popis</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr>
                                  <td data-title="Zkratka">S</td>
                                  <td data-title="Jmeno">Single responsibility principle</td>
                                  <td data-title="Popis">
                                      Třídy by měly mít jedinou zodpovědnost / jediný důvod ke změně.
                                  </td>
                              </tr>
                              <tr>
                                  <td data-title="Zkratka">O</td>
                                  <td data-title="Jmeno">Open/Closed principle</td>
                                  <td data-title="Popis">
                                      Třídy by měly být otevřené pro rozšiřování, ale uzavřené pro změny.
                                  </td>
                              </tr>
                              <tr>
                                  <td data-title="Zkratka">L</td>
                                  <td data-title="Jmeno">Liskov substitution principle</td>
                                  <td data-title="Popis">
                                      Podtřídy by měly být zaměnitelné s jejich bázovými třídami.
                                  </td>
                              </tr>
                              <tr>
                                  <td data-title="Zkratka">I</td>
                                  <td data-title="Jmeno">Interface segregation principle</td>
                                  <td data-title="Popis">
                                      Více specifických rozhraní je lepší než jedno univerzální rozhraní.
                                  </td>
                              </tr>
                              <tr>
                                  <td data-title="Zkratka">D</td>
                                  <td data-title="Jmeno">Dependency inversion principle</td>
                                  <td data-title="Popis">
                                      Závislost na abstrakcích, nikoliv na implementacích.
                                  </td>
                              </tr>
                          </tbody>
                      </table>
                  </div>
                  <h3>Podrobnější popis</h3>
                  <h4>SINGLE RESPONSIBILITY PRINCIPLE</h4>
                  <p>Princip jedné zodpovědnosti - Tento princip nám říká, že každá třída nebo modul má mít jednu zodpovědnost a právě tato jedna zodpovědnost by měla být plně pokryta danou třídou/modulem.</p>
                  <p>Zodpovědností se zpravidla rozumí nějaká jednoduchá a oddělená funkcionalita. Největší výhodou tohoto principu je, že snižuje složitost systému a zvyšuje jeho pochopitelnost.</p>
                  <p>Příklad porušení principu:</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C#">class Book {
    private Name name;
    private Author author;
    private Content content;
    // ... getters
    // ... settters
    public void print() {
        // book printing code
    }
    public void read() {
        // book reading code
    }
}</code>
</pre>
<p>Oprava podle principu:</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">class Book {
    private Name name;
    private Author author;
    private Content content;
    // ... getters
    // ... settters
}</code>
</pre>
                  <pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">class Printer {
    public void print(Book book) {
        // book printing code
    }
}</code>
</pre>
                  <pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">class Reader {
    public void read(Book book) {
        // book reading code
    }
}</code>
</pre>
                  <h4>OPEN/CLOSED PRINCIPLE</h4>
                  <p>Princip Open/Closed - Tento princip nám říká, že každá softwarová entita jako třída, modul, nebo metoda by měla být otevřená pro rozšíření, ale uzavřená pro modifikaci.</p>
                  <p>Znamená to, že změnit její chování by mělo být možné bez toho, aby byl potřeba zásah do zdrojového kodu, například přidáváním jiných entit. Takový zásah do zdrojového kodu může totiž přinést mnoho komplikací. Většina realizací tohoto principu spočívá v použití dědičnosti.</p>
                  <p>Příklad porušení principu:</p>
                  <pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">class Payment {
    public void pay(Method method, Money amount) {
        if (method.isCash()) {
            confirmPaidUsingCash(amount);
            printReceipt(amount);
            dispatchGoods();
        } else if (method.isTransfer()) {
            confirmPaidUsingTransfer(amount);
            printReceipt(amount);
            dispatchGoods();
        } else {
            throw new IllegalArgumentException("Unknown payment option.");
        }
    }
}</code>
</pre>
                  <p>Oprava podle principu:</p>
                  <pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">interface Method {
    void confirmPaymentReceived(Money amount);
}
class TransferMethod implements Method { /* ...confirmPaymentReceived... */ }
class CashMethod implements Method { /* ...confirmPaymentReceived... */ }</code>
</pre>
                  <pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">class Payment {
    public void pay(Method method, Money amount) {
        method.confirmPaymentReceived(amount);
        printReceipt(amount);
        dispatchGoods();
    }
}</code>
</pre>
                  <h4>LISKOV SUBSTITUTION PRINCIPLE</h4>
                  <p>Liskovové princip zaměnitelnosti - Tento princip hovoří o vzájemném nahrazování dvou tříd. Uvěďme si to na příkladu, kdy máme třídu <strong>A</strong> a třídu <strong>B</strong>. Třída <strong>B</strong> je potomkem třídy <strong>A</strong>, takže třída <strong>B</strong> musí být použitelná všude, kde je vyžadována třída <strong>A</strong> bez toho, aniž by o tom nadřazená třída věděla.</p> 
                  <p>Tento princip opět implikuje použití dědičnosti.</p>
                  <h4>INTERFACE SEGREGATION PRINCIPLE</h4>
                  <p>Princip oddělení rozhraní - Tento princip nám říká, že každé rozhraní by mělo být co nejmenší možné. Třídy by měly záviset pouze na těch rozhraních, která používají.</p>
                  <p>Když rozhraní přesáhne rozumnou velikost, musí se rozdělit do několika dalších, užších. Touto změnou se zasažené třídy přepracují tak, aby implementovaly minimální potřebnou podmnožinu původních rozhraní.</p>
                  <p>Příklad porušení principu:</p>
                  <pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">interface Lifecycle {
    void start();
    void stop();
}</code>
</pre>
                  <p>Oprava podle principu:</p>
                  <pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">interface Startable {
    void start();
}</code>
</pre>
                  <pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">interface Stoppable{
    void stop();
}</code>
</pre>
                  <h4>DEPENDENCY INVERSION PRINCIPLE</h4>
                  <p>Princip inverze závislosti - Tento princip nám říká, že moduly na vyšší úrovni by neměly záviset na modulech nízkoúrovňových. Oba by měly záviset na abstrakcích.  A dále, abstrakce by neměly záviset na implementačních detailech, ale naopak - detaily by měly záviset na abstrakcích.</p>
                  <p>Například, když vyšší úroveň provádí rozhodnutí a jeho realizací pověřuje moduly na nižší úrovni, může se po změně nižší úrovně změnit funkce i vyšší úrovně. To by se ale nemělo stát - snižuje to znovupoužitelnost vysokoúrovňových modulů, které by měly stát odděleně od modulů nízkoúrovňových.</p>                  
                  <h3>Zdroje a další informace</h3>
                  <p><a href="https://en.wikipedia.org/wiki/SOLID_(object-oriented_design)">Wikipedia - SOLID</a></p>
                  <p><a href="https://www.zdrojak.cz/clanky/navrhove-principy-solid/">Zdroják.cz - SOLID</a></p>
                  <p>Robert C. Martin: Čistý kód, Computer Press a.s., 2009, ISBN-978–80–251–2285–3</p>