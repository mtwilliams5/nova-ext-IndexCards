<?php if($cards): ?>
<section class="index-cards">
    <?php foreach($cards as $key => $card): ?>
        <article class="card">
            <div class="card-header">
                <?php echo text_output($card['title'], 'h5', 'card-title page-subhead'); ?>
            </div>
            <div class="card-body">
                <div class="card-text">
                    <?php echo text_output($card['content'], '', '', false); ?>
                </div>
            </div>
            <?php if($card['footer']): ?>
            <div class="card-footer">
                <?php echo text_output($card['footer']); ?>
            </div>
            <?php endif; ?>
        </article>
    <?php endforeach; ?>
</section>
<?php else: ?>
  <?php // There are no cards, so do nothing ?>
<?php endif; ?>