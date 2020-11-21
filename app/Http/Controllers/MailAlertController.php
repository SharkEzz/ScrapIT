<?php

namespace App\Http\Controllers;

use App\Models\MailAlert;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MailAlertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $mails = MailAlert::with('mailConfig', 'product')->get();

        return new JsonResponse($mails);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'product_name' => 'required|max:255',
            'date' => 'required|max:255',
            'price_at' => 'required|max:255',
            'scraper' => 'required|max:255'
        ]);

        dd($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $alert = MailAlert::findOrFail($id);
        $alert->delete();

        return new JsonResponse([
            'success' => 'deleted'
        ]);
    }
}
