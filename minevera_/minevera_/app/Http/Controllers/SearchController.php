<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        $results = DB::table('ingredients')
            ->where('name', 'LIKE', '%' . $query . '%')
            ->get();
        return response()->json($results);
    }
}