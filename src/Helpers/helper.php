<?php
use SitewideSnippets\Model\SitewideSnippet;
use SitewideSnippets\Model\SitewideSnippetRepository;

function showSnippet($snippet_legend, $machine_name = false) {
	$sitewide_snippets_repo = new SitewideSnippetRepository(new SitewideSnippet());
	$get_snippet_row = $sitewide_snippets_repo->getByLegend($snippet_legend);

	if($machine_name){
		$get_snippet = $sitewide_snippets_repo->getByLegendAndMachineName($snippet_legend, $machine_name);
		return $get_snippet;
	}

	return $get_snippet_row;
};
