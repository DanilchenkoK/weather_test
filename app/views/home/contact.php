<div class="container">
    <div class="row">
        <div class="col text-center">
            <h3><?= $title ?></h3>
        </div>
    </div>
    <div class="row justify-content-center">
        <form action="contact" method="post" class="form-width">
            <div class="form-group">
                <label for="firstName">Имя</label>
                <input type="text" minlength="3" maxlength="32" required class="form-control" name="firstName" id="firstName" placeholder="любые символы русского, и латинского алфавита">
                <small id="validate-firstName" class="d-none text-danger"><?= $rules['firstName']['message'] ?></small>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" required class="form-control" name="email" id="email" placeholder="Введите email">
                <small id="validate-email" class="d-none text-danger"><?= $rules['email']['message'] ?></small>
            </div>
            <div class="form-group">
                <label for="text">Сообщение</label>
                <textarea maxlength="1000" required class="form-control" name="text" id="text" placeholder="Введите ваше сообщение до 1000 символов"></textarea>
                <small id="validate-text" class="d-none text-danger"><?= $rules['text']['message'] ?></small>
            </div>
            <div class="form-group"><small id="validate-reCaptcha" class="d-none text-danger"><?= $rules['reCaptcha']['message'] ?></small></div>
            <div class="form-group">
                <script src='https://www.google.com/recaptcha/api.js'></script>
                <div class="g-recaptcha" data-sitekey="6LfKKeIUAAAAAGzKAXyx98f74pRTj4aRaOEZgdve"></div>
            </div>

            <input type="submit" value="Отправить" class="btn btn-dark" />
        </form>
    </div>
</div>