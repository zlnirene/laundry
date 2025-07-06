<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('dashboard'));
});

// Home > Blog
Breadcrumbs::for('item.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Item Service', route('item.index'));
});

Breadcrumbs::for('transaction.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Transaction', route('transaction.index'));
});

Breadcrumbs::for('transaction.create', function (BreadcrumbTrail $trail) {
    $trail->parent('transaction.index');
    $trail->push('New Transaction', route('transaction.create'));
});

// Item > New  Item
Breadcrumbs::for('item.create', function (BreadcrumbTrail $trail) {
    $trail->parent('item.index');
    $trail->push('New Item', route('item.create'));
});

Breadcrumbs::for('item.edit', function (BreadcrumbTrail $trail, $item) {
    $trail->parent('item.index');
    $trail->push('Edit', route('item.edit', $item->id));
});

// Home > Blog > [Category]
Breadcrumbs::for('category', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('blog');
    $trail->push($category->title, route('category', $category));
});