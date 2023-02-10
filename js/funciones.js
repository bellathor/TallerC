function mover(nombre) {
    var ensamble, pintura, entrega;

    ensamble = document.getElementById("ensamble");
    pintura = document.getElementById("pintura");
    entrega = document.getElementById("entrega");

    if (nombre == "ensamble") {
        ensamble.className = "bg-primary rounded-circle p-5 text-white";


    } else if (nombre == "pintura") {
        pintura.className = "bg-primary rounded-circle p-5 text-white";


    }
    else if (nombre == "entrega") {
        entrega.className = "bg-primary rounded-circle p-5 text-white";


    }
}

function Mostrar(nombre) {
    var dashboard, tiendas, produccion, bodega, inventario_madera, inventario_material, inventario_inmueble;

    dashboard = document.getElementById("dashboard");
    tiendas = document.getElementById("tiendas");
    produccion = document.getElementById("produccion");
    bodega = document.getElementById("bodegas");
    inventario_madera = document.getElementById("maderas");
    inventario_material = document.getElementById("materiales");
    inventario_inmueble = document.getElementById("inmuebles");



    if (nombre == "dashboard") {
        dashboard.className = "d-block";
        tiendas.className = "d-none";
        produccion.className = "d-none";
        bodega.className = "d-none";
        inventario_madera.className = "d-none";
        inventario_material.className = "d-none";
        inventario_inmueble.className = "d-none";


    } else if (nombre == "tienda") {
        dashboard.className = "d-none";
        tiendas.className = "d-block";
        produccion.className = "d-none";
        bodega.className = "d-none";
        inventario_madera.className = "d-none";
        inventario_material.className = "d-none";
        inventario_inmueble.className = "d-none";

    }
    else if (nombre == "proyecto") {
        dashboard.className = "d-none";
        tiendas.className = "d-none";
        produccion.className = "d-block";
        bodega.className = "d-none";
        inventario_madera.className = "d-none";
        inventario_material.className = "d-none";
        inventario_inmueble.className = "d-none";
    }
    else if (nombre == "bodega") {
        dashboard.className = "d-none";
        tiendas.className = "d-none";
        produccion.className = "d-none";
        bodega.className = "d-block";
        inventario_madera.className = "d-none";
        inventario_material.className = "d-none";
        inventario_inmueble.className = "d-none";
    }
    else if (nombre == "madera") {
        dashboard.className = "d-none";
        tiendas.className = "d-none";
        produccion.className = "d-none";
        bodega.className = "d-none";
        inventario_madera.className = "d-block";
        inventario_material.className = "d-none";
        inventario_inmueble.className = "d-none";
    }
    else if (nombre == "materiales") {
        dashboard.className = "d-none";
        tiendas.className = "d-none";
        produccion.className = "d-none";
        bodega.className = "d-none";
        inventario_madera.className = "d-none";
        inventario_material.className = "d-block";
        inventario_inmueble.className = "d-none";
    }
    else if (nombre == "inmuebles") {
        dashboard.className = "d-none";
        tiendas.className = "d-none";
        produccion.className = "d-none";
        bodega.className = "d-none";
        inventario_madera.className = "d-none";
        inventario_material.className = "d-none";
        inventario_inmueble.className = "d-block";
    }
}

function empleados() {
    var url = "http://localhost:3000/empleados"
    fetch(url,
        {
            method: "GET",
            mode: "cors",
            headers: {
                'Content-type': 'application/json',
            }
        })
        .then((response)=> response.json())
        .then((data)=>{
            console.log(data.Nombre_Usuario);
        })
        .catch((error)=>{
            console.error('Error: ', error);
        })
}