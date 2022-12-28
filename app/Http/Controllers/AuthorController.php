<?php

namespace App\Http\Controllers;

use App\Helpers\HttpClient;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    function index()
    {
        $responseAuthors = HttpClient::fetch(

            "GET",
            "http://127.0.0.1:8000/api/author"

        );
        $authors = $responseAuthors["data"];
        return view(
            'authorlist',
            ["authors" => $authors]
        );
    }

    function create()
    {

        $responseAuthors = HttpClient::fetch(

            "GET",
            "http://127.0.0.1:8000/api/author"

        );
        $authors = $responseAuthors["data"];
        return view(
            'addauthors',
            ["authors" => $authors]
        );
    }


    public function store(Request $request)
    {
        $payload = $request->all();
        // dd($payload);
        if ($request->file() != null) {
            $file = ['photo' => $request->file('photo')];
        } else {
            $file = $request->file();
        }

        $responseAuthors = HttpClient::fetch(
            "POST",
            "http://localhost:8000/api/author",
            $payload,
            $file
        );


        $authors = $responseAuthors["data"];
        return redirect('author');
        dd($authors);
    }

    function edit($id)
    {
        $responseAuthors = HttpClient::fetch(

            "GET",
            "http://127.0.0.1:8000/api/author/" . $id

        );

        $authors = $responseAuthors["data"];
        return view(
            'editauthors',
            ["authors" => $authors]
        );
    }

    public function update(Request $request, $id)
    {
        $payload = $request->all();
        // dd($payload);
        if ($request->file() != null) {
            $file = ['photo' => $request->file('photo')];
        } else {
            $file = $request->file();
        }

        $responseAuthors = HttpClient::fetch(
            "POST",
            "http://localhost:8000/api/author/" . $id . "/update",
            $payload,
            $file
        );


        $authors = $responseAuthors["data"];
        // dd($authors);
        return redirect('author');
        // dd($authors);
    }


    function destroy($id)
    {

        $responseAuthors = HttpClient::fetch(

            "GET",
            "http://127.0.0.1:8000/api/author/" . $id . "/delete",
        );

        $authors = $responseAuthors["data"];
        return redirect('author');
    }
}
