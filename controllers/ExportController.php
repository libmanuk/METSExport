<?php

class METSExport_ExportController extends Omeka_Controller_AbstractActionController
{

  public function metsAction()
  {
    $search = false;
    
    if (isset($_GET['search'])) {
      $items = $this->mets_search($_GET);
      $search = true;
    } else {
      $items = get_records('Item', array(), 0);
    }

    // Get all element sets except for legacy files data.
    $table = get_db()->getTable('ElementSet');
    $elementSetsAll = $table->fetchObjects($table->getSelect());
    $elementSets = array();

    // get all fields from a specific element set (eg. dublin core)
    $elements = array();
    foreach ($elementSets as $elementSet) {
      $elements = array_merge(
        $elements,
        get_db()->getTable('Element')->findBySet($elementSet->name)
      );
    }
    
    $total = count($items);
    $current_date = date("Y-m-d");
    
    // build METS template start
    
    include 'mets_template.php';
    
    // build METS template end

    if ($total === 1) {

        set_loop_records('items', $items);
            foreach (loop('items') as $item) {

            // get omeka id to add it to the result output
            $id = metadata($item, 'ID');

            $result[$id]['mets'] = $tag00 . $tag01 . $tag02 . $tag03 . $tag04 . $tag05 . $tag06 . $tag07 . $tag08 . $tag09 . $tag10 . $tag11 . $tag12 . $tag13 . $tag14 . $tag15 . $tag16 . $tag17 . $tag18 . $tag19 . $tag20 . $tag21 . metadata($item, array("Dublin Core", "Title")) . $tag22 . $tag23 . metadata($item, array("Dublin Core", "Creator")) . $tag24 . $tag25 . metadata($item, array("Dublin Core", "Publisher")) . $tag26 . $tag27 . metadata($item, array("Dublin Core", "Date")) . $tag28 . $tag29 . metadata($item, array("Dublin Core", "Source")) . $tag30 . $tag31 . metadata($item, array("Dublin Core", "Format")) . $tag32 . $tag33 . $tag34 . metadata($item, array("Dublin Core", "Coverage")) . $tag35 . $tag36 . metadata($item, array("Dublin Core", "Identifier")) . $tag37 . $tag38 . $tag39 . $tag40 . $tag41 . $tag42 . $tag43 . $tag44 . $tag45 . $tag46 . $tag47 . $tag48 . $tag49 . $tag50 . $tag51 . $tag52 . $tag53 . $tag54 . $tag55 . $tag56 . $tag57 . $tag58 . $tag59 . $tag60 . $tag61 . $tag62 . $tag63 . $tag64 . $tag65 . $tag66 . $tag67;

                $result[$id]['mets'] = str_replace("  "," ",$result[$id]['mets']);

                }                   
    
          $this->view->assign('result', $result);
        }
    
    else  {

    $zipFlag = TRUE;
        
        set_loop_records('items', $items);
            foreach (loop('items') as $item) {
        
            $title = metadata($item, array("Dublin Core", "Identifier"));
            $dir = realpath(__DIR__ . '/..');
            $subdir = "/views/admin/export/tmp/";
            $directory = "$dir$subdir";
            
            // get omeka id to add it to the result output
            $id = metadata($item, 'ID');
            
            $result[$id]['mets'] = $tag00 . $tag01 . $tag02 . $tag03 . $tag04 . $tag05 . $tag06 . $tag07 . $tag08 . $tag09 . $tag10 . $tag11 . $tag12 . $tag13 . $tag14 . $tag15 . $tag16 . $tag17 . $tag18 . $tag19 . $tag20 . $tag21 . metadata($item, array("Dublin Core", "Title")) . $tag22 . $tag23 . metadata($item, array("Dublin Core", "Creator")) . $tag24 . $tag25 . metadata($item, array("Dublin Core", "Publisher")) . $tag26 . $tag27 . metadata($item, array("Dublin Core", "Date")) . $tag28 . $tag29 . metadata($item, array("Dublin Core", "Source")) . $tag30 . $tag31 . metadata($item, array("Dublin Core", "Format")) . $tag32 . $tag33 . $tag34 . metadata($item, array("Dublin Core", "Coverage")) . $tag35 . $tag36 . metadata($item, array("Dublin Core", "Identifier")) . $tag37 . $tag38 . $tag39 . $tag40 . $tag41 . $tag42 . $tag43 . $tag44 . $tag45 . $tag46 . $tag47 . $tag48 . $tag49 . $tag50 . $tag51 . $tag52 . $tag53 . $tag54 . $tag55 . $tag56 . $tag57 . $tag58 . $tag59 . $tag60 . $tag61 . $tag62 . $tag63 . $tag64 . $tag65 . $tag66 . $tag67;

            $result[$id]['mets'] = str_replace("  "," ",$result[$id]['mets']);
          
            $file = fopen("$dir$subdir$title.xml", "w");
            fputs($file, $result[$id]['mets']);
            fclose($file);
    }
    
    $dir = realpath(__DIR__ . '/..');
    $subdir = "/views/admin/export/tmp/";
    $directory = "$dir$subdir";
    $zip_file = "mets_xml.zip";
    $zipFile = "$directory$zip_file";
    $subdir2 = "/views/admin/export/tmp";
    $zipDir = "$dir$subdir2";
    $zip = new ZipArchive;
    $zip->open($zipFile, ZipArchive::CREATE);
        foreach (glob("$zipDir/*") as $file) {
            $zip->addFile($file,basename($file));
        }
    $zip->close();

    $result = $zipFile;
    $this->view->assign('result', $result);
    $this->view->assign('zipFlag', $zipFlag);
   
    }
  
  
  }
  

  function mets_search($terms)
  {
    $itemTable = $this->_helper->db->getTable('Item');
    if (isset($_GET['search'])) {
      $items = $itemTable->findBy($_GET);
      return $items;
    } else {
      $queryArray = unserialize($itemTable->query);
      // Some parts of the advanced search check $_GET, others check
      // $_REQUEST, so we set both to be able to edit a previous query.
      $_GET = $queryArray;
      $_REQUEST = $queryArray;
      $items = $itemTable->findBy($_REQUEST);
      return $items;
    }
  }
  
    
}
