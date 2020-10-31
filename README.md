<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>


## TODOLIST API

#### Список списков 
REQUEST  
TYPE :GET  
```
/api/todolist 
```
Response: { 
        user-id : number 
        todolistname: string 
        created-at 
        updated-at: 
} 

#### Сущность списка дел  
REQUEST  
TYPE :GET  
```
* localhost/api/todolist/{id}  
```
Response: {  
        user-id : number  
        todolistname: string  
        created-at  
        updated-at:  
}  
#### Изменить список  
Изменять можно только имя списка (name)  
REQUEST  
TYPE : PUT OR PATCH  
```
* PUT/PATCH api/todolist/{id}  
```
Response:flash session Updated  
  
#### Удалить список  
REQUEST  
TYPE :DELETE  
```
* DELETE /api/tasks/{id} 
 ```
Response: flash session Deleted 
#### Добавить список 
Required: todolistname,user-id 
REQUEST  
TYPE :POST 
```
* /api/todolist  
```
**Filtring and sorting with adding to the url ?filter[name]=John ?sort=id 

#### Список дел
REQUEST  
TYPE :GET  
```
* /api/tasks
 ```
Response: list {  
        id: number,  
        todolist-id: number,  
        taskname: text,  
        description: text,  
        duedate: date,  
        priority: number from 1 to 5,  
        completed: boolean, 
        created_at: date,  
        updated_at: date   
}   

#### Сущность списка дел   
REQUEST    
TYPE :GET  
* localhost/api/tasks/{id}  
Response: {  
       id: number,   
        todolist-id: number,   
        taskname: text,    
        description: text,   
        duedate: date,   
        priority: number from 1 to 5,  
        completed: boolean,   
        created_at: date,  
        updated_at: date    
}    
#### Изменить список    

REQUEST    
TYPE : PUT OR PATCH  
```
* PUT/PATCH api/tasks/{id}  
```
Response:flash session Updated  
  
#### Удалить дело   
REQUEST    
TYPE :DELETE  
```
* DELETE /api/tasks/{id} 
 ```
Response: flash session Deleted 
#### Добавить  дело  
Required: 'taskname','description' ,'duedate' ,'priority'
REQUEST    
TYPE :POST 
```
* /api/tasks  
```
Response : Successful
#### Пометить дело как сделанное    
REQUEST    
TYPE : PUT  
```
* /api/tasks/markdone/{id}  
```
Response: flash session  
**Filtring and sorting with adding to the url ?filter[name]=John ?sort=id 
