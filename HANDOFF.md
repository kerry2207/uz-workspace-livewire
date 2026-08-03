# Backend handoff

## Основна сторінка

Повносторінковий компонент зареєстрований так:

```php
Route::livewire('/', 'pages::workspace')->name('workspace');
```

Він використовує актуальний для Livewire 4 single-file component формат.

## Очікувані сутності

### Workspace

`id`, `owner_id`, `name`, `slug`, `visibility`, `members(role)`.

### Page

`id`, `workspace_id`, `parent_id`, `created_by`, `title`, `icon`, `cover_path`, `visibility`, `position`.

### PageBlock

`id`, `page_id`, `type`, `content(json)`, `position`.

Типи блоків: `text`, `heading`, `bullets`, `checklist`, `quote`, `callout`, `divider`, `table`, `board`, `image`, `file`, `link`, `page`.

### Task

`id`, `workspace_id`, `page_id`, `created_by`, `assignee_id`, `title`, `description`, `status`, `priority`, `due_at`, `tags`, `position`.

Статус і пріоритет — різні властивості. Колонка дошки — спосіб групування, а не окремий статус за замовчуванням.

### Comment

`id`, `page_id|task_id`, `user_id`, `body`, `anchor(json)`, `resolved_at`.

`anchor` зберігає блок і діапазон виділеного тексту для Google Docs-подібних коментарів.

## Livewire actions, які вже є у UI

- `navigate`
- `selectWorkspace`, `createWorkspace`
- `addTask`, `updateTaskStatus`, `updateTaskPriority`, `sortTask`
- `createStatus`, `createColumn`
- `addBlock`, `sortBlock`, `duplicateBlock`, `deleteBlock`
- `savePageImage`, `createPage`
- `addComment`, `resolveComment`
- `markInboxRead`, `copyPageLink`

Під час інтеграції в кожну action потрібно додати Laravel Policies/authorization та транзакційне збереження.

## Production checklist

- `auth` middleware на workspace route;
- policies для workspace/page/task/comment;
- optimistic locking або version field для блоків;
- broadcasting presence channel для спільного редагування;
- antivirus/MIME validation для файлів;
- database indexes на `workspace_id`, `page_id`, `parent_id`, `status`, `assignee_id`, `due_at`;
- queue для превʼю файлів і сповіщень;
- feature tests для permission matrix.
