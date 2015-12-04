
<div class="modal fade" id="about-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">About</h4>
            </div>
            <div class="modal-body">
                <h2>About me</h2>
                <p>
                    I am an artist who love to draw pokemon, and also I am a web developer. I made a little web page to collect my arts on
                    <a href="http://nganlamsong.deviantart.com">Deviant</a> to do the tracking for my progress and make a gallery in my favorite styles.
                </p>
                <p>
                    Pokemon is hereby copyrighted by <strong>@GameFreak - The Pokemon Company</strong>, and all the arts on this website is created by me as fan art.
                    I am not own Pokemon.
                </p>
                <h2>Planning</h2>
                <p>
                    I love Mega Evolution, although I dislike some of them, I always wish to draw all mega pokemon.
                </p>
                <p>
                    More desire, I would like to draw the full list of Pokemon. :v
                </p>

            </div>
        </div>
    </div>
</div>

<aside>
    <nav>
        <ul class="list-unstyled">
            <li>
                <a href="#">
                    <?php if (isset($in_progress[0]['AVARTAR']) && $in_progress[0]['AVARTAR'] != "") { ?>
                        <div class="image">
                            <img src="<?php echo $in_progress[0]['avartar']; ?>" alt="">
                        </div>
                    <?php } else { ?>
                        <img src="<?php echo base_url(); ?>resource/img/avartar/unknow.png" class="inprogress">
                    <?php }?>
                    <div id="countup">
                    </div>
                </a>
                <div class="sidebar-popout">
                    Another pokemon for my Mega evolution collection.
                    I am doing so much hard work and don't even have a tablet for my self.
                    Saving money to buy one. If you love my works and you are generous, you can encourage me by donation. :)
                    <div class="clearfix m-b-20"></div>
                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                        <input type="hidden" name="cmd" value="_s-xclick">
                        <input type="hidden" name="hosted_button_id" value="5QKXA84YYMFSE">
                        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                        <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                    </form>
                </div>
            </li>
            <li class="selected">
                <a href="#">
                    <img src="<?php echo base_url();?>resource/img/pokeball.png" class="img-icon">
                    All
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="<?php echo base_url();?>resource/img/mega.png" class="img-icon">
                    Mega
                </a>
            </li>
            <li><a href="#">Contribute</a></li>
            <li><a href="#">Donate</a></li>
            <li><a href="#" data-toggle="modal" data-target="#about-modal" >About</a></li>
        </ul>
    </nav>
</aside>
<main>
    <article class="container-fluid" id="main-container">
        <section class="row">
            <div class="col-xs-12 grid-container">
                <div id="grid">
                    <div class="grid-sizer"></div>
                    <?php foreach ($images as $image): ?>
                        <div class="grid-item">
                            <figure>
                                <img src="<?php echo $image['URL']; ?>" alt="">
                                <figcaption>Caption</figcaption>
                            </figure>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <div id="pagination-container">
            <ul class="pagination" id="ajax_pagingsearc">
                <?php echo $links; ?>
            </ul>
        </div>
    </article>
</main>
<?php
$in_progress_pkm = json_decode($in_progress[0]['DATE_START']);
?>
<script type="text/javascript">
    $(document).ready(function(e) {

        $('#about-modal').on('show.bs.modal', function (event) {
            $("main").addClass("blur");
        });

        $('#about-modal').on('hide.bs.modal', function (event) {
            $("main").removeClass("blur");
        });

        var date = new Date(<?php echo $in_progress_pkm->year; ?>, <?php echo $in_progress_pkm->mon - 1; ?>, <?php echo $in_progress_pkm->mday; ?>, <?php echo $in_progress_pkm->hours; ?>, <?php echo $in_progress_pkm->minutes; ?>, <?php echo $in_progress_pkm->seconds; ?>);
        console.log(date);
        $('#countup').countup({
            start: date
        });

        var $grid = $('#grid').imagesLoaded( function() {
            // init Masonry after all images have loaded
            $grid.masonry({
                  itemSelector: '.grid-item',
                  columnWidth: '.grid-sizer',
                  percentPosition: true,
                  gutter: 0
            });
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
                    $grid.append(items).masonry( 'appended', items ).masonry();
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

    });
</script>
