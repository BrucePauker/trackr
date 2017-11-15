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

$('.artwork-artist-container').scroll($.debounce( 250, true, function(){
    $(this).addClass('overflow-scrollbar');
    $(this).removeClass('overflow-scrollbar-hidden');
} ) );
$('.artwork-artist-container').scroll($.debounce( 1000, function(){
    $(this).removeClass('overflow-scrollbar');
    $(this).addClass('overflow-scrollbar-hidden');
} ) );