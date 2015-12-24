<button id="toggle-overlay">
    <span class="menu-icon"></span>
</button>

<nav id="menu">
    <input type="hidden" id="page" value="1">
    <input type="hidden" id="maxpage" value="<?php echo $max_page; ?>">
    <ul class="list-unstyled">
        <li class="selected">
            <a href="#">
                <img src="<?php echo base_url();?>resource/img/pokeball.png" class="img-icon">
                Normal
            </a>
        </li>
        <li>
            <a href="#">
                <img src="<?php echo base_url();?>resource/img/mega.png" class="img-icon">
                Mega
            </a>
        </li>
        <li>
            <a href="#">
                <img src="<?php echo base_url();?>resource/img/mega.png" class="img-icon">
                Legend
            </a>
        </li>
    </ul>
</nav>

<main id="content">
    <article class="container-fluid" id="main-container">
        <section class="row">
            <div class="col-xs-12 grid-container">
                <div id="grid">
                    <div class="grid-sizer"></div>
                    <?php foreach ($images as $image): ?>
                        <div class="grid-item">
                            <figure>
                                <?php if ($image["image"]["ORIGIN"]) { ?>
                                    <a href="<?php echo $image["image"]["ORIGIN"]; ?>"></a>
                                <?php } ?>
                                <img src="<?php echo $image["image"]['URL']; ?>" alt="">
                                <figcaption>Caption</figcaption>
                                <?php if ($image["pokemon"]) { ?>
                                    <div class="pokemons">
                                        <?php foreach($image["pokemon"] as $pokemon) { ?>
                                            <?php if (isset($pokemon['AVARTAR']) && $pokemon['AVARTAR'] != "") { ?>
                                                <div class="image" title="<?php echo $pokemon['NAME']; ?>" data-id="<?php echo $pokemon['ID']; ?>">
                                                    <img src="<?php echo $pokemon['AVARTAR']; ?>" alt="">
                                                </div>
                                            <?php } else { ?>
                                                <div class="image" title="<?php echo $pokemon['NAME']; ?>" data-id="<?php echo $pokemon['ID']; ?>">
                                                    <img src="<?php echo base_url(); ?>resource/img/avartar/unknow.png">
                                                </div>
                                            <?php }?>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                            </figure>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </article>
</main>
<div id="pagination-container">
    <ul class="pagination" id="ajax_pagingsearc">
        <?php echo $links; ?>
    </ul>
</div>
<div id="overlay">
    <div class="container">
        <div class="row m-b-lg">
            <div class="col-xs-12 col-sm-6 col-sm-offset-3 text-center">
                <a href="http://nganlamsong.deviantart.com/" target="_blank" class="m-b-40 block">
                    <img src="<?php echo base_url(); ?>resource/img/avartar.png"/>
                </a>
                <p class="m-b-20">
                    I am an artist who love to draw pokemon, and also I am a web developer. I made a little web page to collect my arts on
                    <a href="http://nganlamsong.deviantart.com">Deviant</a> to do the tracking for my progress and make a gallery in my favorite styles.
                </p>
                <p class="m-b-80">
                    Pokémon and its trademarks are ©1995-2015 Nintendo, Creatures, and GAMEFREAK.
                    all the arts on this website is created by me as fan art.
                    I do not own Pokemon.
                </p>

<!--                <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" class="overlay-transform delay-5">-->
<!--                    <input type="hidden" name="cmd" value="_s-xclick">-->
<!--                    <input type="hidden" name="hosted_button_id" value="5QKXA84YYMFSE">-->
<!--                    <input type="image" src="--><?php //echo base_url(); ?><!--resource/img/donate.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">-->
<!--                    <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">-->
<!--                </form>-->
            </div>
        </div>
    </div>
</div>
<div class="container-fluid bottom-line">
    <h3 class="text-uppercase pull-right">Mega rayquaza >></h3>
</div>
<?php
$in_progress_pkm = json_decode($in_progress[0]['DATE_START']);
?>
<script type="text/javascript">
    $(document).ready(function(e) {

        var $grid = $('#grid').imagesLoaded( function() {
            // init Masonry after all images have loaded
            $grid.masonry({
                itemSelector: '.grid-item',
                columnWidth: '.grid-sizer',
                percentPosition: true,
                gutter: 0,
                isAnimated: false
            });
        });
        
        // jQuery
        $grid.on( 'layoutComplete', function( event, laidOutItems ) {
            $('html, body').animate({ scrollTop: 0 }, 'slow');
        });

        function ajaxPaging(url, page) {
            $.ajax({
                type: "POST",
                data: {
                    page: page
                },
                url: url,
                dataType: 'html',
                success: function(data) {
                    var items = $(data);
                    $grid.append(items).masonry( 'appended', items ).imagesLoaded(function(){
                        $grid.masonry();
                    });
                },
                error: function(a,b,c) {
                    console.log(a,b,c);
                }
            });
        }

        function ajaxGetPaging(url, page) {
            $.ajax({
                type: "POST",
                data: {
                    page: page,
                    getpaging: 1
                },
                url: url,
                dataType: 'html',
                success: function(data) {
                    $("#pagination-container").html(data);
                },
                error: function(a,b,c) {
                    console.log(a,b,c);
                }
            });
        }

        $(document).on('click', "#ajax_pagingsearc a", function(e) {
            e.preventDefault();
            $grid.masonry( 'remove', $(".grid-item") );
            var url = $(this).attr("href");
            var page = $(this).data("ci-pagination-page");
            ajaxPaging(url, page);
            ajaxGetPaging(url, page);
        });

        $('#toggle-overlay').on('click', function (event) {
            $("#overlay").toggleClass("in");
            $(this).toggleClass("active");
            $("#content, #menu").toggleClass("inactive");
        });

//        var date = new Date(<?php //echo $in_progress_pkm->year; ?>//, <?php //echo $in_progress_pkm->mon - 1; ?>//, <?php //echo $in_progress_pkm->mday; ?>//, <?php //echo $in_progress_pkm->hours; ?>//, <?php //echo $in_progress_pkm->minutes; ?>//, <?php //echo $in_progress_pkm->seconds; ?>//);
//        console.log(date);
//        $('#countup').countup({
//            start: date
//        });

    });
</script>
