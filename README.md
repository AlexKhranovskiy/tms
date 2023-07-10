### Task management system

Веб-проложение позволяющее создать задачу(Task), просмотреть все задачи, отсортировать вывод всех задач.
Сортировка вывода задач по таким полям:
* status
* priority
* created_at

Поле status имеет значения:
* fresh
* done

Поле priority имеет значения
* high
* low

Возможна сортировка по одному полю или по нескольким.
Данные сохранются в БД. Приложение не имеет графического интрефейса. Для взаимодействия с ним используется REST API.

#### Эндопоинты и методы REST API:
* Сохранение новой задачи: 
    POST ```/tasks```
    Формат JSON для отправки:
    ```json
    {
        "title": "new title",
        "description": "Some description",
        "priority": "high",
        "status": "fresh"
    }
    ```

* Получение всех задач
    GET ```/tasks```

* Получение задач и фильтрация
    GET ```/tasks?sort_field[your_filed]=your_method```
    your_field могут быть:
    * status
    * priority
    * created_at
    
    your_method могут быть:
    * fresh/done (для status)
    * high/low (для priority)
    * desc/asc (для created_at)

Пример запроса всех задач и со всеми фильтрами:
    GET ```http://localhost/api/tasks?sort_field[status]=fresh&sort_field[priority]=high&sort_field[created_at]=desc```

Пример возможного ответа:
```json
    "data": [
        {
            "id": 15,
            "title": "new title",
            "description": "Some description1",
            "status": "fresh",
            "priority": "high",
            "created_at": "2023-07-09T18:06:28.000000Z",
            "updated_at": "2023-07-09T18:06:28.000000Z"
        },
        {
            "id": 14,
            "title": "new title",
            "description": "Some description1",
            "status": "fresh",
            "priority": "high",
            "created_at": "2023-07-09T17:34:07.000000Z",
            "updated_at": "2023-07-09T17:34:07.000000Z"
        },
        {
            "id": 13,
            "title": "new title",
            "description": "Some description1",
            "status": "fresh",
            "priority": "high",
            "created_at": "2023-07-09T17:07:05.000000Z",
            "updated_at": "2023-07-09T17:07:05.000000Z"
        },
        {
            "id": 12,
            "title": "new title",
            "description": "Some description1",
            "status": "fresh",
            "priority": "high",
            "created_at": "2023-07-09T17:05:12.000000Z",
            "updated_at": "2023-07-09T17:05:12.000000Z"
        },
        {
            "id": 5,
            "title": "sapiente",
            "description": "Cupiditate vero neque quaerat ipsum aliquam.",
            "status": "fresh",
            "priority": "high",
            "created_at": "2023-07-09T15:26:05.000000Z",
            "updated_at": "2023-07-09T15:26:05.000000Z"
        },
        {
            "id": 4,
            "title": "rerum",
            "description": "Nostrum ut quaerat qui vel at velit et ducimus.",
            "status": "fresh",
            "priority": "low",
            "created_at": "2023-07-09T15:26:05.000000Z",
            "updated_at": "2023-07-09T15:26:05.000000Z"
        },
        {
            "id": 6,
            "title": "quam",
            "description": "Ut odit sit officia accusantium itaque.",
            "status": "fresh",
            "priority": "low",
            "created_at": "2023-07-09T15:26:05.000000Z",
            "updated_at": "2023-07-09T15:26:05.000000Z"
        },
        {
            "id": 3,
            "title": "voluptas",
            "description": "Doloribus voluptas minus eligendi sint quisquam ipsam.",
            "status": "done",
            "priority": "high",
            "created_at": "2023-07-09T15:26:05.000000Z",
            "updated_at": "2023-07-09T15:26:05.000000Z"
        },
        {
            "id": 8,
            "title": "laborum",
            "description": "Eaque corrupti nostrum autem cumque voluptatem.",
            "status": "done",
            "priority": "high",
            "created_at": "2023-07-09T15:26:05.000000Z",
            "updated_at": "2023-07-09T15:26:05.000000Z"
        },
        {
            "id": 10,
            "title": "fugit",
            "description": "Sequi sunt consectetur est sunt dolorem.",
            "status": "done",
            "priority": "high",
            "created_at": "2023-07-09T15:26:05.000000Z",
            "updated_at": "2023-07-09T15:26:05.000000Z"
        },
        {
            "id": 11,
            "title": "sfdsfdssdfsdf",
            "description": "sdfsdf",
            "status": "done",
            "priority": "low",
            "created_at": "2023-07-09T19:25:42.000000Z",
            "updated_at": null
        },
        {
            "id": 1,
            "title": "odio",
            "description": "Doloremque pariatur est atque itaque molestias voluptas.",
            "status": "done",
            "priority": "low",
            "created_at": "2023-07-09T15:26:05.000000Z",
            "updated_at": "2023-07-09T15:26:05.000000Z"
        },
        {
            "id": 2,
            "title": "aliquam",
            "description": "Optio sit fuga eligendi.",
            "status": "done",
            "priority": "low",
            "created_at": "2023-07-09T15:26:05.000000Z",
            "updated_at": "2023-07-09T15:26:05.000000Z"
        },
        {
            "id": 7,
            "title": "et",
            "description": "Dolores dolorem dolor recusandae est voluptatum sit voluptas.",
            "status": "done",
            "priority": "low",
            "created_at": "2023-07-09T15:26:05.000000Z",
            "updated_at": "2023-07-09T15:26:05.000000Z"
        },
        {
            "id": 9,
            "title": "sunt",
            "description": "Rem dolores rerum sequi laboriosam officiis natus.",
            "status": "done",
            "priority": "low",
            "created_at": "2023-07-09T15:26:05.000000Z",
            "updated_at": "2023-07-09T15:26:05.000000Z"
        }
    ]
}
```

### Запуск
На вашей машине должен быть установлен Docker
* Склонируйте репозиторий
* ```docker-compose up -d```
* ```docker exec -it tms_php-apache_1 bash```
* Скоприуйте содержимаое файла .env.example в файл .env
* ```composer update --no-scripts```
* ```php artisan optimize```
* ```php artisan migrate --seed```
* Приложение готово принимать запросы на ```http://localhost/api```
