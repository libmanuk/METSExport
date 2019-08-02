<?php
/**
 * METSExport
 * 
 * @copyright Copyright 2019 Eric C. Weig 
 * @license http://opensource.org/licenses/MIT MIT
 */
/**
 * The METSExport plugin.
 * 
 * @package Omeka\Plugins\METSExport
 */

class METSExportPlugin extends Omeka_Plugin_AbstractPlugin
{

  // Define Hooks
  
  protected $_hooks = array(
    'install',
    'uninstall',
    'admin_head',
    'admin_items_show_sidebar',
    'admin_collections_show_sidebar'
  );

  public function hookInstall()
  {
    $table = get_db()->getTable('ElementSet');
    $dublinCore = $table->findByName('Dublin Core');
    $defaults = array(
      'elementSets' => array(),
    );
    if (isset($dublinCore->id)) {
      $defaults['elementSets'][$dublinCore->id] = TRUE;
    }
    set_option('mets_export_settings', serialize($defaults));
  }

  public function hookUninstall()
  {
    delete_option('mets_export_settings');
  }

  // set javascript file to change collection labels to sets labels
  
  public function hookAdminHead()
  {
    queue_js_file('metsadmin');
    $request = Zend_Controller_Front::getInstance()->getRequest();
    $controller = $request->getControllerName();
    $action = $request->getActionName();
        
	if (($controller == 'collections' && ($action == 'edit' || $action == 'add'))) 
	{
        echo "<style>#element-38 {display: none;}#element-43 {display: none;}#element-42 {display: none;}#element-45 {display: none;}#element-48 {display: none;}</style>";
	}
  }
  
  // Adds button(s) to to admin items show page sidebar for METS export
  
  public function hookAdminItemsShowSidebar()
  {
    $item = get_current_record('item');
    $itemId = $item->id;
    if (metadata('item', 'Collection Name')) {
    $collection = get_collection_for_item();
    $collectionId = metadata($collection, 'id');

    echo "<div class=\"panel\"><h4>Export METS XML</h4><p><a class='button blue' style='width:100%;' href='" . url('mets-export/export/mets?search=&advanced%5B0%5D%5Bjoiner%5D=and&advanced%5B0%5D%5Belement_id%5D=&advanced%5B0%5D%5Btype%5D=&advanced%5B0%5D%5Bterms%5D=&range=' . $itemId . '&collection=&type=&user=&tags=&public=&featured=&submit_search=Search+for+items&hits=0') . "'><input style='background-color:transparent;color:white;border:none;' type='button' value='Export Item as METS XML' /></a></p><p><a class='button blue' style='width:100%;' href='" . url('mets-export/export/mets?search=&advanced%5B0%5D%5Bjoiner%5D=and&range=&collection=' . $collectionId . '&type=&user=&tags=&public=&featured=&submit_search=Search+for+items&hits=0') . "'><input style='background-color:transparent;color:white;border:none;' type='button' value='Export Set as METS XML' /></a></p></div>";  
    } else {
    echo "<div class=\"panel\"><h4>Export METS XML</h4><p><a class='button blue' style='width:100%;' href='" . url('mets-export/export/mets?search=&advanced%5B0%5D%5Bjoiner%5D=and&advanced%5B0%5D%5Belement_id%5D=&advanced%5B0%5D%5Btype%5D=&advanced%5B0%5D%5Bterms%5D=&range=' . $itemId . '&collection=&type=&user=&tags=&public=&featured=&submit_search=Search+for+items&hits=0') . "'><input style='background-color:transparent;color:white;border:none;' type='button' value='Export Item as METS XML' /></a></p>";
    }

  }
  
  // Adds button to to admin collections show page sidebar for METS export
    
  public function hookAdminCollectionsShowSidebar()
  {
    $collectionRec = get_current_record('collection');
    $collectionID = $collectionRec->id;
    echo "<div class=\"panel\"><h4>Export METS XML</h4><p><a class='button blue' style='width:100%;' href='" . url('mets-export/export/mets?search=&advanced%5B0%5D%5Bjoiner%5D=and&range=&collection=' . $collectionID . '&type=&user=&tags=&public=&featured=&submit_search=Search+for+items&hits=0') . "'><input style='background-color:transparent;color:white;border:none;' type='button' value='Export Set as METS XML' /></a></p></div>";
  }
  
}

?>

