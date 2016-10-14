<?php
namespace SitewideSnippets\Model;


class SitewideSnippetRepository
{
    function __construct(SitewideSnippet $model)
    {
        $this->model = $model;
    }

    public function getByLegend($snippet_legend)
    {
        $model = $this->model;

        $content_snippet = $model->where('legend', $snippet_legend)->first();

        return $content_snippet;
    }

    public function getByLegendAndMachineName($snippet_legend, $machine_name)
    {
        $model = $this->model;

        $content_snippet = $model->where('legend', $snippet_legend)->first();

		if (!$content_snippet) {
			return null;
		}

        $form_elements = json_decode($content_snippet->form_elements);

        $result = "";
        foreach ($form_elements as $key => $form_element) {
            if($form_element->machine_name == $machine_name) $result = $content_snippet[$form_element->field];
        }

        return $result;
    }

    public function getById($id)
    {
        $model = $this->model;

        $content_snippet = $model->where('id', $id)->first();

        return $content_snippet;
    }
}
