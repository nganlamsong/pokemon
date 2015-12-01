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
                <div class="btn-group col-xs-12" role="group" aria-label="..." id="command">
                    <input type="hidden" id="edit" val="0" />
                    <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span></button>
                    <button type="button" class="btn btn-success pull-right" id="btn-edit"><span class="fa fa-edit"></span></button>
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
                        <div class="name">
                            <?php echo $pokemon['name']; ?>
                        </div>
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
        <div class="images-list-container">
            <div class="clearfix" id="image-list">
            </div>
            <div id="image-load">
                Loading
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

        $("#btn-view-toggle").on("click", function(e) {
            if ($("#list-view").hasClass("expand")) {
                $("#list-view").addClass("animating").removeClass("expand");
                $("#main").removeClass("hidden");
                $("#search, #command").removeClass("col-xs-6").addClass("col-xs-12");
            } else {
                $("#list-view").addClass("animating").addClass("expand");
                $("#main").addClass("hidden");
                $("#search, #command").removeClass("col-xs-12").addClass("col-xs-6");
            }
        });

        $("#list-view").on('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(e) {
            $("#list-view").removeClass('animating');
        });

        function createPokemon() {
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

       $("#btn-edit").on("click", function(e){
           var edit = $("#edit").val();
           if (edit == "1") {
                $("#list").removeClass("updating");
                $("#edit").val("0");
           } else {
                $("#edit").val("1");
                $("#list").addClass("updating");
           }
       });

       $(".btn-delete").on("click", function(e) {
           var that = $(this);
           var id = $(this).closest(".list-item-wrapper").data("id");
           var confirmMsg = confirm("delete this pokemon?");
            if (confirmMsg) {
                $.ajax({
                    url: '<?php echo base_url(); ?>index.php/admin/delete_pokemon',
                    type: 'POST',
                    data: 'id=' + id,
                    success: function(data) {
                        console.log(data);
                        that.closest(".list-item-wrapper").slideUp(function(){
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
            var id = $(this).closest(".list-item-wrapper").data("id");
             $.ajax({
                 url: '<?php echo base_url(); ?>index.php/admin/get_pokemon',
                 type: 'POST',
                 data: 'id=' + id,
                 dataType: 'json',
                 success: function(data) {
                     console.log(data);
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
        
        $(".list-item-wrapper").on("click", function(e){
            if (!$("#list-view").hasClass("expand")) {
                $("#image-load").fadeIn();
                var id = $(this).data("id");
                 $.ajax({
                     url: '<?php echo base_url(); ?>index.php/admin/get_images',
                     type: 'POST',
                     data: 'id=' + id,
                     dataType: 'html',
                     success: function(data) {
                         $("#image-list").html(data);
                         $("#image-load").fadeOut();
                     },
                     error: function(a, b, c) {
                         console.log("fail cmnr", a, b, c);
                         $("#image-load").fadeOut();
                     }
                 });
            }
        });
        
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
                    if (data.result) {
                        var trElement = '<tr data-id="' + data.data.POKEMON_ID + '">' +
                            '<td>' + data.data.POKEMON_ID + '</td>' +
                            '<td>' +
                                <?php if (OFFLINE) {?>
                                    data.data.URL +
                                <?php } else { ?>
                                    '<img src="' + data.data.URL + '" alt="' + data.data.POKEMON_ID + '">' + 
                                <?php } ?>
                            '</td>' +
                            '<td><button class="btn-image-remove btn btn-danger">delete</button></td></tr>';
                        $("#form-img > table > tbody").append(trElement);
                        that.button("reset");
                    }
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
    });
</script>