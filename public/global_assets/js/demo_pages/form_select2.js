/* ------------------------------------------------------------------------------
 *
 *  # Select2 selects
 *
 *  Specific JS code additions for form_select2.html page
 *
 * ---------------------------------------------------------------------------- */


// Setup module
// ------------------------------

var Select2Selects = function() {


    //
    // Setup module components
    //

    // Select2 examples
    var _componentSelect2 = function() {
        if (!$().select2) {
            console.warn('Warning - select2.min.js is not loaded.');
            return;
        }


        //
        // Basic examples
        //

        // Default initialization
        $('.select').select2({
            minimumResultsForSearch: Infinity
        });

        // Select with search
        $('.select-search').select2();

        // Fixed width. Single select
        $('.select-fixed-single').select2({
            minimumResultsForSearch: Infinity,
            width: 250
        });

        // Fixed width. Multiple selects
        $('.select-fixed-multiple').select2({
            minimumResultsForSearch: Infinity,
            width: 400
        });

    };


    //
    // Return objects assigned to module
    //

    return {
        init: function() {
            _componentSelect2();
        }
    }
}();


// Initialize module
// ------------------------------

document.addEventListener('DOMContentLoaded', function() {
    Select2Selects.init();
});
