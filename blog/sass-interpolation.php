<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title lang="en">Fullstack Wolfpack</title>
    <meta name="description" content="test site description">
    <link href="/style.min.css" rel="stylesheet">
</head>

<body class="home">

  <!--   Mobile nav from https://codepen.io/erikterwan/pen/EVzeRP -->
  <!--
  <nav class="mobile-nav" role="navigation">
    <div id="menuToggle"> -->
      <!-- hidden checkbox, is used as click reciever for :checked --><!--
      <input type="checkbox"> -->
      <!-- spans for hamburger icon--><!--
      <span></span><span></span><span></span>
      <ul id="menu">

          <li class="hidable">
          <a class="active" href="/">Home</a>
        </li>

          <li>
          <a href="/blog.html">Blog</a>
        </li>

          <li>
          <a href="/lessons.html">Lessons</a>
        </li>

          <li>
          <a href="/flashcards.html">Flashcards</a>
        </li>

          <li class="hidable">
          <a href="/about.html">About</a>
        </li>


      </ul>
    </div>
  </nav>-->

  <header>
      <div class="container">

          <div class="site-title-wrapper">

            <p class="site-title"><a href="/">Fullstack Wolfpack</a></p>
            <p class="tagline">Blog, tutorials and videos about full stack skills</p>

          </div>

          <nav class="site-nav" role="region" tabindex="-1">
              <ul>

                  <li class="hidable">
                  <a href="/">Home</a>
                </li>

                  <li>
                  <a class="active" href="/blog.php">Blog</a>
                </li>

                <!--
                  <li>
                  <a href="/lessons.html">Lessons</a>
                </li>


                  <li>
                  <a href="/flashcards.html">Flashcards</a>
                </li>
              -->

                  <li class="hidable">
                  <a href="/about.php">About</a>
                </li>

              </ul>
          </nav>
      </div>
  </header>


  <main>

      <div class="container">

        <!--
        <nav class="left-nav">
          <p class="left-nav-header">
            <a href="/lessons.html">Lessons</a>
          </p>
            <ul>
              <li>
                <a href="/lessons/big-o.html">Big O</a>
              </li>
              <li>
                <a href="/lessons/data-structures.html">Data Structures</a>
              </li>
            </ul>
        </nav>
      -->
<h2>Sass Interpolation</h2>
<p>Excerpt:
Tags: Sass</p>
<p>Interpolation in Sass outputs the result of a Sass expression.  It is a handy feature for using Sass variables in the calc() css function. To use Sass interpolation, wrap the expression (in this case, the variable) in <code>#{ }</code>. So you could do something like <code>calc(50% - #{$width})</code>.</p>
      </div>

    </main>

  <footer>

    <div class="container">
      <p>©2019 <a href="http://markmcdermott.io" data-external="true">Mark McDermott</a>
        <br>Built with <a href="https://github.com/mark-mcdermott/crackerjack" data-external="true">Crackerjack</a> in < 7 kB</p>
    </div>
  </footer>

</body></html>