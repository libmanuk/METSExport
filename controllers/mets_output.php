<?php 

// handle fields that need to deal with multiple values separated by ';'
// Dublin Core:Creator, Dublin Core:Date, Dublin Core:Description, Dublin Core:Coverage, Dublin Core:Format, Dublin Core:Language, Dublin Core:Publisher, Dublin Core:Subject

$dccreator = metadata('item', array('Dublin Core', 'Creator'), array('delimiter'=>';'));
$rdccreator = str_replace(";","</dc:creator>\n <dc:creator>",$dccreator);
$rdccreator = str_replace("> ",">",$rdccreator);

$dcdate = metadata('item', array('Dublin Core', 'Date'), array('delimiter'=>';'));
$rdcdate = str_replace(";","</dc:date>\n <dc:date>",$dcdate);
$rdcdate = str_replace("> ",">",$rdcdate);

$dccoverage = metadata('item', array('Dublin Core', 'Coverage'), array('delimiter'=>';'));
$rdccoverage = str_replace(";","</dc:coverage>\n <dc:coverage>",$dccoverage);
$rdccoverage = str_replace("> ",">",$rdccoverage);

$dcformat = metadata('item', array('Dublin Core', 'Format'), array('delimiter'=>';'));
$rdcformat = str_replace(";","</dc:format>\n <dc:format>",$dcformat);
$rdcformat = str_replace("> ",">",$rdcformat);

$dclanguage = metadata('item', array('Dublin Core', 'Language'), array('delimiter'=>';'));
$rdclanguage = str_replace(";","</dc:language>\n <dc:language>",$dclanguage);
$rdclanguagen = str_replace("> ",">",$rdclanguage);

$dcpublisher = metadata('item', array('Dublin Core', 'Publisher'), array('delimiter'=>';'));
$rdcpublisher = str_replace(";","</dc:publsher>\n <dc:publisher>",$dcpublisher);
$rdcpublisher = str_replace("> ",">",$rdcpublisher);

$dcsubject = metadata('item', array('Dublin Core', 'Subject'), array('delimiter'=>';'));
$rdcsubject = str_replace(";","</dc:subject>\n <dc:subject>",$dcsubject);
$rdcsubject = str_replace("> ",">",$rdcsubject);

$dcdescription = metadata('item', array('Dublin Core', 'Description'), array('delimiter'=>';'));
$rdcdescription = str_replace(";","</dc:description>\n <dc:description>",$dcdescription);
$rdcdescription = str_replace("> ",">",$rdcdescription);

$result[$id]['mets'] = $tag00 . $tag01 . $tag02 . $tag03 . $tag04 . $tag05 . $tag06 . $tag07 . $tag08 . $tag09 . $tag10 . $tag11 . $tag12 . $tag13 . $tag14 . $tag15 . $tag16 . $tag17 . $tag18 . $tag19 . $tag20 . $tag21 . metadata($item, array("Dublin Core", "Title")) . $tag22 . $tag23 . $rdccreator . $tag24 . $tag25 . $rdccontributor . $tag26 . $tag27 . $rdcdescription . $tag28 . $tag29 . $rdcrelation . $tag30 . $tag31 . $rdcsubject . $tag32 . $tag33 . $rdcpublisher . $tag34 . $tag35 . $rdcdate . $tag36 . $tag37 . metadata($item, array("Dublin Core", "Source")) . $tag38 . $tag39 . $rdcformat . $tag40 . $tag41 . metadata($item, array("Dublin Core", "Type")) . $tag42 . $tag43 . $rdccoverage . $tag44 . $tag45 . metadata($item, array("Dublin Core", "Identifier")) . $tag46 . $tag47 . $rdclanguage . $tag48 . $tag49 . metadata($item, array("Dublin Core", "Rights")) . $tag50 . $tag51 . $tag52 . $tag53 . $tag54 . $tag55 . $tag56 . $tag57 . $tag58 . $tag59 . $tag60 . $tag61 . $tag62 . $tag63 . $tag64 . $tag65 . $tag66 . $tag67 . $tag68 . $tag69 . $tag70 . $tag71 . $tag72 . $tag73 . $tag74 . $tag75 . $tag76 . $tag77 . $tag78;

    $result[$id]['mets'] = str_replace("  "," ",$result[$id]['mets']);
    $result[$id]['mets'] = str_replace(" </dc:","</dc:",$result[$id]['mets']);

?>
