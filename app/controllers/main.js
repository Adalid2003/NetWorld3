// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_PRODUCTOS = '../../app/api/dashboard/productos.php?action=';
const API_CLIENTES = '../../app/api/dashboard/clientes.php?action=';
const API_COMPRAS = '../../app/api/dashboard/compras.php?action=';


// Método manejador de eventos que se ejecuta cuando el documento ha cargado.
document.addEventListener('DOMContentLoaded', function () {
    // Se declara e inicializa un objeto con la fecha y hora actual.
    let today = new Date();
    // Se declara e inicializa una variable con el número de horas transcurridas en el día.
    let hour = today.getHours();
    // Se declara e inicializa una variable para guardar un saludo.
    let greeting = '';
    // Dependiendo del número de horas transcurridas en el día, se asigna un saludo para el usuario.
    if (hour < 12) {
        greeting = 'Buenos días';
    } else if (hour < 19) {
        greeting = 'Buenas tardes';
    } else if (hour <= 23) {
        greeting = 'Buenas noches';
    }
    // Se muestra el saludo en la página web.
    document.getElementById('greeting').textContent = greeting;
    // Se llaman a la funciones que muestran las gráficas en la página web.
    graficaBarrasCompras();
    graficaPastelCategorias();
    graficaLineaProductos();
    graficaProductoscaros();
    graficaComprasRecientes();

});

// Función para mostrar la cantidad de productos por categoría en una gráfica de barras.
function graficaBarrasCompras() {
    fetch(API_CLIENTES + 'cantidadComprasClientes', {
        method: 'get'
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se remueve la etiqueta canvas de la gráfica.
                if (response.status) {
                    // Se declaran los arreglos para guardar los datos por gráficar.
                    let clientes = [];
                    let cantidad = [];
                    // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
                    response.dataset.map(function (row) {
                        // Se asignan los datos a los arreglos.
                        clientes.push(row.nombre_cliente);
                        cantidad.push(row.cantidad);
                    });
                    // Se llama a la función que genera y muestra una gráfica de barras. Se encuentra en el archivo components.js
                    barGraph('chart1', clientes, cantidad, 'Cantidad de compras', 'Top 10 de los clientes con más compras');
                } else {
                    document.getElementById('chart1').remove();
                }
            });
        } else {
            console.log(request.status + ' ' + request.statusText);
        }
        // Se captura el estado del comentario 
    }).catch(function (error) {
        console.log(error);
    });
}

// Función para mostrar la cantidad de productos por categoría en una gráfica de pastel.
function graficaPastelCategorias() {
    fetch(API_PRODUCTOS + 'cantidadProductosCategoria', {
        method: 'get'
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                console.log(response)
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se remueve la etiqueta canvas de la gráfica.
                if (response.status) {
                    // Se declaran los arreglos para guardar los datos por gráficar.
                    let categorias = [];
                    let cantidad = [];
                    // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
                    response.dataset.map(function (row) {
                        // Se asignan los datos a los arreglos.
                        categorias.push(row.nombre_categoria);
                        cantidad.push(row.cantidad);
                    });
                    // Se llama a la función que genera y muestra una gráfica de pastel en porcentajes. Se encuentra en el archivo components.js
                    pieGraph('chart2', categorias, cantidad, 'Porcentajes de productos por categoría');
                } else {
                    document.getElementById('chart2').remove();
                }
            });
        } else {
            console.log(request.status + ' ' + request.statusText);
        }
        // Se captura el estado del comentario 
    }).catch(function (error) {
        console.log(error);
    });

}

// Función para mostrar el top 10 de productos mas vendidos en una gráfica de linea.
function graficaLineaProductos() {
    fetch(API_PRODUCTOS + 'ProductosMasvendidos', {
        method: 'get'
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se remueve la etiqueta canvas de la gráfica.
                if (response.status) {
                    // Se declaran los arreglos para guardar los datos por gráficar.
                    let producto = [];
                    let cantidadproducto = [];
                    // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
                    response.dataset.map(function (row) {
                        // Se asignan los datos a los arreglos.
                        producto.push(row.nombre_producto);
                        cantidadproducto.push(row.cantidad_producto);
                    });
                    // Se llama a la función que genera y muestra una gráfica de linea . Se encuentra en el archivo components.js
                    lineGraph('chart3', producto, cantidadproducto,'Cantidad de productos', 'Top 10 de productos más vendidos');

                } else {
                    document.getElementById('chart3').remove();
                }
            });
        } else {
            console.log(request.status + ' ' + request.statusText);
        }
        // Se captura el estado del comentario 
    }).catch(function (error) {
        console.log(error);
    });

}

// Función para mostrar los prodcuctos mas caros en una gráfica de rosquilla.
function graficaProductoscaros() {
    fetch(API_PRODUCTOS + 'productosMasCaros', {
        method: 'get'
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se remueve la etiqueta canvas de la gráfica.
                if (response.status) {
                    // Se declaran los arreglos para guardar los datos por gráficar.
                    let nombre_producto = [];
                    let precio = [];
                    // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
                    response.dataset.map(function (row) {
                        // Se asignan los datos a los arreglos.
                        nombre_producto.push(row.nombre_producto);
                        precio.push(row.precio_producto);
                    });
                    // Se llama a la función que genera y muestra una gráfica de rosquilla . Se encuentra en el archivo components.js
                    polarGraph('chart4', nombre_producto, precio,'Cantidad de productos', 'Productos más caros');

                } else {
                    document.getElementById('chart4').remove();
                }
            });
        } else {
            console.log(request.status + ' ' + request.statusText);
        }
        // Se captura el estado del comentario 
    }).catch(function (error) {
        console.log(error);
    });

}

// Función para mostrar las compras mas recientes en un grafico de area polar.
function graficaComprasRecientes() {
    fetch(API_COMPRAS + 'comprasMasRecientes', {
        method: 'get'
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se remueve la etiqueta canvas de la gráfica.
                if (response.status) {
                    // Se declaran los arreglos para guardar los datos por gráficar.
                    let fecha_compra = [];
                    let cantidad = [];
                    // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
                    response.dataset.map(function (row) {
                        // Se asignan los datos a los arreglos.
                        fecha_compra.push(row.fecha_compra);
                        cantidad.push(row.cantidad)
                    });
                    // Se llama a la función que genera y muestra una grafica de area polar . Se encuentra en el archivo components.js
                    scatterGraph('chart5', fecha_compra, cantidad,'Cantidad de compras', 'Cantidad de compras por dia');

                } else {
                    document.getElementById('chart5').remove();
                }
            });
        } else {
            console.log(request.status + ' ' + request.statusText);
        }
        // Se captura el estado del comentario 
    }).catch(function (error) {
        console.log(error);
    });

}
