<h2>Lokální notifikace</h2>
<p class="introduction">
    Notifikace jsou základem většiny dnešních aplikací. Následující článek popisuje vytvoření jednoduché multiplatformní a složitější Android nativní notifikace.
</p>
<h3>Multiplatformní notifikace</h3>
<p>
    Pro vytvoření multiplatformní notifikace dobře poslouží <a href="https://github.com/edsnider/Xamarin.Plugins/tree/master/Notifier">Notifier plugin</a> do Xamarin. Stačí ho přidat do všech podprojektů v Solution.
</p>
<p>
    Okamžité zobrazení notifikace, která spustí aplikaci, když na ní uživatel tapne.
</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">CrossLocalNotifications.Current.Show("You've got mail", "You have 793 unread messages!");
</code></pre>
<p>
    Metoda Show vyžaduje parametry:
    <ul>
        <li>Title</li>
        <li>Body</li>
    </ul>
</p>
<p>
    Tato notifikace slouží pouze jako infromativní, nelze do ní předat data, nebo specifikovat akci po tapnutí.
</p>

<p>
    Na Androidu lze nastavit i datum a čas, kdy se má notifikace zobrazit.
</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">CrossLocalNotifications.Current.Show("Good morning", "Time to get up!", 1, date);
</code></pre>
<p>
    Metoda Show vyžaduje parametry:
    <ul>
        <li>Title</li>
        <li>Body</li>
        <li>Id notifikace - jeho pomocí je možné plánované zobrazení notifikace zrušit, či aktualizovat obsah</li>
        <li>Date - datum a čas zobrazení notifikace</li>
    </ul>
</p>

<h3>Nativní Android notifikace</h3>
<p>
    Následující příklad ukazuje nativní vytvoření Android notifikace a předání dat aplikaci po tapnutí na notifikaci.
</p>
<p>
    Pro využití nativního kódu platformy je použit Dependendcy service
</p>

<h4>Dependency service</h4>
<h5>Interface</h5>
<p>
    Interface předepisující hlavičky metod pro okamžité zobrazení notifikace bez a včetně dat.
</p>

<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">public interface INotificationHelper
{
    void Notify(string title, string body);

    void Notify(string title, string body, Dictionary&lt;string, string> data);
}
</code></pre>

<h5>Realizace interface</h5>
<p>
    Realizace interface se nalézá v Android podprojektu. Metody Show se od sebe liší pouze vytvořením Bundle objektu, ve kterém jsou předána data.
</p>
<i>Pozn. Bundle je Android nativní třída</i>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">
using System.Collections.Generic;
using Android.App;
using Android.Content;
using Android.OS;

using LocalNotifications.Droid;
using Xamarin.Forms;
using Application = Android.App.Application;

[assembly: Dependency(typeof(NotificationHelper))]

namespace LocalNotifications.Droid
{
    public class NotificationHelper : INotificationHelper
    {
        Context _context = Application.Context;
        public const string IntentDataKey = "key";
        const int NotificationId = 0;

        public void Notify(string title, string body)
        {
            Intent intent = new Intent(_context, typeof(MainActivity));

            // Create a PendingIntent; we're only using one PendingIntent (ID = 0):
            const int pendingIntentId = 0;
            PendingIntent pendingIntent = PendingIntent.GetActivity(_context, pendingIntentId, intent,
                PendingIntentFlags.OneShot);


            // Instantiate the builder and set notification elements:

            Notification.Builder builder = new Notification.Builder(_context)
                .SetContentIntent(pendingIntent)
                .SetContentTitle(title)
                .SetContentText(body)
                .SetDefaults(NotificationDefaults.All)
                .SetSmallIcon(Resource.Drawable.abc_ic_menu_overflow_material);

            // Build the notification:
            Notification notification = builder.Build();

            // Get the notification manager:
            NotificationManager notificationManager =
                _context.GetSystemService(Context.NotificationService) as NotificationManager;


            // Publish the notification:

            notificationManager.Notify(NotificationId, notification);
        }

