<?php

// --------------------------------------------------------
// This is only a pointer file, not an actual language file
// --------------------------------------------------------
//
// If you've copied this file to your /resources/lang/vendor/backpack/
// folder, please delete it, it's no use there. You need to copy/publish the
// actual language file, from the package.

// If a langfile with the same name exists in the package, load that one
// <?php

return [

    /*
    |--------------------------------------------------------------------------
    | Backpack Crud Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used by the CRUD interface.
    | You are free to change them to anything
    | you want to customize your views to better match your application.
    |
    */

    // Forms
    'save_action_save_and_new' => 'Сохранить и новый элемент',
    'save_action_save_and_edit' => 'Сохранить и отредактировать этот элемент',
    'save_action_save_and_back' => 'Сохранить и назад',
    'save_action_changed_notification' => 'Поведение по умолчанию после сохранения было изменено.',

    // Create form
    'add'                 => 'Добавить',
    'back_to_all'         => 'Назад ко всем записям ',
    'cancel'              => 'Отмена',
    'add_a_new'           => 'Добавить новый ',

    // Edit form
    'edit'                 => 'Редактировать',
    'save'                 => 'Сохранить',

    // Revisions
    'revisions'            => 'Revisions',
    'no_revisions'         => 'No revisions found',
    'created_this'         => 'created this',
    'changed_the'          => 'changed the',
    'restore_this_value'   => 'Restore this value',
    'from'                 => 'from',
    'to'                   => 'to',
    'undo'                 => 'Undo',
    'revision_restored'    => 'Revision successfully restored',
    'guest_user'           => 'Guest User',

    // Translatable models
    'edit_translations' => 'EDIT TRANSLATIONS',
    'language'          => 'Язык',

    // CRUD table view
    'all'                       => 'Все ',
    'in_the_database'           => 'в БД',
    'list'                      => 'Список',
    'actions'                   => 'Действия',
    'preview'                   => 'Предпросмотр',
    'delete'                    => 'Удалить',
    'admin'                     => 'Admin',
    'details_row'               => 'Это строка дополнительных сведений. Измените, пожалуйста.',
    'details_row_loading_error' => 'При загрузке деталей произошла ошибка. Повторите попытку.',

        // Confirmation messages and bubbles
        'delete_confirm'                              => 'Вы уверенны что хотите удалить это?',
        'delete_confirmation_title'                   => 'Запись удалена',
        'delete_confirmation_message'                 => 'Запись удалена успешно.',
        'delete_confirmation_not_title'               => 'Запись НЕ удалена',
        'delete_confirmation_not_message'             => "Ошибка. Эта запись не может быть удалена",
        'delete_confirmation_not_deleted_title'       => 'Запись НЕ удалена',
        'delete_confirmation_not_deleted_message'     => 'Действие отменено. Запись не изменена.',

        'ajax_error_title' => 'ОШИБКА',
        'ajax_error_text'  => 'ОШИБКА загрузки страницы. Перезагрузите!',

        // DataTables translation
        'emptyTable'     => 'Данные отсутствуют в таблице',
        'info'           => 'Показано _START_ до _END_ из _TOTAL_ записей',
        'infoEmpty'      => 'Показано 0 до 0 из 0 записей',
        'infoFiltered'   => '(filtered from _MAX_ total entries)',
        'infoPostFix'    => '',
        'thousands'      => ',',
        'lengthMenu'     => '_MENU_ записей на странице',
        'loadingRecords' => 'Загрузка...',
        'processing'     => 'Processing...',
        'search'         => 'Поиск: ',
        'zeroRecords'    => 'Записи НЕ НАЙДЕНЫ',
        'paginate'       => [
            'first'    => 'Первый',
            'last'     => 'Последний',
            'next'     => 'След.',
            'previous' => 'Пред.',
        ],
        'aria' => [
            'sortAscending'  => ': активировать сортировку столбца по возрастанию',
            'sortDescending' => ': активировать сортировку столбца по убыванию',
        ],
        'export' => [
            'copy'              => 'Копировать',
            'excel'             => 'Excel',
            'csv'               => 'CSV',
            'pdf'               => 'PDF',
            'print'             => 'Печать',
            'column_visibility' => 'Видимые столбцы',
        ],

    // global crud - errors
        'unauthorized_access' => 'ОТКАЗАНО В ДОСТУПЕ - У Вас нет прав просматривать эту страницу.',
        'please_fix' => 'Исправте следующие ошибки:',

    // global crud - success / error notification bubbles
        'insert_success' => 'Элемент добавлен успешно.',
        'update_success' => 'Элемент обновлен успешно.',

    // CRUD reorder view
        'reorder'                      => 'Reorder',
        'reorder_text'                 => 'Use drag&drop to reorder.',
        'reorder_success_title'        => 'Done',
        'reorder_success_message'      => 'Your order has been saved.',
        'reorder_error_title'          => 'Error',
        'reorder_error_message'        => 'Your order has not been saved.',

    // CRUD yes/no
        'yes' => 'Yes',
        'no' => 'No',

    // CRUD filters navbar view
        'filters' => 'Фильтры',
        'toggle_filters' => 'Переключить фильтры',
        'remove_filters' => 'Снять фильтры',

    // Fields
        'browse_uploads' => 'Загрузить из библиотеки',
        'select_all' => 'Выбрать ВСЕ',
        'select_files' => 'Выбрать файлы',
        'select_file' => 'Выбрать файл',
        'clear' => 'Очистить',
        'page_link' => 'Page link',
        'page_link_placeholder' => 'http://example.com/your-desired-page',
        'internal_link' => 'Internal link',
        'internal_link_placeholder' => 'Internal slug. Ex: \'admin/page\' (no quotes) for \':url\'',
        'external_link' => 'External link',
        'choose_file' => 'Выберить файл',

    //Table field
        'table_cant_add' => 'Невозмодно добавить новый :entity',
        'table_max_reached' => 'Максимальное количество :max reached',

    // File manager
    'file_manager' => 'Менеджер файлов',
];
