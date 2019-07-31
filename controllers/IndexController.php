<?php

class METSExport_IndexController extends Omeka_Controller_AbstractActionController
{
    public function indexAction()
    {
    	$form = new Zend_Form;
		$form->setAction(url(array('module'=>'mets-export', 'controller'=>'export', 'action'=>'mets'), 'default'))
			 ->setMethod('post');
		
		$element = new Zend_Form_Element_File('mets');

		$form->setAttrib('enctype', 'multipart/form-data');
		$form->addElement($element, 'mets');

		$this->view->assign('form', $form);
    }
}
