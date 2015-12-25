<?php foreach ($images as $image): ?>
    <div class="grid-item">
        <figure>
            <?php if ($image["image"]["origin"]) { ?>
                <a href="<?php echo $image["image"]["origin"]; ?>"></a>
            <?php } ?>
            <img src="<?php echo $image["image"]['url']; ?>" alt="">
            <figcaption>Caption</figcaption>
            <?php if ($image["pokemon"]) { ?>
                <div class="pokemons">
                    <?php foreach($image["pokemon"] as $pokemon) { ?>
                        <?php if (isset($pokemon['AVARTAR']) && $pokemon['AVARTAR'] != "") { ?>
                            <div class="image" title="<?php echo $pokemon['NAME']; ?>" data-id="<?php echo $pokemon['PID']; ?>">
                                <img src="<?php echo $pokemon['AVARTAR']; ?>" alt="">
                            </div>
                        <?php } else { ?>
                            <div class="image" title="<?php echo $pokemon['NAME']; ?>" data-id="<?php echo $pokemon['PID']; ?>">
                                <img src="<?php echo base_url(); ?>resource/img/avartar/unknow.png">
                            </div>
                        <?php }?>
                    <?php } ?>
                </div>
            <?php } ?>
        </figure>
    </div>
<?php endforeach; ?>