<x-movie-layout>
    <x-slot name="title">
        Movie
    </x-slot>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Quản lý phim</title>

    <!-- jQuery + DataTable -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
</head>
<body>

<h2>Danh sách phim</h2>

{{-- Thông báo --}}
@if(session('success'))
    <p style="color: green">{{ session('success') }}</p>
@endif

<table id="id-table" border="1" cellpadding="10">
    <thead>
        <tr>
            <th>ID</th>
            <th>Ảnh</th>
            <th>Tên phim</th>
            <th>Ngày phát hành</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach($movies as $movie)
        <tr>
            <td>{{ $movie->id }}</td>

            <td>
                <img src="{{ asset('storage/' . $movie->image) }}" width="80">
            </td>

            <td>{{ $movie->movie_name_vn }}</td>
            <td>{{ $movie->release_date }}</td>

            <td>
                <!-- Xem -->
                <a href="/admin/movies/{{ $movie->id }}">Xem</a>

                |

                <!-- Xóa -->
                <a href="/admin/movies/delete/{{ $movie->id }}"
                   onclick="return confirm('Bạn có chắc muốn xóa?')">
                   Xóa
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- DataTable -->
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

</body>
</html>
</x-movie-layout>