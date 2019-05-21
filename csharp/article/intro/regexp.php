
<h2>  Regulární výrazy</h2>
<p class="introduction">
    Velká skupina lidí zabývající se programováním vůbec neví co jsou to
    regulární výrazy. Dokonce i spousta profesionálních programátorů si s tímto mocným nástrojem není úplně jistá a raději ho nepoužívají. Přitom s regulárními výrazy se můžeme setkat skoro všude kolem nás. Není to jenom nástroj programátora, ale může ho využívat i obyčejný uživatel v mnoha aplikacích.
</p><p class="introduction">
    Jsou velmi jednoduché a často nahradí desítky řádků zdrojového kódu. Vznikly z důvodu potřeby práce s textovými řetězci určitým unifikovaným způsobem. Jsou zajímavý nástroj nejen pro ověření, zdali zadaný textový řetězec <b>splňuje určená pravidla (validace)</b>, ale také nám umožňují poměrně jednoduchým způsobem <b>vyhledávat určité podřetězce</b>.
</p>


<p>
    Regulární výraz je <b>textový řetězec složený z určitých znaků</b>, kde každý znak má svojí funkci (podmínku). Gramatika regulárních výrazů není zase tolik složitá, ale je poměrně nepřehledná a proto je dobré si již napsané výrazy komentovat.
</p>
<p><i>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">\d{3}\s?\d{2} //Výraz pro kontrolu PSČ</code>
</pre>
        - Tento zdánlivě nepřehledný a složitý výraz ověřuje, zda je zadaným textem poštovní směrovací číslo či nikoli. Dokonce počítá i s tím, že mezi 3. a 4. číslem může být mezera.
    </i></p>

<h3>Třída Regex</h3>
<p>
    Ve frameworku .NET pro C# existuje <b>třída Regex</b>, která nám umožňuje pracovat s regulárními výrazy. V konstruktoru této třídy ji přídámé pravidlo (regulární výraz) a následně ověříme, zda textový řetězec splňuje zadanou podmínku.
</p>
<h4>Příklad</h4>
<p>
    Vytvoříme si novou instanci třídy Regex a určíme jí náš regulární výraz. Poté porovnáme zadaný řetězec s naším pravidlem pomocí funkce <code class="language-C# ">IsMatch()</code>, která <b>vrací true nebo false</b>. Pravidlo bude ověřovat zda byl zadán platný email.


<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">//Kontrola emailu
string pattern = "[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\\.[a-zA-Z]{2,4}";
Regex rule = new Regex(pattern);
Console.Write("Zadejte email: ");
if (rule.IsMatch(Console.ReadLine())){
    Console.ForegroundColor = ConsoleColor.Green;
    Console.WriteLine("Zadali jste platný email.");
}
else{
    Console.ForegroundColor = ConsoleColor.Red;
    Console.WriteLine("Zadali jste neplatný email.");
}
Console.ResetColor();</code>
</pre>
</p>

<h3>Zápis regulárních výrazů</h3>

<h4>Tečka</h4>
<p>
    Tečka nahrazuje libovolný znak v textovém řetězci. Pokud náš výraz budou pouze tři tečky (<code class="language-C# ">...</code>), bude platit cokoliv co má tři znaky.
</p>
<p>Ah -> neplatné</p>
<p>Čau -> platné</p>
<p>Ča@u -> platné</p>
<p>Č@a#u -> platné</p>

<p>
    Všimněte si, že poslední dva řetězce prošly naším pravidlem i když mají více jak 3 znaky. To je z důvodu, že nemáme označený začátek a konec našeho výrazu. Proto je třeba označit začátek stříškou (<b>^</b>), které zajistí začátek výrazu. Pro označení konce dáme za výraz dolar (<b>$</b>). Náš výraz bude vypadat takto: <code class="language-C# ">^...$</code>
</p>

