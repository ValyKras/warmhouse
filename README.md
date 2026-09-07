# Project_template

Это шаблон для решения проектной работы. Структура этого файла повторяет структуру заданий. Заполняйте его по мере работы над решением.

# Задание 1. Анализ и планирование

<aside>

Чтобы составить документ с описанием текущей архитектуры приложения, можно часть информации взять из описания компании и условия задания. Это нормально.

</aside

### 1. Описание функциональности монолитного приложения

**Управление отоплением:**

- Пользователи могут удалённо включать/выключать отопление в своих домах.
- Система поддерживает удаленное управление отоплением

**Мониторинг температуры:**

- Пользователи могут просматривать текущую температуру в своих домах через веб-интерфейс.
- Система поддерживает получение данных о температуре с датчиков, установленных в домах


### 2. Анализ архитектуры монолитного приложения

Язык программирования: Go
База данных: PostgreSQL
Архитектура: Монолитная, все компоненты системы (обработка запросов, бизнес-логика, работа с данными) находятся в рамках одного приложения.
Взаимодействие: Синхронное, запросы обрабатываются последовательно.
Масштабируемость: Ограничена, так как монолит сложно масштабировать по частям.
Развертывание: Требует остановки всего приложения.

### 3. Определение доменов и границы контекстов

- Управление устройствами
- Управление отоплением
- Пользователи и доступ

### **4. Проблемы монолитного решения**

- Плохая масштабируемость
- Проблемы с развертыванием
- Монолит является единой точкой обработки
- Большое количество синхронных запросов

Если вы считаете, что текущее решение не вызывает проблем, аргументируйте свою позицию.

### 5. Визуализация контекста системы — диаграмма С4


```markdown
[C4 — Context Diagram текущей системы «Тёплый дом»](https://www.plantuml.com/plantuml/png/bPJFJXDH5CRtynJNhafIw8QLAmmGC44XjeIOc3G3J62IwRIPkOsu0ngf18FHaBWn8QWxDsDrx5ZAaF04vxw2J-9tJZjWiOsuQ7hd_3ddTxvpSsT2RGUwKVMiUww_uJKs7RMjTJsyNom6zlEfBLTlDzOReHDir7pj-7fgerOjrZtRvvp9K6zwxdfnTdfoXKshZvQALJlKJW1JPPOpTlHKdQjRsjMUesQdrQ_T4pLmgJdNtWhigZBx55FNDCqX_dygiqU9sHDZpnofgo_qqRobIpetH_3ITqgfTtLkMKiFdYwlbYjh3ykBbQNvXVd7S_a9orfnWh3cvncwe79qIYaINrC7_ssAf2g-SuKSlQDpYb0E1ehDmQ0oHGLbcdHfTk5i8_ODdFkAKgIcJ87u2qeOJb6Y9305Se-Buvnm6qdfJu2K66PsDiskQUOcCaJNX_gUr-SyaxW3f4Te8VEZDgLWuJEi5p91bs9XXnOnXlenw4LjmS-OACLN5_37ffL5fFILKYRWG86KCHHrXnId68Ib5rXZDR_jsDhrj_fVGlb7N3HkCypt0KS0ooZxSehLGcrIr4fWJK4-q97peFAGw7qVZ6Dbxqc3XBrS4kTl58sM_EXweChyZixZl-u4jcu4Jidnmvh8VoBHBHJgZYk2gJx3tq7J5bnxq3UHgMzI2xUtrQU-47ckLoGAMqySRt19_rBvqvrkN-6P_z-N3qCibiih9LMKdOFi9LTWHae7LDcz78bsEkfc9Ghf4Gyks83unvsx4yQjtYFNzXuLHIlpwlRiyfxWTpnU2ZeRxjrVKuUYJDSCPKJlOJf-J59ajgN3OJP-HtHfPJiRUxF6aF3Isro9EQpIulBQpJitu_YRU5b_0m00)
```

# Задание 2. Проектирование микросервисной архитектуры

В этом задании вам нужно предоставить только диаграммы в модели C4. Мы не просим вас отдельно описывать получившиеся микросервисы и то, как вы определили взаимодействия между компонентами To-Be системы. Если вы правильно подготовите диаграммы C4, они и так это покажут.

**Диаграмма контейнеров (Containers)**

Добавьте диаграмму.

**Диаграмма компонентов (Components)**

Добавьте диаграмму для каждого из выделенных микросервисов.

**Диаграмма кода (Code)**

Добавьте одну диаграмму или несколько.

# Задание 3. Разработка ER-диаграммы

Добавьте сюда ER-диаграмму. Она должна отражать ключевые сущности системы, их атрибуты и тип связей между ними.

# Задание 4. Создание и документирование API

### 1. Тип API

Укажите, какой тип API вы будете использовать для взаимодействия микросервисов. Объясните своё решение.

### 2. Документация API

Здесь приложите ссылки на документацию API для микросервисов, которые вы спроектировали в первой части проектной работы. Для документирования используйте Swagger/OpenAPI или AsyncAPI.

# Задание 5. Работа с docker и docker-compose

Перейдите в apps.

Там находится приложение-монолит для работы с датчиками температуры. В README.md описано как запустить решение.

Вам нужно:

1) сделать простое приложение temperature-api на любом удобном для вас языке программирования, которое при запросе /temperature?location= будет отдавать рандомное значение температуры.

Locations - название комнаты, sensorId - идентификатор названия комнаты

```
	// If no location is provided, use a default based on sensor ID
	if location == "" {
		switch sensorID {
		case "1":
			location = "Living Room"
		case "2":
			location = "Bedroom"
		case "3":
			location = "Kitchen"
		default:
			location = "Unknown"
		}
	}

	// If no sensor ID is provided, generate one based on location
	if sensorID == "" {
		switch location {
		case "Living Room":
			sensorID = "1"
		case "Bedroom":
			sensorID = "2"
		case "Kitchen":
			sensorID = "3"
		default:
			sensorID = "0"
		}
	}
```

2) Приложение следует упаковать в Docker и добавить в docker-compose. Порт по умолчанию должен быть 8081

3) Кроме того для smart_home приложения требуется база данных - добавьте в docker-compose файл настройки для запуска postgres с указанием скрипта инициализации ./smart_home/init.sql

Для проверки можно использовать Postman коллекцию smarthome-api.postman_collection.json и вызвать:

- Create Sensor
- Get All Sensors

Должно при каждом вызове отображаться разное значение температуры

Ревьюер будет проверять точно так же.


