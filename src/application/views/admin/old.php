<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name = "keywords" content = "hotel template, bootstrap3, html5, jquery, one page, onepage, One Page Website, Sticky Navigation" />
        <meta name = "description" content = "Croyala - Resposive Bootstrap 3 hotel web template" />
        <meta name="viewport" content="width=device-width">
        <link href="view/main/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="view/main/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="view/main/libs/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        
        <script src="view/main/libs/jquery/jquery.js" type="text/javascript"></script>
        <script src="view/main/libs/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="view/main/libs/jquery.nicescroll.min.js" type="text/javascript"></script>
        <script src="view/main/libs/masonry.pkgd.min.js" type="text/javascript"></script>
        <script src="view/main/libs/imagesloaded.pkgd.min.js" type="text/javascript"></script>
        <script src="view/main/libs/Chart.min.js" type="text/javascript"></script>
        <title>Mega Pokemon</title>
    </head>
    <body>
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add news pokemon</h4>
              </div>
              <div class="modal-body">
                  <form class="row" id="form-info">
                      <input type="hidden" name="id" value="">
                      <div class="col-xs-6 form-group">
                          <input type="text" name="number" class="form-control" placeholder="Number"/>
                      </div>
                      <div class="col-xs-6 form-group">
                          <input type="text" name="name" class="form-control" placeholder="Name"/>
                      </div>
                      <div class="col-xs-6 form-group">
                          <input type="text" name="thumbnail" class="form-control" placeholder="Thumbnail image"/>
                      </div>
                      <div class="col-xs-6 form-group">
                          <input type="text" name="gif" class="form-control" placeholder="GIF image"/>
                      </div>
                      <div class="col-xs-6 form-group">
                          <input type="text" name="avartar" class="form-control" placeholder="Avartar"/>
                      </div>
                      <div class="col-xs-6 form-group">
                          <input type="text" name="height" class="form-control" placeholder="Height"/>
                      </div>
                      <div class="col-xs-6 form-group">
                          <input type="text" name="weight" class="form-control" placeholder="Weight"/>
                      </div>
                      <div class="col-xs-6 form-group">
                          <input type="text" name="hp" class="form-control" placeholder="Hp"/>
                      </div>
                      <div class="col-xs-6 form-group">
                          <input type="text" name="atk" class="form-control" placeholder="ATK"/>
                      </div>
                      <div class="col-xs-6 form-group">
                          <input type="text" name="def" class="form-control" placeholder="DEF"/>
                      </div>
                      <div class="col-xs-6 form-group">
                          <input type="text" name="satk" class="form-control" placeholder="SATK"/>
                      </div>
                      <div class="col-xs-6 form-group">
                          <input type="text" name="sdef" class="form-control" placeholder="SDEF"/>
                      </div>
                      <div class="col-xs-6 form-group">
                          <input type="text" name="spd" class="form-control" placeholder="SPD"/>
                      </div>
                      <div class="col-xs-12">
                            <label>Status</label>
                            <div class="clearfix">
                                <label class="c-input c-radio">
                                    <input name="status" type="radio" value="0" class="radio">
                                    <span class="c-indicator"></span>
                                    Not yet
                                </label>
                                <label class="c-input c-radio">
                                    <input name="status" type="radio" value="1" class="radio">
                                    <span class="c-indicator"></span>
                                    Done
                                </label>
                                <label class="c-input c-radio">
                                    <input name="status" type="radio" value="2" class="radio">
                                    <span class="c-indicator"></span>
                                    Need updating
                                </label>
                                <label class="c-input c-radio">
                                    <input name="status" type="radio" value="3" class="radio">
                                    <span class="c-indicator"></span>
                                    Need redraw
                                </label>
                            </div>
                      </div>
                  </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn-save-pokemon">Save</button>
                <button type="button" class="btn btn-primary" id="btn-save-new-pokemon">Save & new</button>
              </div>
            </div>
          </div>
        </div>
        <main class="view-port row grid-space-0">
            <aside class="col-sm-3" id="list-view">
                <div class="inner">
                    <button id="btn-view-toggle">
                        <i class="fa fa-cogs"></i>
                    </button>
                    <div class="row">
                        <form class="m-b-20 search-form col-xs-12" id="search">
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1"><span class="fa fa-search"></span></span>
                                <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
                            </div>
                        </form>
                        <div class="btn-group col-xs-12" role="group" aria-label="..." id="paging">
                            <input type="hidden" id="edit" val="0" />
                            <button type="button" class="btn btn-default">1</button>
                            <button type="button" class="btn btn-default">2</button>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Add new...</button>
                            <button type="button" class="btn btn-success" data-toggle="modal" id="btn-edit">Edit</button>
                        </div>
                    </div>
                    
                </div>
                <div class="inner">
                    <div id="list" class="list m-b-20">
                        <?php foreach ($list as $pokemon) { ?>
                            <div class="list-item-wrapper status-<?php echo $pokemon['status']; ?>" data-id="<?php echo $pokemon["id"]; ?>">
                                <input type="hidden" class="pkm-id">
                                <div class="number heading-font">
                                    <?php echo $pokemon['number']; ?>
                                </div>
                                <?php if (isset($pokemon['avartar']) && $pokemon['avartar'] != "") { ?>
                                    <div class="image">
                                        <img src="<?php echo $pokemon['avartar']; ?>" alt="">
                                    </div>
                                <?php } else { ?>
                                    <?php if (file_exists("view/main/image/avartar/".$pokemon['id'].".png")) { ?>
                                        <div class="image">
                                            <img src="view/main/image/avartar/<?php echo $pokemon['id']; ?>.png">
                                        </div>
                                    <?php } else { ?>
                                        <div class="image">
                                            <img src="view/main/image/avartar/unknow.png">
                                        </div>
                                    <?php } ?>
                                <?php }?>
                                <div class="name">
                                    <?php echo $pokemon['name']; ?>
                                </div>
                                <?php if (isset($pokemon['gif']) && $pokemon['gif'] != "") { ?>
                                    <div class="img-gif">
                                        <img src="<?php echo $pokemon['gif']; ?>" alt="<?php echo $pokemon['name']; ?>">
                                    </div>
                                <?php } else {?>
                                    <?php if (file_exists("view/main/image/gif/".$pokemon['id'].".gif")) { ?>
                                        <div class="img-gif">
                                            <img src="view/main/image/gif/<?php echo $pokemon['id']; ?>.gif">
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                                <div class="command">
                                    <button class="btn-update btn">update</button>
                                    <button class="btn-delete btn">delete</button>
                                </div>
                            </div>
                        <?php } ?>                        
                    </div>
                </div>
            </aside>
            <article class="main-info col-sm-9" id="main">
                <div class="row grid-space-0">
                    <div class="col-xs-12">
                        <div class="grid">
                            <div class="grid-sizer"></div>
                            <div class="grid-item x2">
                                <div class="info-content">
                                    <div class="inner text-right">
                                        <h1 class="text-uppercase heading-font text-white"><span class="text-fighting text-uppercase">Mega</span> Lucario</h1>
                                        <p class="text-white normal-size">
                                            Height: 2.01m<br>Weight: 100.0 kg
                                        </p>
                                        <p class="text-white normal-size">
                                            By catching the aura emanating from others, it can read their thoughts and movements.
                                        </p>
                                        <div class="entry"><span class="text-center heading-font normal-size">#448</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-item x2">
                                <img src="view/main/image/info_image/MegaLucario Iam.png" alt="" class="img-fluid">
                            </div>
                            <div class="grid-item x2 stats">
                                <div id="basestatContainer1">
                                    <canvas id="canvas" height="450" width="450"></canvas>
                                </div>
                            </div>
                            <div class="grid-item">
                                <img src="http://pre14.deviantart.net/83ce/th/pre/i/2015/182/a/a/the_best_of_his_life_by_nganlamsong-d8zhyd8.png" alt="">
                            </div>
                            <div class="grid-item">
                                <img src="http://img04.deviantart.net/b0b1/i/2014/212/b/1/memory____by_nganlamsong-d7sx9rz.png">
                            </div>
                            <div class="grid-item">
                                <img src="http://pre05.deviantart.net/891d/th/pre/i/2015/252/e/b/pokemon___mega_lucario_by_sa_dui-d98zbp4.jpg">
                            </div>
                            <div class="grid-item">
                                <img src="http://img01.deviantart.net/97a3/i/2013/222/3/b/pokemon__mega_mawile_and_mega_lucario_by_mark331-d6hlq1r.jpg">
                            </div>
                            <div class="grid-item">
                                <img src="http://pre15.deviantart.net/71f0/th/pre/i/2013/227/5/a/lucario_mega_evolve_artwork__unofficial__by_tomycase-d6i3sip.png">
                            </div>
                            <div class="grid-item">
                                <img src="http://pre06.deviantart.net/73b1/th/pre/i/2013/222/d/d/lucario_mega_form_by_tomycase-d6hetwg.png">
                            </div>
                            <div class="grid-item">
                                <img src="http://pre15.deviantart.net/301b/th/pre/i/2014/123/3/d/mega_lucario___aura_sphere_by_ishmam-d711mqi.png">
                            </div>
                            <div class="grid-item">
                                <img src="http://img07.deviantart.net/777c/i/2014/082/6/8/pokemon___megalucario_by_sa_dui-d6h8tdh.jpg">
                            </div>
                            <div class="grid-item">
                                <img src="http://img06.deviantart.net/2ade/i/2015/011/2/4/pokemon___megalucario_vs_weavile_by_sa_dui-d8dj0pw.jpg">
                            </div>
                            <div class="grid-item">
                                <img src="http://img03.deviantart.net/cc67/i/2013/223/7/4/megalucario_by_nganlamsong-d6hn4b9.png">
                            </div>
                            <div class="grid-item">
                                <img src="http://img06.deviantart.net/a23b/i/2014/048/5/4/tag_team_battle___by_rikuaoshi-d76ut6n.jpg">
                            </div>
                            <div class="grid-item">
                                <img src="http://img08.deviantart.net/fc25/i/2015/324/1/f/lucario__commit_to_fight_by_nganlamsong-d9hdjff.png">
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </main>
        <script type="text/javascript">           
            $(document).ready(function() {
                $("#list").niceScroll({
                    cursorborder:"none",
                    cursorcolor:"rgba(255,255,255,.5)",
                    cursorwidth: "10px",
                    cursorborderradius: "0px"
                }); // First scrollable DIV
                        
                // init Masonry
                var $grid = $('.grid').imagesLoaded( function() {
                    // init Masonry after all images have loaded
                    $grid.masonry({
                          itemSelector: '.grid-item',
                          columnWidth: '.grid-sizer',
                          percentPosition: true,
                          gutter: 10
                    });
                });
                
                $grid.on( 'layoutComplete', function(){
                    $(".grid").addClass("loaded");
                });

                $("#btn-view-toggle").on("click", function(e) {
                    if ($("#list-view").hasClass("expand")) {
                        $("#list-view").addClass("animating").removeClass("expand");
                        $("#main").removeClass("hidden");
                        $("#search, #paging").removeClass("col-xs-6").addClass("col-xs-12");
                    } else {
                        $("#list-view").addClass("animating").addClass("expand");
                        $("#main").addClass("hidden");
                        $("#search, #paging").removeClass("col-xs-12").addClass("col-xs-6");
                    }
                });

                $("#list-view").on('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(e) {
                    $("#list-view").removeClass('animating');
                });
                
                function createPokemon() {
                    $.ajax({
                        url: 'controller/Main.php',
                        type: 'POST',
                        data: $("#form-info").serialize() + '&action=add',
                        success: function(data) {
                            $("#btn-save-pokemon").button('reset');
                            $('#myModal').modal('hide');
                            console.log(data);
                        },
                        error: function(a, b, c) {
                            $("#btn-save-pokemon").button('reset');
                            console.log("fail cmnr", a, b, c);
                        }
                    });
                };
                
                function updatePokemon() {
                    $.ajax({
                        url: 'controller/Main.php',
                        type: 'POST',
                        data: $("#form-info").serialize() + '&action=update',
                        success: function(data) {
                            $("#btn-save-pokemon").button('reset');
                            console.log(data);
                        },
                        error: function(a, b, c) {
                            $("#btn-save-pokemon").button('reset');
                            console.log("fail cmnr", a, b, c);
                        }
                    });
                }
                
                $("#btn-save-pokemon").on("click", function(e) {
                    $(this).button('loading');
                    var edit = $("#edit").val();
                    if (edit == "1") {
                        updatePokemon();
                    } else {
                        createPokemon();
                    }
                });
                
                function updatePokemon() {
                     $.ajax({
                        url: 'controller/Main.php',
                        type: 'POST',
                        data: $("#form-info").serialize() + '&action=update',
                        success: function(data) {
                            $("#btn-save-pokemon").button('reset');
                            $('#myModal').modal('hide');
                            console.log(data);
                        },
                        error: function(a, b, c) {
                            $("#btn-save-pokemon").button('reset');
                            console.log("fail cmnr", a, b, c);
                        }
                    });
                }
                
                $("#btn-save-new-pokemon").on("click", function(e) {
                    $(this).button('loading');
                    $.ajax({
                        url: 'controller/Main.php',
                        type: 'POST',
                        data: $("#form-info").serialize() + '&action=add',
                        success: function(data) {
                            $("#btn-save-new-pokemon").button('reset');
                            $("#form-info input").val("");
                        },
                        error: function(a, b, c) {
                            $("#btn-save-new-pokemon").button('reset');
                            console.log("fail cmnr", a, b, c);
                        }
                    });
                });
                var radarChartData = {
                    labels: ["HP", "ATK", "DEF", "SATK", "SDEF", "SPD"],
                    datasets: [
                        {
                            label: "Pokemon stat",
                            fillColor: "rgba(255,255,255,.2)",
                            strokeColor: "rgba(255,255,255, .8)",
                            pointColor: "rgba(255,255,255,1)",
                            pointStrokeColor: "#fff",
                            pointHighlightFill: "rgb(255,255,255)",
                            pointHighlightStroke: "rgba(220,220,220,1)",
                            data: [105,180,100,180,100,115]
                        }
                    ]
                };
                window.myRadar = new Chart(document.getElementById("canvas").getContext("2d")).Radar(radarChartData, {
                    responsive: true,
                    scaleLineColor: "rgba(255,255,255,.4)",
                    animationEasing: "easeInOutBack",
                    //Number - Point label font size in pixels
                    pointLabelFontSize : 18,
                    //String - Point label font colour
                    pointLabelFontColor : "#FFF"
               });
               
               $("#btn-edit").on("click", function(e){
                   var edit = $("#edit").val();
                   if (edit == "1") {
                       $("#list").removeClass("updating");
                   } else {
                        $("#list").addClass("updating");
                   }
               });
               
               $(".btn-delete").on("click", function(e) {
                   var that = $(this);
                   var id = $(this).closest(".list-item-wrapper").data("id");
                   var confirmMsg = confirm("delete this pokemon?");
                    if (confirmMsg) {
                        $.ajax({
                            url: 'controller/Main.php',
                            type: 'POST',
                            data: 'id=' + id + '&action=delete',
                            dataType: 'json',
                            success: function(data) {
                                console.log(data);
                                if (data.status) {
                                    that.closest(".list-item-wrapper").slideUp(function(){
                                        $(this).remove();
                                    });
                                }
                            },
                            error: function(a, b, c) {
                                console.log("fail cmnr", a, b, c);
                            }
                        });
                    }
               });
               
               $(".btn-update").on("click", function(e) {
                   var id = $(this).closest(".list-item-wrapper").data("id");
                    $.ajax({
                        url: 'controller/Main.php',
                        type: 'POST',
                        data: 'id=' + id + '&action=get',
                        dataType: 'json',
                        success: function(data) {
                            fetchDataToForm(data.data);
                            $("#edit").val(1);
                            $('#myModal').modal('show');
                        },
                        error: function(a, b, c) {
                            console.log("fail cmnr", a, b, c);
                        }
                    });
               });
               
               function fetchDataToForm(jsonData) {
                    $("#form-info input[name='id']").val(jsonData.id);
                    $("#form-info input[name='number']").val(jsonData.number);
                    $("#form-info input[name='name']").val(jsonData.name);
                    $("#form-info input[name='gif']").val(jsonData.gif);
                    $("#form-info input[name='avartar']").val(jsonData.avartar);
                    $("#form-info input[name='thumbnail']").val(jsonData.thumbnail);
                    $("#form-info input[name='height']").val(jsonData.height);
                    $("#form-info input[name='weight']").val(jsonData.weight);
                    $("#form-info input[name='atk']").val(jsonData.thumbnail);
                    $("#form-info input[name='def']").val(jsonData.thumbnail);
                    $("#form-info input[name='hp']").val(jsonData.thumbnail);
                    $("#form-info input[name='satk']").val(jsonData.thumbnail);
                    $("#form-info input[name='sdef']").val(jsonData.thumbnail);
                    $("#form-info input[name='spd']").val(jsonData.thumbnail);
                    $("#form-info .radio[value='" + jsonData.status + "']").prop("checked", true);
                }
               
            });
        </script>
    </body>
</html>
