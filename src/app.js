jQuery(document).ready(function(jQuery){

    var autoplayTimeout = 4000;

    //Initialize OwlCarousel
    var owl = jQuery('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        dots: true,
        items: 1,
        autoplay: true,
        autoplayTimeout: autoplayTimeout,
        autoplayHoverPause: true,
        onInitialized: startProgressBar, 
        onTranslate: resetProgressBar, 
        onTranslated: startProgressBar
    });

    //Function to start the progress bar animation
    function startProgressBar() {
        jQuery('.progress-bar-inner').css({
            width: '0%',
            transition: 'none'
        });

        setTimeout(function() {
            jQuery('.progress-bar-inner').css({
                width: '100%',
                transition: 'width ' + autoplayTimeout + 'ms linear'
            });
        }, 5);
    }

    //Function to reset the progress bar (on slide change)
    function resetProgressBar() {
        jQuery('.progress-bar-inner').css({
            width: '0%',
            transition: 'none'
        });
    }

});

jQuery(document).ready(function(jQuery){

var items = jQuery('.processCard_wrapper'); // Get all the cards
var currentIndex = 0; // Start from the first card
var switchInterval = 4000; // 4 seconds interval
var totalItems = items.length; // Total number of cards

// Function to switch the active card
function switchActiveCard() {
    // Remove 'active' class from all cards
    items.removeClass('active');

    // Add 'active' class to the current card
    jQuery(items[currentIndex]).addClass('active');

    // Start the progress bar animation
    startProgressBar();

    // Move to the next card (loop back to the first card if necessary)
    currentIndex = (currentIndex + 1) % totalItems;
}

// Function to start the progress bar animation
function startProgressBar() {
    // Reset the progress bar
    jQuery('.progress-bar-inner-top').css({
        width: '0%',
        transition: 'none'
    });

    // Animate the progress bar to fill in 4 seconds
    setTimeout(function() {
        jQuery('.progress-bar-inner-top').css({
            width: '100%',
            transition: 'width ' + switchInterval + 'ms linear'
        });
    }, 50); // Small delay to ensure reset is applied
}

// Start the card switching and progress bar on load
switchActiveCard();

// Set interval to switch the active card every 4 seconds
setInterval(switchActiveCard, switchInterval);

});