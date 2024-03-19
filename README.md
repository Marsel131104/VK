TASKS 

1) Введение
   Цель проекта: создать небольшой REST API, засчитывающий задания для пользователей.
   
2) Описание проекта: под заданием я подразумевал - тест. Пользователи могут создать их, решать и получать баллы
   2.1 Функциональные требования.
     Регистрация и авторизация: Регистрация и вход для пользователей.
     Создание задания: Создать удобный интерфейс для кунструктора по созданию задания для пользователей.
     Хранение данных: Хранить минимальный набор сущности юзера (id, name, balance) и задания (id, name, cost) в любой реляционной СУБД.
     Решение теста: Создать метод, который будет сегнализировать сервису, что произошло некоторое событие, пользователь выполнил условие и задание можно посчитать выполненным и начислить награду пользователю.
     История выполненных тестов: Создать метод, который будет возвращать историю выполненных пользователем заданий и его баланс.
   
3) Технологический стек. Язык программирования: PHP База данных: MySQL Фронтенд: HTML, CSS, JavaScript (библиотека Jquery), Bootstrap

4) Этапы разработкию. Сбор требований: Определение детальных требований к проекту. Проектирование: Разработка архитектуры приложения и дизайна интерфейса. Разработка: Кодирование и реализация функциональности. Тестирование: Проверка работы приложения и исправление найденных ошибок

5) Тестирование Функциональное тестирование: Проверка соответствия функциональности требованиям. Тестирование безопасности: Проверка на уязвимости и утечки данных

6) Пользовательская документация
   6.1 Главная страница представляет собой мини-описание сервиса, а также ссылки в верхнем меню на страницу авторизации и регистрации.
   6.2 После входа на сервис вы попадаете на страницу со всем заданиями, с возможностью создать свое, кликнув на кнопку "Создать своё задание".
   6.3 Вы можете переходить на страницу с собственными заданиями, кликнув на ссылку со своим именем в верхнем меню.
   6.4 Вы можете переходить на страницу с историей, выполненных заданий, кликнув на ссылку со своим балансом в верхнем меню.
   
