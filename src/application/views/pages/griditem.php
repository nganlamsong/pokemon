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
