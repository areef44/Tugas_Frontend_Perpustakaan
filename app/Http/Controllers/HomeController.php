<?php

namespace App\Http\Controllers;

use App\Helpers\HttpClient;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index()
    {
        $responseBooks = HttpClient::fetch(

            "GET",
            "http://127.0.0.1:8000/api/books"

        );
        $books = $responseBooks["data"];
        return view(
            'home',
            ["books" => $books]
        );
    }

    function create()
    {
        $responseBooks = HttpClient::fetch(

            "GET",
            "http://127.0.0.1:8000/api/books",

        );

        $responseAuthors = HttpClient::fetch(

            "GET",
            "http://127.0.0.1:8000/api/author",

        );

        $responseCategory = HttpClient::fetch(

            "GET",
            "http://127.0.0.1:8000/api/category",

        );

        $books = $responseBooks["data"];
        $authors = $responseAuthors["data"];
        $categories = $responseCategory["data"];
        return view(
            'addbooks',
            [
                "books" => $books,
                "categories" => $categories,
                "authors" => $authors
            ]
        );
    }

    function store(Request $request)
    {
        $payload = $request->all();
        // dd($payload);
        if ($request->file() != null) {
            $file = ['picture' => $request->file('picture')];
        } else {
            $file = $request->file();
        }
        $responseBooks = HttpClient::fetch(
            "POST",
            "http://localhost:8000/api/books",
            $payload,
            $file
        );



        $books = $responseBooks["data"];
        return redirect('');
        // dd($authors);
    }

    function edit($id)
    {

        $responseBooks = HttpClient::fetch(

            "GET",
            "http://127.0.0.1:8000/api/books/" . $id

        );

        $responseAuthors = HttpClient::fetch(

            "GET",
            "http://127.0.0.1:8000/api/author"

        );

        $responseCategory = HttpClient::fetch(

            "GET",
            "http://127.0.0.1:8000/api/category"

        );

        $books = $responseBooks["data"];
        $authors = $responseAuthors["data"];
        $categories = $responseCategory["data"];



        return view(
            'editbooks',
            [
                'books' => $books,
                'categories' => $categories,
                'authors' => $authors
            ]
        );
    }

    public function update(Request $request, $id)
    {
        $payload = $request->all();
        // dd($payload);
        if ($request->file() != null) {
            $file = ['picture' => $request->file('picture')];
        } else {
            $file = $request->file();
        }

        $responseBooks = HttpClient::fetch(
            "POST",
            "http://localhost:8000/api/books/" . $id . "/update",
            $payload,
            $file
        );
        // dd($responseCategories);

        $books = $responseBooks["data"];
        // dd($authors);
        return redirect('');
        // dd($authors);
    }

    public function destroy($id)
    {

        $responseBooks = HttpClient::fetch(

            "GET",
            "http://127.0.0.1:8000/api/books/" . $id . "/destroy",
        );

        $books = $responseBooks["data"];
        return redirect('');
    }
}
