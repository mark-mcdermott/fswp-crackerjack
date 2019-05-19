<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title lang="en">Fullstack Wolfpack</title>
    <meta name="description" content="test site description">
    <link href="style.min.css" rel="stylesheet">
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
<p>I’m Mark McDermott, a web developer in Austin, Texas and a software engineering grad student at Texas State University. I have seven years front end web development experience. I’ve worked professionally with JavaScript, HTML, CSS, Sass, WordPress, MySQL, Git and Photoshop. In school I’ve studied C++, Python, Oracle and Bash. On my own, I’ve learned some Node, Mongo, Angular, Drupal, Django, Grunt and Bootstrap. I love hiking, running, electronic music and artichokes.</p>
<p>Here at Fullstack Wolfpack, I blog about my learnings in day to day programming work. I also write lessons and tutorials on computer science topics. A long-term goal of mine here is to present for free essentially the same information that is taught in an undergraduate computer science program. I hope to host study aid materials to assist in learning the coursework, such as online flash cards, practice problems with answers and video lessons.</p>
      </div>

    </main>

  <footer>

    <?php
      $index = filesize('index.php');
      $style = filesize('style.min.css');
      $totalKb = ceil(($index + $style) / 1000 + 1);
    ?>

    <div class="container">
      <p>©2019 <a href="http://markmcdermott.io" data-external="true">Mark McDermott</a>
        <br>Built with <a href="https://github.com/mark-mcdermott/crackerjack" data-external="true">Crackerjack</a> in &lt; <?php echo $totalKb; ?> kB</p>
    </div>
  </footer>





</body></html>
