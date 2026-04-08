<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController2 extends Controller
{
    public function index()
    {
        $movies = DB::table('movie')
            ->where('status', 1)
            ->get();

        return view('movie.admin', compact('movies')); 
    }

    public function show($id)
    {
        $movie = DB::table('movie')
            ->where('id', $id)
            ->first();

        return view('movie.detail', compact('movie')); 
    }

    public function delete($id)
    {
        DB::table('movie')
            ->where('id', $id)
            ->update(['status' => 0]); 

        return redirect('/movies')
            ->with('success', 'Xóa phim thành công!');
    }
}