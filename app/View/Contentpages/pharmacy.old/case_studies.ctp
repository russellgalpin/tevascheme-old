<?php
// Form specific scripts
echo $this->Html->css('teva_one_ps.css');
echo $this->Html->script('teva_one_ps.js');
?>

<div class="main-content span12 center relative">
<?php
// Header markup
echo $this->element('pharmacy/header');

// CMS Content
echo $content['Contentpage']['body'];

// Footer markup

echo $this->element('pharmacy/footer');

if(($content['Contentpage']['footer']!= null)&&($content['Contentpage']['footer']!= "")){
	echo $content['Contentpage']['footer'];
}else{ //backup in case of empty footer
	echo '<p class="smaller-text">Registered in England No. 302461. Registered office: Ridings Point, Whistler Drive, Castleford, WF10 5HX United Kingdom. UK/SCH/12/0024(1)</p>
    <p class="smaller-text">Date of Preparation: March 2013</p>';
}
?>
</div>
</div>
