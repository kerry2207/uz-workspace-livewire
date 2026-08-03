# UZ Workspace — Laravel + Livewire 4

Окрема реалізація інтерфейсу UZ Workspace для Laravel 12 і Livewire 4. React-версія не є залежністю цього проєкту.

## Стек

- PHP 8.2+
- Laravel 12
- Livewire 4
- Alpine.js, що постачається разом із Livewire
- Blade Phosphor Icons
- Vite
- UZ Sans і брендова палітра Укрзалізниці

## Що вже перенесено

- адаптивний сайдбар і перемикач workspace;
- головна сторінка з персональним оглядом;
- загальні задачі у вигляді дошки, таблиці, списку й місячного календаря;
- окремі властивості статусу та пріоритету;
- створення задач, статусів, колонок і workspace;
- drag-and-drop задач між колонками через `wire:sort`;
- Notion-подібний редактор сторінок;
- drag-and-drop блоків, додавання, дублювання та видалення;
- текст, заголовки, чеклісти, таблиці, дошки, зображення, файли та посилання;
- пошук, сповіщення, коментарі та модальні вікна;
- базова схема БД для workspaces, сторінок, блоків, задач і коментарів.

## Запуск

```bash
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate
npm install
npm run build
composer run dev
```

Після запуску застосунок доступний на `http://localhost:8000`.

## Підключення до бекенду

Зараз демонстраційні дані зберігаються у властивостях головного Livewire-компонента `resources/views/pages/⚡workspace.blade.php`. Для production-інтеграції розробник замінює масиви на Eloquent-моделі або власні repository/service класи. UI, Blade-розмітка та Livewire actions при цьому залишаються.

Рекомендований порядок:

1. Додати авторизацію та політики доступу Laravel.
2. Замінити `$workspaces`, `$pages`, `$tasks`, `$blocks` і `$comments` на запити до моделей.
3. Перенести зміни порядку з `wire:sort` у поле `position`.
4. Зберігати завантаження через налаштований disk/S3.
5. Додати broadcasting для спільного редагування й сповіщень.

Детальні контракти наведені у [HANDOFF.md](HANDOFF.md).
