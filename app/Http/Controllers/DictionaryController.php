<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Searchable\Search;
use App\Models\Dictionary;
use View;

class DictionaryController extends Controller
{
    public function index(){
        $searchResults = (new Search())
        ->registerModel(Dictionary::class, 'word');
        $searchResults = Dictionary::paginate(20);
       return view('dashboard.searches.index',compact('searchResults'));
    }

    public function search(Request $request){
        $searchResults = (new Search())
           ->registerModel(Dictionary::class, 'word')
           ->search($request->search);
           // dd($searchResults);
        // $searchResults = Dictionary::paginate(20);
       return view('dashboard.searches.search',compact('searchResults'));
    }

    public function show(Request $request) {
        $words = $request->word;
        // dd($words);
        $definitions = Dictionary::where('word', $words)->get();
        return view('dashboard.searches.result',compact('definitions'));
    }

    public function back() {
        return redirect()->route('search.index');
    }
}
