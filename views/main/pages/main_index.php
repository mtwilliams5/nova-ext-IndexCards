<?php if($cards): ?>
<div class="row">
    <div class="card-deck w-100 mx-auto">
        <div class="col-12 col-md mb-3 px-3 px-sm-0 px-xl-3">
        <?php foreach($cards as $key => $card): ?>
            <div class="card h-100 bg-transparent border-light px-0">
                <div class="card-header bg-dark text-center">
                    <?php echo text_output($card['title'], 'h5', 'card-title page-subhead'); ?>
                </div>
                <div class="card-body pb-0">
                    <div class="card-text text-justified">
                        <?php echo text_output($card['content'], '', '', false); ?>
                    </div>
                </div>
                <?php if($card['footer']): ?>
                  <div class="card-footer bg-transparent border-0">
                      <?php echo text_output($card['footer']); ?>
                  </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
</div>
<?php else: ?>
  <?php // There are no cards, so do nothing ?>
<?php endif; ?>