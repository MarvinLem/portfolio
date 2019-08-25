<?php
$query = new WP_Query( array( 'post_type' => 'projets'));
$querySkills = new WP_Query( array( 'post_type' => 'skills'));
$queryAbout = new WP_Query( array( 'post_type' => 'about'));
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description"
          content="Le Portfolio qui regroupe les différents projets et travaux de Lemarchand Marvin, Web Developpeur.">
    <meta name="keywords"
          content="Web Developpeur,Lemarchand,Marvin,Portfolio,Liège,Web Designer">
    <link href="<?php echo get_stylesheet_uri()?>" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri()?>/assets/favicon.png">
    <title>Portfolio - Lemarchand Marvin</title>
</head>
<body>
    <header class="header" itemscope itemtype="https://schema.org/Person">
        <h1 class="header__title" ><span class="header__span" itemprop="givenName">Lemarchand Marvin</span> - <span class="header__span" itemprop="jobTitle">Web Developpeur</span></h1>
        <div class="lightbox lightbox--off" id="lightbox">
            <div class="content withoutJavascript">
                <img class="icon icon--cancel withoutJavascript" src="<?php echo get_template_directory_uri()?>/assets/close.svg">
            </div>
            <div class="background"></div>
        </div>
        <nav class="nav">
            <h2 class="nav__title">Navigation du site</h2>
            <img class="nav__image" src="<?php echo get_template_directory_uri()?>/assets/logo.png" alt="Logo du site">
            <p class="nav__link nav__link--left">&nbsp;</p>
            <p class="nav__link nav__link--right">&nbsp;</p>
            <p class="nav__link nav__link--bottom">&nbsp;</p>
        </nav>
        <div class="burger-menu">
            <input class="burger-menu__checkbox" type="checkbox" />
            <span class="burger-menu__span"></span>
            <span class="burger-menu__span"></span>
            <span class="burger-menu__span"></span>
            <nav class="nav--header">
                <p class="nav--header__link nav--header__link--active">Présentation</p>
                <p class="nav--header__link">Compétences</p>
                <p class="nav--header__link">A propos</p>
                <p class="nav--header__link">Contact</p>
                <p class="nav--header__link">Projets</p>
            </nav>
        </div>
        <div class="wrapper">
            <div class="block block--presentation">
                <p class="block__text">" Bonjour je m'appelle <span class="block__span" itemprop="givenName">Marvin Lemarchand</span> et je crée des <span class="block__span">sites webs</span>. "</p>
            </div>
        </div>
        <div class="block block--competences">
            <div class="wrapper">
                <h3 class="block__title">Mes différentes compétences</h3>
                <?php if ( $querySkills->have_posts() ) : ?>
                    <?php while ( $querySkills->have_posts() ) : $querySkills->the_post(); ?>
                        <div class="container">
                            <h4 class="block__text"><?php the_title(); ?></h4>
                            <ul class="block__list">
                                <?php while( have_rows('skill') ): the_row();?>
                                <?php  $name = get_sub_field('name');
                                $rate = get_sub_field('rate');
                                ?>
                                <li class="list__item"><?php echo $name; ?><?php for($i = 0; $i < $rate;$i++){?><span class="list__marker list__marker--fill"></span><?php };?><?php for($i = 0 + $rate; $i < 5;$i++){?><span class="list__marker list__marker--grey"></span><?php }; ?>
                                    <?php endwhile;?>
                            </ul>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="block block--about">
            <div class="wrapper">
                <?php if ( $queryAbout->have_posts() ) : ?>
                    <?php while ( $queryAbout->have_posts() ) : $queryAbout->the_post(); ?>
                        <h3 class="block__title"><?php the_title() ?></h3>
                        <?php while( have_rows('content') ): the_row();?>
                        <?php  $text = get_sub_field('textarea'); ?>
                        <div class="container">
                            <p class="container__text"><?php echo $text; ?></p>
                        </div>
                        <?php endwhile; ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="block block--contact">
            <div class="wrapper">
                <h3 class="block__title">Me contacter</h3>
                <form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post" class="form" id="contactForm">
                    <div class="block">
                        <label class="form__label" for="nom">Nom*:
                            <input type="text" name="nom" value="" size="40" class="form__input" id="nom" aria-required="true" aria-invalid="false"> </label>
                    </div>
                    <div class="block block--right">
                        <label class="form__label" for="prenom">Prénom*:
                            <input type="text" name="prenom" value="" size="40" class="form__input" id="prenom" aria-required="true" aria-invalid="false"> </label>
                    </div>
                    <div class="block">
                        <label class="form__label" for="email">Email*:
                            <input type="email" name="email" value="" size="40" class="form__input" id="email" aria-required="true" aria-invalid="false"> </label>
                    </div>
                    <div class="block block--right">
                        <label class="form__label" for="mobile">Numéro:
                            <input type="text" name="mobile" value="" size="40" class="form__input" id="mobile" aria-invalid="false"> </label>
                    </div>
                    <div class="block block--large">
                        <label class="form__label" for="message">Message*:
                            <textarea name="message" cols="40" rows="6" class="form__textarea" id="message" aria-required="true" aria-invalid="false"></textarea> </label>
                    </div>
                    <p class="form__error" id="error"></p>
                    <input type="button" value="Envoyer" name="envoi" class="form__button" id="contactButton">
                    <input type="hidden" name="action" value="send_form">
                    <h4 class="block__subtitle">Vous pouvez aussi me contactez différement</h4>
                    <div class="block--info">
                        <p class="block__text block__text--title">Mon adresse email</p>
                        <a href="mailto:marvin.lemarchand@hotmail.com" class="block__text block__text--subtitle" title="Envoyer un message" itemprop="email">marvin.lemarchand@hotmail.com</a>
                    </div>
                    <div class="block--info">
                        <p class="block__text block__text--title">Mon numéro</p>
                        <a href="tel:+489512693" class="block__text block__text--subtitle" title="Téléphoner au +04 89 51 26 93" itemprop="telephone">+04 89 51 26 93</a>
                    </div>
                </form>
            </div>
        </div>
    </header>
    <main class="main">
        <h2 class="main__title">Mes projets</h2>
        <?php if ( $query->have_posts() ) : ?>
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            <?php
                $date = get_field('date');
                $description = get_field('description');
                $link = get_field('link');
                $image1 = get_field('image_1');
                $image2 = get_field('image_2');
                $image3 = get_field('image_3');
                $size1 = 'screenshot';
                $size2 = 'medium';
                $screen1 = $image1['sizes'][ $size1 ];
                $screen2 = $image2['sizes'][ $size1 ];
                $screen3 = $image3['sizes'][ $size1 ];
                $medium1 = $image1['sizes'][ $size2 ];
                $medium2 = $image2['sizes'][ $size2 ];
                $medium3 = $image3['sizes'][ $size2 ];
                ?>
                <section class="section">
                    <div class="wrapper wrapper--flex withoutJavascript">
                        <div class="block block--image">
                            <img class="block__image" src="<?php echo $screen1?>" srcset="<?php echo $screen1?> 720w, <?php echo $medium1?> 320w" sizes="(min-width: 720px) 320px, 720px" alt="<?php echo $image1['alt']?>">
                            <img class="block__image" src="<?php echo $screen2?>" srcset="<?php echo $screen2?> 720w, <?php echo $medium2?> 320w" sizes="(min-width: 720px) 320px, 720px" alt="<?php echo $image2['alt']?>">
                            <img class="block__image" src="<?php echo $screen3?>" srcset="<?php echo $screen3?> 720w, <?php echo $medium3?> 320w" sizes="(min-width: 720px) 320px, 720px" alt="<?php echo $image3['alt']?>">
                        </div>
                        <div class="block block--project">
                            <h3 class="block__title"><?php the_title(); ?></h3>
                            <p class="block__date">Date de création: <?php echo $date; ?></p>
                            <p class="block__text"><?php echo $description; ?></p>
                            <a class="block__link" title="Visiter le site web" href="<?php echo $link; ?>">Voir le site</a>
                        </div>
                    </div>
                </section>
            <?php endwhile; ?>
        <?php endif; ?>
                <section class="section section--competences">
                    <div class="wrapper">
                        <h2 class="section__title">A propos de mes compétences</h2>
                        <?php if ( $querySkills->have_posts() ) : ?>
                            <?php while ( $querySkills->have_posts() ) : $querySkills->the_post(); ?>
                            <div class="container">
                                <p class="block__text"><?php the_title(); ?></p>
                                <ul class="block__list">
                                    <?php while( have_rows('skill') ): the_row();?>
                                    <?php  $name = get_sub_field('name');
                                    $rate = get_sub_field('rate');
                                    ?>
                                    <li class="list__item"><?php echo $name; ?><?php for($i = 0; $i < $rate;$i++){?><span class="list__marker list__marker--fill"></span><?php };?><?php for($i = 0 + $rate; $i < 5;$i++){?><span class="list__marker list__marker--grey"></span><?php }; ?>
                                        <?php endwhile;?>
                                </ul>
                            </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </section>
                <section class="section section--about">
                    <div class="wrapper">
                        <?php if ( $queryAbout->have_posts() ) : ?>
                            <?php while ( $queryAbout->have_posts() ) : $queryAbout->the_post(); ?>
                                <h2 class="section__title"><?php the_title() ?></h2>
                                <?php while( have_rows('content') ): the_row();?>
                                    <?php  $text = get_sub_field('textarea'); ?>
                                    <div class="container">
                                        <p class="container__text"><?php echo $text; ?></p>
                                    </div>
                                <?php endwhile; ?>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </section>
                <section class="section section--contact">
                    <div class="wrapper">
                        <h2 class="section__title">Contactez-moi</h2>
                        <form method="POST" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" class="form">
                            <div class="block">
                                <label class="form__label" for="nom">Nom*:
                                    <input type="text" name="nom" value="" size="40" class="form__input" id="nom" aria-required="true" aria-invalid="false"> </label>
                            </div>
                            <div class="block block--right">
                                <label class="form__label" for="prenom">Prénom*:
                                    <input type="text" name="prenom" value="" size="40" class="form__input" id="prenom" aria-required="true" aria-invalid="false"> </label>
                            </div>
                            <div class="block">
                                <label class="form__label" for="email">Email*:
                                    <input type="email" name="email" value="" size="40" class="form__input" id="email" aria-required="true" aria-invalid="false"> </label>
                            </div>
                            <div class="block block--right">
                                <label class="form__label" for="mobile">Numéro:
                                    <input type="text" name="mobile" value="" size="40" class="form__input" id="mobile" aria-invalid="false"> </label>
                            </div>
                            <div class="block block--large">
                                <label class="form__label" for="message">Message*:
                                    <textarea name="message" cols="40" rows="6" class="form__textarea" id="message" aria-required="true" aria-invalid="false"></textarea> </label>
                            </div>
                            <input type="submit" value="Envoyer" name="envoi" class="form__button">
                            <input type="hidden" name="action" value="send_form">
                        </form>
                    </div>
                </section>
    </main>
    <div id="particles-js"></div>
    <script src="<?php echo get_stylesheet_directory_uri()?>/main.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri()?>/jquery-3.4.1.min.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri()?>/particles.js"></script>
    <script>
        particlesJS.load('particles-js', '<?php echo get_stylesheet_directory_uri()?>/particles.json', function() {
            console.log('callback - particles.js config loaded');
    });
    </script>
</body>
</html>