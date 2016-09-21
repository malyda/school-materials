<h2>Vlákna - Threads</h2>
<p class="introduction">Vlákno <strong>je set instrukcí pro procesor</strong>, které je potřeba vykonat v daném pořadí.<br>
Jedna aplikace běžící v jednom procesu má <strong>minimálně jedno vlákno</strong> činného kódu.<br></p>
<h3>Problém s jedním vláknem</h3>
<p>Nevýhodou pouze jednoho vlákna na aplikaci je, že nelze v jednu chvíli zpracovávat více instrukcí. Například komprimovat soubor a zároveň aktualizovat grafické rozhraní.<br>
Tento problém řeší použití více vláken v jedné aplikaci. Jedno na kompresi a druhé pro práci s grafickým rozhraním. Výhodou tohoto přístupu je, že operační systém pozastavuje vlákna tak, aby uvolňoval prostředky počítače pro jiné procesy, popřípadě rovnoměrně zatěžoval všechna jádra procesoru. Správně napsaná aplikace využívající vícevláknový přístup může být velmi efektivní.<br>
Rozdělit do vláken je možné i jednu velkou činnost, např. zpracování obsahu souborů, a efektivně tak využít všechny prostředky HW.
</p>
<h3>Kdy použít více vláken?</h3>
<p>Pokud je možné, že během vykonávání jedné činnosti procesu, může započít jiná nezávislá činnost.<br> Například Explorer zavádí pro kopírování souborů nové vlákno, aby uživatel mohl bez ohledu na toto kopírování pracovat.<br>
Jiným důvodem je chování operačního systému, který ve většině případů aplikace, které svou činností zablokují UI vlákno, vyhodnocuje jako chybné, typicky ve Windows "aplikace neodpovídá", Android cca po 5 sec, kdy má aplikace zablokované prostředky "not responding".</p>

<p>Je dobré si uvědomit, že ve většině jednoduchých aplikací (bez vlastního enginu) jsou využívány prostředky operačního systému pro práci s grafickými prvky. Tyto zdroje jsou sdílené a jejich dlouhé blokování narušuje chod operačního systému.<br>
Platí jednoduché pravidlo "každá aplikace dostane to, o co si řekne, ale pouze na omezenou dobu".</p>
<p></p>
<p>Je důležité <strong>neplést si fyzická/virtuální vlákna procesoru s vlákny procesů</strong>.</p>
<p>Aplikační vlákna jsou implementována na straně operačního systému a fyzická/virtuální na straně procesoru.</p>
<p>Operační systémy umožňují zdánlivé zpracování více vláken v jeden čas (Multitasking) tím, že mezi jednotlivými vlákny rychle přepínají. U vícejádrových (vícevláknových) procesorů není nikdy zaručeno, že bude jedno  vlákno procesoru k dipozici jednomu vláknu procesu.<br>
</p>

<p>To je dáno tím, že implementace pořadí instrukcí, a toho co má být zpracováno, je na straně operačního systému, ve kterém běží více než jeden proces. Hlavním záměrem OS je co nejefektivněji rozprostřít využití HW prostředků počítače.</p>
<h3>Synchronizace vláken</h3>
<p>Využívání více vláken je nevýhodné z hlediska synchronizace práce každého z nich.</p>
<p>Programátor nemá jistotu, kdy bude jaké vlákno zpracováno. Je mu umožněno dávat vláknům priority a dle toho řídit pořadí.<br>
To je problém zejména tehdy, kdy pracuje více vláken se sdílenými daty (SharedData). Kvůli úspoře času procesoru se často používané hodnoty ukládají (Cachují), což nemusí být případě více vláken žádané.</p>
<p>Z hlediska nutnosti mnohem větší kontroly je dobré si předem dobře rozmyslet, kdy využít více vláken.</p>

<i>Pozn. V C# se pro vlákno aplikace používá slovo Task a Thread je jedna ze tříd v .NET, která zajišťuje vykonání Tasku.</i><br><br>
 <a class="right" href="article/threads/TaskApp.zip" download>Zdrojové kódy pro vlákna</a> <br>
  <a class="right" href="http://codingsec.net/2015/10/c-multithreading/" >Multithreading</a>

