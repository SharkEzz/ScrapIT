<?php

namespace App\Http\Controllers;

use App\Models\MailAlert;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailAlertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $mails = MailAlert::with('mailConfig', 'product')->orderBy('id', 'desc')->get();

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
            'product_id' => 'integer|required',
            'price' => 'required',
        ]);

        $product = Product::findOrFail($data['product_id']);

        $mailAlert = new MailAlert();
        $mailAlert->product_id = $data['product_id'];
        $mailAlert->price = (int) $data['price'];
        $mailAlert->date = new \DateTime();
        $mailAlert->mail_config_id = 1;
        $mailAlert->save();

        Mail::to(env('MAIL_TO'))
            ->send(new \App\Mail\MailAlert($product, $data['price']));

        return new JsonResponse($mailAlert);
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
