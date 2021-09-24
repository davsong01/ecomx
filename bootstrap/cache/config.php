<?php return array (
  'app' => 
  array (
    'name' => 'eComX',
    'env' => 'local',
    'debug' => true,
    'url' => 'http://127.0.0.1:8000',
    'asset_url' => NULL,
    'timezone' => 'Africa/Lagos',
    'locale' => 'en',
    'fallback_locale' => 'en',
    'faker_locale' => 'en_US',
    'key' => 'base64:+ixpFO7Q0vILHYn+OrmWUj9dKVFp8H2yCdMFMU7xSJU=',
    'cipher' => 'AES-256-CBC',
    'providers' => 
    array (
      0 => 'Illuminate\\Auth\\AuthServiceProvider',
      1 => 'Illuminate\\Broadcasting\\BroadcastServiceProvider',
      2 => 'Illuminate\\Bus\\BusServiceProvider',
      3 => 'Illuminate\\Cache\\CacheServiceProvider',
      4 => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
      5 => 'Illuminate\\Cookie\\CookieServiceProvider',
      6 => 'Illuminate\\Database\\DatabaseServiceProvider',
      7 => 'Illuminate\\Encryption\\EncryptionServiceProvider',
      8 => 'Illuminate\\Filesystem\\FilesystemServiceProvider',
      9 => 'Illuminate\\Foundation\\Providers\\FoundationServiceProvider',
      10 => 'Illuminate\\Hashing\\HashServiceProvider',
      11 => 'Illuminate\\Mail\\MailServiceProvider',
      12 => 'Illuminate\\Notifications\\NotificationServiceProvider',
      13 => 'Illuminate\\Pagination\\PaginationServiceProvider',
      14 => 'Illuminate\\Pipeline\\PipelineServiceProvider',
      15 => 'Illuminate\\Queue\\QueueServiceProvider',
      16 => 'Illuminate\\Redis\\RedisServiceProvider',
      17 => 'Illuminate\\Auth\\Passwords\\PasswordResetServiceProvider',
      18 => 'Illuminate\\Session\\SessionServiceProvider',
      19 => 'Illuminate\\Translation\\TranslationServiceProvider',
      20 => 'Illuminate\\Validation\\ValidationServiceProvider',
      21 => 'Illuminate\\View\\ViewServiceProvider',
      22 => 'Unicodeveloper\\Paystack\\PaystackServiceProvider',
      23 => 'Intervention\\Image\\ImageServiceProvider',
      24 => 'Unisharp\\Ckeditor\\ServiceProvider',
      25 => 'Riari\\Forum\\ForumServiceProvider',
      26 => 'Riari\\Forum\\Frontend\\ForumFrontendServiceProvider',
      27 => 'App\\Providers\\AppServiceProvider',
      28 => 'App\\Providers\\AuthServiceProvider',
      29 => 'App\\Providers\\EventServiceProvider',
      30 => 'App\\Providers\\RouteServiceProvider',
    ),
    'aliases' => 
    array (
      'App' => 'Illuminate\\Support\\Facades\\App',
      'Arr' => 'Illuminate\\Support\\Arr',
      'Artisan' => 'Illuminate\\Support\\Facades\\Artisan',
      'Auth' => 'Illuminate\\Support\\Facades\\Auth',
      'Blade' => 'Illuminate\\Support\\Facades\\Blade',
      'Broadcast' => 'Illuminate\\Support\\Facades\\Broadcast',
      'Bus' => 'Illuminate\\Support\\Facades\\Bus',
      'Cache' => 'Illuminate\\Support\\Facades\\Cache',
      'Config' => 'Illuminate\\Support\\Facades\\Config',
      'Cookie' => 'Illuminate\\Support\\Facades\\Cookie',
      'Crypt' => 'Illuminate\\Support\\Facades\\Crypt',
      'DB' => 'Illuminate\\Support\\Facades\\DB',
      'Eloquent' => 'Illuminate\\Database\\Eloquent\\Model',
      'Event' => 'Illuminate\\Support\\Facades\\Event',
      'File' => 'Illuminate\\Support\\Facades\\File',
      'Gate' => 'Illuminate\\Support\\Facades\\Gate',
      'Hash' => 'Illuminate\\Support\\Facades\\Hash',
      'Lang' => 'Illuminate\\Support\\Facades\\Lang',
      'Log' => 'Illuminate\\Support\\Facades\\Log',
      'Mail' => 'Illuminate\\Support\\Facades\\Mail',
      'Notification' => 'Illuminate\\Support\\Facades\\Notification',
      'Password' => 'Illuminate\\Support\\Facades\\Password',
      'Queue' => 'Illuminate\\Support\\Facades\\Queue',
      'Redirect' => 'Illuminate\\Support\\Facades\\Redirect',
      'Redis' => 'Illuminate\\Support\\Facades\\Redis',
      'Request' => 'Illuminate\\Support\\Facades\\Request',
      'Response' => 'Illuminate\\Support\\Facades\\Response',
      'Route' => 'Illuminate\\Support\\Facades\\Route',
      'Schema' => 'Illuminate\\Support\\Facades\\Schema',
      'Session' => 'Illuminate\\Support\\Facades\\Session',
      'Storage' => 'Illuminate\\Support\\Facades\\Storage',
      'Str' => 'Illuminate\\Support\\Str',
      'URL' => 'Illuminate\\Support\\Facades\\URL',
      'Validator' => 'Illuminate\\Support\\Facades\\Validator',
      'View' => 'Illuminate\\Support\\Facades\\View',
      'Paystack' => 'Unicodeveloper\\Paystack\\Facades\\Paystack',
      'Image' => 'Intervention\\Image\\Facades\\Image',
    ),
  ),
  'auth' => 
  array (
    'defaults' => 
    array (
      'guard' => 'web',
      'passwords' => 'users',
    ),
    'guards' => 
    array (
      'web' => 
      array (
        'driver' => 'session',
        'provider' => 'users',
      ),
      'api' => 
      array (
        'driver' => 'token',
        'provider' => 'users',
        'hash' => false,
      ),
    ),
    'providers' => 
    array (
      'users' => 
      array (
        'driver' => 'eloquent',
        'model' => 'App\\User',
      ),
    ),
    'passwords' => 
    array (
      'users' => 
      array (
        'provider' => 'users',
        'table' => 'password_resets',
        'expire' => 60,
      ),
    ),
  ),
  'binshopsblog' => 
  array (
    'default_language' => 'en',
    'user_model' => 'App\\User',
    'reading_progress_bar' => true,
    'include_default_routes' => true,
    'blog_prefix' => 'blog',
    'admin_prefix' => 'blog_admin',
    'use_custom_view_files' => false,
    'per_page' => 10,
    'image_upload_enabled' => true,
    'blog_upload_dir' => 'blog_images',
    'memory_limit' => '2048M',
    'echo_html' => true,
    'strip_html' => false,
    'auto_nl2br' => true,
    'use_wysiwyg' => true,
    'image_quality' => 80,
    'image_sizes' => 
    array (
      'image_large' => 
      array (
        'w' => 1000,
        'h' => 700,
        'basic_key' => 'large',
        'name' => 'Large',
        'enabled' => true,
        'crop' => true,
      ),
      'image_medium' => 
      array (
        'w' => 600,
        'h' => 400,
        'basic_key' => 'medium',
        'name' => 'Medium',
        'enabled' => true,
        'crop' => true,
      ),
      'image_thumbnail' => 
      array (
        'w' => 150,
        'h' => 150,
        'basic_key' => 'thumbnail',
        'name' => 'Thumbnail',
        'enabled' => true,
      ),
    ),
    'captcha' => 
    array (
      'captcha_enabled' => true,
      'captcha_type' => 'BinshopsBlog\\Captcha\\Basic',
      'basic_question' => 'What is the opposite of white?',
      'basic_answers' => 'black,dark',
    ),
    'rssfeed' => 
    array (
      'should_shorten_text' => true,
      'text_limit' => 100,
      'posts_to_show_in_rss_feed' => 10,
      'cache_in_minutes' => 60,
      'description' => 'Our blog post RSS feed',
      'language' => 'en',
    ),
    'comments' => 
    array (
      'type_of_comments_to_show' => 'built_in',
      'max_num_of_comments_to_show' => 1000,
      'save_ip_address' => true,
      'auto_approve_comments' => false,
      'save_user_id_if_logged_in' => true,
      'user_field_for_author_name' => 'name',
      'ask_for_author_email' => true,
      'require_author_email' => false,
      'ask_for_author_website' => true,
      'disqus' => 
      array (
        'src_url' => 'https://GET_THIS_FROM_YOUR_EMBED_CODE.disqus.com/embed.js',
      ),
    ),
    'search' => 
    array (
      'search_enabled' => true,
      'limit-results' => 50,
      'enable_wildcards' => true,
      'weight' => 
      array (
        'title' => 1.5,
        'content' => 1,
      ),
    ),
    'show_full_text_at_list' => true,
  ),
  'broadcasting' => 
  array (
    'default' => 'log',
    'connections' => 
    array (
      'pusher' => 
      array (
        'driver' => 'pusher',
        'key' => '',
        'secret' => '',
        'app_id' => '',
        'options' => 
        array (
          'cluster' => 'mt1',
          'encrypted' => true,
        ),
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
      ),
      'log' => 
      array (
        'driver' => 'log',
      ),
      'null' => 
      array (
        'driver' => 'null',
      ),
    ),
  ),
  'cache' => 
  array (
    'default' => 'file',
    'stores' => 
    array (
      'apc' => 
      array (
        'driver' => 'apc',
      ),
      'array' => 
      array (
        'driver' => 'array',
      ),
      'database' => 
      array (
        'driver' => 'database',
        'table' => 'cache',
        'connection' => NULL,
      ),
      'file' => 
      array (
        'driver' => 'file',
        'path' => 'C:\\xampp\\htdocs\\Laravel Projects\\EcomX\\storage\\framework/cache/data',
      ),
      'memcached' => 
      array (
        'driver' => 'memcached',
        'persistent_id' => NULL,
        'sasl' => 
        array (
          0 => NULL,
          1 => NULL,
        ),
        'options' => 
        array (
        ),
        'servers' => 
        array (
          0 => 
          array (
            'host' => '127.0.0.1',
            'port' => 11211,
            'weight' => 100,
          ),
        ),
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'cache',
      ),
      'dynamodb' => 
      array (
        'driver' => 'dynamodb',
        'key' => NULL,
        'secret' => NULL,
        'region' => 'us-east-1',
        'table' => 'cache',
      ),
    ),
    'prefix' => 'ecomx_cache',
  ),
  'chatter' => 
  array (
    'routes' => 
    array (
      'home' => 'forums',
      'discussion' => 'discussion',
      'category' => 'category',
      'post' => 'posts',
      'register' => 'register',
      'login' => 'login',
    ),
    'headline_logo' => '/vendor/devdojo/chatter/assets/images/logo-light.png',
    'yields' => 
    array (
      'head' => 'css',
      'footer' => 'js',
    ),
    'master_file_extend' => 'layouts.app',
    'sidebar_in_discussion_view' => false,
    'user' => 
    array (
      'namespace' => 'App\\User',
      'database_field_with_user_name' => 'name',
      'relative_url_to_profile' => '',
      'relative_url_to_image_assets' => '',
      'avatar_image_database_field' => '',
    ),
    'security' => 
    array (
      'limit_time_between_posts' => true,
      'time_between_posts' => 1,
    ),
    'editor' => 'tinymce',
    'tinymce' => 
    array (
      'toolbar' => 'bold italic underline | alignleft aligncenter alignright | bullist numlist outdent indent | link image',
      'plugins' => 'link, image',
    ),
    'order_by' => 
    array (
      'posts' => 
      array (
        'order' => 'created_at',
        'by' => 'ASC',
      ),
      'discussions' => 
      array (
        'order' => 'last_reply_at',
        'by' => 'DESC',
      ),
    ),
    'email' => 
    array (
      'enabled' => false,
      'view' => 'chatter::email',
    ),
    'soft_deletes' => false,
    'paginate' => 
    array (
      'num_of_results' => 10,
    ),
    'errors' => true,
    'middleware' => 
    array (
      'global' => 
      array (
        0 => 'web',
      ),
      'home' => 
      array (
      ),
      'discussion' => 
      array (
        'index' => 
        array (
        ),
        'show' => 
        array (
        ),
        'create' => 
        array (
        ),
        'store' => 
        array (
        ),
        'destroy' => 
        array (
        ),
        'edit' => 
        array (
        ),
        'update' => 
        array (
        ),
      ),
      'post' => 
      array (
        'index' => 
        array (
        ),
        'show' => 
        array (
        ),
        'create' => 
        array (
        ),
        'store' => 
        array (
        ),
        'destroy' => 
        array (
        ),
        'edit' => 
        array (
        ),
        'update' => 
        array (
        ),
      ),
      'category' => 
      array (
        'show' => 
        array (
        ),
      ),
    ),
  ),
  'database' => 
  array (
    'default' => 'mysql',
    'connections' => 
    array (
      'sqlite' => 
      array (
        'driver' => 'sqlite',
        'database' => 'creatives',
        'prefix' => '',
        'foreign_key_constraints' => true,
      ),
      'mysql' => 
      array (
        'driver' => 'mysql',
        'host' => 'localhost',
        'port' => '3306',
        'database' => 'creatives',
        'username' => 'root',
        'password' => '',
        'unix_socket' => '',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'prefix_indexes' => true,
        'strict' => true,
        'engine' => NULL,
        'options' => 
        array (
        ),
      ),
      'pgsql' => 
      array (
        'driver' => 'pgsql',
        'host' => 'localhost',
        'port' => '5432',
        'database' => 'creatives',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
        'prefix' => '',
        'prefix_indexes' => true,
        'schema' => 'public',
        'sslmode' => 'prefer',
      ),
      'sqlsrv' => 
      array (
        'driver' => 'sqlsrv',
        'host' => 'localhost',
        'port' => '1433',
        'database' => 'creatives',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
        'prefix' => '',
        'prefix_indexes' => true,
      ),
    ),
    'migrations' => 'migrations',
    'redis' => 
    array (
      'client' => 'predis',
      'options' => 
      array (
        'cluster' => 'predis',
      ),
      'default' => 
      array (
        'host' => '127.0.0.1',
        'password' => NULL,
        'port' => '6379',
        'database' => 0,
      ),
      'cache' => 
      array (
        'host' => '127.0.0.1',
        'password' => NULL,
        'port' => '6379',
        'database' => 1,
      ),
    ),
  ),
  'filesystems' => 
  array (
    'default' => 'local',
    'cloud' => 's3',
    'disks' => 
    array (
      'local' => 
      array (
        'driver' => 'local',
        'root' => 'C:\\xampp\\htdocs\\Laravel Projects\\EcomX\\storage\\app',
      ),
      'public' => 
      array (
        'driver' => 'local',
        'root' => 'C:\\xampp\\htdocs\\Laravel Projects\\EcomX\\storage\\app/public',
        'url' => 'http://127.0.0.1:8000/storage',
        'visibility' => 'public',
      ),
      's3' => 
      array (
        'driver' => 's3',
        'key' => NULL,
        'secret' => NULL,
        'region' => NULL,
        'bucket' => NULL,
        'url' => NULL,
      ),
      'uploads' => 
      array (
        'driver' => 'local',
        'root' => 'C:\\xampp\\htdocs\\Laravel Projects\\EcomX/uploads',
      ),
    ),
  ),
  'forum' => 
  array (
    'api' => 
    array (
      'token' => 'Yl5NpB1bZGy21yLXWzvXNtS7ki18Aovu',
    ),
    'frontend' => 
    array (
      'routes' => true,
      'middleware' => 
      array (
        0 => 'web',
        1 => 'auth',
      ),
      'controllers' => 
      array (
        'namespace' => 'Riari\\Forum\\Frontend\\Http\\Controllers',
        'category' => 'CategoryController',
        'thread' => 'ThreadController',
        'post' => 'PostController',
      ),
      'utility_class' => 'Riari\\Forum\\Frontend\\Support\\Forum',
    ),
    'integration' => 
    array (
      'policies' => 
      array (
        'forum' => 'Riari\\Forum\\Policies\\ForumPolicy',
        'model' => 
        array (
          'Riari\\Forum\\Models\\Category' => 'Riari\\Forum\\Policies\\CategoryPolicy',
          'Riari\\Forum\\Models\\Thread' => 'Riari\\Forum\\Policies\\ThreadPolicy',
          'Riari\\Forum\\Models\\Post' => 'Riari\\Forum\\Policies\\PostPolicy',
        ),
      ),
      'user_model' => 'App\\User',
      'user_name' => 'name',
    ),
    'preferences' => 
    array (
      'old_thread_threshold' => '7 days',
      'pagination' => 
      array (
        'categories' => 20,
        'threads' => 20,
        'posts' => 15,
      ),
      'cache_lifetimes' => 
      array (
        'default' => 5,
        'Category' => 
        array (
          'deepestChild' => 720,
          'depth' => 720,
        ),
      ),
      'soft_deletes' => true,
      'display_trashed_posts' => true,
    ),
    'routing' => 
    array (
      'enabled' => true,
      'prefix' => 'forum',
      'as' => 'forum.',
      'api_prefix' => 'api',
      'middleware' => 'forum.api.auth',
    ),
    'validation' => 
    array (
      'rules' => 
      array (
        'author_id' => 
        array (
          0 => 'integer',
        ),
        'enable_threads' => 
        array (
          0 => 'boolean',
        ),
        'category_id' => 
        array (
          0 => 'integer',
        ),
        'content' => 
        array (
          0 => 'min:5',
        ),
        'locked' => 
        array (
          0 => 'boolean',
        ),
        'pinned' => 
        array (
          0 => 'boolean',
        ),
        'private' => 
        array (
          0 => 'boolean',
        ),
        'description' => 
        array (
          0 => 'string',
        ),
        'thread_id' => 
        array (
          0 => 'integer',
          1 => 'exists:forum_threads,id',
        ),
        'title' => 
        array (
          0 => 'string',
          1 => 'min:5',
        ),
        'weight' => 
        array (
          0 => 'integer',
        ),
      ),
    ),
  ),
  'hashing' => 
  array (
    'driver' => 'bcrypt',
    'bcrypt' => 
    array (
      'rounds' => 10,
    ),
    'argon' => 
    array (
      'memory' => 1024,
      'threads' => 2,
      'time' => 2,
    ),
  ),
  'image' => 
  array (
    'driver' => 'gd',
  ),
  'logging' => 
  array (
    'default' => 'stack',
    'channels' => 
    array (
      'stack' => 
      array (
        'driver' => 'stack',
        'channels' => 
        array (
          0 => 'daily',
        ),
        'ignore_exceptions' => false,
      ),
      'single' => 
      array (
        'driver' => 'single',
        'path' => 'C:\\xampp\\htdocs\\Laravel Projects\\EcomX\\storage\\logs/laravel.log',
        'level' => 'debug',
      ),
      'daily' => 
      array (
        'driver' => 'daily',
        'path' => 'C:\\xampp\\htdocs\\Laravel Projects\\EcomX\\storage\\logs/laravel.log',
        'level' => 'debug',
        'days' => 14,
      ),
      'slack' => 
      array (
        'driver' => 'slack',
        'url' => NULL,
        'username' => 'Laravel Log',
        'emoji' => ':boom:',
        'level' => 'critical',
      ),
      'papertrail' => 
      array (
        'driver' => 'monolog',
        'level' => 'debug',
        'handler' => 'Monolog\\Handler\\SyslogUdpHandler',
        'handler_with' => 
        array (
          'host' => NULL,
          'port' => NULL,
        ),
      ),
      'stderr' => 
      array (
        'driver' => 'monolog',
        'handler' => 'Monolog\\Handler\\StreamHandler',
        'formatter' => NULL,
        'with' => 
        array (
          'stream' => 'php://stderr',
        ),
      ),
      'syslog' => 
      array (
        'driver' => 'syslog',
        'level' => 'debug',
      ),
      'errorlog' => 
      array (
        'driver' => 'errorlog',
        'level' => 'debug',
      ),
    ),
  ),
  'mail' => 
  array (
    'driver' => 'smtp',
    'host' => 'smtp.googlemail.com',
    'port' => '587',
    'from' => 
    array (
      'address' => 'davedeloper@gmail.com',
      'name' => 'eComX',
    ),
    'encryption' => 'tls',
    'username' => 'davedeloper@gmail.com',
    'password' => 'developerpassworD',
    'sendmail' => '/usr/sbin/sendmail -bs',
    'markdown' => 
    array (
      'theme' => 'default',
      'paths' => 
      array (
        0 => 'C:\\xampp\\htdocs\\Laravel Projects\\EcomX\\resources\\views/vendor/mail',
      ),
    ),
    'log_channel' => NULL,
  ),
  'newsletter' => 
  array (
    'driver' => 'api',
    'apiKey' => '274d5e63d4894fe196546ddd7b3c72fd-us6',
    'defaultListName' => 'subscribers',
    'lists' => 
    array (
      'subscribers' => 
      array (
        'id' => '34eb6be4e4',
      ),
    ),
    'ssl' => true,
  ),
  'paystack' => 
  array (
    'publicKey' => 'pk_test_1776b9f3e4fdd6a4f64ef9bb8f59da817cb34984',
    'secretKey' => 'sk_test_5d91633f281fe71548d5f7a2a60cde4e16a3ad65',
    'paymentUrl' => 'git',
    'merchantEmail' => 'abbey4biz@gmail.com',
  ),
  'queue' => 
  array (
    'default' => 'database',
    'connections' => 
    array (
      'sync' => 
      array (
        'driver' => 'sync',
      ),
      'database' => 
      array (
        'driver' => 'database',
        'table' => 'jobs',
        'queue' => 'default',
        'retry_after' => 90,
      ),
      'beanstalkd' => 
      array (
        'driver' => 'beanstalkd',
        'host' => 'localhost',
        'queue' => 'default',
        'retry_after' => 90,
        'block_for' => 0,
      ),
      'sqs' => 
      array (
        'driver' => 'sqs',
        'key' => NULL,
        'secret' => NULL,
        'prefix' => 'https://sqs.us-east-1.amazonaws.com/your-account-id',
        'queue' => 'your-queue-name',
        'region' => 'us-east-1',
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
        'queue' => 'default',
        'retry_after' => 90,
        'block_for' => NULL,
      ),
    ),
    'failed' => 
    array (
      'database' => 'mysql',
      'table' => 'failed_jobs',
    ),
  ),
  'services' => 
  array (
    'mailgun' => 
    array (
      'domain' => NULL,
      'secret' => NULL,
      'endpoint' => 'api.mailgun.net',
    ),
    'postmark' => 
    array (
      'token' => NULL,
    ),
    'ses' => 
    array (
      'key' => NULL,
      'secret' => NULL,
      'region' => 'us-east-1',
    ),
    'sparkpost' => 
    array (
      'secret' => NULL,
    ),
    'stripe' => 
    array (
      'model' => 'App\\User',
      'key' => NULL,
      'secret' => NULL,
      'webhook' => 
      array (
        'secret' => NULL,
        'tolerance' => 300,
      ),
    ),
  ),
  'session' => 
  array (
    'driver' => 'file',
    'lifetime' => '120',
    'expire_on_close' => false,
    'encrypt' => false,
    'files' => 'C:\\xampp\\htdocs\\Laravel Projects\\EcomX\\storage\\framework/sessions',
    'connection' => NULL,
    'table' => 'sessions',
    'store' => NULL,
    'lottery' => 
    array (
      0 => 2,
      1 => 100,
    ),
    'cookie' => 'ecomx_session',
    'path' => '/',
    'domain' => NULL,
    'secure' => false,
    'http_only' => true,
    'same_site' => NULL,
  ),
  'view' => 
  array (
    'paths' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Laravel Projects\\EcomX\\resources\\views',
    ),
    'compiled' => 'C:\\xampp\\htdocs\\Laravel Projects\\EcomX\\storage\\framework\\views',
  ),
  'debug-server' => 
  array (
    'host' => 'tcp://127.0.0.1:9912',
  ),
  'trustedproxy' => 
  array (
    'proxies' => NULL,
    'headers' => 30,
  ),
  'tinker' => 
  array (
    'commands' => 
    array (
    ),
    'dont_alias' => 
    array (
      0 => 'App\\Nova',
    ),
  ),
);
