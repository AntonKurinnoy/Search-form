<?php

namespace App\Http\Controllers;

use App\Data;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function show(){

        return view('search');
    }

    public function search(Request $request){

        if (isset($_POST['data'])){
            $data = $_POST['data'];
            $name = $data['name'] ?? "";
            $bedrooms = $data['bedrooms'] ?? 0;
            $bathrooms = $data['bathrooms'] ?? 0;
            $storeys = $data['storeys'] ?? 0;
            $garages = $data['garages'] ?? 0;
            $from = $data['priceFrom'] ?? 0;
            $to = $data['priceTo'] ?? 0;
            $range = [$from, $to];

            $query = Data::where('name','LIKE','%'.$name.'%');

            if ($bedrooms > 0)
                $query->where('bedrooms','=',$bedrooms);
            if ($bathrooms > 0)
                $query->where('bathrooms','=',$bathrooms);
            if ($storeys > 0)
                $query->where('storeys','=',$storeys);
            if ($garages > 0)
                $query->where('garages','=',$garages);
            if (($from > 0) && ($to > 0))
                $query->whereIn('price',$range);

            $result = $query->get();

        return response()->json(['result' => $result]);
        } else
            return response()->json(['result' => 'empty']);
    }
}
