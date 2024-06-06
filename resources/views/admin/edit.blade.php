<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Edit Penempatan</title>
</head>

<body>
    <div class="container mt-5">
        <h2>Edit Penempatan</h2>
        <form action="{{ route('pengajuan.update', $pemagang->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="penempatan" class="form-label">Penempatan</label>
                <input type="text" class="form-control" id="penempatan" name="penempatan" value="{{ $pemagang->penempatan }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
