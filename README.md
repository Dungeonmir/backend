# PHP Backend task

## Задание

1.  Написать класс для работы с API https://jsonplaceholder.typicode.com
2.  Сделать методы для получения пользователей, их постов и заданий
3.  Добавить метод работы с конкретным постом (добавление / редактирование / удаление)
4.  Результат залить на GitHub с примерами вызовов класса

## Решение

1. Создан класс для работы с API [RequestJSON.class.php](./RequestJSON.class.php)

2. Реальзованы методы для получения пользователей, их постов и заданий:

    -   getUsers() - получения пользователей

    -   getPosts() - получение постов

    -   getTodos() - получение заданий

3. Добавлен метод post() для работы с конкретным постом (добавление / редактирование / удаление):

    -   post("get", other_params...) - получение поста

    -   post("add", other_params...) - добавление поста

    -   post("change", other_params...) - изменение поста

    -   post("delete", other_params...) - удаление поста

4. Результат залит на GitHub с [примерами ](./index.php) вызова [класса](./RequestJSON.class.php)

5. Результат работы примеров вызова класса

    -   Результат выполнения метода post("get")
        
        ![alt](<./images/getPost(4).png>)

    -   Результат выполнения метода post("add")
        
        ![alt](<./images/addPost.png>)

    -   Результат выполнения метода post("change")
        
        ![alt](<./images/changePost.png>)
    
    -   Результат выполнения метода post("delete")           
        
        ```php
        1
        ```

    -   Результат выполнения метода getPosts()
        
        ![alt](<./images/getPosts(5).png>)

    -   Результат выполнения метода getTodos()
        
        ![alt](<./images/getTodos.png>)

    -   Результат выполнения метода getTodo()
        
        ![alt](<./images/getTodo.png>)

    -   Результат выполнения метода getUser()
        
        ![alt](<./images/getUser(8).png>)

    -   Результат выполнения метода getUsers()
        
        ![alt](<./images/getUsers.png>)
