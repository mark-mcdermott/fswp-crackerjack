<?php

#
#
# Crackerjack Blog CMS
# Tiny, Fast Php Static Blog Generator From Markdown
# https://github.com/mark-mcdermott/crackerjack
#
# Mark McDermott
# http://markmcdermott.io
#
# MIT License
# https://opensource.org/licenses/MIT
#
#

require_once 'Parsedown.php';

class Crackerjack
{

  // settings
  private $header = 'includes/header.php';
  private $footer = 'includes/footer.php';
  private $recompileOutputStyles = '<style> strong { display: inline-block; width: 150px; text-align: right; }</style>';

  // get all .md files inside a folder
  public function getPostFilesFromMdFolder($folder) {
    return glob($folder.'/*.{md}', GLOB_BRACE);
  }

  public function getHtmlPage($postMarkdown) {
    $Parsedown = new Parsedown();
    $postHtml = '';
    $postHtml = $postHtml . $this->getHeader();
    $postHtml = $postHtml . $Parsedown->text($postMarkdown);
    $postHtml = $postHtml . $this->getFooter();
    return $postHtml;
  }

  public function writeHtmlFile($html,$filename) {
    $file = fopen($filename, 'w');
    fwrite($file, $html);
    fclose($file);
  }

  public function addFilesize($path, $filename, $postHtml) {
    $postFileSize = filesize($path . $filename);
    $styleFileSize = filesize('style.min.css');
    $postAndStylesSize = $postFileSize + $styleFileSize;
    $formattedBothSize = ceil($postAndStylesSize / 1000 + 1);
    $sizeBlurb = 'Crackerjack</a> in < ' . $formattedBothSize . ' kB';
    $postHtml = str_replace('Crackerjack</a>', $sizeBlurb, $postHtml);
    return $postHtml;
  }

  public function outputCompiledPostMeta($counter, $postObj) {
    echo '<div><strong>Post ' . $counter . ' Compiled:</strong> ' . $postObj->Filename . '</div>';
    echo '<div><strong>Title:</strong> ' . $postObj->Title . '</div>';
    echo '<div><strong>Date:</strong> ' . $postObj->Date . '</div>';
    echo '<br>';
  }

  public function addBlogActiveClass($postHtml) {
    $searchHtml = '<a href="/blog.php">Blog</a>';
    $replaceHtml = '<a class="active" href="/blog.php">Blog</a>';
    return str_replace($searchHtml, $replaceHtml, $postHtml);
  }


  public function getHeader() {
    return file_get_contents($this->header);
  }

  public function getFooter() {
    return file_get_contents($this->footer);
  }

  // get post title
  public function getPostTitle($postLines) {
    $title = $postLines[0];
    $title = str_replace("Title:","",$title);
    $title = trim($title);
    return $title;
  }

  // get post meta (date, excerpt, etc)
  public function getPostMeta($whichMeta,$postLine) {
    return str_replace($whichMeta.": ","",$postLine);
  }

  // returns meta if there, null if not
  public function tryGetLineMeta($postLine,$whichMeta) {
    if (strpos($postLine, $whichMeta.': ' ) !== false) {
      return $this->getPostMeta($whichMeta,$postLine);
    } else {
      return null;
    }
  }

  // get post slug
  public function getPostSlug($postTitle) {
    $slug = '';
    $slug = str_replace("\"","",$postTitle);
    $slug = str_replace("\\","",$slug);
    $slug = str_replace(":","",$postTitle);
    $slug = str_replace(",","",$slug);
    return str_replace(" ","-",strtolower($slug));

  }

  // get post filename
  public function getPostFilename($postSlug) {
    return $postSlug . '.php';
  }

  // delete first line
  public function deleteFirstLine($postLines) {
    unset($postLines[0]);
    $postLines = array_values($postLines);
    return $postLines;
  }

