<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title lang="en">Fullstack Wolfpack</title>
    <meta name="description" content="test site description">
    <link rel="icon" href="/images/favicon/favicon-32.png" sizes="32x32">
    <link rel="icon" href="/images/favicon/favicon-128.png" sizes="128x128">
    <link rel="icon" href="/images/favicon/favicon-192.png" sizes="192x192">
    <link rel="apple-touch-icon" href="/images/favicon/favicon-120.png" sizes="120x120">
    <link rel="apple-touch-icon" href="path/to/favicon-152.png" sizes="152x152">
    <link rel="apple-touch-icon" href="path/to/favicon-180.png" sizes="180x180">
    <meta name="msapplication-TileColor" content="#fefefe"/>
    <meta name="msapplication-square70x70logo" content="favicon-128.png"/>
    <meta name="msapplication-square150x150logo" content="favicon-270.png"/>
    <meta name="msapplication-TileImage" content="favicon-270.png"/>
    <meta name="msapplication-config" content="none"/>
    <link href="/style.min.css" rel="stylesheet">
</head>

<body class="home">

  <!--   Mobile nav from https://codepen.io/erikterwan/pen/EVzeRP -->

  <nav class="mobile-nav" role="navigation">
    <div id="menuToggle">
      <!-- hidden checkbox, is used as click reciever for :checked -->
      <input type="checkbox">
      <!-- spans for hamburger icon-->
      <div class="burger">
        <span></span><span></span><span></span>
      </div>
      <ul id="menu">

          <li class="hidable">
          <a class="active" href="/">Home</a>
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
    </div>
  </nav>

  <header>
      <div class="container">

          <div class="site-title-wrapper" id="logo-wrapper">

            <p class="site-title"><a href="/">Fullstack Wolfpack</a></p>
            <p class="tagline">Blog about full stack programming skills</p>
            <!-- <p class="tagline">Blog, tutorials and videos about full stack skills</p> -->

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

                  <li>
                  <a href="/about.php">About</a>
                </li>

                <!--
                <li class="hidable">
                  <a href="/frontend-embed.php">Frontend Embed</a>
                </li>

                <li class="hidable">
                  <a href="/backend-embed.php">Backend Embed</a>
                </li>
                -->

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
<h2>Software engineering: when it absolutely, positively has to be done right the first time</h2>
<p class="date">2/13/19  by Mark McDermott</p>
In my software engineering program, we talk a lot about mission critical projects.  Software needs to be really engineered and architected when in those cases when there can't be any mistakes when the code first goes into production&mdash;the code for space rockets, the code for military applications. No one dies when Facebook goes down for a minute, but when there's a divide by zero error in a manned rocket, results can be catastrophic.  It reminds me of that FedEx commercial&mdash;"When it absolutely, positively", must be done right the first time.
<div class="videoWrapper"><iframe width="560" height="315" src="https://www.youtube.com/embed/YboNZ73BJRE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
<p>Hallmarks of good software engineering are planning, prototyping, testing, iterative development. How to reduce the number of bugs introduced in code? Test it, plan it and write it carefully.  Once introduced, it's much more time consuming to remove the bug that to have slowed down and not introduced it in the first place.</p>
      </div>

    </main>

  <footer>

    <div class="container">
      <p>©2019 <a href="http://markmcdermott.io" data-external="true">Mark McDermott</a>
        <br>Built with <a href="https://github.com/mark-mcdermott/crackerjack" data-external="true">Crackerjack</a> in < 36 kB</p>
    </div>
  </footer>

</body>

<script>
  window.onload= function() {

      var logo = document.getElementById('logo-wrapper');
      logo.addEventListener('click', function(e) {
        var url = this.querySelector('a').href;
        window.location = url;
        e.preventDefault();
      });


      // .click(function(e){
      //   var link = this.querySelector('a')[0].href;
      //   console.log(link);
      // });
  };
</script>

</html>
