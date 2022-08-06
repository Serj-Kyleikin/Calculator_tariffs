<?php

    $offer = $page[0]['dynamic']['content']['offers'];
    $calculator = $page[0]['dynamic']['content']['calculator'];
    $icons = $this->icons['page'];

    // Стартовая цена

    $price = ($offer['price'] * 6) + ($calculator['count'][1]['price'] * 3) + $calculator['button'][1]['price'];
?>

<h2>Рассчитать стоимость заказа</h2>

<div class="calculator">
    <div class="left">
        <h3>Выберите тариф:</h3>
        <div class="config">
            <div class="show_choosed">
                <div class="choosed" data-id="<?=$offer['id'];?>">
                    <img loading="lazy" width="20" height="20" class="Blocked" src="<?=$icons['delete'];?>" onclick="deleteTariff(this)">
                    <p><?=$offer['name'];?></p>
                    <b><?=$offer['price'];?> &#8381;/мес.</b>
                    <span><?=$offer['description'];?></span>
                </div>
            </div>
            <p class="add" onmouseover="hover(this)">
                <img loading="lazy" width="20" height="20" src="<?=$icons['add'];?>">ДОБАВИТЬ ЕЩЁ
            </p>
            <div class="background" onclick="closeTariffs()"></div>
            <div class="modal">
                <div class="header">
                    <p>Доступные тарифы:</p>
                    <img loading="lazy" width="20" height="20" src="<?=$icons['close_b'];?>" onclick="closeTariffs()">
                </div>
                <div class="tariffs"></div>
                <div class="apply" onclick="apply()">Применить</div>
            </div>
        </div>
        <hr>
        <h3>Параметры аккаунта:</h3>
        <div class="options">
            <? for($i=0; $i<count($calculator['count']); $i++): $option = $calculator['count'][$i]; ?>
                <div class="option">
                    <p>
                        <? if($option['hint']): ?>
                            <img loading="lazy" width="16" height="16" class="nameO" src="<?=$icons['hint']; ?>" onclick="createHint(this)" data-hint="<?= $option['hint']; ?>"> 
                        <? endif; ?>
                        <?= $option['name']; echo ($option['price'])? '<b>' . $option['price'] . ' &#8381;/шт.</b>' : '' ?></b>
                    </p>
                    <div>
                        <img loading="lazy" width="16" height="16" class="Blocked" src="<?=$icons['minus']; ?>" onclick="countParams(this, '-')">
                        <input type="text" min="<?=$option['option'];?>" value="<?= $option['option']; ?>"
                            onkeypress='return event.charCode >= 48 && event.charCode <= 57' onblur="correct(this)"
                            id="<?= $option['item']; ?>" <?= ($option['price'])? "data-price='" . $option['price'] . "'" : ''; ?>>
                        <img loading="lazy" width="16" height="16" src="<?=$icons['plus']; ?>" onclick="countParams(this, '+')">
                    </div>
                </div>
            <? endfor; ?>
        </div>
        <hr>
        <h3>Способы доступа:</h3>
        <div class="advance">
            <? for($i=0; $i<count($calculator['button']); $i++): $option = $calculator['button'][$i]; ?>
                <div>
                    <p>
                        <? if($option['hint']): ?>
                            <img loading="lazy" width="16" height="16" class="nameA" src="<?=$icons['hint']; ?>" onclick="createHint(this)" data-hint="<?= $option['hint']; ?>"> 
                        <? endif; ?>
                        <?= $option['name']; ?> 
                        <b><?= $option['price']; ?> &#8381;</b>
                    </p>
                    <img loading="lazy" width="48" height="24" onclick="setOption(this)"
                    class="button<?= ($option['recommend']) ? ' Active' : '';?>" 
                    src="<?= ($option['recommend']) ? $icons['button_on'] : $icons['button'];?>" 
                    data-id="<?= $option['id']; ?>" data-price="<?= $option['price']; ?>">
                </div>
            <? endfor; ?>
        </div>
    </div>
    <div class="right">
        <h3>Итоговая стоимость</h3>
        <p class="">Выберите период (месяцев) действия тарифа:</p>
        <div class="periods" onclick="countPeriods()">
            <p>3</p>
            <p class="Active">6</p>
            <p>12</p>
        </div>
        <div class="price"><?= $price; ?> &#8381;</div>
        <p class="form" onclick="addOrder(this)">Оформить<span>&nbsp;заявку</span></p>
    </div>
</div>