$(document).ready(function () {

    var followerSelect = $('#follower_select');

    followerSelect.select2({
        ajax: {
            url: '/site/followers',
            type: 'post',
            dataType: 'json',
            delay : 250,
            processResults : function(data){
                var arr = [];
                $.each(data, function (index, value) {
                    arr.push({
                        id: value.id,
                        text: value.name
                    })
                });
                return {
                    results: arr
                };
            },
            cache : true
        }
    });

    followerSelect.change(function() {
        console.log($(this).val());
        $.ajax({
            type: "POST",
            url: "/site/journals",
            data: {userId: $(this).val()},
            success: function(response) {
                if(response) {
                    var journalSelect = '';
                    var result = JSON.parse(response);
                    $.each(result, function( index, value ) {
                        journalSelect += "<option value='"+value.id+"' >"+value.title+"</option>";
                    });

                    $('#journal_select').html(journalSelect).attr('disabled', false);
                }
            }

        });
    });

    $("#search_ticket").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#group_tickets tbody tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

});