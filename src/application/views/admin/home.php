<header class="container header">
    <div class="row">
        <div class="col-xs-12">
            <h1 class="text-hairline text-uppercase text-center">NGANLAMSONG</h1>
        </div>
    </div>
</header>
<main class="container">
    <section class="row m-b-lg">
        <div class="col-sm-4 text-center">
            <span class="display-4 text-hairline display-bordered">
                <?php echo count($list); ?>
            </span>
            <h2 class="text-uppercase text-light">Pokemon</h2>
        </div>
        <div class="col-sm-8">
            <div id="list" class="list">
                <table class="table">
                    <?php foreach ($list as $pokemon) { ?>
                        <tr class="status-<?php echo $pokemon['status']; ?>" data-id="<?php echo $pokemon["id"]; ?>">
                            <input type="hidden" class="pkm-id">
                            <td class="text-light">
                                <?php echo $pokemon['number']; ?>
                            </td>
                            <td>
                                <?php if (OFFLINE) {?>
                                    <div class="image">
                                        <img src="<?php echo base_url(); ?>resource/img/avartar/unknow.png">
                                    </div>
                                <?php } else { ?>
                                    <?php if (isset($pokemon['avartar']) && $pokemon['avartar'] != "") { ?>
                                        <div class="image">
                                            <img src="<?php echo $pokemon['avartar']; ?>" alt="">
                                        </div>
                                    <?php } else { ?>
                                        <div class="image">
                                            <img src="<?php echo base_url(); ?>resource/img/avartar/unknow.png">
                                        </div>
                                    <?php }?>
                                <?php } ?>
                            </td>
                            <td>
                                <?php echo $pokemon['name']; ?>
                            </td>
                            <td class="text-right">
                                <button class="btn-update btn btn-primary">update</button>
                                <button class="btn-delete btn btn-danger">delete</button>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
            <div class="clearfix text-right">
                <h3 class="text-light btn btn-lg btn-default" data-toggle="modal" data-target="#modal-add-pokemon">+ create new...</h3>
            </div>
        </div>
    </section>
    <section class="row m-b-lg">
        <div class="col-sm-4 text-center">
            <span class="display-4 text-hairline display-bordered"><?php echo count($images_list); ?></span>
            <h2 class="text-uppercase text-light">images</h2>
        </div>
        <div class="col-sm-8">
            <div class="list">
                <table class="table">
                    <tbody>
                    <?php if ($images_list) {?>
                        <?php foreach($images_list as $image){ ?>
                            <tr data-id="<?php echo $image['ID'];?>">
                                <td class="text-light">
                                    <?php echo $image['ID']; ?>
                                </td>
                                <td>
                                    <?php if (OFFLINE) {?>
                                        <?php echo $image['URL']; ?>
                                    <?php } else { ?>
                                        <img src="<?php echo $image['URL']; ?>" style="height: 100px; width: auto;" alt="<?php echo $image['ID']; ?>">
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php echo $image['NAME']; ?>
                                </td>
                                <td>
                                    <?php if ($image['ORIGIN']) {?>
                                        <a href="<?php echo $image['ORIGIN']; ?>" target="_blank">Go to source</a>
                                    <?php } ?>
                                </td>
                                <td class="text-right">
                                    <button class="btn-image-remove btn btn-danger">delete</button>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <tr>
                            <td colspan="5">
                                You have no image at all
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
            <div class="clearfix text-right">
                <h3 class="text-light btn btn-lg btn-default" data-toggle="modal" data-target="#modal-add-img">+ add new...</h3>
            </div>
        </div>

    </section>
    <section class="row">
        <div class="col-sm-4 text-center">
            <h2 class="text-uppercase text-light">The next art</h2>
            <?php if (isset($in_progress[0]['AVARTAR']) && $in_progress[0]['AVARTAR'] != "") { ?>
                <div class="image">
                    <img src="<?php echo $in_progress[0]['avartar']; ?>" alt="">
                </div>
            <?php } else { ?>
                <img src="<?php echo base_url(); ?>resource/img/avartar/unknow.png" class="inprogress m-b-20">
            <?php }?>
            <div id="countup"></div>
            <textarea class="form-control m-b-lg" id="text-new-art" rows="5">Another pokemon for my Mega evolution collection. I am doing so much hard work and don't even have a tablet for my self. Saving money to buy one. If you love my works and you are generous, you can encourage me by donation. :)
            </textarea>
        </div>
    </section>
</main>
<!-- Modal -->
<div class="modal fade" id="modal-add-img" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add new image</h4>
      </div>
      <div class="modal-body">
        <form id="form-img">
            <div class="form-group">
                <input class="form-control input-sm" name="pokemon" placeholder="pokemons">
            </div>
            <div class="form-group">
                <input class="form-control input-sm" name="url" placeholder="url">
            </div>
            <div class="form-group">
                <input class="form-control input-sm" name="name" placeholder="image name">
            </div>
            <div class="form-group">
                <input class="form-control input-sm" name="origin" placeholder="origin">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button class="btn btn-success" id="btn-add-img">Add</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal-add-pokemon" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <input type="hidden" id="edit" val="">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add new pokemon</h4>
      </div>
      <div class="modal-body">
          <form id="form-info">
              <input type="hidden" name="id" value="">
              <fieldset class="row">
                    <legend class="col-xs-12">
                        Basic info
                    </legend>
                    <div class="col-xs-6 form-group">
                        <input type="text" name="number" class="form-control input-sm" placeholder="Number"/>
                    </div>
                    <div class="col-xs-6 form-group">
                        <input type="text" name="name" class="form-control input-sm" placeholder="Name"/>
                    </div>
                    <div class="col-xs-6 form-group">
                        <input type="text" name="thumbnail" class="form-control input-sm" placeholder="Thumbnail image"/>
                    </div>
                    <div class="col-xs-6 form-group">
                        <input type="text" name="gif" class="form-control input-sm" placeholder="GIF image"/>
                    </div>
                    <div class="col-xs-6 form-group">
                        <input type="text" name="avartar" class="form-control input-sm" placeholder="Avartar"/>
                    </div>
                    <div class="col-xs-6 form-group">
                        <input type="text" name="info_url" class="form-control input-sm" placeholder="Pokemondb link"/>
                    </div>
              </fieldset>
              <fieldset class="row">
                    <legend class="col-xs-12">
                        Stats
                    </legend>
                    <div class="col-xs-6 form-group">
                        <input type="text" name="hp" class="form-control input-sm" placeholder="Hp"/>
                    </div>
                    <div class="col-xs-6 form-group">
                        <input type="text" name="atk" class="form-control input-sm" placeholder="ATK"/>
                    </div>
                    <div class="col-xs-6 form-group">
                        <input type="text" name="def" class="form-control input-sm" placeholder="DEF"/>
                    </div>
                    <div class="col-xs-6 form-group">
                        <input type="text" name="satk" class="form-control input-sm" placeholder="SATK"/>
                    </div>
                    <div class="col-xs-6 form-group">
                        <input type="text" name="sdef" class="form-control input-sm" placeholder="SDEF"/>
                    </div>
                    <div class="col-xs-6 form-group">
                        <input type="text" name="spd" class="form-control input-sm" placeholder="SPD"/>
                    </div>
              </fieldset>
              <fieldset class="row">
                  <legend class="col-xs-12">
                      Status
                  </legend>
                  <div class="clearfix col-xs-12">
                      <label class="checkbox-inline">
                        <input type="checkbox" value="1" name="mega" class="mega"> Mega
                      </label>
                      <label class="checkbox-inline">
                        <input type="checkbox" name="legend" value="1" class="legend"> Legend
                      </label>
                  </div>
              </fieldset>
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
<?php
    $in_progress_pkm = json_decode($in_progress[0]['DATE_START']);
?>
<script type="text/javascript">
    $(document).ready(function() {
        var date = new Date(<?php echo $in_progress_pkm->year; ?>, <?php echo $in_progress_pkm->mon - 1; ?>, <?php echo $in_progress_pkm->mday; ?>, <?php echo $in_progress_pkm->hours; ?>, <?php echo $in_progress_pkm->minutes; ?>, <?php echo $in_progress_pkm->seconds; ?>);
        $('#countup').countup({
            start: date
        });
        
        $(".list").niceScroll({
            cursorborder:"none",
            cursorcolor:"rgba(0,0,0,.5)",
            cursorwidth: "10px",
            cursorborderradius: "0px"
        }); // First scrollable DIV

        function createPokemon() {
            console.log($("#form-info").serialize());
            $.ajax({
                url: '<?php echo base_url(); ?>index.php/admin/add_pokemon',
                type: 'POST',
                data: $("#form-info").serialize(),
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
                url: '<?php echo base_url(); ?>index.php/admin/update_pokemon',
                type: 'POST',
                data: $("#form-info").serialize(),
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
                url: '<?php echo base_url(); ?>index.php/admin/add_pokemon',
                type: 'POST',
                data: $("#form-info").serialize(),
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

       $(".btn-delete").on("click", function(e) {
           var that = $(this);
           var id = $(this).closest("tr").data("id");
           var confirmMsg = confirm("delete this pokemon?");
            if (confirmMsg) {
                $.ajax({
                    url: '<?php echo base_url(); ?>index.php/admin/delete_pokemon',
                    type: 'POST',
                    data: 'id=' + id,
                    success: function(data) {
                        console.log(data);
                        that.closest("tr").slideUp(function(){
                            $(this).remove();
                        });
                    },
                    error: function(a, b, c) {
                        console.log("fail cmnr", a, b, c);
                    }
                });
            }
       });

        $(".btn-update").on("click", function(e) {
            var id = $(this).closest("tr").data("id");
             $.ajax({
                 url: '<?php echo base_url(); ?>index.php/admin/get_pokemon',
                 type: 'POST',
                 data: 'id=' + id,
                 dataType: 'json',
                 success: function(data) {
                     console.log(data);
                     fetchDataToForm(data.data);
                     $("#edit").val(1);
                     $('#modal-add-pokemon').modal('show');
                 },
                 error: function(a, b, c) {
                     console.log("fail cmnr", a, b, c);
                 }
             });
        });

       function fetchDataToForm(jsonData) {
            console.log(jsonData);
            $("#form-info input[name='id']").val(jsonData.id);
            $("#form-info input[name='number']").val(jsonData.number);
            $("#form-info input[name='name']").val(jsonData.name);
            $("#form-info input[name='gif']").val(jsonData.gif);
            $("#form-info input[name='avartar']").val(jsonData.avartar);
            $("#form-info input[name='thumbnail']").val(jsonData.thumbnail);
            $("#form-info input[name='atk']").val(jsonData.thumbnail);
            $("#form-info input[name='def']").val(jsonData.thumbnail);
            $("#form-info input[name='hp']").val(jsonData.thumbnail);
            $("#form-info input[name='satk']").val(jsonData.thumbnail);
            $("#form-info input[name='sdef']").val(jsonData.thumbnail);
            $("#form-info input[name='spd']").val(jsonData.thumbnail);
            if (jsonData.mega == '1') {
                $("#form-info .mega").prop("checked", true);
            }
            if (jsonData.legend == '1') {
                $("#form-info .legend").prop("checked", true);
            }
        }
        
        $(document).on("click", "#btn-add-img", function(e){
            e.preventDefault();
            var that = $(this);
            that.button("loading");
            $.ajax({
                url: '<?php echo base_url(); ?>index.php/admin/add_img',
                type: 'POST',
                data: $("#form-img").serialize(),
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    that.button("reset");
                },
                error: function(a, b, c) {
                    console.log("fail cmnr", a, b, c);
                }
            });
        });
        
        $(document).on("click", ".btn-image-remove", function(e){
            e.preventDefault();
            var that = $(this);
            that.button("loading");
            var closestTR = that.closest("tr");
            var id = closestTR.data("id");
            $.ajax({
                url: '<?php echo base_url(); ?>index.php/admin/delete_img',
                type: 'POST',
                data: "id=" + id,
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    if (data.result) {
                        closestTR.remove();
                    }
                    that.button("reset");
                },
                error: function(a, b, c) {
                    console.log("fail cmnr", a, b, c);
                    that.button("reset");
                }
            });
        });

        $(document).on("click", ".btn-start", function(e){
            e.preventDefault();
            var that = $(this);
            that.button("loading");
            var id = $("#form-img").children(".pokemon-id").val();
            console.log("id", id);
            $.ajax({
                url: '<?php echo base_url(); ?>index.php/admin/start_progress',
                type: 'POST',
                data: "id=" + id,
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    if (data.is_started == "0" && data.start_result) {
                        alert("start ok!");
                    } else if (data.is_started == "1"){
                        var confirmMsg = confirm(data.refOject[0].NAME + ' is inprogress, would you like to stop it and execute this pokemon? ');
                        if (confirmMsg) {
                            $.ajax({
                                url: '<?php echo base_url(); ?>index.php/admin/force_start_progress',
                                type: 'POST',
                                data: "id=" + id,
                                dataType: 'json',
                                success: function(data) {
                                    console.log(data);
                                    if (data.start_result) {
                                        alert("OK");
                                    }
                                },
                                error: function(a, b, c) {
                                    console.log("fail cmnr", a, b, c);
                                    that.button("reset");
                                }
                            });
                        }
                    }
                    that.button("reset");
                },
                error: function(a, b, c) {
                    console.log("fail cmnr", a, b, c);
                    that.button("reset");
                }
            });
        });
    });
</script>