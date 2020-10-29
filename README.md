<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>


## TODOLIST API

#### Список списков
REQUEST 
TYPE :GET 
* /api/todolist

Response: {
        user-id : number
        todolistname: string
        created-at
        updated-at:
}

#### Сущность списка дел 
REQUEST 
TYPE :GET 
* localhost/api/todolist/{id}
Response: {
        user-id : number
        todolistname: string
        created-at
        updated-at:
}
#### Пометить дело как сделанное
REQUEST 
TYPE :PUT 
* /api/tasks/markdone/{id} 
Response: flash session 
#### Изменить список
REQUEST 
TYPE : PUT OR PATCH
* PUT/PATCH api/todolist/{id}

#### Удалить список
REQUEST 
TYPE :DELETE
* DELETE /api/tasks/{id}
#### Добавить список
REQUEST 
TYPE :POST
* /api/tasks

**Filtring and sorting with adding ?filter ?sort to the url**


