<?php

namespace App;

trait PageTemplates
{
    /*
    |--------------------------------------------------------------------------
    | Page Templates for Backpack\PageManager
    |--------------------------------------------------------------------------
    |
    | Each page template has its own method, that define what fields should show up using the Backpack\CRUD API.
    | Use snake_case for naming and PageManager will make sure it looks pretty in the create/update form
    | template dropdown.
    |
    | Any fields defined here will show up after the standard page fields:
    | - select template
    | - page name (only seen by admins)
    | - page title
    | - page slug
    */

    private function page()
    {
        $this->crud->addField([
                        'label' => "Выбор города",
                        'type' => 'select',
                        'name' => 'city_id',
                        'entity' => 'cities', // the method that defines the relationship in your Model
                        'attribute' => 'name', // foreign key attribute that is shown to user
                        'model' => "App\Models\Cities",
                    ]);
        $this->crud->addField([
                        'name' => 'active',
                        'label' => 'Страница активна',
                        'type' => 'checkbox'
                    ]);

        $this->crud->addField([   // CustomHTML
                        'name' => 'metas_separator',
                        'type' => 'custom_html',
                        'value' => '<br><h2>Заполнение SEO-тегов</h2><hr>',
                    ]);
        $this->crud->addField([
                        'name' => 'meta_title',
                        'label' => "Meta Заголовок",
                    ]);
        $this->crud->addField([
                        'name' => 'meta_description',
                        'label' => "Meta Описание",
                    ]);
        $this->crud->addField([
                        'name' => 'meta_keywords',
                        'type' => 'textarea',
                        'label' => "Meta Ключевые слова",
                    ]);

        $this->crud->addField([
                        'name' => 'sidebar',
                        'type' => 'radio',
                        'label' => "Расположение Сайдбара",
                        'options'     => [
                            0 => "Скрыть",
                            1 => "Показать слева",
                            2 => "Показать справа"
                        ],
                    ]);

        $this->crud->addField([
                        'name' => 'content',
                        'label' => 'Основной текст',
                        'type' => 'wysiwyg',
                        'tab' => 'Основной текст',
                        'placeholder' => trans('backpack::pagemanager.content_placeholder'),
                    ]);
        $this->crud->addField([
                        'name' => 'before_content',
                        'label' => 'Текст до основного',
                        'type' => 'wysiwyg',
                        'tab' => 'Текст до основного',
                        'placeholder' => trans('backpack::pagemanager.content_placeholder'),
                    ]);
        $this->crud->addField([
                        'name' => 'after_content',
                        'label' => 'Текст после основного',
                        'type' => 'wysiwyg',
                        'tab' => 'Текст после основного',
                        'placeholder' => trans('backpack::pagemanager.content_placeholder'),
                    ]);
    }

//    private function about_us()
//    {
//        $this->crud->addField([
//                        'name' => 'content',
//                        'label' => trans('backpack::pagemanager.content'),
//                        'type' => 'wysiwyg',
//                        'placeholder' => trans('backpack::pagemanager.content_placeholder'),
//                    ]);
//    }
}
