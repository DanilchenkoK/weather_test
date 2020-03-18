<div class="container">
    <div class="row">
        <div class="col text-center">
            <h3><?= $title ?></h3>
            <small id="validate-account" class="d-none text-danger"><?= $rules['account']['message2'] ?></small>
        </div>
    </div>
    <div class="row justify-content-center">
        <form action="register" method="post" class="form-width">
            <div class="form-group">
                <label for="firstName">Имя</label>
                <input type="text" minlength="3" maxlength="32" required class="form-control" name="firstName" id="firstName" placeholder="любые символы русского, и латинского алфавита">
                <small id="validate-firstName" class="d-none text-danger"><?= $rules['firstName']['message'] ?></small>
            </div>
            <div class="form-group">
                <label for="lastName">Фамилия</label>
                <input type="text" minlength="3" maxlength="50" required class="form-control" name="lastName" id="lastName" placeholder="любые символы русского, и латинского алфавита">
                <small id="validate-lastName" class="d-none text-danger"><?= $rules['lastName']['message'] ?></small>
            </div>
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
            <div class="form-group">
                <label for="gender">Выберите пол</label>
                <select class="form-control" name="gender" id="gender">
                    <option value="-1">не выбрано</option>
                    <option value="1">мужской</option>
                    <option value="0">женский</option>
                </select>
            </div>
            <div class="form-group ">
                <label for="birth">Дата рождения</label>
                <input class="form-control" type="date" name="birth" id="birth">
            </div>

            <input type="submit" value="Зарегестрироватся" class="btn btn-dark" />
        </form>
    </div>
</div>