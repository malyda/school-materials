using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Arrays
{
    class Program
    {
       static int[] array = new int[50];
        static int[] arrays = new int[50];
        static void Main(string[] args)
        {
            /// Vícerozměrná pole + řadící algoritmy
            int[] ciselnePole = new int[32];
            ciselnePole[0] = 5;
            ciselnePole[10] = 500+10;
            ciselnePole[30] = ciselnePole[10] - ciselnePole[0];
            for (int i = 0; i < ciselnePole.Length; i++) ciselnePole[i] = i;

           // foreach (int prvek in ciselnePole) Console.WriteLine(prvek);

            String[] stringovePole = new String[50];
     
            bool[] boolPole = new bool[90];
            long[] longPole = new long[150];
            char[] charPole = new char[5];


            int[,] dvojrozmernePole = new int[3, 3];
            dvojrozmernePole[0, 2] = 5;
            Console.WriteLine("Vypis dvojrozmerneho pole");
            for (int i = 0; i < dvojrozmernePole.GetLength(0); i ++)
            {
                for( int f = 0; f <dvojrozmernePole.GetLength(1); f++)
                {
                    Console.Write(dvojrozmernePole[i, f]);
                }
                Console.WriteLine();
            }
            
            int[,,,] ctyrrozmernePole = new int[5, 10, 3, 8];
            // Iterace 1. dimenze
            for(int i = 0; i< ctyrrozmernePole.GetLength(0); i++)
            {
                // Iterace 2. dimenze
                for (int j = 0; j < ctyrrozmernePole.GetLength(1); j++)
                {
                    // Iterace 3. dimenze
                    for (int g = 0; g < ctyrrozmernePole.GetLength(2); g++)
                    {
                        // Iterace 4. dimenze
                        for (int h = 0; h < ctyrrozmernePole.GetLength(3); h++)
                        {
                            ctyrrozmernePole[i, j, g, h] = h;
                        }
                    }
                }
            }
            // Vypis ctyrrozmerneho pole
            //foreach (int one in ctyrrozmernePole) Console.WriteLine(one);

            Random r = new Random();
            r.Next();
            array = new int[50];
            for (int i = array.Length-1; i > 0; i--) array[i] = r.Next();

            foreach (int one in array) Console.WriteLine(one);

            /** Bubble sort **/

            // Proved pro cele pole
            for (int i = 0; i < array.Length-1; i++)
            {
                // Proved pro cele pole - pocet serazenych
                for(int j = 0; j < array.Length - i - 1; j++)
                {
                    // Radime vzesupne
                    if(array[j+1] < array[j])
                    {
                        // Zamena prvku
                        int temp = array[j];
                        array[j] = array[j + 1];
                        array[j + 1] = temp;
                    }
                }
            }
        
            /** Selection sort **/

            // Proved pro cele pole
            for(int i = 0; i < array.Length-1; i ++)
            {
                // Urci pivot
                int pivot = i;

                // Pro cele pole od prvku urceny jako pivot
                for(int j = i+1; j < array.Length; j ++)
                {
                    // Najdi prvek vetsi nez pivot a urci ho jako novy pivot
                    if (array[j] > array[pivot]) pivot = j;
                }
                // Zamena posledniho pivota s prvnim pivotem
                int temp = array[pivot];
                array[pivot] = array[i];
                array[i] = temp;
            }

            /** Insertion sort **/

            //Proved pro cele pole
            for(int i = 0;  i< array.Length-1; i++)
            {
                // Pozice pivotu
                int j = i + 1;
                // Urci hodnotu pivotu
                int pivot = array[j];
                
                //Dokud nejsme na zacatku pole a pivot je vetsi nez aktualni prvek v setridenem poli
                while(j > 0 && pivot > array[j - 1])
                {
                    // Posuneme dany prvek o jedno misto doprava
                    array[j] = array[j - 1];
                    // Posuneme se o dalsi prvek dal
                    j--;
                }
                // While skoncil bud na zacatku pole, nebo pred prvnim prvkem, ktery nesplnil podminku
                // V obou pripadech vytvoril potrebne misto, na ktere umisti pivot
                array[j] = pivot;
            }

            /** Quick sort **/

            // Zavolání rekurzivní verze QuickSortu
            // Při prvním zavolání jsou vytyčeny hranice celého pole
            QuickSort(arrays, 0, arrays.Length - 1);
            foreach (int one in arrays) Console.WriteLine(one);

        }
        /// <summary>
        /// Rozdělí pole na dvě části, seřadí je a celou proceduru opakuje
        /// </summary>
        /// <param name="arr">Pole k seřazení</param>
        /// <param name="left">Začátek části pole</param>
        /// <param name="right">Konec části pole</param>
        public static void QuickSort(int[] arr, int left, int right)
        {
            // Rekurze se zastaví pokud je začátek a konec pole stejný => jednoprvková nebo prázdná pole
            if (left < right)
            {
                // Rozdělení pole na dvě části a získání pivota
                int partitionIndex = Partition(arr, left, right);
               
                // Opakování pro obě části pole => rekurze
                QuickSort(arr, left, partitionIndex - 1);
                QuickSort(arr, partitionIndex + 1, right);
            }
        }

        /// <summary>
        /// Určí pivot, podle něj rozdělí pole na dvě části
        /// </summary>
        /// <param name="arr">Pole k seřazení</param>
        /// <param name="left">Začátek části pole - index</param>
        /// <param name="right">Konec části pole - index</param>
        /// <returns>Vrací pozici pivota</returns>
        private static int Partition(int[] arr, int left, int right)
        {
            // Pivo je poslední prveks
            int pivot = arr[right];
            int temp;
            // Začátek pole
            int i = left;
            // Pro celou část pole
            for (int j = left; j < right; j++)
            {
                // Porovnání hodnoty s pivotem
                if (arr[j] <= pivot)
                {
                    // Pokud je prvek menší než pivot, tak je vymění
                    temp = arr[j];
                    arr[j] = arr[i];
                    arr[i] = temp;
                    i++;
                }
            }
            arr[right] = arr[i];
            arr[i] = pivot;
            return i;
        }
        /// <summary>
        /// MergeSort
        /// </summary>
        /// <param name="list"></param>
        // Rozdělení polí
        public static void merge_sort(int[] list)
        {
            if (list.Length <= 1) return; // Ukončení rekurze
            int center = list.Length / 2; // Zjištění středu pole, kvůli určení poloviny
            int[] left = new int[center]; // deklarace a inicializace levé větve
            for (int i = 0; i < center; i++) left[i] = list[i];
            int[] right = new int[list.Length - center]; // deklarace a inicializace pravé větve
            for (int i = center; i < list.Length; i++) right[i - center] = list[i];
            merge_sort(left); // rekurzivni rozdělení polí na další poloviny
            merge_sort(right);
            merge(list, left, right); // sliti rozdělených polí
        }
        // Slití dvou polí do jednoho
        // Parametry levá a pravá větev a celé pole, do kterého se dosadí slité pole
        public static void merge(int[] list, int[] left, int[] right)
        {
            // Indexy pro obě pole
            int i = 0; // index pro 1. pole
            int j = 0; // index pro 2. pole
                       // Dokud neprojde jedno celé pole
            while ((i < left.Length) && (j < right.Length))
            {
                // Vybrání menšího prvku, jeho dosazení do pole, posunutí indexu
                if (left[i] < right[j])
                {
                    list[i + j] = left[i];
                    i++;
                }
                else
                {
                    list[i + j] = right[j];
                    j++;
                }
            }
            // Zbytek z druhého pole přidáme za 1. seřazené pole
            if (i < left.Length)// identifikace levé větve pole
            {
                while (i < left.Length)
                {
                    list[i + j] = left[i];
                    i++;
                }
            }
            else // práce jen s pravou větví pole
            {
                while (j < right.Length)
                {
                    list[i + j] = right[j];
                    j++;
                }
            }
        }

        /** Heap sort
        * řazení haldou (vzestupně)
        * @param array pole k serazení
        */
        public static void Heapsort(int[] array)
        {
            // Pro všechny rodiče
            for (int i = array.Length / 2 - 1; i >= 0; i--)
            {
                // Oprav Haldu, aby splňovala své vlastnosti
                RepairTop(array, array.Length - 1, i);
            }
            // Pro všechny prvky v haldě
            for (int i = array.Length - 1; i > 0; i--)
            {
                // Zaměň root s vybraným prvkem, root umísti na vhodnou pozici
                int tmp = array[i];
                array[i] = array[0];
                array[0] = tmp;

                // Oprav haldu, po umístění posledního prvku jako root
                RepairTop(array, i - 1, 0);
            }
        }
        /**
        * Opravuje haldu tak, aby byl rodič vždy větší, či stejný jako potomek
        * @param bottom - posledni index nesetrizeneho pole
        * @param topIndex -aktuálně kontrolovaný rodič
        */
        private static void RepairTop(int[] array, int bottom, int topIndex)
        {
            // Zapamatuj si aktuálního rodiče
            int tmp = array[topIndex];
            // Zjisti 1. potomka
            int succ = topIndex * 2 + 1;
            // Je potomek ještě v nesetřízeném poli a je větší než jeho sourozenec?
            if (succ < bottom && array[succ] > array[succ + 1]) succ++; // Místo rodiče dosazujeme vždy většího z potomků
            // Dokud není konec haldy a větší z potomků je i větší než otec, tak je vymění
            // Opakujeme pro všechny potomky, aby se halda opravila
            while (succ <= bottom && tmp > array[succ])
            {
                array[topIndex] = array[succ];
                topIndex = succ;
                // Posune ukazatel na 1. potomka dalšího rodiče
                succ = succ* 2 + 1;
                // Opět porovná oba potomky
                if (succ < bottom && array[succ]> array[succ + 1]) succ++;
            }
            // Umístí na správné místo prvek, kvůli kterému se halda opravuje
            array[topIndex] = tmp;
        }
    }
}

