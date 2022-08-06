<?php

    $icons = $this->icons['page'];

    $orders = $page[0]['dynamic']['content'];
    $countO = count($orders);

    $tariffs = $page[0]['static']['tariffs'];
    $countT = count($tariffs);

    $calculator = $page[0]['static']['calculator'];
    $countC = count($calculator);

    $previous = $page[0]['pagination']['previous'];
    $next = $page[0]['pagination']['next'];
?>

<div class="cabinet">
    <div class="information_menu">
        <h3>Меню администратора</h3>
        <p data-tab="0" class="information_tab">
            <img loading="lazy" width="16" height="16" src="<?=$icons['orders']; ?>">
            <span>Заказы</span>
        </p>
        <p data-tab="1" class="information_tab">
            <img loading="lazy" width="16" height="16" src="<?=$icons['tariffs']; ?>">
            <span>Тарифы</span>
        </p>
        <p data-tab="2" class="information_tab">
            <img loading="lazy" width="16" height="16" src="<?=$icons['calculator']; ?>">
            <span>Калькулятор</span>
        </p>
    </div>
    <div class="information_show">
        <div class="information_content active">

            <div class="orders_tabs" onclick="getInfo('order')">
                <h2>Заказы</h2>
                <? if($countO): for($i=0; $i<$countO; $i++): $order = $orders[$i]; ?>
                    <div>
                        <p data-id="<?= $order['id']; ?>" class="order_tab"><?= $order['date']; ?></p>
                        <img width="16" height="16" src="<?=$icons['close_b'];?>" data-id="<?= $order['id']; ?>">
                    </div>
                <? endfor; else: echo 'Список заказов пуст.'; endif; ?>
            </div>

            <div class="pagination">
                <?php if(isset($previous) and $previous): echo "<a href='/" . $previous . "'>Назад</a>"; endif; ?>
                <?php if(isset($next) and $next): echo "<a href='/" . $next . "'>Вперёд</a>"; endif; ?>
            </div>

        </div>

        <div class="information_content">

            <div class="tariffs_tabs overflow" onclick="getInfo('tariff')">
                <h2>Тарифы</h2>

                <? if($countC): for($j=0; $j<$countT; $j++): $tariff = $tariffs[$j]; ?>

                    <p data-tariff="<?= $i; ?>" data-id="<?= $tariff['id']; ?>" class="tariff_tab"><?= $tariff['name']; ?></p>

                <? endfor; else: echo 'Список тарифов пуст.'; endif; ?>
            </div>
        </div>

        <div class="information_content">

            <div class="option_tabs overflow" onclick="getInfo('option')">
                <h2>Опции</h2>

                <? if($countC): for($j=0; $j<$countC; $j++): $option = $calculator[$j]; ?>

                    <p data-option="<?= $i; ?>" data-id="<?= $option['id']; ?>" class="option_tab"><?= $option['name']; ?></p>

                <? endfor; else: echo 'Список опций пуст.'; endif; ?>
            </div>
        </div>
    </div>
</div>