<?php

namespace App\Http\Controllers;

use App\Poste;
use App\Operational;
use App\Directory;
use App\Gallery;
use App\Internet;
use Illuminate\Http\Request;
use Spatie\Searchable\Search;

class SearchController extends Controller
{

    public function search(Request $request)
    {
        $searchResults = (new Search())
            ->registerModel(Poste::class, ['title', 'content', 'category'])
            ->registerModel(Directory::class, ['employee_name', 'telephone', 'email'])
            ->registerModel(Operational::class, 'subject', 'description')
            ->registerModel(Gallery::class, 'name', 'description')
            ->registerModel(Internet::class, ['title', 'content', 'category'])
            ->perform($request->input('query'));

        return view('portal.modals.search', compact('searchResults'));
    }
    

}