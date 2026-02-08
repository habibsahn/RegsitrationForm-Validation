<?php

$errors = [];

$username = '';
$email = '';
$password = '';
$password_confirm = '';
$cv_url = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//    echo "<pre>";
//    var_dump($_POST);
//    echo "</pre>";

    $username = post_data('username');
    $email = post_data('email');
    $password = post_data('password');
    $password_confirm = post_data('password_confirm');
    $cv_url = post_data('cv_url');

//    echo "<pre>";
//    var_dump($username, $email, $password, $password_confirm, $cv_url);
//    echo "</pre>";

    if (!$username) {
        $errors['username'] = 'Kullanıcı adı zorunludur';
    }elseif (strlen($username) < 6 || strlen($username) > 16){
        $errors['username'] = 'Min: 6 ve max: 16 karakter olmalıdır';
    }

    if (!$email) {
        $errors['email'] = 'Mail zorunludur';
    }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['email'] = 'Geçerli bir mail adresi zorunludur';
    }

    if (!$password) {
        $errors['password'] = 'Şifre zorunludur';
    }

    if (!$password_confirm) {
        $errors['password_confirm'] = 'Şifre tekrarı zorunludur';
    }

    if ($password && $password_confirm && strcmp($password, $password_confirm) !== 0) {
        $errors['password_confirm'] = 'Şifreler eşleşmiyor';
    }

    if ($cv_url && !filter_var($cv_url, FILTER_VALIDATE_URL)) {
        $errors['cv_url'] = 'Lütfen geçerli bir cv linki giriniz';
    }

    if (empty($errors)){
        echo "Herşey Tamam".'<br>';
    }
}

function post_data($field)
{
    $_POST[$field] ??= '';

    return htmlspecialchars(stripslashes($_POST[$field]));
}

?>
<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kayıt Ol</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body style="padding: 50px;">

<form action="" method="post" novalidate>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label>Kullanıcı Adı</label>
                <input class="form-control <?php echo isset($errors['username']) ? 'is-invalid' : ''; ?>"
                       name="username" value="<?php echo $username; ?>">
                <small class="form-text text-muted">Min: 6 ve max: 16 karakter</small>
                <div class="invalid-feedback">
                    <?php echo $errors['username'] ?? '' ; ?>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label>Mail</label>
                <input type="email" class="form-control <?php echo isset($errors['email']) ? 'is-invalid' : ''; ?>" name="email" value="<?php echo $email; ?>">
                <div class="invalid-feedback">
                    <?php echo $errors['email'] ?? '' ; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label>Şifre</label>
                <input type="password" class="form-control <?php echo isset($errors['password']) ? 'is-invalid' : ''; ?>"
                       name="password" value="<?php echo $password; ?>">
                <div class="invalid-feedback">
                    <?php echo $errors['password'] ?? '' ; ?>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label>Şifre Tekrar</label>
                <input type="password"
                       class="form-control <?php echo isset($errors['password_confirm']) ? 'is-invalid' : ''; ?>"
                       name="password_confirm" value="<?php echo $password_confirm; ?>">
                <div class="invalid-feedback">
                    <?php echo $errors['password_confirm'] ?? '' ; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="form-group">
            <label>CV link</label>
            <input type="text" class="form-control <?php echo isset($errors['cv_url']) ? 'is-invalid' : ''; ?>"
                   name="cv_url" value="<?php echo $cv_url; ?>" placeholder="https://www.example.com/my-cv"/>
            <div class="invalid-feedback">
                <?php echo $errors['cv_url'] ?? '' ; ?>
            </div>
        </div>
    </div>

    <div class="form-group mt-3">
        <button class="btn btn-primary">Kayıt Ol</button>
    </div>
</form>

</body>
</html>