<h4>Hranaté závorky</h4>
<p>
    Hranaté závorky ukazují na skupinu znaků, které řetězec smí (nebo nesmí) obsahovat. Pokud je smí obsahovat, tak je jednoduše napíšeme do závorky (ničím je neoddělujeme). Pokud je naopak nesmí obsahovat, přidáme před znaky ještě stříšku (^, napíšete ji pomocí Alt + 94). Pokud chcete určit, že se má ověřovat třeba abeceda, tak nemusíte vypisovat abcd…., ale stačí uvést [a-zA-z]. Tímto zajistíte, že se zkontrolují všechny znaky, které jsou mezi a-z a A-Z. Znaky se berou z ASCII tabulky, takže třeba č už daný výraz nesplní.
</p>
<h4>Kulaté závorky</h4>
<p>
    Kulaté závorky nám seskupují určitou část výrazu. Kvantifikátory (viz. níže) se pak vztahují na celý obsah závorky.
</p>

<h4>Escapování</h4>
<p>
    Někdy chcete ve výrazu použít nějaký metaznak, třeba chcete ověřit, jestli uživatel zadal (ahoj|světe). Jednotlivé "speciální" znaky musíte odescapovat, tedy předsadit zpětným lomítkem (pravý alt + Q). Výraz by pak mohl vypadat následovně:
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">\(ahoj\|světe\)</code>
</pre>
</p>


<h4>Kvantifikátory</h4>
<p>
    Kvantifikátory nám říkají kolikrát se budou znaky opakovat. Kvantifikátorů je několik typů, ten základní je {N}, kde N udává počet opakování. Dále tu máme {N, M}, kde N je minimální počet opakování a M maximální. Dále ještě existují předdefinované kvantifikátory. Otazník (?) je alternativou k {0, 1}, hvězdička {0-∞} a plus {1-∞}. U předdefinované hvězdičky a pluska to funguje pro maximálně nekonečno. Jiný zápis pro ně neexistuje.</p><p>Příklad čtyř libovlných znaků, který jste viděli již v úvodu, by tedy šel také zapsat jako:
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">^.{4}$</code>
</pre>
</p>


<h4>Zástupné znaky</h4>
<p>
    V praxi se ještě používají zástupné znaky. Tyto znaky zkracují výraz, ten se pak čte (o trochu) lépe.

    Zástupné znaky se píší malými písmeny a pak jsou tytéž akorát velkými. Velkými písmeny jsou opakem těch malých. \d jsou čísla 0-9 tedy výraz je totožný s [0-9]. Kdežto \D je totožný s [^0-9]. \w je pak pro jakékoliv písmeno, číslo nebo podtržítko. \s je pro bílé znaky (např. mezeru).
</p>


