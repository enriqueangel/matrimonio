function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#prevew_file').attr('src', e.target.result)
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$("#examine_file").change(function(){
    readURL(this);
    $('#prevew_file').show()
});