$(document).ready(function(){
    var menuHeight = $('.application-header-title').height();
    var dropdown   = $('.dropdown');

    // Menu Height Configuration
    $('.application-body-header').height(menuHeight);

    // Dropdown Events
    dropdown.on('click', function(event){
        event.preventDefault();

        var dropdown   = $(this).find('.dropdown-items');
        var visibility = dropdown.css('visibility');

        if(visibility === 'hidden'){
            dropdown.css('visibility', 'visible');
            return true;
        }


        dropdown.css('visibility', 'hidden');
        return true;
    }).children().on('click', function(event){
        event.stopImmediatePropagation();

        var href = event.target.href;

        if(href){
            window.location.href = href;
        }
    });

    $('body').on('click', function(event){
        if(!dropdown.is(event.target) && dropdown.has(event.target).length === 0){
            $('.dropdown-items').css('visibility', 'hidden');
        }
    });

    // Without Scroll Event
    $(document).on('mousewheel DOMMouseScroll', '.without-scroll', function (e) {
        var e0 = e.originalEvent;
        var delta = e0.wheelDelta || -e0.detail;

        this.scrollTop += ( delta < 0 ? 1 : -1 ) * 30;
        e.preventDefault();
    });
});