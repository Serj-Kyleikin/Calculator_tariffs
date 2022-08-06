<?php

// \$ - экранирование

return [

        'core' => [
                "INSERT INTO settings_pages(
                        id, 
                        name, 
                        title, 
                        description, 
                        h1, 
                        annotation,
                        scripts
                ) VALUES(
                        '1', 
                        'main', 
                        'Главная страница сайта', 
                        'Описание главной страницы сайта', 
                        'Заголовок страницы', 
                        'Добро пожаловать на сайт',
                        'main.js,'
                )",
                "INSERT INTO icons(
                        type, 
                        name, 
                        image, 
                        description
                ) VALUES(
                        'general', 
                        'favicon', 
                        'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHZpZXdCb3g9IjAgMCAyMCAyMCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHJlY3QgeD0iMS42NjY3NSIgeT0iOS4xNjY2OSIgd2lkdGg9IjE2LjY2NjciIGhlaWdodD0iMS42NjY2NyIgcng9IjAuODMzMzM0IiBmaWxsPSIjNDk4RUY1Ii8+CjxyZWN0IHg9IjEwLjgzMzMiIHk9IjEuNjY2NjkiIHdpZHRoPSIxNi42NjY3IiBoZWlnaHQ9IjEuNjY2NjciIHJ4PSIwLjgzMzMzMyIgdHJhbnNmb3JtPSJyb3RhdGUoOTAgMTAuODMzMyAxLjY2NjY5KSIgZmlsbD0iIzQ5OEVGNSIvPgo8L3N2Zz4K', 
                        'Favicon'
                )",
                "INSERT INTO icons(
                        type, 
                        name, 
                        image, 
                        description
                ) VALUES(
                        'header', 
                        'main', 
                        'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABcAAAAXCAQAAABKIxwrAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAmJLR0QAAKqNIzIAAAAJcEhZcwAADdcAAA3XAUIom3gAAAAHdElNRQfjAgUXKSkOh9KsAAABLUlEQVQ4y7XSMWuTURTG8edNnVrcCxYF3TNIQD+CCLW42G/Q1al0VXBoRxfXFgcH0UGXTMFOjShV3AuFDu1mbYPp4pufQ1+FNG+iBvwv93LO/x7OAzf5nxR1RfeylDfF2yTxOPNJusVW7XuFNQPwVCPxFbTr5TmvwQl4ZXaCbsEnsOmyTbDr+xjdLUcYeKTpnaaHfvjFRd0DffQsuesEPffd8a1GV3higH1Na8pKGVjXtA+6iovxdlz13DAvLdiuYs8lccVH8MJ1H4zy2Y0q9hfXYg+lVTcdqOfQbatK7MWKU4uWnRnPmWWLTq0kMZtom0z73GskRf8vv1c/adTUO2mllVY6o61LNfpxsZskjkdbddMnMKVe/sErh3ffSC8z1f19dXbjt/zs37aYjp9t53KEqohgLAAAACV0RVh0ZGF0ZTpjcmVhdGUAMjAxOS0wMi0wNVQyMjo0MTo0MSswMTowMJ5XzZkAAAAldEVYdGRhdGU6bW9kaWZ5ADIwMTktMDItMDVUMjI6NDE6NDErMDE6MDDvCnUlAAAAGXRFWHRTb2Z0d2FyZQB3d3cuaW5rc2NhcGUub3Jnm+48GgAAAABJRU5ErkJggg==', 
                        'Иконка меню - на главную'
                )",
                "INSERT INTO icons(
                        type, 
                        name, 
                        image, 
                        description
                ) VALUES(
                        'header', 
                        'cabinet', 
                        'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYEAQAAAAa7ikwAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAmJLR0QAAKqNIzIAAAAJcEhZcwAAAGAAAABgAPBrQs8AAAAHdElNRQfmAwoQCzGK2LIKAAADgUlEQVRIx42TW2hcdRDGf2cvMWlaNyaQKE1qk5jYaMVLQNRYiJQUtVW3Sqg0hSaIrU++GI2IL0JlqT5oX4qVllhFKl2hXlIMxaAN1mKRFqyWXNAEYk1Nom5MuuxmL58P//92zya7dj84zJyZby5nzgzkgVT4cfkrjFzbLA2dks48I63/wPoCGW6+xOXXEqbZLXk6lhXxSviNXjMqhY/pGr78Qqp92fJKABx3cmANsACV30FwBDb5oTwO4144UQM/hoAzJuKGCBx+GnYN5bb56WvQfRNcfcVxcrv3mcq3dkknE1L6rHJwpUzqvqw0tYZXskF6381JGTE5J9V1rBiRCfJ+Lh2acQUlrFwyYjog3Rc2XM+gFHpC0rHcRiZ2SXWPZAp4css0fA/bajM1AZ/V/UAKbo7AU0eNqXQMNjYAzy7rNWEfcCWwqB2Gyhfsi7Ms0DbTfCc4LRB9EU43wVbAeZcCWFYgehskYlCaj5sASmDxFOgCrO6Dx3/5v+R5RjTaDxfftC8LLkfKJE9GYGjYmBb3w0ALqKvYAg5EfPDWHvj7RszKZuA1IrwBBiaMvjoCWyrA+ZhiIOFkj+mxk9Lp/VJ0vZRakqb2SaGkVFWT5VTHpdF7tQITD0q1/2R4Hpvcj9kaoKodymIw1QmLP0G6Aebuh3gQ6vvA22F/XwicSJ6h+MH/qLvzUrvXASl4j3S2VEr0Ky/C26WyI9Kmr6UT41LsgZWc+JQ0MC1t/llp7sgc2HvSS89L//bkOTKL+X6p/ROp7SPp93KXI+rSY1l1+m4p+I0tsHtMiu6wnoX83Q+3ShWD0vFfreGqCsPmOH8IqWW7NNprHYuFYz6clao7pEuVyxzpArqk5O0e6O6B5rftLykvvGfJo+DZCd6/XMaIWW91QjpmdOazt+Md8cC2c9aQvs4mtwJXgB9ctgqYPAd79sJzr8J4GAi4b8cHDU15ji4fZoFVQFWu+fi3cLjP6OtG4I3OzIICjg9KmygKThNoM3ALEM/a6xthzSVIzUPjFncA0OoDNhZXoGoSlgZhdh802xnjheBFqO6FVADaxl3j9sBMGBWN316X1l2Q+tYWuIEMXOt7sNEDkztcbarwF9TXQ9cCHDkPnx2wxjJXXCZ2lRFftUOoB2nnk9JE73XaTxrxx4TUNiPVPCS9MyZN75XSl128u6Q/56SDD0t1ByT4D0HCoh/QEdpKAAAAJXRFWHRkYXRlOmNyZWF0ZQAyMDIyLTAzLTEwVDE2OjExOjM4KzAwOjAwqPohSQAAACV0RVh0ZGF0ZTptb2RpZnkAMjAyMi0wMy0xMFQxNjoxMTozOCswMDowMNmnmfUAAAAASUVORK5CYII=', 
                        'Иконка меню - кабинет'
                )"
        ],
        'plugins' => [
                "INSERT INTO settings_plugins(
                        id, 
                        plugin_name, 
                        name, 
                        title, 
                        description, 
                        h1, 
                        annotation, 
                        scripts
                ) VALUES(
                        '1', 
                        'cabinet', 
                        'cabinet', 
                        'Кабинет пользователя', 
                        'Описание кабинета пользователя', 
                        'Кабинет пользователя', 
                        'Добро пожаловать!', 
                        'cabinet.min.js,'
                )",
                "INSERT INTO settings_plugins(
                        id, 
                        plugin_name, 
                        name, 
                        title, 
                        description, 
                        h1, 
                        annotation, 
                        scripts
                ) VALUES(
                        '2', 
                        'users', 
                        'authorization', 
                        'Страница авторизации', 
                        'Описание страницы авторизации', 
                        'Страница авторизации', 
                        'Добро пожаловать!', 
                        'users.min.js,'
                )",
                "INSERT INTO plugin_users_registered(
                        id, 
                        login, 
                        password, 
                        password_hash
                ) VALUES(
                        '1', 
                        'admin', 
                        'admin', 
                        '$2y$10\$UxZi4pfbxXAoyiawbL4dteGxxtnrjcUYPiNGf0gEUC5nuCW4JrX16'
                )",
                "INSERT INTO plugin_users_secure(
                        user_id, 
                        secret
                ) VALUES(
                        '1', 
                        'd2315af356f82b6574816d84708e'
                )",
                "INSERT INTO plugin_users_personal(
                        user_id, 
                        name, 
                        mail
                ) VALUES(
                        '1', 
                        'Администратор',
                        'admin@mail.ru'
                )"
        ],
        'content' => [
                "INSERT INTO icons(
                        type, 
                        page, 
                        name, 
                        image, 
                        description
                ) VALUES(
                        'page', 
                        ':main,', 
                        'hint', 
                        'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTYiIGhlaWdodD0iMTciIHZpZXdCb3g9IjAgMCAxNiAxNyIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPGNpcmNsZSBjeD0iOCIgY3k9IjguNSIgcj0iNy41IiBmaWxsPSJ3aGl0ZSIgc3Ryb2tlPSIjMUUxRTIzIi8+CjxwYXRoIGQ9Ik01LjgwMjQgNC42NzAwM0M1LjkyNjQgNC41NTQwMyA2LjA2MjQgNC40NDQwMyA2LjIxMDQgNC4zNDAwM0M2LjM2MjQgNC4yMzYwMyA2LjUyNjQgNC4xNDQwMyA2LjcwMjQgNC4wNjQwM0M2Ljg4MjQgMy45ODQwMyA3LjA3NDQgMy45MjIwMyA3LjI3ODQgMy44NzgwM0M3LjQ4NjQgMy44MzAwMyA3LjcxMDQgMy44MDYwMyA3Ljk1MDQgMy44MDYwM0M4LjI2NjQgMy44MDYwMyA4LjU1ODQgMy44NTIwMyA4LjgyNjQgMy45NDQwM0M5LjA5ODQgNC4wMzYwMyA5LjMzMjQgNC4xNjYwMyA5LjUyODQgNC4zMzQwM0M5LjcyNDQgNC41MDIwMyA5Ljg3ODQgNC43MDYwMyA5Ljk5MDQgNC45NDYwM0MxMC4xMDI0IDUuMTg2MDMgMTAuMTU4NCA1LjQ1NjAzIDEwLjE1ODQgNS43NTYwM0MxMC4xNTg0IDYuMDYwMDMgMTAuMTEyNCA2LjMyMjAzIDEwLjAyMDQgNi41NDIwM0M5LjkzMjQgNi43NjIwMyA5LjgxODQgNi45NTYwMyA5LjY3ODQgNy4xMjQwM0M5LjU0MjQgNy4yODgwMyA5LjM5MjQgNy40MzIwMyA5LjIyODQgNy41NTYwM0M5LjA2ODQgNy42NzYwMyA4LjkxNjQgNy43OTAwMyA4Ljc3MjQgNy44OTgwM0M4LjYyODQgOC4wMDYwMyA4LjUwNDQgOC4xMTQwMyA4LjQwMDQgOC4yMjIwM0M4LjMwMDQgOC4zMzAwMyA4LjI0MjQgOC40NTAwMyA4LjIyNjQgOC41ODIwM0w4LjExODQgOS41MDAwM0g3LjM4NjRMNy4zMTQ0IDguNTA0MDNDNy4yOTg0IDguMzI0MDMgNy4zMzI0IDguMTY4MDMgNy40MTY0IDguMDM2MDNDNy41MDA0IDcuOTAwMDMgNy42MTA0IDcuNzc0MDMgNy43NDY0IDcuNjU4MDNDNy44ODI0IDcuNTM4MDMgOC4wMzI0IDcuNDIyMDMgOC4xOTY0IDcuMzEwMDNDOC4zNjA0IDcuMTk0MDMgOC41MTI0IDcuMDY2MDMgOC42NTI0IDYuOTI2MDNDOC43OTY0IDYuNzg2MDMgOC45MTY0IDYuNjI4MDMgOS4wMTI0IDYuNDUyMDNDOS4xMDg0IDYuMjcyMDMgOS4xNTY0IDYuMDU4MDMgOS4xNTY0IDUuODEwMDNDOS4xNTY0IDUuNjM4MDMgOS4xMjI0IDUuNDgyMDMgOS4wNTQ0IDUuMzQyMDNDOC45ODY0IDUuMjAyMDMgOC44OTQ0IDUuMDg0MDMgOC43Nzg0IDQuOTg4MDNDOC42NjI0IDQuODg4MDMgOC41MjQ0IDQuODEyMDMgOC4zNjQ0IDQuNzYwMDNDOC4yMDg0IDQuNzA4MDMgOC4wNDA0IDQuNjgyMDMgNy44NjA0IDQuNjgyMDNDNy42MTY0IDQuNjgyMDMgNy40MDY0IDQuNzEyMDMgNy4yMzA0IDQuNzcyMDNDNy4wNTg0IDQuODMyMDMgNi45MTI0IDQuODk4MDMgNi43OTI0IDQuOTcwMDNDNi42NzI0IDUuMDQyMDMgNi41NzQ0IDUuMTA4MDMgNi40OTg0IDUuMTY4MDNDNi40MjY0IDUuMjI4MDMgNi4zNjY0IDUuMjU4MDMgNi4zMTg0IDUuMjU4MDNDNi4yMTg0IDUuMjU4MDMgNi4xNDA0IDUuMjEyMDMgNi4wODQ0IDUuMTIwMDNMNS44MDI0IDQuNjcwMDNaTTYuOTcyNCAxMS44NEM2Ljk3MjQgMTEuNzM2IDYuOTkwNCAxMS42MzggNy4wMjY0IDExLjU0NkM3LjA2NjQgMTEuNDU0IDcuMTE4NCAxMS4zNzQgNy4xODI0IDExLjMwNkM3LjI1MDQgMTEuMjM4IDcuMzMwNCAxMS4xODQgNy40MjI0IDExLjE0NEM3LjUxNDQgMTEuMTA0IDcuNjEyNCAxMS4wODQgNy43MTY0IDExLjA4NEM3LjgyMDQgMTEuMDg0IDcuOTE4NCAxMS4xMDQgOC4wMTA0IDExLjE0NEM4LjEwMjQgMTEuMTg0IDguMTgyNCAxMS4yMzggOC4yNTA0IDExLjMwNkM4LjMxODQgMTEuMzc0IDguMzcyNCAxMS40NTQgOC40MTI0IDExLjU0NkM4LjQ1MjQgMTEuNjM4IDguNDcyNCAxMS43MzYgOC40NzI0IDExLjg0QzguNDcyNCAxMS45NDggOC40NTI0IDEyLjA0OCA4LjQxMjQgMTIuMTRDOC4zNzI0IDEyLjIyOCA4LjMxODQgMTIuMzA2IDguMjUwNCAxMi4zNzRDOC4xODI0IDEyLjQ0MiA4LjEwMjQgMTIuNDk0IDguMDEwNCAxMi41M0M3LjkxODQgMTIuNTcgNy44MjA0IDEyLjU5IDcuNzE2NCAxMi41OUM3LjYxMjQgMTIuNTkgNy41MTQ0IDEyLjU3IDcuNDIyNCAxMi41M0M3LjMzMDQgMTIuNDk0IDcuMjUwNCAxMi40NDIgNy4xODI0IDEyLjM3NEM3LjExODQgMTIuMzA2IDcuMDY2NCAxMi4yMjggNy4wMjY0IDEyLjE0QzYuOTkwNCAxMi4wNDggNi45NzI0IDExLjk0OCA2Ljk3MjQgMTEuODRaIiBmaWxsPSIjMUUxRTIzIi8+Cjwvc3ZnPgo=', 
                        'Иконка калькулятора - подсказка для опций'
                )",
                "INSERT INTO icons(
                        type, 
                        page, 
                        name, 
                        image, 
                        description
                ) VALUES(
                        'page', 
                        ':main,', 
                        'minus', 
                        'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTYiIGhlaWdodD0iMiIgdmlld0JveD0iMCAwIDE2IDIiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxyZWN0IHdpZHRoPSIxNiIgaGVpZ2h0PSIyIiByeD0iMSIgZmlsbD0iI0Q4RDhFNyIvPgo8L3N2Zz4K', 
                        'Иконка калькулятора - знак минус (Неактивный)'
                )",
                "INSERT INTO icons(
                        type, 
                        page, 
                        name, 
                        image, 
                        description
                ) VALUES(
                        'page', 
                        ':main,', 
                        'plus', 
                        'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTYiIGhlaWdodD0iMTYiIHZpZXdCb3g9IjAgMCAxNiAxNiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHJlY3QgeT0iNyIgd2lkdGg9IjE2IiBoZWlnaHQ9IjIiIHJ4PSIxIiBmaWxsPSIjOEQ4REE4Ii8+CjxyZWN0IHg9IjciIHk9IjE2IiB3aWR0aD0iMTYiIGhlaWdodD0iMiIgcng9IjEiIHRyYW5zZm9ybT0icm90YXRlKC05MCA3IDE2KSIgZmlsbD0iIzhEOERBOCIvPgo8L3N2Zz4K', 
                        'Иконка калькулятора - знак плюс'
                )",
                "INSERT INTO icons(
                        type, 
                        page, 
                        name, 
                        image, 
                        description
                ) VALUES(
                        'page', 
                        ':main,', 
                        'delete', 
                        'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHZpZXdCb3g9IjAgMCAyMCAyMCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHJlY3QgeD0iMy40MTQzMSIgeT0iMiIgd2lkdGg9IjIwIiBoZWlnaHQ9IjIiIHJ4PSIxIiB0cmFuc2Zvcm09InJvdGF0ZSg0NSAzLjQxNDMxIDIpIiBmaWxsPSIjRkZEMEQwIi8+CjxyZWN0IHg9IjE3LjU1NjQiIHk9IjMuNDE0MTgiIHdpZHRoPSIyMCIgaGVpZ2h0PSIyIiByeD0iMSIgdHJhbnNmb3JtPSJyb3RhdGUoMTM1IDE3LjU1NjQgMy40MTQxOCkiIGZpbGw9IiNGRkQwRDAiLz4KPC9zdmc+Cg==', 
                        'Иконка калькулятора - удалить выбранный тариф (Неактивно)'
                )",
                "INSERT INTO icons(
                        type, 
                        page, 
                        name, 
                        image, 
                        description
                ) VALUES(
                        'page', 
                        ':main, :cabinet,', 
                        'close_b', 
                        'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHZpZXdCb3g9IjAgMCAyMCAyMCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHJlY3Qgd2lkdGg9IjIwIiBoZWlnaHQ9IjIiIHJ4PSIxIiB0cmFuc2Zvcm09Im1hdHJpeCgwLjcwNzEwNiAwLjcwNzEwNyAtMC43MDcxMDYgMC43MDcxMDcgMy40MTQzMSAyKSIgZmlsbD0iIzFFMUUyMyIvPgo8cmVjdCB3aWR0aD0iMjAiIGhlaWdodD0iMiIgcng9IjEiIHRyYW5zZm9ybT0ibWF0cml4KC0wLjcwNzEwNiAwLjcwNzEwNyAtMC43MDcxMDYgLTAuNzA3MTA3IDE3LjU1NjQgMy40MTQzMSkiIGZpbGw9IiMxRTFFMjMiLz4KPC9zdmc+Cg==', 
                        'Иконка калькулятора - Закрыть окно (Чёрный)'
                )",
                "INSERT INTO icons(
                        type, 
                        page, 
                        name, 
                        image, 
                        description
                ) VALUES(
                        'page', 
                        ':main,', 
                        'button_on', 
                        'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDgiIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgMCA0OCAyNCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHJlY3Qgd2lkdGg9IjQ4IiBoZWlnaHQ9IjI0IiByeD0iMTIiIGZpbGw9IiM0OThFRjUiLz4KPGNpcmNsZSBjeD0iMzYiIGN5PSIxMiIgcj0iMTAiIGZpbGw9IndoaXRlIiBzdHJva2U9IiM0OThFRjUiIHN0cm9rZS13aWR0aD0iNCIvPgo8L3N2Zz4K', 
                        'Иконка калькулятора - Кнопка опций (Активно)'
                )",
                "INSERT INTO icons(
                        type, 
                        page, 
                        name, 
                        image, 
                        description
                ) VALUES(
                        'page', 
                        ':main,', 
                        'button', 
                        'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDgiIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgMCA0OCAyNCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHJlY3Qgd2lkdGg9IjQ4IiBoZWlnaHQ9IjI0IiByeD0iMTIiIGZpbGw9IiM4RDhEQTgiLz4KPGNpcmNsZSBjeD0iMTIiIGN5PSIxMiIgcj0iMTAiIGZpbGw9IndoaXRlIiBzdHJva2U9IiM4RDhEQTgiIHN0cm9rZS13aWR0aD0iNCIvPgo8L3N2Zz4K', 
                        'Иконка калькулятора - Кнопка опций (Неактивно)'
                )",
                "INSERT INTO icons(
                        type, 
                        page, 
                        name, 
                        image, 
                        description
                ) VALUES(
                        'page', 
                        ':main,', 
                        'add', 
                        'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHZpZXdCb3g9IjAgMCAyMCAyMCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHJlY3QgeD0iMS42NjY3NSIgeT0iOS4xNjY2OSIgd2lkdGg9IjE2LjY2NjciIGhlaWdodD0iMS42NjY2NyIgcng9IjAuODMzMzM0IiBmaWxsPSIjNDk4RUY1Ii8+CjxyZWN0IHg9IjEwLjgzMzMiIHk9IjEuNjY2NjkiIHdpZHRoPSIxNi42NjY3IiBoZWlnaHQ9IjEuNjY2NjciIHJ4PSIwLjgzMzMzMyIgdHJhbnNmb3JtPSJyb3RhdGUoOTAgMTAuODMzMyAxLjY2NjY5KSIgZmlsbD0iIzQ5OEVGNSIvPgo8L3N2Zz4K', 
                        'Иконка калькулятора - Кнопка добавить ещё'
                )",
                "INSERT INTO icons(
                        type, 
                        page, 
                        name, 
                        image, 
                        description
                ) VALUES(
                        'page', 
                        ':cabinet,', 
                        'orders', 
                        'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAQAAABKfvVzAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAmJLR0QAAKqNIzIAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAAHdElNRQfjAgYABQaXu55AAAABgUlEQVQ4y42TTSuEURTH/xcrQt5mQYqysJCItdhZseMTyIL1mGKnJG9Z+ADyllLDwsIKEaVM8jJJKFYW3jLJgsbPYmae5z4zz2T+q3vvOb9zz7nnXKMsYkW1OtCSuVVu4hiAX3ZoyjSWM88spZ4zQyMj3AHfjJNnm6q4AOCMioxQ+QzxDoQpdKNfkVKEcse12lnVEwW2yU9sl7F1SkkyoU8eGaVIkigjCkwkgFe8mpYkijkhDjzQKknU8coPrZJ4TgPmnFTqWAditEgSA8CuJM497heUeYoeA+4plDBcA81iynI/pzLjnTaAoCQxDMyINgvo8WlgA3FuJIlaICKJIwfY8+35FpuJLhCiTxJd1h2Duc3NtgN80ZkLEODJQWK054J08+sgL+4tVLCQPpYp06RVyQ9BjEQgOWfWjLmAYdHTwn16ufQbSxcpYI3sivgkhvEklq4ZSbJ/kgwmpH69ZXmZvCzn1BD2iX/pU4UFdXDocb8i8H9vmpnlkA9irLq//Q9kQ+1+Ss7ZUwAAACV0RVh0ZGF0ZTpjcmVhdGUAMjAxOS0wMi0wNVQyMzowNTowNiswMTowMLse95AAAAAldEVYdGRhdGU6bW9kaWZ5ADIwMTktMDItMDVUMjM6MDU6MDYrMDE6MDDKQ08sAAAAGXRFWHRTb2Z0d2FyZQB3d3cuaW5rc2NhcGUub3Jnm+48GgAAAABJRU5ErkJggg==', 
                        'Меню кабинета - заказы'
                )",
                "INSERT INTO icons(
                        type, 
                        page, 
                        name, 
                        image, 
                        description
                ) VALUES(
                        'page', 
                        ':cabinet,', 
                        'tariffs', 
                        'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAQAAABKfvVzAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAmJLR0QAAKqNIzIAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAAHdElNRQfjAgUXNQXaKOMSAAABFklEQVQ4y+2SvS6DUQCGnyNfh0YTEW3iG4RgYqjoYmPjBj4RN8AViKSTxV8sXAPiWgxsDMKEiloM2qZN+hhI2iqJDjbvcpL3vE9y8uTAXyd8HGZJUw6170emyVINL60itq42PHfb0Y7pmDue21Drxq06bytVNz7b4Ka1tpv852OMOwDVPQAPvrR5Y4ewZLELaDrnnHYBRUsRw9+qGPlB0nBfr1r/gT8DIiq/2laIIALmw5bLTBIzwyz9X2ZvXHDJEzfhxgVA1WMXLZgDM657rSYm6pVrZsCcBZc8UaXje9176JQp901M3DXltEc+tE+Cz+S445ZHagQCMWeckgaqrLJCCZE0MROMUw4O0gyvvzPkQO9We887qXHzFFzS7UcAAAAldEVYdGRhdGU6Y3JlYXRlADIwMTktMDItMDVUMjI6NTM6MDUrMDE6MDArKeiNAAAAJXRFWHRkYXRlOm1vZGlmeQAyMDE5LTAyLTA1VDIyOjUzOjA1KzAxOjAwWnRQMQAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAAASUVORK5CYII=', 
                        'Меню кабинета - тарифы'
                )",
                "INSERT INTO icons(
                        type, 
                        page, 
                        name, 
                        image, 
                        description
                ) VALUES(
                        'page', 
                        ':cabinet,', 
                        'calculator', 
                        'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABcAAAAXCAQAAABKIxwrAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAmJLR0QAAKqNIzIAAAAJcEhZcwAADdcAAA3XAUIom3gAAAAHdElNRQfjAgUXNw3mxQmiAAABM0lEQVQ4y5XTvUoDQRSG4Xc3wWAh2lh5Bd6AlY0gEiOoaBFUUih6CZa2NkEQbEVEEcHCRi/B+7ASRItERDeBmNfCxEx+yJLTzrPfnDM7AyNVNGzRFa66xFNKmgc2DSp1e/f86fA43Y8wmrthdkozvbiPu+qpmQG4/Dd0z8FZU+/M9uCT9tAhXrfeWr51P0wGNxwDix1csOagOgGLNpwIk4dg8EUD7tp/G3b9xTK4ac5qwLuSL8ybBG1s2XAq4OaD5AtjaH1QBsdNtJs/h9ick8YuegjOO629/DXABc8teWkMbvs6iO+Y2PTM2DlrXltSj52x4Xs/z0Y3PpKL3sBlcq3pF3ggM+gWZSH6AAvMDn9ZfxUDuMQ9E+kYsgAc8U1CRIUv6lT4pEGFKlIBpEpzpGfSrl+8Xp/pCFhYEAAAACV0RVh0ZGF0ZTpjcmVhdGUAMjAxOS0wMi0wNVQyMjo1NToxMyswMTowMIlNrW4AAAAldEVYdGRhdGU6bW9kaWZ5ADIwMTktMDItMDVUMjI6NTU6MTMrMDE6MDD4EBXSAAAAGXRFWHRTb2Z0d2FyZQB3d3cuaW5rc2NhcGUub3Jnm+48GgAAAABJRU5ErkJggg==', 
                        'Меню кабинета - опции'
                )",
                "INSERT INTO offers(
                        name, 
                        price, 
                        description
                ) VALUES(
                        '«Базовый»', 
                        '1000', 
                        'Описание тарифа «Базовый»'
                )",
                "INSERT INTO offers(
                        name, 
                        price, 
                        description
                ) VALUES(
                        '«Базовый+»', 
                        '1100', 
                        'Описание тарифа «Базовый+»'
                )",
                "INSERT INTO offers(
                        name, 
                        price, 
                        description
                ) VALUES(
                        '«Семейный»', 
                        '1200', 
                        'Описание тарифа «Семейный»'
                )",
                "INSERT INTO offers(
                        name, 
                        price, 
                        description
                ) VALUES(
                        '«Городской»', 
                        '1300', 
                        'Описание тарифа «Городской»'
                )",
                "INSERT INTO offers(
                        name, 
                        price, 
                        description
                ) VALUES(
                        '«Областной»', 
                        '1400', 
                        'Описание тарифа «Областной»'
                )",
                "INSERT INTO offers(
                        name, 
                        price, 
                        description
                ) VALUES(
                        '«Федеральный»', 
                        '1500', 
                        'Описание тарифа «Федеральный»'
                )",
                "INSERT INTO offers(
                        name, 
                        price, 
                        description
                ) VALUES(
                        '«Расширенный»', 
                        '1600', 
                        'Описание тарифа «Расширенный»'
                )",
                "INSERT INTO offers(
                        name, 
                        price, 
                        description
                ) VALUES(
                        '«Универсальный»', 
                        '1700', 
                        'Описание тарифа «Универсальный»'
                )",
                "INSERT INTO offers(
                        name, 
                        price, 
                        description
                ) VALUES(
                        '«Универсальный+»', 
                        '1800', 
                        'Описание тарифа «Универсальный+»'
                )",
                "INSERT INTO offers(
                        name, 
                        price, 
                        description
                ) VALUES(
                        '«Максимальный»', 
                        '1900', 
                        'Описание тарифа «Максимальный»'
                )",
                "INSERT INTO calculator(
                        item, 
                        type, 
                        name, 
                        option
                ) VALUES(
                        'users', 
                        'count', 
                        'Количество пользователей:', 
                        '1'
                )",
                "INSERT INTO calculator(
                        item, 
                        type, 
                        name, 
                        price, 
                        option
                ) VALUES(
                        'bases', 
                        'count', 
                        'База данных:', 
                        '100', 
                        '3'
                )",
                "INSERT INTO calculator(
                        type, 
                        name, 
                        price, 
                        hint
                ) VALUES(
                        'button', 
                        'Удаленный рабочий стол', 
                        '500', 
                        'Подсказка 1'
                )",
                "INSERT INTO calculator(
                        type, 
                        name, 
                        price, 
                        recommend, 
                        hint
                ) VALUES(
                        'button', 
                        'Веб-браузер', 
                        '600', 
                        '1', 
                        'Подсказка 2'
                )",
                "INSERT INTO calculator(
                        type, 
                        name, 
                        price, 
                        hint
                ) VALUES(
                        'button', 
                        'Клиент', 
                        '700', 
                        'Подсказка 3'
                )"
        ]
];