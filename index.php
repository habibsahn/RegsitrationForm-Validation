<?php


?>
<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kayıt Ol</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body style="padding: 50px;">

<form action="" method="post" novalidate>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label>Kullanıcı Adı</label>
                <input class="form-control"
                       name="username">
                <small class="form-text text-muted">Min: 6 ve max: 16 karakter</small>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label>Mail</label>
                <input type="email" class="form-control" name="email">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label>Şifre</label>
                <input type="password" class="form-control"
                       name="password">
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label>Şifre Tekrar</label>
                <input type="password"
                       class="form-control"
                       name="password_confirm">
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="form-group">
            <label>CV link</label>
            <input type="text" class="form-control"
                   name="cv_url" placeholder="https://www.example.com/my-cv"/>
        </div>
    </div>

    <div class="form-group mt-3">
        <button class="btn btn-primary">Kayıt Ol</button>
    </div>
</form>

</body>
</html>