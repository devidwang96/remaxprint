<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';

function getTextByAlias($array, $alias){
    $index = array_search($alias, array_column($array, 'keyword'));
    return $array[$index]['text'];
};

function getParamByAlias($array, $alias){
    $index = array_search($alias, array_column($array, 'keyword'));
    return $array[$index]['photo'];
};


?>

<div id="page-top" class="index">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top animate fade-down" data-duration="700">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle collapsed" aria-expanded="false" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll animate fade-right" data-duration="500" data-delay="1000" href="#page-top"><?= getTextByAlias($data['basics'], 'company_name') ?></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" aria-expanded="false" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right animate fade-left" data-duration="500" data-delay="1000">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services">Услуги</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#portfolio">Портфолио</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">О нас</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#team">Наша команда</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Написать нам</a>
                    </li>
                    <?php

                    if (!Yii::$app->user->isGuest) {

                        if(Yii::$app->user->identity->getAttribute('is_admin') === 1) { ?>
                        <li>
                            <a class="page-scroll" style="color:red;" href="/admin">Админка</a>
                        </li>
                        <?php } ?>

                        <li>
                            <a class="page-scroll" style="color:red;" href="/auth/logout">Выйти</a>
                        </li>

                    <?php } ?>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header class="animate down" data-duration="1000" style="background-image: url(/uploads/<?= getParamByAlias($data['basics'], 'welcome_section_background') ?>">
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in animate fade-down" data-delay="1000" data-duration="500"><?= getTextByAlias($data['basics'], 'welcome_section_addition_text') ?></div>
                <h1 class="intro-heading char-animate rotate-fade-left" data-duration="1000" data-delay="50" data-speed="30"><?= getTextByAlias($data['basics'], 'welcome_section_h1_text') ?></h1>
                <a href="<?= getParamByAlias($data['basics'], 'welcome_section_link_text') ?>" class="page-scroll btn btn-xl animate rotate-fade-right" data-delay="500" data-duration="1000"><?= getTextByAlias($data['basics'], 'welcome_section_link_text') ?></a>
            </div>
        </div>
    </header>

    <!-- Services Section -->
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading animate fade-up"><?= getTextByAlias($data['basics'], 'services_section_title') ?></h2>
                    <h3 class="section-subheading text-muted animate fade-up"><?= getTextByAlias($data['basics'], 'services_section_addition') ?></h3>
                </div>
            </div>


            <?php
                foreach(array_chunk($data['services'], 3) as $chunk){
                    echo '<div class="row text-center">';

                    foreach($chunk as $service){
                    ?>

                    <div class="col-md-4 animate fade-up">
                        <span class="fa-stack fa-4x">
                            <div class="service-image">
                                <img src="/uploads/<?= $service['photo'] ?>" alt="">
                            </div>
                        </span>
                            <h4 class="service-heading"><?= $service['title'] ?></h4>
                            <p class="text-muted"><?= $service['teaser'] ?></p>
                    </div>

                    <?php }

                    echo '</div>';
                }
             ?>

        </div>
    </section>

    <!-- Portfolio Grid Section -->
    <section id="portfolio" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading animate fade-up"><?= getTextByAlias($data['basics'], 'portfolio_section_title') ?></h2>
                    <h3 class="section-subheading text-muted animate fade-up"><?= getTextByAlias($data['basics'], 'portfolio_section_addition') ?></h3>
                </div>
            </div>

            <?php
            foreach(array_chunk($data['portfolio'], 3) as $chunk){
                echo '<div class="row">';

                foreach($chunk as $item){
                    ?>

                    <div class="col-md-4 col-sm-6 portfolio-item animate fade-up">
                        <a href="#portfolioModal<?= $item['id'] ?>" class="portfolio-link" data-toggle="modal">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content">
                                    <i class="fa fa-plus fa-3x"></i>
                                </div>
                            </div>
                            <img src="/uploads/<?= $item['photo'] ?>" class="img-responsive" alt="">
                        </a>
                        <div class="portfolio-caption">
                            <h4><?= $item['title'] ?></h4>
                            <p class="text-muted"><?= $item['teaser'] ?></p>
                        </div>
                    </div>

                <?php }

                echo '</div>';
            }
            ?>

        </div>
    </section>

    <!-- About Section -->
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading animate fade-up"><?= getTextByAlias($data['basics'], 'about_section_title') ?></h2>
                    <h3 class="section-subheading text-muted animate fade-up"><?= getTextByAlias($data['basics'], 'about_section_addition') ?></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="timeline">


                        <?php $history_counter = 0; foreach($data['history'] as $history){ ?>

                            <li<?= $history_counter % 2 == 0 ? ' class="timeline-inverted animate fade-left"' : ' class="animate fade-right"' ?>>
                                <div class="timeline-image">
                                    <img class="img-circle img-responsive" src="/uploads/<?= $history['photo'] ?>" alt="">
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4><?= $history['year'] ?></h4>
                                        <h4 class="subheading"><?= $history['title'] ?></h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p class="text-muted"><?= $history['teaser'] ?></p>
                                    </div>
                                </div>
                            </li>

                        <?php $history_counter++; } ?>

                        <li class="timeline-inverted">
                            <div class="timeline-image animate fade-up">
                                <h4>
                                    <?= getTextByAlias($data['basics'], 'about_section_ending') ?>
                                </h4>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section id="team" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading animate fade-up"><?= getTextByAlias($data['basics'], 'command_section_title') ?></h2>
                    <h3 class="section-subheading text-muted animate fade-up"><?= getTextByAlias($data['basics'], 'command_section_addition') ?></h3>
                </div>
            </div>

            <?php
            foreach(array_chunk($data['command'], 3) as $chunk){
                echo '<div class="row">';

                foreach($chunk as $item){
                    ?>

                    <div class="col-sm-4 animate fade-up">
                        <div class="team-member">
                            <div class="team-member-photo">
                                <img src="/uploads/<?= $item['photo'] ?>" class="img-responsive img-circle" alt="">
                            </div>
                            <h4><?= $item['name'] ?></h4>
                            <p class="text-muted"><?= $item['position'] ?></p>
                            <ul class="list-inline social-buttons">
                                <?= $item['tw'] !== '' ? '<li><a href="'. $item['tw'] .'" target="_blank"><i class="fa fa-twitter"></i></a></li>' : '' ?>
                                <?= $item['fb'] !== '' ? '<li><a href="'. $item['fb'] .'" target="_blank"><i class="fa fa-facebook"></i></a></li>' : '' ?>
                                <?= $item['vk'] !== '' ? '<li><a href="'. $item['vk'] .'" target="_blank"><i class="fa fa-vk"></i></a></li>' : '' ?>
                                <?= $item['insta'] !== '' ? '<li><a href="'. $item['insta'] .'" target="_blank"><i class="fa fa-instagram"></i></a></li>' : '' ?>
                            </ul>
                        </div>
                    </div>

                <?php }

                echo '</div>';
            }
            ?>

            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <p class="large text-muted animate fade-up"><?= getTextByAlias($data['basics'], 'command_section_endings') ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Clients Aside -->
