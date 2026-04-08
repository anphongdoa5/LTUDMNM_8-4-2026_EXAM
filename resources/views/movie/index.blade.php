<x-movie-layout>
    <x-slot name="title">
        Trang chủ - Danh sách phim
    </x-slot>

    <div class="list-movie">
        @foreach($movies as $movie)
            <div class="movie" style="background: #fff; box-shadow: 0 2px 8px rgba(0,0,0,0.1); border: 1px solid #e3e3e3;">
                <a href="{{ url('/movie/' . $movie->id) }}">
                    <img src="{{ $movie->image_link }}" 
                    alt="{{ $movie->movie_name_vn }}" 
                    style="width: 100%; height: 280px; object-fit: cover; display: block;">
                </a>

                <div class="movie-info" style="padding: 10px; text-align: center; display: block !important;">
                    <h5 style="font-size: 1rem; font-weight: bold; margin: 0 0 5px 0; line-height: 1.2;">
                        <a href="#" style="color: #000; text-decoration: none;">
                            {{ $movie->movie_name_vn }}
                        </a>
                    </h5>
                    <p style="font-size: 0.9rem; color: #666; margin: 0;">
                        {{ date('Y-m-d', strtotime($movie->release_date)) }}
                    </p>
                </div>
            </div>
        @endforeach
    </div>
</x-movie-layout>