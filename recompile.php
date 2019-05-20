<?php
include 'libs/Parsedown.php';
$Parsedown = new Parsedown();
$posts = glob('posts/*.{md}', GLOB_BRACE);
$metaCsv = '';
$counter = 1;
$postsArr = [];
date_default_timezone_set('America/Chicago');

// delete everything in blog folder
$folder = 'blog';
$files = glob($folder . '/*');
foreach($files as $file){
  if(is_file($file)){
    unlink($file);
  }
}

// recomplile output styles
echo '<style> strong { display: inline-block; width: 150px; text-align: right; }</style>';

// loop through all markdown posts
foreach ($posts as &$postFile) {
  $title = '';
  $date = '';
  $excerpt = '';
  $thumbnail = '';
  $tags = '';

  $postContents = file_get_contents($postFile);
  $mdPathAndFile = $postFile;
  $postLines = explode("\n", $postContents);

  // get title
  if (strpos($postLines[0], 'Title: ' ) !== false) {

    $title = $postLines[0];
    $title = str_replace("Title:","",$title);
    $title = trim($title);
    $title = str_replace("\"","",$title);
    $title = str_replace("\\","",$title);
    $title = str_replace(":","",$title);
    $title = str_replace(",","",$title);

    $slug = str_replace(" ","-",strtolower($title));
    $filename = $slug . '.php';

    unset($postLines[0]);
    $postLines = array_values($postLines);
  }

  // get date
  if (strpos($postLines[0], 'Date: ' ) !== false) {
    $date = str_replace("Date: ","",$postLines[0]);
    unset($postLines[0]);
    $postLines = array_values($postLines);
  }

  // get excerpt
  if (strpos($postLines[0], 'Excerpt: ' ) !== false) {
    $excerpt = str_replace("Excerpt: ","",$postLines[0]);
    unset($postLines[0]);
    $postLines = array_values($postLines);
  }

  // get thumbnail
  if (strpos($postLines[0], 'Thumbnail: ' ) !== false) {
    $thumbnail = str_replace("Thumbnail: ","",$postLines[0]);
    unset($postLines[0]);
    $postLines = array_values($postLines);
  }

  // get tags
  if (strpos($postLines[0], 'Tags: ' ) !== false) {
    $tags = str_replace("Tags: ","",$postLines[0]);
    unset($postLines[0]);
    $postLines = array_values($postLines);
  }

  // remove blank line between meta info and the post body
  if (empty($postLines[0])) {
    unset($postLines[0]);
    $postLines = array_values($postLines);
  }

  // write html post file
  $postHtml = '';
  $postMarkdown = join("\n",$postLines);
  $postHtml = $postHtml . file_get_contents('includes/header.php');
  $postHtml = $postHtml . $Parsedown->text($postMarkdown);
  $postHtml = $postHtml . file_get_contents('includes/footer.php');
  $file = fopen('blog/'.$filename, 'w');

  // write file
  fwrite($file, $postHtml);
  fclose($file);

  // add filesize in footer'
  $postFileSize = filesize('blog/' . $filename);
  $styleFileSize = filesize('style.min.css');
  $postAndStylesSize = $postFileSize + $styleFileSize;
  $formattedBothSize = ceil($postAndStylesSize / 1000 + 1);
  $sizeBlurb = 'Crackerjack</a> in < ' . $formattedBothSize . ' kB';
  $postHtml = str_replace('Crackerjack</a>', $sizeBlurb, $postHtml);
  file_put_contents('blog/'.$filename, $postHtml);

  echo '<div><strong>Post ' . $counter . ' Compiled:</strong> ' . $filename . '</div>';
  echo '<div><strong>Title:</strong> ' . $title . '</div>';
  echo '<div><strong>Date:</strong> ' . $date . '</div>';
  echo '<br>';
  // echo '<div><strong>Excerpt:</strong> ' . $excerpt . '</div>';
  // echo '<div><strong>Thumbnail:</strong> ' . $thumbnail . '</div>';
  // echo '<div><strong>Tags:</strong> ' . $tags . ' </div>';

  // add post metadata to object
  $postMeta = (object) [
    'Title' => $title,
    'Date' => $date,
    'Exceprt' => $excerpt,
    'Thumbnail' => $thumbnail,
    'Tags' => $tags,
    'Filename' => $filename,
    'MdPathAndFile' => $mdPathAndFile
  ];

  // push post to posts array
  array_push($postsArr,$postMeta);
  $counter++;
}

