<?php 

$result[$id]['mets'] = $tag00 . $tag01 . $tag02 . $tag03 . $tag04 . $tag05 . $tag06 . $tag07 . $tag08 . $tag09 . $tag10 . $tag11 . $tag12 . $tag13 . $tag14 . $tag15 . $tag16 . $tag17 . $tag18 . $tag19 . $tag20 . $tag21 . metadata($item, array("Dublin Core", "Title")) . $tag22 . $tag23 . metadata($item, array("Dublin Core", "Creator")) . $tag24 . $tag25 . metadata($item, array("Dublin Core", "Publisher")) . $tag26 . $tag27 . metadata($item, array("Dublin Core", "Date")) . $tag28 . $tag29 . metadata($item, array("Dublin Core", "Source")) . $tag30 . $tag31 . metadata($item, array("Dublin Core", "Format")) . $tag32 . $tag33 . metadata($item, array("Dublin Core", "Type")) . $tag34 . $tag35 . metadata($item, array("Dublin Core", "Coverage")) . $tag36 . $tag37 . metadata($item, array("Dublin Core", "Identifier")) . $tag38 . $tag39 . metadata($item, array("Dublin Core", "Language")) . $tag40 . $tag41 . metadata($item, array("Dublin Core", "Rights")) . $tag42 . $tag43 . $tag44 . $tag45 . $tag46 . $tag47 . $tag48 . $tag49 . $tag50 . $tag51 . $tag52 . $tag53 . $tag54 . $tag55 . $tag56 . $tag57 . $tag58 . $tag59 . $tag60 . $tag61 . $tag62 . $tag63 . $tag64 . $tag65 . $tag66 . $tag67 . $tag68 . $tag69 . $tag70;
$result[$id]['mets'] = str_replace("  "," ",$result[$id]['mets']);

?>
