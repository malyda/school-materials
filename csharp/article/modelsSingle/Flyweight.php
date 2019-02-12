<h2> Flyweight Design Pattern</h2>
<p class="author">Marek Bastl</p>
<p class="introduction"> Flyweight je jedním ze základních návrhových vzorů programů. Patří do skupiny strukturních vzorů, které umožňují řízení počtu instancí objektů. Vzor je vhodný pro situace, kdy vzniká mnoho malých objektů, u kterých je možné podstatnou část jejich stavu sdílet nebo ho nahradit výpočtem.</p>

<h3>Smysl patternu</h3>
<table class="table-basic center-text">
    <tr class="mdl-color--primary white-text">
        <th>Nabízí</th>
    </tr>
    <tr>
        <td>Používá sdídelní pro effektivní podporu velkého množství objektů</td>
    </tr>
    <tr>
        <td>The Motif GUI strategie nahrazuje náročné widgety pomocí jednoduchých gadgetů</td>
    </tr>
</table>
<h3>Problémy</h3>
<p>Systém umožnuje navrhování objektů až na nejnižší úroveň, v tomto poskytuje značnou flexibilitu. Problém nastává v případě náročnosti na výkon a využití paměti, kde je velmi náročný.</p>


<h3>Popis</h3>
<p>Flyweight popisuje způsob, jak sdílet objekty, tak aby je bylo možné použít bez nepřiměřených nákladů. Každý objekt je rozdělen na dva stavy. Stav závislý (vnější) a stav nezávislý (vnitřní). Tento stav je uložen v objektu Flyweight při jeho volání.</p>

<h3>Ukázka</h3>
<strong>Krok 1</strong>
<p>Vytvoření abstartní Flyweight třídy Soldier.</p>
<pre class="prettyprint linenums scroll-horizontal"><code class="language-C# ">public abstract class Soldier
{
          public WeaponType Weapon{get;set;}
          public abstract void RenderSoldier(string StrPriName, string Color);
}</code>
</pre>
<strong>Krok 2</strong>
<p>Vytvoření třídy GunSoldier a SwordSoldier (zbraně).</p>
<pre class="prettyprint linenums scroll-horizontal"><code class="language-C# ">public class GunSoldier:Soldier
{
          public GunSoldier()
          {
                    this.Weapon = WeaponType.Gun;
          }
          public override void RenderSoldier(string StrPriName, string Color)
          {
                    HttpContext.Current.Response.Write("Gun Character " + StrPriName + " Rendered with "+Color+" Color");
          }
}
public class SwordSoldier:Soldier
{
          public SwordSoldier()
          {
                    this.Weapon = WeaponType.Sword;
          }
          public override void RenderSoldier(string StrPriName, string Color)
          {
                    HttpContext.Current.Response.Write("Sword Character " + StrPriName + " Rendered with " + Color + " Color");
          }
}</code>
</pre>
<strong>Krok 3</strong>
<p>Vytvoření třídy SoldierFactory.</p>
<pre class="prettyprint linenums scroll-horizontal"><code class="language-C# ">public class SoldierFactory
{
          Dictionary<string, Soldier> SoldierCollection;
          public SoldierFactory()
          {
                    SoldierCollection = new Dictionary<string, Soldier>();
          }
          public Soldier GetSoldier(string SoldierIndex)
          {
                    if(!SoldierCollection.ContainsKey(SoldierIndex))
                    {
                              HttpContext.Current.Response.Write("Objet created - ");
                              switch(SoldierIndex)
                              {
                                        case "0":
                                        SoldierCollection.Add(SoldierIndex, new GunSoldier());
                                        break;
                                        case "1":
                                        SoldierCollection.Add(SoldierIndex, new SwordSoldier());
                                        break;
                              }
                    }
                    else
                    {
                              HttpContext.Current.Response.Write("Objet reused - ");
                    }
                    return SoldierCollection[SoldierIndex];
          }
}</code>
</pre>
<strong>Krok 4</strong>
<p>Uživatelský kód</p>
<pre class="prettyprint linenums scroll-horizontal"><code class="language-C# ">this.CreateSoldier(DdlCharacterType1, TxtCharacterName1, TxtColor1);
Response.Write("<Br>");
this.CreateSoldier(DdlCharacterType2, TxtCharacterName2, TxtColor2);
Response.Write("<Br>");
this.CreateSoldier(DdlCharacterType3, TxtCharacterName3, TxtColor3);
private void CreateSoldier(DropDownList DdlCharacterType, TextBox TxtCharacterName, TextBox TxtColor)
{
          Soldier soldier = factory.GetSoldier(DdlCharacterType.SelectedValue);
          soldier.RenderSoldier(TxtCharacterName.Text,TxtColor.Text);
}</code>
</pre>

<h3>Struktura</h3>
<p>Flyweights jsou uloženy v repozitáři Factory. Klient se omezuje na vytváření Flyweights přímo a proto musí využít třídu Factory. Veškeré sdílené atributy musí být poskytnuty klientem. </p>
<h4>Class diagram</h4>
<img src="images/Flyweight.png" alt="Struktura">