  // get title, date, excerpt, etc from post file
  public function getMeta($postFile)
  {

    $postContents = file_get_contents($postFile);
    $postLines = explode("\n", $postContents);

    $mdPathAndFile = $postFile;

    // get title, then delete first line if found
    $title = $this->tryGetLineMeta($postLines[0], 'Title');
    if ($title) { $postLines = $this->deleteFirstLine($postLines); }

    // get slug & filename
    $slug = $this->getPostSlug($title);
    $filename = $this->getPostFilename($slug);

    // get date, then delete first line if found
    $date = $this->tryGetLineMeta($postLines[0], 'Date');
    if ($date) { $postLines = $this->deleteFirstLine($postLines); }

    // get excerpt, then delete first line if found
    $excerpt = $this->tryGetLineMeta($postLines[0], 'Excerpt');
    if ($excerpt) { $postLines = $this->deleteFirstLine($postLines); }

    // get thumbnail, then delete first line if found
    $thumbnail = $this->tryGetLineMeta($postLines[0], 'Thumbnail');
    if ($thumbnail) { $postLines = $this->deleteFirstLine($postLines); }

    // get tags, then delete first line if found
    $tags = $this->tryGetLineMeta($postLines[0], 'Tags');
    if ($tags) { $postLines = $this->deleteFirstLine($postLines); }

    // remove blank line between meta info and the post body
    if (empty($postLines[0])) {
      $postLines = $this->deleteFirstLine($postLines);
    }

    // after saving and removing all the meta data (title, etc),
    // what's left is the post body content in markdown

    // get post content in markdown
    $postMarkdown = join("\n",$postLines);

    $metaObj = (object) [
      'Title' => $title,
      'Date' => $date,
      'Excerpt' => $excerpt,
      'Thumbnail' => $thumbnail,
      'Tags' => $tags,
      'Filename' => $filename,
      'MdPathAndFile' => $mdPathAndFile,
      'PostMarkdown' => $postMarkdown,
      'Slug' => $slug,
      'Filename' => $filename
    ];

    return $metaObj;

  }

  // print output css styles for recompile.php page
  public function printOutputStyles()
  {
    echo $this->recompileOutputStyles;
  }

  // delete everything in blog folder
  public function deleteFolderContents($blogFolder)
  {
    $folder = $blogFolder;
    $files = glob($folder . '/*');
    foreach($files as $file){
      if(is_file($file)){
        unlink($file);
      }
    }
  }

  public function getPostsArrayFromPostFiles($posts) {
    $counter = 1;
    $postsArr = [];
    foreach ($posts as &$postFile) {

      // get title, slug, filename, date, excerpt, thumbnail, tags, mdPathAndFile, content
      $postMetaObj = $this->getMeta($postFile);

      // push post to posts array
      array_push($postsArr,$postMetaObj);
      $counter++;
    }
    return $postsArr;
  }

  // sort array of posts by date, newest to oldest
  public function sortArrayByDate($postsArr) {
    // print most recent post to index
    date_default_timezone_set('America/Chicago');
    function sortOnDate($object1, $object2) {
      return strtotime($object1->Date) < strtotime($object2->Date);
    }
    usort($postsArr, 'sortOnDate');
    return $postsArr;
  }

  public function getFirstPostFromSortedArr($postArr) {
    return $postArr[0];
  }

  public function getPostsArrFromFolder($folder) {
    $posts = $this->getPostFilesFromMdFolder($folder);
    $postsArr = $this->getPostsArrayFromPostFiles($posts);
    $postsArr = $this->sortArrayByDate($postsArr);
    return $postsArr;
  }

  // add filesize to footer, active class in header, use h tags for homepage
  public function homepageSpecificRewrites($index) {
    // add filesize to footer
    $postFileSize = filesize('index.php');
    $styleFileSize = filesize('style.min.css');
    $indexAndStylesSize = $postFileSize + $styleFileSize;
    $formattedBothSize = ceil($indexAndStylesSize / 1000 + 1);
    $sizeBlurb = 'Crackerjack</a> in < ' . $formattedBothSize . ' kB';
    // start rewriting the markup
    $indexHtml = str_replace('Crackerjack</a>', $sizeBlurb, $index);
    // add active class in header
    $indexHtml = str_replace('<a href="/">Home</a>', '<a class="active" href="/">Home</a>', $indexHtml);
    // change site title on homepage (on homepage only) to h1
    $indexHtml = str_replace('<p class="site-title"><a href="/">Fullstack Wolfpack</a></p>', '<h1 class="site-title"><a href="/">Fullstack Wolfpack</a></h1>', $indexHtml);
    // change site tagline on homepage (on homepage only) to h2
    $indexHtml = str_replace('<p class="tagline">Blog, tutorials and videos about full stack skills</p>', '<h2 class="tagline">Blog, tutorials and videos about full stack skills</h2>', $indexHtml);
    file_put_contents('index.php', $indexHtml);
  }

