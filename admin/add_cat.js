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
    $('#fm-cat-add').submit(function(e) {
        var dataJson = $('#fm-cat-add').serializeObject();
        if (dataJson.cat_name != '') {
            e.preventDefault();
            $('#divLoading').css('display', 'block');
            $.ajax({
                type: 'POST',
                url: "add_cat-sys_2.php",
                data: new FormData(this),
                contentType: false,
                processData: false,
                cache: false,
                success: function(msg) {
                    $('#divLoading').css('display', 'none');
                    if (msg.trim() == "ERROR") {
                        alert("Can not save data.");
                    } else {

                        document.getElementById('fm-cat-add').reset();
                        intMdAddData();
                        loadInfo();
                        //$('#showData').html(msg);
                    }
                },
                error: function(ex) {
                    alert("ไม่สำเร็จ");
                    console.log(ex);
                }
            });
            return true;
        } else {
            $('#modal-alert').find('.modal-body').html("Please Input Category Name.");
            $('#modal-alert').modal('show');
            return false;
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
        }
    };

});

function loadInfo() {
    $('#divLoading').css('display', 'block');
    $.ajax({
        type: 'POST',
        url: "search_cat-sys.php",
        data: $('#form-cat').serialize(),
        cache: false,
        success: function(msg) {
            $('#divLoading').css('display', 'none');
            if (msg.trim() == "ERROR") {
                alert("Can not search data.");
            } else {

                document.getElementById('form-cat').reset();
                $('#showData').html(msg);
            }
        },
        error: function(msg) {
            alert("Seaching fail");
        }

    });

}

function clrCatFm() {
    $('#fm-cat-add')[0].reset();
}

function intMdAddData() {
    clrCatFm();
    $('#modal-cat-add').modal('toggle');
    return false;
}