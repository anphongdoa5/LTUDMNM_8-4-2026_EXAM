<x-movie-layout>
    <x-slot name="title">
        Thêm phim
    </x-slot>

    <h3 style="text-align:center;color:blue">THÊM PHIM</h3>

    @if(session('success'))
        <p style="color:green;text-align:center">{{ session('success') }}</p>
    @endif

    <form action="/admin/movies/add" method="POST" enctype="multipart/form-data">
        @csrf

        <p><b>Tên tiếng Anh</b></p>
        <input type="text" name="movie_name_en"
            value="{{ old('movie_name_en') }}"
            style="width:100%; margin-bottom:5px; border:1px solid {{ $errors->has('movie_name_en') ? 'red' : '#ccc' }};">
        @error('movie_name_en')
            <div style="color:red; margin-bottom:10px">{{ $message }}</div>
        @enderror

        <p><b>Tên tiếng Việt</b></p>
        <input type="text" name="movie_name_vn"
            value="{{ old('movie_name_vn') }}"
            style="width:100%; margin-bottom:5px; border:1px solid {{ $errors->has('movie_name_vn') ? 'red' : '#ccc' }};">
        @error('movie_name_vn')
            <div style="color:red; margin-bottom:10px">{{ $message }}</div>
        @enderror

        <p><b>Ngày phát hành</b></p>
        <input type="date" name="release_date"
            value="{{ old('release_date') }}"
            style="width:100%; margin-bottom:5px; border:1px solid {{ $errors->has('release_date') ? 'red' : '#ccc' }};">
        @error('release_date')
            <div style="color:red; margin-bottom:10px">{{ $message }}</div>
        @enderror

        <p><b>Mô tả</b></p>
        <textarea name="description"
            style="width:100%; height:100px; resize:none; margin-bottom:5px; border:1px solid {{ $errors->has('description') ? 'red' : '#ccc' }};">{{ old('description') }}</textarea>
        @error('description')
            <div style="color:red; margin-bottom:10px">{{ $message }}</div>
        @enderror

        <p><b>Ảnh đại diện</b></p>
        <input type="file" name="image"
            style="margin-bottom:5px; border:1px solid {{ $errors->has('image') ? 'red' : '#ccc' }};">
        @error('image')
            <div style="color:red; margin-bottom:10px">{{ $message }}</div>
        @enderror

        <br>

        <div style="text-align:center;">
            <button type="submit"
                style="padding:10px 25px;
                       background-color:blue;
                       color:white;
                       border:none;
                       border-radius:5px;">
                Lưu
            </button>
        </div>

    </form>
</x-movie-layout>