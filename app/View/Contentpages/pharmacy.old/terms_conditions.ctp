<?php
// Header markup
echo $this->element('pharmacy/header');

echo '<main class="container forms terms">';
// CMS Content
echo $content['Contentpage']['body'];
?>

<?php
echo '</main>';

// Footer markup
echo $this->element('pharmacy/footer');

?>