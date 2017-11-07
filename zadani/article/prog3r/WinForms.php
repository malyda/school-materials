<ol>
<li>Vytvořte aplikaci, která zobrazí formulář, kde uživatel zadá své jméno a heslo. Tyto údaje se zkontrolují, poté se zjistí, zda jsou zapsány v souboru. Pokud nejsou, program je zapíše, pokud jsou zapsána, program zobrazí dialogové okno.<br><br>
Pozn.<i>dialogové okno je: MessageBox.Show(text);</i><br><br>
</li>
<li>Vytvořte aplikaci, která pomocí tlačítek (nebo jiných klikatelných objektů) umožní uživateli hrát <strong>Piškvorky na poli 3x3</strong>. Tato aplikace v případě vítězství uživatele vypíše dialogové okno a v případě zaplnění celého pole vyzve uživatele k nové hře
<pre><code class="csharp”">Button.enabled = false //zajistí, že button nebude klikatelný
//Dialogové okno s možnostmi Ano a Ne
DialogResult res =  MessageBox.Show(value,"jop", MessageBoxButtons.YesNo);
if(res == DialogResult.Yes) {} if(ress == DialogResult.No)</code></pre>
</li>
<li>Na základě úkolu č.1 vytvořte program, který bude registrovat uživatele, přihlašovat je a umožní editaci jejich údajů:<br>
- Jméno<br>
- Přijmení<br>
- Heslo<br>
- Přezdívka<br>
Údaje jsou zapisovány do souboru.
</li>
</ol>