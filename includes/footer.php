
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
