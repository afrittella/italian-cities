<?php

namespace Afrittella\ItalianCities\Http\Controllers;

use Afrittella\ItalianCities\Domain\Models\ItalianCity;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->input('q', false);

        $code = $request->input('postal_code', false);

        if ($q) {
            $data = ItalianCity::where('name', 'LIKE', "%$q%")->orderBy('name', 'asc');
        } else {
            $data = ItalianCity::orderBy('name', 'asc');
        }

        if ($code) {
            $data->getByItalianPostalCode($code);
            
        } else {
            
        }

        return $data->with('italian_state.italian_region')->get();
    }

    /**
     * Display the specified resource.
     *
     * @param ItalianCity $city
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $city = ItalianCity::findOrFail($id);
        } catch(ModelNotFoundException $e) {
            return response()->json([
                'message' => 'City not found'
            ]);
        }

        return $city;
    }    
}
