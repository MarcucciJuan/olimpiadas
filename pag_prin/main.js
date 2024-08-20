producto();
function producto() {

    fetch("json_bd.php")
        .then(respuesta => respuesta.json())
        .then(data => {
            console.log(data);
            const publicacion = document.getElementById("publicaciones");
            const pedido_cont = document.getElementById("carrito");
            const productoDetalle = document.getElementById('producto-detalle');


            if (publicacion) {
                productoDetalle.innerHTML = " ";
                // Usar la longitud real de data.productos en lugar de un número fijo
                for (let id = 0; id <= data.productos.length; id++) {
                    const producto = data.productos[id];


                    publicacion.innerHTML +=
                        `
                                    <div class="col-lg-4 col-md-6" onclick="mostrar_producto(`+ id + `)">
                                        <div class="card h-100 text-center">
                                            <img src="../img/`+ producto.imagen + `" class="card-img-top">
                                            <div class="card-body">
                                                <h5 class="card-title">`+ producto.nombre_producto + `</h5>
                                                <p class="card-text">Precio: $`+ producto.precio + `</p>
                                                <p class="card-text">Stock: `+ producto.stock + `</p>
                                            </div>
                                        </div>
                                    </div>
                                    `;
                }
            }
            if (pedido_cont) {
                for (let i = 0; i < data.pedidos.length; i++) {
                    const pedidos = data.pedidos[i];
                    const id_cliente = document.getElementById("id_cliente").value;
                
                    if (id_cliente == pedidos.id_cliente) {
                        for (let j = 0; j < data.pedido_tiene_producto.length; j++) {
                            const pedidoRelacion = data.pedido_tiene_producto[j];
                            if (pedidoRelacion.id_pedido === pedidos.id_pedido) { // Asegúrate de relacionar el pedido correctamente
                                const id_producto = pedidoRelacion.id_producto;
                                const producto = data.productos[id_producto];
                            pedido_cont.innerHTML +=
                                `  
                            <div class="">
                                <div class="col-4">
                                    <form method="post" class="card h-100 text-center">
                                        <input name="id" value="`+ pedidos.id_pedido +`" style="visibility: hidden; position: absolute;">
                                        <img src="../img/`+ producto.imagen + `" class="card-img-top" alt="Zapatillas">
                                        <div class="card-body">
                                            <h2 class="card-title">`+ producto.nombre_producto +`</h2>
                                            <p class="card-text">$`+ producto.precio+`</p>
                                            <p class="card-text">Cantidad: `+ pedidos.stock+`</p>
                                        </div>
                                        <button class="btn btn-danger" type="submit" name="borrar_carrito">Eliminar</button>
                                    </form>
                                </div>
                                <!-- Replicar las columnas según sea necesario -->
                            </div>

                                        `;
                            document.getElementById("valor_total").innerHTML = ` Valor Total: $ ` + pedidos.total + ``;
                        }
                    }
                }
            }
        }
}
)}



function mostrar_producto(id_producto) {
    fetch("json_bd.php")
        .then(respuesta => respuesta.json())
        .then(data => {
            const publicacion = document.getElementById("publicaciones");
            const productoDetalle = document.getElementById('producto-detalle');
            const stock = document.getElementById * ("select_talle");
            const producto = data.productos[id_producto];

            productoDetalle.innerHTML += `
                    <div class="col-md-2">
                        <div class="publicacion-galeria d-flex flex-md-column">
                            <img src="../img/`+ producto.imagen + `" class="img-fluid publicacion-thumb mb-2" alt="Vista 1" >
                        </div>
                    </div>

                    <div class="col-md-6">
                        <img id="imagen-principal" src="../img/`+ producto.imagen + `" class="img-fluid publicacion-img" alt="` + producto.imagen + `">
                    </div>

                    <form method = "post" class="col-md-4 d-flex flex-column justify-content-between">
                        <input value= "`+ id_producto + `" name="id_producto" style = "visibility: hidden;">
                        <div>
                            <h2 class="publicacion-titulo">`+ producto.nombre_producto + ` <button style="font-size: 20px; border-radius: 10px; background-color: #000; color: #fff;border: none; " onclick="producto()">volver</button></h2>
                            
                            <p class="publicacion-precio text-success">$`+ producto.precio + `</p>
                            
                            <div class="publicacion-talles mt-3" >
                                <label for="select-cantidad" class="form-label">Selecciona cantidad:</label>
                                <select id="select-cantidad" class="form-select publicacion-select" name="selec_cantidad"> 
                                        
                                </select>
                            </div>
                        </div>

                        <div class="mt-auto d-flex justify-content-end">
                            <button class="btn btn-primary btn-lg publicacion-comprar me-2 enviar">Comprar Ahora</button>
                            <button class="btn btn-outline-secondary btn-lg publicacion-agregar" name="carrito">Agregar al Carrito</button>
                        </div>
                    </form>
                `;
            for (let i = 1; i < producto.stock; i++) {
                document.getElementById("select-cantidad").innerHTML += `
                            <option value="`+ i + `">` + i + `</
                `;
            }

            publicacion.innerHTML = " ";
        }
        );
}