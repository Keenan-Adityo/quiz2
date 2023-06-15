<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Manajemen Tugas Keenan</title>
</head>

<body>
    <div class="d-flex flex-column p-5">
        <fieldset disabled>
            <legend>Detail Tugas</legend>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Judul</label>
                <input type="text" id="disabledTextInput" class="form-control" placeholder='{{$taskData->judul}}'>
            </div>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Deskripsi</label>
                <input type="text" id="disabledTextInput" class="form-control" placeholder='{{$taskData->deskripsi}}'>
            </div>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Status</label>
                <input type="text" id="disabledTextInput" class="form-control" placeholder='{{$taskData->status}}'>
            </div>
        </fieldset>
        <div class="d-flex flex-row">
            <form action='/tasks/{{$taskData->id}}' method="POST">
                @csrf
                @method('put')
                <button type="submit" class="btn btn-primary mx-2">Update Tugas</button>
            </form>
            <form action='/tasks/{{$taskData->id}}/status' method="POST">
                @csrf
                @method('put')
                <input type="hidden" name="status" value="completed">
                <button type="submit" class="btn btn-primary mx-2">Selesaikan Tugas</button>
            </form>
            <form action='/tasks/{{$taskData->id}}/status' method="POST">
                @csrf
                @method('put')
                <input type="hidden" name="status" value="incomplete">
                <button type="submit" class="btn btn-primary mx-2">Belum Selesai Tugas</button>
            </form>
            <form action='/tasks/{{$taskData->id}}' method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger mx-2">Hapus Tugas</button>
            </form>
        </div>
    </div>
</body>

</html>