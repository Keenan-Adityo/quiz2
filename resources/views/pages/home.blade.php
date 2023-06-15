<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Manajemen Tugas Keenan</title>
</head>

<body>
    <div class="d-flex flex-column ">
        <h2 class="fs-2 text-center mt-3">Manajemen Tugas Keenan</h2>
        <div class="d-flex flex-row justify-content-center">
            <a href='/tasks'>
                <button class="btn btn-info mx-2">Lihat Semua Data</button>
            </a>
            <a href='/tasks/completed'>
                <button class="btn btn-info mx-2">Lihat yang Selesai</button>
            </a>
            <a href='/tasks/incomplete'>
                <button class="btn btn-info mx-2">Lihat yang Belum Selesai</button>
            </a>
        </div>

        <form action="/tasks" method="post" class="mx-auto" style="width: 80%;">
            @csrf
            <input type="submit" value="Buat Laporan Baru" class="btn btn-primary">
        </form>
        <table class="table table-striped table-bordered mx-auto mt-3" style="width: 80%;">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasksData as $taskData)
                <tr>
                    <th scope="row">{{$taskData->id}}</th>
                    <td>{{ $taskData->judul}}</td>
                    <td>{{ $taskData->deskripsi}}</td>
                    <td>{{ $taskData->status}}</td>
                    <td>
                        <a href='/tasks/{{$taskData->id}}'>
                            <button class="btn btn-primary">Detail</button>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>