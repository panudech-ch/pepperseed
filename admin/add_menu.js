//#1 create by panudech.cha 16/04/2021
$.fn.serializeObject = function() {
    var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
        if (o[this.name]) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};
$(function() {

    $('#fm-menu-add').submit(function(e) {
        var objForm = $('#fm-menu-add').serializeObject();


        if (objForm.p_name == '') {
            $('#modal-alert').find('.modal-body').html("Please Input Menu Name.");
            $('#modal-alert').modal('show');
            return false;
        } else if (objForm.cat_id_sel == '') {
            $('#modal-alert').find('.modal-body').html("Please select Category Name.");
            $('#modal-alert').modal('show');
            return false;
        } else if (objForm.p_price == '') {
            $('#modal-alert').find('.modal-body').html("Please input price.");
            $('#modal-alert').modal('show');
            return false;
        } else {



            e.preventDefault();
            $('#divLoading').css('display', 'block');
            $.ajax({
                type: 'POST',
                url: "add_menu-sys.php",
                data: new FormData(this),
                contentType: false,
                processData: false,
                cache: false,
                success: function(msg) {
                    $('#divLoading').css('display', 'none');
                    if (msg.trim() == "ERROR") {
                        alert("Can not save data.");
                    } else {
                        clearChoice();
                        clearFile();
                        document.getElementById('fm-menu-add').reset();
                        intMdAddData();
                        loadInfo();
                        // $('#showData').html(msg);
                    }
                },
                error: function(ex) {

                    alert("ไม่สำเร็จ");
                    console.log(ex);
                }
            });
            return true;

        }
    });

    document.getElementById("up-pic_2").onchange = function() {

        document.getElementById("pic-name_2").value = this.files[0].name;
        var preview = document.querySelector('img[id=preview_2]');
        var file = this.files[0];
        var reader = new FileReader();

        reader.addEventListener("load", function() {
            preview.src = reader.result;
        }, false);

        if (file) {
            reader.readAsDataURL(file);
            $('#preview_2').css('display', '');
            $('#p_picture2').show();
        }
    };

});

function clearData() {
    clearChoice();
    clearFile();
}

function clearChoice() {

    $("#show-choice").html("");
    $('#choice-select').hide();

}

function clearFile() {

    $('#p_picture2').hide();
    document.getElementById('preview_2').removeAttribute('src');


}

function loadInfo() {
    $('#divLoading').css('display', 'block');
    $.ajax({
        type: 'POST',
        url: "search_menu-sys.php",
        data: $('#form-search-menu').serialize(),
        cache: false,
        success: function(msg) {
            $('#divLoading').css('display', 'none');
            if (msg.trim() == "ERROR") {
                alert("Can not search data.");
            } else {
                document.getElementById('form-search-menu').reset();

                $('#showData').html(msg);
            }
        }
    });
}

function clrCatFm() {
    $('#fm-menu-add')[0].reset();
    clearData();
}

function intMdAddData() {
    clrCatFm();

    $('#modal-menu-add').modal('toggle');
    return false;
}