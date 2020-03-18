<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h2>Погода Запорожье</h2>
            <h3><?= date('d.m.y') ?></h3>
        </div>
    </div>
    <div class="row justify-content-center ">
        <?php if ($weather['temperature'] ?? false) : ?>
            <table class="table text-center w-75 mt-2">
                <thead>
                    <tr>
                        <th>Время</th>
                        <th>Погода</th>
                        <th>Температура <sup>o</sup>C</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < $weather['time_span']; $i++) : ?>
                        <tr>
                            <td><?= $weather['time'][$i] ?><sup class="text-muted"> 00</sup></td>
                            <td><?= $weather['data_text'][$i] ?></td>
                            <td><?= $weather['temperature'][$i] ?></td>
                        </tr>
                    <?php endfor; ?>
                </tbody>

            </table>
        <?php else : ?>
            <h4>Что-то пошло не так! поробуйте <a href="/weather">обновить страницу</a></h4>
        <?php endif; ?>
    </div>
</div>