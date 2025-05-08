<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar -   {{ ucfirst($categoria) }}</title> 

    {{-- LINK DE FONT AWESONE PARA ICONOS --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    @vite(['resources/scss/roles/buyer/buyer_category.scss'])
    @vite('resources/js/pages/categories.js')


</head>
<body>
  
    <div class="container_header">
        @include('layout.categories.header_category')
    </div>

    <div class="container_nav">
        @include('layout.categories.nav_category')
    </div>

    <main class="main_categories">

        <figure class="figure_categories">

            <article class="article_categories"></article>
            <article class="article_categories"></article>
            <article class="article_categories"></article>
            <article class="article_categories"></article>
            <article class="article_categories"></article>
            <article class="article_categories"></article>
            <article class="article_categories"></article>
            <article class="article_categories"></article>
            <article class="article_categories"></article>
            <article class="article_categories"></article>
            <article class="article_categories"></article>
            <article class="article_categories"></article>
            <article class="article_categories"></article>
            <article class="article_categories"></article>
            <article class="article_categories"></article>
            <article class="article_categories"></article>
            <article class="article_categories"></article>
            <article class="article_categories"></article>
            <article class="article_categories"></article>
            <article class="article_categories"></article>
            <article class="article_categories"></article>
            <article class="article_categories"></article>
            <article class="article_categories"></article>
            <article class="article_categories"></article>
            <article class="article_categories"></article>
            <article class="article_categories"></article>
            <article class="article_categories"></article>
            <article class="article_categories"></article>
            <article class="article_categories"></article>
            <article class="article_categories"></article>
            <article class="article_categories"></article>
            <article class="article_categories"></article>
            <article class="article_categories"></article>
            <article class="article_categories"></article>
            <article class="article_categories"></article>
            <article class="article_categories"></article>
            <article class="article_categories"></article>
            <article class="article_categories"></article>
            <article class="article_categories"></article>

        </figure>

    </main>

</body>
</html>