        public void Notify(string title, string body, Dictionary&lt;string, string> data)
        {
            Intent intent = new Intent(_context, typeof(MainActivity));

            Bundle b = new Bundle();
            foreach (var item in data)
            {
                b.PutString(item.Key, item.Value);
            }

            intent.PutExtra(IntentDataKey, b);

            // Create a PendingIntent; we're only using one PendingIntent (ID = 0):
            PendingIntent pendingIntent = PendingIntent.GetActivity(_context, NotificationId, intent,
                PendingIntentFlags.OneShot);


            // Instantiate the builder and set notification elements:

            Notification.Builder builder = new Notification.Builder(_context)
                .SetContentIntent(pendingIntent)
                .SetContentTitle(title)
                .SetContentText(body)
                .SetDefaults(NotificationDefaults.All)
                .SetSmallIcon(Resource.Drawable.abc_ic_menu_overflow_material);

            // builder.SetWhen(Java.Lang.JavaSystem.CurrentTimeMillis());
            // Build the notification:
            Notification notification = builder.Build();

            // Get the notification manager:
            NotificationManager notificationManager =
                _context.GetSystemService(Context.NotificationService) as NotificationManager;


            // Publish the notification:

            notificationManager.Notify(NotificationId, notification);
        }
    }
</code></pre>
<a href="https://developer.xamarin.com/guides/android/application_fundamentals/notifications/local_notifications_in_android/">Rozšířený článek o tvorbě Android nativních notifikací v Xamarin</a><p></p>
<a href="https://developer.android.com/guide/topics/ui/notifiers/notifications.html">Java Android notifikace</a>

<h4>Zpracování dat z notifikace</h4>
<p>
    Xamarin Forms běží na platformě Android v jedné Activity, proto se při tvorbě notifikace nemusí žádná specifikovat. Jednoduše je spuštěna aplikace. Co ale dělat ve chvíli, kdy chceme předat s notifikací data a podle nich poté upravit chování aplikace?
</p>
<p>
    Výše zmíněná realizace interface využívá C# třídy Dictionary přenos dat v PCL. Instance této třídy je změněna na Bundle objekt, který se nativně v Androidu používá pro přenos jednoduchých dat v aplikaci. Tento objekt je zpracován ve třídě MainActivity, kde je zpracována hned po zapnutí aplikace.
</p>
<p>
    Třída MainActivity, která po vytvoření kontroluje, zda jí byl předán Bundle objekt např. z notifikace a podle něj zobrazí novou ReceiverPage, kam přepošle data.
</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">[Activity(Label = "LocalNotifications", Icon = "@drawable/icon", Theme = "@style/MainTheme", MainLauncher = true, ConfigurationChanges = ConfigChanges.ScreenSize | ConfigChanges.Orientation)]
public class MainActivity : FormsAppCompatActivity
{
    protected override void OnCreate(Bundle bundle)
    {
        TabLayoutResource = Resource.Layout.Tabbar;
        ToolbarResource = Resource.Layout.Toolbar;

        base.OnCreate(bundle);

        global::Xamarin.Forms.Forms.Init(this, bundle);
        LoadApplication(new App());


        if (Intent.HasExtra(NotificationHelper.IntentDataKey))
        {
            ProcessNotificationData();
        }
    }


    public void ProcessNotificationData()
    {

        // Get data from notification as Bundle object
        Bundle bundleFromNotification = Intent.Extras.GetBundle(NotificationHelper.IntentDataKey);

        Dictionary&lt;string, string> data = new Dictionary&lt;string, string>();

        // Copy data from bundle to Dictionary
        foreach (var key in bundleFromNotification.KeySet())
        {
            data.Add(key, bundleFromNotification.GetString(key));
        }

        // Replace actual Page with ReceiverPage and pass data
        Xamarin.Forms.Application.Current.MainPage = new ReceiverPage(data);
    }
}
</code></pre>
<p>
    ReceiverPage
</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">public class ReceiverPage : ContentPage
{
    ListView _listView = new ListView();

    public ReceiverPage()
    {
        Content = new StackLayout
        {
            Children = {
                new Label { Text = "Hello Page" }
            }
        };
    }

    public ReceiverPage(Dictionary&lt;string, string> data)
    {

        Content = new StackLayout
        {
            Children = {
                new Label { Text = "Data from notification" },
                _listView
            }
        };
        _listView.ItemsSource = data;
    }
}
</code></pre>
<h4>Použití notifikace v PCL</h4>
<p>
    Samotné použití je po složitější implementaci je stejně jednoduché jako v případě nuget balíčku.
</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# "> DependencyService.Get&lt;INotificationHelper>().Notify("title","body");
</code></pre>
<p>
    V případě předání dat je použití následující
</p>
<p>
    Příprava dat jako slovník.
</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">Dictionary&lt;string, string> data = new Dictionary&lt;string, string>();
data.Add("data1", "value");
data.Add("data2", "value2");
</code></pre>
<p>
    Použití
</p>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">DependencyService.Get&lt;INotificationHelper>().Notify("title","body",data);
</code></pre>
<a href="https://github.com/malyda/Xamarin-LocalNotifications">Celý vzorový projekt</a>