<h2>State Pattern (stavový vzor)</h2>
<p class="author">David Povýšil</p>
<p class="introduction">
    State pattern je vhodným řešením v případě, kdy máme objekt, jež během své existence mění své vnitřní chování tak, že nabývá různých stavů.
    Přičemž chování objektu v různých stavech se výrazně liší. Při změně vnitřního stavu objektu se pak objekt reprezentující původní stav zamění za objekt jiný, jež odpovídá stavu novému.
</p>
<h3> Účel </h3>
<p>
    Při programování může často dojít k situaci, kdy budeme mít objekt, jehož stav se může často měnit, přičemž změna tohoto stavu způsobí také změnu v chování objektu a tedy i v reakci na zasílané zprávy.
    V takovém případě si můžeme pro každý stav objektu definovat vnitřní objekt, jenž bude tento stav zastupovat.
    Tím se náš problém zjednoduší, neboť pohodlněji definujeme jednotlivé metody. Celý program pak bude přehlednější a přátelštější k případným dalším úpravám.
    Jinými slovy: budeme-li mít objekt, který často mění svůj stav (například auto jede rovně, doleva, doprava, dozadu), tak použijeme state pattern, čímž se naše práce značně zjednoduší.

</p>

<h3>Výhody</h3>
<p>
    - Odpadnou častá rozhodování <br />
    - Přehlednější program <br />
    - Snadnější upravování programu
</p>
<h3>Příklad</h3>
<p>
    Na následujícím obrázku lze vidět, jak funguje State pattern. Něco se stane: například hráč stiskne šipku doleva. Jednotlivé konkrétní stavy zjistí podle requestu, že hráč drží šipku doleva a otočí auto, které pojede doleva.
</p>
<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e8/State_Design_Pattern_UML_Class_Diagram.svg/470px-State_Design_Pattern_UML_Class_Diagram.svg.png" alt="Příklad" />
<p>
    Následující příklad ukazuje další State pattern. Nyní se nacházíme ve hře. Hráč může být (pro nějakou zjednodušenou hru) zdravý, mrtvý nebo může přežívat.
</p>
<img src="http://st1.vchensubeswogfpjoq.netdna-cdn.com/wp-content/uploads/2015/01/State-Design-Pattern-Java.png" alt="Příklad 2" />