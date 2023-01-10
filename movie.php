<?php $wp_url = "https://thelasallian.com/wp-json/wp/v2/posts?_fields=title,link,jetpack_featured_media_url,date,authors&tags=2147"; ?>
<?php require_once 'php/functions/functions-global.php' ?>
<?php require_once 'php/functions/functions-subpages.php' ?>
<?php require_once 'php/functions/functions-category-subpages.php' ?>
<?php require_once 'php/components/pagination-category-subpages.php'; ?>
<?php require_once 'php/session/session-subpages.php'; ?>

<!doctype html>
<html lang="en">

<head>
    <?php require_once 'php/components/head.php' ?>
    <link rel="stylesheet" href="css/subpages.css">

    <!-- Title -->
    <title>The LaSallian: Rant and Rave - Movie</title>
</head>

<body>
    <!-- Navbar -->
    <?php require_once 'php/components/navbar.php'; ?>

    <!-- Subpage Header Styles -->
    <?php
        $most_recent_article = fetch_info('https://thelasallian.com/wp-json/wp/v2/posts?_fields=jetpack_featured_media_url&tags=2147&per_page=1&page=1');
        $sh_bgimg = $most_recent_article[0]["jetpack_featured_media_url"];
        $sh_gradientclass = 'sh-movie';
        $sh_heading = 'Movie';
        $sh_iconpath = 'assets/movie.png';
    ?>

    <!-- Subpage Header -->
    <?php
        render_subpage_header(
            $sh_bgimg,
            $sh_gradientclass,
            $sh_heading,
            $sh_iconpath
        ); 
    ?>

    <!-- TEMP: Display articles -->
    <h1>Movie</h1>
    <?php
    $all_articles = $_SESSION["ARTICLE_INFO"];

    foreach ($all_articles as $article) {
        init_article_info_catsubpage(
            $article,
            $visual_url,
            $title,
            $date,
            $authors,
            $article_url
        );
        echo $title;
        echo '<br/>';
    }

    ?>
    
    <?php render_page_links($page_count, basename(__FILE__)); ?>
    <!-- Footer -->
    <?php require_once 'php/components/footer.php'; ?>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>