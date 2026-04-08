<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController3 extends Controller
{
    public function create(){
        return view("movie.add");
    }

    public function store(Request $request){

        // VALIDATE
        $request->validate([
            'movie_name_en' => 'required',
            'movie_name_vn' => 'required',
            'release_date' => 'required|date_format:Y-m-d',
            'description' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif',
        ],[
            'movie_name_en.required' => 'Vui lòng nhập tên tiếng Anh',
            'movie_name_vn.required' => 'Vui lòng nhập tên tiếng Việt',
            'release_date.required' => 'Vui lòng nhập ngày phát hành',
            'release_date.date_format' => 'Ngày phải đúng định dạng yyyy-mm-dd',
            'description.required' => 'Vui lòng nhập mô tả',
            'image.required' => 'Vui lòng chọn ảnh',
            'image.image' => 'File phải là hình ảnh',
            'image.mimes' => 'Ảnh phải có định dạng jpg, jpeg, png hoặc gif',
        ]);

        $file = $request->file('image');
        $fileName = time().'_'.$file->getClientOriginalName();

        $destination = public_path('images');
        if (!file_exists($destination)) {
            mkdir($destination, 0777, true);
        }

        $file->move($destination, $fileName);

        DB::insert("
            INSERT INTO movie (
                movie_name,
                movie_name_vn,
                original_name,
                image,
                image_link,
                backdrop,
                backdrop_link,
                tagline,
                tagline_vn,
                overview,
                overview_vn,
                runtime,
                budget,
                revenue,
                popularity,
                vote_average,
                vote_count,
                country_code,
                country_name,
                trailer,
                release_date,
                updated_at
            )
            VALUES (?, ?, ?, ?, '', '', '', '', '', ?, '', 0, 0, 0, 0, 0, 0, '', '', '', ?, NOW())
        ", [
            $request->movie_name_en,
            $request->movie_name_vn,
            $request->movie_name_en,   
            $fileName,
            $request->description,
            $request->release_date
        ]);

        return redirect('/admin/movies/add')
                ->with('success', 'Thêm phim thành công!');
    }
}