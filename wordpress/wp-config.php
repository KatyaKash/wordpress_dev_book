<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки базы данных
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'wordpress' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'samatoki' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', '123' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'p?wruA52*P9lzis.QHZ;b9C5,VF>+-RL<W,i3RR!Q]/Kqj(2j(ItVG+u--KTV32|' );
define( 'SECURE_AUTH_KEY',  'iE[^zsezwICS6P0Mq+!vW*4gW->`O9?l#LrkY=<AK;m-4at4FD1~M~f7.<mx{kY@' );
define( 'LOGGED_IN_KEY',    '5c(mpiolp<TG{$,F3W?eQlm.* %lht0L]]3QL?UF(C,}.o4Cf+(<4`O$&w5UdZdo' );
define( 'NONCE_KEY',        'd/>p#DnrB.F=|=],Z>m#iFvmq{xc-nS1[5Z/X7P!b~o9_/ez+fp,b,wN~fHJ0g:9' );
define( 'AUTH_SALT',        ';YdUK~xHRmRSZXb4edUCkRJ@s8%>MB@Pd5&Q(YaJ;4K;9svTrK>4Nas>(9%p$!ny' );
define( 'SECURE_AUTH_SALT', 'e&llyjcztJR&x+q_h4(DSq;?@5]-oL/D-u6G2bdb[#WL{M!~@SSfr%zCP*Be(+vO' );
define( 'LOGGED_IN_SALT',   'qErmMoIlI)i8t~ m#<~ A($3YqKqmYO,kf&cS?piwjb?q{yPvdr5}irI#$ED)>d7' );
define( 'NONCE_SALT',       '}gK%*dL0Ov:YFs2RPIP`|`zoE9;ki`r(1Qc_FxvV#DZWvD]TVG,e=tyiVLYDXVR3' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
