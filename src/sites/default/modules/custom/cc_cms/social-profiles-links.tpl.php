<ul class="nav navbar-nav navbar-right">
<?php foreach ($profiles as $k_val => $p_val) { ?>
  <li>
    <a href="<?php echo $p_val['profile_url'] ?>" title="<?php echo $p_val['title'] ?>" target="_blank">      
      <i class="fa fa-<?php echo $k_val; ?> fa-lg"></i>
    </a>
  </li>
<?php } ?>
</ul>