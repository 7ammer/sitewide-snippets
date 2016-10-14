<?php

use SitewideSnippets\Model\SitewideSnippet;
use SitewideSnippets\Model\SitewideSnippetRepository;
use SleepingOwl\Admin\Model\ModelConfiguration;

AdminSection::registerModel(SitewideSnippet::class, function (ModelConfiguration $model) {
    $model->setTitle('Sitewide Snippets');
    $model->setAlias('sitewide-snippets');
    $model->disableCreating();
    $model->disableDeleting();

    // Display
    $model->onDisplay(function () {

        $display = AdminDisplay::table()
            ->setColumns([
                AdminColumn::link('title')
                    ->setLabel('Snippet name')
            ]);

        return $display;
    });

    // Create And Edit
    $model->onCreateAndEdit(function($id) {

        $sitewideSnippetRepo = new SitewideSnippetRepository(new SitewideSnippet);
        $sitewideSnippetInstance = $sitewideSnippetRepo->getById($id);


        $form_elements = json_decode($sitewideSnippetInstance->form_elements);
        if(!$form_elements) throw new Exception('There is either no json data in the form_elements field or it is not readable.');

        $form = AdminForm::panel();


        foreach ($form_elements as $key => $form_element) {
            $input = selectInput($form_element);
            $form->addBody($input);
        }

        return $form;
    });



    function selectInput($form_element){
        switch ($form_element->type) {
            case 'text':
                return AdminFormElement::text($form_element->field, $form_element->title);
                break;
	        case 'password':
		        return AdminFormElement::text("TempDefaultPassword", $form_element->title);
		        break;
	        case 'hidden':
		        return AdminFormElement::hidden($form_element->field);
		        break;
            case 'textarea':
                return AdminFormElement::textarea($form_element->field, $form_element->title);
                break;
            case 'wysiwyg':
            return AdminFormElement::wysiwyg($form_element->field, $form_element->title)
                        ->setParameters(["customConfig" => "/js/ckeditor/configs/general.js"]);
                break;
            case 'image':
                return AdminFormElement::image($form_element->field, $form_element->title);
                break;
            case 'repeaterArray':
                $elements = [];
                foreach ($form_element->elements as $els) {
                $elements [] = selectInput($els);
                }

                return AdminFormElement::repeaterArray($form_element->field, $form_element->title)
                    ->setRepeaterFields( $elements );
                break;
        }
    }
});
