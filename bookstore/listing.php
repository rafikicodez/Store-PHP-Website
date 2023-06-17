<!DOCTYPE html>
<html>
<head>
    <title>Books Listing</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: 'books.json', // instead of products my JSON is named - books 
                dataType: 'json',
                success: function(data) {
                    // Loop through each book and display the details
                    data.forEach(function(product) {
                        var html = '<div>';
                        html += '<h3>' + product.name + '</h3>';
                        html += '<p>' + product.description + '</p>';
                        html += '</div>';
                        $('#book-list').append(html);
                    });
                }
            });
        });
    </script>
</head>
<body>
    <h2>Product Listing</h2>
    <div id="books-list"></div>
</body>
</html>