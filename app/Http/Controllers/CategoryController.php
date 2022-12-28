<?php

namespace App\Http\Controllers;

use App\Helpers\HttpClient;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function index()
    {
        $responseCategories = HttpClient::fetch(

            "GET",
            "http://127.0.0.1:8000/api/category"

        );
        $categories = $responseCategories["data"];
        return view(
            'categorylist',
            ["categories" => $categories]
        );
    }

    function create()
    {
        $responseCategories = HttpClient::fetch(

            "GET",
            "http://127.0.0.1:8000/api/category"

        );
        $categories = $responseCategories["data"];
        return view(
            'addcategories',
            ["categories" => $categories]
        );
    }

    public function store(Request $request)
    {
        $payload = $request->all();
        // dd($payload);
        if ($request->file() != null) {
            $file = ['thumbnail' => $request->file('thumbnail')];
        } else {
            $file = $request->file();
        }

        $responseCategories = HttpClient::fetch(
            "POST",
            "http://localhost:8000/api/category",
            $payload,
            $file
        );


        $categories = $responseCategories["data"];
        return redirect('category');
        // dd($authors);
    }

    function edit($id)
    {
        $responseCategory = HttpClient::fetch(

            "GET",
            "http://127.0.0.1:8000/api/category/" . $id

        );

        $categories = $responseCategory["data"];
        return view(
            'editcategories',
            ["categories" => $categories]
        );
    }

    public function update(Request $request, $id)
    {
        $payload = $request->all();
        // dd($payload);
        if ($request->file() != null) {
            $file = ['thumbnail' => $request->file('thumbnail')];
        } else {
            $file = $request->file();
        }

        $responseCategories = HttpClient::fetch(
            "POST",
            "http://localhost:8000/api/category/" . $id . "/update",
            $payload,
            $file
        );
        // dd($responseCategories);

        $categories = $responseCategories["data"];
        // dd($authors);
        return redirect()->route('category.index');
        // dd($authors);
    }

    function destroy($id)
    {

        $responseCategory = HttpClient::fetch(

            "GET",
            "http://127.0.0.1:8000/api/category/" . $id . "/destroy",
        );

        $categories = $responseCategory["data"];
        return redirect()->route('category.index');
    }
}
