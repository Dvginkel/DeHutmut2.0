<?php

// Home
Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push('Home', route('home'));
});



// Store
Breadcrumbs::register('store', function ($breadcrumbs) {
    $breadcrumbs->push('store', route('store'));
});

// Store / Slug
Breadcrumbs::register('store', function ($breadcrumbs, $slug) {
    $breadcrumbs->parent('blog');
    $breadcrumbs->push($slug->title, route('subCat', $slug));
});
