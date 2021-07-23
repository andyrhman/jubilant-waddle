<?php if(count($errors) > 0): ?>
    <div class="msg error">
    <?php foreach ($errors as $error): ?>
    <li><i class="fas fa-exclamation-circle fa-fw"></i><?php echo $error; ?></li>
    <?php endforeach; ?>
    </div>
<?php endif; ?> 