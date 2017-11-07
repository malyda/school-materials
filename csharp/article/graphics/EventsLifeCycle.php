<h2>Životní cyklus</h2>
<p class="introduction">Podobně jako má každá věc svůj životní cyklus, od jejího vzniku až po její zánik, mají své životní cykly i veškeré objekty.</p>
<p>Pod pojmem životní cyklus si lze představit sled událostí, které mění stav jakéhokoliv objektu počínajících jeho vznikem a končící jeho zánikem. Do životního cyklu patří i všechny stavy, kterých daný objekt nabyl.</p>

<p>Příkladem může být životní cyklus osobního vozu.<br> Vůz je vyroben a tím nabude svého prvního skutečného stavu, vznikne. Poté je vůz prodán, používán, po prvních poruchách opraven, časem prodán a na samém konci je rozebrán a zaniká.</p>
<p>V programování můžeme některé výrazné změny stavů zachytávat a adekvátně na ně reagovat, takovou změnou může být vznik a zánik objektu zachycen pomocí konstruktoru a destruktoru.</p>
<h3>Životní cyklus WinForms formuláře</h3>
<p>Jakýkoliv formulář ve WinForms je obyčejná třída (dědící různé vlastnosti dle potřeby z jiných tříd), jako taková může nabývat různých stavů a ty lze odchytávat pomocí metod.</p>
<h4>Vytváření formuláře</h4>
<ul>
	<li>Control.HandleCreated - kdy je ovládací prvek zobrazen</li>
	<li>Control.BindingContextChanged - kdy je změna informací o ovládacím prvku</li>
	<li>Form.Load - kdy je celý formulář plně inicializován</li>
	<li>Control.VisibleChanged - kdy je změna visibility formuláře</li>
	<li><strong>Form.Activated</strong> - kdy je formulář aktivovaný (má focus)</li>
	<li><strong>Form.Shown</strong> - kdy je formulář poprvé zobrazen</li>
</ul>
<h4>Zánik formuláře</h4>
<ul>
	<li><strong>Form.Closing</strong> - kdy je formulář právě zavírán</li>
	<li>Form.FormClosing - jiný zápis pro Form.Closing</li>
	<li><strong>Form.Closed</strong> - formulář je zavřen a všechny jeho zdroje jsou uvolněny</li>
	<li>Form.FormClosed - jiný zápis pro Form.Closed</li>
	<li><strong>Form.Deactivate</strong> - kdy formulář ztratí focus</li>
</ul>
<a class="right" href="https://msdn.microsoft.com/en-us/library/86faxx0d%28v=vs.110%29.aspx"> Další události a jejich životní cykly </a>