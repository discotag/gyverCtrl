# gyverCtrl
Простенький скрипт на php для управления гирляндой Гайвера (@AlexGyver, https://www.youtube.com/watch?v=MgRmiXxYL5g) из командной строки. Можно прицепить, например, на cron, или, как сделал автор, привязать к jabber (или любому другому мессенджеру/email/rss/сами придумайте чему) и управлять оттуда.

На сейчас доступны 5 команд:

* lights on — включить гирлянду
* lights off — выключить гирлянду
* lights text <текст> — вывести бегущий текст (на забудьте перед вызовом заискпейть строку)
* lights mode <имя режима> — переключает гирлянду в указанный режим
* lights list — выводит краткий help и список режимов

Сделано максимально просто, доступность гирлянды не проверяется, команда отсылается «выстрелил и забыл», к этому моменту гирлянда должна быть в рабочем режиме. Библиотеки и веб-сервер для работы не нужны. Не забудьте указать правильный ip-адрес гирлянды.

Enjoy!
© liilliil
v0.01 30 апреля 2023

**UPD:**
* +работа через pipe (motd | lights text)
* +аналогичный скрипт на go, можно сделать бинарник

© liilliil
v0.02 8 апреля 2024
