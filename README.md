![Doctype Admin Blog](https://github.com/pratiksh404/doctype_website/blob/master/image/doctype_website.png)

#### Contains : -

- Counters
- Pages
- Portfolios
- Images
- Services
- FAQs
- Plans

### Installation

Run Composer Require Command

```sh
composer require doctype_admin/doctype_website
```

### Install package assets

#### Install all assets

```sh
php artisan DoctypeAdminBlog:install -a
```

This command will publish

- config file named website.php
- views files
- migrations files
- seed files

#### Install config file only

```sh
php artisan DoctypeAdminBlog:install -c
```

#### Install view files only

```sh
php artisan DoctypeAdminBlog:install -f
```

#### Install migrations files only

```sh
php artisan DoctypeAdminBlog:install -m
```

#### Install seed files only

```sh
php artisan DoctypeAdminBlog:install -d
```

## Then migrate database

```sh
php artisan migrate
```

This Package includes two seed

- CountersTableSeeder
- FaqsTableSeeder
- PagesTableSeeder
- PlansTableSeeder
- PortfoliosTableSeeder
- ServicesTableSeeder
- TeamsTableSeeder

## Note

If seed class is not found try running composer dump-autoload

## To add the package route link to be accesable from sidemenu just add following on config/adminlte.php undr key 'menu'

```sh
     [
            'text' => 'Website',
            'icon' => 'fas fa-globe',
            'submenu' => [
                [
                    'text' => 'Counters',
                    'icon' => 'fas fa-clock',
                    'url' => 'admin/website/counter',
                ],
                [
                    'text' => 'Team',
                    'icon' => 'fas fa-people-arrows',
                    'url' => 'admin/website/team',
                ],
                [
                    'text' => 'Page',
                    'icon' => 'fas fa-file',
                    'url' => 'admin/website/plan',
                ],
                [
                    'text' => 'Portfolio',
                    'icon' => 'fas fa-camera',
                    'url' => 'admin/website/portfolio',
                ],
                [
                    'text' => 'Image',
                    'icon' => 'fas fa-images',
                    'url' => 'admin/website/image',
                ],
                [
                    'text' => 'Service',
                    'icon' => 'fas fa-concierge-bell',
                    'url' => 'admin/website/service',
                ],
                [
                    'text' => 'FAQ',
                    'icon' => 'fas fa-question',
                    'url' => 'admin/website/faq',
                ],
                [
                    'text' => 'Plan',
                    'icon' => 'fas fa-plus',
                    'url' => 'admin/website/plan',
                ],

            ]
        ],
```

### Admin Panel Screenshot

![Doctype Admin website](https://github.com/pratiksh404/doctype_website/blob/master/image/page.jpg)
![Doctype Admin website](https://github.com/pratiksh404/doctype_website/blob/master/image/plan.jpg)
![Doctype Admin website](https://github.com/pratiksh404/doctype_website/blob/master/image/portfolio.jpg)
![Doctype Admin website](https://github.com/pratiksh404/doctype_website/blob/master/image/team.jpg)

### Todos

- APIs
- Website Analytics
- Maintainabilty
- Better UI

## Package Used

- http://image.intervention.io/

## License

MIT

**DOCTYPE NEPAL ||DR.H2SO4**
