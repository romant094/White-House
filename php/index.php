<?php 
defined('_JEXEC') or die;

/** @var JDocumentHtml $this */

$app  = JFactory::getApplication();
$user = JFactory::getUser();
$menu = $app->getMenu();

// Output as HTML5
$this->setHtml5(true);

// Getting params from template
$params = $app->getTemplate(true)->params;

// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = htmlspecialchars($app->get('sitename'), ENT_QUOTES, 'UTF-8');

// Add template js
JHtml::_('script', 'template.js', array('version' => 'auto', 'relative' => true));

// Add Stylesheets
JHtml::_('stylesheet', 'styles.css', array('version' => 'auto', 'relative' => true));
JHtml::_('stylesheet', 'https://use.fontawesome.com/releases/v5.3.1/css/all.css', array('version' => 'auto', 'relative' => false));
JHtml::_('stylesheet', 'animate.min.css', array('version' => 'auto', 'relative' => true));
JHtml::_('stylesheet', 'temp.css', array('version' => 'auto', 'relative' => true));



if (isset($params['phone'])) { 
  $phone_filtered = preg_replace('/\D/', '', $params['phone']);
  if($phone_filtered[0] == '8') {
    $phone_filtered = '+7' . substr($phone_filtered, 1);
  }
  else {
    $phone_filtered = '+' . $phone_filtered;
  }
}


?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<jdoc:include type="head" />
    <meta name="yandex-verification" content="c359ee2fea2ddb97" />
    <meta name="google-site-verification" content="gO4KBSFyAOFEXginUp0zgzfCt9N2hkOvPr_D-HjqGKY" />
