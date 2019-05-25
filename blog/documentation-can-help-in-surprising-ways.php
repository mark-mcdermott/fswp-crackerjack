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
<h2>Documentation can help in surprising ways</h2>
<p class="date">2/12/19  by Mark McDermott</p>
<p>I had the funny experience today of benefitting myself from onboarding documentation I'd written years earlier.  This week I started back at Kasasa, where I'd worked for four years previously, ending two years ago.  Trying to relearn the systems today, I opened up the onboarding documentation and part way through reading it, I realised I'd written it. I wrote it to help other new folks at the time, but it was a real lifesaver today. Goes to show how much documentation can really help!</p>
<p>Documentation is an essential part of the software development. In extreme cases lack of documentation can render a system essentially useless if the developers who built it move on to other jobs. Lack of onboarding documentation can waste weeks or years of developer and company time as developers struggle to learn without instructions. Documentation can come in different forms and it does not necessarily have to be a monumental effort which stops all other work.</p>
<p>In the age of agile, documentation is downplayed and correctly so.  In reality it's likely that few developers are going to sit down and read a huge book or binder of the new system they're introduced to. So writing that massive tome can be a huge waste of resources. But documentation still has its proper place. Well documented code, well written internal wikis and onboarding material can be extremely helpful. Automatic documentation generators can be use to document code as it's written.</p>
<p>The opposite of documentation is "tribal knowledge", which is passed down verbally from one developer on a team to another.  While it saves the time of documenting it, it can tend towards dysfunctional teams and companies because keeping the older developers on the team from leaving becomes essential to the company's success.  The <a href="https://en.wikipedia.org/wiki/Capability_Maturity_Model">Capbility Maturity Model</a> from '93, which is now not quite as groundbreaking as it was then, discusses documentation as a way to mitigate team chaos and to ensure a team or company can repeat a success once they have one. CMMI <a href="https://resources.sei.cmu.edu/asset_files/Webinar/2008_018_101_22184.pdf">can pair with agile</a>. I'm not advocating for whole-hog CMMI adoption, but I do think documentation, while correctly not a primary focus in software development anymore, still has an important role.  And who knows, you could be the one that benefits from your own documentation.</p>
      </div>

    </main>

  <footer>

    <div class="container">
      <p>©2019 <a href="http://markmcdermott.io" data-external="true">Mark McDermott</a>
        <br>Built with <a href="https://github.com/mark-mcdermott/crackerjack" data-external="true">Crackerjack</a> in < 37 kB</p>
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
