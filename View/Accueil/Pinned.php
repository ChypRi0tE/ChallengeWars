<div class="page-heading">
    <div class="page-heading-breadcrumbs"><a href="/"><?php echo $_PINNED_HEADER; ?></a></div>
</div>
<br />
<div class="pinned-challenges">
    <?php for ($i = 0; $i != $_PINNED_NB && !empty($listFeaturedChallenge[$i]); $i++) {
        displayChallenge($listFeaturedChallenge[$i]);
        }
    ?>
</div>