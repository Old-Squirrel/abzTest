@extends('layouts.app')

@section('content')

    <div CLASS="col-sm-12 mx-auto">
        <div class="card-group">
            <div class="card mr-5 ml-5">
                <a class="a-card-header " href="{{url('/part/one/employee')}}" title="Перейти к заданию">
                    <div class="card-header text-center">
                        <h5>Часть первая</h5>
                    </div>
                </a>
                <div class="card-body text-secondary ">
                    <p>
                    <div class="card-text">
                        Создайте веб страницу, которая будет выводить иерархию сотрудников в
                        древовидной​форме.<br>
                        - Информация о каждом сотруднике должна храниться в базе данных и
                        содержать​ следующие​ данные:<br>
                        - ФИО;<br>
                        - Должность;<br>
                        - Дата ​приема​ на ​работу;<br>
                        - Размер​ заработной ​платы;<br>
                        У​каждого ​сотрудника ​есть ​1 ​начальник;<br>
                        База данных должна содержать не менее 50 000 сотрудников и 5 уровней
                        иерархий.<br>
                        Не​ забудьте ​отобразить ​должность​ сотрудника.
                    </div>
                    </p>
                </div>

            </div>


            <div class="card ml-5 mr-5">
                <a class="a-card-header" href="{{url('/part/two/employee')}}" title="Перейти к заданию">
                    <div class="card-header text-center">
                        <h5>Часть вторая</h5>
                    </div>
                </a>
                <div class="card-body text-secondary ">
                    <p>
                    <div class="card-text">
                        1. Создайте ​базу ​данных​ используя ​миграции ​Laravel​/​Symfony.<br>
                        2. Используйте ​Laravel​/​Symfony​ seeder ​для ​заполнения ​базы​ данных.<br>
                        3. Используйте​ Twitter​Bootstrap​ для ​создания​ базовых​ стилей ​Вашей​ страницы.<br>
                        4. Создайте еще одну страницу и выведите на ней список сотрудников со всей
                        имеющейся о сотруднике информацией из базы данных и возможностью
                        сортировать ​по ​любому ​полю.<br>
                        5. Добавьте возможность поиска сотрудников по любому полю для страницы
                        созданной​ в ​задаче ​4.<br>
                        6. Добавьте возможность сортировать (и искать если Вы выполнили задачу No5)
                        по​любому ​полю ​без​ перезагрузки ​страницы,​например ​используя ​ajax.<br>
                        7. Используя стандартные функции Laravel / Symfony, осуществите
                        аутентификацию пользователя для раздела веб сайта доступного только для
                        зарегистрированных ​пользователей.<br>
                        8. Перенесите функционал разработанный в задачах 4, 5 и 6 (используя ajax
                        запросы)​​в ​раздел​ доступный​ только ​для ​зарегистрированных ​пользователей.<br>
                        9. В разделе доступном только для зарегистрированных пользователей,
                        реализуйте остальные CRUD операции для записей сотрудников. Пожалуйста
                        заметьте, что все поля касающиеся пользователей должны быть
                        редактируемыми, ​включая​ начальника​ каждого ​сотрудника.<br>
                        10. Осуществите возможность загружать фотографию сотрудника и отобразите ее
                        на странице, где можно редактировать данные о сотрудник. Добавьте
                        дополнительную колонку с уменьшенной фотографией сотрудника на
                        странице ​списка​ всех​ сотрудников.<br>
                        11. Осуществите возможность перераспределения сотрудников в случае
                        изменения начальника (бонусом может быть то, что вы сможете это
                        осуществить с применением встроенных механизмов/парадигм, предлагаемых
                        Laravel​/​Symfony​ORM).<br>
                        12. Реализуйте ленивую загрузку для дерева сотрудников. Например, показывайте
                        первые два уровня иерархии по умолчанию и подгружайте 2 следующих
                        уровня ​или ​всю​ ветку ​дерева ​при ​клике ​на​сотрудника ​второго​ уровня.<br>
                        13. Реализуйте возможность менять начальника сотрудника используя drag-n-drop
                        сразу​в​дереве​сотрудников.<br>
                        14. Создайте структуру базы данных используя MySQL Workbench (не забудьте
                        закомитить проект MySQL Workbench в git) и сгенерируйте файл(ы) миграций с
                        помощью Laravel / Symfony из существующей БД MySQL, или прямо из файла
                        проекта​ MySQL ​Workbench.

                    </div>
                    </p>
                </div>
            </div>
        </div>


    </div>

@endsection
