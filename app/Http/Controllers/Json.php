<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Json extends Controller
{
    public function index()
    {
        return view('view');
    }

    public function get(Request $request)
    {
        $id_name = $request->input('id_name');
        $type = $request->input('type');
        $manga = $request->input('manga');
        if ($type == 1) {
            $result = DB::select('select title from manga');
            return [1 => $result];
        } elseif ($type == 2) {
            $result = DB::select('select name from authors');
            return [1 => $result];
        } elseif ($type == 3) {
            $result = DB::select('select title from manga where id = ?', [$id_name]);
            return [1 => $result];
        } elseif ($type == 4) {
            $result = DB::select('select name from authors where id = ?', [$id_name]);
            return [1 => $result];
        } elseif ($type == 5) {
            $result = DB::select('select manga.title from manga join authors on id_authors = ?', [$id_name]);
            return [1 => $result];
        } elseif ($type == 6) {
            $result = DB::select('select id from authors where name = ?', [$id_name]);
            $result1 = DB::insert('insert into manga (title,id_authors) values (?,?)', [$manga,$result[0]->id]);
        }
        /*
        $result = DB::insert('');
        return [1 => $result];
        */
    }



}
