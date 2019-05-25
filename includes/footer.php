
      </div>

    </main>

  <footer>

    <div class="container">
      <p>©2019 <a href="http://markmcdermott.io" data-external="true">Mark McDermott</a>
        <br>Built with <a href="https://github.com/mark-mcdermott/crackerjack" data-external="true">Crackerjack</a></p>
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
