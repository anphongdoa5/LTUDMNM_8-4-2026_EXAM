<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
class MovieController extends Controller
{
    public function index()
    {
        $movies = DB::table('movie')
            ->where('popularity', '>', 450)
            ->where('vote_average', '>', 7)
            ->orderBy('release_date', 'desc') 
            ->limit(12)                       
            ->get();
        return view('movie.index', compact('movies'));
    }
    public function getMoviesByGenre($id)
    {
        $movies = DB::table('movie')
            ->join('movie_genre', 'movie.id', '=', 'movie_genre.id_movie')
            ->where('movie_genre.id_genre', $id) 
            ->select('movie.*')
            ->orderBy('movie.release_date', 'desc')
            ->limit(12)
            ->get();
        $genre = DB::table('genre')->get();
        $title = "Phim theo thể loại";
        return view('movie.index', compact('movies', 'genre', 'title'));
    }
    public function detail($id)
    {
        $movie = DB::table('movie')->where('id', $id)->first();
        $genre = DB::table('genre')->get();
        $title = $movie->movie_name_vn;
        return view('movie.detail', compact('movie', 'genre', 'title'));
    }
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $movies = \DB::select("select * from movie where movie_name_vn like ?", ["%" . $keyword . "%"]);
        $genre = \DB::table('genre')->get();
        $title = "Kết quả tìm kiếm cho: " . $keyword;
        return view('movie.index', compact('movies', 'genre', 'title'));
    }
}
