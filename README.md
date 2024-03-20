# REST API для засчитывания заданий пользователей

## 1) Введение

Цель проекта: создать небольшой REST API, засчитывающий задания для пользователей.

## 2) Описание проекта

Под заданием я подразумевал - тест. Пользователи могут создавать их, решать и получать баллы.

### 2.1 Функциональные требования:

- **Регистрация и авторизация**: Регистрация и вход для пользователей.
- **Создание задания**: Создать удобный интерффейс для кунструктора по созданию задания для пользователей.
- **Хранение данных**: Хранить минимальный набор сущности юзера (id, name, balance) и задания (id, name, cost) в любой реляционной СУБД.
- **Решение теста**: Создать метод, который будет сегнализировать сервису, что произошло некоторое событие, пользователь выполнил условие и задание можно посчитать выполненным и начислить награду пользователю.
- **История выполненных тестов**: Создать метод, который будет возвращать историю выполненных пользователем заданий и его баланс.

## 3) Технологический стек

- **Язык программирования**: PHP
- **База данных**: MySQL
- **Фронтенд**: HTML, CSS, JavaScript (библиотека jQuery), Bootstrap

## 4) Этапы разработки

1. **Сбор требований**: Определение детальных требований к проекту.
2. **Проектирование**: Разработка архитектуры приложения и дизайна интерфейса.
3. **Разработка**: Кодирование и реализация функциональности.
4. **Тестирование**: Проверка работы приложения и исправление найденных ошибок.

## 5) Тестирование

- **Функциональное тестирование**: Проверка соответствия функциональности требованиям.
- **Тестирование безопасности**: Проверка на уязвимости и утечки данных.

## 6) Пользовательская документация

### 6.1 Главная страница

Представляет собой мини-описание сервиса, а также ссылки в верхнем меню на страницу авторизации и регистрации.

### 6.2 Страница с заданиями

После входа на сервис вы попадаете на страницу со всеми заданиями, с возможностью создать свое, кликнув на кнопку "Создать своё задание".

### 6.3 Страница с собственными заданиями

Вы можете переходить на страницу с собственными заданиями, кликнув на ссылку со своим именем в верхнем меню.

### 6.4 Страница с историей выполненных заданий

Вы можете переходить на страницу с историей выполненных заданий, кликнув на ссылку со своим балансом в верхнем меню.

## 7) Запуск сервиса на локальном ПК

1. Скачать папку с проектом.
2. Установить любой сервер для веб-разработки, например WampServer.
3. Запустить WampServer.
4. Перейти в http://localhost/phpmyadmin/, создать БД с названием vk и импортировать туда vk.sql, взятую из репозитория.
5. Создать папку "vk" в C:\wamp64\www и перенести в нее все файлы из репозитория.
6. Перейти по адресу http://localhost/vk/ и начать тестирование.
