<div class="container">
    <div class="row">
        <div class="col text-center">
            <h3><?= $title ?></h3>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <?php if ($messages) : ?>
                <?php for ($i = 0; $i < count($messages); $i++) : ?>
                    <div class="card m-2">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($messages[$i]['email'], ENT_QUOTES) ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?=htmlspecialchars($messages[$i]['name'], ENT_QUOTES) . " at " . htmlspecialchars($messages[$i]['date_added'], ENT_QUOTES) ?></h6>
                            <p class="card-text"><?= htmlspecialchars($messages[$i]['text'], ENT_QUOTES) ?></p>
                        </div>
                    </div>
                <?php endfor; ?>
            <?php else : ?>
                <h4>Пока сообщений нет!</h4>
            <?php endif; ?>
        </div>
    </div>
</div>