<!--    <aside class="clients">-->
<!--        <div class="container">-->
<!--            <div class="row">-->
<!--                <div class="col-md-3 col-sm-6">-->
<!--                    <a href="#">-->
<!--                        <img src="/img/logos/envato.jpg" class="img-responsive img-centered" alt="">-->
<!--                    </a>-->
<!--                </div>-->
<!--                <div class="col-md-3 col-sm-6">-->
<!--                    <a href="#">-->
<!--                        <img src="/img/logos/designmodo.jpg" class="img-responsive img-centered" alt="">-->
<!--                    </a>-->
<!--                </div>-->
<!--                <div class="col-md-3 col-sm-6">-->
<!--                    <a href="#">-->
<!--                        <img src="/img/logos/themeforest.jpg" class="img-responsive img-centered" alt="">-->
<!--                    </a>-->
<!--                </div>-->
<!--                <div class="col-md-3 col-sm-6">-->
<!--                    <a href="#">-->
<!--                        <img src="/img/logos/creative-market.jpg" class="img-responsive img-centered" alt="">-->
<!--                    </a>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </aside>-->

    <!-- Contact Section -->
    <section id="contact" style="background-image: url(/uploads/<?= getParamByAlias($data['basics'], 'contact_section_background') ?>">
        <div class="container animate fade">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading"><?= getTextByAlias($data['basics'], 'contact_section_title') ?></h2>
                    <h3 class="section-subheading text-muted"><?= getTextByAlias($data['basics'], 'contact_section_addition') ?></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form name="sentMessage" id="contactForm" novalidate>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Ваше имя *" id="name" required
                                           data-validation-required-message="Пожалуйста, введите ваше имя.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Ваш E-mail *" id="email"
                                           required data-validation-required-message="Пожалуйста, введите ваш E-mail.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control" placeholder="Ваш телефон *" id="phone"
                                           required data-validation-required-message="Пожалуйста, введите ваш номер телефона.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Ваше сообщение *" id="message" required
                                              data-validation-required-message="Пожалуйста, введите сообщение."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" class="btn btn-xl">Отправить сообщение</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container animate fade-left">
            <div class="row">
                <div class="col-md-6">
                    <span class="copyright"><?= getTextByAlias($data['basics'], 'base_copyrights') ?></span>
                </div>
                <div class="col-md-6">
                    <ul class="list-inline social-buttons">
                        <?php

                        if(getParamByAlias($data['basics'], 'base_instagram') !== ''){
                            echo '<li><a href="'. getParamByAlias($data['basics'], 'base_instagram') .'"><i class="fa fa-instagram"></i></a></li>';
                        }

                        if(getParamByAlias($data['basics'], 'base_twitter') !== ''){
                            echo '<li><a href="'. getParamByAlias($data['basics'], 'base_twitter') .'"><i class="fa fa-twitter"></i></a></li>';
                        }

                        if(getParamByAlias($data['basics'], 'base_facebook') !== ''){
                            echo '<li><a href="'. getParamByAlias($data['basics'], 'base_facebook') .'"><i class="fa fa-facebook"></i></a></li>';
                        }
                        ?>

                    </ul>
                </div>

            </div>
        </div>
    </footer>

    <!-- Portfolio Modals -->
    <!-- Use the modals below to showcase details about your portfolio projects! -->

    <!-- Portfolio Modal 1 -->
    <?php
        foreach($data['portfolio'] as $item){
            ?>

            <div class="portfolio-modal modal fade" id="portfolioModal<?=$item['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="close-modal" data-dismiss="modal">
                            <div class="lr">
                                <div class="rl">
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8 col-lg-offset-2">
                                    <div class="modal-body">
                                        <!-- Project Details Go Here -->
                                        <h2><?= $item['title'] ?></h2>
                                        <p class="item-intro text-muted"><?= $item['teaser'] ?></p>
                                        <img class="img-responsive img-centered" src="/uploads/<?= $item['photo'] ?>" alt="">

                                        <button type="button" class="btn btn-primary" data-dismiss="modal"><i
                                                    class="fa fa-times"></i> Закрыть
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>

</div>