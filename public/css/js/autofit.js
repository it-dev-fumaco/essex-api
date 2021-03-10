$(function() {
    while( $('.widget-content div').height() > $('.widget-content').height() ) {
        $('.widget-content').css('font-size', (parseInt($('.widget-content div').css('font-size')) - 1) + "px" );
    }
});