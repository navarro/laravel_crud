<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Product;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Painel\ProductFormRequest;

class ProdutoController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $product;

    public function __construct(Product $product) {

        $this->product = $product;
    }

    public function index() {

        $title = 'Listagem de Produtos';
        $products = $this->product->paginate(3);

        return view('painel.products.index', compact('products', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        $title = 'Cadastro de Produto';
        
         $categorys = ['eletronicos', 'móveis','limpeza','banho'];
        
        return view('painel.products.create-edit', compact('title','categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductFormRequest $request) {

        $dataForm = $request->all();
        
        //Preenchendo o active
        $dataForm['active'] = (!isset($dataForm['active'])) ? 0 : 1;
        
        //validação
        //$this->validate($request, $this->product->rules);
        
        /*
        
        $validate = validator($dataForm, $this->product->rules, $message);
        
        if ($validate->fails()){
            return redirect()
                    ->route('produtos.create')
                    ->withErrors($validate)
                    ->withInput();
        }
        */
        //Cadastro
        $insert = $this->product->create($dataForm);

        if ($insert) {
            return redirect()->route('produtos.index');
        } else {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {                
        //Recupera o produto        
        $product = $this->product->find($id);
        $title = "Visualizando o Produto: {$product->name}";
        
        return view('painel.products.show', compact('title','product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //Recupera o produto        
        $product = $this->product->find($id);
        $title = "Editar Produto: {$product->name}";
        
        $categorys = ['eletronicos', 'moveis','limpeza','banho'];
        
        return view('painel.products.create-edit', compact('title','product','categorys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductFormRequest $request, $id) {
        //
        
        $dataform = $request->all();
        
        $dataForm['active'] = (!isset($dataForm['active'])) ? 0 : 1;
        
        $product = $this->product->find($id);
        
        $update = $product->update($dataform);
        
        if($update){
            return redirect()->route('produtos.index');
        }else{
            return redirect()->route('produtos.edit', $id->with(['errors' => 'Falha ao editar']));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
        $product = $this->product->find($id);

        $delete = $product->delete();
        
        if ($delete) {
            return redirect()->route('produtos.index');
        } else {
            return redirect()->route('produtos.show', $id->with(['errors' => 'Falha ao deletar']));
        }
    }

    public function tests() {
        /*
          $insert = $this->product->create([
          'name' => 'caneta',
          'number' => 777,
          'active' => false,
          'category' => 'eletronicos',
          'description' => 'pad assinma',
          ]);

          if ($insert) {
          return "INserdido com sucesso {$insert->id}";
          } else {
          return 'não inseriudo';
          }
         * 
         */
        /*
          $prod = $this->product->find(3);
          $update = $prod->update([
          'name' => 'update 3',
          'number' => 333,
          'active' => false,
          'category' => 'eletronicos',
          'description' => 'pad assinma',
          ]);

          if ($update) {
          return "laterado com sucesso o item";
          } else {
          return 'não inseriudo';
          }


          $prod = $this->product->where('number',333);
          $update = $prod->update([
          'name' => 'update Haaaa',
          'number' => 333,
          'active' => false,
          'category' => 'eletronicos',
          'description' => 'pad assinma',
          ]);

          if ($update) {
          return "laterado com sucesso o item";
          } else {
          return 'não inseriudo';
          }
         */

        $prod = $this->product->where('id', 1);
        $delete = $prod->delete();

        if ($delete) {
            return "deletado com sucesso";
        } else {
            return 'não inseriudo';
        }
    }

}
