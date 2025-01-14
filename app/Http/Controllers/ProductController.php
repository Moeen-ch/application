<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{

    // these are the methods for the api routes

    public function index()
    {
        $products = product::all();
        return response()->json([
            'message' => count($products),
            'data' => $products,
            'success' => true
        ],200);
        // $products = product::all();  
        // return view('products.index', ['products' => $products]);
    }

    public function show($id)
        {
            $product = product::find($id);
            if ($product != null) {
                return response()->json([
                    'message' => 'Product Found',
                    'data' => $product,
                    'success' => true
                ],200);
            } else {
                return response()->json([
                    'message' => 'Product Not Found',
                    'data' => [],
                    'success' => false
                ],200);
            }

        }

        public function store(Request $request){
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'qty' => 'required|numeric',
                'price' => 'required|decimal:0,2',
                'description' => 'nullable'
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Validation Error',
                    'data' => $validator->errors(),
                    'success' => false
                ]);
            }

            $newProduct = product::create($request->all());
            return response()->json([
                'message' => 'Product Created',
                'data' => $newProduct,
                'success' => true
            ], 201);
        }


        

        public function update(Request $request, $id){

            $product = product::find($id);
            if ($product == null){
                return response()->json([
                    "message" => "product not found",
                    "data" => [],
                    "status" => false
                ]);

            }
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'qty' => 'required|numeric',
                'price' => 'required|decimal:0,2',
                'description' => 'nullable'
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Validation Error',
                    'data' => $validator->errors(),
                    'success' => false
                ]);
            }
            $product ->name=$request->name;
            $product -> qty = $request->qty;
            $product ->price = $request->price;
            $product ->description = $request->description;
            $product->save();
        }

        public function destroy(Request $request, $id){
            $product = product::find($id);
            if($product == null){
                return response()->json([
                    'message' => "product not found",
                    'data' => [],
                    'status' => false
                ]);

            }
            $product->delete();
            return response()->json([
                'message'=>'product deleted',
                'data' => [],
                'status'=> true
            ]);

        }

        public function upToDate(Request $request, $id){
            $product = product::find($id);
            if($product == null){
                return response()->json([
                    'message'=>'product not found',
                    'data'=> [],
                    'status'=> false
                ]);
            }

        }

        public function options(){
            return response()->json([
                'methods' => ['GET', 'POST', 'PUT', 'DELETE'],
            ]);
        }

        public function head($id){
            $product = product::findOrFail($id);
            if (!$product) {
                return response()->noContent(404); // Return 404 with no body if user doesn't exist
            }
        
            return response()->noContent(200); 

        }
    

        //  these are the methods for the web routes 

//     public function create()
//     {
//         return view('products.create');
//     }

//     public function store(Request $request)
//     {
//         $data = $request->validate([
//             'name' => 'required',
//             'qty' => 'required|numeric',
//             'price' => 'required|decimal:0,2',
//             'description' => 'nullable'
//         ]);

//         $newProduct = product::create($data);
//         return redirect(route('product.index'));
//     }

//     public function edit(product $product)
//     {
//         return view('products.edit', ['product' => $product]);
//     }
//     public function update(product $product, Request $request)
//     {
//         $data = $request->validate([
//             'name' => 'required',
//             'qty' => 'required|numeric',
//             'price' => 'required|decimal:0,2',
//             'description' => 'nullable'
//         ]);
//         $product->update($data);
//         return redirect(route('product.index'))->with('success', 'Product Updated Successfully');
//     }

//     public function destroy(product $product){
//         $product->delete();
//         return redirect(route('product.index'))->with('success', 'Product Deleted Successfully');

//     }
 }
