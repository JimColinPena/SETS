<?php

namespace App\Models;

use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Model;

class Dictionary extends Model implements Searchable
{

    public $table = 'entries';

    public $searchableType = 'List of Results';
    
    public function getSearchResult(): SearchResult
    {
        $url = route('search.show', $this->word);
     
         return new \Spatie\Searchable\SearchResult(
            $this,
            $this->word,
            $url,
         );
    }

    
}
