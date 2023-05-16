<?php

namespace App\Http\Controllers;
use App\Models\Contacto;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;


class ContactoController extends Controller
{
     
     public $contacto;
     
    public function __construct(Contacto $contacto)
    {
        $this->contacto = $contacto;

    }
    public function index()
    {
          $response = $this->contacto->get('https://restcountries.com/v3/all');
          $paises = json_decode($response->getBody());


        return View("contacto.index",compact("paises"));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function getPaises()
   {
     $cacheKey = 'countries';

    if (Cache::has($cacheKey)) {
        return Cache::get($cacheKey);
    }

    $client = new Client();

    $response = $client->get('https://restcountries.com/v3.1/all');
    $paises = json_decode($response->getBody(), true);

    Cache::put($cacheKey, $paises, 3600);

    return $paises;
  }

    public function create()
    {
        
         $paises = $this->getPaises();

   
              $contacto = $this->contacto->all();
        return View("contacto.create",compact("contacto","paises"));
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            
          $contacto = $this->contacto->create([
              "nome"=>$request->nome,
              "email"=>$request->email
              ]);
        return redirect()->route("contacto.index")->with("message","criado com sucesso");
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
          $contacto = $this->contacto->findOrFail($id);
          
        return View("contacto.show",compact("contacto"));
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
          $contacto = $this->contacto->find($id);
        return View("contacto.edit",compact("contacto"));
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
          $contacto = $this->contacto->find($id);
          $contacto->update([
              "nome"=>$request->nome,
              "email"=>$request->email
              ]);
        return redirect()->route("contacto.index")->with("message","atualizada com sucesso");
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
            $contacto = $this->contacto->find($id);
          $contacto->delete();
        return redirect()->route("pessoa.index")->with("message","apagada com sucesso");
    }
    
  
    

}
