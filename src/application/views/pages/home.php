<button id="toggle-overlay">
    <span class="menu-icon"></span>
</button>
<div id="overlay">
    <div class="container">
        <div class="row row-height">
            <div class="col-sm-4 p-t-40 col-sm-height col-sm-top">
                <div class="overlay-transform delay-0">
                    <h3>About</h3>
                    <p class="m-b-40">
                        I am an artist who love to draw pokemon, and also I am a web developer. I made a little web page to collect my arts on
                        <a href="http://nganlamsong.deviantart.com">Deviant</a> to do the tracking for my progress and make a gallery in my favorite styles.
                    </p>
                </div>
                <div class="overlay-transform delay-1">
                    <h3>Copyright</h3>
                    <p class="m-b-40">
                        Pokemon is hereby copyrighted by <strong>@GameFreak - The Pokemon Company</strong>, and all the arts on this website is created by me as fan art.
                        I am not own Pokemon.
                    </p>
                </div>
                <div class="overlay-transform delay-2">
                    <h3>Planning</h3>
                    <p class="m-b-40">
                        I love Mega Evolution, although I dislike some of them, I always wish to draw all mega pokemon.
                        More desire, I would like to draw the full list of Pokemon. :v
                    </p>
                </div>
            </div>
            <div class="col-sm-4 p-t-40 col-sm-height">
                <div class="overlay-transform delay-3">
                    <a class="count-item" href="#">
                        <span class="count-value">125</span>
                        <span class="count-label">Normal Pokemon</span>                       
                    </a>
                    <a class="count-item" href="#">
                        <span class="count-value">16</span>
                        <span class="count-label">Mega Pokemon</span>                       
                    </a>
                </div>
                <div class="overlay-transform delay-4">
                    <?php if (isset($in_progress[0]['AVARTAR']) && $in_progress[0]['AVARTAR'] != "") { ?>
                        <div class="image">
                            <img src="<?php echo $in_progress[0]['avartar']; ?>" alt="">
                        </div>
                    <?php } else { ?>
                        <img src="<?php echo base_url(); ?>resource/img/avartar/unknow.png" class="inprogress">
                    <?php }?>
                    <div id="countup">
                    </div>
                    <div class="clearfix m-b-20">
                        <p>
                         Another pokemon for my Mega evolution collection.
                        I am doing so much hard work and don't even have a tablet for my self.
                        Saving money to buy one. If you love my works and you are generous, you can encourage me by donation. :)
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-sm-height col-sm-middle text-center">
                <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" class="overlay-transform delay-5">
                    <input type="hidden" name="cmd" value="_s-xclick">
                    <input type="hidden" name="hosted_button_id" value="5QKXA84YYMFSE">
                    <input type="image" src="<?php echo base_url(); ?>resource/img/donate.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                    <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                </form>
            </div>
        </div>
    </div>
</div>

<nav id="menu">
    <input type="hidden" id="page" value="1">
    <input type="hidden" id="maxpage" value="<?php echo $max_page; ?>">
    <ul class="list-unstyled">
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
                                <?php if ($image["ORIGIN"]) { ?>
                                    <a href="<?php echo $image["ORIGIN"]; ?>"></a>
                                <?php } ?>
                                <img src="<?php echo $image['URL']; ?>" alt="">
                                <figcaption>Caption</figcaption>
                            </figure>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </article>
</main>
<?php
$in_progress_pkm = json_decode($in_progress[0]['DATE_START']);
?>
<script type="text/javascript">

    $(document).ready(function(e) {

        function loadNextPage(nextPage) {
            $.ajax({
                type: "POST",
                data: {page: nextPage},
                url: '<?php echo base_url(); ?>index.php/home/page',
                dataType: 'html',
                success: function(data) {
                    var items = $(data);
                    $grid.append(items).masonry( 'appended', items ).imagesLoaded(function(){
                        $grid.masonry();
                    });
                    $("#page").val(nextPage + 1);
                },
                error: function(a,b,c) {
                    console.log(a,b,c);
                }
            });
        }

        $('#content').on('scroll', function() {
            if($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight) {
                if ($("#page").val() < $("#maxpage").val()) {
                    var page = parseInt($("#page").val());
                    var nextpage = page + 1;
                    loadNextPage(nextpage);
                }
            }
        });

        $('#toggle-overlay').on('click', function (event) {
            $("#overlay").toggleClass("in");
            $(this).toggleClass("active");
            $("#content, #menu").toggleClass("inactive");
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
                  gutter: 0,
                  isAnimated: false
            });
        });

    });
</script>
