$(".delete").on("submit", function(){
    return confirm("Are you sure you want to delete the product?");
});

$('#log_out').on('click', function(){
    event.preventDefault();
    if (confirm('Are you sure you want to log out?')) {
        document.getElementById('logout-form').submit();
    };
});