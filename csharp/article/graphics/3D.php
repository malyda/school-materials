<h2>3D grafika ve WPF</h2>
<p class="author">Stanislav Zdych</p>
<p class="introduction">Windows Presentation Foundation poskytuje již v základu funkce na vytvoření určitého levelu 3D grafiky, jedná se spíše o jednoduché zobrazení objektů. </p>

<h3>Vytvoření jednoduchého objektu</h3>
<p>Aby bylo objekt možné zobrazit, je nutné nejprve vytvořit  Viewport3D, zde se bude v podstatě vkládat celá scéna. Poté se ke scéně přidá světlo a kamera, bez nich by žádný objekt nebyl vidět.</p>
<p>WPF dokáže pracovat se čtyřmi typy světel:</p>
<ul>
    <li><p>AmbientLight</p></li>
    <li><p>DirectionalLight</p></li>
    <li><p>PointLight</p></li>
    <li><p>SpotLight</p></li>
</ul>
<img alt="Rozdíl světel" src="https://i.stack.imgur.com/3udUJ.gif" />
<p>a dvěma typy kamer:</p>
<ul>
    <li><p>Perspective</p></li>
    <li><p>Orthographic</p></li>
</ul>
<img alt="Rozdíl kamer" src="https://i.stack.imgur.com/q1SNB.png"/>
<p>Prvky se normálně píší v Xaml, ale je možné je vytvářet i přímo v C#. Nejprve je tedy vytvořen kontejner Viewport3D.</p>

<pre class="prettyprint linenums scroll-horizontal">
  <code class="language-C# ">&lt;Viewport3D&gt;&lt;/Viewport3D&gt;</code></pre>

<p>Dále se je nutné přidat kameru, v tomto případě perspektivní. Určí se pozice kamery, směr kterým bude kamera zobrazovat scénu. UpDirection určuje ve které ose je strop scény.</p>

<pre class="prettyprint linenums scroll-horizontal">
  <code class="language-C# ">&lt;Viewport3D.Camera&gt;
      &lt;PerspectiveCamera
        Position="-40,40,40"
        LookDirection="40,-40,-40 "
        UpDirection="0,0,1" /&gt;
  &lt;/Viewport3D.Camera&gt;</code></pre>

<p>Nakonec je přidán samotný objekt, jenž je renderován vektory a přímé světlo.</p>

<pre class="prettyprint linenums scroll-horizontal">
  <code class="language-C# ">&lt;ModelVisual3D&gt;
      &lt;ModelVisual3D.Content&gt;
          &lt;Model3DGroup&gt;
              &lt;DirectionalLight Color="White" Direction="-1,-1,-3" /&gt;
              &lt;GeometryModel3D&gt;
                  &lt;GeometryModel3D.Geometry&gt;
                      &lt;MeshGeometry3D Positions="0,0,0 10,0,0 10,10,0 0,10,0 0,0,10
              10,0,10 10,10,10 0,10,10"
              TriangleIndices="0 1 3 1 2 3  0 4 3 4 7 3  4 6 7 4 5 6
                                  0 4 1 1 4 5  1 2 6 6 5 1  2 3 7 7 6 2"/&gt;
                  &lt;/GeometryModel3D.Geometry&gt;
                  &lt;GeometryModel3D.Material&gt;
                      &lt;DiffuseMaterial Brush="Red"/&gt;
                  &lt;/GeometryModel3D.Material&gt;
              &lt;/GeometryModel3D&gt;
          &lt;/Model3DGroup&gt;
      &lt;/ModelVisual3D.Content&gt;
  &lt;/ModelVisual3D&gt;</code></pre>

<h3>Ukázka celého kódu</h3>
<p>Tento kód zobrazí jednoduchou scénu, jenž se skládá s perspektivní kamery, přímého světla a jednoduché krychle.</p>

<pre class="prettyprint linenums scroll-horizontal">
<code class="language-C# ">&lt;Viewport3D&gt;
&lt;Viewport3D.Camera&gt;
  &lt;PerspectiveCamera Position="-40,40,40" LookDirection="40,-40,-40 "
              UpDirection="0,0,1" /&gt;
&lt;/Viewport3D.Camera&gt;
&lt;ModelVisual3D&gt;
  &lt;ModelVisual3D.Content&gt;
      &lt;Model3DGroup&gt;
          &lt;DirectionalLight Color="White" Direction="-1,-1,-3" /&gt;
          &lt;GeometryModel3D&gt;
              &lt;GeometryModel3D.Geometry&gt;
                  &lt;MeshGeometry3D Positions="0,0,0 10,0,0 10,10,0 0,10,0 0,0,10
          10,0,10 10,10,10 0,10,10"
          TriangleIndices="0 1 3 1 2 3  0 4 3 4 7 3  4 6 7 4 5 6
                              0 4 1 1 4 5  1 2 6 6 5 1  2 3 7 7 6 2"/&gt;
              &lt;/GeometryModel3D.Geometry&gt;
              &lt;GeometryModel3D.Material&gt;
                  &lt;DiffuseMaterial Brush="Red"/&gt;
              &lt;/GeometryModel3D.Material&gt;
          &lt;/GeometryModel3D&gt;
      &lt;/Model3DGroup&gt;
  &lt;/ModelVisual3D.Content&gt;
&lt;/ModelVisual3D&gt;
&lt;/Viewport3D&gt;</code>
</pre>

<p>Výsledný model</p>
<img src="images/3D.png">
<p>Pro zobrazení komplexních objektů ve formátu .obj apod. je nejlepším řešením použít nugget balíček <a href="https://github.com/helix-toolkit/helix-toolkit" target="_blank">Helix Toolkit</a>.</p>
<br>
<br>
<a href="https://github.com/Operator21/WPF3D" target="_blank">Zdrojový projekt</a>