// print most recent post to index
function sortOnDate($object1, $object2) {
  return strtotime($object1->Date) < strtotime($object2->Date);
}
usort($postsArr, 'sortOnDate');
$firstPost = $postsArr[0];

// get firstpost contents
$firstPostContents = file_get_contents($firstPost->MdPathAndFile);
$firstPostLines = explode("\n", $firstPostContents);
if (strpos($firstPostLines[0], 'Title: ' ) !== false) {
  unset($firstPostLines[0]);
  $firstPostLines = array_values($firstPostLines);
}
if (strpos($firstPostLines[0], 'Date: ' ) !== false) {
  unset($firstPostLines[0]);
  $firstPostLines = array_values($firstPostLines);
}
if (strpos($firstPostLines[0], 'Excerpt: ' ) !== false) {
  unset($firstPostLines[0]);
  $firstPostLines = array_values($firstPostLines);
}
if (strpos($firstPostLines[0], 'Thumbnail: ' ) !== false) {
  unset($firstPostLines[0]);
  $firstPostLines = array_values($firstPostLines);
}
if (strpos($firstPostLines[0], 'Tags: ' ) !== false) {
  unset($firstPostLines[0]);
  $firstPostLines = array_values($firstPostLines);
}
if (empty($firstPostLines[0])) {
  unset($firstPostLines[0]);
  $firstPostLines = array_values($firstPostLines);
}

$index = '';
$firstPostMarkdown = join("\n",$firstPostLines);
$index = $index . file_get_contents('includes/header.php');
$index = $index . $Parsedown->text($firstPostMarkdown);
$index = $index . file_get_contents('includes/footer.php');
$indexFile = fopen('index.php', 'w');
fwrite($indexFile, $index);
fclose($indexFile);

// TODO add filesize in footer
// $postFileSize = filesize('blog/' . $filename);
// $styleFileSize = filesize('style.min.css');
// $postAndStylesSize = $postFileSize + $styleFileSize;
// $formattedBothSize = ceil($postAndStylesSize / 1000 + 1);
// $sizeBlurb = 'Crackerjack</a> in < ' . $formattedBothSize . ' kB';
// $postHtml = str_replace('Crackerjack</a>', $sizeBlurb, $postHtml);
// file_put_contents('blog/'.$filename, $postHtml);


// take everything in $postsArr and print titles & links to archive page
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

// TODO add filesize in footer
// $postFileSize = filesize('blog/' . $filename);
// $styleFileSize = filesize('style.min.css');
// $postAndStylesSize = $postFileSize + $styleFileSize;
// $formattedBothSize = ceil($postAndStylesSize / 1000 + 1);
// $sizeBlurb = 'Crackerjack</a> in < ' . $formattedBothSize . ' kB';
// $postHtml = str_replace('Crackerjack</a>', $sizeBlurb, $postHtml);
// file_put_contents('blog/'.$filename, $postHtml);

// make about.php
$aboutContent = '';
$aboutContent = $aboutContent . file_get_contents('includes/header.php');
$aboutContent = $aboutContent . $Parsedown->text(file_get_contents('pages/about.md'));
$aboutContent = $aboutContent . file_get_contents('includes/footer.php');
$aboutFile = fopen('about.php', 'w');
fwrite($aboutFile, $aboutContent);
fclose($aboutFile);

// TODO add filesize in footer
// $postFileSize = filesize('blog/' . $filename);
// $styleFileSize = filesize('style.min.css');
// $postAndStylesSize = $postFileSize + $styleFileSize;
// $formattedBothSize = ceil($postAndStylesSize / 1000 + 1);
// $sizeBlurb = 'Crackerjack</a> in < ' . $formattedBothSize . ' kB';
// $postHtml = str_replace('Crackerjack</a>', $sizeBlurb, $postHtml);
// file_put_contents('blog/'.$filename, $postHtml);

?>
