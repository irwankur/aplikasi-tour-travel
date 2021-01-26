 

	 $(document).ready(function(){


        $('.fav').on('click', function(e){
            let banyak = $('.fav:checked').length;
            let id = $(this).val();
            if($(this).is(':checked')){
                if(banyak > 3){
                    alert('Data tidak boleh lebih dari 3');
                    e.preventDefault();
                } else { 
                    $.ajax({
                        type: 'POST',
                        url: BASE_URL + 'data_perjalanan/update_favorit',
                        data: {id_perjalanan : id, status: 1},
                        success: function(data){
                            return true;
                        }
                    });
                }
            } else {
                $.ajax({
                    type: 'POST',
                    url: BASE_URL + 'data_perjalanan/update_favorit',
                    data: {id_perjalanan : id, status: 0},
                    success: function(data){
                        return true; 
                    }
                });
            }
            
            
        });
 

        $('.cek-input').on('click', function(){
            if($('.cek-input:checked').length == 1){
                $('.tgl_brn').attr('disabled', 'true');
                $('.stp_hr').removeAttr('disabled');
            } else {
                $('.stp_hr').attr('disabled', 'true');
                $('.tgl_brn').removeAttr('disabled');
            }
        });

        $('.cek-diskon').on('click', function(){
            if($('.cek-diskon:checked').length == 1){
                $('.hrg_diskon').removeAttr('disabled');
            } else {
                $('.hrg_diskon').attr('disabled', 'true');
            }
        });

        // alert pemberitahuan
        $.ajax({
            type: 'POST',
            url: BASE_URL + 'notifikasi/alert_number',
            data: '',
            dataType: 'json',
            success: function(data){
                let jumlah = 0;
                let html = '';
                $.each(data, function(i, data){
                    if(data.status == 1){
                        jumlah++;
                    }
                    $('#dropdown').prepend('<a class="dropdown-item" href="'+BASE_URL+data.nama+'" id="dropdown">'+data.isi+'</a>')
                });
                // console.log(jumlah);

                if(jumlah > 0 && jumlah < 4){
                    $('.badge').css('visibility', 'visible');
                    $('.badge').css('opacity', '1'); 
                    $('.badge').html(jumlah);
                } else if(jumlah > 3){
                    $('.badge').css('visibility', 'visible');
                    $('.badge').css('opacity', '1'); 
                    $('.badge').html(--jumlah+'+')
                } else {
                    $('.badge').css('visibility', 'hidden');
                    $('.badge').css('opacity', '0');
                }

                

            }
        });

        //hapus notifikasi ketika menu di klik
        $('#alertsDropdown').on('click', function(){
            $.ajax({
                type: 'POST',
                url: BASE_URL + 'notifikasi/hapus_alert',
                data: '',
                success: function(data){
                    $('.badge').html(data);
                }
            });    
        }); 

       	$("#menu-toggle").click(function(e) {
	        e.preventDefault();
	        $("#wrapper").toggleClass("toggled");
	    });

        //status pembayaran
	    $('.bayar').on('change', function(){
	    	let test = $(this).find(':selected').text()
	    	let id = $(this).attr('data-id');
            let email = $(this).attr('email');
	    	$.ajax({
	    		type: 'POST',
	    		url: 'order/update_status/',
	    		data: {status: test, id_order: id, email: email},
	    		success: function(data){
	    			return true;
	    		}
	    	});
	    	$(this).prop('selected', true);
	    });

         $('.tampil').on('change', function(){
            let test = $(this).find(':selected').text()
            let id = $(this).attr('data-id');
            $.ajax({
                type: 'POST',
                url: 'rekening/update_status/',
                data: {status: test, id_rekening: id},
                success: function(data){
                    return true;
                }
            });
            $(this).prop('selected', true);
        });


         $('.testimoni').on('change', function(){
            let test = $(this).find(':selected').text()
            let id = $(this).attr('data-id');
            $.ajax({
                type: 'POST',
                url: 'testimoni/update_status/',
                data: {status: test, id_testimoni: id},
                success: function(data){
                    return true;
                }
            });
            $(this).prop('selected', true);
        });

	       
        $('#centang').click(function(){
            if($(this).prop('checked') == true ){
                $('#paket').prop('disabled', true);  
            } else if($(this).prop('checked') == false ){
                $('#paket').attr('disabled', false);
            }
        });

        $('#select_all').on('click', function() {
            let hitung = $('.check').length;
            if(this.checked) {
                $('.hapus-alert').css('visibility', 'visible');
                $('.hapus-alert').css('opacity', '1');
                $('.hitung').text(hitung);
                $('.check').each(function() {
                    this.checked = true;
                });
            } else {
                $('.hapus-alert').css('visibility', 'hidden');
                $('.hapus-alert').css('opacity', '0');
                $('.check').each(function() {
                    this.checked = false;
                });
            }
        });

        $('.check').on('click', function(){ 
            if($('.check:checked').length > 0){
                let hitung = $('.check:checked').length;
                $('.hapus-alert').css('visibility', 'visible');
                $('.hapus-alert').css('opacity', '1');
                $('.hitung').text(hitung);
            } else {
                $('.hapus-alert').css('visibility', 'hidden');
                $('.hapus-alert').css('opacity', '0');
            }
            if($('.check:checked').length == $('.check').length){
                $('#select_all').prop('checked', true);
            } else {
                $('#select_all').prop('checked', false);
            }
        });

        //hapus order
        $('#hapus_order').on('click', function(){
            let id_order = [];
            $.each($("input[name='checked']:checked"), function(){
                id_order. push($(this). val());
            });

            $.ajax({
                type: 'POST',
                url: BASE_URL + 'order/hapus/',
                data: {id_order : id_order },
                success: function(data){
                   location.reload();
                }
            });
        });

        //hapus notifikasi
        $('#hapus_notif').on('click', function(){
            let id_notif = [];
            $.each($("input[name='checked']:checked"), function(){
                id_notif. push($(this). val());
            });

            $.ajax({
                type: 'POST',
                url: BASE_URL + 'notifikasi/hapus_notif/',
                data: {id_notif : id_notif },
                success: function(data){
                   location.reload();
                }
            });
        });

        //hapus member
        $('#hapus_member').on('click', function(){
            let id_member = [];
            $.each($("input[name='checked']:checked"), function(){
                id_member. push($(this). val());
            });
            $.ajax({
                type: 'POST',
                url: BASE_URL + 'data_member/hapus',
                data: {id_member : id_member },
                success: function(data){
                   location.reload();
                }
            });
        });

        //hapus komentar
        $('#hapus_testimoni').on('click', function(){
            let id_testimoni = [];
            $.each($("input[name='checked']:checked"), function(){
                id_testimoni. push($(this). val());
            });
            $.ajax({
                type: 'POST',
                url: BASE_URL + 'testimoni/hapus',
                data: {id_testimoni : id_testimoni },
                success: function(data){
                   location.reload();
                }
            });
        });

        //tambah data order
        $('#id_tujuan').on('change', function(){
            let id = $(this).val();
            let element = $(this).find('option:selected');
            let tujuan2 = element.attr('tujuan'); 
            let tujuan =  $('#tujuan').val(tujuan2);
            let harga = element.attr('harga');
            let jml_tiket = $('#jumlah_tiket').val();
            let total = jml_tiket*harga;
            $('#harga').val(harga);
            $.ajax({
                type: 'POST',
                url: 'cari_tanggal',
                dataType: 'json',
                data: {id_perjalanan: id},
                success: function(data){
                console.log(data);
                    var html = '';
                    if(Array.isArray(data) == true ){
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<option value="'+data[i]+'">'+data[i]+'</option>';
                        }   
                    } else {
                        html = '<option value="'+data+'">'+data+'</option>';
                    }
                    $('#tanggal_keberangkatan').html(html);
                    
                }
            });
        }); 

        //jumlah tiket
        $('#jumlah_tiket').on('change', function(){
            let jml_tiket = $('#jumlah_tiket').val();
            let element = $('#id_tujuan').find('option:selected');
            let harga = element.attr('harga');
            let total = jml_tiket * harga;
            $('#harga').val(total);
        });

          $(document).ready(function(){
            $('#data_tabel').DataTable();
           
            $('#centang').click(function(){
                if($(this).prop('checked') == true ){
                    $('#paket').prop('disabled', true);  
                } else if($(this).prop('checked') == false ){
                    $('#paket').attr('disabled', false);
                }
            });
        });

    });

    // script chat
    /*$(document).ready(function(e) {
    var t = "socket.io",
        n = "8080",
        r = "localhost",
        i = "localhost/";
    var s = ("https:" == document.location.protocol ? "https://" : "http://") + i;
$.when(
    $.getScript( "/mypath/myscript1.js" ),
    $.getScript( "/mypath/myscript2.js" ),
    $.getScript( "/mypath/myscript3.js" ),
    $.Deferred(function( deferred ){
        $( deferred.resolve );
    })
).done(function(){

    //place your code here, the scripts are all loaded

});
    $.getScript("https://" + r + ":" + n + "/" + t + "/" + t + ".js", function() {
       
        $(".chat_message").animate({
            scrollTop: $(".chat_message").outerHeight() + 1e7
        }, 1e3);
        var e = $(".id").val();
        var t = $(".my_user").val();
        var i = io.connect("https://" + r + ":" + n);
        var s = "id=" + e;
        $.ajax({
            type: "POST",
            url: name + "chat/login_check.php",
            data: s,
            success: function(e) {
                if (e != "") {
                    i.emit("new_chat_js_user_enter", e)
                }
            }
        });
        $.validate({
            form: "#chat_form",
            onSuccess: function() {
                var e = $("#chat_form").serialize();
                $.ajax({
                    type: "POST",
                    url: name + "chat/login_user.php",
                    data: e,
                    success: function(e) {
                        var t = e.split("-");
                        $(".my_user").val(t[1]);
                        $(".logout").attr("name", e);
                        $(".chat_form")[0].reset();
                        $(".logout").show();
                        $(".chat_message").show();
                        $(".chat_text_area").show();
                        $(".chat_entry").hide();
                        i.emit("new_chat_js_user_enter", e)
                    }
                })
            }
        });
        i.on("admin_chat_status_update", function(t) {
            var n = t.user_id;
            var r = t.status;
            if (n == e) {
                if (r == "1") {
                    $(".no_provider").text("Operator Joined the Chat.")
                } else {
                    $(".no_provider").text("Sorry, no operators are currently available")
                }
            }
        });
        i.on("admin_message_emit_update", function(e) {
            var t = e.from_id;
            var n = e.to_id;
            var r = "from_id=" + t + "&to_id=" + n;
            $.ajax({
                type: "POST",
                url: name + "chat/get_last_message.php",
                data: r,
                success: function(e) {
                    $(".chat_message").append(e);
                    $(".chat_message div:last-child").hide().fadeIn("slow");
                    $(".chat_message").animate({
                        scrollTop: $(".chat_message").outerHeight() + 1e8
                    }, 1e3)
                }
            })
        });
        $(".messag_send").keypress(function(e) {
            if (e.which == 13) {
                var t = $(".id").val();
                var n = $(".my_user").val();
                var r = $(this).val();
                var s = $(this).val().replace(/(^[\s]+|[\s]+$)/g, "");
                var o = "message=" + r + "&id=" + t;
                if (s != "") {
                    $(".messag_send").val("");
                    $.ajax({
                        type: "POST",
                        url: name + "chat/message_send.php",
                        data: o,
                        success: function(e) {
                            i.emit("user_message_emit", {
                                from_id: n,
                                to_id: t
                            });
                            $(".chat_message").append(e);
                            $(".chat_message div:last-child").hide().fadeIn("slow");
                            $(".chat_message").animate({
                                scrollTop: $(".chat_message").outerHeight() + 1e8
                            }, 1e3)
                        }
                    })
                }
                return false
            }
        });
        $(".logout").click(function(e) {
            var t = $(this).attr("name");
            i.emit("user_left_chat", t);
            $.ajax({
                type: "POST",
                url: name + "chat/user_logout.php",
                success: function(e) {
                    $(".chat_message").text("");
                    $(".logout").hide();
                    $(".chat_message").hide();
                    $(".chat_text_area").hide();
                    $(".chat_entry").show();
                    $(".my_user").val("");
                    $(".logout").attr("name", "")
                }
            });
            return false
        })
    })
});
*/
$(function(){
   $(".c_h").click(function(e) {
            if ($(".chat_container").is(":visible")) {
                $(".c_h .right_c .mini").text("+")
            } else {
                $(".c_h .right_c .mini").text("-")
            }
            $(".chat_container").slideToggle("slow");
            return false
        });
});
