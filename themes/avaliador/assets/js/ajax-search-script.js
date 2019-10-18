$ = jQuery;

var mafs = $("#my-ajax-filter-search");
var mafsForm = mafs.find("form");

mafsForm.submit(function (e) {
    e.preventDefault();

    console.log("form submitted");

    // we will add codes above this line later
    if (mafsForm.find("#search").val().length !== 0) {
        var search = mafsForm.find("#search").val();
    }
    if (mafsForm.find("#cargos").val().length !== 0) {
        var rating = mafsForm.find("#cargos").val();
    }

    var data = {
        action: "my_ajax_filter_search",
        search: search,
        year: year,
        rating: rating,
        language: language,
        genre: genre
    }
});