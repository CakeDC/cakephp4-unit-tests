var TournamentsIndex = {
    init: function () {

        $("table.tournaments").on("click", "input.join-tournament", function (e) {

            e.preventDefault();
            var url = $(e.target).data('url');
            var formData = $(e.target).closest('form').serialize();
            $.post(url, formData).done(function (data) {
                $(e.target).closest('.tournament-row').replaceWith(data);
            });
        });
    }
}.init();