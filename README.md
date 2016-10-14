#Installation

#####composer.json
```
"repositories": [
  {
    "type": "vcs",
	"url": "git@github.com:7ammer/sitewide-snippets.git"
  }
],
"require": {
  "jammer/sitewide-snippets": "dev-master"
}
```

#####config/app.php
```
'providers' => [
    /*
     * Package Service Providers...
     */
    // SitewideSnippets for SleepingOwl
    SitewideSnippets\SitewideSnippetsServiceProvider::class,
]
```
#####app/Admin/navigation.php
```
[
	'title' => 'Site Settings',
	'icon' => 'fa fa-cog',
	'model' => \SitewideSnippets\Model\SitewideSnippet::class
]
```

##Run commands
`php artisan vendor:publish`
`php artisan migrate`


##Example table

* title = my example
* legend = my-example
* form_elements = 
```
[
	{
		"type":"textarea",
		"title":"Contentious words",
		"machine_name":"words",
		"field":"snippet_1"
	},
	{
		...
	}
]
```         

##setup admin page
####app/Admin/sitewideSnippets.php

##Helpers Useage
`showSnippet($snippet_legend, $machine_name = false)`
ie: `showSnippet('contentious', 'words')`

--------

######credit: https://github.com/jaiwalker/setup-laravel5-package
