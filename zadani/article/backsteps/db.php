<h2>Opakování práce s databází</h2>
<h3>Základní práce s databází</h3>
    <h4>Evidence</h4>
    <p>
        Realizujte aplikaci, která eviduje osoby. Umí je vypisovat, editovat, mazat a přidávat nové.
    </p>
    <p>
        U každé osoby je evidováno:
    </p>
    <ul>
        <li>Jméno</li>
        <li>Přijmení</li>
        <li>Rodné číslo</li>
        <li>Pohlaví (0/1)</li>
    </ul>

    <h4>Prohledávání</h4>
    <p>
        Relizujte aplikaci, která pracuje s informacemi o automobilech. Informace jsou v databázi zaspány "natvrdo".
    </p>
    <p>Aplikace má následující funkcionalitu:</p>
    <ol>
        <li>
            <p>
                Vyhledává automobily dle kompletního <a href="https://cs.wikipedia.org/wiki/Identifika%C4%8Dn%C3%AD_%C4%8D%C3%ADslo_vozidla">VIN</a> kódu.

            </p>
        </li>
        <li>
            <p>
                Vyhledává dle části názvu modelu vozidla např. Fa -> Fabia, Favorit
            </p>
        </li>
        <li>
            <p>
                Zobrazuje uživateli formulář, kde je možné vyplnit informace o vozidle, dle tohoto formuláře aplikace vypíše všechna vozidla splňující zadání.
            </p>
        </li>
        <li>
            <p>
                Zobrazuje uživateli dva slidery, dle kterých jsou vyhledávána vozidla:
            </p>
            <ol>
                <li>Pro cenu vozidla</li>
                <li>Pro počet najetých kilomentrů</li>
            </ol>
        </li>
    </ol>

    <h4>Vazební tabulky</h4>
    <p>
        Relizujte aplikaci, která umí evidovat hudební interprety a k jakému hudebnímu žánru patří.
    </p>
    <p>
        Jedná se o vazbu M:N -> hudební interpret může patřit k více žánrům, hudební žánr může mít více hudebních interpretů.
    </p>
    <p>
        Aplikace vypisuje hudební interprety a k nim štítky s informací, do kterého žánru patří. Po kliknutí na štítek se uživateli zobrazí informace o hudebním žánru a všichni evidovaní interpreti patřící k tomuto žánru.
    </p>
    <p>
        Do aplikace je možné přidávat nové hudební interprety a žánry.
    </p>

    <h4>Vazební tabulky - kombinace</h4>
    <p>
        Aplikace eviduje pobočky obchodního řetězce. V každé pobočce jsou evidováni zaměstnanci, každý zaměstnanec má na starost jedno a více oddělení. Jedno oddělení může mít na starost více zaměstnanců.
    </p>

    <p>
        Např. Tesco -> Tesco Prosek -> zaměstnanci Adam Novák a Jan Liška mají na starost oddělení s oblečením.
    </p>
    <p>
        Aplikace zobrazuje seznam poboček. Po kliknutí na pobočku jsou zobrazeny její oddělení. Po kliknutí na oddělení je zobrazen seznam zaměstnancům na oddělení přidělených.
    </p>
    <p>
        Aplikace umožňuje přidělování a odebírání oddělení jednotlivým zaměstnancům.
    </p>


