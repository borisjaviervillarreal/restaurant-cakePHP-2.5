$(document).ready(function(){
    $('.numeric').on('keyup change', function(event){
        this.value = (this.value + '').replace(/[^0-9]/g, '');
        var cantidad = Math.round($(this).val());
        ajaxupdate($(this).attr("data-id"),$(this).attr("data-id-us"), cantidad);
    });
	function ajaxupdate(id, idus, cantidad) {
        $.ajax({
            type: "POST",
            url: basePath + "pedidos/itemUpdate",
            data: {
                id: id,
                idus: idus,

                cantidad: cantidad
            },
            dataType: "json",
            success: function (data) {
                if($('#subtotal_' + data.mostrar_pedido.id).html() != data.mostrar_pedido.subtotal)
                {
                    $('#subtotal_' + data.mostrar_pedido.id).html(data.mostrar_pedido.subtotal).animate({backgroundColor : "#ff8"}, 300).animate({backgroundColor: "#fff"}, 800);
                }
                
                $('#total').html('€ ' + data.mostrar_pedido.total).animate({backgroundColor : "#ff8"}, 300).animate({backgroundColor: "#fff"}, 800);
            }
        });
    }

     $('.remove').click(function(){
        ajaxremove($(this).attr("id"),$(this).attr("data-id-use"), 0);
        return false;
    });
    
    function ajaxremove(id, iduse, cantidad)
    {

        if(cantidad === 0)
        {
            $('#row-' + id).fadeOut(1000, function(){$('#row-' +id).remove();});
        }

        $.ajax({
            type:"POST",
            url: basePath + "pedidos/remove",
            data: {
                id: id,
                iduse:iduse
            },
            dataType:"json",
            success: function(data){
                $('#msg').html('<div class="alert alert-success flash-msg">Pedido Eliminado.</div>');
                $('.flash-msg').delay(2000).fadeOut('slow');
                
                $('#total').html('€' + data.mostrar_total_remove).animate({backgroundColor: "#ff8"}, 100).animate({backgroundColor: "#fff"}, 500);

                if(data.pedidos == ""){
                    window.location.replace(basePath+"platillos/index");

                }
            },
                
            error: function(){
                alert("Error, no se pudo eliminar");
            }

        });

        
    }

});