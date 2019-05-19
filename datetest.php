<?php

  $postsArr = [];

  $postMeta1 = (object) [
    'title' => 'Post 1',
    'date' => '1/1/19'
  ];

  $postMeta2 = (object) [
    'title' => 'Post 2',
    'date' => '1/2/19'
  ];

  $postMeta3 = (object) [
    'title' => 'Post 3',
    'date' => '2/1/19'
  ];

  array_push($postsArr,$postMeta3);
  array_push($postsArr,$postMeta1);
  array_push($postsArr,$postMeta2);

  print_r($postsArr);
  echo '<br><br>';

  function comparator($object1, $object2) {
    return $object1->date > $object2->date;
}
// Sorting the class objects according
// to their scores
usort($postsArr, 'comparator');

print_r($postsArr);

  // // TODO: fix this sorting function
  // usort($postsArr, function($a,$b) {
  //   return strtotime($a['date']) - strtotime($b['date']);
  // });

  // echo '<br><br>';
  // echo '2:<br>';
  // print_r($postsArr);



?>
