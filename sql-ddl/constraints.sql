select * from courses where category_id in (select id from categories where id > 3);
select * from (select id, category_id from categories where id > 2) AS cat;
Выполните в psql запрос который выбирает из таблицы goods все названия товаров, которые находятся в опубликованных категориях (state имеет значение published);
select name from goods where category_id in (select id from categories where state like 'p%');
