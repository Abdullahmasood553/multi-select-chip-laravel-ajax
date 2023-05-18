<!DOCTYPE html>
<html>

<head>
    <title>Favorite Cars</title>

    <!-- CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"">
    <link href="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- <style>
        .selected-chip {
            display: inline-block;
            padding: 5px 10px;
            margin-right: 5px;
            margin-bottom: 5px;
            background-color: #007bff;
            color: #fff;
            border-radius: 50px;
        }

    </style> -->
</head>
    <body>
        <div class="container mt-5"></div>
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header">
                            Favorite Cars
                        </div>
                        <div class="card-body">
                            <form id="favorite-colors-form">
                                @csrf
                                <div class="form-group">
                                    <label for="favorite-colors">Select your favorite cars:</label>
                                    <select id="favorite-colors" name="title[]" class="form-control" multiple>
                                        <option value="bmw">BMW</option>
                                        <option value="toyota">Toyota</option>
                                        <option value="ford">Ford</option>
                                        <option value="lexus">Lexus</option>
                                        <option value="tesla">Tesla</option>
                                        <option value="audi">Audi</option>
                                    </select>
                                </div>

                                <!-- <div id="selected-colors"></div> -->

                                <button type="submit" class="btn btn-primary mt-3">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- JS -->
            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
         
    </body>

    <script>
    $(function () {
        // initialize select2
        $('#favorite-colors').select2();

        // // listen for select change event
        // $('#favorite-colors').on('select2:select select2:unselect', function () {
        //     // get selected values
        //     var selectedValues = $(this).val();

        //     // remove existing chips
        //     $('#selected-colors').empty();

        //     // add new chips for selected values
        //     $.each(selectedValues, function (index, value) {
        //         var chip = '<span class="selected-chip">' + value + '</span>';
        //         $('#selected-colors').append(chip);
        //     });
        // });

        // listen for form submit event
        $('#favorite-colors-form').on('submit', function (event) {
            event.preventDefault();

            // serialize form data
            var formData = $(this).serialize();

            // submit form data using Ajax
            $.ajax({
                url: "{{ route('favorite-colors.store') }}",
                type: "POST",
                data: formData,
                success: function (response) {
                    if (response.success) {
                     
                        alert('Data saved successfully.');
                        $('#favorite-colors').val('').trigger('change'); 
                      
                    }
                },
                error: function (xhr) {
                    console.log(xhr.responseText);
                }
            });
        });
});
    </script>
</html>
