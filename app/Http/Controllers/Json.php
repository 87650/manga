<?php

namespace App\Http\Controllers;

//use Facade\FlareClient\Http\Response;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Response;


class Json extends Controller
{
    public function index()
    {
        return view('view');
    }


    public function manga_all($limit, ResponseFactory $responseFactory){
        try {
            $result = DB::select('select title from manga limit ?', [$limit]);
            //return [$result];
           return $responseFactory->json([$result], 200, ['status'=>'200']);
        }
        catch (QueryException $e)
        {
            return $responseFactory->json([$result], 400);
        }
    }
    public function authors_all($limit, ResponseFactory $responseFactory){
        try {
            $result = DB::select('select name from authors limit ?', [$limit]);
            // return [$result];
            return $responseFactory->json([$result]);
        }
        catch(QueryException $e) {
            return $responseFactory->json([$result], 400);
        }
    }
    public function manga_id($id, ResponseFactory $responseFactory){
        try {
            $result = DB::select('select title from manga where id = ?',[$id]);
            return $responseFactory->json([$result]);
        }
        catch(QueryException $e) {
            return $responseFactory->json([$result], 400);
        }

    }
    public function authors_id($id, ResponseFactory $responseFactory)
    {
        try {
            $result = DB::select('select name from authors where id = ?', [$id]);
            return $responseFactory->json([$result]);
        }
        catch (QueryException $e)
        {
            return $responseFactory->json([$result], 400);
        }
    }

    public function manga_authors($id,ResponseFactory $responseFactory){
        try {
            $result = DB::select('select manga.title from manga join authors on id_authors = ?', [$id]);
            return $responseFactory->json([$result]);
        }
        catch (QueryException $e)
        {
            return $responseFactory->json([$result], 400);
        }

    }
    public function manga_add(Request $request, ResponseFactory $responseFactory)
    {
        try {
            //$type = $request->input('type');
            $manga = $request->input('manga');
            $authors = $request->input('authors');
            $result = DB::select('select id from authors where name = ?', [$authors]);
            $result1 = DB::insert('insert into manga (title,id_authors) values (?,?)', [$manga, $result[0]->id]);
            return $responseFactory->json([$result1], 200);
        }
        catch (QueryException $e) {
            return $responseFactory->json([], 400);
        }
    }
    public function manga_update(Request $request, ResponseFactory $responseFactory)
    {
        try {
            //$type = $request->input('type');
            $id = $request->input('id');
            $manga = $request->input('manga');
            $authors = $request->input('authors');
            $result = DB::select('select id from authors where name = ?', [$authors]);
            $result1 = DB::update("update manga set title = ?, id_authors = ? where id = ?", [$manga, $result[0]->id,$id]);
            return $responseFactory->json([$result1], 200);
        }
        catch (QueryException $e) {
            return $responseFactory->json([], 400);
        }
    }


}
