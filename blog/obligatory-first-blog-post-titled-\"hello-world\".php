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
<h2>Obligatory First Blog Post Titled \"Hello World\"</h2>
<p>I once had a Computer Architecture professor who said if your first program in any programming language you're learning isn't the classic Hello World program, you're destined to have lots of bad luck forever in learning the language.</p>
<p>I've been meaning to make a programming blog for awhile. Sijin Joseph has a good chart that shows how mature a software developer you are and one of the landmarks is that you have your own blog and make posts with your findings and learnings. I used to maintain a javascript/html tutorial site with text posts and youtube vids and found it to be a great experience, but I've never found the time to do a regular programming blog until now.</p>
<p>I'm in one of those transition points in my career—yesterday was my last day at Charles Schwab and I start a six month contract at Kasasa Monday. I've been studying up for those hard whiteboarding interviews with data structures and reversing binary trees and all that. A blog and tutorial site would be a good place for me to keep my thoughts and it might benefit others learning the same stuff.</p>
<p>Doing the prerequisite classes for my Texas State Software Engineering masters, I found it surprisingly hard to find free resources that map out the entire computer science undergrad program online for free. There are tons of online tutorial sites now, but they are a little more generic than what I'm talking about. I feel like the CS undergrad curriculum is pretty standardized at this point (C++/Java, data structures, architecture, compilers, algorithms, etc). Textbooks are so expensive and sites like Khan Academy don't really have a full CS program yet. Also sites like Khan Academy don't really have all the assignments (even CS assignments are fairly standardized, I think) and never seem to have enough test problems to really know you grasp the material 100% and have it nailed down in your head. One of my long-term goals with this site is to offer the free, online equivalent to the material presented in an undergrad CS program. Or at least to approximate it.</p>
<p>Why choose Pico for the CMS for this? Trying to keep it simple. I've never messed with Pico before, but WordPress sites load a little slower than necessary sometimes. I thought it would be nice to skip the database access time. Pico looks pretty slim and I can probably slim it down some more even.</p>
      </div>

    </main>

  <footer>

    <div class="container">
      <p>©2019 <a href="http://markmcdermott.io" data-external="true">Mark McDermott</a>
        <br>Built with <a href="https://github.com/mark-mcdermott/crackerjack" data-external="true">Crackerjack</a> in < 8 kB</p>
    </div>
  </footer>

</body></html>
