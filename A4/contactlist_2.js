
function updateContact(id)
{
    var nameToUpdate = document.getElementById("name" + id).value;
    var phoneToUpdate = document.getElementById("phone" + id).value;

    var formData = {
        'updateId': id,
        'updateName': nameToUpdate,
        'updatePhone': phoneToUpdate
    };
    // process the form
    $.ajax({
        type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
        url: 'contactlist_2_update.php', // the url where we want to POST
        data: formData, // our data object
        dataType: 'json', // what type of data do we expect back from the server
        encode: true
    })
            // using the done promise callback
            .done(function (data) {

                // log data to the console so we can see
                getList();

                // here we will handle errors and validation messages
            });
    // stop the form from submitting the normal way and refreshing the page
    event.preventDefault();
}
;

function deleteContact(id)
{
    var formData = {
        'deleteId': id
    };
    // process the form
    $.ajax({
        type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
        url: 'contactlist_2_delete.php', // the url where we want to POST
        data: formData, // our data object
        dataType: 'json', // what type of data do we expect back from the server
        encode: true
    })
            // using the done promise callback
            .done(function (data) {

                getList();

                // here we will handle errors and validation messages
            });
    // stop the form from submitting the normal way and refreshing the page
    event.preventDefault();

    $(function () {
        $('<div class="alert alert-success">Successful delete</div>')
                .insertAfter('#warningSpan').delay(5000).fadeOut(function () {
            $(this).remove();
        });
    });
}
;

$(document).ready(function () {
    // process the form
    $('#addForm').submit(function (event) {
        // get the form data
        // there are many ways to get this data using jQuery (you can use the class or id also)
        var formData = {
            'addName': $('input[name=addName]').val(),
            'addPhone': $('input[name=addPhone]').val(),
        };
        // process the form
        $.ajax({
            type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url: 'contactlist_2_add.php', // the url where we want to POST
            data: formData, // our data object
            dataType: 'json', // what type of data do we expect back from the server
            encode: true
        })
                // using the done promise callback
                .done(function (data) {

                    // Refresh the grid
                    getList();

                    var errorlist = "";
                    if (data.errors != null)
                    {
                        $(function () {
                            $('<div class="alert alert-danger">' + Object.values(data.errors).join(' , ') + '</div>')
                                    .insertAfter('#warningSpan')
                                    .delay(5000)
                                    .fadeOut(function () {
                                        $(this).remove();
                                    });
                        });
                    } else
                    {
                        $(function () {
                            $('<div class="alert alert-success">Successful add</div>')
                                    .insertAfter('#warningSpan').delay(5000).fadeOut(function () {
                                $(this).remove();
                            });
                        });

                        document.getElementById("addName").value = "";
                        document.getElementById("addPhone").value = "";
                    }



                    // here we will handle errors and validation messages
                });

        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });
});

function getList()
{
    $.post("contactlist_2_list.php", function (result) {
        $("#listResults").html(result);
    });
};

function getListSorted(){
    var param_to_send = $('[name="sorting"]:checked').val();
    $.post("contactlist_2_listSorted.php", {sort : param_to_send}, function (result) {
        $("#listResults").html(result);
    });
};

$(document).ready(function () {
    $('#addPhone').mask('(000) 000-0000');
    $('.phonemask').mask('(000) 000-0000');
});

window.setTimeout(function () {
    $(".alert").fadeTo(500, 0).slideUp(500, function () {
        $(this).remove();
    });
}, 4000);