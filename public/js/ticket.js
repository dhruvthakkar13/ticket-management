var Ticket = function () {
    var initTicketValidation = function () {
        // alert("Hii");
        $("#ticketform").validate({
            rules: {
                title: {
                    required: true,
                    checkForWhiteSpace: true,
                },
                description :{
                    required: true,
                },
                                                                      
            },
            messages: {
                title: {
                    required: "Title is required.",
                },
                description :{
                    required: "Description is Required.",
                },
                                                            
            }
        });

        

    };
    return {
        init: function () {
            initTicketValidation();
        }
    };
}();
jQuery(document).ready(function () {
    Ticket.init();
});