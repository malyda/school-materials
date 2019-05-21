<h2>Socket.IO</h2>
<p class="author">Jan Hála</p>
<p class="introduction"></p>

<p>
    Pomocí knihovny Socket.IO je možné vytvořit real-time komunikaci mezi zařízeními. Lze tedy napsat
    například aplikaci, která bude spustitelná v jakémkoliv webovém prohlížeči, například karetní hru
    využívající společně s knihovnou Socket.IO ještě serverový framework Node.JS.
    My si ale nyní ukážeme, jak pomocí již zmíněné knihovny a frameworku, a za využití nástroje Xamarin a balíčku
    SocketIoClientDotNet pro .NET navázat komunikaci mezi dvěma mobilními zařízeními.
</p>

<h3>Klient</h3>
<p>
    Nejprve si ve vývojovém prostředí Visual Studio vytvoříme nový projekt, jeho Code Sharing Strategy
    bude .NET Standart. Poté klikneme pravým tlačítkem na sdílenou část řešení aplikace, vybereme
    Spravovat balíčku NuGet a nainstalujeme balíček SocketIoClientDotNet. Následně do projektu
    do příslušných souborů vložíme následující kód:
</p>

<strong>MainPage.xaml</strong>
<pre class="prettyprint linenums scroll-horizontal"><code class="language-C#">&lt;StackLayout>
        &lt;StackLayout x:Name="connectionFormSL">
            &lt;Entry x:Name="yourNicknameEntry" Placeholder="Zadej svůj nickname" />
            &lt;Button Text="Připojit" Clicked="ConnectionToTheServer_Clicked" />
        &lt;/StackLayout>
        &lt;StackLayout x:Name="afterConnectionToServerSL" IsVisible="False">
            &lt;Label x:Name="yourNicknameLBL" />
            &lt;ListView x:Name="connectedUsersLV" />
        &lt;/StackLayout>
&lt;/StackLayout></code></pre>

<strong>MainPage.xaml.cs</strong>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C#">using Quobject.SocketIoClientDotNet.Client;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using Xamarin.Forms;

namespace SocketIOapp
{
	public partial class MainPage : ContentPage
	{
        public Socket SocketIOvar { get; set; }
        //pri pouziti openode hostingu tuto adresu zjistite kliknutim na nazev vaseho hostingu
        public static string ServerURL = "http://socketioexamplexamarinapp.fr.openode.io/";
        List<string> ConnectedUsers = new List<string>();
        public MainPage()
				{
					InitializeComponent();
				}

        private void ConnectionToTheServer_Clicked(object sender, EventArgs e)
        {
            connectionFormSL.IsVisible = false;
            SocketIOvar = IO.Socket(ServerURL);
            SocketIOvar.On(Socket.EVENT_CONNECT, () =>
            {
                Device.BeginInvokeOnMainThread(() =>
                {
                    afterConnectionToServerSL.IsVisible = true;
                    yourNicknameLBL.Text = yourNicknameEntry.Text;
                });

                SocketIOvar.Emit("connectToServer", yourNicknameEntry.Text);

                SocketIOvar.On("viewNewlyConnected", (newlyConnectedUser) =>
                {
                    string newUser = newlyConnectedUser.ToString();
                    Device.BeginInvokeOnMainThread(() =>
                    {
                        connectedUsersLV.ItemsSource = null;
                        ConnectedUsers.Add(newUser);
                        connectedUsersLV.ItemsSource = ConnectedUsers;
                    });
                });
            });
        }
    }
}</code></pre>

<h3>Server</h3>
<p>
    K propojení dvou a více klientů potřebujeme vytvořit server. Na server se klient vždy připojí a
    následně si od serveru například může vyžádat data o ostatních připojeních klientech apod.
    Ke komunikaci mezi více mobilními zařízeními je potřeba Node.JS hosting poskytující veřejnou
    ip adresu, k jeho vytvoření můžeme použít například OpeNode.io (https://www.openode.io/).
    Na hosting umístíme následující následující soubory:
</p>

<strong>app.json</strong>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C#">{
  "name": "socketio-server",
  "success_url": "/",
  "keywords": [
    "node",
    "express",
    "socket.io",
    "realtime",
    "websocket"
  ],
  "scripts": {
  },
  "addons": [
  ],
  "env": {
  }
}</code></pre>

<strong>index.js</strong>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C#">var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);
var port = process.env.PORT || 3000;

http.listen(port, function(){
  console.log('listening on *:' + port);
});

io.sockets.on('connection', function(socket) {

    socket.on('connectToServer', function(nickname){
        socket.username = nickname;
        var string = "Uživatel " + socket.username + " se právě připojil.";
        socket.broadcast.emit('viewNewlyConnected', string);
        console.log("viewNewlyConnected: " + string);
    });

    socket.on('disconnect', function () {
        var string = "Uživatel " + socket.username + " se právě odpojil.";
        socket.broadcast.emit('viewNewlyConnected', string);
    });
});</code></pre>

<strong>package.json</strong>
<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C#">{
  "name": "socketio-server",
  "version": "1.0",
  "dependencies": {
    "express": "^4.13.4",
    "request": "^2.83.0",
    "socket.io": "^1.4.5"
  },
  "scripts": {
    "start": "node index.js"
  }
}
</code></pre>

<p>
    Nyní můžeme sestavit a nasadit aplikaci na platformy Android a UWP. Zadáme uživatelské jméno a
    klikneme na připojit. V tu chvíli jsme připojeni na server a ten nám vždy zašle informaci ve chvíli,
    kdy se některý uživatel připojí či odpojí.
    Projekt je dostupný <a href="https://github.com/janhala/SocketIO_exampleApp">ZDE</a> na Githubu.
</p>