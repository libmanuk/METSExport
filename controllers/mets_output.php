<?php 

// handle fields that need to deal with multiple values separated by ';'
// Dublin Core:Creator, Dublin Core:Date, Dublin Core:Description, Dublin Core:Coverage, Dublin Core:Format, Dublin Core:Language, Dublin Core:Publisher, Dublin Core:Subject

$dccreator = metadata($item, array("Dublin Core", "Creator"));
$dccreator = htmlspecialchars($dccreator, ENT_QUOTES);
$rdccreator = str_replace(";","</dc:creator>\n <dc:creator>",$dccreator);
$rdccreator = str_replace("> ",">",$rdccreator);

$dccontributor = metadata($item, array("Dublin Core", "Contributor"));
$dccontributor = htmlspecialchars($dccontributor, ENT_QUOTES);
$rdccontributor = str_replace(";","</dc:contributor>\n <dc:contributor>",$dccreator);
$rdccontributor = str_replace("> ",">",$rdccontributor);

$dcdate = metadata($item, array("Dublin Core", "Date"));
$dcdate = htmlspecialchars($dcdate, ENT_QUOTES);
$rdcdate = str_replace(";","</dc:date>\n <dc:date>",$dcdate);
$rdcdate = str_replace("> ",">",$rdcdate);

$dccoverage = metadata($item, array("Dublin Core", "Coverage"));
$dccoverage = htmlspecialchars($dccoverage, ENT_QUOTES);
$rdccoverage = str_replace(";","</dc:coverage>\n <dc:coverage>",$dccoverage);
$rdccoverage = str_replace("> ",">",$rdccoverage);

$dcformat = metadata($item, array("Dublin Core", "Format"));
$dcformat = htmlspecialchars($dcformat, ENT_QUOTES);
$rdcformat = str_replace(";","</dc:format>\n <dc:format>",$dcformat);
$rdcformat = str_replace("> ",">",$rdcformat);

$dclanguage = metadata($item, array("Dublin Core", "Language"));
$dclanguage = htmlspecialchars($dclanguage, ENT_QUOTES);
$rdclanguage = str_replace(";","</dc:language>\n <dc:language>",$dclanguage);
$rdclanguagen = str_replace("> ",">",$rdclanguage);

$dcpublisher = metadata($item, array("Dublin Core", "Publisher"));
$dcpublisher = htmlspecialchars($dcpublisher, ENT_QUOTES);
$rdcpublisher = str_replace(";","</dc:publsher>\n <dc:publisher>",$dcpublisher);
$rdcpublisher = str_replace("> ",">",$rdcpublisher);

$dcsubject = metadata($item, array("Dublin Core", "Subject"));
$dcsubject = htmlspecialchars($dcsubject, ENT_QUOTES);
$rdcsubject = str_replace(";","</dc:subject>\n <dc:subject>",$dcsubject);
$rdcsubject = str_replace("> ",">",$rdcsubject);

$dcdescription = metadata($item, array("Dublin Core", "Description"));
$dcdescription = htmlspecialchars($dcdescription, ENT_QUOTES);
$rdcdescription = str_replace(";","</dc:description>\n <dc:description>",$dcdescription);
$rdcdescription = str_replace("> ",">",$rdcdescription);

$sdctitle = metadata($item, array("Dublin Core", "Title"));
$sdctitle = htmlspecialchars($sdctitle, ENT_QUOTES);

$sdcidentifier = metadata($item, array("Dublin Core", "Identifier"));
$sdcidentifier = htmlspecialchars($sdcidentifier, ENT_QUOTES);

$sdcsource = metadata($item, array("Dublin Core", "Source"));
$sdcsource = htmlspecialchars($sdcsource, ENT_QUOTES);

$sdctype = metadata($item, array("Dublin Core", "Type"));
$sdctype = htmlspecialchars($sdctype, ENT_QUOTES);

$sdcrights = metadata($item, array("Dublin Core", "Rights"));
$sdcrights = htmlspecialchars($sdcrights, ENT_QUOTES);

$sdcrelation = metadata($item, array("Dublin Core", "Relation"));
$sdcrelation = htmlspecialchars($sdcrelation, ENT_QUOTES);

$result[$id]['mets'] = $tag00 . $tag01 . $tag02 . $tag03 . $tag04 . $tag05 . $tag06 . $tag07 . $tag08 . $tag09 . $tag10 . $tag11 . $tag12 . $tag13 . $tag14 . $tag15 . $tag16 . $tag17 . $tag18 . $tag19 . $tag20 . $tag21 . $sdctitle . $tag22 . $tag23 . $rdccreator . $tag24 . $tag25 . $rdcdate . $tag26 . $tag27 . $rdcdescription . $tag28 . $tag29 . $rdccoverage . $tag30 . $tag31 . $rdcformat . $tag32 . $tag33 . $sdcidentifier . $tag34 . $tag35 . $rdcpublisher . $tag36 . $tag37 . $rdcsubject . $tag38 . $tag39 . $rdclanguage . $tag40 . $tag41 . $sdcsource . $tag42 . $tag43 . $rdccontributor . $tag44 . $tag45 . $sdctype . $tag46 . $tag47 . $sdcrights . $tag48 . $tag49 . $sdcrelation . $tag50 . $tag51 . $tag52 . $tag53 . $tag54 . $tag55 . $tag56 . $tag57 . $tag58 . $tag59 . $tag60 . $tag61 . $tag62 . $tag63 . $tag64 . $tag65 . $tag66 . $tag67 . $tag68 . $tag69 . $tag70 . $tag71 . $tag72 . $tag73 . $tag74 . $tag75 . $tag76 . $tag77 . $tag78;

    $result[$id]['mets'] = str_replace("  "," ",$result[$id]['mets']);
    $result[$id]['mets'] = str_replace(" </dc:","</dc:",$result[$id]['mets']);

?>
