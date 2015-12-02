<form id="form-img">
    <input type="hidden" class="pokemon-id" name="pokemon-id" value="<?php echo $pokemon_id; ?>">
    <table class="table">
        <tbody>
            <?php if ($images) {?>
                <?php foreach($images as $image){ ?>
                    <tr data-id="<?php echo $image['ID'];?>">
                        <td>
                            <?php echo $image['ID']; ?>
                        </td>
                        <td>
                            <?php if (OFFLINE) {?>
                                <?php echo $image['URL']; ?>
                            <?php } else { ?>
                                <img src="<?php echo $image['URL']; ?>" alt="<?php echo $image['ID']; ?>">
                            <?php } ?>
                        </td>
                        <td class="text-right">
                            <button class="btn-image-remove btn btn-danger">delete</button>
                        </td>
                    </tr>
                <?php } ?>
            <?php } else { ?>
                <tr>
                    <td colspan="3">
                        This pokemon have no image at all
                    </td>
                </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <td>??</td>
                <td>
                    <input class="form-control" name="url" placeholder="url">
                </td>
                <td class="text-right">
                    <button class="btn btn-success" id="btn-add-img">Add</button>
                </td>
            </tr>
        </tfoot>
    </table>
    <button class="btn btn-success btn-start"><i class="fa fa-play"></i> Start to draw this pokemon</button>
</form>