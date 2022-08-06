
let path = "/public/screenshots/calculator/",
   modal = document.querySelector('.modal'),
 tariffs = document.querySelector('.tariffs');

function hover(item) {

    item.children[0].src = path + 'offer_aH.svg';
    item.onclick = openTariffs;
    item.onmouseout = () => { item.children[0].src = path + 'offer_a.svg'; };
}

// Открытие окна со списком конфигурации

async function openTariffs() {

    if(!document.querySelector('.tariff')) {

        let formData = new FormData();
        formData.append('ajaxSettings', 'page:Main:getTariffs');

        let data = await fetch('/Ajax.php', {
            method: 'POST',
            body: formData
        });

        let response = await data.json();

        for(let i of response) {

            let DIV = document.createElement('div');
            DIV.className = 'tariff';
            DIV.dataset.id = i.id;
            tariffs.append(DIV);

            let A = '', value = null;

            if(i.id == 1) {
                DIV.className += ' Actived';
                value = i.id;
                A = '_A';
            }

            DIV.dataset.status = value;

            DIV.onclick = function() {
                getTariff(this, i.id);
            };

            let img = new Image();
            img.width = '28';
            img.height = '28';
            img.src = path  + 'input' + A + '.svg';
            DIV.append(img);

            let fields = {
                p: i.name,
                b: i.price,
                span: i.description
            };

            for(let tag in fields) {

                let el = document.createElement(tag);
                el.textContent = fields[tag];
                DIV.append(el);
                if(tag == 'b') el.insertAdjacentHTML("beforeend", " &#8381;/мес");
            }
        }
    }

    // Удаление подсказки, если она открыта

    let check = document.querySelector('.hint');
    if(check) check.remove();

    modal.className = 'modal Open';
    document.querySelector('.background').style.width = '100%';

    // Закрытие окна при нажатии escape

    function close() {

        if(event.keyCode == 27) {

            closeTariffs();
            this.removeEventListener('keyup', close);

        } else if(!document.querySelector('.Open')) this.removeEventListener('keyup', close);
    }

    document.addEventListener('keyup', close);
}

// Закрытие окна со списком конфигурации

function closeTariffs() {

    // Восстановление активированных ранее позиций, если они были изменены без сохранения

    let choosed = document.querySelectorAll('.choosed'),
        tariffs = document.querySelectorAll('.tariff'),
            ids = [], A, value;

    choosed.forEach((item) => {
        ids.push(item.dataset.id);
    });

    tariffs.forEach((item) => {

        A = '', value = null;

        if(ids.includes(item.dataset.id)) {

            A = '_A';
            value = item.dataset.id;
            item.classList.add("Actived");
        }

        item.children[0].src = path + 'input' + A + '.svg';
        item.dataset.status = value;
    });

    // Удаление подсказки

    let hint = document.querySelector('.error');

    if(hint) {

        let button = document.querySelector('.apply');

        button.className = 'apply';
        button.style.background = '#1E1E23';
        hint.remove();
    }

    modal.className = 'modal';
    document.querySelector('.background').style.width = '0';
}

// Выбор из списка конфигураций

function getTariff(tariff, id) {

    let name = 'tariff', status = 'apply', A = '', value = null;

    if(tariff.dataset.status != id) {

        A = '_A';
        value = id;
        name += ' Actived';
    }

    tariff.className = name;
    tariff.dataset.status = value;
    tariff.children[0].src = path + 'input' + A + '.svg';

    // Подсказка, что нужно выбрать хоть одну конфигурацию

    let button = document.querySelector('.apply'),
         error = document.querySelector('.error');

    if(error) {
        button.style.background = '#1E1E23';
        error.remove();
    }

    if(document.querySelectorAll('.tariff.Actived').length == 0) {

        let DIV = document.createElement('div');
        DIV.className = 'error';
        DIV.textContent = 'Выберите хотя бы одну конфигурацию!';
        button.parentNode.append(DIV);

        status += ' Blocked';
        button.style.background = '#D8D8E7';
    }

    button.className = status;
}

// Кнопка - применить выбор тарифов

function apply() {

    if(!document.querySelector('.apply.Blocked')) {

        document.querySelector('.show_choosed').innerText = '';

        let tariffs = document.querySelectorAll('.tariff.Actived');

        tariffs.forEach((item) => {
            showTariffs(item, item.dataset.status, tariffs.length);
        });

        modal.className = 'modal';
        document.querySelector('.background').style.width = '0';

        showNewPrice();
    }
}

// Отображение выбранных тарифов

function showTariffs(tariff, id, length) {

    let show = document.querySelector('.show_choosed'), I = '';

    let DIV = document.createElement("div");
    DIV.className = 'choosed';
    DIV.dataset.id = id;
    show.append(DIV);

    let img = new Image();
    img.width = "20";
    img.height = "20";

    if(length == 1) {

        img.className = 'Blocked';
        I = 'I';
    }

    img.src = path + 'offer_d' + I + '.svg';
    DIV.append(img);

    img.onclick = function() {
        deleteTariff(this, id);
    };

    let fields = {
        p: tariff.children[1].textContent,
        b: tariff.children[2].textContent,
        span: tariff.children[3].textContent
    };

    for(let tag in fields) {

        let elem = document.createElement(tag);
        elem.textContent = fields[tag];
        DIV.append(elem);
    }
}

