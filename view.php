<?php defined('C5_EXECUTE') or die(_("Access Denied."));
?>

<div class="home-key-numbers-inner" id="kn-display-<?php echo $bID;?>">
<?php
$arrayValues = explode(';', $keyValues);
$arrayDescriptions = explode(';', $keyDescriptions);
$nbKN = count($arrayValues);

for($i=0;$i<$nbKN;$i++){
  if($i%$nbMaxPerRow==0){
    if($i>0){
      echo "</ul>";  
    }
    echo "<ul>";
  }
?>
    <li>
      <div class="home-key-numbers-item">
        <strong class="home-key-numbers-item-number countup" data-value="<?php echo $arrayValues[$i]?>"><?php echo $arrayValues[$i]?></strong>
        <p class="home-key-numbers-item-title"><?php echo $arrayDescriptions[$i]?></p>
        <p class="home-key-numbers-item-subtitle"></p>
      </div>
    </li>

<?php
}
?> 
</ul></div>


<script>
  <?php 
  echo 'jQuery(function($) {';
  echo "var \$countup = \$('#kn-display-".$bID."> .countup');\n";
  echo "\$.when('countup', function() {\n";
  echo 'var processItem = function(elt) {';
  echo 'var $this = $(elt),';
  echo "countUp = new CountUp(elt, parseInt(\$this.attr('data-value')), {\n";
  echo 'duration: 1.5,';
  echo "separator: ' '\n";
  echo '});';
  echo 'if (!countUp.error) {';
  echo 'countUp.start();';
  echo '}';
  echo '};';
  echo "if (!('IntersectionObserver' in window)) {\n";
  echo '$countup.each(function() {';
  echo 'processItem(this);';
  echo '});';
  echo '} else {';
  echo 'var observer = new IntersectionObserver(function(entries) {';
  echo 'entries.forEach(function(entry) {';
  echo 'if (entry.isIntersecting) {';
  echo 'if (observer) {';
  echo 'observer.unobserve(entry.target);';
  echo '}';
  echo 'processItem(entry.target);';
  echo '}';
  echo '});';
  echo '}, {';
  echo "rootMargin: '10px 0px',\n";
  echo 'threshold: 0.01';
  echo '});';
  echo '$countup.each(function() {';
  echo 'observer.observe(this);';
  echo '});';
  echo '}';
  echo '});';
  echo '});';
  ?>
</script>
