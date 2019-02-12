<h2>WPF - DATA BINDING</h2>
<p class="author">Matěj Černý</p>
<p class="introduction">
    Samotný XAML obsahuje několik dílčích technologií, které slouží pro úpravu vzhledu, reakci na události a nyní si řekneme něco o technologii Data Binding, která slouží pro práci s daty.<br>
</p>


<p>
    <strong>Příklad:</strong><br>
    Vytvořená textová pole, ve kterých je vložený text do TextBoxu.<br>
</p>
<pre  class="prettyprint linenums scroll-horizontal"><code  class="language-C# ">&lt;StackPanel&gt;
    <i style="color: gray">&lt;!-- Zdroj --&gt;</i>
	&lt;TextBox Name="mySource" Text="muj text" /&gt;
	<i style="color: gray">&lt;!-- 1. TextBlock --&gt;</i>
	&lt;TextBlock&gt;
	  &lt;TextBlock.Text&gt;
		&lt;Binding ElementName="mySource" Path="Text" /&gt;
	  &lt;/TextBlock.Text&gt;
	&lt;/TextBlock&gt;
	<i style="color: gray">&lt;!-- 2. TextBlock --&gt;</i>
	&lt;TextBlock Text="{Binding ElementName=mySource, Path=Text}" /&gt;
&lt;/StackPanel&gt;</code></pre>

<p>Pozn.
    <i> dejte si pozor na rozlišování Text<strong>Boxu</strong> a Text<strong>Blocku.</strong> TextBox slouží pro zadávání textu do pole a oproti tomu TextBlock text pouze zobrazuje.</i>
</p>

<p>
    Data Binding se stará o provázání dat z textových bloků a TextBoxů, které slouží jako zdroj. To znamená, že text, který se zadá do TextBoxu se ihned zobrazí i v textových blocích.
</p>

<p>
<ul>
    <li>kvůli přístupu k vlastnostem TexBoxu, jsme si ho pojmenovali jako "mySource"</li>
    <li>oproti tomu, druhým způsobem je nabindování hodnoty <i>Text</i> v TextBlocku.<br>
        Druhý způsob je ekvivaletní prvnímu způsobu s tím rozdílem, že je kratší.
    </li>
    <ul>
        <li>ElementName - je jméno elementu, johož vlastnost chceme použít při bindování</li>
        <li>Path - název vlastnosti
    </ul>
</ul>
</p>

<p>Pozn.
    <i> Pro bindování se používá pouze kratší způsob (z důvodu přehlednosti a rychlosti), proto už budeme pokračovat jen pomocí kratšího způsobu.</i>
</p>

<p>
    Chování TextBlock elemtntů: po jakékoli změně textu v TextBoxu se změna automaticky a okamžitě projeví i v nabindovaných vlastnostech v závislosti na zdrojové hodnotě.
</p>

<p>
    <strong>Příklad:</strong><br>
    Vytvořili jsme si dva TexBoxy.<br>
    První slouží jako zdrojová hodnota pro druhý TexBox a druhý si od něj tuto hodnotu přebírá.<br>
</p>
<pre  class="prettyprint linenums scroll-horizontal"><code  class="language-C# ">&lt;StackPanel&gt;
    <i style="color: gray">&lt;!-- Zdroj --&gt;</i>
	&lt;TextBox Name="myTextBoxSource" Text="prvni textbox" /&gt;
	<i style="color: gray">&lt;!-- Bindovani --&gt;</i>
	&lt;TextBox Text="{Binding ElementName=myTextBoxSource, Path=Text}" /&gt;
&lt;/StackPanel&gt;</code></pre>

<p>
    Na tomto příkladu jsme si ukázali, že pokud uděláme změnu v první TexBoxu, změna se projeví i v TextBoxu druhém. Projeví se změna ve zdroji, změníme li nabindovanou hodnotu? Ano.
</p>

<p>
    Bindování je tedy implicitně obousměrná synchronizace hodnot.
</p>

<p>Pozn.
    <i> Při změně zdrojové hodnoty dojde k okamžité změně i v nabindované hodnotě. Změníme-li ale nabidnovanou hodnotu, zdrojová hodnota se změní až po tzv. "LostFocus", což znamená, že přestane být aktivní.</i>
</p>

<h3>DALŠÍ ATRIBUTY</h3>
<p>K ovlivnění chování bindování se používají tyto atributy:</p>
<p>
    <strong>Mode</strong> - způsob synchronizace hodnot
<ul>
    <li>Mode = TwoWay* - hodnoty jsou synchronizovány obousměrně</li>
    <li>Mode = OneWay - hodnoty jsou synchronizovány pouze ze zdroje do nabindované vlastnosti</li>
    <li>Mode = OneTime - hodnoty jsou synchronizovány pouze po startu, po té už žádné změny neproběhnou</li>
</ul>
</p>

<p>
    <strong>UpdateSourceTrigger</strong> - tento atribut slouží pro určení v jakou chvíli se zdrojová hodnota aktualizuje
