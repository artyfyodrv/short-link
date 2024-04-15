### API для сокращения ссылок с использованием Laravel 

Создание сокращенной ссылки

Для создания сокращенной ссылки необходимо отправить POST-запрос на api/v1/link с телом запроса, содержащий URL-адрес.

### POST Запрос

    Метод: POST
    Endpoint: api/v1/link
    Тело запроса:
    {
    "url": "https://www.example.com"
    }
### POST Запрос через Curl
    curl -X POST \
    http://localhost:89/api/v1/link \
    -H 'Content-Type: application/json' \
    -d '{
    "url": "https://www.example.com"
    }'

___


### Ответы
#### В ответ на успешное создание сокращенной ссылки сервер вернет JSON-объект с коротким URL-адресом:

    {
    "success": true,
    "message": "",
    "data": "https://localhost:89/wSjHfHrU"
    }

#### Если произошла ошибка валидации входных данных, сервер вернет JSON-объект с сообщением ошибки и кодом 422

    {
    "success": false,
    "message": "The url field is required.",
    "data": []
    }
---
