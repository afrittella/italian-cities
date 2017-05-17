<?php

namespace Afrittella\ItalianCities\Http\Controllers;

use Afrittella\ItalianCities\Domain\Models\ItalianState;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->input('q', false);

        if ($q) {
            $data = ItalianState::where('name', 'LIKE', "%$q%")->orWhere('abbreviation', 'LIKE', "%$q%")->orderBy('name', 'asc');
        } else {
            $data = ItalianState::orderBy('name', 'asc');
        }        
        return $data->with('italian_region')->get();
    }

    /**
     * Display the specified resource.
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @internal param ItalianState $state
     */
    public function show($id)
    {
        try {
            $state = ItalianState::findOrFail($id);
        } catch(ModelNotFoundException $e) {
            return response()->json([
                'message' => 'State not found'
            ]);
        }

        return $state->load('italian_region');
    }

}