<ul>
    <li>UpdateSourceTrigger = Excplicit - k synchronizaci dojde pouze pokud zavoláme metodu UpdateSource</li>
    <li>UpdateSourceTrigger = LostFocus* - zdrojová hodnota se aktualizuje jakmile nabindovaná kontrola přestane být "aktivní" (LostFocus)</li>
    <li>UpdateSourceTrigger = PropertyChanged	- k aktualizaci zdrojové hodnoty dojde okamžitě jakmile je nabindovaná hodnota změněna</li>
</ul>
<i>* = defaulní nastavení</i>
</p>

<h3>BINDOVÁNÍ UŽIVATELSKÝCH OBJEKTŮ</h3>
<p>
    <strong>Příklad:</strong><br>
    Třída s vlastnostmi Jmeno a Prijmeni. Vytvořili jsme aplikaci se dvěma TextBoxy, které po kliknutí nastaví hodnotu.
</p>
<pre  class="prettyprint linenums scroll-horizontal"><code  class="language-C# ">objekt.Jmeno = "Jan"
objekt.Prijmeni = "Novak"</code></pre>

<p>
    <strong>Třída</strong>
</p>
<pre  class="prettyprint linenums scroll-horizontal"><code>public class UserInfoClass
{
  private string jmeno = string.Empty;
  private string prijmeni = string.Empty;
   public string Jmeno
  {
	  get { return jmeno; }
	  set { jmeno = value; }
  }

  public string Prijmeni
  {
	  get { return prijmeni; }
	  set { prijmeni = value; }
  }
}</code></pre>

<p>
    Abychom v XAMLu mohli bindovat na vlastnosti uživatelského objektu, musí být třída objektu poděděna od interface INotifyPropertyChanged - to umožní avizovat změny v hodnotách vlastností.
</p>

<p>
    <strong>Jakým způsobem se v XAMLu přistupuje k objektu?</strong> Nejjednodušším způsobem je vložení tohoto objektu do vlastnosti DataContext některého z kmenových elementů. DataContext slouží pro určení defaultního zdroje při bindování dat.
</p>

<p>
    Window1.xaml
</p>

<pre <pre  class="prettyprint linenums scroll-horizontal"><code>&lt;StackPanel Name="myStackPanel"&gt;
    &lt;TextBox Text="{Binding Path=Jmeno}" /&gt;
    &lt;TextBox Text="{Binding Path=Prijmeni}" /&gt;
    &lt;Button Click="Fill"&gt;Vyplnit&lt;/Button&gt;
&lt;/StackPanel&gt;</code></pre>

<p>
    Window1.xaml.cs
</p>

<pre  class="prettyprint linenums scroll-horizontal"><code>using System;
using System.Windows;
using System.ComponentModel;

namespace DataBinding
{
    public partial class Window1 : System.Windows.Window
    {
        UserInfoClass user;
        public Window1()
        {
            InitializeComponent();

            user = new UserInfoClass();
            myStackPanel.DataContext = user;
        }

        void Fill(object sender, RoutedEventArgs e)
        {
            user.Jmeno = "Jan";
            user.Prijmeni = "Novak";
        }

        public class UserInfoClass : INotifyPropertyChanged
        {
            public event PropertyChangedEventHandler PropertyChanged;
            private void NotifyPropertyChanged(string info)
            {
                if (PropertyChanged != null)
                        PropertyChanged(this, new PropertyChangedEventArgs(info));
            }

            private string jmeno = "jméno";
            private string prijmeni = "příjmení";

            public string Jmeno
            {
                get { return jmeno; }
                set { jmeno = value; NotifyPropertyChanged("Jmeno"); }
            }

            public string Prijmeni
            {
                get { return prijmeni; }
                set { prijmeni = value; NotifyPropertyChanged("Prijmeni"); }
            }
      }
} </code></pre>

<p>
<ul>
    <li>vložili jsme System.ComponentModel namespace, ve kterém se nachází interface INotifyPropertyChanged</li>
    <li>abychom mohli vlastnosti objektu bindovat, podědili jsme třídu UserInfoClass jsme od rozhraní INotifyPropertyChanged</li>
    <li>vytvořili jsme událost PropertyChanged a metodu NotifyPropertyChanged, která tuto událost volá</li>
    <li>metodu NotifyPropertyChanged voláme vždy, když se změní hodnota některé z vlastností (jako parametr je uveden název vlastnosti)</li>
    <li>po kliknutí na tlačítko "Vyplnit" se zavolá metoda Fill, která změní hodnoty objektu user</li>
</ul>
</p>

<p>
    <strong>Jak se aplikace chová?</strong>
<ul>
    <li>změna hodnoty v objektu => změna se projeví v TextBoxech</li>
    <li>změna hodnoty v TextBoxu => hodnota se změní v objektu</li>
    <li>kliknutí na tlačítko "Vyplnit" => změní se hodnoty vlastností objektu ⇒ změní se hodnoty v TextBoxech</li>
</ul>
</p>

<p>
    Dalo by se říct, že Data Binding svazuje vlastnosti k sobě. Změna v jedné z vlastností se provede i v té drůhé a to platí obousměrně.<br>
    Bez Data Bindingu by se dalo obejít, ale je to zjednodušená varianta programově volaných metod, které v XAML použít nejdou a proto máme k dispozici Data Binding.
</>
