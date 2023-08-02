<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Product::where('id', '>', 0);

        if ($request->has('filter')) {
            $filters = $request->input('filter');
            $wheres = [];
            foreach ($filters as $key => $filter) {
                array_push($wheres, ['name', 'LIKE', "%$filter%"]);
            }
            $query = Product::where($wheres);
        }

        if ($request->has('sortBy')) {
                if (!$request->has('sortDir') || $request->input('sortDir') == 'asc') {
                    $query->orderBy($request->input('sortBy'));
                } else if ($request->input('sortDir') == "desc") {
                    $query->orderByDesc($request->input('sortBy'));
                }
        } else {
            $query->orderBy('name');
        }

        return response()->json($query->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $p = new Product($request->input());
        return $p->saveOrFail();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $p = Product::find($id);
        return response()->json($p);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $p = Product::find($id);
        $p->update($request->input());

        return response()->json($p);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $p = Product::find($id);
        $p->delete();
    }
}
