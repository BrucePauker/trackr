function showAddArtWorkModal() {
    $('#addArtWorkModal').modal({
        show : true,
    })
}

var $gridArtwork = $('.grid-artwork').masonry({
    // set itemSelector so .grid-sizer is not used in layout
    itemSelector: '.grid-item',
    // use element for option
    columnWidth: '.grid-sizer',
    gutter: '.gutter-sizer',
    percentPosition: true
});

$gridArtwork.imagesLoaded().progress( function() {
    $gridArtwork.masonry('layout');
});