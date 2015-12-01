<aside>
    <nav>
        <ul class="list-unstyled">
            <li>
                <a id="popover">
                    <img src="<?php echo base_url();?>resource/img/Mega_Kangaskhan.png" class="inprogress">
                    <div id="countup">
                    </div>
                </a>
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
            <li><a href="#">About me</a></li>
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
<script type="text/javascript">
    $(document).ready(function(e) {
        $('#countup').countup();
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
