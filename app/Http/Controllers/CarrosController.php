<?php

namespace App\Http\Controllers;
// require 'vendor/autoload.php';
use GuzzleHttp\Client;
use App\Models\carros;
use Illuminate\Http\Request;

class CarrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = new client();
        $response = $client->request('GET', 'http://localhost:5000/carros');
        $result =  $response->getBody();
        return view('stocks.teste',compact('result'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $client = new client();
        $js = ['modelo' => 'Titulo do post','ano' => 'Um texto bobo..','id' => 20];
        $response = $client->request('POST', 'http://localhost:5000/carros/create',['json'=> ['modelo' => 'Titulo do post','ano' => 'Um texto bobo..','id' => 20  ]
]);
        $result =  $response->getBody();
        // return $result;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
