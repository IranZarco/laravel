<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use App\Models\Product;
/**
 *@OA\Info(
 *    title="API shopping",
 *    version="1.0.0", 
 *    description= "Descripcion",
 *    @OA\Contact(
 *       email= "iran55599@gmail.com",
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
     *     tags={"Products"},
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
     *     tags={"Products"},
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

    /**
     * Registrar un producto por identificador
     * @OA\Post (
     *     path="/api/products",
     *     tags={"Products"},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                
     *                      @OA\Property(
     *                          property="nombre",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="descripcion",
     *                          type="string"
     *                      ),
     *                       @OA\Property(
     *                          property="precio",
     *                          type="float"
     *                      ),
     *                       @OA\Property(
     *                          property="stock",
     *                          type="number"
     *                      ),
     * 
     *                 ),
     *             
     *         )
     *      ),
     *      @OA\Response(
     *      response=200,
     *      description="Producto registrado exitosamente"
     *      )
     * )
     */

    public function store(Request $request)
    {
        $request->validate([
            'nombre'   => 'required',
            'descripcion' => 'required',
            'precio'   => 'required',
            'stock' => 'required'
        ]);

        $cliente = new Product();
        $cliente->id = $request->id;
        $cliente->nombre = $request->nombre;
        $cliente->descripcion = $request->descripcion;
        $cliente->precio = $request->precio;
        $cliente->stock = $request->stock;
        $cliente->save();

        return response()->json([
            'message' => 'Producto registrado exitosamente',
            'product' => $cliente
        ]);
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
    public function edit()
    {
        return Product::all();
    }

    /**
     * Update the specified resource in storage.
     */

    /**
     * @OA\PUT(
     *  path="/api/products/{id}",
     *  tags={"Products"},
     *  summary="Editar un producto por identificador",
     *  description="Editar un producto existente",
     *  @OA\Parameter(
     *      name="id",
     *      in="path",
     *      required=true,
     *      description="Identificador único de producto",
     *      @OA\Schema(
     *          type="integer",
     *          format="int64"
     *      )
     *  ),
     *  @OA\RequestBody(
     *      required=true,
     *      @OA\MediaType(
     *          mediaType="application/json",
     *          @OA\Schema(
     *              type="object",
     *              @OA\Property(
     *                  property="nombre",
     *                  type="string",
     *                  description="Nombre del producto"
     *              ),
     *              @OA\Property(
     *                  property="descripcion",
     *                  type="string",
     *                  description="Descripción del producto"
     *              ),
     *              @OA\Property(
     *                  property="precio",
     *                  type="number",
     *                  format="float",
     *                  description="Precio del producto"
     *              ),
     *              @OA\Property(
     *                  property="stock",
     *                  type="integer",
     *                  description="Cantidad en stock del producto"
     *              ),
     *          )
     *      )
     *  ),
     *  @OA\Response(
     *      response=200,
     *      description="Producto editado exitosamente"
     *  )
     * )
     */

    public function update($id, Request $request)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        $product->update($request->only(['nombre', 'descripcion', 'precio', 'stock']));
        $product->save();

        $updatedProduct = Product::find($id);

        return response()->json([
            'message' => 'Producto editado exitosamente',
            'product' => $updatedProduct
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */

    /**
     * Eliminar el producto por identificador
     * @OA\Delete (
     *     path="/api/products/{id}",
     *     tags={"Products"},
     *     @OA\Parameter(
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="NO CONTENT"
     *     ),
     *      @OA\Response(
     *          response=200,
     *          description="OPERATION SUCCEFUL",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Se pudo realizar correctamente la operación"),
     *          )
     *      )
     * )
     */

    public function destroy(string $id)
    {
        $cliente = Product::find($id);

        if(is_null($cliente))
        {
            return response()->json(['message' => 'No se pudo realizar correctamente la operación'],404);
        }

        $cliente->delete();

        return response()->noContent();
    }

}