// Удаление выбранной конфигурации с экрана

function deleteTariff(tariff, id) {

    if(!document.querySelector('.choosed .Blocked')) {

        // Удаление выбранных тарифов в модальном окне

        let Actived = document.querySelectorAll('.tariff.Actived');

        Actived.forEach((item) => {

            if(item.dataset.id == id) {

                item.className = 'tariff';
                item.dataset.status = null;
                item.children[0].src = path + "input.svg";
            } 
        });

        tariff.parentNode.remove();

        // Проверка последний ли оставшийся тариф

        let tariffs = document.querySelectorAll('.choosed');

        if(tariffs.length == 1) {
            tariffs[0].children[0].className = 'Blocked';
            tariffs[0].children[0].src = path + "offer_dI.svg";
        }

    } else createHint(0);
}

// Подсказка нельзя удалить единственную выбранную конфигурацию

function createHint(i) {

    let codes = {
        0: {
            0: document.querySelector('.show_choosed'),
            1: 'Нельзя удалить единственный выбранный тариф!'
        }
    };

    if(typeof(i) != 'number') {
        codes[0][0] = i.parentNode;
        codes[0][1] = i.dataset.hint;
        i = 0;
    }

    let DIV = document.createElement("div");
    DIV.className = 'hint';
    DIV.textContent = codes[i][1];
    codes[0][0].append(DIV);

    let img = new Image();
    img.src = path + 'close_w.svg';
    DIV.append(img);

    function close() {
        DIV.remove();
        this.removeEventListener('click', close, true);
    }

    document.addEventListener('click', close, true);
    img.onclick = close;
}

// Выбор параметров аккаунта

function countParams(item, choise) {

    if(item.className != 'Blocked') {

        let block = item.parentNode, button = block.children[0], show = block.children[1], 
              min = show.min, number = Number(show.value), A = 'A', value = '';

        if(choise == "-") {

            if(number != min) show.value = number - 1;
            if((number - 1) == min) {
                A = '';
                value = 'Blocked';
            } 
    
        } else show.value = number + 1;
    
        button.className = value;
        button.src = path + "option_d" + A + ".svg";
    
        showNewPrice();
    }
}

// Корректное отображение кнопок счётчиков

function correct(item) {

    if(item.value < item.min) {
        item.value = item.min;
        item.previousElementSibling.src = path + 'option_d.svg';
    }
}

function setOption(item) {

    let A = (item.className == 'button Active') ? '' : '_on';

    item.src = path + 'button' + A + '.svg';
    item.classList.toggle('Active');

    showNewPrice();
}

// Выбор периода

function countPeriods() {

    if(event.target.className != 'Active') {

        document.querySelector('.periods .Active').className = '';
        event.target.className = 'Active';

        showNewPrice();
    }
}

// Показ сформированной цены

function showNewPrice() {

    let users = Number(document.getElementById('users').value),
        bases = document.getElementById('bases'), countB = Number(bases.value), priceB = Number(bases.dataset.price),
      buttons = document.querySelectorAll('.button.Active'), countO = 0,
       period = Number(document.querySelector('.periods .Active').textContent.trim()),
      tariffs = document.querySelectorAll('.choosed'), price = 0;

    for(let i of tariffs) price += Number(i.children[2].textContent.replace(/[^0-9]/g, ""));
    for(let i of buttons) countO += Number(i.dataset.price);

    let newPrice = String(((price * period) * users) + (priceB * countB) + countO) + ' ₽';

    document.querySelector('.price').textContent = newPrice;
}

// Создание заказа

async function addOrder(item) {

    if(item.dataset.status != 'done') {

        if(confirm('Вы подтверждаете создание заказа?')) {

            let formData = new FormData();
            formData.append('ajaxSettings', 'page:Main:addOrder');

            let obj = {}, options = [], tariffs = [], 
            choosed = document.querySelectorAll('.choosed'),
            buttons = document.querySelectorAll('.button.Active');

            choosed.forEach((item) => {
                tariffs.push(item.dataset.id);
            });

            buttons.forEach((item) => {
                options.push(item.dataset.id);
            });

            obj.offers = tariffs;
            obj.calculator = options;
            obj.users = document.getElementById('users').value;
            obj.bases = document.getElementById('bases').value;
            obj.period = document.querySelector('.periods .Active').textContent;

            formData.append('order', JSON.stringify(obj));

            let data = await fetch('/Ajax.php', {
                method: 'POST',
                body: formData
            });

            let response = await data.text();

            if(response == 'Оформлено') {

                item.textContent = response;
                item.dataset.status = 'done';

            } else {

                let p = document.createElement('p');
                p.className = 'register';
                p.textContent = response;
                item.after(p);
            }
        }
    }
}