  // make archive page
  public function writeArchiveFile($postsArr) {
    $archive = '';
    $archiveList = '';
    $archiveTitle = '<h2>Blog</h2>';
    foreach($postsArr as $post){
      $thisTitle = $post->Title;
      $thisLink = '<a href="blog/' . $post->Filename . '">' . $thisTitle . '</a>';
      $thisDiv = '<div class="archiveLink">' . $thisLink . '</div>';
      $archiveList = $archiveList . $thisDiv;
    }
    $archive = $archive . file_get_contents('includes/header.php');
    $archive = $archive . $archiveTitle . $archiveList;
    $archive = $archive . file_get_contents('includes/footer.php');
    $archiveFile = fopen('blog.php', 'w');
    fwrite($archiveFile, $archive);
    fclose($archiveFile);
    $archiveFileSize = filesize('blog.php');
    $styleFileSize = filesize('style.min.css');
    $archiveAndStylesSize = $archiveFileSize + $styleFileSize;
    $formattedBothSize = ceil($archiveAndStylesSize / 1000 + 1);
    $sizeBlurb = 'Crackerjack</a> in < ' . $formattedBothSize . ' kB';
    $archiveHtml = str_replace('Crackerjack</a>', $sizeBlurb, $archive);
    // add active class in header
    $archiveHtml = str_replace('<a href="/blog.php">Blog</a>', '<a class="active" href="/blog.php">Blog</a>', $archiveHtml);
    file_put_contents('blog.php', $archiveHtml);
  }

  // make about.php
  public function writeAboutFile() {
    $Parsedown = new Parsedown();
    $aboutContent = '';
    $aboutContent = $aboutContent . file_get_contents('includes/header.php');
    $aboutContent = $aboutContent . $Parsedown->text(file_get_contents('pages/about.md'));
    $aboutContent = $aboutContent . file_get_contents('includes/footer.php');
    $aboutFile = fopen('about.php', 'w');
    fwrite($aboutFile, $aboutContent);
    fclose($aboutFile);
    $aboutFileSize = filesize('about.php');
    $styleFileSize = filesize('style.min.css');
    $aboutAndStylesSize = $aboutFileSize + $styleFileSize;
    $formattedBothSize = ceil($aboutAndStylesSize / 1000 + 1);
    $sizeBlurb = 'Crackerjack</a> in < ' . $formattedBothSize . ' kB';
    $aboutHtml = str_replace('Crackerjack</a>', $sizeBlurb, $aboutContent);
    // add active class in header
    $aboutHtml = str_replace('<a href="/about.php">About</a>', '<a class="active" href="/about.php">About</a>', $aboutHtml);
    file_put_contents('about.php', $aboutHtml);
  }

  // write the index file
  public function writeIndexFile($firstPostMarkdown) {
    $index = $this->getHtmlPage($firstPostMarkdown);
    $this->writeHtmlFile($index,'index.php');
    $this->homepageSpecificRewrites($index);  // add filesize to footer, etc
  }

  // write the blog files
  public function writeBlogFiles($postsArr) {
    // convert post markdown to html & write html to file
    $this->printOutputStyles();
    $counter = 1;
    foreach ($postsArr as $post) {
      $postHtml = $this->getHtmlPage($post->PostMarkdown);
      $this->writeHtmlFile($postHtml,'blog/'.$post->Filename);
      // add filesize in footer & blog active class in the nav & rewrite the file
      $postHtml = $this->addFilesize('blog/', $post->Filename, $postHtml);
      $postHtml = $this->addBlogActiveClass($postHtml);
      $this->writeHtmlFile($postHtml,'blog/'.$post->Filename);
      // output compiled post info to page
      $this->outputCompiledPostMeta($counter, $post);
      $counter++;
    }
  }



}
