
# Syllabus Checklist

- [ ] How to create a new Laravel project?
- [ ] How to create a page?
- [ ] How to create a route?
- [ ] How to create a controller?
- [ ] How to create a view?
- [ ] How to create users from tinker?
- [ ] How to read a record?
- [ ] How to read records?
- [ ] How to create pagination?
- [ ] How to create a form?
- [ ] How to validate form using Request?
- [ ] How to validate form in Controller?
- [ ] How to insert a new record?
- [ ] How to update a record?
- [ ] How to create method spoofing?
- [ ] How to get error messages from validators?
- [ ] How to create a model and migration script together?
- [ ] How to create a model factory?
- [ ] How to create seeder file?
- [ ] How to call model factory in seeder file?
- [ ] How to call seeder file in `DatabaseSeeder.php`?
- [ ] How to seed data?
- [ ] How to create relationship?

# How to create a page

## Route

Set Route - `routes/web.php`

```php
Route::get('about-us','PageController@aboutUs')
```

## Controller

Create a controller - `php artisan make:controller PageController --resource` - and create a method `aboutUs` returning view from `pages.index`.

```php
public function aboutUs()
{
	return view('pages.index');
}
```

## View

Create the view - create new folder in `resources/views/` named `pages`. In `pages`, create `aboutUs.blade.php`. Add the following content:

```html
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
		<h1>About Us</h1>
    </div>
</div>
@endsection
```

# How to create a list of dummy users using Artisan Tinker

Run `php artisan tinker`.

Then run `factory(\App\User::class, 100)->create();`. This will create 100 users.

# How to create a validator

Create custom request by running `php artisan make:request UserRequest`.

Open `UserRequest.php` located at `app/Http/Requests`.

Add validation rules for your form at `rules()` method:

```php
return [
    'name' => 'required|min:6|max:255',
    'email' => 'required|email|max:255|unique:users',
    'password' => 'required|min:6|confirmed',
];
```

Next, include `UserRequest` namespace in `UserController` - `use App\Http\Requests\UserRequest;`. 

Now in `UserController`'s `store(Request $request)` method, replace `store(Request $request)` with `store(UserRequest $request)`.

## To display error message

Following are the sample to display an error message

```html
@if ($errors->has('email'))
    <span class="help-block">
        <strong>{{ $errors->first('email') }}</strong>
    </span>
@endif
```

## Authorization

You may return to `true` in `UserRequest`'s `authorize()` method if there's no particular authorization required.

```php
public function authorize()
{
    return true;
}
```

## Validation from within Controller

```php
$this->validate($request, [
    'name' => 'required|min:6|max:255',
    'password' => 'required|min:6|confirmed',
]);
```

# How to create a model and migration script together?

Just run following command:

```php
php artisan make:model Post -m
```

This will create a model named `Post.php` in `app` folder and a migration script `timestamp_create_posts_table.php` in `database\migrations` folder.

Read more about [Creating Columns](https://laravel.com/docs/5.3/migrations#creating-columns)

After done adding columns, run `php artisan migrate` to run the migration script and have your tables in database.

# How to create model factory

Open up `database\factories\ModelFactory.php` and copy the user's factory and update as following:

```php
$factory->define(App\Post::class, function (Faker\Generator $faker) {
    
    return [
        'title' => $faker->sentence,
        'description' => $faker->text
    ];
});
```

# Seeds

## How to Create Seeder

Create a seeder file using following command:

```php
php artisan make:seeder PostTableSeeder
```

Open `PostTableSeeder.php` located at `database\seeds` folder and call the factory for `Post`, as following in `run` method:

```php
factory(\App\Post::class, 100)->create();
```

## How to Call Another Seeder

Open up `database\seeds\DatabaseSeeder.php` and call the `PostTableSeeder` as following:

```php
public function run()
{
    $this->call(PostSeeder::class);
}
```

## How to Seed Data

There's three ways in seeding data.

Following command will seed data by calling `DatabaseSeeder.php`:

```
php artisan db:seed
```

Following command will seed data by calling seeder class name:

```
php artisan db:seed --class=PostSeeder
```

Following command will seed data after do the migration:

```
php artisan migrate --seed
```

# Relationships

3 basic steps required to setup relationship between tables.

## Setup Foreign Key

Let say we want to have a user has many posts.

Create migration script:

```
php artisan make:migration add_post_owner --table=posts
```

Open up the `timestamp_add_post_owner.php` migration script and add the following in `up` and `down` method respectively.

```
Schema::table('posts', function (Blueprint $table) {
    $table->integer('user_id')->unsigned()->after('id');
});
```

```
Schema::table('posts', function (Blueprint $table) {
    $table->dropColumn('user_id');
});
```

Then we run `php artisan migrate`.

## Update `ModelFactory.php`

Update the `App\Post` model factory by adding `user_id`.

```
$factory->define(App\Post::class, function (Faker\Generator $faker) {
    return [
        'user_id' => $faker->randomElement(range(1, 100)),
        'post' => $faker->paragraph,
    ];
});
```

## Define Relationships in Models

Next we need to add relationship between related models, in this case we need `User` and `Post` model.

For `User` model, a user has many posts, add the following method `app/User.php`:

```php
public function posts()
{
    return $this->hasMany('App\Post');
}
```

For `Post` model, a post belongs to user, add the following method `app/Post.php`:

```php
public function user()
{
    return $this->belongsTo('App\User');
}
```

Once you're done setting up the relationships, you may use the models like:

```php
$user = User::find(1);
// just dump all the posts
dd($user->posts);
```

```php
$post = Post::find(1);
// echo the owner of the post
$post->user->name;
```
