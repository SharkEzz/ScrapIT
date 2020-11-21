<?php

namespace App\Http\Controllers;

use App\Models\Scraper;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Psy\Util\Json;

class ScraperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $scrapers = Scraper::all();

        return new JsonResponse($scrapers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'max:255',
            'blockName' => 'required|max:255'
        ]);

        $scraper = new Scraper();
        $scraper->name = $data['name'];
        $scraper->description = $data['description'];
        $scraper->block_id = $data['blockName'];
        $scraper->save();

        return new JsonResponse($scraper, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $scraper = Scraper::findOrFail($id);

        return new JsonResponse($scraper);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $scraper = Scraper::with('products')->findOrFail($id);
        if(count($scraper->products) === 0)
        {
            $scraper->delete();
            return new JsonResponse([
                'success' => 'Deleted',
                204
            ]);
        }
        else
        {
            return new JsonResponse([
                'error' => 'relations',
                409
            ]);
        }
    }
}