<h4>Přehled regulárních výrazů</h4>
<p>
<table class="table-basic">
    <tr class="mdl-color--primary">
        <th>Výraz</th>	<th>Popis</th>	<th>Příklad výrazu</th>	<th>Odpovídající řetězce</th>
    </tr><tr>
        <td>^</td><td>Začátek textu	</td><td>^abc	</td><td>abc, abcd, abc123… </td>
    </tr><tr>
        <td>$</td><td>Konec textu	</td><td>x$	</td><td>abcx, x, aaax…</td>
    </tr><tr>
        <td>(…)</td><td>Logická skupina	</td><td>(123)+	</td><td>123, 123123, 123123123…</td>
    </tr><tr>
        <td>[…]</td><td>Výčet možných znaků	</td><td>[0-9]	</td><td>1, 2, 4, 5, 6…</td>
    </tr><tr>
        <td>[^…]</td><td>Obrácený výčet znaků	</td><td>[^0-9]	</td><td>a, b, z, x…</td>
    </tr><tr>
        <td>{…}</td><td>Pevný počet výskytů	</td><td>ab{3}c	</td><td>abbbc</td>
    </tr><tr>
        <td>{…,…}</td><td>Rozsah počtu výskytů	</td><td>ab{1,2}c	</td><td>abc, abbc</td>
    </tr><tr>
        <td>{…,}</td><td>Minimální počet výskytů	</td><td>ab{2,}c</td><td>	abbc, abbbc, abbbbc…</td>
    </tr><tr>
        <td>*</td><td>Žádný nebo více znaků	</td><td>A*hoj	</td><td>hoj, Ahoj, AAhoj, AAAhoj…</td>
    </tr><tr>
        <td>+</td><td>Jeden nebo více znaků	</td><td>A+hoj	</td><td>Ahoj, AAhoj, AAAhoj…</td>
    </tr><tr>
        <td>?</td><td>Žádný nebo jeden znak	</td><td>A?hoj	</td><td>Ahoj, hoj</td>
    </tr><tr>
        <td>(?<…>…)</td><td>Pojmenovaná skupina	</td><td>(?< skupina>[0-9]+)	</td><td>1, 4, 53, 634…</td>
    </tr><tr>
        <td>…|…</td><td>Alterace - více možností	</td><td>A(hoj|uto|aa)</td><td>	Ahoj, Auto, Aaa</td>
    </tr><tr>
        <td>.</td><td>Libovolný znak (krom \n)	</td><td>A.oj	</td><td>Aaoj, Aboj, Acoj, Adoj…</td>
    </tr><tr>
        <td>\t</td><td>Zastupuje znak tabulátoru	</td> 	 </td><td></td><td>
    </tr><tr>
        <td>\r</td><td>Zastupuje návratu hlavy</td></td><td></td><td>
    </tr><tr>
        <td>\n</td><td>Zastupuje nový řádek	</td><td>\r\n	</td><td>{konec řádku}</td>
    </tr><tr>
        <td>\w</td><td>Ekvivalent [a-zA-Z_0-9]	</td><td>\w+</td><td>sba34, 45, A1, fgBc…</td>
    </tr><tr>
        <td>\W</td><td>Ekvivalent [^a-zA-Z_0-9]</td><td>\W+</td><td>\, –, +, *…</td>
    </tr><tr>
        <td>\d</td><td>Ekvivalent [0-9]</td><td>\d+</td><td>753, 4, 678, 3…</td>
    </tr><tr>
        <td>\D</td><td>Ekvivalent [^0-9]</td><td>\D+</td><td>ahoj, abc, df…</td>
    </tr><tr>
        <td>\s</td><td>Zahrnuje neviditelné znaky</td></td><td></td><td>
    </tr><tr>
        <td>\S</td><td>Zahrnuje viditelné znaky</td><td>\S+</td><td>Ahoj123, asd-dgg, fb…</td>
    </tr>
</table></p>

<h4>Příklady</h4>
<h5>Telefonní číslo</h5>
<p>Jako příklad si zkuste vymyslet regulérní výraz, který ověří, zdali uživatel zadal platné telefonní číslo s předvolbou Česka (+420), tak i Slovenska (+421). Dalších 9 čísel nebudeme řešit, stačí věďět že jich je 9. Uživatel může dobrovolně oddělit mezerami trojice čísel. Číslo tedy bude ve tvaru +420 123 456 789 nebo +420 123456789 nebo třeba mohou být mezery zkombinované +421 123456 789.</p>

<p>Příklad řešení:
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">^(\+420|\+421) ?[0-9]{3} ?[0-9]{3} ?[0-9]{3}$</code>
</pre>
</p>

<h5>Datum a čas</h5>
<p>
    Uživatel nám zadá datum ve formátu dd-mm-yyyy a dobrovolně i s časem hh:mm. Uživatel u data i času může vynechat nulu. To znamená, že nemusí psát 15-02-2013 05:03 ale může jenom 15-2-2013 5:3. Uživatel nemusí vypisovat celý rok 1999, ale může jenom 99. Uživatel může do data zapsat pouze čísla v rozmezí 01 – 31. U měsíce pak 01 – 12. Rok libovolný, hodiny 0-23 a minuty 0 – 59.</p>

<p>Příklad řešení:
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">^[0-3]?[0-9]-[01]?[0-9]-[0-9]{2,4}( [0-2]?[0-9]:[0-5]?[0-9])?$</code>
</pre>
</p>
