$(document).ready(function () {
    $('a[href^="#"]').click(function (e) {
        e.preventDefault();
        var target = $(this).attr('href');
        
        // Remove active class from all tabs
        $('a[href^="#"]').removeClass('bg-white text-gray-800').addClass('bg-red-600 text-white');

        // Hide all tab content
        $('#tab-content > div').addClass('hidden');

        // Add active class to clicked tab and show corresponding content
        $(this).removeClass('bg-red-600 text-white').addClass('bg-white text-gray-800');
        $(target).removeClass('hidden');
    });

    // Set default active tab
    $('#starters-tab').click();
});