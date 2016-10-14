<?php
namespace Jammer\SitewideSnippets\Model;

use Illuminate\Database\Eloquent\Model;

class SitewideSnippet extends Model
{
	public $timestamps = false;

	protected $fillable = ['legend', 'snippet', 'title'];
}

