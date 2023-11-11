<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
/**
 *@OA\Info(
 *    title="API shopping",
 *    version="1.0.0", 
 *    description= "Descripcion",
 *    @OA\Contact(
 *       email= "iran@iran.com",
 *       name= "Iran Cardenas Zarco"
 *      ),
 *      @OA\License(
 *          name= "Licencia",
 *          url= "Apache"
 *      )
 *) 
 */

class ApiProductController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/products",
     *     tags={"products"},
     *     @OA\Response(
     *          response=200,
     *          description="mostrar todos los productos",
     *     ),
     *    @OA\Response(
     *     response="default",
     *     description="ha ocurrido un error."
     *     )
     * )
     */            
    public function index()
    {
        $products = Product::all();
        return $products;
    }

    /**
     * Show the form for creating a new resource.
     */

     /**
     * @OA\Get(
     *     path="/api/products/{id}",
     *     tags={"products"},
     *     summary="Obtener el producto por identificador",
     *     description="Obtiene un producto especifico segun su identificador.",
     *     @OA\Parameter( 
     *     name= "id",
     *     in= "path",
     *     required=true,
     *     description="Identificador unico del producto",
     *     @OA\Schema(
     *     type="integer",
     *     format="int64"
     *     )
     *    ),
     *    @OA\Response(
     *    response=200,
     *    description="Producto exitos."
     *   )
     * )
     */

    public function getProductById($id)
    {
        $products = Product::find($id);
        return response()->json($products);
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}
