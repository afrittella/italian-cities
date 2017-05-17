<?php

namespace Afrittella\ItalianCities\Http\Controllers;

use Afrittella\ItalianCities\Domain\Models\ItalianRegion;
use Afrittella\ItalianCities\Exceptions\RegionNotFoundException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class RegionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $q = $request->input('q', false);

        if ($q) {
            $data = ItalianRegion::where('name', 'LIKE', "%$q%")->orderBy('name', 'asc');
        } else {
            $data = ItalianRegion::orderBy('name', 'asc');
        }

        return $data->get();
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return Response
     * @internal param ItalianRegion $region
     * @internal param Request $request
     * @internal param $ItalianRegion
     */
    public function show($id)
    {
        try {
            $region = ItalianRegion::findOrFail($id);
        } catch(ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Region not found'
            ], 404);
        }

        return $region->load('italian_states');;
    }
}
