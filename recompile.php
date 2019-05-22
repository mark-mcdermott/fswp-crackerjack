<?php

include 'libs/Crackerjack.php';
$Crackerjack = new Crackerjack();

// move this to Crackerjack?
date_default_timezone_set('America/Chicago');

// prep - delete the blog folder contents
$Crackerjack->deleteFolderContents('blog');

// get posts array & first post
$postsArr = $Crackerjack->getPostsArrFromFolder('posts');
$firstPost = $Crackerjack->getFirstPostFromSortedArr($postsArr);

// write the index file
$index = $Crackerjack->getHtmlPage($firstPost->PostMarkdown);
$Crackerjack->writeHtmlFile($index,'index.php');
$Crackerjack->homepageSpecificRewrites($index);  // add filesize to footer, etc

// make archive page
$Crackerjack->writeArchiveFile($postsArr);

// make about page
$Crackerjack->writeAboutFile();

?>
