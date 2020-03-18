<div class="container">
    <div class="row">
        <div class="col text-center">
            <h3><?= $title ?></h3>
            <small id="validate-account" class="d-none text-danger"><?= $rules['account']['message'] ?></small>
        </div>
    </div>
    <div class="row justify-content-center">
        <form action="login" method="post" class="form-width">
            <input type="hidden" name="rUrl" value="<?= $rUrl ?>">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" require class="form-control" name="email" id="email" placeholder="Введите email">
                <small id="validate-email" class="d-none text-danger"><?= $rules['email']['message'] ?></small>
            </div>
            <div class="form-group">
                <label for="password">Пароль</label>
                <input type="password" minlength="6" pattern="[a-zA-Z0-9]{6,50}" maxlength="50" require class="form-control" name="password" id="password" placeholder="Введите пароль">
                <small id="validate-password" class="d-none text-danger"><?= $rules['password']['message'] ?></small>
            </div>
            <div class="row">
                <div class="col">
                    <input type="submit" value="Войти" class="btn btn-dark w-100" />
                </div>
                <div class="col text-center">
                    <a class="btn w-100" href="/register">Регистрация</a>
                </div>
            </div>
        </form>
    </div>
</div>