</head>
<body id="top">
    <header class="header">
        <div class="container container--header">
            <div class="header--top">
                <div class="header__city">
                    Ваш город: <span id="city">Санкт-Петербург</span>
                    <div class="choose-city display-none animated fadeIn">
                        <ul>
                            <li data-city="moscow">Москва</li>
                            <li data-city="spb">Санкт-Петербург</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="header--bottom">
                <div class="header__logo">
                    <a href="/"><img src="image/logo.png" alt="White House"></a>
                </div>
        
                <nav class="header__menu">
                    <jdoc:include type="modules" name="top-menu" style="none" />
                    <span class="header__menu-mobile" id="mobile-menu-open"><i class="fas fa-bars"></i></span>
                </nav>

                <div class="header__callback">
                    <a href="tel:<?= $phone_filtered ?>" class="btn btn--transparent btn--icon btn--uppercase"><i class="fas fa-phone flip--horizontal fa-circle"></i> <?= $params['phone'] ?></a>
                </div>
            </div>
        </div>
    </header>

    <main>
        <?php if ($menu->getActive() == $menu->getDefault()) { ?>
        <section class="modern">
            <div class="modern__background">
                <div class="container flex flex-column flex-align-center">
                    <h1>Современный ремонт <br>в вашей квартире</h1>
                    <?php if (isset($params['time']) || isset($params['phone'])) { ?>
                    <span>
                      <?php if (isset($params['time'])) { ?>
                        Время работы <?= $params['time'] ?> <br>
                      <?php } ?>
                      <?php if (isset($params['phone'])) { ?>
                        Тел. <a href="tel:<?= $phone_filtered ?>"> <?= $params['phone'] ?></a>
                      <?php } ?>
                    </span>
                    <?php } ?>
                    <a href="#" class="btn btn--green btn--gradient" onclick="sfOpen();">Заказать проект</a>
                </div>
            </div>
        </section>
        <section class="advantages" id="advantages">
            <div class="container">
                <div class="headline-wrap">
                    <h2>Наши преимущества</h2>
                </div>
                <div class="row wrap center">
                    <div class="col col-1-of-3 advantages__one ">
                        <span class="advantages__one-image experience"></span>
                        <div class="advantages__one-text">
                            <h3>Опыт</h3>
                            <p>Сделали более 200 <br>успешных проектов</p>
                        </div>
                    </div>
                    <div class="col col-1-of-3 advantages__one ">
                        <span class="advantages__one-image measure"></span>
                        <div class="advantages__one-text">
                            <h3>Масштабы</h3>
                            <p>Выезжаем в любую <br>точку области</p>
                        </div>
                    </div>
                    <div class="col col-1-of-3 advantages__one ">
                        <span class="advantages__one-image clarity"></span>
                        <div class="advantages__one-text">
                            <h3>Прозрачность</h3>
                            <p>Никаких сюрпризов <br>в конце работы</p>
                        </div>
                    </div>
                    <div class="col col-1-of-3 advantages__one ">
                        <span class="advantages__one-image benefit"></span>
                        <div class="advantages__one-text">
                            <h3>Польза</h3>
                            <p>Mы всегда воплощаем <br>желания клиентов</p>
                        </div>
                    </div>
                    <div class="col col-1-of-3 advantages__one ">
                        <span class="advantages__one-image result"></span>
                        <div class="advantages__one-text">
                            <h3>Результат</h3>
                            <p>Мы не говорим <br>мы делаем</p>
                        </div>
                    </div>
                    <div class="col col-1-of-3 advantages__one ">
                        <span class="advantages__one-image outline"></span>
                        <div class="advantages__one-text">
                            <h3>Смета</h3>
                            <p>Вы будете знать <br>точную стоимость</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="services" id="nashi-uslugi">
            <div class="container container--wide">
                <div class="headline-wrap">
                    <h2>Наши услуги</h2>
                </div>
                <h3 class="services__outer col">Бесплатный замер и составление сметы</h3>
                <div class="row wrap center with-gutter">
                    <?php 
                      $services_electricity = json_decode($params->get('services-electricity'));
                    ?>
                    <div class="col services__one services__one--electricity">
                        <h3><?= $params->get('services-1-title') ?></h3>
                        <ul>
                          <?php foreach($services_electricity->row as $row) { ?>
                            <li><?= $row ?></li>
                          <?php } ?>
                        </ul>
                    </div>
                    <?php 
                      $services_plumbing = json_decode($params->get('services-plumbing'));
                    ?>
                    <div class="col services__one services__one--plumbing">
                        <h3><?= $params->get('services-2-title') ?></h3>
                        <ul>
                          <?php foreach($services_plumbing->row as $row) { ?>
                            <li><?= $row ?></li>
                          <?php } ?>
                        </ul>
                    </div>
                    <?php 
                      $services_painting = json_decode($params->get('services-painting'));
                    ?>
                    <div class="col services__one services__one--painting">
                        <h3><?= $params->get('services-3-title') ?></h3>
                        <ul>
                          <?php foreach($services_painting->row as $row) { ?>
                            <li><?= $row ?></li>
                          <?php } ?>
                        </ul>
                    </div>
                    <?php 
                      $services_decoration = json_decode($params->get('services-decoration'));
                    ?>
                    <div class="col services__one services__one--decoration">
                        <h3><?= $params->get('services-4-title') ?></h3>
                        <ul>
                          <?php foreach($services_decoration->row as $row) { ?>
                            <li><?= $row ?></li>
                          <?php } ?>
                        </ul>
                    </div>
                    <?php 
                      $services_design = json_decode($params->get('services-design'));
                    ?>
                    <div class="col services__one services__one--design">
                        <h3><?= $params->get('services-5-title') ?></h3>
                        <ul>
                          <?php foreach($services_design->row as $row) { ?>
                            <li><?= $row ?></li>
                          <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section class="feedback gradient-bg">
            <div class="container flex">
                <div class="feedback__content">
                    <h3>Оставьте заявку на бесплатный расчет стоимости ремонта</h3>
                    <form class="target-form" action="mail.php" method="post">
                        <div class="target-form-content row center">
                            <input type="text" placeholder="Имя" name="name" required>
                            <input type="text" placeholder="Контактный телефон" name="phone" required>
                            <input class="btn btn--green" type="submit" value="Отправить">
                        </div>
                    </form>
                    <p class="feedback__content-note">*Ваши данные не будут переданы третьим лицам. И мы не спамим</p>
                </div>
            </div>
        </section>

        <section class="portfolio" id="portfolio">
            <div class="container flex flex-column flex-align-center">
                <div class="headline-wrap">
                    <h2>Портфолио</h2>
                </div>

                <div class="portfolio__development disabled">
                    <p>В настоящее время мы работаем над наполнением данного раздела.</p>
                    <p>Приносим извинения за временные неудобства!</p>
                    <p>А пока посмотрите, <a href="#clients">что говорят о нас клиенты</a>...</p>
                    <p class="portfolio__development-regards">С уважением, <br>Компания РитмРемонт</p>
                </div>

                <div class="portfolio__content row wrap center">
                    <div class="col portfolio__content-single" ><img src="image/portfolio-img1.png" alt="1"></div>
                    <div class="col portfolio__content-single" ><img src="image/portfolio-img2.png" alt="2"></div>
                    <div class="col portfolio__content-single" ><img src="image/portfolio-img3.png" alt="3"></div>
                    <div class="col portfolio__content-single" ><img src="image/portfolio-img1.png" alt="4"></div>
                    <div class="col portfolio__content-single" ><img src="image/portfolio-img3.png" alt="5"></div>
                    <div class="col portfolio__content-single" ><img src="image/portfolio-img1.png" alt="6"></div>
                    <div class="col portfolio__content-single" ><img src="image/portfolio-img2.png" alt="7"></div>
                    <div class="col portfolio__content-single" ><img src="image/portfolio-img3.png" alt="8"></div>
                </div>
                <a href="#" class="btn btn--green" onclick="sfOpen();">Хочу также!</a>
            </div>
        </section>

        <jdoc:include type="modules" name="feedbacks" />

        <section class="steps">
            <div class="container">
                <div class="headline-wrap">
                    <h2>Схема работы</h2>
                </div>

                <div class="steps__content row wrap space-between">
                    <div class="steps__content-step step-one">
                        <h3>Звонок</h3>
                        <p>Мы созваниваемся <br>и обсуждаем подробности</p>
                    </div>
                    <div class="steps__content-step step-two">
                        <h3>Встреча</h3>
                        <p>В удобное для Вас <br>время приезжаем на объект</p>
                    </div>
                    <div class="steps__content-step step-three">
                        <h3>Замер</h3>
                        <p>Производим <br>бесплатный замер</p>
                    </div>
                    <div class="steps__content-step step-four">
                        <h3>Смета</h3>
                        <p>Составляем <br>подробную смету</p>
                    </div>
                    <div class="steps__content-step step-five">
                        <h3>Договор</h3>
                        <p>Заключаем <br>понятный договор</p>
                    </div>
                    <div class="steps__content-step step-six">
                        <h3>Работы</h3>
                        <p>Выполняем все <br>необходимые работы</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="questions gradient-bg">
            <div class="container">
                <div class="questions__content">
                    <h3>Остались вопросы?</h3>
                    <h3>Заполните заявку, и мы Вам перезвоним.</h3>
                    <form class="target-form" action="mail.php" method="post">
                        <div class="target-form-content row center">
                            <input type="text" placeholder="Имя" name="name" required>
                            <input type="text" placeholder="Контактный телефон" name="phone" required>
                            <input class="btn btn--green" type="submit" value="Отправить">
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <div class="map" id="kontakty">
            <script src="<?= JURI::base(true).'/templates/'.$app->getTemplate().'/' ?>js/yandex.map.js"></script>
        </div>
        <? } else { ?>
          <jdoc:include type="modules" name="news-rotator" style="none" />
          <jdoc:include type="component" />
        <?php } ?>
    </main>

    <footer class="footer">
        <div class="container">
            <div class="footer__content row space-between">
                <div class="col-1-of-3 col col--left">
                    <a href="/"><img src="image/logo-light.png" alt="White House"></a>
                </div>
                
                <div class="col-2-of-4 col col--mid">
                    <nav class="footer__menu">
                        <jdoc:include type="modules" name="top-menu" style="none" />
                    </nav>
                    <div class="footer__adress">
                      <?php if (isset($params['address']) || isset($params['time-footer'])) { ?>
                        <p class="adress">
                        <?php if (isset($params['address'])) { ?><i class="fas fa-map-marker-alt fa-circle--footer"></i><?= $params['address'] ?> <br><?php } ?>
                        <?php if (isset($params['time-footer'])) { ?>
                          Работаем <?= $params['time-footer'] ?>. </p>
                        <?php } ?>
                      <? } ?>

                      <?php if (isset($params['phone'])) { ?>
                        <p class="phone"><i class="fas fa-phone flip--horizontal fa-circle--footer"></i><a href="tel:<?= $phone_filtered ?>"> <?= $params['phone'] ?></a></p>
                      <?php } ?>
                    </div>


                    <?php if (isset($params['vk']) || isset($params['instagram']) || isset($params['email'])) { ?>
                    <div class="footer__socials">
                        <?php if (isset($params['footer-text'])) { ?><p><?= $params['footer-text'] ?></p><?php } ?>
                        <div>
                        <?php if (isset($params['vk'])) { ?>
                          <a href="<?= $params['vk'] ?>"><i class="fab fa-vk"></i></a>
                        <?php } ?>
                        <?php if (isset($params['instagram'])) { ?>
                          <a href="<?= $params['instagram'] ?>"><i class="fab fa-instagram"></i></a>
                        <?php } ?>
                        <?php if (isset($params['email'])) { ?>
                          <a href="mailto:<?= $params['email'] ?>"><i class="fas fa-envelope"></i></a>
                          <?php } ?>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </footer>

    <div class="mobile-menu animated disabled" id="mobile-menu">
        <div class="mobile-menu-wrap">
            <jdoc:include type="modules" name="mobile-menu" style="none" />
            <span class="mobile-menu-close" id="mobile-menu-close"><i class="fas fa-times"></i></span>
        </div>
    </div>

    <div class="sendform disabled" id="sendform">
        <div class="sendform__wrap animated bounceInDown">
            <span id="sendform-close"><i class="fas fa-times"></i></span>
            <h3>Оставьте заявку,<br> и мы вам перезвоним</h3>
            <form action="mail.php" method="post">
                <label>
                    <span>Имя</span>
                    <input type="text" name="name" required>
                </label>

                <label>
                    <span>Телефон</span>
                    <input type="text" name="phone" required>
                </label>
                <input type="submit" class="btn btn--green" value="Заказать проект">
            </form>
        </div>
    </div>

    <div class="go-top-wrap animate" id="go-top">
        <a class="go-top" href="#top"></a>
    </div>

    <script src="<?= JURI::base(true).'/templates/'.$app->getTemplate().'/' ?>js/peppermint.min.js"></script>
    <script src="<?= JURI::base(true).'/templates/'.$app->getTemplate().'/' ?>js/slider.js"></script>
    <script src="<?= JURI::base(true).'/templates/'.$app->getTemplate().'/' ?>js/modals.js"></script>
    <script src="<?= JURI::base(true).'/templates/'.$app->getTemplate().'/' ?>js/scrolling.js"></script>
    <script src="<?= JURI::base(true).'/templates/'.$app->getTemplate().'/' ?>js/top-button.js"></script>
    <!-- Yandex.Metrika counter -->
        <script >
            (function (d, w, c) {
                (w[c] = w[c] || []).push(function() {
                    try {
                        w.yaCounter51405445 = new Ya.Metrika2({
                            id:51405445,
                            clickmap:true,
                            trackLinks:true,
                            accurateTrackBounce:true
                        });
                    } catch(e) { }
                });

                var n = d.getElementsByTagName("script")[0],
                    s = d.createElement("script"),
                    f = function () { n.parentNode.insertBefore(s, n); };
                s.type = "text/javascript";
                s.async = true;
                s.src = "https://mc.yandex.ru/metrika/tag.js";

                if (w.opera == "[object Opera]") {
                    d.addEventListener("DOMContentLoaded", f, false);
                } else { f(); }
            })(document, window, "yandex_metrika_callbacks2");
        </script>
        <noscript><div><img src="https://mc.yandex.ru/watch/51405445" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-125706388-4"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-125706388-4');
        </script>
                    
</body>
</html>
