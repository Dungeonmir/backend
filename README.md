# PHP Backend

## Классы для работы с API jsonplaceholder

### 1. [Request.class.php](https://github.com/Dungeonmir/backend/blob/master/classes/Request.class.php) - статичный класс для создания HTTP запросов

Позволяет легко создавать и отправлять запросы GET, POST, PUT, DELETE используя один класс.

#### Для HTTP запросов используется библиотека cURL

На данный момент поддерживается следующие методы запросов

-   GET
-   POST
-   PUT
-   DELETE

#### Пример работы с классом

Функция getUsers() используется для получения списка всех пользователей. Она основана на классе Request и вызывает метод GETrequest() для отправки GET запроса.

```php
public function getUsers()
	{
		return Request::GETrequest('users/');
	}
```

К базовому URL добавляется endpoint _users/_, чтобы сформировать полный запрос к API для получения данных о пользователях.

### 2. [Post.class.php](https://github.com/Dungeonmir/backend/blob/master/classes/Post.class.php) - класс для работы с постами

Содержит следующие методы:

1. getPost - получение поста, используя идентификатор.

Пример использования метода getPost:

```php
$post = new Post();
$data = $post->getPost(5);
```

2. getPosts

    - получение всех доступных постов.

    ```php
    $data = $post->getPosts();
    ```

    - получение всех доступных постов у определенного пользователя, при наличии идентифакотора в параметре.

    ```php
    $data = $post->getPosts(8);
    ```

3. changePost - изменение поста переданными данными, доступно частичное изменение, для этого вместо одного из параметров, кроме первого, нужно указать значение null.

    ```php
    $data = $post->changePost(5, 2, null,
    'Post body');

    ```

4. addPost - добавдение поста, предоставленными данными. Для добавления нового поста нужно указать идентификатор пользователя, загаловок, тело поста.
    ```php
    $data = $post->addPost(4, 'Title of the post', 'Post body');
    ```
5. deletePost - удаление поста, по указанному идентификатору пользователя.
    ```php
    $data = $post->deletePost(3);
    ```

### 3. [Todo.class.php](https://github.com/Dungeonmir/backend/blob/master/classes/Todo.class.php) - класс для работы с задачами

Содержит следующие методы:

1. getTodo - получение задачи по идентификатору задач
    ```php
    $todo = new Todo();
    $data = $todo->getTodo(5);
    ```
2. getTodos - получение всех задач

    ```php
    $data = $todo->getTodos();
    ```

### 3. [User.class.php](https://github.com/Dungeonmir/backend/blob/master/classes/User.class.php) - класс для работы с пользователями

Содержит следующие методы:

1. getUser - получение пользователя по идентификатору пользователя
    ```php
    $user = new User;
    $data = $user->getUser(5);
    ```
2. getUsers - получение всех пользователей

    ```php
    $data = $user->getUsers();
    ```

### 3. [ErrorHandler.class.php](https://github.com/Dungeonmir/backend/blob/master/classes/ErrorHandler.class.php) - класс для обработки ошибок в формате JSON

Содержит метод **JSONResponse** с параметрами HTTP статус код и сообщение-пояснение к ошибке. Пример вызова метода класса:

```php
if (!$response) {
	return ErrorHandler::JSONResponse(404, 'Resource not found');
}
```
