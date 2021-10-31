<?php

namespace App\Http\Controllers;

use App\Models\Scout\Education;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class Typeahead extends Controller
{
    public function autoComplete(Request $request)
    {
        $query = $request->get('query');
        $filterResult = Education::where('scout_education_name', 'LIKE', '%' . $query . '%')->get();
        return response()->json($filterResult);
    }
}
