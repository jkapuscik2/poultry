<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Poultry</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
</head>
<body>

<style>
    body {
        background-color: #6f828211;
        color: black;
    }

    .footer {
        width: 100%;
        line-height: 2rem;
        background-color: #6f828311;
    }
</style>

<div class="container">
    <div class="row">
        @foreach ($models as $model)
        <div class="col-lg-6 col-12">
            <div class="card shadow-lg rounded-lg m-3">
                <img class="card-img-top" src="{{ $model->photoUrl() }}" alt="{{ $model->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $model->name }}</h5>
                    <p class="card-text">{{ $model->content }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<footer class="footer mt-5">
    <div class="container">
        <div class="text-muted">Server: {{ $instanceId }}</div>
        <div class="text-muted">Request: {{ $requestId }}</div>
    </div>
</footer>
</body>
</html>
