//*********** Вкладки меню ***********//

document.querySelectorAll('.information_tab').forEach((item) => {
   item.onclick = function() {
       document.querySelector('.information_content.active').classList.remove('active');
       document.querySelector('.information_show').children[item.dataset.tab].classList.add('active');
   } 
});

// Содержимое меню

let DIV, selector, node, date;

async function getInfo(entity) {

    let item = event.target;

    if(item.tagName == 'P') {

        let show = document.querySelector("." + entity + "[data-id='" + item.dataset.id + "']");

        if(!show) {

            let formData = new FormData();
            formData.append('ajaxSettings', 'plugins:cabinet:getInfo');
            formData.append('id', item.dataset.id);
            formData.append('entity', entity);

            let data = await fetch('/Ajax.php', {
                method: 'POST',
                body: formData
            });

            let response = await data.json();

            DIV = document.createElement('div');
            DIV.className = entity + ' actived';
            DIV.dataset.id = item.dataset.id;

            if(entity == 'order') {

                node = item.nextElementSibling;
                date = item.textContent;

            } else node = item;

            node.after(DIV);

            let methods = {
                'order': renderOrder,
                'tariff': renderTariff,
                'option': renderOption
            };

            methods[entity](response);

        } else show.classList.toggle('actived');

    } else if(item.tagName == 'IMG') deleteItem(item);
}

function renderOrder(response) {

    selector = 'block';

    create('div', 'Заказчик:', response.user.name);
    create('div', 'На сумму:', response.price + ' ₽');
    create('hr');
    create('h3', 'Тарифы:');

    for(let i = 0; i < response.order.offers.length; i++) {
        create('div', response.order.offers[i].name, response.order.offers[i].price  + ' ₽');
    }

    create('hr');
    create('div', 'Пользователей:', response.order.users);
    create('div', 'Баз данных:', response.order.bases);
    create('div', 'На период:', response.order.period);
    create('hr');

    if(response.order.hasOwnProperty('calculator')) {

        create('h3', 'Выбранные опции:');

        for(let i = 0; i < response.order.calculator.length; i++) {
            create('div', response.order.calculator[i].name, response.order.calculator[i].price  + ' ₽');
        }

        create('hr');
    }

    create('div', 'Дата:', date);
}

function renderTariff(response) {

    selector = 'form';

    create('div', 'Имя:', response.name);
    create('div', 'Цена:', response.price);
    create('div', 'Описание:', response.description);
    create('button');
}

function renderOption(response) {

    selector = 'form';

    create('div', 'Тип:', response.type);
    create('div', 'ID:', response.item);
    create('div', 'Имя:', response.name);
    create('div', 'Цена:', response.price);
    create('div', 'Рекомендация:', response.recommend);
    create('div', 'Опция:', response.option);
    create('div', 'Подсказка:', response.hint);
    create('button');
}

function create(elem, name = [], value = []) {

    let node = document.createElement(elem);
    DIV.append(node);

    if(selector == 'block') {

        if(elem == 'div') {

            node.className = selector;
    
            let p = document.createElement('p');
            p.textContent = name;
            node.append(p);
    
            let span = document.createElement('span');
            span.textContent = value;
            node.append(span);

        } else if(elem == 'h3') node.textContent = name;

    } else if(selector == 'form') {

        if(elem == 'div') {

            node.className = selector;

            let label = document.createElement('label');
            label.textContent = name;
            node.append(label);

            if(name == 'Тип:') {

                let select = document.createElement('select');
                node.append(select);

                let options = {
                    'button': 'Кнопка',
                    'count': 'Счётчик'
                };

                for(let i in options) {

                    let option = document.createElement('option');
                    if(value == i) option.selected = true;
                    option.value = i;
                    option.textContent = options[i];
                    select.append(option);
                }

            } else {

                let input = document.createElement('input');

                if(name == 'Рекомендация:') {

                    label.className = 'mobile';
                    node.className += ' row';

                    input.type="checkbox";
                    input.className = 'recommend';

                    if(value) {

                        input.checked = true;
                        input.value = 1;

                    } else input.value = 0;

                    input.onclick = (e) => {
                        e.target.value = (e.target.value == 1) ? 0 : 1;
                    };

                } else input.value = value;

                node.append(input);
            }

        } else {

            node.type = 'submit';
            node.textContent = 'Сохранить';

            node.onclick = function() {
                update(DIV);
            };
        }
    }
}

async function deleteItem(item) {

    if(confirm("Вы подтверждаете удаление?")) {

        let formData = new FormData();
        formData.append('ajaxSettings', 'plugins:cabinet:deleteItem');
        formData.append('id', item.dataset.id);

        await fetch('/Ajax.php', {
            method: 'POST',
            body: formData
        });

        item.parentNode.remove();

        if(!document.querySelector('.order_tab')) document.querySelector('.orders_tabs').append('Список заказов пуст.');
    }
}

//*********** Обновление настроек калькулятора и тарифов ***********//

async function update(node) {

    let formData = new FormData();
    formData.append('ajaxSettings', 'plugins:cabinet:updateSettings');
    formData.append('id', node.dataset.id);
    formData.append('entity', node.className);

    let inputs = node.querySelectorAll('.form'), c = 0;

    for(let i of inputs) {
        formData.append(c + '_', i.children[1].value);
        c++;
    }

    await fetch('/Ajax.php', {
        method: 'POST',
        body: formData
    });

    formData = null;
}