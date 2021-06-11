# MoveIP

Реализовать простую страницу со счетчиком активных посетителей на ней.

Основные требования:
- реализация должна быть без использования фреймворков и готовых библиотек, реализующих необходимую логику;

Требования к нагрузке:
- прирост новых пользователей - до 50 в секунду;
- количество одновременно активных - до 500;

Дополнительно:
- посетитель должен считаться активным не дольше 30 секнуд с момента последней активности


`docker-compose up -d`

## Hosts

```
127.0.0.1 moveip.loc
127.0.0.1 redis
```