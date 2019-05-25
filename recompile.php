<?php

// run this file to take all the markdown posts in /posts and
// output them all to html (php) files in /blog.  this file
// will also generate index.php (which has the latest post),
// blog.php (which lists all past blog posts - the archive page)
// and about.php, a simlple content page.

include 'libs/Crackerjack.php';

$Crackerjack = new Crackerjack();

// prep - delete the blog folder contents
$Crackerjack->deleteFolderContents('blog');

// get posts array & first post
$postsArr = $Crackerjack->getPostsArrFromFolder('posts');
$firstPost = $Crackerjack->getFirstPostFromSortedArr($postsArr);

// write the index file
$Crackerjack->writeIndexFile($firstPost);

// write the blog files
$Crackerjack->writeBlogFiles($postsArr);

// write the blog archive page
$Crackerjack->writeArchiveFile($postsArr);

// make about page
$Crackerjack->writeAboutFile();

// make frontend embed page
// $Crackerjack->writeFrontendEmbedFile();

// make backend embed page
// $Crackerjack->writeBackendEmbedFile();

?>
