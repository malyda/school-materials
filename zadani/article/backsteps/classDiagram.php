<h2>Cvičení na vytváření diagramu tříd</h2>
<h3>Dialog postav</h3>
<p>
    Vytvořte diagram tříd, který bude reprezentovat logiku jedné obrazovky, kde si povídají dvě postavy. V rámci diagramu využijte v největší možné míře princip kompozice a držte se SOLID.
</p>
<p>
    Do návrhu  zařaďte následující specifikace:
</p>
<ul>
    <li>Každá z postav může mít více textů v rámci dialogu</li>
    <li>Texty postav se střídají</li>
    <li>Dialog je ovládán timerem, který zobrazuje a skrývá jednotlivé texty</li>
    <li>V rámci dialogu se může uživatel rozhodnout a tím ovlivnit další vývoj dialogu</li>
    <li>Scéna navazuje na jednu nebo více dalších scén</li>
</ul>
<p>
    V diagramu vystupují následující třídy, doplňte vlastní:
</p>
<ul>
    <li>Postava - obrázek, jméno</li>
    <li>Scéna (dialog) - obrázek na pozadí, texty, rozhodnutí</li>
</ul>
<p>
    Diagram vytvořte tak, aby bylo možné scénu jednoduše vytvořit, měla by být kompatibilní s Frame, nebo UserControl.
</p>