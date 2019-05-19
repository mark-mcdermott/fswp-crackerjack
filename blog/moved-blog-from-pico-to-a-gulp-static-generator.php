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

              <h1 class="site-title"><a href="/">Fullstack Wolfpack</a></h1>
              <h2 class="tagline">Blog, tutorials and videos about full stack skills</h2>

          </div>

          <nav class="site-nav" role="region" tabindex="-1">
              <ul>

                  <li class="hidable">
                  <a class="active" href="/">Home</a>
                </li>

                  <li>
                  <a href="/blog.php">Blog</a>
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
<p>Tags, Pico,Node,Gulp,Blogging</p>
<p>Friday I built this blog in <a href="http://picocms.org/">Pico</a>, but then yesterday and today I rebuilt it using a <a href="https://github.com/antonfisher/static-blog-generator">static blog generator</a> built by Anton Fisher that I found on Github.  Pico uses markdown/Twig templates and compiles them to HTML on the server side in PHP when the page is called from a browser.  The Fisher static blog generator precompiles markdown/Nunjuck templates in Node to HTML in Gulp.  I figured I'd eliminate the server side load time, however fast it is, by preprocessing the templates to html. I'm not sure how fast PHP is compiling those Twig templates to HTML in Pico. It would be an interesting little performance benchmarking study to do at a later time.</p>
<p>Besides eliminating the server side load time, I also want a local Gulp workflow where I could have total control over how the markdown was parsed. Because I plan on making a lot of flashcards with some kind of modified markdown, I want to be able to be able to modify the markdown syntax with little hacks.</p>
      </div>

    </main>

  <footer>

    <?php
      $index = filesize('../index.php');
      $style = filesize('../style.min.css');
      $totalKb = ceil(($index + $style) / 1000 + 1);
    ?>

    <div class="container">
      <p>©2019 <a href="http://markmcdermott.io" data-external="true">Mark McDermott</a>
        <br>Built with <a href="https://github.com/mark-mcdermott/crackerjack" data-external="true">Crackerjack</a> in &lt; <?php echo $totalKb; ?> kB</p>
    </div>
  </footer>





</body></html>
