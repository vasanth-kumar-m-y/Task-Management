The project is built using php framework laravel, before getting started make sure you have all the platform available (web server, php 5.6, mysql, composer and server requiremets https://laravel.com/docs/5.1/installation) in your system before start working.

Steps to start project

1. Clone or Download the project.
2. Open project folder in your favorite editor and rename .env_example to .env
3. Now edit the .env file like mysql database name, username, password.
4. Once done open the terminal and run composer install
5. Generate application key using php artisan key:generate
6. Next run composer dump-autoload 
7. Next run migration command php artisan migrate
8. We can see list of artisan commands using php artisan list
9. You are ready to go now run php artisan serve to start laravel development server.
10. The project home page will open which says Welcome To Tasks.
11. Click on Welcome To Tasks you will see Task page.
12. Create task using create task button and task will be listed with read, update and delete option.
 
Steps how project works

1. 
   a). create task - create new task. 
   b). update task - edit the task.
   c). read - read the task.
   d). delete - delete the task.

2. Laravel provides the resource route which is defined in app/Https/routes.app.
3. The resource route provides create, edit, read, delete functionality.
4. When the browser calls the resource route it will hit the controller TaskController and calls particular method based on the browser url.
5. The TaskController has the methods defined for create, edit, delete, read task.
6. To interact with database the Task model is defined in app/Models/Task.php.
7. Controller should not interact with data layer Eloquent model app/Models/Task.php directly as it violates the law of good design, to overcome this problem we use repository pattern.
8. Repository pattern which implements interface and interact with data layer.
9. The repository app/Repositories/TaskRepository implements the interface app/Repositories/Interfaces/TaskRepositoryInterface which has common methods defined.
10. So the interface TaskRepositoryInterface is injected (type hint) to TaskController at the time of instantiation of class TaskController.
11. But still it’s not ready to use by the application because an interface is not a class and the IoC container can’t make an instance of this interface and it shouldn’t but the container will try to do it because of the type hint and will fail, so it’s necessary to tell the IoC container that, whenever the TaskController class is getting instantiated, just pass an instance of the concrete TaskRepository class which implemented the type hinted interface given in the constructor method. So, we need to bind the concrete class to the interface for the IoC container so it can supply the class to the controller and this could be done in app/Providers/AppServiceProvider, register method.
12. That's it we are ready to go... create task, update task, read task, delete task.....

