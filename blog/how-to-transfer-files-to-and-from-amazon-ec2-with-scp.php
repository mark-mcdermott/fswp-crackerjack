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
<h2>How to transfer files to and from Amazon EC2 with scp</h2>
<p class="date">2/14/19  by Mark McDermott</p>
Transferring files through the terminal can be a real pain, compared to a drag and drop GUI like Filezilla.  But when you know the syntax, it gets a lot easier.  When you are uploading/downloading files to an amazon EC2 ubuntu box, you'll need the pemfile location on your computer.
<h3>To upload from local computer to EC2</h3>
<p><code>scp -i &lt;localpath&gt;/pemfile.pem &lt;localpath&gt;/localfile.zip ubuntu@&lt;ipaddress&gt;:&lt;remotepath&gt;/destinationfile.zip</code></p>
<p>An example where the pemfile is locally stored in ~/pemfolder/, the local file to upload is myfile.zip and is on the desktop and the destination is the home folder of the EC2 instance and the public IP address of the EC2 instance is 216.3.128.12 would be:</p>
<p><code>scp -i ~/pemfolder/pemfile.pem ~/Desktop/myfile.zip ubuntu@216.3.128.12:~/myfile.zip</code></p>
<h3>To download from EC2 instance to local computer</h3>
<p><code>scp -i &lt;localpath&gt;/pemfile.pem ubuntu@&lt;ipaddress&gt;:&lt;remotepath&gt;/destinationfile.zip &lt;localpath&gt;/localfile.zip</code></p>
<p>An example where the pemfile is locally stored in ~/pemfolder/, the remote public ip address is 216.3.128.12, the file to download is myfile.zip and is in the home folder of the EC instance and the local for the file is on your desktop would be:</p>
<p><code>scp -i ~/pemfolder/pemfile.pem ubuntu@216.3.128.12:~/myfile.zip ~/Desktop/myfile.zip</code></p>
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
