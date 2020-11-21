<?php

namespace App\Http\Controllers;

use App\Models\MailConfig;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Psy\Util\Json;

class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $config = MailConfig::all();

        if(count($config) !== 0)
        {
            return new JsonResponse($config[count($config) - 1]); // Get the last config
        }
        else
        {
            return new JsonResponse();
        }
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
            'host' => 'required|max:255',
            'pass' => 'required|max:255',
            'port' => 'required|int',
            'user' => 'required|max:255',
            'secure' => 'required|bool'
        ]);

        $config = MailConfig::all();
        if(count($config) !== 0)
            $config = $config[count($config) - 1];
        else
            $config = new MailConfig();

        $config->smtp_host = $data['host'];
        $config->smtp_pass = $data['pass'];
        $config->smtp_user = $data['user'];
        $config->smtp_port = $data['port'];
        $config->is_secure = $data['secure'];
        $config->save();
        return new JsonResponse($config);
    }
}
