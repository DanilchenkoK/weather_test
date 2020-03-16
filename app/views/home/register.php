<div class="container">
    <div class="row justify-content-center">
        <form action="register" validate method="post" style="padding:50px;">
            <div class="form-group">
                <label for="firstNameInput">Имя</label>
                <input type="text" maxlength="32" required pattern="^[A-Za-zА-Яа-яЁё]{1,32}" class="form-control" name="firstNameInput" id="firstNameInput" placeholder="любые символы русского, и латинского алфавита">
            </div>
            <div class="form-group">
                <label for="lastNameInput">Фамилия</label>
                <input type="text" maxlength="50" required pattern="^[A-Za-zА-Яа-яЁё]{1,50}" class="form-control" name="lastNameInput" id="lastNameInput" placeholder="любые символы русского, и латинского алфавита">
            </div>
            <div class="form-group">
                <label for="emailInput">Email адресс</label>
                <input type="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control" name="emailInput" id="emailInput" aria-describedby="emailHelp" placeholder="Введите email">
                <small id="emailHelp" class="form-text text-muted">
                    Мы никогда не передадим вашу электронную почту кому-либо еще.</small>
            </div>
            <div class="form-group">
                <label for="genderSelect">Выберите пол</label>
                <select class="form-control" name="genderSelect"  id="genderSelect">
                    <option>не выбрано</option>
                    <option>мужской</option>
                    <option>женский</option>
                </select>
            </div>
            <div class="form-group ">
                <label for="dateInput">Дата рождения</label>
                <input class="form-control" type="date" id="dateInput">
            </div>

            <input type="submit" value="Зарегестрироватся" class="btn btn-dark" />
        </form>
    </div>
</div>