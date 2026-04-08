<x-movie-layout>
    <x-slot name="title">
        Movie
    </x-slot>

    {{-- jQuery + DataTable --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <div style="padding: 20px">

        {{-- TIÊU ĐỀ --}}
        <h2 style="text-align:center; font-weight:bold; margin-bottom:20px">
            DANH SÁCH PHIM
        </h2>

        {{-- NÚT THÊM --}}
        <a href="/movie/add"
           style="background: green; color: white; padding: 8px 15px; text-decoration:none; border-radius:5px;">
            Thêm
        </a>

        <br><br>

        {{-- THÔNG BÁO --}}
        @if(session('success'))
            <p style="color: green">{{ session('success') }}</p>
        @endif

        {{-- TABLE --}}
        <table id="id-table" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Ảnh đại diện</th>
                    <th>Tiêu đề</th>
                    <th>Giới thiệu</th> 
                    <th>Ngày phát hành</th>
                    <th>Điểm đánh giá</th> 
                    <th> </th>
                </tr>
            </thead>
            <tbody>
            @foreach($movies as $movie)
            <tr style="text-align:center; vertical-align:middle">

                <td>{{ $movie->id }}</td>

                <td>
                    <img src="{{ asset('storage/' . $movie->image) }}"
                        width="70"
                        style="border-radius:5px;">
                </td>

                <td style="text-align:left; padding-left:10px;">
                    {{ $movie->movie_name_vn }}
                </td>

                {{-- GIỚI THIỆU --}}
                <td style="text-align:left; max-width:200px;">
                    {{ Str::limit($movie->overview, 60) }}
                </td>

                <td>{{ $movie->release_date }}</td>

                {{-- ĐIỂM --}}
                <td>
                    <span style="
                        background:#f1f1f1;
                        padding:5px 10px;
                        border-radius:5px;
                        font-weight:bold;">
                        {{ $movie->vote_average ?? 'N/A' }}
                    </span>
                </td>

                <td>
                    <div style="display:flex; justify-content:center; gap:8px">

                        <a href="/movies/{{ $movie->id }}"
                        style="background:#0d6efd; color:white; padding:6px 12px; border-radius:6px; text-decoration:none;">
                            Xem
                        </a>

                        <a href="/movies/delete/{{ $movie->id }}"
                        onclick="return confirm('Bạn có chắc muốn xóa?')"
                        style="background:#dc3545; color:white; padding:6px 12px; border-radius:6px; text-decoration:none;">
                            Xóa
                        </a>

                    </div>
                </td>

            </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    {{-- DATATABLE --}}
    <script>
    $(document).ready(function () {
        $('#id-table').DataTable({
            responsive: true,
            pageLength: 5,
            lengthMenu: [5, 10, 25, 50, 100],
            bStateSave: true,
        });
    });
    </script>

</x-movie-layout>