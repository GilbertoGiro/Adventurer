$(document).ready(function(){
    let menuHeight = $('.application-header-title').height();
    let dropdown   = $('.dropdown');

    // Menu Height Configuration
    $('.application-body-header').height(menuHeight);

    // Dropdown Events
    dropdown.on('click', function(event){
        event.preventDefault();

        let dropdown   = $(this).find('.dropdown-items');
        let visibility = dropdown.css('visibility');

        if(visibility === 'hidden'){
            dropdown.css('visibility', 'visible');
            return true;
        }

        dropdown.css('visibility', 'hidden');
        return true;
    }).children().on('click', function(event){
        event.stopImmediatePropagation();

        let href = event.target.href;

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
        let e0 = e.originalEvent;
        let delta = e0.wheelDelta || -e0.detail;

        this.scrollTop += ( delta < 0 ? 1 : -1 ) * 30;
        e.preventDefault();
    });

    // Alerts
    let alert = $('.alert');

    alert.on('click', function(){
        $(this).fadeOut();
    });

    // Modal
    $(document).on('click', '.close-modal', function(event){
        event.preventDefault();
        let modal = $(this).closest('.modal');

        modal.fadeOut(450, function(){
            modal.closest('.active-modal').empty();
        });
    });

    $('.active-modal').on('click', function(event){
        let elem = $(event.target);

        if(elem.is('.modal')){
            elem.fadeOut(450, function(){
                elem.closest('.active-modal').empty();
            });
        }
    });
});