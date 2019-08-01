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

            include 'mets_output.php';

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
            
            include 'mets_output.php';
          
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
