<div class="page-heading">
    <div class="page-heading-breadcrumbs"><a href="/"><?php echo $_LIST_HEADER; ?></a></div>
    <a href="/account/settings/giveaways"><i class="fa fa-cog"></i></a>
</div>
<div>
    <?php for ($i = 0; $i != $_LIST_NB && !empty($listChallenge[$i]); $i++) {
            displayChallenge($listChallenge[$i]);
        }
    ?>
</div>
<div class="pagination">
    <div class="pagination-results">Displaying <strong>1</strong> to <strong><?php echo $i; ?></strong> of <strong>1,008</strong> results</div>
    <div class="pagination-navigation">
        <a data-page-number="1" class="is-selected" href="/giveaways"><span>1</span></a>
        <a data-page-number="2" href="/giveaways/search?page=2"><span>2</span></a>
        <a data-page-number="3" href="/giveaways/search?page=3"><span>3</span></a>
        <a data-page-number="4" href="/giveaways/search?page=4"><span>4</span></a>
        <a data-page-number="5" href="/giveaways/search?page=5"><span>5</span></a> ...
        <a data-page-number="2" href="/giveaways/search?page=2"><span>Next</span> <i class="fa fa-angle-right"></i></a>
        <a data-page-number="41" href="/giveaways/search?page=41"><span>Last</span> <i class="fa fa-angle-double-right"></i></a>
    </div>
</div>