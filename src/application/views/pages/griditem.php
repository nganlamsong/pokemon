<?php foreach ($images as $image): ?>
    <div class="grid-item">
        <figure>
            <img src="<?php echo $image['URL']; ?>" alt="">
            <figcaption>Caption</figcaption>
        </figure>
    </div>
<?php endforeach; ?>
